<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'description', 'slug',
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    // Переопредление поля для неявной приявязки
    public function getRouteKeyName()
    {
      return 'slug';
    }

    // Сохранение поля slug с проверкой уникальности
    public function setSlugAttribute($value)
    {
        $slug = str_slug($value, '-');
        $temp_slug = $slug;
        $i = 0;
        while(Rubric::where('slug', $temp_slug)->get()->isNotEmpty()) {
            $i++;
            $temp_slug = $slug . '-' . $i;
        }
        $this->attributes['slug'] = $temp_slug;
    }
}
