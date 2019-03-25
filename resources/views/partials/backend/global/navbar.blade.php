@if(Auth::check())
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a id="toggle-btn" href="#" class="menu-btn">
                            <i class="icon-bars"> </i>
                        </a>
                        <a href="{{ url('/home') }}" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block">
                                <!-- <img src="{{ asset('themes/system-theme/img/logo.png') }}" alt="{{ $settings->site_name }}"> -->
                                <strong class="text-primary">{{ $settings->site_name }}</strong>
                            </div>
                        </a>
                    </div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    
                        <!-- Languages dropdown    -->
                        <!-- <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('theme/img/flags/16/DE.png') }}" alt="English" class="mr-2"><span>German</span></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('theme/img/flags/16/FR.png') }}" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                            </ul>
                        </li> -->
                        
                        <!-- Log out-->
                        <!-- <li class="nav-item">
                            <a href="login.html" class="nav-link logout"> 
                                <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i>
                            </a>
                        </li> -->

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> <span class="d-none d-sm-inline-block">{{ __('Logout') }}</span>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="icon-user"></i> <span class="d-none d-sm-inline-block">{{ __('Profile') }}</span>  
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.profile.edit') }}">
                                        <i class="fa fa-pencil"></i> <span class="d-none d-sm-inline-block">{{ __('Edit profile') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@endif