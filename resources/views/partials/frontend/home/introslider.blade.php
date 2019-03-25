    <!-- Owl Carousel 1 -->
    <div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
        @foreach($randomPosts as $Posts)
        <!-- ARTICLE -->
        <article class="article thumb-article">
            <div class="article-img">
                <img src="{{ $Posts->featured }}" alt="{{ $Posts->title }}">
            </div>
            <div class="article-body">
                <ul class="article-info">
                    <li class="article-category">
                        <a href="{{ route('category.single', [ 'slug' => $Posts->category->slug ]) }}">
                            {{ $Posts->category->name }}
                        </a>
                    </li>

                    <li class="article-type-user"> 
                        <span class="ml-3"><i class="fa fa-user"></i> </span>
                        <span class="ml-2 mr-2"><a href="">{{ $Posts->user->name }} </a></span>
                    </li>
                </ul>
                <h2 class="article-title"><a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">{{ $Posts->title }}</a></h2>
                <ul class="article-meta">
                    <li><i class="fa fa-clock-o"></i> {{ $Posts->created_at->toFormattedDateString() }}</li>
                    <li><i class="fa fa-eye"></i> {{ $Posts->view_count }}</li>
                </ul>
            </div>
        </article>
        <!-- /ARTICLE -->
        @endforeach
    </div>
    <!-- /Owl Carousel 1 -->

