<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
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


	public function index()
    {

        $title      = 'Manage Site';
        $settings   = Setting::first();
        
        return view('pages.backend.settings.settings', compact('title', 'settings' ));

    }


	public function update()
    {
    	$this->validate(request(),[
            'site_name'         =>  'required',
            'contact_address'   =>  'required',
            'contact_email'     =>  'required',
            'contact_number'    =>  'required',
            'facebook'          =>  'required|url',
            'instagram'         =>  'required|url',
            'whatsapp'         =>  'required|url',
            'twitter'           =>  'required|url',
            'youtube'           =>  'required|url',
        ]);

    	$settings = Setting::first();

    	$settings->site_name       = request()->site_name;
    	$settings->contact_address = request()->contact_address;
    	$settings->contact_email   = request()->contact_email;
    	$settings->contact_number  = request()->contact_number;
        $settings->facebook        = request()->facebook;
        $settings->instagram       = request()->instagram;
        $settings->whatsapp        = request()->whatsapp;
        $settings->twitter         = request()->twitter;
        $settings->youtube         = request()->youtube;
        $settings->about_us        = request()->about;

    	$settings->save();

    	Session::flash('success', 'settings updated successfully.');

        return redirect()->route('settings');

    }
}
