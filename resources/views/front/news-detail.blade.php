@include('front.header')

<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area"
    style="background-image: url('{{ asset('website/img/banner/breadcrumbs-banner.jpg') }}');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ $post->title }}</h1>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a> -
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
                            <a href="{{ route('reporter.posts', $post->user->id) }}">
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
                                    <a href="{{ route('search', ['tag' => $tag->slug]) }}">#{{ $tag->name }}</a>
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

                                    {{-- Display replies --}}
                                    @if($comment->replies->count())
                                        <ul style="margin-left: 40px;">
                                            @foreach($comment->replies as $reply)
                                                <li>
                                                    <div class="media media-none-xs">
                                                        <img src="{{ URL::asset('front/images/matt.jpg') }}"
                                                            alt="{{ $reply->name }}" class="img-fluid rounded-circle">
                                                        <div class="media-body comments-content media-margin30">
                                                            <h3 class="title-semibold-dark">
                                                                <a href="#">{{ $reply->name }},
                                                                    <span>{{ $reply->created_at->format('F d, Y') }}</span>
                                                                </a>
                                                            </h3>
                                                            <p>{{ $reply->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="leave-comments comments-form">
                        <h2 class="title-semibold-dark size-xl mb-40">Leave Comments</h2>
                        <form id="add-comment-form">
                            <div class="row">
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
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
                                <div class="col-12 mb-3">
                                    <div class="g-recaptcha" id="comment-recaptcha"
                                        data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                    <div id="captcha-err" class="help-block with-errors"></div>
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
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
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
                                <div class="col-12 mb-3">
                                    <div class="g-recaptcha" id="reply-recaptcha"
                                        data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                    <div id="captcha-err" class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="comment_id" id="comment_id" value="">

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
                {{-- Upper Sidebar Ad 300x250 --}}
                @if($uppersidebar300x250)
                    <div class="sidebar-box mb-30">
                        <div class="ne-banner-layout1 text-center">
                            <a href="{{ $uppersidebar300x250->url ?? '#' }}" target="_blank">
                                <img src="{{ asset('storage/' . $uppersidebar300x250->image) }}" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif

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



                {{-- Lower Sidebar Ad 300x250 --}}
                @if($lowersidebar300x250)
                    <div class="sidebar-box mb-30">
                        <div class="ne-banner-layout1 text-center">
                            <a href="{{ $lowersidebar300x250->url ?? '#' }}" target="_blank">
                                <img src="{{ asset('storage/' . $lowersidebar300x250->image) }}" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif


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

                                    <a href="{{ route('post.show', $r->slug) }}"
                                        class="mb-10 display-block img-opacity-hover">
                                        @if($r->video)
                                            <img class="img-fluid m-auto width-100" data-videoid="{{$r->video}}"
                                                src="https://img.youtube.com/vi/{{$r->video}}/0.jpg" />
                                        @else
                                            <img src="{{ $r->image ? asset('storage/' . $r->image) : asset('website/img/news/news177.jpg') }}"
                                                alt="{{ $r->title }}" class="img-fluid m-auto width-100">
                                        @endif
                                    </a>

                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="{{ route('post.show', $r->slug) }}">{{ Str::limit($r->title, 60) }}</a>
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
                <div class="topic-border color-cod-gray mb-25">
                    <div class="topic-box-lg color-cod-gray">Tags</div>
                </div>
                <ul class="sidebar-box">
                    @foreach($post->tags as $tag)
                        <li>
                            <a href="{{ route('search', ['tag' => $tag->slug]) }}">#{{ $tag->name ?? 'Tag' }}</a>
                        </li>
                    @endforeach
                </ul>
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
                                    @if($mPost->video)
                                        <img class="img-fluid" data-videoid="{{$mPost->video}}"
                                            src="https://img.youtube.com/vi/{{$mPost->video}}/0.jpg" />
                                    @else
                                        <img src="{{ $mPost->image ? asset('storage/' . $mPost->image) : asset('website/img/news/news177.jpg') }}"
                                            alt="{{ $mPost->title }}" class="img-fluid">
                                    @endif
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
    let commentCaptcha, replyCaptcha;

    function renderCaptchas() {
        commentCaptcha = grecaptcha.render('comment-recaptcha', {
            'sitekey': '{{ env('RECAPTCHA_SITE_KEY') }}'
        });
        replyCaptcha = grecaptcha.render('reply-recaptcha', {
            'sitekey': '{{ env('RECAPTCHA_SITE_KEY') }}'
        });
    }

    $(document).ready(function () {
        renderCaptchas();
    });

    function validateCommentForm(formType = "comment") {
        let valid = true;

        // Reset errors
        $('#name-err').html('');
        $('#email-err').html('');
        $('#contact-err').html('');
        $('#comment-err').html('');
        $('#captcha-err').html('');

        // Form selectors depending on form type
        let formId = (formType === "reply") ? '#add-comment-reply-form' : '#add-comment-form';

        let name = $(formId + " input[name='name']").val().trim();
        let email = $(formId + " input[name='email']").val().trim();
        let contact = $(formId + " input[name='contact']").val().trim();
        let comment = $(formId + " textarea[name='comment']").val().trim();
        let captcha = (formType === 'reply')
            ? grecaptcha.getResponse(replyCaptcha)
            : grecaptcha.getResponse(commentCaptcha);


        // NAME
        if (name.length < 2) {
            $('#name-err').html("Name is required.");
            valid = false;
        }

        // EMAIL
        let emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailReg.test(email)) {
            $('#email-err').html("Enter a valid email.");
            console.log('email iussue');

            valid = false;
        }

        // CONTACT (optional but must be numeric if entered)
        if (contact !== "" && !/^[0-9]{8,15}$/.test(contact)) {
            $('#contact-err').html("Enter valid mobile number (8–15 digits).");
            console.log('contact issue');

            valid = false;
        }

        // COMMENT
        if (comment.length < 5) {
            $('#comment-err').html("Message must be at least 5 characters.");
            console.log('co iussue');


            valid = false;
        }

        // reCAPTCHA
        if (captcha.length === 0) {
            $('#captcha-err').html("Please verify you are not a robot.");
            console.log('captcha issue');

            valid = false;
        }

        return valid;
    }

    $(document).ready(function () {
        $(document).on('click', '.add-comment-btn', function (event) {
            event.preventDefault();

            if (!validateCommentForm("comment")) {
                return false; // Stop AJAX
            }

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

            grecaptcha.reset(); // reset captcha for reply
        });


        $(document).on('click', '.add-comment-reply-btn', function (event) {
            event.preventDefault();

            if (!validateCommentForm("reply")) {
                console.log('here');

                return false;
            }
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