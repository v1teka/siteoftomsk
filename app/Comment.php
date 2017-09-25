<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = true;

    protected $fillable = [
        'message', 'created_at', 'created_by', 'updated_at', 'updated_by', 'comment_id', 'project_id', 'is_processed', 'is_published',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function createdBy() {
        return $this->hasOne('App\User', 'created_by');
    }

    public function updatedBy() {
        return $this->hasOne('App\User', 'updated_by');
    }

    public function commentFor() {
        return $this->hasOne('App\Comment', 'comment_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    public function project() {
        return $this->hasOne('App\Project', 'peoject_id');
    }
}
