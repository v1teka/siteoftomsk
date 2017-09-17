<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SmartSection extends Model
{
    protected $table = 'smart_sections';

    public $timestamps = true;

    protected $fillable = [
        'title', 'img_path'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
    
    public function solutions() {
        return $this->hasMany('App\SmartSolution');
    }

    // Загрузка изображения
    public function uploadImage($image)
    {
        if (Storage::disk('public')->exists($this->img_path)) {
            Storage::disk('public')->delete($this->img_path);
        }
        // Загрузка нового изображения
        $this->img_path = $image->store('smartsections/' . $this->id, 'public');
        $this->save();
    }
}
