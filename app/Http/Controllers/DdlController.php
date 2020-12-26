<?php

namespace App\Http\Controllers;

use App\Models\Ddl;
use Illuminate\Http\Request;

class DdlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ddl::all();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'uid' => 'required|unique:ddl',
            'name' => 'required',
            'description' => 'required',
            'eventType' => 'required',
            'courseObjectID' => 'required',
            'sourceName' => 'required',
            'dueTime' => 'required',
            'isFinished' => 'required|boolean',
            'isDeleted' => 'required|boolean',
        ]);
        $ddl = new Ddl();
        $ddl->uid=$request['uid'];
        $ddl->name=$request['name'];
        $ddl->description=$request['description'];
        $ddl->eventType=$request['eventType'];
        $ddl->courseObjectID=$request['courseObjectID'];
        $ddl->sourceName=$request['sourceName'];
        $ddl->dueTime=$request['dueTime'];
        $ddl->isFinished=$request['isFinished'];
        $ddl->isDeleted=$request['isDeleted'];
        $ddl->save();
        return[
            'massage'=>'created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ddl  $ddl
     * @return \Illuminate\Http\Response
     */
    public function show(Ddl $ddl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ddl  $ddl
     * @return \Illuminate\Http\Response
     */
    public function edit(Ddl $ddl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ddl  $ddl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ddl $ddl)
    {
        $validated = $request->validate([
            'name' => 'max:255',
            'description' => 'nullable',
            'eventType' => 'nullable',
            'courseObjectID' => 'nullable',
            'sourceName' => 'nullable',
            'dueTime' => 'date',
            'isFinished' => 'boolean',
            'isDeleted' => 'boolean',
            'update_timestamp' => 'date',
        ]);
        if ($request->has('name'))
            $ddl->name=$validated['name'];
        if ($request->has('description'))
            $ddl->name=$validated['description'];
        if ($request->has('eventType'))
            $ddl->name=$validated['eventType'];
        if ($request->has('courseObjectID'))
            $ddl->name=$validated['courseObjectID'];
        if ($request->has('sourceName'))
            $ddl->name=$validated['sourceName'];
        if ($request->has('dueTime'))
            $ddl->name=$validated['dueTime'];
        if ($request->has('isFinished'))
            $ddl->name=$validated['isFinished'];
        if ($request->has('isDeleted'))
            $ddl->name=$validated['isDeleted'];
        if ($request->has('update_timestamp'))
            $ddl->name=$validated['update_timestamp'];
        return [
            'message'=>'updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ddl  $ddl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ddl $ddl)
    {
        //
    }
}
