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
                    <!-- Top Bar (Location, Date, Weather) -->
                    <section class="bg-body">
                        <div class="container">
                            <ul class="news-info-list text-center--md">
                                <li><i class="fa fa-cloud"></i> 29°C Noida, Uttar Pradesh</li> |
                                <li><i class="fa fa-calendar"></i> <span id="current_date"></span></li>
                                <!-- <li><i class="fa fa-clock-o"></i> Last Update 11:30 am</li> -->
                                <!-- <li><i class="fa fa-cloud"></i> 29°C Greater Noida, Uttar Pradesh</li> -->
                            </ul>
                        </div>
                    </section>

                    <div class="mobile-menubar">
                        <div id="side-menu-trigger" class="offcanvas-menu-btn">
                            <a href="#" class="menu-bar"><span></span><span></span><span></span></a>
                        </div>
                        <div class="logo-area">
                            <a href="index.html">
                                <img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo" class="img-fluid" width="40px">
                            </a>
                        </div>

                        <!-- Main Navigation + Hindi Menu -->


                        <!-- Search, E-paper, Login, Mobile Menu -->
                        <div class="d-flex gap-2 align-items-center" style="gap: 20px;">
                            <form id="top-search-form" class="header-search-light">
                                <input type="text" class="search-input" placeholder="Search...." style="display: none;">
                                <button class="search-button"><i class="fa fa-search"></i></button>


                            </form>
                            <!-- <button class="login-btn"><i class="fa fa-user"></i>Sign in</button> -->
                        </div>

                    </div>

                    <div class="container">
                        <div class="row no-gutters d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-lg-2 d-none d-lg-block">
                                <div class="logo-area">
                                    <a href="index.html">
                                        <img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo" class="img-fluid" width="70px">
                                    </a>
                                </div>
                            </div>

                            <!-- Main Navigation + Hindi Menu -->
                            <div class="col-xl-7 col-lg-7 position-static min-height-none">

                            </div>

                            <!-- Search, E-paper, Login, Mobile Menu -->
                            <div class="col-xl-3 col-lg-3 text-right">
                                <div class="header-action-item">
                                    <ul>
                                        <li>
                                            <form id="top-search-form" class="header-search-light">
                                                <input type="text" class="search-input" placeholder="Search....">
                                                <button class="search-button"><i class="fa fa-search"></i></button>
                                            </form>
                                        </li>
                                        <li><a href="e-paper.html"><button class="login-btn">ई-पेपर</button></a></li>
                                        <li><button class="login-btn"><i class="fa fa-user"></i> Sign in</button></li>
                                        <li>
                                            <div id="side-menu-trigger" class="offcanvas-menu-btn">
                                                <a href="#" class="menu-bar"><span></span><span></span><span></span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- NEWS5 CARD STYLE MEGA MENU (IMAGE + TITLE + DATE) -->
                    <div class="news5-mega-menu" style="background:#fff; border-top:1px solid #f0f0f0;">
                        <div class="container">
                            <nav>
                                <ul class="news5-nav">

                                    <!-- Latest - Card Style Mega Menu -->
                                    <li class="has-mega">
                                        <a href="#">टॉप न्यूज़ <span class="arrow"></span></a>

                                        <div class="mega-dropdown-card">
                                            <div class="mega-grid">

                                                <!-- Card 1 -->
                                                <div class="mega-card">
                                                    <img src="	https://tejyug.com/public/front/images/Tej-Yug-News-logo.png"
                                                        alt="">
                                                    <div class="mega-card-content">
                                                        <span class="cat-badge">टॉप न्यूज़</span>
                                                        <h4>सिरौली पुलिस चौकी पर तैनात पुलिस बल ने भूखे लोगो को खाना
                                                            खिलाकर पूछा हाल।</h4>
                                                        <span class="meta">2 months ago • 1 min read</span>
                                                    </div>
                                                </div>

                                                <!-- Card 2 -->
                                                <div class="mega-card">
                                                    <img src="	https://tejyug.com/public/front/images/Tej-Yug-News-logo.png"
                                                        alt="">
                                                    <div class="mega-card-content">
                                                        <span class="cat-badge">टॉप न्यूज़</span>
                                                        <h4>E-tailers to deliver food at doorstep in Lucknow</h4>
                                                        <span class="meta">23 days ago • 15 comments</span>
                                                    </div>
                                                </div>

                                                <!-- Card 3 -->
                                                <div class="mega-card">
                                                    <img src="	https://tejyug.com/public/front/images/Tej-Yug-News-logo.png"
                                                        alt="">
                                                    <div class="mega-card-content">
                                                        <span class="cat-badge">टॉप न्यूज़</span>
                                                        <h4>यूपी यानी अनलिमिटेड पोटेंशियलः सीएम योगी</h4>
                                                        <span class="meta">29 days ago • 20 likes</span>
                                                    </div>
                                                </div>

                                                <!-- Card 4 -->
                                                <div class="mega-card">
                                                    <img src="	https://tejyug.com/public/front/images/Tej-Yug-News-logo.png"
                                                        alt="">
                                                    <div class="mega-card-content">
                                                        <span class="cat-badge">टॉप न्यूज़</span>
                                                        <h4>उत्तर प्रदेश पुलिस द्वारा किए गए सराहनीय कार्य का विवरण
                                                            दिनांक: 15-02-2024</h4>
                                                        <span class="meta">2 months ago • 5 shares</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-mega">
                                        <a href="#">राज्य <span class="arrow"></span></a>

                                        <!-- Naya simple vertical dropdown, purana mega-dropdown-card use nahi kar rahe -->
                                        <div class="state-dropdown-only">
                                            <ul class="state-list-simple">
                                                <li><a href="#"> दिल्ली</a></li>
                                                <li><a href="#">चंडीगढ़</a></li>
                                                <li><a href="#">नई दिल्ली</a></li>
                                                <li><a href="#">मध्य प्रदेश</a></li>
                                                <li><a href="#">उत्तराखंड</a></li>

                                                <!-- Baaki jitne chahiye daal do -->
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has-mega"><a href="#"> राजनीति</a></li>


                                    <li class="has-mega"><a href="#">खबरें हटके</a></li>
                                    <li class="has-mega"><a href="#">ताज़ा खबर</a></li>
                                    <li class="has-mega"><a href="#">क्राइम</a></li>
                                    <li class="has-mega"><a href="#">वीडियो</a></li>
                                    <li><a href="#"> हेल्थ</a></li>
                                    <li><a href="#"> विदेश</a></li>
                                    <li><a href="#"> टेक्नोलॉजी</a></li>
                                    <li><a href="#"> मनोरंजन</a></li>
                                    <li><a href="#"> साहित्य/लेख</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>

                    <section class="bg-accent border-bottom ">
                        <div class="container">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                    <div class="topic-box topic-box-margin">Breaking News</div>
                                </div>
                                <div class="col-lg-10 col-md-9 col-sm-8 col-6">
                                    <div class="feeding-text-dark">
                                        <ol id="sample" class="ticker">
                                            <li>
                                                <a href="#">लखनऊमुख्यमंत्री योगी ने उद्योगपतियों को दिया रात्रिभोज सीएम
                                                    आवास रात्रिभोज में शामिल हुए निवेशक उद्योगपतियों को सीएम आवास पर
                                                    किया आमंत्रित GBC</a>
                                            </li>
                                            <li>
                                                <a href="#">एसबीआई, केंद्र सरकार और चुनाव आयोग को इलेक्टोरल बांड पर
                                                    सुप्रीम कोर्ट ने 15 मार्च तक डाटा पब्लिक करने को कहा.</a>
                                            </li>
                                            <li>
                                                <a href="#">ममता बनर्जी का इस्तीफा... कोर्ट से बाहर कर दूंगा', किस पर
                                                    फूटा CJI चंद्रचूड़ का गुस्सा?</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->