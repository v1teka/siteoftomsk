<?php

namespace App\Http\Controllers;

use App\Point;
use App\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function index(Request $request)
    {
        return view('points.index', ['mapType' => key($request->all())]);
    }
    
    public function create(Request $request)
    {
        return view('points.create', ['mapType' => key($request->all())]);
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
            'x' => 'numeric|between:55,59',
            'y' => 'numeric|between:82,87',
            'image' => 'required|image|mimes:jpeg,png|dimensions:min_width=600|max:3072'
        ]);

        $point = new Point;
        $point->user()->associate(Auth::user());
        $point->title = request('title');
        $point->x = request('x');
        $point->y = request('y');
        $point->type_id = request('point_type');
        $point->project_id = request('project_id');
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
        $comments = $point->scopePublishedCommentsFirst()->get();
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

            $point->with('rubric', 'user', 'files');
            return view('points.show', compact(['point', 'comments', 'canComment']));
    }
    
    public function edit(Point $point)
    {
        return view('points.edit', compact('point', $point));
    }
    
    public function update(Point $point)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'point_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png|dimensions:min_width=1000|max:3072',
            'x' => 'numeric|between:55.0,59.0',
            'y' => 'numeric|between:82.0,87.0'
        ]);

        $point->title = request('title');
        $point->description = request('description');
        // Если пользватель не может администрировать проекты, то сбрасываем флаг модерации
        $point->moderated = Auth::user()->can('administrate', $point) ? $point->moderated : null;
        $point->type_id = request('point_type');
        $point->project_id = request('project_id');
        $point->x = request('x');
        $point->y = request('y');
       

        // Загрузка изображения
        if(request()->hasFile('image')) {
            $image = request()->file('image');
            $point->uploadImage($image);
        }
        $point->save();

        return redirect()->route('points.show', $point);
    }
    
    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('points.admin.index');
    }

    public function isPartOf($needle, $haystack){
        foreach($needle as $value)
            if(!in_array($value,$haystack))
                return false;
        return true;
    }

    public function groups(){
        $groups = DB::table('point_groups')->get();
        $g = [];
        foreach($groups as $group){
            $add = true;
            $new_points_string = $group->points;
            foreach($g as $points_string){
                if($this->isPartOf(explode(',',$new_points_string), explode(',',$points_string))){
                    $add = false;
                    break;
                }
                if($this->isPartOf(explode(',',$points_string), explode(',',$new_points_string))){
                    $points_string = $new_points_string;
                    $add = false;
                    break;
                }
            }
            if($add) array_push($g, $new_points_string);
        }
        
        $groups = [];
        foreach($g as $group_string){
            $group = (object)[];
            $group->pointIDs = explode(',', $group_string);
            $group->type_icon = Point::find($group->pointIDs[0])->type->iconType;
            $group->count = sizeof($group->pointIDs);
            $group->updated_at = Point::find($group->pointIDs[0])->updated_at;
            foreach($group->pointIDs as $ID){
                if(Point::find($ID)->updated_at > $group->updated_at)
                    $group->updated_at = Point::find($ID)->updated_at;
            }
            array_push($groups, $group);
        }

        return $groups;
    }

    public function adminIndex()
    {
        $points = Point::with('user')->paginate(20);
        $groups = $this->groups();
            
        return view('points.admin.index', compact('points', 'groups'));
    }

    public function adminGroup($groupID){
        $groups = $this->groups();
        return view('points.admin.group', ['group' => $groups[$groupID]]);
    }

    public function adminShow(Point $point)
    {
        $point->with('rubric', 'user', 'files');
        return view('points.admin.show', compact('point', 'rubrics'));
    }

    public function adminUpdate(Point $point)
    {
        $this->validate(request(), [
            'moderated' => 'nullable|boolean',
            'published' => 'nullable',
        ]);

        $point->moderated = request('moderated');
        $point->published_at = request()->has('published') ? Carbon::now() : null;
        $point->save();

        return redirect()->route('points.admin.show', $point);
    }

    public function rate(Point $point)
    {
        $this->validate(request(), [
            'score' => 'required|integer|digits_between:1,5',
        ]);
        $point->rate(['score' => request('score')], Auth::user());
        return request()->ajax() ? $point->avg_rating : redirect()->route('points.show', $point);
    }
}
