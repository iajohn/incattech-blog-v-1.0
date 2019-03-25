@extends('layouts.frontend')

@section('meta')
    @include('meta::manager', [
        'robots'        => 'index',
        'title'         => $title,
        'description'   => 'Welcome to Incattech.com, the media arm of Incattech. Incattech is a Fashion Tech & Fashion Media Company based in Lagos Nigeria.',
        'image'         => 'https://incattech.com',
        'author'        => 'Incattech.com',
        'keywords'      => $title . ', ' . 'incattech, media, fashion, technology, tech, clothing, AR, VR, AI, retail, sustainability',
        'geo_region'    => 'Lagos Nigeria',
        'geo_position'  => '4.870467,6.993388',
    ])
@stop 

@section('styles')
	<style type="text/css">
		.category-links .pagination > li:first-child > span {
		    margin-left: 0px;
		    border-top-left-radius: 50%;
		    border-bottom-left-radius: 50%;
		    padding: 6px 13px;
		    margin-right: 3px;

		}
		.category-links .pagination > .active > span{
		    z-index: 3;
		    color: #fff;
		    cursor: default;
		    background-color: #f73f52 !important;
		    border-color: #f73f52 !important;

		}
		.category-links .pagination > li > a, .pagination > li > span {
		    position: relative;
		    float: left;
		    padding: 6px 12px;
		    margin-left: -1px;
		    line-height: 1.42857143;
		    color: #f73f52;
		    text-decoration: none;
		    background-color: #fff;
		    border: 1px solid #ddd;
		    border-top-color: rgb(221, 221, 221);
		    border-right-color: rgb(221, 221, 221);
		    border-bottom-color: rgb(221, 221, 221);
		    border-left-color: rgb(221, 221, 221);
		    border-radius: 50%;
		}
		.category-links .pagination > .disabled > span{
			color: #777;
		    cursor: not-allowed;
		    background-color: #f2f2f2;
		    border-color: #ddd;

		}
	</style>
    <link href="{{ asset('themes/backend-theme/css/toastr.min.css') }}" rel="stylesheet">
@stop
@section('content')
	<section class="category">
	  	<div class="container">
		    <div class="row">
		      	<div class="col-md-8 text-left">
			        <div class="row">
			          	<div class="col-md-12">        
				            <ol class="breadcrumb mb-2">
							  	<li><a href="{{ url('/') }}">Home</a></li>
							  	<li class="active">
							  		{{ $tag->tag }}
							  	</li>
							</ol>
				            <div class="section-title">
		                        <h2 class="title page-title">{{ __('#') }} {{ $tag->tag }}</h2>
		                    </div>
			            	<p class="page-subtitle">Showing all posts with tag <i>{{ $tag->tag }}</i></p>
			          	</div>
			        </div>
			        
			        <div class="line"></div>
			        
			        <div class="row">
			        	@if($posts->count() > 0)
                            @foreach($posts as $post)
					         	<article class="col-md-12 article-list">
						            <div class="inner">
						             	<figure class="article-img">
						             		<a href="{{ route('post.single', [ 'slug' => $post->slug ]) }}">
							                	<img src="{{ $post->featured }}" alt="{{ $post->title}}">
						                	</a>
						              	</figure>
						              	<div class="details">
							                <div class="detail">
							                  	
							                  	<div class="category">
							                  		Posted in
							                   		<a href="{{ route('category.single', [ 'slug' => $post->category->slug ]) }}"> {{ $post->category->name }}</a>
							                  	</div>
							                  	
							                  	<div class="time"> on {{ $post->created_at->toFormattedDateString() }}</div>

							                  	<div class="category"> By <a href="#">{{ $post->user->name }}</a></div>
							                </div>
							                <h1>
							                	<a href="{{ route('post.single', [ 'slug' => $post->slug ]) }}">{{ $post->title }}</a>
							                </h1>
							                <p>
								            	{!! str_limit( $post->content ) !!}
							                </p>
								            <footer>
								                <a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $post->slug ]) }}">
								                    <div>More</div>
								                    <div><i class="ion-ios-arrow-thin-right"></i></div>
								                </a>
							                </footer>
						              	</div>
						            </div>
					         	</article>
                            @endforeach

	                        @else
	                        <div class="">
	                            <div class="alert alert-info text-center">
	                                {{ __('Sorry, there are no posts in this tag check later!') }}
	                            </div>                   
	                        </div>
	                    @endif
			          
				        <div class="col-md-12 text-center category-links">
				            <ul class="pagination">
			          			{{ $posts->links() }}
				              	<!-- <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
				              	<li class="active"><a href="#">1</a></li>
				              	<li><a href="#">2</a></li>
				              	<li><a href="#">3</a></li>
				              	<li><a href="#">...</a></li>
				              	<li><a href="#">97</a></li>
				              	<li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li> -->
				            </ul>
				            <!-- <div class="pagination-help-text">
				            	Showing 8 results of 776 &mdash; Page 1
				            </div> -->
			          	</div>
			        </div>
		      	</div>

		      	@include('partials.frontend.category.sidebar')	

		    </div>
	  	</div>
	</section>
@stop

@section('scripts')
    <script src="{{ asset('themes/backend-theme/js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('subscribed'))
            
            toastr.success("{{ Session::get('subscribed') }}")
        
        @endif
    </script>
@stop