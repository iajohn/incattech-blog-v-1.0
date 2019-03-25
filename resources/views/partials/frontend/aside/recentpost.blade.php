<aside>
	<h1 class="aside-title">Recent Post</h1>
	<div class="aside-body">
        @foreach($recentPost as $rp)
			<article class="article-fw">
				<div class="inner">
					<figure class="article-img">
						<a href="{{ route('post.single', [ 'slug' => $rp->slug ]) }}">
							<img src="{{ $rp->featured }}" alt="{{ $rp->title }}">
						</a>
					</figure>
					<div class="details">
						<h1>
							<a href="{{ route('post.single', [ 'slug' => $rp->slug ]) }}">{{ $rp->title }}</a>
						</h1>
						<p>
							{!! str_limit( $rp->content ) !!}
						</p>
						<div class="detail">
							<div class="time">{{ $rp->created_at->toFormattedDateString() }}</div>
							<div class="category">
								<a href="{{ route('category.single', [ 'slug' => $rp->category->slug ]) }}">
		                            {{ $rp->category->name }}
		                        </a>
							</div>
						</div>
					</div>
				</div>
			</article>
		@endforeach
		
		<div class="line"></div>

		@foreach($moreRecent as $mr)
	        <article class="article-mini article">
				<div class="inner">
					<figure class="article-img">
						<div class="article-img">
							<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">
			                    <img src="{{ $mr->featured }}" alt="{{ $mr->title }}">
			                </a>
						</div>
					</figure>

					<div class="padding">
						<h1>
							<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">{{ $mr->title }}</a>
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
</aside>