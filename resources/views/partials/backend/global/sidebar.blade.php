@if(Auth::check())
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center">
                    <img src="{{ asset(Auth::user()->profile->avatar) }}" alt="person" class="img-fluid rounded-circle">
                    <h2 class="h5">{{ Auth::user()->name }}</h2>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo">
                    <a href="index.html" class="brand-small text-center"> </a>
                </div>
            </div>
           
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Main Menu</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">                  
                    <li>
                        <a href="{{ route('home') }}"> <i class="icon-grid"></i>{{ __('Home') }}</a>
                    </li>

                    @if(Auth::user()->admin)
                        <li>
                            <a href="{{ route('users') }}"> <i class="icon-user"></i>{{ __('Users') }}</a>
                        </li>
                    @endif

                    <li>
                        <a href="#postDropdown" aria-expanded="false" data-toggle="collapse"> 
                            <i class="icon-interface-windows"></i>{{ __('Manage Posts') }}
                        </a>
                        <ul id="postDropdown" class="collapse list-unstyled ">
                            <li>
                                <a href="{{ route('posts') }}"> {{ __('Posts List') }} </a>
                            </li>

                            <li>
                                <a href="{{ route('post.create') }}"> {{ __('New Post') }} </a>
                            </li>                                        
                        </ul>
                    </li>

                    <li>
                        <a href="#catDropdown" aria-expanded="false" data-toggle="collapse"> 
                            <i class="icon-list"></i>{{ __('Manage Categories') }}
                        </a>
                        <ul id="catDropdown" class="collapse list-unstyled ">
                            <li>
                                <a href="{{ route('categories') }}"> {{ __('Categories List') }} </a>
                            </li>

                            <li>
                                <a href="{{ route('category.create') }}"> {{ __('New Category') }} </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#tagDropdown" aria-expanded="false" data-toggle="collapse"> 
                            <i class="icon-check"></i> {{ __('Manage Tags') }}
                        </a>
                        <ul id="tagDropdown" class="collapse list-unstyled ">
                            <li>
                                <a href="{{ route('tags') }}"> {{ __('Tags List') }} </a>
                            </li>

                            <li>
                                <a href="{{ route('tag.create') }}"> {{ __('New Tag') }} </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#videoDropdown" aria-expanded="false" data-toggle="collapse"> 
                            <i class="icon ion-photos"></i> {{ __('Manage Videos') }}
                        </a>
                        <ul id="videoDropdown" class="collapse list-unstyled ">
                            <li>
                                <a href="{{ route('videos') }}"> {{ __('Video List') }} </a>
                            </li>

                            <li>
                                <a href="{{ route('video.create') }}"> {{ __('New Video') }} </a>
                            </li>
                        </ul>
                    </li>
                    
                    @if(Auth::user()->admin)
                        <li>
                            <a href="{{ route('settings') }}"> <i class="fa fa-gears"></i>{{ __('Settings') }}</a>
                        </li>
                    @endif

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> <span class="d-none d-sm-inline-block">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif