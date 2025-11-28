@include('front.header')

<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area"
    style="background-image: url('{{ asset('website/img/banner/breadcrumbs-banner.jpg') }}');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ $post->title }}</h1>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a> -
                </li>
                <li>
                    <a href="{{ route('category.posts', $post->category->slug ?? 0) }}">
                        {{ $post->category->name ?? 'Category' }}
                    </a> -
                </li>
                <li>{{ $post->title }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Breadcrumb Area End Here -->
<!-- News Details Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    <div class="position-relative mb-30">
                        @if($post->video)
                            <img class="img-fluid" data-videoid="{{$post->video}}"
                                src="https://img.youtube.com/vi/{{$post->video}}/0.jpg" />
                        @else
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('website/img/news/news177.jpg') }}"
                                alt="news-details" class="img-fluid">
                        @endif
                        <div class="topic-box-top-sm">
                            <div class="topic-box-sm color-cinnabar mb-20">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </div>
                        </div>
                    </div>
                    <h2 class="title-semibold-dark size-c30">{{ $post->title }}</h2>

                    <ul class="post-info-dark mb-30">
                        <li>
                            <a href="#">
                                <span>By</span> {{ $post->user->name ?? 'Admin' }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ $post->created_at->format('M d, Y') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                {{ $post->views }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                {{ $post->comments->count() }}
                            </a>
                        </li>
                    </ul>
                    {!! $post->content !!}
                    {{-- Tags --}}
                    @if($post->tags->count() > 0)
                        <ul class="blog-tags item-inline">
                            <li>Tags</li>
                            @foreach($post->tags as $tag)
                                <li>
                                    <a href="#">#{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @php
                        $postUrl = url()->current();
                        $postTitle = urlencode($post->title);
                    @endphp

                    <div class="post-share-area mb-40 item-shadow-1">
                        <p>You can share this post!</p>
                        <ul class="social-default item-inline">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" class="facebook"
                                    target="_blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ $postTitle }}"
                                    class="twitter" target="_blank">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/share?url={{ $postUrl }}" class="google"
                                    target="_blank">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://pinterest.com/pin/create/button/?url={{ $postUrl }}&description={{ $postTitle }}"
                                    class="pinterest" target="_blank">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rss">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ $postTitle }}"
                                    class="linkedin" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="row no-gutters divider blog-post-slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            @if($prevPost)
                                <a href="{{ route('post.show', $prevPost->slug) }}" class="prev-article">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>Previous article
                                </a>
                                <h3 class="title-medium-dark pr-50">{{ $prevPost->title }}</h3>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                            @if($nextPost)
                                <a href="{{ route('post.show', $nextPost->slug) }}" class="next-article">
                                    Next article <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <h3 class="title-medium-dark pl-50">{{ $nextPost->title }}</h3>
                            @endif
                        </div>
                    </div>

                    <div class="author-info p-35-r mb-50 border-all">
                        <div class="media media-none-xs">
                            <img src="{{ $post->user->image ? URL::asset('storage/' . $post->user->image) : asset('website/img/author.jpg') }}"
                                alt="{{ $post->user->name }}" class="img-fluid rounded-circle">
                            <div class="media-body pt-10 media-margin30">
                                <h3 class="size-lg mb-5">{{ $post->user->name }}</h3>
                                <div class="post-by mb-5">By {{ $post->user->role ?? 'Admin' }}</div>
                                <p class="mb-15">{{ $post->user->bio ?? 'No bio available.' }}</p>
                                <ul class="author-social-style2 item-inline">
                                    @if($post->user->facebook)
                                        <li><a href="{{ $post->user->facebook }}" title="facebook"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if($post->user->twitter)
                                        <li><a href="{{ $post->user->twitter }}" title="twitter"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if($post->user->linkedin)
                                        <li><a href="{{ $post->user->linkedin }}" title="linkedin"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                    @endif
                                    @if($post->user->google_plus)
                                        <li><a href="{{ $post->user->google_plus }}" title="google-plus"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                    @endif
                                    @if($post->user->pinterest)
                                        <li><a href="{{ $post->user->pinterest }}" title="pinterest"><i
                                                    class="fa fa-pinterest"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">
                            {{ $post->comments->count() }} Comment{{ $post->comments->count() > 1 ? 's' : '' }}
                        </h2>
                        <ul>
                            @foreach($post->comments as $comment)
                                <li>
                                    <div class="media media-none-xs">
                                        <img src="{{ URL::asset('front/images/matt.jpg') }}" alt="{{ $comment->name }}"
                                            class="img-fluid rounded-circle">
                                        <div class="media-body comments-content media-margin30">
                                            <h3 class="title-semibold-dark">
                                                <a href="#">{{ $comment->name }},
                                                    <span>{{ $comment->created_at->format('F d, Y') }}</span>
                                                </a>
                                            </h3>
                                            <p>{{ $comment->content }}</p>
                                            <a href="javascript:void(0)" comment_id="{{ $comment->id }}"
                                                class="reply-box">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="leave-comments comments-form">
                        <h2 class="title-semibold-dark size-xl mb-40">Leave Comments</h2>
                        <form id="add-comment-form">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Name*" class="form-control" name="name" type="text">
                                        <div id="name-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Email*" class="form-control" name="email" type="email">
                                        <div id="email-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Mobile Number" name="contact" class="form-control"
                                            type="text">
                                        <div id="contact-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="comment" placeholder="Message*" class="textarea form-control"
                                            id="form-message" rows="8" cols="20"></textarea>
                                        <div id="comment-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-none">
                                        <button type="submit" class="btn-ftg-ptp-45 add-comment-btn">Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="leave-comments reply-form" style="display:none;">
                        <h2 class="title-semibold-dark size-xl mb-40">Leave Reply</h2>
                        <form id="add-comment-reply-form">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Name*" class="form-control" name="name" type="text">
                                        <div id="name-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Email*" class="form-control" name="email" type="email">
                                        <div id="replyemail-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Mobile Number" name="contact" class="form-control"
                                            type="text">
                                        <div id="replycontact-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="comment" placeholder="Message*" class="textarea form-control"
                                            id="form-message" rows="8" cols="20"></textarea>
                                        <div id="replycomment-err" class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-none">
                                        <button type="submit" class="btn-ftg-ptp-45 add-comment-reply-btn">Post
                                            Reply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                            <img src="{{ asset('website') }}/img/banner/banner3.jpg" alt="ad" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-5">
                        <div class="topic-box-lg color-cod-gray">Recent News</div>
                    </div>
                    <div class="row">
                        @foreach($randomPosts as $r)
                            <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                <div class="mt-25 position-relative">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $r->category->name ?? 'News' }}
                                        </div>
                                    </div>

                                    <a href="{{ route('post.show', $r->id) }}"
                                        class="mb-10 display-block img-opacity-hover">
                                        <img src="{{ asset('storage/' . $r->image) }}" alt="{{ $r->title }}"
                                            class="img-fluid m-auto width-100">
                                    </a>

                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="{{ route('post.show', $r->id) }}">{{ Str::limit($r->title, 60) }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
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
                        @foreach($post->tags as $tag)
                            <li>
                                <a href="#">#{{ $tag->name ?? 'Tag' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Most Viewed</div>
                    </div>

                    @foreach($mostViewedPosts as $mPost)
                        <div class="position-relative mb30-list bg-body">
                            <div class="topic-box-top-xs">
                                <div class="topic-box-sm color-cod-gray mb-20">
                                    {{ $mPost->category->name ?? 'General' }}
                                </div>
                            </div>
                            <div class="media">
                                <a class="img-opacity-hover" href="{{ route('post.show', $mPost->slug) }}">
                                    <img src="{{ asset('storage/' . $mPost->image) }}" alt="{{ $mPost->title }}"
                                        class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>{{ $mPost->created_at->format('F d, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark mb-none">
                                        <a href="{{ route('post.show', $mPost->slug) }}">
                                            {{ Str::limit($mPost->title, 50) }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!-- News Details Page Area End Here -->

@include('front.footer')
<script type="text/javascript"
    async>function generic_social_share(url) { window.open(url, 'sharer', 'toolbar=0,status=0,width=648,height=395'); return true; }</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ajaxStart(function () {
        $("#loader").modal('show');
    });
    $(document).ajaxComplete(function () {
        $("#loader").modal('hide');
    });
    $(document).ready(function () {


        $(document).on('click', '.add-comment-btn', function (event) {
            $('#name-err').html('');
            $('#email-err').html('');
            $('#contact-err').html('');
            $('#comment-err').html('');
            $.ajax({
                url: "{{ URL::to('add-comment') }}",
                type: 'POST',
                dataType: 'json',
                data: $('#add-comment-form').serialize(),
                success: function (result) {
                    if (result.msgCode === '200') {
                        toastr.success(result.msgText);
                        location.reload();
                    } else if (result.msgCode === '401') {
                        if (result.errors.name) {
                            $('#name-err').html(result.errors.name[0]);
                        }
                        if (result.errors.email) {
                            $('#email-err').html(result.errors.email[0]);
                        }
                        if (result.errors.contact) {
                            $('#contact-err').html(result.errors.contact[0]);
                        }
                        if (result.errors.comment) {
                            $('#comment-err').html(result.errors.comment[0]);
                        }
                    } else {
                        toastr.error('error encountered ' + result.msgText);
                    }
                },
                error: function (error) {
                    toastr.error('error encountered ' + error.statusText);
                }
            });
        });

        $(document).on("click", ".reply-box", function (event) {
            let comment_id = $(this).attr('comment_id');
            $('.comments-form').hide();
            $('.reply-form').show();
            $("#add-comment-reply-form").find('#name').focus();
            $("#comment_id").val(comment_id);
            document.getElementById('add-comment-reply-form').reset();
        });

        $(document).on('click', '.add-comment-reply-btn', function (event) {
            $('#replyname-err').html('');
            $('#replyemail-err').html('');
            $('#replycontact-err').html('');
            $('#replycomment-err').html('');
            let comment_id = $("#comment_id").val();
            $.ajax({
                url: `{{ URL::to('add-comment-reply/${comment_id}') }}`,
                type: 'POST',
                dataType: 'json',
                data: $('#add-comment-reply-form').serialize(),
                success: function (result) {
                    if (result.msgCode === '200') {
                        toastr.success(result.msgText);
                        location.reload();
                    } else if (result.msgCode === '401') {
                        if (result.errors.name) {
                            $('#replyname-err').html(result.errors.name[0]);
                        }
                        if (result.errors.email) {
                            $('#replyemail-err').html(result.errors.email[0]);
                        }
                        if (result.errors.contact) {
                            $('#replycontact-err').html(result.errors.contact[0]);
                        }
                        if (result.errors.comment) {
                            $('#replycomment-err').html(result.errors.comment[0]);
                        }
                    } else {
                        toastr.error('error encountered ' + result.msgText);
                    }
                },
                error: function (error) {
                    toastr.error('error encountered ' + error.statusText);
                }
            });
        });

    });
</script>