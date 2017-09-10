<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumSection extends Model
{
    protected $table = 'forum_sections';

    public $timestamps = true;

    protected $fillable = [
      'title', 'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function topics()
    {
        return $this->hasMany('App\ForumTopic');
    }
}
