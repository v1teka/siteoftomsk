<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmartSolution extends Model
{
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
}
