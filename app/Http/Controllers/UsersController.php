<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manage Users';
        $settings = Setting::first();
        $users = User::all();

        return view('pages.backend.users.index', compact('title', 'settings', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Create User';
        $settings = Setting::first();

        return view('pages.backend.users.create', compact('title', 'settings'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'   =>  'required',
            'email'  =>  'required|email'
        ]);

        $user = User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password' => bcrypt('user')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads/avatars/dp.png'
        ]);

        Session::flash('success', 'User added successfully.');

        return redirect()->route('users');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Change User Permissions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Successfully changed user permissions.');

        return redirect()->back();

    }

    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Successfully changed user permissions.');

        return redirect()->back();

    }

    /**
     * Temporary Remove the specified resource from storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user   =   User::find($id);
        
        $user->profile->delete();
        
        $user->delete();

        Session::flash('success', 'User was permanently deleted.');

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    //     $user  =    User::withTrashed()->where('id', $id)->first();
    //     $user->profile->forceDelete();
    //     $user->forceDelete();

    //     Session::flash('success', 'User deleted permanently.');

    //     return redirect()->back();
    // }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function trashed()
    // {
    //     $users   =   User::onlyTrashed()->get();

    //     return view('backend.users.trashed')->with('users', $users);
    // }

    /**
     * Restore deleted resource back into storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function restore($id)
    // {
    //     $delete = User::withTrashed()->where('id', $id)->first();

    //     $delete->restore();

    //     Session::flash('success', 'User restored successfully.');

    //     return redirect()->route('users');
    // }

}
