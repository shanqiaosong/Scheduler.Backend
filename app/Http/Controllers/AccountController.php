<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Account[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Account::all();
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
        $request = $request->validate([
            'student_id' => 'required|unique:accounts|max:255',
            'credential' => 'required',
            'school_abbr'=>'required|max:255',
            'allow_email_notification' => 'required|boolean',
            'allow_push_notification' => 'required|boolean',
        ]);
        $account=new Account();
        $account->student_id=$request['student_id'];
        $account->credential=$request['credential'];
        $account->school_abbr=$request['school_abbr'];
        $account->allow_email_notification=$request['allow_email_notification'];
        $account->allow_push_notification=$request['allow_push_notification'];
        $account->save();
        return [
            'message'=>'created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return Account
     */
    public function show(Account $account,Request $request)
    {
        //
        Gate::authorize('access_account',[$account,$request]);
        return $account;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return string[]
     */
    public function update(Request $request, Account $account)
    {
        //
        Gate::authorize('access_account',[$account,$request]);
        $validated = $request->validate([
            'school_abbr'=>'max:255',
            'allow_email_notification' => 'boolean',
            'allow_push_notification' => 'boolean',
            'last_deadline_modification_time' => 'string',
            'last_course_modification_time' => 'string',
        ]);
        if ($request->has('school_abbr'))
            $account->school_abbr=$validated['school_abbr'];
        if ($request->has('allow_email_notification'))
            $account->allow_email_notification=$validated['allow_email_notification'];
        if ($request->has('allow_push_notification'))
            $account->allow_push_notification=$validated['allow_push_notification'];
        if ($request->has('last_deadline_modification_time'))
            $account->last_deadline_modification_time=$validated['last_deadline_modification_time'];
        if ($request->has('last_course_modification_time'))
            $account->last_course_modification_time=$validated['last_course_modification_time'];
        $account->save();
        return [
            'message'=>'updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
