<div class="line"></div>

<div class="row">
	@if($_1->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_1->name }}
	            
	            <a href="{{ route('category.single', [ 'slug' => $_1->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="one">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_1->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P1)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#one" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P1->slug ]) }}">
		                            <img src="{{ $P1->featured }}" alt="{{ $P1->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P1->slug ]) }}">{{ $P1->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P1->created_at->toFormattedDateString() }} </div>
		                            <!-- <div class="category">
		                            	<a href="{{ route('category.single', [ 'slug' => $P1->category->slug ]) }}">{{ $P1->category->name }}</a>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
		
		@else
			<div class="col-md-6 col-sm-6">
				<h1 class="title-col">
					@if(!empty($_1->posts)) {{ $_1->name }} @else {{ __('Fashion') }} @endif
		        </h1>
	            <div class="body-col">
	                <div class="alert alert-info text-center">
	                    {{ __('There are no posts in this category check later!') }}
	                </div>                   
	            </div>
	        </div>
	@endif

	@if($_2->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_2->name }}

	            <a href="{{ route('category.single', [ 'slug' => $_2->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="two">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_2->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P2)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#two" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P2->slug ]) }}">
		                            <img src="{{ $P2->featured }}" alt="{{ $P2->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P2->slug ]) }}">{{ $P2->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P2->created_at->toFormattedDateString() }} </div>

		                            <!-- <div class="category">
		                            	<a href="{{ route('category.single', [ 'slug' => $P2->category->slug ]) }}">{{ $P2->category->name }}</a>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
		
		@else
		<div class="col-md-6 col-sm-6">
			<h1 class="title-col">
					@if(!empty($_2->posts)) {{ $_2->name }} @else {{ __('Technology') }} @endif
		        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif
</div>

<!-- <div class="line"></div> -->

<!-- <div class="banner">
	<a href="#">
		<img src="{{ asset('themes/frontend-theme/images/ads.png') }}" alt="Sample Article">
	</a>
</div> -->

<div class="line"></div>

<div class="row">
	@if($_3->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_3->name }}
	            
	            <a href="{{ route('category.single', [ 'slug' => $_3->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="three">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_3->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P3)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#three" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P3->slug ]) }}">
		                            <img src="{{ $P3->featured }}" alt="{{ $P3->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P3->slug ]) }}">{{ $P3->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P3->created_at->toFormattedDateString() }} </div>
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            @if(!empty($_3->posts)) {{ $_3->name }} @else {{ __('Start Up') }} @endif
	        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif

 	@if($_4->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_4->name }}

	            <a href="{{ route('category.single', [ 'slug' => $_4->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="four">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_4->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P4)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#four" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P4->slug ]) }}">
		                            <img src="{{ $P4->featured }}" alt="{{ $P4->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P4->slug ]) }}">{{ $P4->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P4->created_at->toFormattedDateString() }} </div>
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            {{ $_4->name }}
	        </h1>

            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif
</div>

<div class="line"></div>

<div class="row">
	@if($_5->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_5->name }}
	            
	            <a href="{{ route('category.single', [ 'slug' => $_5->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="five">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_5->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P5)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#five" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P5->slug ]) }}">
		                            <img src="{{ $P5->featured }}" alt="{{ $P5->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P5->slug ]) }}">{{ $P5->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P5->created_at->toFormattedDateString() }} </div>
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            {{ $_5->name }}
	        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif

 	@if($_6->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_6->name }}

	            <a href="{{ route('category.single', [ 'slug' => $_6->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="six">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_6->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P6)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#six" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P6->slug ]) }}">
		                            <img src="{{ $P6->featured }}" alt="{{ $P6->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P6->slug ]) }}">{{ $P6->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P6->created_at->toFormattedDateString() }} </div>
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            {{ $_6->name }}
	        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif
</div>

<!-- <div class="line"></div> -->

<!-- <div class="banner">
	<a href="#">
		<img src="{{ asset('themes/frontend-theme/images/ads.png') }}" alt="Sample Article">
	</a>
</div> -->

<div class="line"></div>

<div class="row">
	@if($_7->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_7->name }}
	            
	            <a href="{{ route('category.single', [ 'slug' => $_7->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="seven">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_7->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P7)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#seven" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P7->slug ]) }}">
		                            <img src="{{ $P7->featured }}" alt="{{ $P7->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P7->slug ]) }}">{{ $P7->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P7->created_at->toFormattedDateString() }} </div>
		                            <!-- <div class="category">
		                            	<a href="{{ route('category.single', [ 'slug' => $P1->category->slug ]) }}">{{ $P1->category->name }}</a>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            {{ $_7->name }}
	        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif

	@if($_8->posts()->count() > 0)
	    <div class="col-md-6 col-sm-6">
	        <h1 class="title-col">
	            {{ $_8->name }}
	            
	            <a href="{{ route('category.single', [ 'slug' => $_9->slug ]) }}" class="btn btn-sm btn-primary ">{{ __('view all') }}</a>

	            <div class="carousel-nav" id="eight">
	                <div class="prev">
	                    <i class="ion-ios-arrow-left"></i>
	                </div>
	                <div class="next">
	                    <i class="ion-ios-arrow-right"></i>
	                </div>
	            </div>
	        </h1>
	        @foreach($_8->posts()->orderBy('created_at', 'desc')->take(6)->get()  as $P9)
		        <div class="body-col vertical-slider" data-max="3" data-nav="#eight" data-item="article">
		            <article class="article-mini">
		                <div class="inner">
		                    <figure>
		                        <a href="{{ route('post.single', [ 'slug' => $P9->slug ]) }}">
		                            <img src="{{ $P9->featured }}" alt="{{ $P9->title }}">
		                        </a>
		                    </figure>
		                    <div class="padding">
		                        <h1>
		                        	<a href="{{ route('post.single', [ 'slug' => $P9->slug ]) }}">{{ $P9->title }}</a>
		                        </h1>
		                        <div class="detail">
		                            <div class="time">{{ $P9->created_at->toFormattedDateString() }} </div>
		                            <!-- <div class="category">
		                            	<a href="{{ route('category.single', [ 'slug' => $P9->category->slug ]) }}">{{ $P9->category->name }}</a>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		            </article>
		        </div>
		    @endforeach
	    </div>
	
	    @else
	    <div class="col-md-6 col-sm-6">
	    	<h1 class="title-col">
	            {{ $_8->name }}
	        </h1>
            <div class="body-col">
                <div class="alert alert-info text-center">
                    {{ __('There are no posts in this category check later!') }}
                </div>                   
            </div>
        </div>
	@endif
</div>
