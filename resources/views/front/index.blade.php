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
                        @if($main->video)
                            <img class="img-fluid width-100 video-thumb" data-videoid="{{$main->video}}" alt="{{ $main->title }}"
                                src="https://img.youtube.com/vi/{{$main->video}}/0.jpg" />
                        @else
                            <img src="{{ asset('storage/' . $main->image) }}" alt="{{ $main->title }}"
                                class="img-fluid width-100">
                        @endif
                        <div class="mask-content-lg">
                            <div class="topic-box-sm color-cinnabar mb-20">
                                {{ $main->category->name ?? 'News' }}
                            </div>

                            <div class="post-date-light">
                                <ul>
                                    <li>
                                        <span>by</span>
                                        <a
                                            href="{{ route('reporter.posts', $main->user->id) }}">{{ $main->user->name ?? 'Admin' }}</a>
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

                                @if($news->video)
                                    <img class="img-fluid width-100 video-thumb" data-videoid="{{$news->video}}"
                                        src="https://img.youtube.com/vi/{{$news->video}}/0.jpg" />
                                @else
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="img-fluid width-100" style="height:100%;">
                                @endif
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
                                                @if($mainPost->video)
                                                    <img class="img-fluid width-100 video-thumb" data-videoid="{{$mainPost->video}}"
                                                        src="https://img.youtube.com/vi/{{$mainPost->video}}/0.jpg" />
                                                @else
                                                    <img src="{{ asset('storage/' . $mainPost->image) }}"
                                                        alt="{{ $mainPost->title }}" class="img-fluid width-100">
                                                @endif
                                            </a>
                                            <div class="mask-content-lg">
                                                <div class="topic-box-sm color-cinnabar mb-20">{{ $subcategory->name }}</div>
                                                <div class="post-date-light">
                                                    <ul>
                                                        <li>
                                                            <span>by</span>
                                                            <a
                                                                href="{{ route('reporter.posts', $mainPost->user->id) }}">{{ $mainPost->user->name ?? 'Admin' }}</a>
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
                                                @if($post->video)
                                                    <img class="img-fluid video-thumb" style="width: 132px; height: 95px;"
                                                        data-videoid="{{$post->video}}"
                                                        src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                                @else
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                        class="img-fluid" style="width: 132px; height: 95px;">
                                                @endif
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
                @php
                    $upperBanner = collect($ads)->firstWhere('position', 'upperbanner728x90');
                @endphp

                @if($upperBanner)
                    <div class="row">
                        <div class="col-12">
                            <div class="ne-banner-layout1 mb-20-r text-center">

                                {{-- If ad type is Google (AdSense code) --}}
                                @if($upperBanner['type'] === 'google' && !empty($upperBanner['code']))
                                    {!! $upperBanner['code'] !!}

                                    {{-- If ad has an uploaded image --}}
                                @elseif(!empty($upperBanner['image']))
                                    <a href="{{ $upperBanner['link'] ?? '#' }}" target="_blank">
                                        <img src="{{asset('storage/' . $upperBanner['image']) }}"
                                            alt="{{ $upperBanner['title'] }}" class="img-fluid">
                                    </a>

                                    {{-- Fallback dummy image --}}
                                @else
                                    <a href="#">
                                        <img src="{{ asset('website/img/banner/banner2.jpg') }}" class="img-fluid" />
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endif

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
                                    @if($post->video) 
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$post->video}}"
                                            src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                            class="img-fluid width-100">
                                    @endif
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
                @php
                    $uppersidebar300x600 = collect($ads)->firstWhere('position', 'uppersidebar300x600');
                    $uppersidebar300x250 = collect($ads)->firstWhere('position', 'uppersidebar300x250');
                @endphp

                @if($uppersidebar300x600)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($uppersidebar300x600['type'] === 'google' && !empty($uppersidebar300x600['code']))
                                {!! $uppersidebar300x600['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($uppersidebar300x600['image']))
                                <a href="{{ $uppersidebar300x600['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $uppersidebar300x600['image']) }}"
                                        alt="{{ $uppersidebar300x600['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="https://tejyug.com/public/front/images/bombay-high-court_1702451223.jpg" alt="ad"
                                        class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

                @if($uppersidebar300x250)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($uppersidebar300x250['type'] === 'google' && !empty($uppersidebar300x250['code']))
                                {!! $uppersidebar300x250['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($uppersidebar300x250['image']))
                                <a href="{{ $uppersidebar300x250['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $uppersidebar300x250['image']) }}"
                                        alt="{{ $uppersidebar300x250['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="{{ asset('website/img/banner/banner6.jpg') }}" alt="ad" class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

                <div class="sidebar-box">
                    <div class="topic-border color-scampi mb-5">
                        <div class="topic-box-lg color-scampi">Recent News</div>
                    </div>
                    <div class="row">
                        @foreach($recentNews as $news)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="mt-25">
                                    <a href="{{ route('post.show', $news->slug) }}" class="img-opacity-hover">
                                        @if($news->video)
                                            <img class="img-fluid mb-10 width-100 video-thumb" data-videoid="{{$news->video}}"
                                                src="https://img.youtube.com/vi/{{$news->video}}/0.jpg" />
                                        @else
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                                class="img-fluid mb-10 width-100">
                                        @endif
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

    </div>
</section>
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
                                    <img class="embed-responsive-item youtube-video video-thumb" data-videoid="{{$post->video}}"
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
        @php
            $middleBanner = collect($ads)->firstWhere('position', 'middlebanner728x90');
        @endphp

        @if($middleBanner)
            <div class="row">
                <div class="col-12">
                    <div class="ne-banner-layout1 mt-20-r text-center">

                        {{-- Google AdSense Code --}}
                        @if($middleBanner['type'] === 'google' && !empty($middleBanner['code']))
                            {!! $middleBanner['code'] !!}

                            {{-- Image Ad --}}
                        @elseif(!empty($middleBanner['image']))
                            <a href="{{ $middleBanner['link'] ?? '#' }}" target="_blank">
                                <img src="{{asset('storage/' . $middleBanner['image']) }}" alt="{{ $middleBanner['title'] }}"
                                    class="img-fluid">
                            </a>

                            {{-- Default fallback --}}
                        @else
                            <a href="#">
                                <img src="{{ asset('website/img/banner/banner2.jpg') }}" alt="ad" class="img-fluid">
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endif

    </div>
</section>
<!-- Latest News Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row tab-space2">

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
                                                    <a
                                                        href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
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
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100">
                                    @endif
                                </div>
                            @endif

                            @foreach($khelCategory->posts->slice(1) as $post)
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid">
                                        @endif
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
                                                    <a
                                                        href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
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
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100">
                                    @endif
                                </div>
                            @endif

                            @foreach($rajneetiCategory->posts->slice(1) as $post)
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid">
                                        @endif
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
                                                    <a
                                                        href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
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
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100">
                                    @endif
                                </div>
                            @endif

                            @foreach($crimeCategory->posts->slice(1) as $post)
                                <div class="media mb-30">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid">
                                        @endif
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
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                @php
                    $middleSidebar300x250 = collect($ads)->firstWhere('position', 'middlesidebar300x250');
                    $middlesidebar300x600 = collect($ads)->firstWhere('position', 'middlesidebar300x600');
                @endphp

                @if($middlesidebar300x600)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($middlesidebar300x600['type'] === 'google' && !empty($middlesidebar300x600['code']))
                                {!! $middlesidebar300x600['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($middlesidebar300x600['image']))
                                <a href="{{ $middlesidebar300x600['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $middlesidebar300x600['image']) }}"
                                        alt="{{ $middlesidebar300x600['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="https://tejyug.com/public/front/images/bombay-high-court_1702451223.jpg" alt="ad"
                                        class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

                @if($middleSidebar300x250)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($middleSidebar300x250['type'] === 'google' && !empty($middleSidebar300x250['code']))
                                {!! $middleSidebar300x250['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($middleSidebar300x250['image']))
                                <a href="{{ $middleSidebar300x250['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $middleSidebar300x250['image']) }}"
                                        alt="{{ $middleSidebar300x250['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="{{ asset('website/img/banner/banner6.jpg') }}" alt="ad" class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

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
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100">
                                    @endif
                                    <div class="topic-box-top-lg">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
                                    </div>
                                    <div class="mask-content-lg">
                                        <div class="post-date-light">
                                            <ul>
                                                <li>
                                                    <span>by</span>
                                                    <a
                                                        href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>
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
                                                @if($post->video)
                                                    <img class="img-fluid width-100 mb-15 video-thumb" data-videoid="{{$post->video}}"
                                                        src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                                @else
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                        class="img-fluid width-100 mb-15">
                                                @endif
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

        @php
            $lowerBanner = collect($ads)->firstWhere('position', 'lowerbanner728x90');
        @endphp

        @if($lowerBanner)
            <div class="row">
                <div class="col-12">
                    <div class="ne-banner-layout1 mb-50 mt-20-r text-center">

                        {{-- Google AdSense Code --}}
                        @if($lowerBanner['type'] === 'google' && !empty($lowerBanner['code']))
                            {!! $lowerBanner['code'] !!}

                            {{-- Image Ad --}}
                        @elseif(!empty($lowerBanner['image']))
                            <a href="{{ $lowerBanner['link'] ?? '#' }}" target="_blank">
                                <img src="{{asset('storage/' . $lowerBanner['image']) }}" alt="{{ $lowerBanner['title'] }}"
                                    class="img-fluid">
                            </a>

                            {{-- Default fallback --}}
                        @else
                            <a href="#">
                                <img src="{{ asset('website/img/banner/banner2.jpg') }}" alt="ad" class="img-fluid">
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endif

    </div>
</section>
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
                                                    @if($post->video)
                                                        <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                            src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                                    @else
                                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                            class="img-fluid">
                                                    @endif
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
                                                            <a
                                                                href="{{ route('reporter.posts', $post->user->id) }}">{{ $post->user->name ?? 'Admin' }}</a>
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
                @php
                    $lowerSidebar300x250 = collect($ads)->firstWhere('position', 'lowersidebar300x250');
                    $lowerSidebar300x600 = collect($ads)->firstWhere('position', 'lowersidebar300x600');
                @endphp

                @if($lowerSidebar300x600)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($lowerSidebar300x600['type'] === 'google' && !empty($lowerSidebar300x600['code']))
                                {!! $lowerSidebar300x600['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($lowerSidebar300x600['image']))
                                <a href="{{ $lowerSidebar300x600['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $lowerSidebar300x600['image']) }}"
                                        alt="{{ $lowerSidebar300x600['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="https://tejyug.com/public/front/images/bombay-high-court_1702451223.jpg" alt="ad"
                                        class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

                @if($lowerSidebar300x250)
                    <div class="sidebar-box">
                        <div class="ne-banner-layout1 text-center">

                            {{-- Google Ad Code --}}
                            @if($lowerSidebar300x250['type'] === 'google' && !empty($lowerSidebar300x250['code']))
                                {!! $lowerSidebar300x250['code'] !!}

                                {{-- Image Ad --}}
                            @elseif(!empty($lowerSidebar300x250['image']))
                                <a href="{{ $lowerSidebar300x250['link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('storage/' . $lowerSidebar300x250['image']) }}"
                                        alt="{{ $lowerSidebar300x250['title'] }}" class="img-fluid">
                                </a>

                                {{-- Default fallback --}}
                            @else
                                <a href="#">
                                    <img src="{{ asset('website/img/banner/banner6.jpg') }}" alt="ad" class="img-fluid">
                                </a>
                            @endif

                        </div>
                    </div>
                @endif

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

                        <form action="{{ route('add-subscriber') }}" method="POST"
                            class="input-group stylish-input-group">
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
<!-- Category Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row tab-space1">
            @foreach($categoryBoxes as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-scale-animate text-center mb-2">
                        @if($post->video)
                            <img class="img-fluid width-100 video-thumb" alt="{{ $post->title }}" data-videoid="{{$post->video}}"
                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" style="height: 200px;" />
                        @else
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="img-fluid width-100" style="height: 200px;">
                        @endif
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
        @php
            $lowestBanner = collect($ads)->firstWhere('position', 'lowestbanner728x90');
        @endphp
        @if($lowestBanner)
            <div class="row">
                <div class="col-12">
                    <div class="ne-banner-layout1 mt-20-r text-center">
                        {{-- Google AdSense Code --}}
                        @if($lowestBanner['type'] === 'google' && !empty($lowestBanner['code']))
                            {!! $lowestBanner['code'] !!}
                            {{-- Image Ad --}}
                        @elseif(!empty($lowestBanner['image']))
                            <a href="{{ $lowestBanner['link'] ?? '#' }}" target="_blank">
                                <img src="{{asset('storage/' . $lowestBanner['image']) }}" alt="{{ $lowestBanner['title'] }}"
                                    class="img-fluid">
                            </a>
                            {{-- Default fallback --}}
                        @else
                            <a href="#">
                                <img src="{{ asset('website/img/banner/banner2.jpg') }}" alt="ad" class="img-fluid">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@include('front.footer')