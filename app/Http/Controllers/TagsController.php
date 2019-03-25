<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use App\Tag;
use DataTables;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tags      = Tag::all();
        $title     = 'Tags';
        $settings  = Setting::first();

        return view('pages.backend.tags.index', compact('tags', 'title', 'settings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title     = 'Create Tags';
        $settings  = Setting::first();

        return view('pages.backend.tags.create', compact('title', 'settings'));

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
            'tag'         =>  'required'
        ]);

        $data = [
            'tag'=>$request['tag'],
            'slug'=>str_slug($request['tag'])
        ];

        Session::flash('success', 'Post created successfully.');
        
        return Tag::create($data);
        
        

        // Tag::create([
        //     'tag'   => $request->tag,
        //     'slug'  => str_slug($request->tag)
        // ]);

        // Session::flash('success', 'Tag created successfully.');

        // return redirect()->route('tags');
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

        $tag       = Tag::find($id);
        $title     = 'Update Tags';
        $settings  = Setting::first();

        // return compact('tags', 'title', 'settings');
        return view('pages.backend.tags.edit', compact('tag', 'title', 'settings'));

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
        $this->validate($request, [
            'tag'  =>  'required'
        ]);

        $tag   =   Tag::find($id);

        $tag->tag = $request->tag;
        $tag->slug  = str_slug($request->tag);

        $tag->save();

        Session::flash('success', 'Tag Updated successfully');

        return redirect()->route('tags');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('success', 'Tag deleted successfully');

        return redirect()->route('tags');
    }

    public function allTags()
    
    {
        
        $tags       = Tag::all();
        $title      = 'Published Posts';
        $settings   = Setting::first();
        // $categories = Category::all();

        return DataTables::of($tags)
                ->addColumn('action', function ($tags) { return
                            '<a href="tag/update/'.$tags->id.'" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>' .' '.
                            '<a onclick="deleteData('.$tags->id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                })->make(true);

        
                // ->editColumn('created_at', function ($post) {
                // return $post->created_at ? with(new Carbon($post->created_at))->format('Y/m/d') : '';
                //     })
                //     ->filterColumn('created_at', function ($query, $keyword) {
                //         $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
                //     })

    }
}
