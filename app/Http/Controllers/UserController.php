<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
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

    public function userIsConfirmPassword(){
        $valid = request()->validate([
            "conf_pass" => ["required"]
        ],[
            "conf_pass.required" => "Error : please enter your current password"
        ]);

        $confirm = false;

        $msg = "";
        $conf_pass = request()->conf_pass;
        $cur_pass = Hash::check($conf_pass,Auth::user()->password);

        if(!$cur_pass):
            $msg = "<span class=\"tag is-medium is-danger\">
            Wrong password!</span>";
        else:
            $confirm = true;
            $msg = "<span class=\"tag is-medium is-success\">
        Success : please press the button again</span>";
        endif;


        return response()->json([
            "confirmed" => $confirm,
            "msg" => $msg
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
