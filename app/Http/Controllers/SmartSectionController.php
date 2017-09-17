<?php

namespace App\Http\Controllers;

use App\SmartSection;
use App\SmartSolution;
use Illuminate\Http\Request;

class SmartSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smartSections = SmartSection::with('solutions')->get();
        return view('smart.section.index', compact('smartSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('smart.section.create');
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
            'title' => 'required',
            'img' => 'required|image|mimes:jpeg,png',
        ]);

        $smartSection = new SmartSection;
        $smartSection->title = request('title');

        // Загрузка изображения
        if(request()->hasFile('img')) {
            $image = request()->file('img');
            $smartSection->uploadImage($image);
        }

        $smartSection->save();
        return redirect()->route('smart.sections.admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmartSection  $smartSection
     * @return \Illuminate\Http\Response
     */
    public function show(SmartSection $smartSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmartSection  $smartSection
     * @return \Illuminate\Http\Response
     */
    public function edit(SmartSection $smartSection)
    {
        return view('smart.section.edit', compact('smartSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmartSection  $smartSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmartSection $smartSection)
    {
        $this->validate(request(), [
            'title' => 'required',
        ]);

        $smartSection->title = request('title');

        // Загрузка изображения
        if(request()->hasFile('img')) {
            $image = request()->file('img');
            $smartSection->uploadImage($image);
        }

        $smartSection->save();
        return redirect()->route('smart.sections.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmartSection  $smartSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmartSection $smartSection)
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
        $smartSections = SmartSection::all();
        return view('smart.section.admin', compact('smartSections'));
    }
}
