<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Traits\Ratingable;

class SmartSolution extends Model
{
    use Ratingable;
    
    protected $table = 'smart_solutions';

    public $timestamps = true;

    protected $fillable = [
        'description', 'visible', 'smart_section_id',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function section() {
        return $this->belongsTo('App\SmartSection', 'smart_section_id');
    }

    // Оценивание
    public function rate($score, Model $user)
    {
        return (new Rating())->createUniqueRating($this, $score, $user);
    }
}
