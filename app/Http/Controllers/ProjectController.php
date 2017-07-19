<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Project;
use App\Rubric;
use Auth;

class ProjectController extends Controller
{
    // Отображение проекта
    public function show(Project $project)
    {
        // Авторизация (политики работают только для аутентифицированного пользователя)
        if($project->moderated || (Auth::check() && (Auth::user()->isModerator() || (Auth::user()->id == $project->user_id)))) {
            $project->with('rubric');
            return view('projects.show', compact('project'));
        }
        return abort(404, 'The resource you are looking for could not be found.');
    }

    // Форма создания проекта
    public function create()
    {
        $rubrics = Rubric::all();
        return view('projects.create', compact('rubrics'));
    }

    // Сохранение проекта
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'rubric_id' => 'nullable|exists:rubrics,id',
        ]);

        $project = new Project;
        $project->user()->associate(Auth::user());
        $project->title = request('title');
        $project->description = request('description');
        $project->content = request('content');
        // Если пользватель может модерировать проекты, то модерация не нужна
        $project->moderated = Auth::user()->can('moderate', $project) ? 1 : null;
        $project->rubric_id = request('rubric_id');
        $project->save();

        return redirect()->route('projects.show', $project);
    }

    // Форма редактирования проекта
    public function edit(Project $project)
    {
        $rubrics = Rubric::all();
        return view('projects.edit', compact('project', 'rubrics'));
    }

    // Сохранение изменений проекта
    public function update(Project $project)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required|max:255',
            'content' => 'required',
            'rubric_id' => 'nullable|exists:rubrics,id',
        ]);

        $project->title = request('title');
        $project->description = request('description');
        $project->content = request('content');
        // Если пользватель не может модерировать проекты, то сбрасываем флаг модерации
        $project->moderated = Auth::user()->can('moderate', $project) ? $project->moderated : null;
        $project->rubric_id = request('rubric_id');
        $project->save();

        return redirect()->route('projects.show', $project);
    }

    // Модерация проекта
    public function moderate(Project $project)
    {
        $project->moderated = ($project->moderated == true) ? false : true;
        $project->save();
        return back();
    }

    // Публикация проекта
    public function publish(Project $project)
    {
        $project->published_at = (is_null($project->published_at)) ? Carbon::now() : null;
        $project->save();
        return back();
    }
}
