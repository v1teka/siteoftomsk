<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as FileFacade;

use \App\Observers\FileObserver;

class File extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'path', 'object_id', 'object_type',
    ];

    public static function boot()
    {
        parent::boot();
        parent::observe(new FileObserver);
    }

    public function objects()
    {
        return $this->morphTo();
    }

    public function getExtensionAttribute()
    {
        return FileFacade::extension($this->path);
    }
}
