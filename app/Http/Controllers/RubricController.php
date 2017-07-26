<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rubric;

class RubricController extends Controller
{
    public function show(Rubric $rubric)
    {
        $projects = $rubric->projects()->moderated()->paginate(9);
        return view('rubrics.show', compact('rubric', 'projects'));
    }

    public function create()
    {
        return view('rubrics.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'slug' => 'nullable|unique:rubrics|not_in:create|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'description' => 'nullable|max:255',
        ]);
        $rubric = new Rubric();
        $rubric->name = request('name');
        $rubric->description = request('description');
        $rubric->slug = request('slug') ? request('slug') : request('name');
        $rubric->save();

        return redirect()->route('rubrics.show', $rubric);
    }

    public function edit(Rubric $rubric)
    {
        return view('rubrics.edit', compact('rubric'));
    }

    public function update(Rubric $rubric)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'slug' => [
                'nullable',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'not_in:create',
                'max:255',
                Rule::unique('rubrics')->ignore($rubric->slug),
            ],
            'description' => 'nullable|max:255',
        ]);
        $rubric->name = request('name');
        $rubric->description = request('description');
        $rubric->slug = request('slug') ? request('slug') : request('name');
        $rubric->save();

        return redirect()->route('rubrics.show', $rubric);
    }

    public function index()
    {
        $rubrics = Rubric::has('projects')->with('projects')->paginate(10);
        return view('rubrics.index', compact('rubrics'));
    }

    public function administrate()
    {
        $rubrics = Rubric::with('projects')->paginate(20);
        return view('rubrics.admin', compact('rubrics'));
    }
}
