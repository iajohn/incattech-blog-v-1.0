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
    <link href="{{ asset('frontend-theme/css/user_card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop

@section('content')
	
	<section class="single">
		<div class="container">
			<div class="row">
				@include('partials.frontend.posts.sidebar')				

				<div class="col-md-8">
					<ol class="breadcrumb mb-2">
					  	<li><a href="{{ url('/') }}">Home</a></li>
					  	<li>
					  		<a href="{{ route('category.single', [ 'slug' => $post->category->slug ]) }}"> {{ $post->category->name }} </a>
					  	</li>
					  	<li class="active">{{ $post->title }}</li>
					</ol>

					<article class="article main-article">
						<header>
							<!-- <h1></h1> -->
							<h1 class="article-title">{{ $post->title }}</h1>
							<ul class="details">
								<li>Posted on {{ $post->created_at->toFormattedDateString() }} </li>
								<li>
									<a href="{{ route('category.single', [ 'slug' => $post->category->slug ]) }}">{{ $post->category->name }}</a>
								</li>
								<li>By <a href="#">{{ $post->user->name }}</a></li>
							</ul>
						</header>

						<div class="main">
							<!-- <p>Pellentesque elementum tellus id mauris faucibus, id sagittis mauris rhoncus. Donec ac iaculis dui, id convallis mauris. Fusce faucibus purus eu risus pulvinar, vel rutrum velit hendrerit. Sed urna nunc, efficitur faucibus sollicitudin non.</p> -->
							<div class="featured">
								<figure>
									<img src="{{ $post->featured }}" alt="{{ $post->title }}">
									<!-- <img src="{{ asset('themes/frontend-theme/images/news/img01.jpg') }}"> -->
									<figcaption class="pull-right"> {{ $post->imgCredit }}</figcaption>
								</figure>
							</div>

							<p>
								{!! html_entity_decode($post->content) !!}
							</p>
						</div>
						<footer>
							<div class="col">
								<ul class="tags">
									@foreach($post->tags as $tag)
		                                <li><a href="{{ route('tag.single', [ 'slug' => $tag->slug ]) }}">{{ $tag->tag }}</a></li>
		                            @endforeach
								</ul>
							</div>
							<!-- <div class="col">
								<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
							</div> -->
						</footer>
					</article>

					<div class="sharing">
						<div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
						<div class="article-share social">
                            <a class="addthis_inline_share_toolbox"></a>
                        </div>
					</div>

					<div class="line">
						<div>Author</div>
					</div>
					<div class="author card">
						<figure>
							<img src="{{ asset($post->user->profile->avatar) }}">
						</figure>
						<div class="details">
							<div class="job">{{ $post->user->profile->job }}</div>
							<h3 class="name">{{ $post->user->name }}</h3>
							<p>{{ $post->user->profile->about }}.</p>
							<ul class="social trp sm">
								<li>
									<a href="{{ $post->user->profile->facebook }}" class="facebook">
										<svg><rect/></svg>
										<i class="ion-social-facebook"></i>
									</a>
								</li>
								<li>
									<a href="{{ $post->user->profile->twitter }}" class="twitter">
										<svg><rect/></svg>
										<i class="ion-social-twitter"></i>
									</a>
								</li>
								<li>
									<a href="{{ $post->user->profile->youtube }}" class="youtube">
										<svg><rect/></svg>
										<i class="ion-social-youtube"></i>
									</a>
								</li>
								<li>
									<a href="{{ $post->user->profile->instagram }}" class="instagram">
										<svg><rect/></svg>
										<i class="ion-social-instagram"></i>
									</a>
								</li>
								<li>
									<a href="{{ $post->user->profile->whatsapp }}" class="whatsapp">
										<svg><rect/></svg>
										<i class="ion-social-whatsapp"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="pagination-arrow">
                        @if($prev)
                            <a href="{{ route('post.single', [ 'slug' => $prev->slug ]) }}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <!-- <p class="btn-content-subtitle">{{ str_limit($prev->title) }}</p> -->
                                </div>
                            </a>
                        @endif

                        @if($next)
                            <a href="{{ route('post.single', [ 'slug' => $next->slug ]) }}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <!-- <p class="btn-content-subtitle">{{ str_limit($next->title) }}</p> -->
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="line">
						<div>Comments</div>
					</div>
					<div class="comments">
                        @include('partials.frontend.posts.disqus')
					</div>

					<div class="line"><div>You May Also Like</div></div>
						<div class="row">
							@foreach($post->category->posts()->inRandomOrder('created_at', 'desc')->take(2)->get()  as $P)
								<article class="article related col-md-6 col-sm-6 col-xs-12">
									<div class="inner">
										<figure>
											<a href="{{ route('post.single', [ 'slug' => $P->slug ]) }}">
												<img src="{{ $P->featured }}" alt="{{ $P->title }}">
											</a>
										</figure>
										<div class="padding">
											<h2>
												<a href="{{ route('post.single', [ 'slug' => $P->slug ]) }}">{{ $P->title }}</a>
											</h2>
											<div class="detail">
												<div class="time">{{ $P->created_at->toFormattedDateString() }}</div>
												<div class="category">
													<a href="{{ route('category.single', [ 'slug' => $P->category->slug ]) }}">
					                                    {{ $P->category->name }}
					                                </a>
												</div>
											</div>
										</div>
									</div>
								</article>
							@endforeach
						</div>
				</div>
			</div>
		</div>
	</section>

@stop

@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c641ac93a995141"></script>


    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('subscribed'))
            
            toastr.success("{{ Session::get('subscribed') }}")
        
        @endif
    </script>
@stop