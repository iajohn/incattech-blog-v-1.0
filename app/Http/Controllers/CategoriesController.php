<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::all();
        $title      = 'Categories';
        $settings   = Setting::first();

        return view('pages.backend.categories.index', compact('categories', 'title', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title      = 'Create Category';
        $settings   = Setting::first();

        return view('pages.backend.categories.create', compact('title', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug'  => str_slug($request->name)
        ]);

        Session::flash('success', 'category created.');

        return redirect()->route('categories');
    
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

        $category   = Category::find($id);
        $title      = 'Update Category';
        $settings   = Setting::first();
        return view('pages.backend.categories.edit', compact('category', 'title', 'settings'));
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
        $category = Category::find($id);

        $category->name = $request->name;

        $category->slug  = str_slug($request->name);

        $category->save();

        Session::flash('success', 'category updated successfully.');

        return redirect()->route('categories');
    }

    /**
     * Temporary Remove the specified resource from storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category   =   Category::find($id);

        foreach ($category->posts as $post) {
           $post->forceDelete();
        }

        $category->delete();

        Session::flash('success', 'Category was trashed successfully.');

        return redirect()->route('categories');
    }

    /**
     * Permanently Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    //     $category  =    Post::withTrashed()->where('id', $id)->first();

    //     $category->forceDelete();

    //     Session::flash('success', 'Category Permanently Deleted.');

    //     return redirect()->back();
    // }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function trashed()
    // {
    //     $categories   =   Category::onlyTrashed()->get();

    //     return view('backend.categories.trashed')->with('categories', $categories);
    // }

    /**
     * Restore deleted resource back into storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function restore($id)
    // {

    //     $category = Category::withTrashed()->where('id', $id)->first();

    //     $category->restore();

    //     Session::flash('success', 'Category restored successfully.');

    //     return redirect()->route('categories');
    // }

}
