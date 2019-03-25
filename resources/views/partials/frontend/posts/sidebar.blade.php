<div class="col-md-4 sidebar" id="sidebar">
	<aside>
		<div class="aside-body">
			<figure class="ads">
				<img src="{{ asset('themes/frontend-theme/images/ad.png') }}">
				<figcaption>Advertisement</figcaption>
			</figure>
		</div>
	</aside>

	<aside>
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li class="active">
				<a href="#for-you" aria-controls="for-you" role="tab" data-toggle="tab">
					<!-- <i class="ion-android-star-outline"></i>  -->
					{{ __('Recent Post') }}
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
	            @if($recentPost->count() > 0)
		            @foreach($recentPost as $rp)
			            <article class="article-fw article">
							<div class="inner">
								<figure class="article-img">
									<a href="{{ route('post.single', [ 'slug' => $rp->slug ]) }}">
										<img src="{{ $rp->featured }}" alt="{{ $rp->title }}">
									</a>
								</figure>
								<div class="details">
									<div class="detail">
										<div class="time">{{ $rp->created_at->toFormattedDateString() }}</div>
										<div class="category">
											<a href="{{ route('category.single', [ 'slug' => $rp->category->slug ]) }}">
					                            {{ $rp->category->name }}
					                        </a>
										</div>
									</div>
									<h1>
										<a href="{{ route('post.single', [ 'slug' => $rp->slug ]) }}">{{ $rp->title }}</a>
									</h1>
									<p>
										{!! str_limit( $rp->content ) !!}
									</p>
								</div>
							</div>
						</article>
			        @endforeach
			    @else
					<div class="row">
		                <div class="col-md-12">
		                    <div class="alert alert-info text-center">
		                        <p>{{ __('There are no posts picked by our editors at the moment check later!') }}</p>
		                    </div>                   
	                	</div>
	                </div>
	            @endif

		   		<div class="line"></div>

		        @foreach($moreRecent as $mr)
			        <article class="article-mini article">
						<div class="inner">
							<figure class="article-img">
								<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">
				                    <img src="{{ $mr->featured }}" alt="{{ $mr->title }}">
				                </a>
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
			
			<div class="tab-pane comments" id="top-post">
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
								<h1>
									<a href="{{ route('post.single', [ 'slug' => $mr->slug ]) }}">{{ $mr->title }}</a>
								</h1>
								<p>
									{!! str_limit( $mr->content ) !!}
								</p>
							</div>
						</div>
					</article>
		        @endforeach

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

	<!-- Recent Post -->
	<!-- //@include('partials.frontend.aside.recentpost') -->

	<!-- Sbscribe To Newsletter -->
	@include('partials.frontend.aside.subscribe')

</div>