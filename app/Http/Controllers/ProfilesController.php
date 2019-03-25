<?php

namespace App\Http\Controllers;

use Auth;
use App\Setting;
use Session;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user     = Auth::user();
        $title    = Auth::user()->name;
        $settings = Setting::first();

        return view('pages.backend.users.profile', compact('user', 'title', 'settings'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        $user     =  Auth::user();
        $title    = 'Update Profile';
        $settings = Setting::first();

        return view('pages.backend.users.update-profile', compact('user', 'title', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'        =>  'required',
            'email'       =>  'required|email',
            'facebook'    =>  'required|url',
            'instagram'   =>  'required|url',
            'twitter'     =>  'required|url',
            'youtube'     =>  'required|url',
            'whatsapp'    =>  'required|url',

        ]);

        $user   =   Auth::user();

        if($request->hasFile('avatar'))
        {

            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
        
            $user->profile->save();

        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->profile->job       = $request->job;
        $user->profile->facebook  = $request->facebook;
        $user->profile->instagram = $request->instagram;
        $user->profile->twitter   = $request->twitter;
        $user->profile->youtube   = $request->youtube;
        $user->profile->whatsapp  = $request->whatsapp;
        $user->profile->about     = $request->about;

        $user->save();

        $user->profile->save();

        if($request->hasFile('password'))
        {
            $user->password  = bcrypt($request->password);

            $user->save();

        }

        Session::flash('success', 'Profile successfully updated.');

        return redirect()->route('user.profile'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
