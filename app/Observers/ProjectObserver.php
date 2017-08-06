<?php

namespace App\Observers;

use App\Project;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    public function deleted(Project $project)
    {
        // Удаление файлов
        if ($project->files()->count() > 0) {
            foreach ($project->files as $file) {
                $file->delete();
            }
        }

        // Удаление изображения
        if (Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
    }
}
