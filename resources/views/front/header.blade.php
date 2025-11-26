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
</head>

<body>

    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header-layout1" class="header-style1">
                <div class="main-menu-area bg-primarytextcolor header-menu-fixed" id="sticker">
                    <div class="container">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-lg-2 d-none d-lg-block">
                                <div class="logo-area">
                                    <a href="index.html">
                                        <img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo"
                                            class="img-fluid" width="70px">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 position-static min-height-none">
                                <div class="ne-main-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li class="active">
                                                <a href="#">Home</a>
                                                <ul class="ne-dropdown-menu">
                                                    <li class="active">
                                                        <a href="index.html">Home 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index2.html">Home 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index3.html">Home 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="index4.html">Home 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="index5.html">Home 5</a>
                                                    </li>
                                                    <li>
                                                        <a href="index6.html">Home 6</a>
                                                    </li>
                                                    <li>
                                                        <a href="index7.html">Home 7</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">राज्य</a>
                                                <ul class="ne-dropdown-menu">
                                                    <li>
                                                        <a href="post-style-1.html">बिहार</a>
                                                    </li>
                                                    <li>
                                                        <a href="post-style-2.html">उत्तर प्रदेश</a>
                                                    </li>
                                                    <!-- <li>
                                                            <a href="post-style-3.html">Post Style 3</a>
                                                        </li>
                                                        <li>
                                                            <a href="post-style-4.html">Post Style 4</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-news-1.html">News Details 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-news-2.html">News Details 2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-news-3.html">News Details 3</a>
                                                        </li> -->
                                                </ul>
                                            </li>
                                            <!-- <li>
                                                    <a href="#">Pages</a>
                                                    <ul class="ne-dropdown-menu">
                                                        <li>
                                                            <a href="author-post.html">Author Post Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="archive.html">Archive Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="gallery-style-1.html">Gallery Style 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="gallery-style-2.html">Gallery Style 2</a>
                                                        </li>
                                                        <li>
                                                            <a href="404.html">404 Error Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="contact.html">Contact Page</a>
                                                        </li>
                                                    </ul>
                                                </li> -->
                                            <li>
                                                <a href="post-style-1.html"> खबरें हटके</a>
                                            </li>
                                            <li>
                                                <a href="post-style-2.html"> ताज़ा खबर</a>
                                            </li>
                                            <li>
                                                <a href="post-style-3.html"> क्राइम</a>
                                            </li>
                                            <li>
                                                <a href="post-style-4.html"> वीडियो</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 text-right position-static">
                                <div class="header-action-item">
                                    <ul>
                                        <li>
                                            <form id="top-search-form" class="header-search-light">
                                                <input type="text" class="search-input" placeholder="Search...."
                                                    required="" style="display: none;">
                                                <button class="search-button">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <button type="button" class="login-btn" data-toggle="modal"
                                                data-target="#myModal">
                                                ई-पेपर
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="login-btn" data-toggle="modal"
                                                data-target="#myModal">
                                                <i class="fa fa-user" aria-hidden="true"></i>Sign in
                                            </button>
                                        </li>
                                        <li>
                                            <div id="side-menu-trigger" class="offcanvas-menu-btn">
                                                <a href="#" class="menu-bar">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                                <a href="#" class="menu-times close">
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->