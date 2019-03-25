<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
|
*/	

	Route::get('/', [
		'uses'	=> 'FrontEndController@index',
		'as'	=> 'index'
	]);

	Route::get('/profile', [
		'uses'	=> 'FrontEndController@profile',
		'as'	=> 'profile'
	]);

	Route::get('/about', [
		'uses'	=> 'FrontEndController@about',
		'as'	=> 'about'
	]);

	Route::get('/contact', [
		'uses'	=> 'FrontEndController@contact',
		'as'	=> 'contact'
	]);

	Route::post('/contact', [
		'uses'	=> 'FrontEndController@postContact',
		'as'	=> 'contact.send'
	]);

	Route::get('/policy', [
		'uses'	=> 'FrontEndController@policy',
		'as'	=> 'policy'
	]);

	Route::post('/subscribe', [
		'uses'	=> 'FrontEndController@subscribe',
		'as'	=> 'subscribe'
	]);

	Route::get('/results', function(){
		$posts		  = \App\Post::where('title', 'like', '%' . request('search') . '%' )->get();
		$tag         = \App\Tag::where('tag', 'like', '%' . request('search') . '%' )->get();
		$cats 		  = \App\Category::where('name', 'like', '%' . request('search') . '%' )->get();
		$title		  = 'Search results:' . '' . request('search');
		$settings 	  = \App\Setting::first();
		$categories   = \App\Category::take(5)->get();
        $randomPosts  = \App\Post::inRandomOrder('view_count', 'desc')->take(3)->get();
        $editors_pick = \App\Post::where('editors_pick', 1)->orderBy('created_at', 'desc')->get();
        $tags         = \App\Tag::all();
        // $recomended      = \App\Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->take(1)->get();
        // $moreRecomended  = \App\Post::where('editors_pick', 1)->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        // $mostRead        = \App\Post::orderBy('view_count', 'desc')->take(1)->get();
        // $lessMostRead    = \App\Post::orderBy('view_count', 'desc')->skip(1)->take(3)->get();
        $_1           =   \App\Category::find(1);
        $_2           =   \App\Category::find(2);
        $_3           =   \App\Category::find(3);
        $_4           =   \App\Category::find(4);
        $_5           =   \App\Category::find(5);
        $_6           =   \App\Category::find(6);
        $_7           =   \App\Category::find(7);
        $_8           =   \App\Category::find(8);
        $_9           =   \App\Category::find(9);
        $_10          =   \App\Category::find(10);
        $_11          =   \App\Category::find(11);
		$search 	  = request('search');

		return view('pages.frontend.results', compact('posts', 'tags', 'cats', 'title', 'settings','categories', 'randomPosts', 'mostRead', 'recomended', 'moreRecomended', 
                    'editors_pick', 'lessMostRead', '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', 'search'))
                ->with('tag', $tag); 
	});

	Route::get('/editors-pick', [
		'uses'	=> 'FrontEndController@editors_pick',
		'as'	=> 'editors-pick'
	]);

	Route::get('/post/{slug}', [
		'uses'	=> 'FrontEndController@singlePost',
		'as'	=> 'post.single'
	]);

	Route::get('/category/{slug}', [
		'uses'	=> 'FrontEndController@category',
		'as'	=> 'category.single'
	]);

	Route::get('/tag/{slug}', [
		'uses'	=> 'FrontEndController@tag',
		'as'	=> 'tag.single'
	]);

	Auth::routes();


/*
|--------------------------------------------------------------------------
| BACKEND middleware GROUP ROUTES
|--------------------------------------------------------------------------
|
*/	

	Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function(){

	/*
	|--------------------------------------------------------------------------
	| 	DASHBOARD ROUTES
	|--------------------------------------------------------------------------
	|
	*/	

		Route::get('/dashboard', [
			'uses'	=> 'HomeController@index',
			'as'	=> 'home'
		]);


	/*
	|--------------------------------------------------------------------------
	|   USERS ROUTES
	|--------------------------------------------------------------------------
	|
	*/
		Route::get('/users', [
			'uses'	=> 'UsersController@index',
			'as'	=> 'users'
		]);

		Route::get('/user/create', [
			'uses'	=> 'UsersController@create',
			'as'	=> 'user.create'
		]);

		Route::post('/user/store', [
			'uses'	=> 'UsersController@store',
			'as'	=> 'user.store'
		]);

		Route::get('user/admin/{id}', [
			'uses'	=> 'UsersController@admin',
			'as'	=> 'user.admin'
		]);

		Route::get('user/not-admin/{id}', [
			'uses'	=> 'UsersController@not_admin',
			'as'	=> 'user.not.admin'
		]);

		Route::post('/user/update/{id}', [
			'uses'	=> 'UsersController@update',
			'as'	=> 'user.update'
		]);

		Route::get('/user/delete/{id}', [
			'uses'	=> 'UsersController@destroy',
			'as'	=> 'user.delete'
		]);

		Route::get('/user/destroy/{id}', [
			'uses'	=> 'UsersController@destroy',
			'as'	=> 'user.destroy'
		]);

		Route::get('/users/trashed', [
			'uses'	=> 'UsersController@trashed',
			'as'	=> 'users.trashed'
		]);

		Route::get('/user/restore/{id}', [
			'uses'	=> 'UsersController@restore',
			'as'	=> 'user.restore'
		]);


	/*
	|--------------------------------------------------------------------------
	|   USER PROFILE ROUTES
	|--------------------------------------------------------------------------
	|
	*/
		Route::get('user/profile', [
			'uses'	=> 'ProfilesController@index',
			'as'	=> 'user.profile'
		]);

		Route::get('user/profile/edit', [
			'uses'	=> 'ProfilesController@edit',
			'as'	=> 'user.profile.edit'
		]);

		Route::post('/user/profile/update', [
			'uses'	=> 'ProfilesController@update',
			'as'	=> 'user.profile.update'
		]);



	/*
	|--------------------------------------------------------------------------
	| 	POSTS ROUTES
	|--------------------------------------------------------------------------
	|
	*/

		// Route::resource('posts', 'PostsController');

		// Route::get('/all/posts', [
		// 	'uses'	=> 'PostsController@allPosts',
		// 	'as'	=> 'all-posts'
		// ]);

		Route::get('/post/create', [
			'uses'	=> 'PostsController@create',
			'as'	=> 'post.create'
		]);

		Route::get('/posts', [
			'uses'	=> 'PostsController@index',
			'as'	=> 'posts'
		]);

		Route::post('/post/store', [
			'uses'	=> 'PostsController@store',
			'as'	=> 'post.store'
		]);

		// Route::post('/post/store', [
		// 	'middleware' => 'cors',
		// 	'uses' => 'PostsController@store',
		// 	'as'	=> 'post.store'
		// ]);

		Route::get('/post/update/{id}', [
			'uses'	=> 'PostsController@edit',
			'as'	=> 'post.edit'
		]);

		Route::post('/post/update/{id}', [
			'uses'	=> 'PostsController@update',
			'as'	=> 'post.update'
		]);

		Route::get('post/editors/{id}', [
			'uses'	=> 'PostsController@editors',
			'as'	=> 'post.editors'
		]);

		Route::get('post/not-editors/{id}', [
			'uses'	=> 'PostsController@not_editors',
			'as'	=> 'post.not.editors'
		]);

		Route::get('/post/delete/{id}', [
			'uses'	=> 'PostsController@delete',
			'as'	=> 'post.delete'
		]);

		Route::get('/post/destroy/{id}', [
			'uses'	=> 'PostsController@destroy',
			'as'	=> 'post.destroy'
		]);

		Route::get('/posts/trashed', [
			'uses'	=> 'PostsController@trashed',
			'as'	=> 'posts.trashed'
		]);

		Route::get('/post/restore/{id}', [
			'uses'	=> 'PostsController@restore',
			'as'	=> 'post.restore'
		]);


	/*
	|--------------------------------------------------------------------------
	| 	CATEGORIES ROUTES
	|--------------------------------------------------------------------------
	|
	*/


		Route::get('/category/create', [
			'uses'	=> 'CategoriesController@create',
			'as'	=> 'category.create'
		]);

		Route::get('/categories', [
			'uses'	=> 'CategoriesController@index',
			'as'	=> 'categories'
		]);

		Route::post('/category/store', [
			'uses'	=> 'CategoriesController@store',
			'as'	=> 'category.store'
		]);

		Route::get('/category/update/{id}', [
			'uses'	=> 'CategoriesController@edit',
			'as'	=> 'category.edit'
		]);

		Route::post('/category/update/{id}', [
			'uses'	=> 'CategoriesController@update',
			'as'	=> 'category.update'
		]);

		Route::get('/category/delete/{id}', [
			'uses'	=> 'CategoriesController@destroy',
			'as'	=> 'category.delete'
		]);




	/*
	|--------------------------------------------------------------------------
	|   TAGS ROUTES
	|--------------------------------------------------------------------------
	|
	*/

		Route::get('/all/tags', [
			'uses'	=> 'TagsController@allTags',
			'as'	=> 'all-tags'
		]);

		Route::get('/tags', [
			'uses'	=> 'TagsController@index',
			'as'	=> 'tags'
		]);

		Route::get('/tag/create', [
			'uses'	=> 'TagsController@create',
			'as'	=> 'tag.create'
		]);

		Route::post('/tag/store', [
			'uses'	=> 'TagsController@store',
			'as'	=> 'tag.store'
		]);

		Route::get('/tag/update/{id}', [
			'uses'	=> 'TagsController@edit',
			'as'	=> 'tag.edit'
		]);

		Route::post('/tag/update/{id}', [
			'uses'	=> 'TagsController@update',
			'as'	=> 'tag.update'
		]);

		Route::get('/tag/delete/{id}', [
			'uses'	=> 'TagsController@destroy',
			'as'	=> 'tag.delete'
		]);


	/*
	|--------------------------------------------------------------------------
	|  Youtube VIDEOS ROUTES
	|--------------------------------------------------------------------------
	|
	*/

		Route::get('/video', [
		'uses'	=> 'VideoController@index',
		'as'	=> 'video'
		]);

		Route::get('/video/create', [
			'uses'	=> 'VideoController@create',
			'as'	=> 'video.create'
		]);

		Route::post('/video/create', [
			'uses'	=> 'VideoController@store',
			'as'	=> 'video.store'
		]);

		/*
	|--------------------------------------------------------------------------
	| 	VIDEOS ROUTES
	|--------------------------------------------------------------------------
	|
	*/

		// Route::resource('posts', 'PostsController');

		// Route::get('/all/posts', [
		// 	'uses'	=> 'PostsController@allPosts',
		// 	'as'	=> 'all-posts'
		// ]);

		Route::get('/video/create', [
			'uses'	=> 'VideoController@create',
			'as'	=> 'video.create'
		]);

		Route::get('/videos', [
			'uses'	=> 'VideoController@index',
			'as'	=> 'videos'
		]);

		Route::post('/video/store', [
			'uses'	=> 'VideoController@store',
			'as'	=> 'video.store'
		]);

		// Route::post('/post/store', [
		// 	'middleware' => 'cors',
		// 	'uses' => 'PostsController@store',
		// 	'as'	=> 'post.store'
		// ]);

		Route::get('/video/update/{id}', [
			'uses'	=> 'VideoController@edit',
			'as'	=> 'video.edit'
		]);

		Route::post('/video/update/{id}', [
			'uses'	=> 'VideoController@update',
			'as'	=> 'video.update'
		]);

		Route::get('video/editors/{id}', [
			'uses'	=> 'VideoController@editors',
			'as'	=> 'video.editors'
		]);

		Route::get('video/not-editors/{id}', [
			'uses'	=> 'VideoController@not_editors',
			'as'	=> 'video.not.editors'
		]);

		Route::get('/video/delete/{id}', [
			'uses'	=> 'VideoController@delete',
			'as'	=> 'video.delete'
		]);

		Route::get('/video/destroy/{id}', [
			'uses'	=> 'VideoController@destroy',
			'as'	=> 'video.destroy'
		]);

		Route::get('/videos/trashed', [
			'uses'	=> 'VideoController@trashed',
			'as'	=> 'videos.trashed'
		]);

		Route::get('/video/restore/{id}', [
			'uses'	=> 'VideoController@restore',
			'as'	=> 'video.restore'
		]);



	/*
	|--------------------------------------------------------------------------
	|   SETTINGS ROUTES
	|--------------------------------------------------------------------------
	|
	*/

		Route::get('/settings', [
			'uses'	=> 'SettingsController@index',
			'as'	=> 'settings'
		]);

		Route::post('/settings', [
			'uses'	=> 'SettingsController@update',
			'as'	=> 'settings.update'
		]);

});

