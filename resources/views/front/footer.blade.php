<!-- Footer Area Start Here -->
@php
	$mostViewedPosts = App\Post::where('status', 'published')
		->orderBy('views', 'desc')
		->take(5) // adjust how many posts you want to show
		->get();

	$footerCategories = App\Category::where('status', 'active')
		->where('showonfooter', 'yes')
		->orderBy('sequence', 'asc')
		->get();

	// Fetch latest 9 posts with images
	$galleryPosts = App\Post::where('status', 'published')
		->whereNotNull('image')
		->orderBy('created_at', 'desc')
		->take(9)
		->get();

@endphp
<footer>
	<div class="footer-area-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="footer-box">
						<h2 class="title-bold-light title-bar-left text-uppercase">Most Viewed Posts</h2>
						<ul class="most-view-post">
							@foreach($mostViewedPosts as $post)
								<li>
									<div class="media">
										<a href="{{ route('post.show', $post->slug) }}">
											<img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://tejyug.com/public/front/images/Tej-Yug-News-logo.png' }}"
												alt="{{ $post->title }}" class="img-fluid" width="70px">
										</a>
										<div class="media-body">
											<h3 class="title-medium-light size-md mb-10">
												<a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
											</h3>
											<div class="post-date-light">
												<ul>
													<li>
														<span>
															<i class="fa fa-calendar" aria-hidden="true"></i>
														</span>{{ $post->created_at->format('F d, Y') }}
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li>
							@endforeach

							@if($mostViewedPosts->isEmpty())
								<li>No posts available</li>
							@endif
						</ul>
					</div>
				</div>

				<div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
					<div class="footer-box">
						<h2 class="title-bold-light title-bar-left text-uppercase">Popular Categories</h2>
						<ul class="popular-categories">
							@foreach($footerCategories as $category)
								<li>
									<a href="{{ route('category.posts', $category->slug) }}">
										{{ $category->name }}
										<span>{{ $category->posts()->count() }}</span>
									</a>
								</li>
							@endforeach

							@if($footerCategories->isEmpty())
								<li>No categories available</li>
							@endif
						</ul>
					</div>
				</div>



				<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
					<div class="footer-box">
						<h2 class="title-bold-light title-bar-left text-uppercase">Post Gallery</h2>
						<ul class="post-gallery shine-hover ">
							@foreach($galleryPosts as $post)
								<li>
									<a href="{{ route('post.show', $post->slug) }}">
										<figure>
											<img src="{{ $post->image ? asset('storage/' . $post->image) : asset('website/img/footer/post-default.jpg') }}"
												alt="{{ $post->title }}" class="img-fluid" style="height:70px;">
										</figure>
									</a>
								</li>
							@endforeach

							@if($galleryPosts->isEmpty())
								<li>No news available</li>
							@endif
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="footer-area-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<a href="index.html" class="footer-logo img-fluid">
						<img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo" class="img-fluid"
							width="100px">
					</a>
					<ul class="footer-social">
						<li>
							<a href="#" title="facebook">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="twitter">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="google-plus">
								<i class="fa fa-google-plus" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="linkedin">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="pinterest">
								<i class="fa fa-pinterest" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="rss">
								<i class="fa fa-rss" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="vimeo">
								<i class="fa fa-vimeo" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
					<p>© 2025 Tejyug Designed by Tejyug. All Rights Reserved</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Area End Here -->
<!-- Modal Start-->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="title-login-form">Login</div>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<form>
						<label>Username or email address *</label>
						<input type="text" placeholder="Name or E-mail">
						<label>Password *</label>
						<input type="password" placeholder="Password">
						<div class="checkbox checkbox-primary">
							<input id="checkbox" type="checkbox" checked="">
							<label for="checkbox">Remember Me</label>
						</div>
						<button type="submit" value="Login">Login</button>
						<button class="form-cancel" type="submit" value="">Cancel</button>
						<label class="lost-password">
							<a href="#">Lost your password?</a>
						</label>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal End-->
<!-- Offcanvas Menu Start -->
<div id="offcanvas-body-wrapper" class="offcanvas-body-wrapper">
	<div id="offcanvas-nav-close" class="offcanvas-nav-close offcanvas-menu-btn">
		<a href="#" class="menu-times re-point">
			<span></span>
			<span></span>
		</a>
	</div>
	<div class="offcanvas-main-body">
		<ul id="accordion" class="offcanvas-nav panel-group" style="margin-bottom:40px;">
			<li class="panel panel-default">
				<div class="panel-heading">
					<a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse"
						data-parent="#accordion" href="{{ route('homecategory') }}">
						<i class="fa fa-home" aria-hidden="true"></i>Home </a>
				</div>
			</li>
			<li>
				<a href="#"><i class="fa fa-user" aria-hidden="true"></i>Our Reporters</a>
			</li>
			<li>
				<a href="{{ route('about-us') }}"><i class="fa fa-user" aria-hidden="true"></i>About Us</a>
			</li>
			<li>
				<a href="{{ route('our-team') }}"><i class="fa fa-user" aria-hidden="true"></i>Our Team</a>
			</li>
			<li>
				<a href="{{ url('/advertisement') }}"><i class="fa fa-archive" aria-hidden="true"></i>Advertise with Us</a>
			</li>
			<li>
				<a href="archive.html"><i class="fa fa-archive" aria-hidden="true"></i>Archive</a>
			</li>
			<li>
				<a href="archive.html"><i class="fa fa-archive" aria-hidden="true"></i>Gallery</a>
			</li>
			<li>
				<a href="{{ route('terms-of-use') }}"><i class="fa fa-archive" aria-hidden="true"></i>Terms & Conditions</a>
			</li>
			<li>
				<a href="{{ route('privacy-policy') }}"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Privacy Policy</a>
			</li>
			<li>
				<a href="{{ route('cookie-policy') }}"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Cookies Policy</a>
			</li>
			<li>
				<a href="{{ route('contact-us') }}"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a>
			</li>
		</ul>
	</div>
</div>
<!-- Offcanvas Menu End -->
</div>
<!-- Wrapper End -->
<!-- jquery-->
<script src="{{ asset('website') }}/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<!-- Plugins js -->
<script src="{{ asset('website') }}/js/plugins.js" type="text/javascript"></script>
<!-- Popper js -->
<script src="{{ asset('website') }}/js/popper.js" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{ asset('website') }}/js/bootstrap.min.js" type="text/javascript"></script>
<!-- WOW JS -->
<script src="{{ asset('website') }}/js/wow.min.js"></script>
<!-- Owl Cauosel JS -->
<script src="{{ asset('website') }}/vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="{{ asset('website') }}/js/jquery.meanmenu.min.js" type="text/javascript"></script>
<!-- Srollup js -->
<script src="{{ asset('website') }}/js/jquery.scrollUp.min.js" type="text/javascript"></script>
<!-- jquery.counterup js -->
<script src="{{ asset('website') }}/js/jquery.counterup.min.js"></script>
<script src="{{ asset('website') }}/js/waypoints.min.js"></script>
<!-- Isotope js -->
<script src="{{ asset('website') }}/js/isotope.pkgd.min.js" type="text/javascript"></script>
<!-- Magnific Popup -->
<script src="{{ asset('website') }}/js/jquery.magnific-popup.min.js"></script>
<!-- Ticker Js -->
<script src="{{ asset('website') }}/js/ticker.js" type="text/javascript"></script>
<!-- Custom Js -->
<script src="{{ asset('website') }}/js/main.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>