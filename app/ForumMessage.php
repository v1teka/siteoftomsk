<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumMessage extends Model
{
    protected $table = 'forum_messages';

    public $timestamps = true;

    protected $fillable = [
      'text', 'forum_topic_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function topic()
    {
        return $this->belongsTo('App\ForumTopic', 'forum_topic_id');
    }
}
