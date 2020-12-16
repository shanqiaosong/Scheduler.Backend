<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClassInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ClassInfo[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClassInfo::all();
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|string[]
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'uid' => 'required|unique:class_infos',
            'course_name'=>'required|max:255',
            'teachers' => 'required',
            'semester' => 'required',
        ]);
        $classInfo=new ClassInfo();
        $classInfo->uid=$validated['uid'];
        $classInfo->course_name=$validated['course_name'];
        if ($request->has('description'))
            $classInfo->description=$validated['description'];
        if ($request->has('exam_info'))
            $classInfo->exam_info=$validated['exam_info'];
        $classInfo->teachers=$validated['teachers'];
        //$classInfo->class_time=$validated['class_time'];
        $classInfo->semester=$validated['semester'];
        $classInfo->save();
        return [
            'message'=>'created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassInfo  $classInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ClassInfo $classInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassInfo  $classInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassInfo $classInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassInfo  $classInfo
     * @return string[]
     */
    public function update(Request $request, ClassInfo $classInfo)
    {
        //
        $validated = $request->validate([
            'course_name'=>'max:255',
            'description' => 'nullable',
            'exam_info' => 'nullable',
            'teachers' => 'nullable',
            'semester' => 'nullable',
            'update_timestamp' => 'date',
        ]);
        if ($request->has('course_name'))
            $classInfo->course_name=$validated['course_name'];
        if ($request->has('description'))
            $classInfo->description=$validated['description'];
        if ($request->has('exam_info'))
            $classInfo->exam_info=$validated['exam_info'];
        if ($request->has('teachers'))
            $classInfo->teachers=$validated['teachers'];
        if ($request->has('semester'))
            $classInfo->semester=$validated['semester'];
        if ($request->has('update_timestamp'))
            $classInfo->update_time_stamp=$validated['update_timestamp'];
        $classInfo->save();
        return [
            'message'=>'updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassInfo  $classInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassInfo $classInfo)
    {
        //
    }
}
