<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use \App\Observers\PointObserver;
use \App\Traits\Ratingable;

use App\Comment;

class Point extends Model
{
    use Ratingable;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'title', 'x', 'y', 'description', 'image', 'isPositive', 'published_at'
      ];
  
    protected $dates = [
        'created_at', 'updated_at', 'published_at', 'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        parent::observe(new PointObserver);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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

    public function comments() {
        return Comment::where('point_comment','=','1')->where('target_id',$this->id)->orderByDesc('created_at');
    }

    public function scopeCommentsFirst() {
        return Comment::where('point_comment','=','1')->where('target_id',$this->id)->whereNull('comment_id')->orderByDesc('created_at');
    }

    public function scopePublishedCommentsFirst() {
        return Comment::where('point_comment','=','1')->where('target_id',$this->id)->whereNull('comment_id')->where('is_published', '>', '0')->orderByDesc('created_at');
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
}
