<?php

namespace App\Http\Controllers\API;

use App\Point;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PointController extends Controller
{
    public function index()
    {
        $Points = Point::select('id', 'title', 'description', 'user_id', 'updated_at')->where('moderated', 1)->get();
        foreach ($Points as $Point) {
            $Point['user_id'] = User::find($Point['user_id'])->name." ".User::find($Point['user_id'])->surname;
        }
        return response()->json($Points, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Point $point)
    {
        if($point->moderated || (Auth::check() && (Auth::user()->isModerator() || (Auth::user()->id == $point->user_id))))
            return response()->json($point, 200, [], JSON_UNESCAPED_UNICODE);
        else
            return response('Не найдено', 404);
    }

    public function edit(Point $point)
    {
        //
    }

    public function update(Request $request, Point $point)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'isPositive' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png|dimensions:min_width=1000|max:3072'
        ]);

        $point->title = request('title');
        $point->description = request('description');
        // Если пользователь не может администрировать проекты, то сбрасываем флаг модерации
        $point->moderated = Auth::user()->can('administrate', $point) ? $point->moderated : null;
        $point->isPositive = request('isPositive');
        $point->save();

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $point->uploadImage($image);
        }

        return "Okay!";
    }

    public function destroy(Point $point)
    {
        //
    }
}
