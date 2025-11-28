@include('front.header')
<style>
    .subcategories-wrapper {
        margin: 20px 0;
    }

    .subcategory-tabs li {
        display: inline-block;
    }

    .subcategory-tabs .tab-link {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 50px;
        background: #f1f1f1;
        color: #333;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s;
        font-size: 14px;
    }

    .subcategory-tabs .tab-link:hover {
        background: #007bff;
        color: #fff;
    }

    .subcategory-tabs .tab-link.active {
        background: #007bff;
        color: #fff;
    }
</style>

<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ $category->name }}</h1>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a> -
                </li>
                <li>{{ $category->name }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Subcategory Filter Tabs -->
@if($category->subcategories->count() > 0)
    <div class="subcategories-wrapper text-center">
        <ul class="subcategory-tabs d-inline-flex flex-wrap justify-content-center list-unstyled p-0 m-0">
            <li class="mx-1 mb-1">
                <a href="{{ route('category.posts', $category->slug) }}"
                    class="tab-link {{ empty(request('subcategory')) ? 'active' : '' }}">
                    All
                </a>
            </li>
            @foreach($category->subcategories as $sub)
                <li class="mx-1 mb-1">
                    <a href="{{ route('category.posts', $category->slug) }}?subcategory={{ $sub->slug }}"
                        class="tab-link {{ request('subcategory') == $sub->slug ? 'active' : '' }}">
                        {{ $sub->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Breadcrumb Area End Here -->
<!-- Post Style 1 Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
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
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
                                    </div>
                                </div>
                                <div class="media-body p-mb-none-child media-margin30">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>by</span>
                                                <a href="#">{{ $post->author->name ?? 'Admin' }}</a>
                                            </li>
                                            <li>
                                                <span><i
                                                        class="fa fa-calendar"></i></span>{{ $post->created_at->format('M d, Y') }}
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
                            <p class="text-muted mb-0">No posts found in this category.</p>
                        </div>
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
                        <div class="topic-box-lg color-cod-gray">Stay Connected</div>
                    </div>
                    <ul class="stay-connected overflow-hidden">
                        <li class="facebook">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <div class="connection-quantity">50.2 k</div>
                                <p>Fans</p>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                <div class="connection-quantity">10.3 k</div>
                                <p>Followers</p>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="#">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                <div class="connection-quantity">25.4 k</div>
                                <p>Fans</p>
                            </a>
                        </li>
                        <li class="rss">
                            <a href="#">
                                <i class="fa fa-rss" aria-hidden="true"></i>
                                <div class="connection-quantity">20.8 k</div>
                                <p>Subscriber</p>
                            </a>
                        </li>
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
                        <h2 class="title-medium-light size-xl pl-30 pr-30">Subscribe to our mailing list to get the new
                            updates!</h2>
                        <img src="{{ asset('website') }}/img/banner/newsletter.png" alt="newsletter"
                            class="img-fluid m-auto mb-15">
                        <p>Subscribe our newsletter to stay updated</p>
                        <div class="input-group stylish-input-group">
                            <input type="text" placeholder="Enter your mail" class="form-control">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Tags</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach(\App\Tag::all() as $tag)
                            <li><a href="#">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Post Style 1 Page Area End Here -->
<!-- Footer Area Start Here -->
@include('front.footer')