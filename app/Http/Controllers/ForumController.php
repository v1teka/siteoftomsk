<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumSection;
use App\ForumTopic;
use App\ForumMessage;
use Auth;

class ForumController extends Controller
{
    public function index()
    {
        $sections = ForumSection::with('topics')->has('topics')->latest()->paginate(5);
        return view('forum.index', compact('sections'));
    }

    public function createSection()
    {
        return view('forum.sections.create');
    }

    public function storeSection()
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $section = new ForumSection;
        $section->user()->associate(Auth::user());
        $section->title = request('title');
        $section->description = request('description');
        $section->save();

        return redirect()->route('forum.index');
    }

    public function editSection(ForumSection $section)
    {
        return view('forum.sections.edit', compact('section'));
    }

    public function updateSection(ForumSection $section)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $section->title = request('title');
        $section->description = request('description');
        $section->save();

        return redirect()->route('forum.index');
    }

    public function createTopic()
    {
        $sections = ForumSection::all();
        return view('forum.topics.create', compact('sections'));
    }

    public function storeTopic()
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
            'forum_section_id' => 'required|exists:forum_sections,id',
        ]);

        $topic = new ForumTopic;
        $topic->user()->associate(Auth::user());
        $topic->title = request('title');
        $topic->description = request('description');
        $topic->forum_section_id = request('forum_section_id');
        $topic->save();

        return redirect()->route('forum.topics.show', $topic);
    }

    public function editTopic(ForumTopic $topic)
    {
        $sections = ForumSection::all();
        return view('forum.topics.edit', compact('sections', 'topic'));
    }

    public function updateTopic(ForumTopic $topic)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
            'forum_section_id' => 'required|exists:forum_sections,id',
        ]);

        $topic->title = request('title');
        $topic->description = request('description');
        $topic->forum_section_id = request('forum_section_id');
        $topic->save();

        return redirect()->route('forum.topics.show', $topic);
    }

    public function sendMessage(ForumTopic $topic)
    {
        $this->validate(request(), [
            'message' => 'required|max:255',
        ]);

        $message = new ForumMessage;
        $message->user()->associate(Auth::user());
        $message->text = request('message');
        $message->topic()->associate($topic);
        $message->save();

        return redirect()->back();
    }

    public function deleteMessage(ForumMessage $message)
    {
        $message->delete();
        return redirect()->back();
    }

    public function showTopic(ForumTopic $topic)
    {
        $messages = ForumMessage::where('forum_topic_id', $topic->id)->with('user')->oldest()->paginate(20);
        $topic->with('section')->get();

        return view('forum.topics.show', compact('topic', 'messages'));
    }
}
