<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class UploadController extends Controller
{
    // Загрузка изображений через СKEditor
    public function storeCKEditorImage(Request $request)
    {
        $funcNum = request('CKEditorFuncNum');

        $validator = Validator::make(request()->all(), [
            'upload' => 'required|image|max:3072',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response(
                "<script>
                    window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$error}');
                </script>"
            );
        }

        $image = request()->file('upload');
        $path = $image->store('uploads', 'public');
        $url = Storage::disk('public')->url($path);

        return response(
            "<script>
                window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', 'Изображение успешно загружено');
            </script>"
        );
    }
}
