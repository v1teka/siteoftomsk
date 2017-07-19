<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public $timestamps = true;

    protected $fillable = [
      'title', 'description', 'content', 'rubric_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rubric()
    {
        return $this->belongsTo('App\Rubric');
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
}
