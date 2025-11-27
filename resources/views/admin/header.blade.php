<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <title>Tej Yug News Online | Hindi News | Latest News | Admin Panel</title>
    </head>
    <body>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="jLNrdd5m"></script>
    <header>
        <div class="top-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-top">
                    <a class="navbar-brand" href="#"><img src="{{ URL::asset('admin/images/logo.png') }}" class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    @if (isset(Auth::user()->image) && Storage::exists(Auth::user()->image))
                                    <img src="{{ URL::asset('storage/'.Auth::user()->image) }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('admin/images/usr.png') }}" class="img-fliud">
                                    @endif
                                </span>{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-profile') }}">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i class="ft-power"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="middle-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-middle" aria-controls="navbar-middle" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-middle">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            @can('is-admin')
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Master
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-category.index') }}">Manage Category</a>
                                    <a class="dropdown-item" href="{{ route('manage-subcategory.index') }}">Manage Sub Category</a>
                                    <a class="dropdown-item" href="{{ route('manage-sub-subcategory.index') }}">Manage Sub Subcategory</a>
                                    <a class="dropdown-item" href="{{ route('manage-tag.index') }}">Manage Tags</a>
                                </div>
                            </li>
                            @endcan
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Posts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-post.create') }}">Add Post</a>
                                    <a class="dropdown-item" href="{{ route('manage-post.index') }}">Manage Posts</a>
                                    @can('is-admin')
                                    <a class="dropdown-item" href="{{ route('manage-comment.index') }}">Manage Comments</a>
                                    <a class="dropdown-item" href="{{ route('manage-report') }}">Manage Reports</a>
                                    @endcan
                                </div>
                            </li>
                            @can('is-admin')
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin Roles
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-reporter.index') }}">Manage Reporter</a>
                                </div>
                            </li>
                            @endcan
                            @can('is-admin')
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Site Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-header-setting') }}">Header Settings</a>
                                    <a class="dropdown-item" href="{{ route('manage-homepage-widget') }}">Homepage Widgets</a>
                                    <a class="dropdown-item" href="{{ route('manage-footer-setting') }}">Footer Settings</a>
                                     <a class="dropdown-item" href="{{ route('manage-site-intro.index') }}">Manage Site Introduction</a>
                                </div>
                            </li>
                            @endcan
                            @can('is-admin')
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Footer Management
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('edit-about-us') }}">About Us</a>
                                    <a class="dropdown-item" href="{{ route('manage-contact-us') }}">Contact Us</a>
                                    <a class="dropdown-item" href="{{ route('edit-cookie-policy') }}">Cookie Policy</a>
                                    <a class="dropdown-item" href="{{ route('edit-privacy-policy') }}">Privacy Policy</a>
                                    <a class="dropdown-item" href="{{ route('edit-terms-of-use') }}">Terms Of Use</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Content
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manage-epaper.index') }}">Manage E-paper</a>
                                    <a class="dropdown-item" href="{{ route('manage-team-category.index') }}">Manage Team Category</a>
                                    <a class="dropdown-item" href="{{ route('manage-team.index') }}">Manage Team</a>
                                    <a class="dropdown-item" href="{{ route('manage-subscriber.index') }}">Manage Subscriber</a>
                                    <a class="dropdown-item" href="{{ route('manage-question-of-the-day.index') }}">Manage Question Of the day</a>
                                </div>
                            </li>
                            @endcan
                            @can('is-admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Advertisement
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ad-setting') }}">Ad Setting</a>
                                    <a class="dropdown-item" href="{{ route('manage-ad.create') }}">Add Ads</a>
                                    <a class="dropdown-item" href="{{ route('manage-ad.index') }}">Manage Ads</a>
                                </div>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    @if(session()->get('success'))
    <div class="alert alert-success">
        <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger">
        <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {{ session()->get('error') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <p>Fill All Required Fields</p>
        </ul>
    </div>
    @endif