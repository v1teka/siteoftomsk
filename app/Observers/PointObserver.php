<?php

namespace App\Observers;

use App\Point;
use Illuminate\Support\Facades\Storage;

class PointObserver
{
    public function deleted(Point $point)
    {
        // Удаление изображения
        if (Storage::disk('public')->exists($point->image)) {
            Storage::disk('public')->delete($point->image);
        }
    }
}
