<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variables';

    public $timestamps = true;

    protected $primaryKey = 'name';

    protected $fillable = [
        'value', 'comment',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
}
