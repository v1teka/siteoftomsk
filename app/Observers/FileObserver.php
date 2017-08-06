<?php

namespace App\Observers;

use App\File;
use Illuminate\Support\Facades\Storage;

class FileObserver
{
    public function deleted(File $file)
    {
        if (Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }
    }

    public function updated(File $file)
    {
        if (Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }
    }
}
