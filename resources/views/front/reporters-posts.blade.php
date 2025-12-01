@include('front.header')
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('{{ asset('img/banner/breadcrumbs-banner.jpg') }}');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ $reporter->name }}'s Posts</h1>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a> -
                </li>
                <li>{{ $reporter->name }}'s Posts</li>
            </ul>
        </div>
    </div>
</section>

<!-- Breadcrumb Area End Here -->
<!-- Author Post Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="bg-accent p-35-r mb-50 item-shadow-1">
                    <div class="media media-none-xs">
                        <img src="{{ $reporter->image ? asset('storage/' . $reporter->image) : asset('img/author.jpg') }}"
                            alt="{{ $reporter->name }}" class="img-fluid rounded-circle" style="width: 200px;">
                        <div class="media-body pt-10 media-margin30">
                            <h3 class="size-lg mb-5">{{ $reporter->name }}</h3>
                            <div class="post-by mb-5">By Admin</div>
                            <p class="mb-15">{{ $reporter->bio ?? 'No bio available' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($posts as $post)
                        <div class="col-sm-6 col-12">
                            <div class="mb-30">
                                <div class="position-relative mb-20">
                                    <a class="img-opacity-hover" href="{{ route('post.show', $post->slug) }}">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('img/news/news132.jpg') }}"
                                            alt="{{ $post->title }}" class="img-fluid width-100">
                                    </a>
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            {{ $post->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-lg mb-none">
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @empty
                        <p>No posts found for this reporter.</p>
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
                                    <li><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a>
                                    </li>
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
<!-- Author Post Page Area End Here -->
@include('front.footer')