<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Active;
use App\User;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $date           = Carbon::today();
        $title          = 'Dashboard';
        $settings       = Setting::first();
        $posts_count    = Post::all()->count();
        $posts          = Post::all();
        $trashed_post   = Post::onlyTrashed()->get()->count();
        $users_count    = User::all()->count();
        $admin_count    = User::where('admin',1)->count();
        $editors_pick_count    =   Post::where('editors_pick',1)->count();
        $new_user_today = User::where('admin',1)
                                ->where('created_at', $date)->count();
        // $online_users   = User::where('admin', 1)->with('posts', $posts)
        //                                         ->orderBy('posts_count','desc');
        $active_users   = Active::users()->get();
        $a_users_24h    = Active::usersWithinHours(24)->count();
        $a_users_7d     = Active::usersWithinHours(168)->count();
        $active_guests  = Active::guests()->get();
        //$users = Active::users()->mostRecent()->get();
        $numberOfUsers  = Active::users()->count();
        $numberOfGuests = Active::guests()->count();
        $category_count = Category::all()->count();
        $tags_count     = Tag::all()->count();

        //fetch the most visited pages for today and the past week
        // $mostVisitedPage = Analytics::fetchMostVisitedPages(Period::days(7));

        //fetch visitors and page views for the past week
        // $visitorPage = Analytics::fetchVisitorsAndPageViews(Period::days(7));
       

        return view('pages.backend.dashboard.dashboard',compact('title', 'settings', 'posts_count', 'trashed_post', 
                    'users_count', 'admin_count', 'editors_pick_count', 'new_user_today', 'online_users', 'active_users', 
                    'a_users_24h', 'a_users_7d', 'active_guests', 'numberOfUsers', 'numberOfGuests', 'category_count','tags_count',
                    'mostVisitedPage', 'visitorPage'));

        // return view('home');
    }
}
