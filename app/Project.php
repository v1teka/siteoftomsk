<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use \App\Observers\ProjectObserver;
use \App\Traits\Ratingable;

use App\File;

class Project extends Model
{
    use Ratingable;

    protected $table = 'projects';

    public $timestamps = true;

    protected $fillable = [
      'title', 'description', 'content', 'image', 'form', 'rubric_id', 'published_at', 'show_on_main_page'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'published_at',
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
        return $query->where('show_on_main_page', 1);
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
}
