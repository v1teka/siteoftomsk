<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointType extends Model
{
    public $timestamps = false;
    protected $table = 'point_types';

    protected $fillable = [
      'title', 'isPositive', 'iconType'
    ];

    public function points()
    {
        return $this->hasMany('App\Point');
    }
}
