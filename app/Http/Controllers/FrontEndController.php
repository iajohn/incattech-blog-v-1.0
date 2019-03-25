<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Newsletter;
use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use Mail;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title                 =  'Home | Incattech.com';
        $meta_title            =  'incattech';
        $meta_description      =  'Incattech is a Fashion Tech & Fashion Media Company based in Lagos Nigeria.';
        $meta_author           =  'Incattech.com';
        $meta_keyword          =  'incattech, media, fashion, technology, tech, clothing, AR, VR, AI, retail, sustainability';
        $categories            =   Category::take(7)->get();
        // $posts                 =   Post::orderBy('created_at', 'desc')->paginate(10);
        $randomPosts           =   Post::inRandomOrder('view_count', 'desc')->take(3)->get();
        $editors_pick          =   Post::where('editors_pick', 1)->orderBy('created_at', 'desc')->get();
        $tags                  =   Tag::all();
        $recomended            =   Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->take(1)->get();
        $moreRecomended        =   Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $mostRead              =   Post::orderBy('view_count', 'desc')->take(1)->get();
        $lessMostRead          =   Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $first_post            =   Post::orderBy('created_at', 'desc')->first();
        $second_post           =   Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post            =   Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $after_second_post     =   Post::orderBy('created_at', 'desc')->skip(2)->take(3)->get();
        $_1                    =   Category::find(1);
        $_2                    =   Category::find(2);
        $_3                    =   Category::find(3);
        $_4                    =   Category::find(4);
        $_5                    =   Category::find(5);
        $_6                    =   Category::find(6);
        $_7                    =   Category::find(7);
        $_8                    =   Category::find(8);
        $_9                    =   Category::find(9);
        $_10                   =   Category::find(10);
        $_11                   =   Category::find(11);
        $settings              =   Setting::first();
        $business              =   Post::where('category_id', 7)
                                       ->orderBy('view_count', 'desc')->get();

        return view('pages.frontend.index', compact('title', 'meta_title', 'meta_description', 'meta_keyword', 'meta_author', 'categories', 'category', 
                    'randomPosts', 'mostRead', 'recomended', 'moreRecomended', 'editors_pick', 'lessMostRead', 'first_post', 
                    'second_post', 'third_post', 'tags', 'after_second_post', '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 
                    'settings', 'business'));
    }

    /**
     * Show single post page.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        $post       = Post::where('slug', $slug)->first();
        $title      = $post->title;
        $blogKey    = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }

        $tags         = Tag::all();
        $settings     = Setting::first();
        $categories   = Category::take(7)->get();
        $randomPosts  = Post::inRandomOrder('view_count')->take(3)->get();
        $editors_pick = Post::where('editors_pick',1)->orderBy('created_at', 'desc')->get();
        $mostRead     = Post::orderBy('view_count', 'desc')->take(1)->get();
        $lessMostRead = Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $recentPost   = Post::orderBy('created_at', 'desc')->take(1)->get();
        $moreRecent   = Post::orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        $_1           = Category::find(1);
        $_2           = Category::find(2);
        $_3           = Category::find(3);
        $_4           = Category::find(4);
        $_5           = Category::find(5);
        $_6           = Category::find(6);
        $_7           = Category::find(7);
        $_8           = Category::find(8);
        $_9           = Category::find(9);
        $_10          = Category::find(10);
        $_11          = Category::find(11);
        $business     = Post::where('category_id', 6)
                            ->with('category_id', 7)
                            ->with('category_id', 8)
                            ->orderBy('view_count', 'desc')->get();
        $next_post    = Post::where('id', '>', $post->id)->min('id');
        $prev_post    = Post::where('id', '<', $post->id)->max('id');

        return view('pages.frontend.single', compact('post', 'title', 'settings', 'categories', 'randomPosts', 'mostRead', 'tags',
                                                     'editors_pick', 'categories', 'mostRead', 'lessMostRead', 'recentPost', 'moreRecent',
                                                     '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'business'))
                                             ->with('next', Post::find($next_post))
                                             ->with('prev', Post::find($prev_post));
    }

    public function category($slug)
    {
        $category     = Category::where('slug', $slug)->first();
        $title        = $category->name;
        $settings     = Setting::first();
        $categories   = Category::take(7)->get();
        $tags         = Tag::all();
        $randomPosts  = Post::inRandomOrder('view_count')->take(3)->get();
        $editors_pick = Post::where('editors_pick',1)->orderBy('created_at', 'desc')->get();
        $mostRead     = Post::orderBy('view_count', 'desc')->take(1)->get();
        $lessMostRead = Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $recentPost   = Post::orderBy('created_at', 'desc')->take(1)->get();
        $moreRecent   = Post::orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        $_1           = Category::find(1);
        $_2           = Category::find(2);
        $_3           = Category::find(3);
        $_4           = Category::find(4);
        $_5           = Category::find(5);
        $_6           = Category::find(6);
        $_7           = Category::find(7);
        $_8           = Category::find(8);
        $_9           = Category::find(9);
        $_10          = Category::find(10);
        $_11          = Category::find(11);
        $business     = Post::where('category_id', 6)
                            ->with('category_id', 7)
                            ->with('category_id', 8)
                            ->orderBy('view_count', 'desc')->get();

        return view('pages.frontend.category', compact('category', 'title', 'settings', 'categories', 'tags', 'randomPosts', 'mostRead', 
                                                 'editors_pick', 'categories',  'mostRead', 'lessMostRead', 'recentPost', 'moreRecent',
                                                 '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'business'))
                                                ->with('posts', $category->posts()->paginate(10));
    }

    public function tag($slug)
    {

        $tag          = Tag::where('slug', $slug)->first();
        $tags         = Tag::all();
        $title        = $tag->tag;
        $settings     = Setting::first();
        $categories   = Category::take(7)->get();
        $randomPosts  = Post::inRandomOrder('view_count')->take(3)->get();
        $editors_pick = Post::where('editors_pick',1)->orderBy('created_at', 'desc')->get();
        $mostRead     = Post::orderBy('view_count', 'desc')->take(1)->get();
        $lessMostRead = Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $recentPost   = Post::orderBy('created_at', 'desc')->take(1)->get();
        $moreRecent   = Post::orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        $_1           = Category::find(1);
        $_2           = Category::find(2);
        $_3           = Category::find(3);
        $_4           = Category::find(4);
        $_5           = Category::find(5);
        $_6           = Category::find(6);
        $_7           = Category::find(7);
        $_8           = Category::find(8);
        $_9           = Category::find(9);
        $_10          = Category::find(10);
        $_11          = Category::find(11);
        $business     = Post::where('category_id', 6)
                            ->with('category_id', 7)
                            ->with('category_id', 8)
                            ->orderBy('view_count', 'desc')->get();

        return view('pages.frontend.tag', compact('title', 'settings', 'categories', 'randomPosts', 'mostRead', 'tags',
                                                 'editors_pick', 'categories',  'mostRead', 'lessMostRead', 'recentPost', 'moreRecent',
                                                 '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'business'))
                                          ->with('tag', $tag)
                                          ->with('posts', $tag->posts()->paginate(10));;
    }

    public function profile()
    {

        $user     = Auth::user();
        $title    = Auth::user()->name;
        $settings = Setting::first();
        $tags     = Tag::all();

        return view('pages.frontend.profile', compact('user', 'tags', 'title', 'settings'));
    }

    public function editors_pick()
    {
        $post           = Post::all();
        $title          = "Editor's Pick";
        $settings       = Setting::first();
        $categories     = Category::take(7)->get();
        $tags           = Tag::all();
        $editors_pick   = Post::where('editors_pick',1)->get();

        return view('pages.frontend.editors_pick', compact('post', 'category', 'title', 'settings', 'categories', 
                    'tags', 'editors_pick'));
    }

    public function about()
    {

        $title         = 'About Us';
        $categories    = Category::take(7)->get();
        $randomPosts   = Post::inRandomOrder('view_count', 'desc')->take(3)->get();
        $editors_pick  = Post::where('editors_pick', 1)->orderBy('created_at', 'desc')->get();
        $tags          = Tag::all();
        // $recomended      = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->take(1)->get();
        // $moreRecomended  = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        // $mostRead        =   Post::orderBy('view_count', 'desc')->take(1)->get();
        // $lessMostRead    =   Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $_1            =   Category::find(1);
        $_2            =   Category::find(2);
        $_3            =   Category::find(3);
        $_4            =   Category::find(4);
        $_5            =   Category::find(5);
        $_6            =   Category::find(6);
        $_7            =   Category::find(7);
        $_8            =   Category::find(8);
        $_9            =   Category::find(9);
        $_10           =   Category::find(10);
        $_11           =   Category::find(11);
        $settings      =   Setting::first();
        $business      = Post::where('category_id', 6)
                               ->with('category_id', 7)
                               ->with('category_id', 8)
                               ->orderBy('view_count', 'desc')->get();
        return view('pages.frontend.about', compact('title', 'settings', 'categories', 'randomPosts', 'tags', 'mostRead', 'recomended', 'moreRecomended', 
                    'editors_pick', 'lessMostRead', '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'settings', 'business'));
    }

    public function contact()
    {

        $title           = 'Contact Us';
        $categories      = Category::take(7)->get();
        $randomPosts     = Post::inRandomOrder('view_count', 'desc')->take(3)->get();
        $editors_pick    = Post::where('editors_pick', 1)->orderBy('created_at', 'desc')->get();
        $tags         = Tag::all();
        // $recomended      = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->take(1)->get();
        // $moreRecomended  = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        // $mostRead        =   Post::orderBy('view_count', 'desc')->take(1)->get();
        // $lessMostRead    =   Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $_1              =   Category::find(1);
        $_2              =   Category::find(2);
        $_3              =   Category::find(3);
        $_4              =   Category::find(4);
        $_5              =   Category::find(5);
        $_6              =   Category::find(6);
        $_7              =   Category::find(7);
        $_8              =   Category::find(8);
        $_9              =   Category::find(9);
        $_10             =   Category::find(10);
        $_11             =   Category::find(11);
        $settings        =   Setting::first();
        $business        = Post::where('category_id', 6)
                                ->with('category_id', 7)
                                ->with('category_id', 8)
                                ->orderBy('view_count', 'desc')->get();
        $interview       = Post::where('category_id', 9)
                               ->orderBy('view_count', 'desc')->get();

        return view('pages.frontend.contact', compact('title', 'settings', 'categories', 'randomPosts', 'tags', 'mostRead', 'recomended', 'moreRecomended', 
                    'editors_pick', 'lessMostRead', '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'settings', 'business', 'interview'));
    }

    public function policy()
    {

        $title         = 'Private Policy';
        $categories    = Category::take(7)->get();
        $randomPosts   = Post::inRandomOrder('view_count', 'desc')->take(3)->get();
        $editors_pick  = Post::where('editors_pick', 1)->orderBy('created_at', 'desc')->get();
        $tags          = Tag::all();
        // $recomended      = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->take(1)->get();
        // $moreRecomended  = Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        // $mostRead        =   Post::orderBy('view_count', 'desc')->take(1)->get();
        // $lessMostRead    =   Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $_1            =    Category::find(1);
        $_2            =    Category::find(2);
        $_3            =    Category::find(3);
        $_4            =    Category::find(4);
        $_5            =    Category::find(5);
        $_6            =    Category::find(6);
        $_7            =    Category::find(7);
        $_8            =    Category::find(8);
        $_9            =    Category::find(9);
        $_10           =    Category::find(10);
        $_11           =    Category::find(11);
        $settings      =    Setting::first();
        $business      =    Post::where('category_id', 6)
                               ->with('category_id', 7)
                               ->with('category_id', 8)
                               ->orderBy('view_count', 'desc')->get();
        return view('pages.frontend.policy', compact('title', 'settings', 'categories', 'randomPosts', 'tags', 'mostRead', 'recomended', 'moreRecomended', 
                    'editors_pick', 'lessMostRead', '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'settings', 'business'));
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'min:10',
            'message' => 'min:40'
        ]);

        $data = array(
            'name'        => $request->name,
            'email'       => $request->email,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('pages.frontend.emails.message', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('info@incattech.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect()->back(); 
        // return redirect('/');
    }

    public function subscribe()
    {
        $this->validate(request(), [
            'email' => 'required|email'
        ]);

        $email = request()->email;

        Newsletter::subscribe($email);

        Session::flash('subscribed', 'You have successfully subscribed to our newsletter');

        return redirect()->back(); 
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
