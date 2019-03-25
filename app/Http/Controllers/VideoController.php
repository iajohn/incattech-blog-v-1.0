<?php

namespace App\Http\Controllers;

use Auth;
use App\Setting;
use App\Tag;
use Session;
use Image;
use Storage;
use DataTables;
use App\Category;
use App\Post;
use App\Video;
use Youtube;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos     = Video::orderBy('created_at', 'desc')->get();
        $title      = 'Published Posts';
        $settings   = Setting::first();
        $categories = Category::all();
        $tags       = Tag::all();

        return view('pages.backend.videos.index', compact('videos', 'title', 'settings', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = 'Create Video';
        $settings   = Setting::first();
        $categories = Category::all();
        $tags       = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0 ) 
        {
            Session::flash('info', 'You must have categories and tags before creating a post.');

            return redirect()->back();
        }

        return view('pages.backend.videos.create', compact('title', 'settings', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data=$request->all();
        $rules=[
            'video'         =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required',
            'title'         =>  'required',
            'description'   =>  'required',
            'category_id'   =>  'required',
            'tags'          =>  'required'
        ];
        
        $validator = $this->validate($data,$rules);

        if ($validator->fails()){
             return redirect()
                         ->back()
                         ->withErrors($validator)
                         ->withInput();
        }else{

                $video=$data['video'];

                $video_newName = time().$video->getClientOriginalExtension();

                $destinationPath = 'uploads/videos';

                $video->move($destinationPath, $video_newName);

                $videos = Video::create([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'video'         => 'uploads/videos/'. $video_newName,
                    'category_id'   => $request->category_id,
                    'slug'          => str_slug($request->title),
                    'user_id'       => Auth::id(),
                    'imgCredit'     => $request->imgCredit
                ]);

                $videos->tags()->attach($request->tags);

                Session::flash('success', 'Post created successfully.');

                return redirect()->route('posts');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function youtube_store(Request $request)
    {
        // $video = Youtube::upload($request->file('video')->getPathName(), [
        //     'title'       => $request->title,
        //     'description' => $request->content,
        //     'tags'        => ['Fashion', 'Technology', 'Youtube'],
        // ]);
         
        // return $video->getVideoId();

        $video = Youtube::upload($fullPathToVideo, [
            'title'       => $request->title,
            'description' => $request->content,
            'tags'        => ['Fashion', 'Technology', 'Youtube'],
        ]);

        return $video->getVideoId();
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
        $video      = Video::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        $title      = 'Update Post';
        $settings   = Setting::first();

        // return compact('post', 'categories','tags', 'title', 'settings');

        return view('pages.backend.videos.edit', compact('video', 'categories','tags', 'title', 'settings'));
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
        $this->validate($request,[
            'title'         =>  'required',
            'content'       =>  'required',
            'category_id'   =>  'required',
            'tags'          =>  'required'
        ]);

        $video   =   Video::find($id);

        if($request->hasFile('video'))
        {

            $video = $request->video;

            $video_new_name = time().$featured->getClientOriginalName();

            $destinationPath = public_path( 'uploads/videos/' .$video_new_name );

            // Image::make($featured)->resize(800, 600)->save('uploads/post/thumb/' .$featured_new_name, 90);
                        
            
            // $destinationPath = public_path('uploads/post');

            $video->move($destinationPath, $video_new_name);

            // $featured->move('uploads/post', $featured_new_name);

            // $old_featured_name = $post->featured;

            $video->video = 'uploads/videos/' . $video_new_name;

            // Storage::delete($old_featured_name);
        }

        $video->title        = $request->title;
        $video->content      = $request->content;
        $video->category_id  = $request->category_id;
        $video->slug         = str_slug($request->title);
        $video->imgCredit    = $request->imgCredit;

        $video->save();

        $video->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('videos'); 
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
