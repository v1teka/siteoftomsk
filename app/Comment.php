<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\Point;

class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = true;

    protected $fillable = [
        'message', 'created_at', 'created_by', 'updated_at', 'updated_by', 'comment_id', 'target_id', 'point_comment','is_processed', 'is_published',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy() {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function commentFor() {
        return $this->hasOne('App\Comment', 'comment_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    public function target() {
        if ($this->point_comment) return Point::find($this->target_id);
        else Project::find($this->target_id);
    }
}
