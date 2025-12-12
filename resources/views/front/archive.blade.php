@include('front.header')
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">

            {{-- Dynamic Heading --}}
            <h1>
                @if($year && $month)
                    {{ date("F", mktime(0, 0, 0, $month, 1)) }} {{ $year }} Archives
                @elseif($year)
                    {{ $year }} Archives
                @else
                    Archives
                @endif
            </h1>

            {{-- Dynamic Breadcrumb --}}
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a> -
                </li>

                @if($year && $month)
                    <li>
                        <a href="{{ route('archive') }}">Archives</a> -
                    </li>
                    <li>
                        {{ date("F", mktime(0, 0, 0, $month, 1)) }} {{ $year }}
                    </li>

                @elseif($year)
                    <li>
                        <a href="{{ route('archive') }}">Archives</a> -
                    </li>
                    <li>{{ $year }}</li>

                @else
                    <li>Archives</li>
                @endif
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Archive Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form id="archive-search" action="{{ route('archive') }}" method="GET"
                    class="archive-search-box bg-accent item-shadow-1">
                    <div class="row tab-space5">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <div class="ne-custom-select">
                                    <select id="ne-year" name="year">
                                        <option value="">Select Year</option>
                                        @foreach($years as $y)
                                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <div class="ne-custom-select">
                                    <select id="ne-month" name="month">
                                        <option value="">Select Month</option>
                                        @foreach(range(1, 12) as $m)
                                            <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <div class="ne-custom-select">
                                    <select id="ne-categories" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $selectedcategory == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-right">
                            <button type="submit" class="btn-ftg-ptp-40 disabled mb-5">Search</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="media media-none--lg mb-30">
                                <div class="position-relative width-40">
                                    <a href="{{ route('post.show', $post->slug) }}"
                                        class="img-opacity-hover img-overlay-70">

                                        @if($post->video)
                                            <img class="img-fluid video-thumb" data-videoid="{{$post->video}}"
                                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                                        @else
                                            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('website/img/news/news140.jpg') }}"
                                                class="img-fluid">
                                        @endif
                                    </a>
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
                                    </div>
                                </div>
                                <div class="media-body p-mb-none-child media-margin30">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li><span>by</span> {{ $post->user->name ?? 'Admin' }}</li>
                                            <li><i class="fa fa-calendar"></i>{{ $post->created_at->format('F d, Y') }}</li>
                                        </ul>
                                    </div>
                                    <h3 class="title-semibold-dark size-lg mb-15">
                                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No posts found.</p>
                    @endforelse

                </div>
                @php
                    $start = max($posts->currentPage() - 2, 1);
                    $end = min($posts->currentPage() + 2, $posts->lastPage());
                @endphp

                <div class="row mt-20-r mb-30">
                    <div class="col-sm-8 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                            <ul>
                                {{-- Previous --}}
                                @if ($posts->onFirstPage() == false)
                                    <li>
                                        <a href="{{ $posts->previousPageUrl() }}">&laquo;</a>
                                    </li>
                                @endif

                                {{-- First page + ellipsis --}}
                                @if ($start > 1)
                                    <li><a href="{{ $posts->url(1) }}">1</a></li>
                                    @if ($start > 2)
                                        <li><span>...</span></li>
                                    @endif
                                @endif

                                {{-- Pages around current page --}}
                                @for ($i = $start; $i <= $end; $i++)
                                    <li class="{{ $posts->currentPage() == $i ? 'active' : '' }}">
                                        <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Last page + ellipsis --}}
                                @if ($end < $posts->lastPage())
                                    @if ($end < $posts->lastPage() - 1)
                                        <li><span>...</span></li>
                                    @endif
                                    <li><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
                                @endif

                                {{-- Next --}}
                                @if ($posts->hasMorePages())
                                    <li>
                                        <a href="{{ $posts->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="pagination-result text-right pt-10 text-center--xs">
                            <p class="mb-none">
                                Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Archives</div>
                    </div>
                    <ul class="archive-list">
                        @foreach ($archiveList as $arc)
                            <li>
                                <a href="{{ route('archive', ['year' => $arc->year, 'month' => $arc->month]) }}">
                                    {{ date("F", mktime(0, 0, 0, $arc->month, 1)) }} {{ $arc->year }}
                                    ({{ $arc->total }})
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#">
                            <img src="{{ asset('website') }}/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Newsletter</div>
                    </div>
                    <div class="newsletter-area bg-primary">
                        <h2 class="title-medium-light size-xl pl-30 pr-30">
                            Subscribe to our mailing list to get the new updates!
                        </h2>
                        <img src="{{ asset('website/img/banner/newsletter.png') }}" alt="newsletter"
                            class="img-fluid m-auto mb-15">
                        <p>Subscribe our newsletter to stay updated</p>

                        @if(session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('add-subscriber') }}" method="POST"
                            class="input-group stylish-input-group">
                            @csrf
                            <input type="email" name="email" placeholder="Enter your mail" class="form-control"
                                required>
                            <span class="input-group-addon">
                                <button type="submit"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </span>
                        </form>

                        @error('email')
                            <span class="text-danger d-block text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Archive Page Area End Here -->


@include('front.footer')