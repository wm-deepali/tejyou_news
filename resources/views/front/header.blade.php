<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--Whats app SEO-->
    @if (isset($post))

        <title>{{ $post->metatitle }}</title>
        <meta name="description" content="{{ $post->metadescription }}">
        <meta name="keywords" content="{{ $post->metakeyword }}">
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:site_name" content="tejyug.com" />
        <meta property="og:title" content="{{ $post->title }} - Tej Yug News | Hindi News | Lates News  " />

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website') }}/img/favicon.png">
        <meta property="og:description" content="{{ Str::words($post->content, $words = 50, $end = '...') }}" />
        @if(isset($post->image) && Storage::exists($post->image))
            <meta property="og:image" content="{{ URL::asset('storage/' . $post->image) }}" />
        @else
            <meta property="og:image" content="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" />
        @endif
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="600" />
    @elseif (isset($keyword))
        @if(isset($tag))
            <title>{{ $tag->metatitle }}</title>
            <meta name="description" content="{{ $tag->metadescription }}">
            <meta name="keywords" content="{{ $tag->metakeyword }}">
        @else
            <title>{{ $keyword }}</title>
            <meta name="description" content="Tej Yug News Online | Hindi News | Latest News">
            <meta name="keywords" content="Tej Yug News Online | Hindi News | Latest News">
        @endif
    @elseif (isset($subcategory))
        <title>{{ $subcategory->metatitle }}</title>
        <meta name="description" content="{{ $subcategory->metadescription }}">
        <meta name="keywords" content="{{ $subcategory->metakeyword }}">
    @elseif (isset($category))
        <title>{{ $category->metatitle }}</title>
        <meta name="description" content="{{ $category->metadescription }}">
        <meta name="keywords" content="{{ $category->metakeyword }}">
    @else
        <title>Tej Yug News Online | Hindi News | Latest News</title>
        @if(isset($uppertab1category) && isset($uppertab2category) && isset($uppertab3category) && isset($uppertab4category) && isset($otherwidgetcategory) && isset($mustreadcategory) && isset($youmaylikecategory) && isset($sidebartab1category) && isset($sidebartab2category) && isset($sidebartab3category) && isset($center1category) && isset($center2category) && isset($center3category) && isset($lower1category) && isset($lower2category) && isset($lower3category))
            <meta name="description"
                content="{{ $uppertab1category->metadescription }},{{ $uppertab2category->metadescription }},{{ $uppertab3category->metadescription }},{{ $uppertab4category->metadescription }},{{ $otherwidgetcategory->metadescription }},{{ $mustreadcategory->metadescription }},{{ $youmaylikecategory->metadescription }},{{ $sidebartab1category->metadescription }},{{ $sidebartab2category->metadescription }},{{ $sidebartab3category->metadescription }},{{ $center1category->metadescription }},{{ $center2category->metadescription }},{{ $center3category->metadescription }},{{ $lower1category->metadescription }},{{ $lower2category->metadescription }},{{ $lower3category->metadescription }}">
            <meta name="keywords"
                content="{{ $uppertab1category->metakeyword }},{{ $uppertab2category->metakeyword }},{{ $uppertab3category->metakeyword }},{{ $uppertab4category->metakeyword }},{{ $otherwidgetcategory->metakeyword }},{{ $mustreadcategory->metakeyword }},{{ $youmaylikecategory->metakeyword }},{{ $sidebartab1category->metakeyword }},{{ $sidebartab2category->metakeyword }},{{ $sidebartab3category->metakeyword }},{{ $center1category->metakeyword }},{{ $center2category->metakeyword }},{{ $center3category->metakeyword }},{{ $lower1category->metakeyword }},{{ $lower2category->metakeyword }},{{ $lower3category->metakeyword }}">
        @else
            <meta name="description" content="Tej Yug News Online | Hindi News | Latest News">
            <meta name="keywords" content="Tej Yug News Online | Hindi News | Latest News">
        @endif
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="{{ asset('website') }}/css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/meanmenu.min.css">
    <!-- Magnific CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/css/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('website') }}/style.css">
    <!-- For IE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/css/ie-only.css">
    <!-- Modernizr Js -->
    <script src="{{ asset('website') }}/js/modernizr-2.8.3.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            font-weight: bold;
            border-bottom: 1px solid #eee;
        }

        .sidebar-header button {
            border: none;
            background: none;
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar-body {
            padding: 15px;
        }

        .sidebar-body ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-body li {
            margin-bottom: 10px;
        }

        .sidebar-body a {
            text-decoration: none;
            color: #333;
        }

        /* Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }



        /* HEADER */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .epaper-btn {
            background: #d71920;
            color: #fff;
            padding: 6px 12px;
            font-size: 18px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        /* MENU */
        .sidebar-body {
            padding: 10px 0;
        }

        .sidebar-nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-direction: column;
        }

        .menu-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-item a,
        .dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 18px;
            color: #fff;
            text-decoration: none;
            font-size: 18px !important;
            cursor: pointer;
        }

        .menu-item a:hover,
        .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* DROPDOWN */
        .has-dropdown .arrow {
            font-size: 18px;
            transition: transform 0.3s;
        }

        .has-dropdown.active .arrow {
            transform: rotate(90deg);
        }

        .submenu {
            display: none;
            background: #12263f;
        }

        .has-dropdown.active .submenu {
            display: flex;
        }

        .submenu li a {
            padding: 10px 30px;
            font-size: 16px;
            color: #dcdcdc;
        }

        /* dropdown submenu hidden by default */
        .has-dropdown .submenu {
            display: none;
        }



        .custom-sidebar {
            position: fixed;
            top: 0;
            right: -340px;
            /* hidden on right */
            width: 340px;
            height: 100vh;
            background: #0b1c2d;
            color: #fff;
            z-index: 9999;
            transition: right 0.35s ease;
            overflow-y: auto;
        }

        .custom-sidebar.active {
            right: 0;
            /* slide in from right */
        }

        /* Header */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .epaper-btn {
            background: #d71920;
            color: #fff;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        /* Menu */
        .sidebar-body {
            padding: 10px 0;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-item a,
        .dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 18px;
            color: #fff;
            text-decoration: none;

            cursor: pointer;
        }

        .menu-item a:hover,
        .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* Submenu */
        .has-dropdown .submenu {
            display: none;
            background: #12263f;
        }

        .has-dropdown.active .submenu {
            display: flex;
        }

        .submenu li a {
            padding: 10px 30px;
            font-size: 16px !important;
            color: #dcdcdc;
        }


        .left-sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: 320px;
            height: 100vh;
            background: #0b1c2d;
            transition: 0.3s;
            z-index: 10001;
        }

        .left-sidebar.active {
            left: 0;
        }

        .left-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 10000;
        }

        .left-overlay.active {
            opacity: 1;
            visibility: visible;
        }


        /* Sidebar Container */
        .new-left-sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: 320px;
            height: 100vh;
            background: #0b1c2d;
            transition: 0.3s ease;
            z-index: 30000;
            color: #fff;
        }

        /* Active */
        .new-left-sidebar.active {
            left: 0;
        }

        /* Overlay */
        .new-left-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 20000;
        }

        .new-left-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Trigger Button */
        .left-menu-button .hambtn span {
            display: block;
            width: 28px;
            height: 1px;
            margin: 5px;
            background: #fff;
        }

        /* Header */
        .new-sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .new-close-btn {
            font-size: 30px;
            color: #fff;
            background: none;
            border: none;
            cursor: pointer;
        }

        .new-epaper-btn {
            background: #d71920;
            padding: 6px 12px;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        /* Menu */
        .new-sidebar-body {
            padding: 15px;
        }

        .new-sidebar-body ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .new-sidebar-body li {
            margin-bottom: 14px;
        }

        .new-sidebar-body a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }


        .new-menu-list li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .new-menu-list li:last-child {
            border-bottom: none;
        }

        .new-menu-list a {
            color: #fff;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .new-menu-list i {
            min-width: 24px;
            font-size: 20px;
        }

        .new-menu-list a:hover {
            color: #ffca2c;
        }

        .jt-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(5px);
        }


        .jt-modal-content {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            padding: 70px 30px;
            background: #fff;
            border-radius: 6px;
            position: relative;
        }

        .jt-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #000;
        }

        .jt-search-box {
            display: flex;
            gap: 15px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 50px;
        }

        .jt-input {
            width: 100%;
            font-size: 22px;
            border: none;
            outline: none;
        }

        .jt-search-submit {
            background: red;
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
        }

        .jt-tags {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .jt-tags span {
            background: #f4f4f4;
            padding: 10px 18px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>

</head>

<body>

    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        @php
            $topheaderCategories = App\Category::where('status', 'active')
                ->where('showontopheader', 'yes')
                ->orderBy('sequence', 'asc')
                ->with([
                    'subcategories' => function ($q) {
                        $q->where('showonheader', 'yes');
                    }
                ])
                ->get();


            $headerCategoriesWithSub = App\Category::where('status', 'active')
                ->where('showonheader', 'yes')
                ->where('hassubcategory', 'yes')
                ->with([
                    'subcategories' => function ($q) {
                        $q->where('showonheader', 'yes');
                    }
                ])
                ->get();

            $headercategorieswithoutsub = App\Category::where('status', 'active')
                ->where('showonheader', 'yes')
                ->where('hassubcategory', 'no')
                ->orderBy('sequence', 'asc')
                ->get();

            $postMenuCategory = App\Category::where('status', 'active')
                ->where('show_in_menu', 'yes')
                ->with([
                    'posts' => function ($q) {
                        $q->orderBy('created_at', 'desc')
                            ->take(4);
                    }
                ])
                ->orderBy('sequence', 'asc')
                ->get();

            $breakingNewsPosts = App\Post::where('status', 'published')
                ->where('breaking_news', 'yes')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            $tags = \App\Tag::latest()->take(10)->get();

        @endphp
        <header>
            <div id="header-layout1" class="header-style1">
                <div class="main-menu-area  header-menu-fixed" id="sticker">
                    <!-- Top Bar (Location, Date, Weather) -->
                    <section class="bg-body " style="border:1px solid #f9f9f9; ">
                        <div class="container">
                            <ul class="news-info-list text-center--md">
                                <li id="weatherInfo">
                                    <i class="fa fa-cloud"></i> Loading weather...
                                </li>

                                <li>|</li>
                                @php
                                    $lastUpdatedPost = \App\Post::where('status', 'published')
                                        ->orderBy('updated_at', 'desc')
                                        ->first();
                                @endphp

                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    Last Update
                                    {{ $lastUpdatedPost ? $lastUpdatedPost->updated_at->format('d M, h:i A') : '' }}
                                </li>

                                <li>|</li>
                                <li><a href="{{ route('e-paper') }}"><button class="login-btn"> <i
                                                class="fa-regular fa-newspaper"></i> ई-पेपर</button></a></li>
                                <li>|</li>
                                @foreach($topheaderCategories->take(5) as $category)
                                    <li>
                                        <a href="{{ route('category.posts', $category->slug) }}" style="color:#444">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    <li>|</li>
                                @endforeach

                                {{-- More button only if categories > 6 --}}
                                @if($topheaderCategories->count() > 5)
                                    <li id="moreBtn" style="cursor:pointer; font-weight:600;">+ More</li>
                                @endif

                                <!-- Custom Sidebar -->
                                <div id="customSidebar" class="custom-sidebar">

                                    <!-- Header -->
                                    <div class="sidebar-header">
                                        <a href="{{ route('e-paper') }}" class="epaper-btn">
                                            <i class="fa-regular fa-newspaper"></i> ई-पेपर
                                        </a>

                                        <button id="closeSidebar" class="close-btn">×</button>
                                    </div>

                                    <!-- Body -->
                                    <div class="sidebar-body">
                                        <nav class="sidebar-nav">
                                            <ul>
                                                {{-- Categories with posts --}}
                                                @foreach($topheaderCategories as $category)
                                                    @if($category->subcategories->count())
                                                        <li class="menu-item has-dropdown">
                                                            <div class="dropdown-toggle">
                                                                {{ $category->name }}

                                                            </div>

                                                            <ul class="submenu">
                                                                @foreach($category->subcategories as $sub)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('category.posts', [$category->slug, $sub->slug]) }}">
                                                                            {{ $sub->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li class="menu-item">
                                                            <a href="{{ route('category.posts', $category->slug) }}">
                                                                {{ $category->name }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </nav>
                                    </div>
                                </div>


                                <!-- Overlay -->
                                <div id="sidebarOverlay" class="sidebar-overlay"></div>

                                <div style="float:right;">
                                    <a href="{{ route('login') }}" class="report-button">
                                        <i class="fa fa-user"></i> Reporter Login
                                    </a>
                                </div>
                            </ul>
                        </div>

                    </section>
                    <div class="top-gap-section"></div>

                    <div class="mobile-menubar">
                        <div id="leftOffcanvas" class="offcanvas-menu-btn">
                            <a href="#" class="menu-bar"><span></span><span></span><span></span></a>
                        </div>
                        <div class="logo-area">
                            <a href="{{ route('homecategory') }}">
                                <img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo" class="img-fluid"
                                    width="40px">
                            </a>
                        </div>

                        <!-- Main Navigation + Hindi Menu -->


                        <!-- Search, E-paper, Login, Mobile Menu -->
                        <div class="d-flex gap-2 align-items-center" style="gap: 20px;">
                            <form id="top-search-form" class="header-search-light">
                                <input type="text" class="search-input" placeholder="Search...." style="display: none;">
                                <button><i class="fa fa-search"></i></button>

                                <!-- Search Button -->
                                <!--<button id="openSearchModal" class="jt-search-btn">Search</button>-->

                                <!-- Search Modal -->
                                <!--<div id="jtSearchModal" class="jt-modal">-->
                                <!--  <div class="jt-modal-content">-->

                                <!-- Close -->
                                <!--    <span class="jt-close">&times;</span>-->

                                <!-- Search Box -->
                                <!--    <div class="jt-search-box">-->
                                <!--      <input type="text" placeholder="Search..." class="jt-input" />-->
                                <!--      <button class="jt-search-submit">SEARCH</button>-->
                                <!--    </div>-->

                                <!-- Tags -->
                                <!--    <div class="jt-tags">-->
                                <!--      <span>वायु प्रदूषण</span>-->
                                <!--      <span>धुरंधर</span>-->
                                <!--      <span>आईपीएल ऑक्शन 2026</span>-->
                                <!--      <span>मनरेगा</span>-->
                                <!--      <span>सिडनी</span>-->
                                <!--      <span>प्रेमानंद महाराज</span>-->
                                <!--      <span>टूडर राशिफल</span>-->
                                <!--      <span>उत्तर प्रदेश</span>-->
                                <!--      <span>बॉलीवुड</span>-->
                                <!--    </div>-->

                                <!--  </div>-->
                                <!--</div>-->



                            </form>
                            <!-- <button class="login-btn"><i class="fa fa-user"></i>Sign in</button> -->
                        </div>

                    </div>

                    <div class="top-header mb-5">
                        <div class="container top-logo-section ">
                            <!-- Left Sidebar Trigger -->
                            <div id="leftMenuTrigger" class="left-menu-button">
                                <a href="#" class="hambtn"><span></span><span></span><span></span></a>
                            </div>

                            <!-- Left Sidebar -->
                            <div id="newLeftSidebar" class="new-left-sidebar">

                                <div class="new-sidebar-header">
                                    <a href="{{ route('e-paper') }}" class="new-epaper-btn">
                                        <i class="fa-regular fa-newspaper"></i> ई-पेपर
                                    </a>
                                    <button id="newLeftCloseBtn" class="new-close-btn">×</button>
                                </div>

                                <div class="new-sidebar-body">
                                    <nav class="new-sidebar-nav">
                                        <ul class="new-menu-list">

                                            <li>
                                                <a href="{{ route('homecategory') }}"><i class="fa-solid fa-house"></i>
                                                    Home</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('reporters') }}"><i class="fa-solid fa-users"></i> Our
                                                    Reporters</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('about-us') }}"><i
                                                        class="fa-solid fa-info-circle"></i> About Us</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('our-team') }}"><i class="fa-solid fa-user-tie"></i>
                                                    Our Team</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('archive') }}"><i class="fa-solid fa-box-archive"></i>
                                                    Archive</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('contact-us') }}"><i class="fa-solid fa-phone"></i>
                                                    Contact Us</a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Overlay -->
                            <div id="newLeftOverlay" class="new-left-overlay"></div>
                            <div class="logo-area-section">
                                <a href="{{ route('homecategory') }}">
                                    <img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo"
                                        class="img-fluid">
                                </a>
                            </div>

                            <div class="sub-menu-section">
                                <div class="news5-mega-menu">
                                    <div class="container">
                                        <nav>
                                            <ul class="news5-nav">

                                                {{-- Categories showing posts --}}
                                                @foreach($postMenuCategory as $category)
                                                    <li class="has-mega">
                                                        <a href="">{{ $category->name }}
                                                            <span class="arrow"></span></a>
                                                        <div class="mega-dropdown-card">
                                                            <div class="mega-grid">
                                                                @forelse($category->posts as $post)
                                                                    <div class="mega-card">
                                                                        <a href="{{ route('post.show', $post->slug) }}">
                                                                            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('front/images/default-news.png') }}"
                                                                                alt="{{ $post->title }}">
                                                                            <div class="mega-card-content">
                                                                                <span
                                                                                    class="cat-badge">{{ $category->name }}</span>
                                                                                <h4>{{ \Illuminate\Support\Str::limit($post->title, 70) }}
                                                                                </h4>
                                                                                <span
                                                                                    class="meta">{{ $post->created_at->diffForHumans() }}</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @empty
                                                                    <div class="mega-card">
                                                                        <h4>No posts available</h4>
                                                                    </div>
                                                                @endforelse

                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach


                                                {{-- Categories with subcategories --}}
                                                @foreach($headerCategoriesWithSub as $category)
                                                    <li class="has-mega">
                                                        <a href="{{ route('category.posts', $category->slug) }}">{{ $category->name }}
                                                            <span class="arrow"></span></a>
                                                        <div class="mega-dropdown-card1">
                                                            <ul class="state-list-simple">
                                                                @foreach($category->subcategories as $sub)
                                                                    <li><a
                                                                            href="{{ route('category.posts', [$category->slug, $sub->slug])}}">{{ $sub->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endforeach

                                                {{-- Categories without subcategories --}}
                                                @foreach($headercategorieswithoutsub as $category)
                                                    <li class="has-mega"><a
                                                            href="{{ route('category.posts', $category->slug) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach

                                                <li style="color:#fff; font-weight:600;">|</li>
                                                <li><a href="{{ route('e-paper') }}"><button class="login-btn"
                                                            style="color:#fff; font-weight:600;font-size:16px;"> <i
                                                                class="fa-regular fa-newspaper"></i> ई-पेपर</button></a>
                                                </li>
                                                <li style="color:#fff; font-weight:600;">|</li>
                                                <li>
                                                    <button type="button" class="jt-search-btn open-search"><i
                                                            class="fa fa-search"></i></button>

                                                    <div id="jtSearchModal" class="jt-modal">
                                                        <div class="jt-modal-content">

                                                            <!-- Close -->
                                                            <span class="jt-close">&times;</span>

                                                            <!-- Search Box -->
                                                            <!-- <div class="jt-search-box"> -->
                                                            <form id="top-search-form" class="jt-search-box"
                                                                action="{{ route('search') }}" method="GET">
                                                                <input type="text" name="q" placeholder="Search..."
                                                                    class="jt-input" />
                                                                <button class="jt-search-submit">SEARCH</button>
                                                            </form>
                                                            <!-- </div> -->

                                                            <!-- Tags -->

                                                            <div class="jt-tags">
                                                                @foreach($tags as $tag)
                                                                    <span class="jt-tag"
                                                                        data-url="{{ route('search', ['tag' => $tag->slug]) }}">
                                                                        {{ $tag->name }}
                                                                    </span>
                                                                @endforeach
                                                            </div>


                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        </nav>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->

        <script>
            document.querySelector('#top-search-form .search-input')
                .addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        document.getElementById('top-search-form').submit();
                    }
                });
            document.querySelector('#top-search-form .search-button').addEventListener('click', function () {
                document.getElementById('top-search-form').submit();
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const moreBtn = document.getElementById("moreBtn");
                const sidebar = document.getElementById("customSidebar");
                const overlay = document.getElementById("sidebarOverlay");
                const closeBtn = document.getElementById("closeSidebar");

                moreBtn.addEventListener("click", () => {
                    sidebar.classList.add("active");
                    overlay.classList.add("active");
                    document.body.style.overflow = "hidden"; // scroll lock
                });

                function closeSidebar() {
                    sidebar.classList.remove("active");
                    overlay.classList.remove("active");
                    document.body.style.overflow = "";
                }

                closeBtn.addEventListener("click", closeSidebar);
                overlay.addEventListener("click", closeSidebar);
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                document.querySelectorAll(".dropdown-toggle").forEach(toggle => {
                    toggle.addEventListener("click", function () {
                        this.parentElement.classList.toggle("active");
                    });
                });

            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const openBtn = document.getElementById("leftMenuTrigger");
                const sidebar = document.getElementById("newLeftSidebar");
                const overlay = document.getElementById("newLeftOverlay");
                const closeBtn = document.getElementById("newLeftCloseBtn");

                openBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    sidebar.classList.add("active");
                    overlay.classList.add("active");
                    document.body.style.overflow = "hidden";
                });

                function closeSidebar() {
                    sidebar.classList.remove("active");
                    overlay.classList.remove("active");
                    document.body.style.overflow = "";
                }

                closeBtn.addEventListener("click", closeSidebar);
                overlay.addEventListener("click", closeSidebar);

            });
        </script>
        <script>

            const modal = document.getElementById("jtSearchModal");
            const closeBtn = document.querySelector(".jt-close");

            document.querySelectorAll(".open-search").forEach(btn => {
                btn.addEventListener("click", () => {
                    modal.style.display = "block";
                });
            });

            closeBtn.onclick = () => modal.style.display = "none";

            window.onclick = (e) => {
                if (e.target === modal) modal.style.display = "none";
            };
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const weatherEl = document.getElementById("weatherInfo");
                const apiKey = "{{ config('services.openweather.key') }}";

                // Step 1: Get user location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        position => {
                            const lat = position.coords.latitude;
                            const lon = position.coords.longitude;

                            // Step 2: Fetch weather
                            fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`)
                                .then(res => res.json())
                                .then(data => {
                                    // console.log(data, 'data');

                                    if (data && data.main) {
                                        const temp = Math.round(data.main.temp);
                                        const city = data.name;
                                        const state = data.sys?.country || '';

                                        weatherEl.innerHTML =
                                            `<i class="fa fa-cloud"></i> ${temp}°C ${city}${state ? ', ' + state : ''}`;
                                    }
                                })
                                .catch(() => {
                                    weatherEl.innerHTML = `<i class="fa fa-cloud"></i> Weather unavailable`;
                                });
                        },
                        () => {
                            weatherEl.innerHTML = `<i class="fa fa-cloud"></i> Location denied`;
                        }
                    );
                } else {
                    weatherEl.innerHTML = `<i class="fa fa-cloud"></i> Location not supported`;
                }

            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".jt-tag").forEach(tag => {
                    tag.addEventListener("click", function () {
                        const url = this.dataset.url;
                        if (url) {
                            window.location.href = url;
                        }
                    });
                });
            });
        </script>