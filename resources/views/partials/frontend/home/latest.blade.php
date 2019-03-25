
<!-- row latest -->
<div class="row">
	<div class="line">
		<div>Latest News</div>
	</div>
	<!-- first post -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<article class="article">
			<div class="inner">
				<figure class="article-img latest">
					<a href="{{ route('post.single', [ 'slug' => $first_post->slug ]) }}">
	                    <img src="{{ $first_post->featured }}" alt="{{ $first_post->slug }}">
	                </a>
			    </figure>
				
				<div class="padding">
					<div class="detail">
						<div class="time">{{ $first_post->created_at->toFormattedDateString() }}</div>
						<div class="category">
							<a href="{{ route('category.single', [ 'slug' => $first_post->category->slug ]) }}">{{ $first_post->category->name }}</a>
						</div>
					</div>
					<h2>
						<a href="{{ route('post.single', [ 'slug' => $first_post->slug ]) }}">{{ $first_post->title }}</a>
					</h2>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->
					<footer>
						<!-- <a href="#" class="love"><i class="ion-ios-eye-outline"></i> <div>{{ $first_post->view_count }}</div></a> -->
						<a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $first_post->slug ]) }}">
							<div>More</div>
							<div><i class="ion-ios-arrow-thin-right"></i></div>
						</a>
					</footer>
				</div>
			</div>
		</article>
	</div>
	 
	<!-- second post -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<article class="article">
			<div class="inner">
				<figure class="article-img latest">
					<a href="{{ route('post.single', [ 'slug' => $second_post->slug ]) }}">
	                    <img src="{{ $second_post->featured }}" alt="{{ $second_post->slug }}">
	                </a>
				</figure>

				<div class="padding">
					<div class="detail">
						<div class="time">{{ $second_post->created_at->toFormattedDateString() }}</div>
						<div class="category">
							<a href="{{ route('category.single', [ 'slug' => $second_post->category->slug ]) }}">{{ $second_post->category->name }}</a>
						</div>
					</div>
					<h2>
						<a href="{{ route('post.single', [ 'slug' => $second_post->slug ]) }}">{{ $second_post->title }}</a>
					</h2>
					<!-- <p>Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat sollicitudin ut est. In fringilla dui dui.</p> -->
					<footer>
						<!-- <a href="#" class="love"><i class="ion-ios-eye-outline"></i> <div>{{ $second_post->view_count }}</div></a> -->
						<a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $second_post->slug ]) }}">
							<div>More</div>
							<div><i class="ion-ios-arrow-thin-right"></i></div>
						</a>
					</footer>
				</div>
			</div>
		</article>
	</div>
</div>

<!-- row latest continue -->
<div class="row">
    <!-- after second post -->
    @foreach($after_second_post as $post)
        <div class="col-md-4 col-sm-4">
            <article class="article">
            	<div class="inner">
            		<div class="article-img latest">
		                <a href="{{ route('post.single', [ 'slug' => $post->slug ]) }}">
		                    <img src="{{ $post->featured }}" alt="{{ $post->title }}">
		                </a>
		            </div>

					<div class="padding">
						<div class="detail">
							<div class="time">{{ $post->created_at->toFormattedDateString() }}</div>
							<div class="category">
								<a href="{{ route('category.single', [ 'slug' => $post->category->slug ]) }}">{{ $post->category->name }}</a>
							</div>
						</div>
			
						<footer>
							<!-- <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>{{ $post->view_count }}</div></a> -->
							<a class="btn btn-primary more" href="{{ route('post.single', [ 'slug' => $post->slug ]) }}">
								<div>Read</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					</div>	
				</div>
			</article>
        </div>
    @endforeach
</div>