<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Project $project) {
        $this->validate(request(), [
            'message' => 'required',
        ]);

        $comment = new Comment;
        $comment->project_id = $project->id;
        $comment->message = request('message');
        $comment->created_by = Auth::user()->id;
        $comment->updated_by = Auth::user()->id;
        $comment->save();

        return redirect()->route('projects.show', $project);
    }
}
