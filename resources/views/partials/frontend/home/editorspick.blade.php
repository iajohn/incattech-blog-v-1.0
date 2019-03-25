<section class="best-of-the-week">
	<div class="container">
		<h1><div class="text">Editor's Pick</div>
			<div class="carousel-nav" id="best-of-the-week-nav">
				<div class="prev">
					<i class="ion-ios-arrow-left"></i>
				</div>
				<div class="next">
					<i class="ion-ios-arrow-right"></i>
				</div>
			</div>
		</h1>
		
		<div class="owl-carousel owl-theme carousel-1">
			@if($editors_pick->count() > 0)
				@foreach($editors_pick as $P)
					<article class="article thumb-article editor">
	                    <div class="article-img">
	                        <img src="{{ $P->featured }}" alt="">
	                    </div>
	                    <div class="article-body">
	                        <h2 class="article-title"><a href="{{ route('post.single', [ 'slug' => $P->slug ]) }}">{{ $P->title }}</a></h2>
	                        <div class="detail">
								<div class="time" style="color: #fff;">{{ $P->created_at->toFormattedDateString() }}</div>
								<div class="category">
									<a href="{{ route('category.single', [ 'slug' => $P->category->slug ]) }}">
	                                    {{ $P->category->name }}
	                                </a>
								</div>
							</div>
	                    </div>
	                </article>
				@endforeach
		</div>

			@else
				<div class="row">
	                <div class="col-md-12">
	                    <div class="alert alert-info text-center">
	                        <p>{{ __('There are no posts picked by our editors at the moment check later!') }}</p>
	                    </div>                   
                	</div>
                </div>
            @endif
	</div>
</section>