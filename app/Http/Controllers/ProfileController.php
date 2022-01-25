<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);        

        return response()->json([
            "user" => $user,
            "role" => $user->role
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

        $u = User::find(Auth::user()->id);        

        return response()->json([
            "user" => $u,
            "role" => $u->role
        ]);
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
    public function update(User $user)
    {
        $u = User::find(Auth::user()->id);

        // validate
        $valid = request()->validate([
            "name" => ["required","min:4","unique:users,name,".Auth::user()->id],
            "email" => ["required","email","unique:users,email,".Auth::user()->id],
        ],[
            "name.min" => "Error name too short!"
        ]);


        $extra = "";
        // prepare data 
        $n_pass = request()->new_pass;
        if(isset($n_pass) && $n_pass != null):
            $valid["password"] = Hash::make($n_pass);
            $extra = "and your password ";
        endif;

        // unset data from form
        unset($valid["new_pass"]);
        unset($valid["conf_pass"]);


        // update data
        User::where("id",Auth::user()->id)
            ->update($valid);

        $msg = "<span class=\"tag is-medium is-success\">
            Success : your information {$extra} has been change!</span>";

        return response()->json([
            "msg" => $msg
        ]);
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
