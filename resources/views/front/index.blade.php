@include('front.header')

<style>
    .add-top-margin {
        margin-top: 160px !important;

    }

    .breaking-section {
        background: #b40000;
        border-bottom: 3px solid #8a0000;
    }

    .breaking-horizontal {
        display: flex;
        align-items: center;
        height: 50px;
        overflow: hidden;
    }

    .breaking-label {
        background: #ffeb3b;
        color: #000;
        font-weight: 800;
        padding: 8px 16px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
        border-right: 2px solid #8a0000;
        white-space: nowrap;
    }

    .breaking-label i {
        font-size: 18px;
    }

    .breaking-track {
        flex: 1;
        /* नया: पूरा space लेगा */
        height: 50px;
        line-height: 50px;
        /* height के बराबर */
        overflow: hidden;
        position: relative;
        padding-left: 20px;
        /* थोड़ा space */
    }

    .breaking-list {
        list-style: none;
        margin: 0;
        padding: 0;
        color: #fff !important;
        font-weight: 600;
    }

    .breaking-list li {
        position: absolute;
        top: 0;
        left: 20px;
        right: 20px;
        /* नया: left-right से space */
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
        /* smooth fade */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /* long text के अंत में ... */
        color: #fff !important;
        font-weight: 600;
    }

    .breaking-list li.active {
        opacity: 1;
        color: #fff !important;
    }

    .breaking-list li a {
        color: #fff !important;
        text-decoration: none;
    }

    .breaking-list li a:hover {
        text-decoration: underline;
    }
</style>

@php

    $breakingNewsPosts = App\Post::where('status', 'published')
        ->where('breaking_news', 'yes')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
@endphp
<section class="bg-accent border-bottom add-top-margin  ">

</section>
<section class="breaking-section">
    <div class="container">
        <div class="breaking-horizontal">
            <div class="breaking-label">
                <i class="fa-solid fa-bolt"></i> Breaking News
            </div>
            <div class="breaking-track">
                <ul class="breaking-list">
                    @forelse($breakingNewsPosts as $post)
                        <li>
                            <a href="{{ route('post.show', $post->slug) }}">
                                {{ $post->title }} <!-- Str::limit हटाया, ellipsis CSS से handle होगा -->
                            </a>
                        </li>
                    @empty
                        <li>No breaking news available</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- News Slider Area Start Here -->
<section class="bg-accent " style="padding:20px 0px;">
    <div class="container">
        <div class="row tab-space1 gap-2">
            {{-- BIG MAIN NEWS --}}
            <div class="col-lg-6 col-md-12 banner-img p-0">
                @php $main = $recentNews->first(); @endphp
                @if($main)
                    <div class="img-overlay-70 img-scale-animate mb-2 img-ban">
                        @if($main->video)
                            <img class="img-fluid width-100 video-thumb" data-videoid="{{$main->video}}"
                                alt="{{ $main->title }}" src="https://img.youtube.com/vi/{{$main->video}}/0.jpg" />
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
                        <div class="col-sm-6 col-12 @if($loop->first) col-12 @endif" style="padding-bottom:5px; ">
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
                                        class="img-fluid width-100" style="height:150px;">
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
            <div class="col-lg-9 col-md-12">
                <div class="mb-20-r ne-isotope">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg " style="color:#b40000;">{{ $rajyaCategory->name }} <i
                                class="fa-regular fa-hand-pointer fa-rotate-90"></i></div>
                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($rajyaCategory->subcategories as $key => $subcategory)
                                <a href="#" data-filter=".subcat-{{ $subcategory->id }}"
                                    class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="more-info-link">
                            <a href="{{ route('category.posts', $rajyaCategory->slug) }}">और पढ़ें
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="featuredContainer">
                        @foreach($rajyaCategory->subcategories as $subcategory)
                            <div class="row subcat-{{ $subcategory->id }}">
                                <div class="col-md-4 col-sm-12">
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
                                                        <!--<li>-->
                                                        <!--    <span>by</span>-->
                                                        <!--    <a-->
                                                        <!--        href="{{ route('reporter.posts', $mainPost->user->id) }}">{{ $mainPost->user->name ?? 'Admin' }}</a>-->
                                                        <!--</li>-->
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

                                <div class="col-md-8 col-sm-12 subcat-separator">
                                    @foreach($subcategory->posts->skip(1) as $post)
                                        <div class="media ">
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
                                            <div class="media-body" style="margin-left:15px;">
                                                <div class="post-date-dark">
                                                    <ul>
                                                        <li>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            {{ $post->created_at->format('F d, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="title-medium-dark size-md mb-none" style="">
                                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h3>
                                                <p class="m-0" style="color: #585656;font-weight:500;
                                                                        font-size: 15px;
                                                                        line-height: 22px;">
                                                    {!! Str::words(strip_tags($post->content), 30, '<span class="text-muted">...</span>') !!}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="subcategory-divider"></div>

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
                            <div class="topic-border color-cinnabar mb-30 width-100">
                                <div class="topic-box-lg " style="color:#b40000;">{{ $videshCategory->name }} <i
                                        class="fa-regular fa-hand-pointer fa-rotate-90"></i></div>
                                <!--<div class="topic-box-lg color-apple">{{ $videshCategory->name }} jj</div>-->
                            </div>
                        </div>
                        @foreach($videshCategory->posts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6" style="padding-bottom:10px;">
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
                                            src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" style="height:200px;" />
                                    @else
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                            class="img-fluid width-100" style="height:200px;">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-3 col-md-12">

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
                    <div class="topic-border color-cinnabar mb-5">
                        <div class="topic-box-lg " style="color:#b40000;">Recent News <i
                                class="fa-regular fa-hand-pointer fa-rotate-90"></i></div>

                    </div>
                    <div class="row">
                        @foreach($recentNews->take(2) as $news)
                            <div class="col-12  p-2">
                                <div class=" new-card-news1">
                                    <a href="{{ route('post.show', $news->slug) }}" class="img-opacity-hover">
                                        @if($news->video)
                                            <img class="img-fluid mb-10 width-100 video-thumb" data-videoid="{{$news->video}}"
                                                src="https://img.youtube.com/vi/{{$news->video}}/0.jpg" style="height:130px;" />
                                        @else
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                                class="img-fluid mb-10 width-100" style="height:130px;">
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
            <div class="col-lg-9 col-md-12">

                <!--               <div class="mb-20-r ne-isotope">-->
                <!--    <div class="topic-border color-cinnabar mb-30">-->
                <!--        <div class="topic-box-lg" style="color:#b40000;"></div>-->
                <!--        <div class="isotope-classes-tab isotop-btn">-->
                <!--            @if($khelCategory)-->
                <!--                <a href="#" data-filter=".khel-subcats" class="active">-->
                <!--                    {{ $khelCategory->name }}-->
                <!--                </a>-->
                <!--            @endif-->
                <!--            @if($rajneetiCategory)-->
                <!--                <a href="#" data-filter=".rajneeti-subcats" class="">-->
                <!--                    {{ $rajneetiCategory->name }}-->
                <!--                </a>-->
                <!--            @endif-->
                <!--            @if($crimeCategory)-->
                <!--                <a a href="#" data-filter=".crime-subcats" class="">-->
                <!--                    {{ $crimeCategory->name }}-->
                <!--                </a>-->
                <!--            @endif-->
                <!--        </div>-->
                <!--        <div class="more-info-link">-->
                <!--            <a href="post-style-1.html">और पढ़ें-->
                <!--                <i class="fa fa-angle-right" aria-hidden="true"></i>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--    <div class="featuredContainer">-->

                <!-- खेल -->
                <!--        @if($khelCategory)-->
                <!--            @foreach($khelCategory->subcategories as $subcategory)-->
                <!--                <div class="row khel-subcats">  <!-- सिंपल क्लास -->-->
                <!--                    <div class="col-md-4 col-sm-12">-->
                <!--                        @php $mainPost = $subcategory->posts->first(); @endphp-->
                <!--                        @if($mainPost)-->
                <!--                            <div class="img-overlay-70 img-scale-animate mb-30">-->
                <!--                                <a href="{{ route('post.show', $mainPost->slug) }}">-->
                <!--                                    @if($mainPost->video)-->
                <!--                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{ $mainPost->video }}"-->
                <!--                                            src="https://img.youtube.com/vi/{{ $mainPost->video }}/0.jpg" />-->
                <!--                                    @else-->
                <!--                                        <img src="{{ asset('storage/' . $mainPost->image) }}"-->
                <!--                                            alt="{{ $mainPost->title }}" class="img-fluid width-100">-->
                <!--                                    @endif-->
                <!--                                </a>-->
                <!--                                <div class="mask-content-lg">-->
                <!--                                    <div class="topic-box-sm color-cinnabar mb-20">{{ $subcategory->name }}</div>-->
                <!--                                    <div class="post-date-light">-->
                <!--                                        <ul>-->
                <!--                                            <li><span>by</span> <a href="{{ route('reporter.posts', $mainPost->user->id) }}">{{ $mainPost->user->name ?? 'Admin' }}</a></li>-->
                <!--                                            <li><span><i class="fa fa-calendar"></i></span> {{ $mainPost->created_at->format('F d, Y') }}</li>-->
                <!--                                        </ul>-->
                <!--                                    </div>-->
                <!--                                    <h2 class="title-medium-light size-lg">-->
                <!--                                        <a href="{{ route('post.show', $mainPost->slug) }}">{{ $mainPost->title }}</a>-->
                <!--                                    </h2>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        @endif-->
                <!--                    </div>-->
                <!--                    <div class="col-md-8 col-sm-12 subcat-separator">-->
                <!--                        @foreach($subcategory->posts->skip(1) as $post)-->
                <!--                            <div class="media">-->
                <!--                                <a class="width38-lg width40-md img-opacity-hover" href="{{ route('post.show', $post->slug) }}">-->
                <!--                                    @if($post->video)-->
                <!--                                        <img class="img-fluid video-thumb" style="width: 132px; height: 95px;"-->
                <!--                                            data-videoid="{{ $post->video }}"-->
                <!--                                            src="https://img.youtube.com/vi/{{ $post->video }}/0.jpg" />-->
                <!--                                    @else-->
                <!--                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"-->
                <!--                                            class="img-fluid" style="width: 132px; height: 95px;">-->
                <!--                                    @endif-->
                <!--                                </a>-->
                <!--                                <div class="media-body">-->
                <!--                                    <div class="post-date-dark">-->
                <!--                                        <ul>-->
                <!--                                            <li><span><i class="fa fa-calendar"></i></span> {{ $post->created_at->format('F d, Y') }}</li>-->
                <!--                                        </ul>-->
                <!--                                    </div>-->
                <!--                                    <h3 class="title-medium-dark size-md mb-none">-->
                <!--                                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>-->
                <!--                                    </h3>-->
                <!--                                    <p class="m-0" style="color: #666; font-size: 14px; line-height: 22px;">-->
                <!--                                        {!! Str::words(strip_tags($post->content), 30, '<span class="text-muted">...</span>') !!}-->
                <!--                                    </p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            @if(!$loop->last)-->
                <!--                                <div class="subcategory-divider"></div>-->
                <!--                            @endif-->
                <!--                        @endforeach-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            @endforeach-->
                <!--        @endif-->

                <!-- राजनीति -->
                <!--        @if($rajneetiCategory)-->
                <!--            @foreach($rajneetiCategory->subcategories as $subcategory)-->
                <!--                <div class="row rajneeti-subcats">-->
                <!-- वही कोड, सिर्फ color-pomegranate रहेगा -->
                <!--                    <div class="col-md-4 col-sm-12">-->
                <!--                        @php $mainPost = $subcategory->posts->first(); @endphp-->
                <!--                        @if($mainPost)-->
                <!--                            <div class="img-overlay-70 img-scale-animate mb-30">-->
                <!--                                <a href="{{ route('post.show', $mainPost->slug) }}">-->
                <!--                                    @if($mainPost->video)-->
                <!--                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{ $mainPost->video }}"-->
                <!--                                            src="https://img.youtube.com/vi/{{ $mainPost->video }}/0.jpg" />-->
                <!--                                    @else-->
                <!--                                        <img src="{{ asset('storage/' . $mainPost->image) }}"-->
                <!--                                            alt="{{ $mainPost->title }}" class="img-fluid width-100">-->
                <!--                                    @endif-->
                <!--                                </a>-->
                <!--                                <div class="mask-content-lg">-->
                <!--                                    <div class="topic-box-sm color-pomegranate mb-20">{{ $subcategory->name }}</div>-->
                <!--                                    <div class="post-date-light">-->
                <!--                                        <ul>-->
                <!--                                            <li><span>by</span> <a href="{{ route('reporter.posts', $mainPost->user->id) }}">{{ $mainPost->user->name ?? 'Admin' }}</a></li>-->
                <!--                                            <li><span><i class="fa fa-calendar"></i></span> {{ $mainPost->created_at->format('F d, Y') }}</li>-->
                <!--                                        </ul>-->
                <!--                                    </div>-->
                <!--                                    <h2 class="title-medium-light size-lg">-->
                <!--                                        <a href="{{ route('post.show', $mainPost->slug) }}">{{ $mainPost->title }}</a>-->
                <!--                                    </h2>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        @endif-->
                <!--                    </div>-->
                <!--                    <div class="col-md-8 col-sm-12 subcat-separator">-->
                <!-- बाकी लिस्ट वाला कोड वही -->
                <!--                        @foreach($subcategory->posts->skip(1) as $post)-->
                <!-- ... same as above ... -->
                <!--                        @endforeach-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            @endforeach-->
                <!--        @endif-->

                <!-- क्राइम -->
                <!--        @if($crimeCategory)-->
                <!--            @foreach($crimeCategory->subcategories as $subcategory)-->
                <!--                <div class="row crime-subcats">-->
                <!-- वही कोड, color-web-orange रहेगा -->
                <!-- ... same structure ... -->
                <!--                </div>-->
                <!--            @endforeach-->
                <!--        @endif-->

                <!--    </div>-->
                <!--</div>-->

                <!-- Isotope JS -->
                <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
                <script>
                    jQuery(document).ready(function ($) {
                        var $grid = $('.featuredContainer').isotope({
                            itemSelector: '.row',
                            layoutMode: 'fitRows'
                        });

                        // पेज लोड पर active टैब का फ़िल्टर अप्लाई करो
                        var activeFilter = $('.isotop-btn a.active').data('filter') || '*';
                        $grid.isotope({ filter: activeFilter });

                        // क्लिक पर
                        $('.isotop-btn a').on('click', function (e) {
                            e.preventDefault();
                            $('.isotop-btn a').removeClass('active');
                            $(this).addClass('active');
                            var filterValue = $(this).attr('data-filter');
                            $grid.isotope({ filter: filterValue });
                        });
                    });
                </script>

                <div class="row tab-space2">

                    @if($khelCategory)
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-cinnabar mb-30 width-100">
                                <div class="topic-box-lg " style="color:#b40000;">{{ $khelCategory->name }}</div>

                            </div>

                            @php
                                $firstPost = $khelCategory->posts->first();
                            @endphp

                            @if($firstPost)
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <div class="mask-content-sm">
                                        <!--<div class="post-date-light">-->
                                        <!--    <ul>-->

                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $firstPost->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-light">
                                            <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                        </h3>

                                    </div>
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100" style="height:150px;">
                                    @endif
                                </div>
                            @endif

                            @foreach($khelCategory->posts->slice(1) as $post)
                                <div class="media  new-card-news">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}"
                                        style="width:100%">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <!--<div class="post-date-dark">-->
                                        <!--    <ul>-->
                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $post->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-dark size-md mb-none">
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="m-0" style="color: #666;
                                                                font-size: 14px;
                                                                line-height: 22px;">
                                            {!! Str::words(strip_tags($post->content), 20, '<span class="text-muted">...</span>') !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif


                    @if($rajneetiCategory)
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-cinnabar mb-30 width-100">
                                <div class="topic-box-lg " style="color:#b40000;">{{ $rajneetiCategory->name }}</div>

                            </div>


                            @php
                                $firstPost = $rajneetiCategory->posts->first();
                            @endphp

                            @if($firstPost)
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <div class="mask-content-sm">
                                        <!--<div class="post-date-light">-->
                                        <!--    <ul>-->

                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $firstPost->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-light">
                                            <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                        </h3>

                                    </div>
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" style="height:150px;" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100" style="height:150px;">
                                    @endif
                                </div>
                            @endif

                            @foreach($rajneetiCategory->posts->slice(1) as $post)
                                <div class="media  new-card-news">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}"
                                        style="width:100%">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <!--<div class="post-date-dark">-->
                                        <!--    <ul>-->
                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $post->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-dark size-md mb-none">
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="m-0" style="color: #666;
                                                                font-size: 14px;
                                                                line-height: 22px;">
                                            {!! Str::words(strip_tags($post->content), 20, '<span class="text-muted">...</span>') !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($crimeCategory)
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-cinnabar mb-30 width-100">
                                <div class="topic-box-lg " style="color:#b40000;">{{ $crimeCategory->name }}</div>

                            </div>


                            @php
                                $firstPost = $crimeCategory->posts->first();
                            @endphp

                            @if($firstPost)
                                <div class="img-overlay-70 img-scale-animate mb-30">
                                    <div class="mask-content-sm">
                                        <!--<div class="post-date-light">-->
                                        <!--    <ul>-->

                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $firstPost->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-light">
                                            <a href="{{ route('post.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                        </h3>
                                    </div>
                                    @if($firstPost->video)
                                        <img class="img-fluid width-100 video-thumb" data-videoid="{{$firstPost->video}}"
                                            src="https://img.youtube.com/vi/{{$firstPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ asset('storage/' . $firstPost->image) }}" alt="{{ $firstPost->title }}"
                                            class="img-fluid width-100" style="height:150px;">
                                    @endif
                                </div>
                            @endif

                            @foreach($crimeCategory->posts->slice(1) as $post)
                                <div class="media  new-card-news">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}"
                                        style="width:100%">
                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;" />
                                        @else
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid"
                                                style="height: 150px; object-fit: cover; transition: transform 0.3s ease;width:100%;">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <!--<div class="post-date-dark">-->
                                        <!--    <ul>-->
                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $post->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                        <h3 class="title-medium-dark size-md mb-none">
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="m-0" style="color: #666;
                                                                font-size: 14px;
                                                                line-height: 22px;">
                                            {!! Str::words(strip_tags($post->content), 20, '<span class="text-muted">...</span>') !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-3 col-md-12">
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
                    <div class="topic-border color-cinnabar mb-30 mt-50">
                        <div class="topic-box-lg " style="color:#b40000;">अन्य खबरें <i
                                class="fa-regular fa-hand-pointer fa-rotate-90"></i></div>
                        <!--<div class="topic-box-lg color-azure-radiance">Categories</div>-->
                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($otherCategories as $slug => $category)
                                <a href="#" data-filter=".{{ $slug }}"
                                    data-url="{{ route('category.posts', $category->slug) }}"
                                    class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>

                        <div class="more-info-link">
                            <a id="readMoreLink" href="{{ route('category.posts', $otherCategories->first()->slug) }}">
                                और पढ़ें
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
                                        <!--<div class="post-date-light">-->
                                        <!--    <ul>-->
                                        <!--        <li>-->
                                        <!--            <span>by</span>-->
                                        <!--            <a-->
                                        <!--                href="{{ route('reporter.posts', $firstPost->user->id) }}">{{ $firstPost->user->name ?? 'Admin' }}</a>-->
                                        <!--        </li>-->
                                        <!--        <li>-->
                                        <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                        <!--            {{ $firstPost->created_at->format('F d, Y') }}-->
                                        <!--        </li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
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
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-6 p-2">
                                        <div class="mb-25 new-card-news">
                                            <a class="img-opacity-hover" href="{{ url('post/' . $post->slug) }}">
                                                @if($post->video)
                                                    <img class="img-fluid width-100 mb-15 video-thumb"
                                                        data-videoid="{{$post->video}}"
                                                        src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                                @else
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                        class="img-fluid width-100 mb-15">
                                                @endif
                                            </a>
                                            <!--<div class="topic-box-top-xs">-->
                                            <!--    <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>-->
                                            <!--</div>-->
                                            <!--<div class="post-date-dark">-->
                                            <!--    <ul>-->
                                            <!--        <li>-->
                                            <!--            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>-->
                                            <!--            {{ $post->created_at->format('F d, Y') }}-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</div>-->
                                            <h3 class="title-medium-dark size-md m-0">
                                                <a href="{{ url('post/' . $post->slug) }}">{{ $post->title }}</a>
                                            </h3>
                                            <p class="m-0" style="color: #666;
                                                                    font-size: 14px;
                                                                    line-height: 22px;">
                                                {!! Str::words(strip_tags($post->content), 20, '<span class="text-muted">...</span>') !!}
                                            </p>

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
            <div class="col-lg-9 col-md-12">
                <div class="ne-isotope">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg " style="color:#b40000;">मुख्य खबरे <i
                                class="fa-regular fa-hand-pointer fa-rotate-90"></i></div>

                        <div class="isotope-classes-tab isotop-btn">
                            @foreach($moreCategories as $category)
                                <a href="#" data-filter=".{{ $category->slug }}"
                                    data-url="{{ route('category.posts', $category->slug) }}"
                                    class="{{ $loop->first ? 'current' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>

                        <div class="more-info-link">
                            <a id="moreReadLink" href="{{ route('category.posts', $moreCategories->first()->slug) }}">
                                और पढ़ें
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
                                                            src="https://img.youtube.com/vi/{{$post->video}}/0.jpg"
                                                            style="height:200px;width:100%;" />
                                                    @else
                                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                            class="img-fluid" style="height:200px;width:100%;">
                                                    @endif
                                                </a>
                                                <div class="topic-box-top-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20">{{ $category->name }}</div>
                                                </div>
                                            </div>
                                            <div class="media-body p-mb-none-child media-margin30">
                                                <div class="post-date-dark">
                                                    <ul>
                                                        <!--<li>-->
                                                        <!--    <span>by</span>-->
                                                        <!--    <a-->
                                                        <!--        href="{{ route('reporter.posts', $post->user->id) }}">{{ $post->user->name ?? 'Admin' }}</a>-->
                                                        <!--</li>-->
                                                        <li>
                                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                            {{ $post->created_at->format('M d, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="title-semibold-dark size-lg " style="font-size: 16px;
                                                                    line-height: 26px;
                                                                    font-weight: 700;
                                                                    padding: 3px 0 5px;">
                                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h3>
                                                <p style="color: #666;
                                                                    font-size: 14px;
                                                                    line-height: 22px;">
                                                    {{ Str::limit(strip_tags($post->content), 350, '...') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="subcategory-divider"></div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <section class="jt-news-block">

                    <div class="topic-border color-cinnabar mb-30 mt-50">
                        <div class="topic-box-lg" style="color:#b40000;">
                            {{ $technologyCategory->name }}
                            <i class="fa-regular fa-hand-pointer fa-rotate-90"></i>
                        </div>
                    </div>

                    @php
                        $mainPost = $technologyCategory->posts->first();
                        $sidePosts = $technologyCategory->posts->slice(1, 4);
                    @endphp

                    <div class="jt-news-grid">

                        {{-- BIG LEFT CARD --}}
                        @if($mainPost)
                            <div class="jt-news-main">
                                <img src="{{ asset('storage/' . $mainPost->image) }}" alt="{{ $mainPost->title }}">

                                <h3 class="title-medium-dark size-md m-0 p-3">
                                    <a href="{{ route('post.show', $mainPost->slug) }}">
                                        {{ $mainPost->title }}
                                    </a>
                                </h3>
                            </div>
                        @endif

                        {{-- RIGHT SIDE SMALL LIST --}}
                        <div class="jt-news-list">

                            @foreach($sidePosts as $post)
                                <div class="jt-news-item">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">

                                    <p>
                                        <a href="{{ route('post.show', $post->slug) }}" style="color:#444">
                                            {{ $post->title }}
                                        </a>
                                    </p>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </section>


            </div>

            <div class="ne-sidebar sidebar-break-md col-lg-3 col-md-12">
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
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg " style="color:#b40000;">Newsletter <i
                                class="fa-regular fa-hand-pointer fa-rotate-90"></i></div </div>
                        <div class="newsletter-area bg-primary">
                            <h2 class="title-medium-light size-xl" style="    font-size: 20px;
    line-height: 30px;
    font-weight: 600;
    color: #ffeb3b;">
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
                            <img class="img-fluid width-100 video-thumb" alt="{{ $post->title }}"
                                data-videoid="{{$post->video}}" src="https://img.youtube.com/vi/{{$post->video}}/0.jpg"
                                style="height: 200px;" />
                        @else
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="img-fluid width-100" style="height: 200px;">
                        @endif
                        <div class="content p-3">

                            <!--<div class="ctg-title-xs">-->
                            <!--    {{ $post->categories()->first()->name ?? 'News' }}-->
                            <!--</div>-->

                            <h3 class="title-regular-light size-lg">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <!--<div class="post-date-light">-->
                            <!--    <ul>-->
                            <!--        <li>-->
                            <!--            <span>-->
                            <!--                <i class="fa fa-calendar" aria-hidden="true"></i>-->
                            <!--            </span>-->
                            <!--            {{ $post->created_at->format('F d, Y') }}-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</div>-->

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

<!--<script>-->
<!--document.addEventListener("DOMContentLoaded", function () {-->
<!--    const items = document.querySelectorAll(".breaking-list li");-->
<!--    let current = 0;-->

<!--    if (items.length) {-->
<!--        items[current].classList.add("active");-->

<!--        setInterval(() => {-->
<!--            items[current].classList.remove("active");-->
<!--            current = (current + 1) % items.length;-->
<!--            items[current].classList.add("active");-->
<!--        }, 3000);-->
<!--    }-->
<!--});-->
<!--</script>-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const items = document.querySelectorAll(".breaking-list li");
        if (items.length === 0) return;

        let current = 0;
        items[current].classList.add("active");

        setInterval(() => {
            items[current].classList.remove("active");
            current = (current + 1) % items.length;
            items[current].classList.add("active");
        }, 4000);  // हर 4 सेकंड में change (आप change कर सकते हो)
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll(".isotope-classes-tab").forEach(section => {

            const tabs = section.querySelectorAll("a[data-url]");
            const readMoreLink = section.parentElement.querySelector(".more-info-link a");

            if (!readMoreLink) return;

            tabs.forEach(tab => {
                tab.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Active class toggle
                    tabs.forEach(t => t.classList.remove("current"));
                    this.classList.add("current");

                    // Update "और पढ़ें"
                    const url = this.dataset.url;
                    if (url) {
                        readMoreLink.href = url;
                    }
                });
            });

        });

    });
</script>

@include('front.footer')