<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use \App\Observers\ProjectObserver;
use \App\Traits\Ratingable;

use App\File;

class Project extends Model
{
    use Ratingable;
    use SoftDeletes;

    protected $table = 'projects';

    public $timestamps = true;

    protected $fillable = [
      'title', 'description', 'content', 'image', 'form', 'rubric_id', 'published_at', 'show_on_main_page'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'published_at', 'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        parent::observe(new ProjectObserver);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rubric()
    {
        return $this->belongsTo('App\Rubric');
    }

    public function files()
    {
        return $this->morphMany('App\File', 'object');
    }

    public function scopeModerated($query)
    {
        return $query->where('moderated', 1);
    }

    public function scopeRejected($query)
    {
        return $query->where('moderated', 0);
    }

    public function scopeAwaiting($query)
    {
        return $query->whereNull('moderated');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeOnMainPage($query) {
        return $query->where('show_on_main_page', '>', 0);
    }

    // Оценивание
    public function rate($score, Model $user)
    {
        return (new Rating())->createUniqueRating($this, $score, $user);
    }

    // Загрузка изображения
    public function uploadImage($image)
    {
        if (Storage::disk('public')->exists($this->image)) {
            Storage::disk('public')->delete($this->image);
        }
        // Загрузка нового изображения
        $this->image = $image->store('projects/' . $this->id, 'public');
        $this->save();
    }

    // Загрузка вложений
    public function uploadFiles($files)
    {
        foreach ($files as $file) {
            $path = $file->store('projects/' . $this->id . '/files', 'public');
            $filename = $file->getClientOriginalName();
            $entity = new File([
                'path' => $path,
                'name' => $filename
            ]);
            $this->files()->save($entity);
        }
    }

    // Удаление вложений
    public function deleteFiles($files)
    {
        foreach ($files as $id) {
            $file = $this->files()->find($id);
            if (isset($file)) {
                $file->delete();
            }
        }
    }

    public function comments() {
        return $this->hasMany('App\Comment')->orderByDesc('created_at');
    }

    public function scopeCommentsFirst() {
        return $this->hasMany('App\Comment')->whereNull('comment_id')->orderByDesc('created_at');
    }

    public function scopePublishedCommentsFirst() {
        return $this->hasMany('App\Comment')->whereNull('comment_id')->where('is_published', '>', '0')->orderByDesc('created_at');
    }
}
