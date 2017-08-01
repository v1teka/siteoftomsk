<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImgUploadController extends Controller
{
    public function upload(Request $request)
    {
        $v = $this->validate($request, [
            'upload' => 'required|image',
        ]);

        $funcNum = request('CKEditorFuncNum');

        if ($v) {
            return response(
                "<script>window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$v->errors()->first()}');</script>"
            );
        }

        $image = request()->file('upload');
        if (!in_array('uploads', Storage::directories())) {
            Storage::makeDirectory('uploads');
        }
        $image->store('public/app/uploads');
        $url = asset('storage/app/uploads/'.$image->hashName());

        return response(
            "<script>window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', 'Изображение успешно загружено');</script>"
        );
    }

}
