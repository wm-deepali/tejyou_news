@include('front.header')

<!-- News Slider Area Start Here -->
<section class="bg-accent">
    <div class="container">
        <div class="row tab-space1">

            {{-- BIG MAIN NEWS --}}
            <div class="col-lg-6 col-md-12 banner-img">
                @php $main = $recentNews->first(); @endphp
                @if($main)
                    <div class="img-overlay-70 img-scale-animate mb-2 img-ban">
                        <img src="{{ asset('storage/' . $main->image) }}" alt="news" class="img-fluid width-100">

                        <div class="mask-content-lg">
                            <div class="topic-box-sm color-cinnabar mb-20">
                                {{ $main->category->name ?? 'News' }}
                            </div>

                            <div class="post-date-light">
                                <ul>
                                    <li>
                                        <span>by</span>
                                        <a href="{{ route('reporter.posts', $main->user->id) }}">{{ $main->user->name ?? 'Admin' }}</a>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-calendar"></i></span>
                                        {{ $main->created_at->format('F d, Y') }}
                                    </li>
                                </ul>
                            </div>

                            <h1 class="title-medium-light">
                                <a href="{{ route('post.show', $main->slug) }}">
                                    {{ $main->title }}
                                </a>
                            </h1>
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT SIDE 3 NEWS --}}
            <div class="col-lg-6 col-md-12">
                <div class="row tab-space1">

                    @foreach($recentNews->skip(1)->take(3) as $news)
                        <div class="col-sm-6 col-12 @if($loop->first) col-12 @endif">
                            <div class="img-overlay-70 img-scale-animate mb-2" style="height:100%;">

                                <div class="mask-content-sm">
                                    <div class="topic-box-sm color-azure-radiance mb-10">
                                        {{ $news->category->name ?? 'News' }}
                                    </div>

                                    <h{{ $loop->first ? 2 : 3 }} class="title-medium-light">
                                        <a href="{{ route('post.show', $news->slug) }}">
                                            {{ $news->title }}
                                        </a>
                                    </h{{ $loop->first ? 2 : 3 }}>
                                </div>

                                <img src="{{ asset('storage/' . $news->image) }}" alt="news" class="img-fluid width-100"
                                    style="height:100%;">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Top Story Area Start Here -->
<section class="bg-body section-space-default">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="mb-20-r ne-isotope">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg color-cinnabar">{{ $rajyaCategory->name }}</div>
                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($rajyaCategory->subcategories as $key => $subcategory)
                                <a href="#" data-filter=".subcat-{{ $subcategory->id }}"
                                    class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="more-info-link">
                            <a href="post-style-1.html">More
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="featuredContainer">
                        @foreach($rajyaCategory->subcategories as $subcategory)
                            <div class="row subcat-{{ $subcategory->id }}">
                                <div class="col-md-6 col-sm-12">
                                    @php $mainPost = $subcategory->posts->first(); @endphp
                                    @if($mainPost)
                                        <div class="img-overlay-70 img-scale-animate mb-30">
                                            <a href="{{ route('post.show', $mainPost->slug) }}">
                                                <img src="{{ asset('storage/' . $mainPost->image) }}"
                                                    alt="{{ $mainPost->title }}" class="img-fluid width-100">
                                            </a>
                                            <div class="mask-content-lg">
                                                <div class="topic-box-sm color-cinnabar mb-20">{{ $subcategory->name }}</div>
                                                <div class="post-date-light">
                                                    <ul>
                                                        <li>
                                                            <span>by</span>
                                                            <a href="{{ route('reporter.posts', $mainPost->user->id) }}">{{ $mainPost->user->name ?? 'Admin' }}</a>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            {{ $mainPost->created_at->format('F d, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="title-medium-light size-lg">
                                                    <a
                                                        href="{{ route('post.show', $mainPost->slug) }}">{{ $mainPost->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    @foreach($subcategory->posts->skip(1) as $post)
                                        <div class="media mb-30">
                                            <a class="width38-lg width40-md img-opacity-hover"
                                                href="{{ route('post.show', $post->slug) }}">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                    class="img-fluid" style="width: 132px; height: 95px;">
                                            </a>
                                            <div class="media-body">
                                                <div class="post-date-dark">
                                                    <ul>
                                                        <li>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            {{ $post->created_at->format('F d, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="title-medium-dark size-md mb-none">
                                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if($videshCategory)
                    <div class="row tab-space1 mb-25">
                        <div class="col-12">
                            <div class="topic-border color-apple mb-30 width-100">
                                <div class="topic-box-lg color-apple">{{ $videshCategory->name }}</div>
                            </div>
                        </div>
                        @foreach($videshCategory->posts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="img-overlay-70 img-scale-animate mb-2">
                                    <div class="mask-content-xs">
                                        <div class="post-date-light">
                                            <ul>
                                                <li>
                                                    <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    {{ $post->created_at->format('d F, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-light">
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                    </div>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="img-fluid width-100">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Stay Connected</div>
                    </div>
                    <ul class="stay-connected overflow-hidden">
                        <li class="facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <div class="connection-quantity">50.2 k</div>
                            <p>Fans</p>
                        </li>
                        <li class="twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <div class="connection-quantity">10.3 k</div>
                            <p>Followers</p>
                        </li>
                        <li class="linkedin">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                            <div class="connection-quantity">25.4 k</div>
                            <p>Fans</p>
                        </li>
                        <li class="rss">
                            <i class="fa fa-rss" aria-hidden="true"></i>
                            <div class="connection-quantity">20.8 k</div>
                            <p>Subscriber</p>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="https://tejyug.com/public/front/images/bombay-high-court_1702451223.jpg" alt="ad"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-scampi mb-5">
                        <div class="topic-box-lg color-scampi">Recent News</div>
                    </div>
                    <div class="row">
                        @foreach($recentNews as $news)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="mt-25">
                                    <a href="{{ route('post.show', $news->slug) }}" class="img-opacity-hover">
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                            class="img-fluid mb-10 width-100">
                                    </a>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="{{ route('post.show', $news->slug) }}">{{ $news->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ne-banner-layout1 mt-20-r text-center">
                    <a href="#">
                        <img src="{{ asset('website') }}/img/banner/banner2.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Story Area End Here -->
<!-- Video Area Start Here -->
@php
    $colors = ['color-pomegranate', 'color-persian-green', 'color-web-orange'];
@endphp
<section class="bg-accent section-space-less4">
    <div class="container">
        <div class="row tab-space2">
            @foreach($videoPosts as $index => $post)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="img-overlay-70">

                        <div class="mask-content-sm">
                            <div class="topic-box-sm {{ $colors[$index % count($colors)] }} mb-20">
                                {{ $post->category->name ?? 'News' }}
                            </div>
                            <h3 class="title-medium-light">
                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                        </div>

                        <div class="text-center">
                            @if($post->video)
                                {{-- Embed YouTube or self-hosted video --}}
                                <div class="img-fluid width-100">
                                    <img class="embed-responsive-item youtube-video" data-videoid="{{$post->video}}"
                                        src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" class="d-block w-100" />
                                </div>
                            @endif
                        </div>

                        {{-- Fallback image --}}
                        @if(!$post->video)
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                alt="{{ $post->title }}" class="img-fluid width-100">
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Video Area End Here -->
<!-- Latest News Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            @if($khelCategory)
                <div class="col-lg-4 col-md-12">
                    <div class="topic-border color-cutty-sark mb-30 width-100">
                        <div class="topic-box-lg color-cutty-sark">{{ $khelCategory->name }}</div>
                    </div>

                    @php
                        $firstPost = $khelCategory->posts->first();
                    @endphp

                    @if($firstPost)
                        <div class="img-overlay-70 img-scale-animate mb-30">
                            <div class="mask-content-sm">
                                <div class="post-date-light">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $firstPost->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light">
                                    <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                </h3>
                            </div>
                            <img src="{{ asset('storage/' . $firstPost->image) }}" alt="news" class="img-fluid width-100">
                        </div>
                    @endif

                    @foreach($khelCategory->posts->slice(1) as $post)
                        <div class="media mb-30">
                            <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $post->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            @if($rajneetiCategory)
                <div class="col-lg-4 col-md-12">
                    <div class="topic-border color-pomegranate mb-30 width-100">
                        <div class="topic-box-lg color-pomegranate">{{ $rajneetiCategory->name }}</div>
                    </div>

                    @php
                        $firstPost = $rajneetiCategory->posts->first();
                    @endphp

                    @if($firstPost)
                        <div class="img-overlay-70 img-scale-animate mb-30">
                            <div class="mask-content-sm">
                                <div class="post-date-light">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $firstPost->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light">
                                    <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                </h3>
                            </div>
                            <img src="{{ asset('storage/' . $firstPost->image) }}" alt="news" class="img-fluid width-100">
                        </div>
                    @endif

                    @foreach($rajneetiCategory->posts->slice(1) as $post)
                        <div class="media mb-30">
                            <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $post->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($crimeCategory)
                <div class="col-lg-4 col-md-12">
                    <div class="topic-border color-web-orange mb-30 width-100">
                        <div class="topic-box-lg color-web-orange">{{ $crimeCategory->name }}</div>
                    </div>

                    @php
                        $firstPost = $crimeCategory->posts->first();
                    @endphp

                    @if($firstPost)
                        <div class="img-overlay-70 img-scale-animate mb-30">
                            <div class="mask-content-sm">
                                <div class="post-date-light">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $firstPost->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light">
                                    <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                </h3>
                            </div>
                            <img src="{{ asset('storage/' . $firstPost->image) }}" alt="news" class="img-fluid width-100">
                        </div>
                    @endif

                    @foreach($crimeCategory->posts->slice(1) as $post)
                        <div class="media mb-30">
                            <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $post->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ne-banner-layout1 mb-50 mt-20-r text-center">
                    <a href="#">
                        <img src="{{ asset('website') }}/img/banner/banner2.jpg" alt="ad" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
        <div class="ne-isotope">
            <div class="row">
                <div class="col-12">
                    <div class="topic-border color-azure-radiance mb-30">
                        <div class="topic-box-lg color-azure-radiance">Categories</div>
                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($otherCategories as $slug => $category)
                                <a href="#" data-filter=".{{ $slug }}" class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="more-info-link">
                            <a href="post-style-1.html">More
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="featuredContainer">
                @foreach($otherCategories as $slug => $category)
                    <div class="row {{ $slug }}">
                        @php
                            $firstPost = $category->posts->first();
                            $otherPosts = $category->posts->skip(1);
                        @endphp

                        @if($firstPost)
                            <div class="col-xl-4 col-lg-7 col-md-6 col-sm-12">
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                        class="img-fluid width-100">
                                    <div class="topic-box-top-lg">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
                                    </div>
                                    <div class="mask-content-lg">
                                        <div class="post-date-light">
                                            <ul>
                                                <li>
                                                    <span>by</span>
                                                    <a href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                    {{ $firstPost->created_at->format('F d, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <h2 class="title-medium-light size-lg">
                                            <a href="{{ url('post/' . $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-xl-8 col-lg-5 col-md-6 col-sm-12">
                            <div class="row keep-items-4-md">
                                @foreach($otherPosts as $post)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-6">
                                        <div class="mb-25 position-relative">
                                            <a class="img-opacity-hover" href="{{ url('post/' . $post->slug) }}">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                    class="img-fluid width-100 mb-15">
                                            </a>
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
                                            </div>
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        {{ $post->created_at->format('F d, Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md">
                                                <a href="{{ url('post/' . $post->slug) }}">{{ $post->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- Latest News Area End Here -->
<!-- More News Area Start Here -->
<section class="bg-accent section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="ne-isotope">
                    <div class="topic-border color-scampi mb-30">
                        <div class="topic-box-lg color-scampi">More News</div>
                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($moreCategories as $category)
                                <a href="#" data-filter=".{{ $category->slug }}"
                                    class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="more-info-link">
                            <a href="#">More
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="featuredContainer">
                        @foreach($moreCategories as $category)
                            <div class="row {{ $category->slug }}">
                                @foreach($category->posts as $post)
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                        <div class="media media-none--lg mb-30">
                                            <div class="position-relative width-40">
                                                <a href="{{ route('post.show', $post->slug) }}" class="img-opacity-hover">
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                        class="img-fluid">
                                                </a>
                                                <div class="topic-box-top-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20">{{ $category->name }}</div>
                                                </div>
                                            </div>
                                            <div class="media-body p-mb-none-child media-margin30">
                                                <div class="post-date-dark">
                                                    <ul>
                                                        <li>
                                                            <span>by</span>
                                                            <a href="{{ route('reporter.posts', $post->user->id) }}">{{ $post->user->name ?? 'Admin' }}</a>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                            {{ $post->created_at->format('M d, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="title-semibold-dark size-lg mb-15">
                                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h3>
                                                <p>{{ Str::limit(strip_tags($post->content), 120, '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="{{ asset('website') }}/img/banner/banner6.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Newsletter</div>
                    </div>
                    <div class="newsletter-area bg-primary">
                        <h2 class="title-medium-light size-xl">
                            Subscribe to our mailing list to get the new updates!
                        </h2>
                        <img src="{{ asset('website/img/banner/newsletter.png') }}" alt="newsletter"
                            class="img-fluid mb-40">
                        <p>Subscribe to our newsletter to stay updated every moment</p>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('add-subscriber') }}" method="POST" class="input-group stylish-input-group">
                            @csrf
                            <input type="email" name="email" placeholder="Enter your email" class="form-control"
                                required>
                            <span class="input-group-addon">
                                <button type="submit"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </span>
                        </form>

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- More News Area End Here -->
<!-- Category Area Start Here -->
<section class="bg-body section-space-less2">
    <div class="container">
        <div class="row tab-space1">
            @foreach($categoryBoxes as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-scale-animate text-center mb-2">

                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="img-fluid width-100">

                        <div class="content p-30-r">

                            <div class="ctg-title-xs">
                                {{ $post->categories()->first()->name ?? 'News' }}
                            </div>

                            <h3 class="title-regular-light size-lg">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <div class="post-date-light">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                        {{ $post->created_at->format('F d, Y') }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('front.footer')