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
 @php
            $headerCategoriesWithSub = App\Category::where('status', 'active')
                ->where('showonheader', 'yes')
                ->where('hassubcategory', 'yes')
                ->with([
                    'subcategories' => function ($q) {
                        $q->where('showonheader', 'yes');
                    }
                ])
                ->get();

            $headercategorieswithoutsub = App\Category::where('status', 'active')
                ->where('showonheader', 'yes')
                ->where('hassubcategory', 'no')
                ->orderBy('sequence', 'asc')
                ->get();

            $postMenuCategory = App\Category::where('status', 'active')
                ->where('show_in_menu', 'yes')
                ->with([
                    'posts' => function ($q) {
                        $q->orderBy('created_at', 'desc')
                            ->take(4);
                    }
                ])
                ->orderBy('sequence', 'asc')
                ->get();

            $breakingNewsPosts = App\Post::where('status', 'published')
                ->where('breaking_news', 'yes')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        @endphp
<style>
    /* LEFT OFFCANVAS */
.left-sidebar{
    position: fixed;
    top: 0;
    left: -320px;
    width: 320px;
    height: 100vh;
    background: #0b1c2d;
    transition: 0.3s;
    z-index: 10001;
}

.left-sidebar.active{
    left: 0;
}

.left-overlay{
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
    z-index: 10000;
}

.left-overlay.active{
    opacity: 1;
    visibility: visible;
}


</style>
<footer class="tj-footer">

    <!-- SECTION 1 : 4-Column Information -->
        <div class="container">

        <!-- MOST VIEWED SECTION -->
        <div class="row mb-4 pb-3">
            <div class="col-12">
                <h4 class="text-uppercase fw-bold mb-3">MOST VIEWED</h4>
            </div>

            @foreach($mostViewedPosts as $post)
            <div class="col-md-4 mb-3">
                <a href="{{ route('post.show', $post->slug) }}" class="footer-card d-flex">
                    <div class="footer-thumb">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://tejyug.com/public/front/images/Tej-Yug-News-logo.png' }}"
												alt="{{ $post->title }}" class="img-fluid" width="70px">
                    </div>
                    <div class="footer-info ps-3 p-2" >
                        <div class="footer-title" style="color:#fff;">
                            {{ \Illuminate\Support\Str::limit($post->title, 60) }}
                        </div>
                        <span class="footer-date" style="color:#fff;">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>


        <!-- CATEGORIES -->
        <div class=" mb-4 tj-bottom-social pb-3">
            

            @foreach($footerCategories as $category)
            <div class="  mb-2" style="margin-right:24px;">
                <a href="{{ route('category.posts', $category->slug) }}"
                   class="btn btn-outline-secondary w-100 rounded-pill" style="font-size: 22px;
    padding: 5px 15px;
    margin-bottom: 15px;">
                   {{ $category->name }}
                </a>
            </div>
            @endforeach
        </div>

        <!-- COMPANY INFO & QUICK LINKS -->
      


                                    
                                    @foreach($postMenuCategory as $category)
    <div class="tj-tags-row">
        <strong>{{ $category->name }}:</strong>
        <div class="tj-tags-list">
             @forelse($category->posts as $post)
             <a href="{{ route('post.show', $post->slug) }}">
            <span>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</span>
            </a>
             @empty
                                                        <div class="mega-card">
                                                            <h4>No posts available</h4>
                                                        </div>
                                                    @endforelse
            
        </div>
    </div>
    @endforeach
    
     @foreach($headerCategoriesWithSub as $category)
    <div class="tj-tags-row">
        <strong>{{ $category->name }}:</strong>
        <div class="tj-tags-list">
              @foreach($category->subcategories as $sub)
             <a href="{{ route('post.show', $post->slug) }}">
            <span>{{ $sub->name }}</span>
            </a>
              @endforeach
            
        </div>
    </div>
    @endforeach

    <!-- SECTION 3: Latest -->
   


   


    <!-- SECTION 5: App + Social -->
    <div class="tj-bottom-social">
        <div class="left">
           
         <div class="tj-nav-row">
        <a href="#">Home</a>
        
        <a href="#">About Us</a>
        
       
        <a href="#">Contact Us</a>
        <a href="#">Adverties With Us</a>
        <a href="#">Terms Of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Cookies</a>
    </div>
        </div>

        <div class="right">
            FOLLOW US:
            <i class="fa fa-whatsapp"></i>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-rss"></i>
            <i class="fa fa-youtube"></i>
        </div>
    </div>
       
    </div>



   


    
    <div class="tj-copy">
        © Copyright Tej Yug News @ 2025 | Design & Developed By Web Mingo
    </div>

</footer>

<!--<footer>-->
<!--	<div class="footer-area-top">-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-lg-4 col-md-6 col-sm-12">-->
<!--					<div class="footer-box">-->
<!--						<h2 class="title-bold-light title-bar-left text-uppercase">Most Viewed Posts</h2>-->
<!--						<ul class="most-view-post">-->
<!--							@foreach($mostViewedPosts as $post)-->
<!--								<li>-->
<!--									<div class="media">-->
<!--										<a href="{{ route('post.show', $post->slug) }}">-->
<!--											<img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://tejyug.com/public/front/images/Tej-Yug-News-logo.png' }}"-->
<!--												alt="{{ $post->title }}" class="img-fluid" width="70px">-->
<!--										</a>-->
<!--										<div class="media-body">-->
<!--											<h3 class="title-medium-light size-md mb-10">-->
<!--												<a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>-->
<!--											</h3>-->
<!--											<div class="post-date-light">-->
<!--												<ul>-->
<!--													<li>-->
<!--														<span>-->
<!--															<i class="fa fa-calendar" aria-hidden="true"></i>-->
<!--														</span>{{ $post->created_at->format('F d, Y') }}-->
<!--													</li>-->
<!--												</ul>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</li>-->
<!--							@endforeach-->

<!--							@if($mostViewedPosts->isEmpty())-->
<!--								<li>No posts available</li>-->
<!--							@endif-->
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->

<!--				<div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">-->
<!--					<div class="footer-box">-->
<!--						<h2 class="title-bold-light title-bar-left text-uppercase">Popular Categories</h2>-->
<!--						<ul class="popular-categories">-->
<!--							@foreach($footerCategories as $category)-->
<!--								<li>-->
<!--									<a href="{{ route('category.posts', $category->slug) }}">-->
<!--										{{ $category->name }}-->
<!--										<span>{{ $category->posts()->count() }}</span>-->
<!--									</a>-->
<!--								</li>-->
<!--							@endforeach-->

<!--							@if($footerCategories->isEmpty())-->
<!--								<li>No categories available</li>-->
<!--							@endif-->
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->



<!--				<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">-->
<!--					<div class="footer-box">-->
<!--						<h2 class="title-bold-light title-bar-left text-uppercase">Post Gallery</h2>-->
<!--						<ul class="post-gallery shine-hover ">-->
<!--							@foreach($galleryPosts as $post)-->
<!--								<li>-->
<!--									<a href="{{ route('post.show', $post->slug) }}">-->
<!--										<figure>-->
<!--											<img src="{{ $post->image ? asset('storage/' . $post->image) : asset('website/img/footer/post-default.jpg') }}"-->
<!--												alt="{{ $post->title }}" class="img-fluid" style="height:70px;">-->
<!--										</figure>-->
<!--									</a>-->
<!--								</li>-->
<!--							@endforeach-->

<!--							@if($galleryPosts->isEmpty())-->
<!--								<li>No news available</li>-->
<!--							@endif-->
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->

<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="footer-area-bottom">-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-12 text-center">-->
<!--					<a href="index.html" class="footer-logo img-fluid">-->
<!--						<img src="{{ asset('website') }}/img/Tej-Yug-News-logo.png" alt="logo" class="img-fluid"-->
<!--							width="100px">-->
<!--					</a>-->
<!--					<ul class="footer-social">-->
<!--						<li>-->
<!--							<a href="#" title="facebook">-->
<!--								<i class="fa fa-facebook" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="twitter">-->
<!--								<i class="fa fa-twitter" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="google-plus">-->
<!--								<i class="fa fa-google-plus" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="linkedin">-->
<!--								<i class="fa fa-linkedin" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="pinterest">-->
<!--								<i class="fa fa-pinterest" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="rss">-->
<!--								<i class="fa fa-rss" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="#" title="vimeo">-->
<!--								<i class="fa fa-vimeo" aria-hidden="true"></i>-->
<!--							</a>-->
<!--						</li>-->
<!--					</ul>-->
<!--					<p>© 2025 Tejyug Designed by Tejyug. All Rights Reserved</p>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</footer>-->
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
<!-- LEFT OFFCANVAS -->




<!-- Offcanvas Menu End -->
</div>
<!-- Wrapper End -->

<!-- start video Modal -->
 <style>
    /* Auto-resize container like YouTube embed */
    .youtube-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.5%;
        /* Default 16:9 */
        height: 0;
        overflow: hidden;
    }

    /* Allow YouTube to auto-adjust height internally */
    .youtube-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .modal-header {
        padding: 1rem !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #dee2e6;
    }

    .modal-header .modal-title {
        font-size: medium;
    }

    .modal-header .btn-close {
        padding: .5rem;
        margin: 0;
    }
</style>
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="youtube-container">
                    <iframe id="videoFrame" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // On thumbnail click → open modal with correct video
        document.querySelectorAll(".video-thumb").forEach(item => {
            item.addEventListener("click", function () {
                let videoId = this.getAttribute("data-videoid");
                let url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";

                document.getElementById("videoFrame").src = url;

                let videoModal = new bootstrap.Modal(document.getElementById("videoModal"));
                videoModal.show();
            });
        });

        // Stop video on modal close
        document.getElementById("videoModal").addEventListener("hidden.bs.modal", function () {
            document.getElementById("videoFrame").src = "";
        });

    });
</script>
<!-- end video Modal -->

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