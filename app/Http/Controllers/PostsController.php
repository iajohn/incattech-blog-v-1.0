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
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts      = Post::orderBy('created_at', 'desc')->get();
        $title      = 'Published Posts';
        $settings   = Setting::first();
        $categories = Category::all();
        $tags       = Tag::all();

        return view('pages.backend.posts.index', compact('posts', 'title', 'settings', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        $title      = 'Create Post';
        $settings   = Setting::first();
        $categories = Category::all();
        $tags       = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0 ) 
        {
            Session::flash('info', 'You must have categories and tags before creating a post.');

            return redirect()->back();
        }

        return view('pages.backend.posts.create', compact('title', 'settings', 'categories', 'tags'));
    
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
            'title'         =>  'required|max:250',
            'featured'      =>  'required|image',
            'content'       =>  'required',
            'category_id'   =>  'required',
            'tags'          =>  'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $path = public_path('uploads/post/thumb' );

        Image::make($featured)->resize(800, 600)->save('uploads/post/thumb/' .$featured_new_name, 90);
                    
        $destinationPath = public_path('uploads/post');

        $featured->move($destinationPath, $featured_new_name);


        $post = Post::create([
            'title'         => $request->title,
            'content'       => $request->content,
            'featured'      => 'uploads/post/thumb/'. $featured_new_name,
            'category_id'   => $request->category_id,
            'slug'          => str_slug($request->title),
            'user_id'       => Auth::id(),
            'imgCredit'     => $request->imgCredit
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully.');

        return redirect()->route('posts');

        // $data = [
        //     'title'         => $request->title,
        //     'content'       => $request->content,
        //     'featured'      => 'uploads/post/'. $featured_new_name,
        //     'category_id'   => $request->category_id,
        //     'slug'          => str_slug($request->title),
        //     'user_id'       => Auth::id()
        // ];

        // Session::flash('success', 'Post created successfully.');
        
        // return Post::create($data)->tags()->attach($request->tags);

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

        $post       = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        $title      = 'Update Post';
        $settings   = Setting::first();

        // return compact('post', 'categories','tags', 'title', 'settings');

        return view('pages.backend.posts.edit', compact('post', 'categories','tags', 'title', 'settings'));
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

        $post   =   Post::find($id);

        if($request->hasFile('featured'))
        {

            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $path = public_path( 'uploads/post/thumb/' .$featured_new_name );

            Image::make($featured)->resize(800, 600)->save('uploads/post/thumb/' .$featured_new_name, 90);
                        
            
            $destinationPath = public_path('uploads/post');

            $featured->move($destinationPath, $featured_new_name);

            // $featured->move('uploads/post', $featured_new_name);

            $old_featured_name = $post->featured;

            $post->featured = 'uploads/post/thumb/' . $featured_new_name;

            Storage::delete($old_featured_name);
        }

        $post->title        = $request->title;
        $post->content      = $request->content;
        $post->category_id  = $request->category_id;
        $post->slug         = str_slug($request->title);
        $post->imgCredit    = $request->imgCredit;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('posts'); 
    }

    /**
     * Change Posts Editors Pick.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editors($id)
    {
        $post = Post::find($id);

        $post->editors_pick = 1;

        $post->save();

        Session::flash('success', 'Successfully pick post.');

        return redirect()->back();

    }

    public function not_editors($id)
    {
        $post = Post::find($id);

        $post->editors_pick = 0;

        $post->save();

        Session::flash('success', 'Successfully unpick post.');

        return redirect()->back();

    }

    /**
     * Temporary Remove the specified resource from storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $post   =   Post::find($id);

        $post->delete();

        // Session::flash('success', 'Post was trashed successfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post  =    Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently.');

        return redirect()->back();
    }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {

        $posts    = Post::onlyTrashed()->get();
        $title    = 'Trashed Posts';
        $settings = Setting::first();

        return view('pages.backend.posts.trashed', compact('posts', 'title', 'settings'));
    }

    /**
     * Restore deleted resource back into storage .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully.');

        return redirect()->route('posts');
    }

    public function allPosts()
    {
        
        $posts = Post::all();
        $title      = 'Published Posts';
        $settings   = Setting::first();
        $categories = Category::all();
        $tags       = Tag::all();

        return DataTables::of($posts)
                ->addColumn('action', function ($post) { return
                            '<a onclick="editPost('.$post->id.')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>' .' '.
                            '<a onclick="deleteData('.$post->id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                })->make(true);

        
                // ->editColumn('created_at', function ($post) {
                // return $post->created_at ? with(new Carbon($post->created_at))->format('Y/m/d') : '';
                //     })
                //     ->filterColumn('created_at', function ($query, $keyword) {
                //         $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
                //     })

    }

}
