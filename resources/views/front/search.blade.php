@include('front.header')

<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area"
    style="background-image: url('{{ asset('website/img/banner/breadcrumbs-banner.jpg') }}');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Search Results</h1>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a> -
                </li>
                <li>Search: "{{ $query ?? $tagSlug}}"</li>
            </ul>
        </div>
    </div>
</section>

<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">

            <!-- Posts Section -->
            <div class="col-lg-8 col-md-12">
                <div class="row">

                    @forelse($posts as $post)
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="media media-none--lg mb-30">
                                <div class="position-relative width-40">
                                    <a href="{{ route('post.show', $post->slug) }}"
                                        class="img-opacity-hover img-overlay-70">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('front/images/default-news.png') }}"
                                            alt="{{ $post->title }}" class="img-fluid">
                                    </a>
                                </div>

                                <div class="media-body p-mb-none-child media-margin30">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>by</span>
                                                <a href="#">{{ $post->user->name ?? 'Admin' }}</a>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-calendar"></i></span>
                                                {{ $post->created_at->format('M d, Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <h3 class="title-semibold-dark size-lg mb-15">
                                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>

                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted mb-0">No results found for “{{ $query ?? $tagSlug }}”.</p>
                        </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                @php
                    $start = max($posts->currentPage() - 2, 1);
                    $end = min($posts->currentPage() + 2, $posts->lastPage());
                @endphp

                <div class="row mt-20-r mb-30">
                    <div class="col-sm-8 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                            <ul>
                                {{-- Previous --}}
                                @if (!$posts->onFirstPage())
                                    <li><a href="{{ $posts->previousPageUrl() }}">&laquo;</a></li>
                                @endif

                                {{-- First Page --}}
                                @if ($start > 1)
                                    <li><a href="{{ $posts->url(1) }}">1</a></li>
                                    @if ($start > 2)
                                        <li><span>...</span></li>
                                    @endif
                                @endif

                                {{-- Page Links --}}
                                @for ($i = $start; $i <= $end; $i++)
                                    <li class="{{ $posts->currentPage() == $i ? 'active' : '' }}">
                                        <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Last Page --}}
                                @if ($end < $posts->lastPage())
                                    @if ($end < $posts->lastPage() - 1)
                                        <li><span>...</span></li>
                                    @endif
                                    <li><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
                                @endif

                                {{-- Next --}}
                                @if ($posts->hasMorePages())
                                    <li><a href="{{ $posts->nextPageUrl() }}">&raquo;</a></li>
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

            <!-- Sidebar -->
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Stay Connected</div>
                    </div>
                    <ul class="stay-connected overflow-hidden">
                        <li class="facebook">
                            <a href="#"><i class="fa fa-facebook"></i>
                                <div class="connection-quantity">50.2 k</div>
                                <p>Fans</p>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="#"><i class="fa fa-twitter"></i>
                                <div class="connection-quantity">10.3 k</div>
                                <p>Followers</p>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="#"><i class="fa fa-linkedin"></i>
                                <div class="connection-quantity">25.4 k</div>
                                <p>Fans</p>
                            </a>
                        </li>
                        <li class="rss">
                            <a href="#"><i class="fa fa-rss"></i>
                                <div class="connection-quantity">20.8 k</div>
                                <p>Subscriber</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-box">
                    <div class="ne-banner-layout1 text-center">
                        <a href="#"><img src="{{ asset('website/img/banner/banner3.jpg') }}" class="img-fluid"
                                alt="ad"></a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Tags</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach(\App\Tag::all() as $tag)
                            <li><a href="{{ route('search', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

@include('front.footer')