@include('front.header')

<section class="breadcrumbs-area"
    style="background-image: url('{{asset('website') }}/img/banner/breadcrumbs-banner.jpg');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Contact With Us</h1>
            <ul>
                <li>
                    <a href="index.html">Home</a> -
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Contact Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">About Us</div>
                </div>
                <div class="about-us">
                    {!! $aboutus->content1 ?? Null !!}
                    {!! $aboutus->content2 ?? Null !!}
                </div>
                <div class="google-map-area mb-50">
                    <iframe src="{{ $aboutus->map }}" width="100%" height="400" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">Location Info</div>
                </div>
                <ul class="address-info">
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>{!! $aboutus->address ?? 'N/A' !!}
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>{{ $aboutus->contact1 ?? 'N/A' }}
                    </li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $aboutus->email ?? 'N/A' }}
                    </li>
                    <li>
                        <i class="fa fa-fax" aria-hidden="true"></i>{{ $aboutus->contact2 ?? 'N/A' }}
                    </li>
                </ul>
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">Send Us Message</div>
                </div>
                <form id="contact-us-form" class="contact-form">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Name" class="form-control" name="name"
                                        id="form-name" required>
                                    <div class="text-danger" id="name-err"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="contact" placeholder="Mobile Number" class="form-control"
                                        id="form-contact" required pattern="^\d{10,15}$" title="Enter valid number">
                                    <div class="text-danger" id="contact-err"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" placeholder="Your E-mail" class="form-control" name="email"
                                        id="form-email" required>
                                    <div class="text-danger" id="email-err"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea placeholder="Message" class="textarea form-control" name="message"
                                        id="form-message" rows="7" required></textarea>
                                    <div class="text-danger" id="message-err"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                    <div class="text-danger" id="recaptcha-err"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                <div class="form-group mb-none">
                                    <button type="submit" class="btn-ftg-ptp-56 contact-us-btn">Send Message</button>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                <div class="form-response"></div>
                            </div>
                        </div>
                    </fieldset>
                </form>
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
                            <img src="{{asset('website') }}/img/banner/banner3.jpg" alt="ad" class="img-fluid">
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

@include('front.footer')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $(document).on("click", ".contact-us-btn", function (event) {
            event.preventDefault();

            // Clear previous errors
            $('#name-err, #email-err, #contact-err, #message-err, #recaptcha-err').html('');

            // Frontend validation
            let valid = true;
            let name = $('#form-name').val().trim();
            let email = $('#form-email').val().trim();
            let contact = $('#form-contact').val().trim();
            let message = $('#form-message').val().trim();
            let recaptcha = grecaptcha.getResponse();

            if (name.length < 3) { $('#name-err').html('Name must be at least 3 characters'); valid = false; }
            if (!/^\S+@\S+\.\S+$/.test(email)) { $('#email-err').html('Enter valid email'); valid = false; }
            if (!/^\d{10,15}$/.test(contact)) { $('#contact-err').html('Enter valid contact number'); valid = false; }
            if (message.length < 10) { $('#message-err').html('Message must be at least 10 characters'); valid = false; }
            if (recaptcha.length === 0) { $('#recaptcha-err').html('Please verify reCAPTCHA'); valid = false; }

            if (!valid) return;

            // AJAX call
            $.ajax({
                url: "{{ url('add-contact-us') }}",
                type: 'POST',
                dataType: 'json',
                data: $('#contact-us-form').serialize(),
                success: function (result) {
                    if (result.msgCode === '200') {
                        toastr.success(result.msgText);
                        $('#contact-us-form')[0].reset();
                        grecaptcha.reset();
                    } else if (result.msgCode === '401') {
                        $.each(result.errors, function (key, value) {
                            $('#' + key + '-err').html(value[0]);
                        });
                    } else {
                        toastr.error('Error: ' + result.msgText);
                    }
                },
                error: function (error) {
                    toastr.error('Error: ' + error.statusText);
                }
            });
        });
    });

</script>