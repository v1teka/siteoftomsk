<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as FileFacade;

class File extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'path', 'object_id', 'object_type',
    ];

    public function objects()
    {
        return $this->morphTo();
    }

    public function getExtensionAttribute()
    {
        return FileFacade::extension($this->path);
    }
}
