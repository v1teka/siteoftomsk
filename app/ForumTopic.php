<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    protected $table = 'forum_topics';

    public $timestamps = true;

    protected $fillable = [
      'title', 'description', 'forum_section_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function section()
    {
        return $this->belongsTo('App\ForumSection', 'forum_section_id');
    }

    public function messages()
    {
        return $this->hasMany('App\ForumMessage');
    }
}
