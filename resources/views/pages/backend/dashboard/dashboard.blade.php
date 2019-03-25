@extends('layouts.backend')

@section('title','Dashboard')

@section('content')
    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row justify-content-center clear-fix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header"><h2>{{ Auth::user()->name }} - {{ __('Dashboard') }}</h2></div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row clearfix">
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-blue hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-user"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('ALL USERS') }}</div>
                                          <div class="count-number count-to">{{ $users_count }}</div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">  
                                <div class="info-box bg-purple hover-zoom-effect">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="content">
                                      <div class="text">TOTAL ADMINS</div>
                                      <div class="name">
                                        <div class="count-number count-to">{{ $admin_count }}</div>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-green hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-interface-windows"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('TOTAL POSTS') }}</div>
                                          <div class="count-number count-to">{{ $posts_count }}</div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-red hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-close"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('TRASHED POSTS') }}</div>
                                          <div class="count-number count-to">{{ $trashed_post }}</div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                                
                            <div class="row clearfix">
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-orange hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-line-chart"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('ACTIVE USERS') }}</div>
                                          <div class="count-number count-to">{{ $numberOfUsers }}</div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-blue hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-user"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('WITHIN A DAY') }}</div>
                                          <div class="count-number count-to">{{ $a_users_24h }}</div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-green hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-interface-windows"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('WITHIN 7 DAY') }}</div>
                                          <div class="count-number count-to">{{ $a_users_7d }}</div>
                                      </div>
                                  </div>
                              </div>

                              <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <div class="info-box bg-red hover-zoom-effect">
                                      <div class="icon">
                                          <i class="icon-close"></i>
                                      </div>
                                      <div class="content">
                                          <div class="text">{{ __('TRASHED POSTS') }}</div>
                                          <div class="count-number count-to"></div>
                                      </div>
                                  </div>
                              </div> -->
                            </div>

                            <!-- Widgets -->
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <div class="info-box bg-purple hover-zoom-effect">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="content">
                                          <div class="text">TOTAL ADMINS</div>
                                          <div class="name">
                                            <div class="number count-to">{{ $admin_count }}</div>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="info-box bg-deep-purple hover-zoom-effect">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="content">
                                            <div class="text">ACTIVE GUESTS</div>
                                            <div class="number count-to">{{ $numberOfGuests }}</div>
                                        </div>
                                    </div>

                                    <div class="info-box bg-pink hover-zoom-effect">
                                        <div class="icon">
                                            <i class="icon-list"></i>
                                        </div>
                                        <div class="content">
                                            <div class="text">CATEGORIES</div>
                                            <div class="number count-to">{{ $category_count }}</div>
                                        </div>
                                    </div>

                                    <div class="info-box bg-blue-grey hover-zoom-effect">
                                        <div class="icon">
                                            <i class="icon-check"></i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TAGS</div>
                                            <div class="number count-to">{{ $tags_count }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                                    <div class="card">
                                        <div class="header">
                                            <h2>{{ __('ACTIVE USERS') }}</h2>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-hover dashboard-task-infos">
                                                    <thead>
                                                    <tr>
                                                        <th>Rank List</th>
                                                        <th>Name</th>
                                                        <th>Ip Address</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                      @if($active_users->count() > 0)
                                                        @foreach($active_users as $key=>$authUsers)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $authUsers->user->name }}</td>
                                                                <td>{{ $authUsers->ip_address }}</td>
                                                            </tr>
                                                        @endforeach
                                                      @else
                                                          <tr>
                                                              <th colspan="5" class="alert alert-info text-center">
                                                                  There are no active users at the moment!
                                                              </th>                   
                                                          </tr>
                                                      @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Widgets -->
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <div class="info-box bg-purple hover-zoom-effect">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="content">
                                          <div class="text">EDITOR's PICK</div>
                                          <div class="name">
                                            <div class="number count-to">{{ $editors_pick_count }}</div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                                    <div class="card">
                                        <div class="header">
                                            <h2>{{ __('ACTIVE GUESTS') }}</h2>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-hover dashboard-task-infos">
                                                    <thead>
                                                    <tr>
                                                        <th>Rank List</th>
                                                        <th>Ip Address</th>
                                                        <th>Agent</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                      @if($active_guests->count() > 0)
                                                        @foreach($active_guests as $key=>$guestUsers)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $guestUsers->ip_address }}</td>
                                                                <td>{{ $guestUsers->user_agent }}</td>
                                                            </tr>
                                                        @endforeach
                                                      @else
                                                          <tr>
                                                              <th colspan="5" class="alert alert-info text-center">
                                                                  There are no guests users at the moment!
                                                              </th>                   
                                                          </tr>
                                                      @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Widgets -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

  <script>
      @if(Session::has('success'))
          
          toastr.success("{{ Session::get('success') }}")
      
      @endif

      @if(Session::has('info'))
          
          toastr.info("{{ Session::get('info') }}")
      
      @endif
  </script>
  <!-- Jquery CountTo Plugin Js -->
  <!-- // <script src="{{ asset('backend-theme/vendor/jquery-countto/jquery.countTo.js') }}"></script> -->

@endsection

