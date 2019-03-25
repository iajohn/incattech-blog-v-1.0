<!-- <div class="nav" id="featured-nav">
	<a class="left carousel-control" role="button" data-slide="prev">
		<span class="ion-ios-arrow-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" role="button" data-slide="next">
		<span class="ion-ios-arrow-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div> -->

<div class="owl-carousel owl-theme slide " id="featured">
	@foreach($randomPosts as $Posts)
		<div class="item">
			<article class="featured article">
				<div class="overlay"></div>
				<div class="article-img">
					<img src="{{ $Posts->featured }}" alt="{{ $Posts->title }}">
				</div>
				<div class="details">
					<div class="category ">
						<a href="{{ route('category.single', [ 'slug' => $Posts->category->slug ]) }}">
                            {{ $Posts->category->name }}
                        </a>
					</div>

					<h1><a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">{{ $Posts->title }}</a></h1>
					<div class="time">{{ $Posts->created_at->toFormattedDateString() }}</div>
				</div>
			</article>
		</div>
	@endforeach
</div>