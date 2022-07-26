<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>BNSP - Gunadhi Pratama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/line-awesome-font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.html" title=""><img src="{{ asset('v2/images/logo.png') }}"
                                alt=""></a>
                    </div>
                    <!--logo end-->
                    <div class="search-bar">
                        <form>
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit"><i class="la la-search"></i></button>
                        </form>
                    </div>
                    <!--search-bar end-->
                    <nav>

                    </nav>
                    <!--nav end-->
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>
                    <!--menu-btn end-->
                    <div class="user-account">
                        <div class="user-info">
                            <img width="30px" height="40px" src="{{ url('/data_file/' . $id_image) }}" alt="">
                            <a href="#" title="">Hai, {{ Auth::user()->name }}</a>
                            <i class="la la-sort-down"></i>
                        </div>
                        <div class="user-account-settingss">
                            <h3>Setting</h3>
                            <ul class="us-links">
                                <li><a href="{{ route('user-profiles.create') }}" title="">Update Profil</a></li>
                            </ul>
                            <h3 class="tc"><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Logout</a></h3>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!--user-account-settingss end-->
                    </div>
                </div>
                <!--header-data end-->
            </div>
        </header>
        <!--header end-->
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    @php($id_image = Auth::user()->user_profile->image)
                                                    <img height="120px" src="{{ url('/data_file/' . $id_image) }}" alt="">
                                                </div>
                                            </div>
                                            <!--username-dt end-->
                                            <div class="user-specs">
                                                <h3>{{ Auth::user()->name }}</h3>
                                            </div>
                                        </div>
                                        <!--user-profile end-->
                                    </div>
                                    <!--user-data end-->
                                </div>
                                <!--main-left-sidebar end-->
                            </div>
                            <div class="col-lg-6 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="post-topbar">
                                        <div class="user-picy">
                                            <img src="{{ url('/data_file/' . $id_image) }}" alt="">
                                        </div>
                                        <div class="post-st">
                                            <ul>
                                                <li><a class="btn btn-danger active" href="#" data-toggle="modal" data-target="#postModal">Post
                                                        a Job</a></li>
                                            </ul>
                                        </div>
                                        @include('post.modal')
                                        <!--post-st end-->
                                    </div>
                                    <!--post-topbar end-->
                                    <div class="posts-section">
                                        @yield('content')
                                        <!--posty end-->
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--main-ws-sec end-->
                            </div>
                            <div class="col-lg-3 pd-right-none no-pd">
                                <div class="right-sidebar">

                                    <div class="widget widget-jobs">
                                        <div class="sd-title">
                                            <h3>Tags</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div>
                                        <div class="jobs-list">
                                            <div class="job-info">
                                                <div class="job-details">
                                                    @foreach ($tags as $tag_list )
                                                        <h3>{{ $tag_list->name }}</h3>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--job-info end-->

                                        </div>
                                        <!--jobs-list end-->
                                    </div>
                                    <!--widget-jobs end-->
                                </div>
                                <!--right-sidebar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div>
            </div>
        </main>
    </div>
    <!--theme-layout end-->

    <script type="text/javascript" src="{{ asset('v2/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/js/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v2/js/script.js') }}"></script>

</body>

</html>
