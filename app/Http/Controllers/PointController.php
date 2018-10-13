<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::moderated()->latest()->paginate(9);
        return view('points.index', compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('points.create');
    }

    public function adminCreate()
    {
        return view('points.admin.create');
    }
    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png|dimensions:min_width=600|max:3072'
        ]);

        $point = new Point;
        $point->user()->associate(Auth::user());
        $point->title = request('title');
        $point->description = request('description');
        // Если пользватель может администрировать проекты, то модерация не нужна
        $point->moderated = Auth::user()->can('administrate', $point) ? 1 : null;

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $point->uploadImage($image);
        }

        $point->save();

        return redirect()->route('points.show', $point);
    }

    public function show(Point $point)
    {
        //
    }
    
    public function edit(Point $point)
    {
        return view('points.edit', compact('point'));
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
        // Если пользватель не может администрировать проекты, то сбрасываем флаг модерации
        $point->moderated = Auth::user()->can('administrate', $point) ? $point->moderated : null;
        $point->isPositive = request('isPositive');
        $point->save();

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $point->uploadImage($image);
        }

        return redirect()->route('points.show', $point);
    }
    
    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('points.admin.index');
    }

    // Список проектов в админке
    public function adminIndex()
    {
        $points = Point::with('user')->paginate(20);
        return view('points.admin.index', compact('points'));
    }

    public function adminShow(Point $point)
    {
        $rubrics = Rubric::all();
        $point->with('rubric', 'user', 'files');
        return view('points.admin.show', compact('point', 'rubrics'));
    }

    public function adminUpdate(Point $point)
    {
        $this->validate(request(), [
            'rubric_id' => 'nullable|exists:rubrics,id',
            'moderated' => 'nullable|boolean',
            'published' => 'nullable',
        ]);

        $point->rubric_id = request('rubric_id');
        $point->moderated = request('moderated');
        $point->published_at = request()->has('published') ? Carbon::now() : null;
        $point->save();

        return redirect()->route('points.admin.show', $point);
    }
}
