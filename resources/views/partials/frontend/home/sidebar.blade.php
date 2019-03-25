<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
	<div class="sidebar-title for-tablet">Sidebar</div>
	
	<aside>
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li class="active">
				<a href="#for-you" aria-controls="for-you" role="tab" data-toggle="tab">
					<!-- <i class="ion-android-star-outline"></i>  -->
					{{ __('Recomended') }}
				</a>
			</li>
			<li>
				<a href="#top-post" aria-controls="top-post" role="tab" data-toggle="tab">
					<!-- <i class="ion-ios-chatboxes-outline"></i>  -->
					{{ __('Top Post') }}
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="for-you">
				@if($recomended->count() > 0)
					@foreach($recomended as $mr)
			            <article class="article-fw article">
							<div class="inner">
								<figure class="article-img">
									<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">
										<img src="{{ $mr->featured }}" alt="{{ $mr->title }}">
									</a>
								</figure>
								<div class="details">
									<div class="detail">
										<div class="time">{{ $mr->created_at->toFormattedDateString() }}</div>
										<div class="category">
											<a href="{{ route('category.single', [ 'slug' => $mr->category->slug ]) }}">
					                            {{ $mr->category->name }}
					                        </a>
										</div>
									</div>
									<h1><a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">{{ $mr->title }}</a></h1>
									<!-- <p>
										Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
									</p> -->
									<footer>
										<!-- <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>{{ $first_post->view_count }}</div></a> -->
										<a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $first_post->slug ]) }}">
											<div>Read</div>
											<div><i class="ion-ios-arrow-thin-right"></i></div>
										</a>
									</footer>
								</div>
							</div>
						</article>
			        @endforeach
			    @else
					<div class="row">
		                <div class="col-md-12">
		                    <div class="alert alert-info text-center">
		                        <p>{{ __('Sorry, there are no recomended posts at the moment!') }}</p>
		                    </div>                   
	                	</div>
	                </div>
	            @endif
				
				<div class="line"></div>

		        @foreach($moreRecomended as $lmr)
			        <article class="article-mini article">
						<div class="inner">
							<figure class="article-img">
								<a href="{{ route('post.single', [ 'slug' => $lmr->slug ]) }}">
				                    <img src="{{ $lmr->featured }}" alt="{{ $lmr->title }}">
				                </a>
							</figure>

							<div class="padding">
								<h1>
									<a href="{{ route('post.single', [ 'slug' => $lmr->slug ]) }}">{{ $lmr->title }}</a>
								</h1>
								<div class="detail">
									<div class="time mr-2">{{ $mr->created_at->toFormattedDateString() }}</div>
									<div class="category">
										<a href="{{ route('category.single', [ 'slug' => $lmr->category->slug ]) }}">
				                            {{ $lmr->category->name }}
				                        </a>
									</div>
								</div>
							</div>
						</div>
					</article>
			    @endforeach
				

			</div>
			
			<div class="tab-pane comments" id="top-post">
				@if($mostRead->count() > 0)
					@foreach($mostRead as $mr)
			            <article class="article-fw article">
							<div class="inner">
								<figure class="article-img">
									<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">
										<img src="{{ $mr->featured }}" alt="{{ $mr->title }}">
									</a>
								</figure>
								<div class="details">
									<div class="detail">
										<div class="time">{{ $mr->created_at->toFormattedDateString() }}</div>
										<div class="category">
											<a href="{{ route('category.single', [ 'slug' => $mr->category->slug ]) }}">
					                            {{ $mr->category->name }}
					                        </a>
										</div>
									</div>
									<h1><a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">{{ $mr->title }}</a></h1>
									<!-- <p>
										Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
									</p> -->
									<footer>
										<a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $first_post->slug ]) }}">
											<div>Read</div>
											<div><i class="ion-ios-arrow-thin-right"></i></div>
										</a>
									</footer>
								</div>
							</div>
						</article>
			        @endforeach
			    @else
					<div class="row">
		                <div class="col-md-12">
		                    <div class="alert alert-info text-center">
		                        <p>{{ __('Sorry, there are no top posts at the moment!') }}</p>
		                    </div>                   
	                	</div>
	                </div>
	            @endif

		   		<div class="line"></div>

		        @foreach($lessMostRead as $lmr)
			        <article class="article-mini article">
						<div class="inner">
							<figure class="article-img">
								<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">
				                    <img src="{{ $lmr->featured }}" alt="{{ $mr->title }}">
				                </a>
							</figure>

							<div class="padding">
								<h1>
									<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">{{ $lmr->title }}</a>
								</h1>
								<div class="detail">
									<div class="time mr-2">{{ $mr->created_at->toFormattedDateString() }}</div>
									<div class="category">
										<a href="{{ route('category.single', [ 'slug' => $mr->category->slug ]) }}">
				                            {{ $mr->category->name }}
				                        </a>
									</div>
								</div>
							</div>
						</div>
					</article>
			    @endforeach
			</div>
		</div>
	</aside>

	<!-- <aside>
		<div class="aside-body">
			<div class="featured-author">
				<div class="featured-author-inner">
					<div class="featured-author-cover" style="background-image: url('{{ asset('themes/frontend-theme/images/news/img15.jpg') }}')">
						<div class="badges">
							<div class="badge-item"><i class="ion-star"></i> Featured</div>
						</div>
						<div class="featured-author-center">
							<figure class="featured-author-picture">
								<img src="images/img01.jpg" alt="Sample Article">
							</figure>
							<div class="featured-author-info">
								<h2 class="name">John Doe</h2>
								<div class="desc">@JohnDoe</div>
							</div>
						</div>
					</div>
					<div class="featured-author-body">
						<div class="featured-author-count">
							<div class="item">
								<a href="#">
									<div class="name">Posts</div>
									<div class="value">208</div>														
								</a>
							</div>
							<div class="item">
								<a href="#">
									<div class="name">Stars</div>
									<div class="value">3,729</div>														
								</a>
							</div>
							<div class="item">
								<a href="#">
									<div class="icon">
										<div>More</div>
										<i class="ion-chevron-right"></i>
									</div>														
								</a>
							</div>
						</div>
						<div class="featured-author-quote">
							"Eur costrict mobsa undivani krusvuw blos andugus pu aklosah"
						</div>
						<div class="block">
							<h2 class="block-title">Photos</h2>
							<div class="block-body">
								<ul class="item-list-round" data-magnific="gallery">
									<li><a href="images/news/img06.jpg" style="background-image: url('images/news/img06.jpg');"></a></li>
									<li><a href="images/news/img07.jpg" style="background-image: url('images/news/img07.jpg');"></a></li>
									<li><a href="images/news/img08.jpg" style="background-image: url('images/news/img08.jpg');"></a></li>
									<li><a href="images/news/img09.jpg" style="background-image: url('images/news/img09.jpg');"></a></li>
									<li><a href="images/news/img10.jpg" style="background-image: url('images/news/img10.jpg');"></a></li>
									<li><a href="images/news/img11.jpg" style="background-image: url('images/news/img11.jpg');"></a></li>
									<li><a href="images/news/img12.jpg" style="background-image: url('images/news/img12.jpg');"><div class="more">+2</div></a></li>
									<li class="hidden"><a href="images/news/img13.jpg" style="background-image: url('images/news/img13.jpg');"></a></li>
									<li class="hidden"><a href="images/news/img14.jpg" style="background-image: url('images/news/img14.jpg');"></a></li>
								</ul>
							</div>
						</div>
						<div class="featured-author-footer">
							<a href="#">See All Authors</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside> -->

	@include('partials.frontend.aside.subscribe')

	@include('partials.frontend.aside.tweet')

	@include('partials.frontend.aside.instagram')

	<!-- @include('partials.frontend.aside.videos') -->
	
	<aside id="sponsored">
		<h1 class="aside-title">Sponsored</h1>
		<div class="aside-body">
			<ul class="sponsored">
				<li>
					<a href="#">
						<img src="{{ asset('themes/frontend-theme/images/sponsored.png') }}" alt="Sponsored">
					</a>
				</li> 
				<li>
					<a href="#">
						<img src="{{ asset('themes/frontend-theme/images/sponsored.png') }}" alt="Sponsored">
					</a>
				</li> 
				<li>
					<a href="#">
						<img src="{{ asset('themes/frontend-theme/images/sponsored.png') }}" alt="Sponsored">
					</a>
				</li> 
				<li>
					<a href="#">
						<img src="{{ asset('themes/frontend-theme/images/sponsored.png') }}" alt="Sponsored">
					</a>
				</li> 
			</ul>
		</div>
	</aside>
</div>