<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use Auth;
use Unikent\Curl\Facades\Curl;

class CommentController extends Controller
{
    public function store(Project $project) {
        $this->validate(request(), [
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        $verification = json_decode(Curl::simple_get('https://www.google.com/recaptcha/api/siteverify',
            ['secret' => '6Lft_TEUAAAAAKNtlOKVa6WaVDDo0Np5eretvL0X', 'response' => request('g-recaptcha-response')]));
        if ($verification->success) {
            $comment = new Comment;
            $comment->project_id = $project->id;
            $comment->message = request('message');
            $comment->created_by = Auth::user()->id;
            $comment->updated_by = Auth::user()->id;
            $comment->save();

            return redirect()->route('projects.show', $project);
        } else {
            return redirect()->back()->withErrors(['error' => 'Проверка reCAPTCHA не пройдена.']);
        }

        
    }
}
