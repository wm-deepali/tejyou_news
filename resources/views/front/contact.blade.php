@include('front.header')
<!-- News Feed Area Start Here -->
<section class="bg-accent border-bottom add-top-margin">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="topic-box mt-4 mb-5">Top Stories</div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                <div class="feeding-text-dark">
                    <ol id="sample" class="ticker">
                        <li>
                            <a href="#">McDonell Kanye West highlights difficulties for celebritiesComplimentary decor
                                and
                                design advicewith Summit Park homes</a>
                        </li>
                        <li>
                            <a href="#">Magnificent Image Of The New Hoover Dam Bridge Taking Shape</a>
                        </li>
                        <li>
                            <a href="#">If Obama Had Governed Like This in 2017 He'd Be the Transformational.</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Feed Area End Here -->
<!-- News Info List Area Start Here -->
<section class="bg-body">
    <div class="container">
        <ul class="news-info-list text-center--sm">
            <li>
                <i class="fa fa-map-marker" aria-hidden="true"></i>Australia
            </li>
            <li>
                <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span>
            </li>
            <li>
                <i class="fa fa-clock-o" aria-hidden="true"></i>Last Update 11.30 am
            </li>
            <li>
                <i class="fa fa-cloud" aria-hidden="true"></i>29&#8451; Sydney, Australia
            </li>
        </ul>
    </div>
</section>
<!-- News Info List Area End Here -->
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
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
                <h2 class="title-semibold-dark size-xl">Our Customer Support Representatives Are Ready To Help You 24/7,
                    365 Days a Year!</h2>
                <p class="size-lg mb-40">Esimply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.</p>
                <div class="google-map-area mb-50">
                    <div id="googleMap" style="width:100%; height:400px;"></div>
                </div>
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">Location Info</div>
                </div>
                <ul class="address-info">
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>29 Street, Melbourne City, Australia # 34
                        Road, House #10.
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>+ 9850678910
                    </li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>infonewsedge.com
                    </li>
                    <li>
                        <i class="fa fa-fax" aria-hidden="true"></i>+ 9850678910
                    </li>
                </ul>
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">Send Us Message</div>
                </div>
                <form id="contact-form" class="contact-form">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Name" class="form-control" name="name"
                                        id="form-subject" data-error="Name field is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" placeholder="Your E-mail" class="form-control" name="email"
                                        id="form-email" data-error="Email field is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea placeholder="Message" class="textarea form-control" name="message"
                                        id="form-message" rows="7" cols="20" data-error="Message field is required"
                                        required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                <div class="form-group mb-none">
                                    <button type="submit" class="btn-ftg-ptp-56 disabled">Send Message</button>
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
                            <img src="img/banner/banner3.jpg" alt="ad" class="img-fluid">
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
                        <img src="img/banner/newsletter.png" alt="newsletter" class="img-fluid m-auto mb-15">
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
            </div>
        </div>
    </div>
</section>
<!-- Contact Page Area End Here -->
@include('front.footer')