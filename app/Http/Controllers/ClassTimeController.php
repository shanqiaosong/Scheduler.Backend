<?php

namespace App\Http\Controllers;

use App\Models\ClassTime;
use Illuminate\Http\Request;

class ClassTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClassTime::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function store(Request $request)
    {
        //
        $request = $request->validate([
            'classID' => 'required|max:255',
            'nthClassStart' => 'required|max:12',
            'nthClassEnd' => 'required|max:12',
            'dayOfWeek' => 'required|max:7',
            'classroom'=>'required',
        ]);
        $classTime=new ClassTime();
        $classTime->classID=$request['classID'];
        $classTime->nthClassStart=$request['nthClassStart'];
        $classTime->nthClassEnd=$request['nthClassEnd'];
        $classTime->dayOfWeek=$request['dayOfWeek'];
        $classTime->classroom=$request['classroom'];
        //if ($request->has('weekType'))
            //$classTime->weekType=$request['weekType'];
        if ($request->has('startWeekIndex'))
            $classTime->startWeekIndex=$request['startWeekIndex'];
        if ($request->has('endWeekIndex'))
            $classTime->endWeekIndex=$request['endWeekIndex'];
        $classTime->save();
        return [
            'message'=>'created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTime $classTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTime $classTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassTime  $classTime
     * @return string[]
     */
    public function update(Request $request, ClassTime $classTime)
    {
        //
        $validated = $request->validate([
            'classID' => 'mx:255',
            'nthClassStart' => 'max:12',
            'nthClassEnd' => 'max:12',
            'dayOfWeek' => 'max:7',
            'classroom' => 'nullable',
            'weekType' => 'nullable',
            'startWeekIndex' => 'nullable',
            'endWeekIndex' => 'nullable',
        ]);
        if ($request->has('classID'))
            $classTime->classID=$validated['classID'];
        if ($request->has('nthClassStart'))
            $classTime->nthClassStart=$validated['nthClassStart'];
        if ($request->has('nthClassEnd'))
            $classTime->nthClassEnd=$validated['nthClassEnd'];
        if ($request->has('dayOfWeek'))
            $classTime->dayOfWeek=$validated['dayOfWeek'];
        //if ($request->has('weekType'))
            //$classTime->weekType=$validated['weekType'];
        if ($request->has('startWeekIndex'))
            $classTime->startWeekIndex=$validated['startWeekIndex'];
        if ($request->has('endWeekIndex'))
            $classTime->endWeekIndex=$validated['wendWeekIndex'];
        if ($request->has('classroom'))
            $classTime->classroom=$validated['classroom'];
        $classTime->save();
        return [
            'message'=>'updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassTime  $classTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassTime $classTime)
    {
        //
    }
}
