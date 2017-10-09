<?php

namespace App\Http\Controllers;

use App\Comment;
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
            $comments = $project->scopePublishedCommentsFirst()->get();
            $canComment = 1;
            if (null !== Auth::user()) {
                if (isset(Comment::where('created_by', '=', Auth::user()->id)->orderByDesc('created_by')->first()->created_at)) {
                    $lastCommentTime =  Comment::where('created_by', '=', Auth::user()->id)->orderByDesc('created_by')->first()->created_at;
                    if (Carbon::now()->diffInMinutes($lastCommentTime) <= 5) {
                        $canComment = 0;
                    };
                }
            } else {
                $canComment = 2;
            }

            $project->with('rubric', 'user', 'files');
            return view('projects.show', compact(['project', 'comments', 'canComment']));
        }
        return abort(404, 'The resource you are looking for could not be found.');
    }

    // Форма создания проекта
    public function create()
    {
        $rubrics = Rubric::all();
        return view('projects.create', compact('rubrics'));
    }

    // Форма создания проекта
    public function adminCreate()
    {
        $rubrics = Rubric::all();
        return view('projects.admin.create', compact('rubrics'));
    }

    // Сохранение проекта
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'rubric_id' => 'nullable|exists:rubrics,id',
            'image' => 'required|image|mimes:jpeg,png|dimensions:min_width=600|max:3072',
            'form' => 'nullable|url',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,png,jpeg|max:30720',
        ]);

        $project = new Project;
        $project->user()->associate(Auth::user());
        $project->title = request('title');
        $project->description = request('description');
        $project->content = request('content');
        // Если пользватель может администрировать проекты, то модерация не нужна
        $project->moderated = Auth::user()->can('administrate', $project) ? 1 : null;
        $project->rubric_id = request('rubric_id');
        $project->form = request('form');
        $project->show_on_main_page = request('show_on_main_page');

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $project->uploadImage($image);
        }

        // Загрузка вложений
        $files = request()->file('files');
        if (request()->hasFile('attachments')) {
            $project->uploadFiles($files);
        }

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
            'description' => 'required',
            'content' => 'required',
            'rubric_id' => 'nullable|exists:rubrics,id',
            'image' => 'nullable|image|mimes:jpeg,png|dimensions:min_width=1000|max:3072',
            'form' => 'nullable|url',
            'deleted_files' => 'nullable',
            'filename' => 'nullable',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,png,jpeg|max:30720',
        ]);

        $project->title = request('title');
        $project->description = request('description');
        $project->content = request('content');
        // Если пользватель не может администрировать проекты, то сбрасываем флаг модерации
        $project->moderated = Auth::user()->can('administrate', $project) ? $project->moderated : null;
        $project->rubric_id = request('rubric_id');
        $project->form = request('form');
        $project->show_on_main_page = request('show_on_main_page');
        $project->save();

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $project->uploadImage($image);
        }

        // Переименование файлов
        if (request()->has('filename')) {
            foreach (request('filename') as $id => $filename) {
                $project->renameFile($id, $filename);
            }
        }

        // Удаление вложений
        if (request()->has('deleted_files')) {
            $deleted_files = array_keys(request('deleted_files'));
            $project->deleteFiles($deleted_files);
        }

        // Загрузка вложений
        $files = request()->file('files');
        if (request()->hasFile('files')) {
            $project->uploadFiles($files);
        }

        return redirect()->route('projects.show', $project);
    }

    // Список проектов (карточками)
    public function index()
    {
        $projects = Project::moderated()->latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    // Удаление проекта
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.admin.index');
    }

    // Оценивание проекта
    public function rate(Project $project)
    {
        $this->validate(request(), [
            'score' => 'required|integer|digits_between:1,5',
        ]);
        $project->rate(['score' => request('score')], Auth::user());
        return request()->ajax() ? $project->avg_rating : redirect()->route('projects.show', $project);
    }

    // Список проектов в админке
    public function adminIndex()
    {
        $projects = Project::with('user', 'rubric', 'files')->paginate(20);
        return view('projects.admin.index', compact('projects'));
    }

    public function adminShow(Project $project)
    {
        $rubrics = Rubric::all();
        $project->with('rubric', 'user', 'files');
        return view('projects.admin.show', compact('project', 'rubrics'));
    }

    public function adminUpdate(Project $project)
    {
        $this->validate(request(), [
            'rubric_id' => 'nullable|exists:rubrics,id',
            'moderated' => 'nullable|boolean',
            'published' => 'nullable',
        ]);

        $project->rubric_id = request('rubric_id');
        $project->moderated = request('moderated');
        $project->published_at = request()->has('published') ? Carbon::now() : null;
        $project->save();

        return redirect()->route('projects.admin.show', $project);
    }
}
