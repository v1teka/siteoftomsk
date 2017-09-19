<?php

namespace App\Http\Controllers;

use App\SmartSection;
use App\SmartSolution;
use Illuminate\Http\Request;
use Auth;

class SmartSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = SmartSection::all();
        return view('smart.solution.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'description' => 'required',
            'smart_section_id' => 'required',
        ]);

        $smartSolution = new SmartSolution;
        $smartSolution->description = request('description');
        $smartSolution->smart_section_id = request('smart_section_id');

        $smartSolution->save();
        return redirect()->route('smart.solutions.admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmartSolution  $smartSolution
     * @return \Illuminate\Http\Response
     */
    public function show(SmartSolution $smartSolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmartSolution  $smartSolution
     * @return \Illuminate\Http\Response
     */
    public function edit(SmartSolution $smartSolution)
    {
        $smartSolution->with('section');
        $sections = SmartSection::all();
        return view('smart.solution.edit', compact(['smartSolution', 'sections']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmartSolution  $smartSolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmartSolution $smartSolution)
    {
        $this->validate(request(), [
            'smart_section_id' => 'required',
            'description' => 'required',
        ]);

        $smartSolution->description = request('description');
        $smartSolution->smart_section_id = request('smart_section_id');
        $smartSolution->visible = request('visible') == null ? 0 : 1;

        $smartSolution->save();
        return redirect()->route('smart.solutions.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmartSolution  $SmartSolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmartSolution $smartSolution)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $smartSolutions = SmartSolution::with('section')->get();
        return view('smart.solution.admin', compact('smartSolutions'));
    }

    // Оценивание Smart-решения
    public function rate(SmartSolution $smartSolution)
    {
        $this->validate(request(), [
            'score' => 'required|integer|digits_between:1,5',
        ]);
        $smartSolution->rate(['score' => request('score')], Auth::user());
        return request()->ajax() ? $smartSolution->avg_rating : redirect()->route('projects.show', $smartSolution);
    }
}
