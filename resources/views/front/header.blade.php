<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1809333519291984"
     crossorigin="anonymous"></script>
    
    
    <!--Whats app SEO-->
    @if (isset($post))
    
    <title>{{ $post->metatitle }}</title>
    <meta name="description" content="{{ $post->metadescription }}">
    <meta name="keywords" content="{{ $post->metakeyword }}">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="tejyug.com" />
    <meta property="og:title" content="{{ $post->title }} - Tej Yug News | Hindi News | Lates News  "/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta property="og:description" content="{{ Str::words($post->content, $words = 50, $end = '...') }}" />
    @if(isset($post->image) && Storage::exists($post->image))
    <meta property="og:image" content="{{ URL::asset('storage/'.$post->image) }}"/> 
    @else
    <meta property="og:image" content="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}"/> 
    @endif
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="600"/>
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
    <meta name="description" content="{{ $uppertab1category->metadescription }},{{ $uppertab2category->metadescription }},{{ $uppertab3category->metadescription }},{{ $uppertab4category->metadescription }},{{ $otherwidgetcategory->metadescription }},{{ $mustreadcategory->metadescription }},{{ $youmaylikecategory->metadescription }},{{ $sidebartab1category->metadescription }},{{ $sidebartab2category->metadescription }},{{ $sidebartab3category->metadescription }},{{ $center1category->metadescription }},{{ $center2category->metadescription }},{{ $center3category->metadescription }},{{ $lower1category->metadescription }},{{ $lower2category->metadescription }},{{ $lower3category->metadescription }}">
    <meta name="keywords" content="{{ $uppertab1category->metakeyword }},{{ $uppertab2category->metakeyword }},{{ $uppertab3category->metakeyword }},{{ $uppertab4category->metakeyword }},{{ $otherwidgetcategory->metakeyword }},{{ $mustreadcategory->metakeyword }},{{ $youmaylikecategory->metakeyword }},{{ $sidebartab1category->metakeyword }},{{ $sidebartab2category->metakeyword }},{{ $sidebartab3category->metakeyword }},{{ $center1category->metakeyword }},{{ $center2category->metakeyword }},{{ $center3category->metakeyword }},{{ $lower1category->metakeyword }},{{ $lower2category->metakeyword }},{{ $lower3category->metakeyword }}">
    @else
    <meta name="description" content="Tej Yug News Online | Hindi News | Latest News">
    <meta name="keywords" content="Tej Yug News Online | Hindi News | Latest News">
    @endif
    @endif
    
	<link rel="stylesheet" href="{{ URL::asset('front/css/library/bootstrap-v4/bootstrap.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" href="{{ URL::asset('front/css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('front/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1809333519291984"
     crossorigin="anonymous"></script>
	
<!--<script data-ad-client="ca-pub-8691037606832105" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!--	Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173556815-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-173556815-1');
    </script>
    <!-- Google Adsense Verify -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1809333519291984"
     crossorigin="anonymous"></script>
    <!-- Google Adsense Verify Ends -->
    
    <style>
        .navbar-toggler-icon .fas.fa-bars {
            font-size: 1.8rem !important;
            margin-top: 0.6px;
        }
        @media (min-width:620px) {
            .mobile-view-menu-bar{
                display:none;
            }
           
        }
         .sidebar-profile-details{
                display:flex;
                gap:20px;
                justify-content:center;
                align-items:center;
            }
            .profile-details{
                display:flex;
                flex-direction:column;
            }
            .profile-img{
                width:50px;
                height:50px;
                border-radius:50%;
                background:green;
            }
            .profile-details{
                width:75%;
                height:auto;
                
            }
    </style>
    @php
    $cslug = url()->current();
    @endphp
    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1809333519291984"
     crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
	<header>
        <!-- main header -->
		<div class="main-header" style="border-top:3px solid #dc3545">
			<div class="container-fluid">
				<div class="row">
				    <div class="col-12">
				        <nav class="navbar navbar-expand-lg navbar-light py-0">
				            <a class="navbar-brand py-0"  href="{{ route('/') }}">
                                @if (isset($headersetting->image) && Storage::exists($headersetting->image))
                                <img src="{{ asset('front/images/Tej-Yug-News-logo.png') }}" alt="{{ $headersetting->title ?? '' }}" alt="Tej Yug News Logo" class="img-fluid main-logo" style="width:80px;">
                                @else
                                <img src="{{ asset('front/images/Tej-Yug-News-logo.png') }}" alt="Tej Yug News Logo" class="img-fluid main-logo" style="width:80px;">
                                @endif
                            </a>
                            <div class="mobile-view-menu-bar">
                                <a  data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  <i class="fa fa-bars" aria-hidden="true"></i>
</a>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
   <div class="sidebar-design">
       <div class="sidebar-profile-details border-bottom pb-3">
           <div class="profile-img" >
          
           </div>
           <div class="profile-details">
              <h4 class="m-0" style="font-size:16px;font-weight:600;">Tejyug News</h4> 
              <p class="m-0" style="font-size:12px;">+91 98373 54682</p>
               
           </div>
       </div>
       <div class="side-bar-menu-name p-2">
          
                                @if (isset($headercategorieswithoutsubcategories) && count($headercategorieswithoutsubcategories)>0)
                                 @foreach ($headercategorieswithoutsubcategories as $headercategorieswithoutsubcategory)
                               <div style="border-bottom" >
                                    <a class="nav-link @if($headercategorieswithoutsubcategory->slug == $cslug) active @endif " href="{{ route('homecategory',$headercategorieswithoutsubcategory->slug) }}" style="border-bottom:1px solid #f3f3f3; padding-bottom:10px;padding-top:10px;"> @if($headercategorieswithoutsubcategory->image) <img src="{{ URL::asset('storage/'.$headercategorieswithoutsubcategory->image) }}"  alt="" class="secondry-icon-img" /> @endif {{$headercategorieswithoutsubcategory->name}}</a>
                                </div>
                                @endforeach
                                @endif

       </div>
       
   </div>
  </div>
</div>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/videos') }}">होम</a>
                                    </li>
                                    
                                     @if (isset($leftcategorieswithoutsubcategories) && count($leftcategorieswithoutsubcategories)>0)
                                    @foreach ($leftcategorieswithoutsubcategories as $leftcategorieswithoutsubcategory)
                                    <li class="nav-item">
                                        <a href="{{ route('postbycategory',$leftcategorieswithoutsubcategory->slug) }}" class="nav-link"> {{ $leftcategorieswithoutsubcategory->name }}</a>
                                    </li>
                                   
                                    @endforeach
                                    @endif
</ul>
				            
				    </div>
                             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/videos') }}"><i class="fas fa-play-circle"></i> वीडियो</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/searchs') }}" class="nav-link"><i class="fas fa-search"></i> सर्च</a>
                                    </li>
                                   <!-- <li class="nav-item">
                                        <a href="#" class="nav-link" target="_blank"><i class="fas fa-mobile-alt"></i> वेब स्टोरीज</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="{{ route('e-paper') }}" class="nav-link" target="_blank" ><i class="far fa-newspaper"></i> ई-पेपर</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle" style="font-size: 24px;"></i> </a>
                                        <div class="dropdown-menu" >
                                        <a class="dropdown-item py-0" href="#">
                                            <div id="loginDropdown">
                                                <a class="dropdown-inner-itemone"><i class="fas fa-user-circle profile-icon"></i> मेरा प्रोफाइल</a>
                                                <a href="{{ route('login') }}" class="dropdown-inner-itemtwo btn btn-warning">लॉगिन</a>
                                            </div>
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item py-0" href="#">
                                         
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item py-0" href="{{ url('/faq') }}">
                                            <div id="loginDropdown">
                                                <a href="{{ url('/faq') }}" class="dropdown-inner-itemone">FAQ's</a>
                                                <a href="{{ url('/faq') }}" class="dropdown-inner-itemtwo"><i class="far fa-comment-alt profile-icons"></i></a>
                                            </div>
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item py-0" href="mailto:prakashprabhaw.com">
                                                <div id="loginDropdown">
                                                    <a href="mailto:prakashprabhaw.com" class="dropdown-inner-itemone">फीडबैक दें</a>
                                                    <a href="mailto:prakashprabhaw.com" class="dropdown-inner-itemtwo"><i class="far fa-envelope profile-icons"></i></a>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
				            </nav>
				            
				    </div>
			<!--		<div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light py-0">
                            <a class="navbar-brand py-0"  href="{{ route('/') }}">
                                @if (isset($headersetting->image) && Storage::exists($headersetting->image))
                                <img src="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" alt="{{ $headersetting->title ?? '' }}" alt="Tej Yug News Logo" class="img-fluid main-logo">
                                @else
                                <img src="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" alt="Tej Yug News Logo" class="img-fluid main-logo">
                                @endif
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('/') }}"><i class="fas fa-home"></i> होम <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/videos') }}"><i class="fas fa-play-circle"></i> वीडियो</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/searchs') }}" class="nav-link"><i class="fas fa-search"></i> सर्च</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a href="{{ route('e-paper') }}" class="nav-link" target="_blank" ><i class="far fa-newspaper"></i> ई-पेपर</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle" style="font-size: 24px;"></i> </a>
                                        <div class="dropdown-menu" >
                                        <a class="dropdown-item py-0" href="#">
                                            <div id="loginDropdown">
                                                <a class="dropdown-inner-itemone"><i class="fas fa-user-circle profile-icon"></i> मेरा प्रोफाइल</a>
                                                <a href="{{ route('login') }}" class="dropdown-inner-itemtwo btn btn-warning">लॉगिन</a>
                                            </div>
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item py-0" href="#">
                                          
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item py-0" href="{{ url('/faq') }}">
                                            <div id="loginDropdown">
                                                <a href="{{ url('/faq') }}" class="dropdown-inner-itemone">FAQ's</a>
                                                <a href="{{ url('/faq') }}" class="dropdown-inner-itemtwo"><i class="far fa-comment-alt profile-icons"></i></a>
                                            </div>
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item py-0" href="mailto:prakashprabhaw.com">
                                                <div id="loginDropdown">
                                                    <a href="mailto:prakashprabhaw.com" class="dropdown-inner-itemone">फीडबैक दें</a>
                                                    <a href="mailto:prakashprabhaw.com" class="dropdown-inner-itemtwo"><i class="far fa-envelope profile-icons"></i></a>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
					</div> -->
				</div>
			</div>
		</div>

		<!-- <div class="navigation-menu" style="  background: red;">
			<div class="container">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="fas fa-bars"></span>
  					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="{{ route('/') }}">होम</a>
                            </li>
                            @if (isset($headercategorieswithsubcategories) && count($headercategorieswithsubcategories)>0)
                            @foreach ($headercategorieswithsubcategories as $headercategorieswithsubcategory)
                            <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="{{ route('postbycategory',$headercategorieswithsubcategory->slug) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          							{{ $headercategorieswithsubcategory->name }}
        						</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									@if (isset($headercategorieswithsubcategory->subcategories) && count($headercategorieswithsubcategory->subcategories)>0)
									@foreach ($headercategorieswithsubcategory->subcategories as $subcategory)
                                        <li class="dropdown-item"><a href="{{ route('postbycategory',[$headercategorieswithsubcategory->slug,$subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                    @elseif (isset($headercategorieswithsubcategory->posts) && count($headercategorieswithsubcategory->posts)>0)
                                    @foreach ($headercategorieswithsubcategory->posts as $post)
                                        <li class="dropdown-item"><a href="{{ route('postdetail',[$headercategorieswithsubcategory->slug,$post->slug]) }}">{{ $post->title }}</a></li>
                                    @endforeach
                                    @endif
								</ul>
                            </li>
                            @endforeach
                            @endif
                            @if (isset($headercategorieswithoutsubcategories) && count($headercategorieswithoutsubcategories)>0)
                            @foreach ($headercategorieswithoutsubcategories as $category)
							<li class="nav-item">
								<a class="nav-link" href="{{ route('postbycategory',$category->slug) }}">{{ $category->name }}</a>
							</li>
                            @endforeach
                            @endif
						</ul>
					</div>
				</nav>
			</div>
		</div> -->

		<!-- <div class="bottom-menu">
			<div class="container">
				<div class="extra-highlights">
					<ul>
                        @if (isset($tags) && count($tags)>0)
                        @foreach ($tags as $tag)
						<li>
							<form action="{{ route('search') }}" method="GET">
								<input type="hidden" name="tag" value="{{ $tag->slug }}">
								<button type="submit" class="btn btn-link">{{ $tag->name }}</button>
							</form>
						</li>
                        @endforeach
                        @endif
					</ul>
				</div>
			</div>
		</div> -->
		
		<!-- <div class="breaking-news">
		    <div class="container">
		        <div class="row">
                    <div class="col-sm-3 col-md-2">
                        <h3>Breaking News:</h3>
                    </div>
                    <div class="col-sm-9 col-md-10">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
                            <ul class="news-mar">
                                @if(isset($breakingnews) && count($breakingnews)>0)
                                @foreach($breakingnews as $breakingnew)
                                <li><a href="{{ route('postdetail',[$breakingnew->categories[0]->category->slug,$breakingnew->slug]) }}">{{ $breakingnew->title }}</a> <i class="far fa-star"></i></li>
                                @endforeach
                                @endif
                            </ul>
                        </marquee>
                    </div>
                </div>
		    </div>
		</div> -->
	</header>