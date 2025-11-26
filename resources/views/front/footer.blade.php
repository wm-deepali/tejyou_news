
<style>
@media (min-width:575px) {
    .footer-mobile-menu{
        display:none;
    }
}
@media (max-width:575px) {
 .footer-mobile-menu{
     width:100%;
     height:60px;
     background:white;
     position:fixed;
     box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
     bottom:0px;
        
    }
    .footer-menu{
        width:100%;
        height:100%;
        display:grid;
        grid-template-columns:1fr 1fr 1fr 1fr 1fr;
        gap:10px
        
    }
    .menu-bottom{
        width:100%;
        height:100%;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .menu-bottom h3{
        font-size:16px;
    }
    .menu-bottom h4{
        font-size:14px;
        margin:0px;
        /*color:#fff;*/
    }
}
    
</style>
@php
if(isset($footercategories) && count($footercategories)>0)
{
    $footercategories1 = $footercategories->slice(0, 11);
    
}
else if(isset($footercategories) && count($footercategories)>11)
{
    $footercategories2 = $footercategories->slice(12, 23);
}
else if(isset($footercategories) && count($footercategories)>23)
{
    $footercategories3 = $footercategories->slice(24, 35);
}
else if(isset($footercategories) && count($footercategories)>35)
{
    $footercategories4 = $footercategories->slice(36,47);
}
@endphp

<div id="loader" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog loader">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ URL::asset('front/images/loader.gif') }}" alt="loader">
            </div>
        </div>
    </div>
</div>
<footer class="footer border-top pt-4">
	<div class="container-fluid">
		<div class="">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-7">
							<div class="d-flex justify-content-between">
								<ul class="list-unstyled footer-list">
								    @if (isset($footercategories1) && count($footercategories1)>0)
                                     @foreach ($footercategories1 as $footercategory1)
    									<li><a class="footer-links text-decoration-none" href="{{ route('postbycategory',$footercategory1->slug) }}">{{ $footercategory1->name }}</a></li>
    									
    								@endforeach
                                    @endif
								</ul>
								<ul class="list-unstyled footer-list">
								    @if (isset($footercategories2) && count($footercategories2)>0)
                                     @foreach ($footercategories2 as $footercategory2)
    									<li><a class="footer-links text-decoration-none" href="{{ route('postbycategory',$footercategory2->slug) }}">{{ $footercategory2->name }}</a></li>
    									
    								@endforeach
                                    @endif
								</ul>
								<ul class="list-unstyled footer-list">
								    @if (isset($footercategories3) && count($footercategories3)>0)
                                     @foreach ($footercategories3 as $footercategory3)
    									<li><a class="footer-links text-decoration-none" href="{{ route('postbycategory',$footercategory3->slug) }}">{{ $footercategory3->name }}</a></li>
    									
    								@endforeach
                                    @endif
								</ul>
								<ul class="list-unstyled footer-list">
								    @if (isset($footercategories4) && count($footercategories4)>0)
                                     @foreach ($footercategories4 as $footercategory4)
    									<li><a class="footer-links text-decoration-none" href="{{ route('postbycategory',$footercategory4->slug) }}">{{ $footercategory4->name }}</a></li>
    									
    								@endforeach
                                    @endif
								</ul>
								<!--ul class="list-unstyled footer-list">
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/ayathhaya') }}">अयोध्या</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/gayabtha') }}">गाजियाबाद</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/kanpur') }}">कानपुर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/prayagraj') }}">प्रयागराज</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/varanasi') }}">वाराणसी</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/maratha') }}">मेरठ</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/bihar') }}">बिहार</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/patna') }}">पटना</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/varanasi') }}">वाराणसी</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/maratha') }}">मेरठ</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/bihar') }}">बिहार</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/patna') }}">पटना</a></li>
								</ul>
								<ul class="list-unstyled footer-list">
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/indore') }}">इंदौर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/purnia') }}">पूर्णिया</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/gaya') }}">गया</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/begusarai') }}">बेगूसराय</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/rajasthan') }}">राजस्थान</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/kota') }}">कोटा</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/ajmer') }}">अजमेर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/jaipur') }}">जयपुर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/rajasthan') }}">राजस्थान</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/kota') }}">कोटा</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/ajmer') }}">अजमेर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/jaipur') }}">जयपुर</a></li>
								</ul>	
								<ul class="list-unstyled footer-list">
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/jabalpur') }}">जबलपुर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/udaipur') }}">उदयपुर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/jodhpur') }}">जोधपुर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/alwar') }}">अलवर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/bikaner') }}">बिकानेर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/palval') }}">हरियाणा</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/hisar') }}">हिसार</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/faridabad') }}">फरीदाबाद</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/bikaner') }}">बिकानेर</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('/palval') }}">हरियाणा</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/hisar') }}">हिसार</a></li>
									<li><a class="footer-links text-decoration-none" href="{{ url('cities/faridabad') }}">फरीदाबाद</a></li>
								</ul-->
							</div>
						</div>
						<div class="col-lg-5">
							<div class="pb-4">
								<h6>Trending Topics</h6>
								<div class="d-flex justify-content-between">
									<ul class="list-unstyled footer-list">
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Contact Us</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Our Team</a></li>
										<li><a class="footer-links text-decoration-none" href="#">E-Paper</a></li>
										<li><a class="footer-links text-decoration-none" href="#">RSS</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Twitter</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Facebook</a></li>
									</ul>
									<ul class="list-unstyled footer-list">
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Contact Us</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Our Team</a></li>
										<li><a class="footer-links text-decoration-none" href="#">E-Paper</a></li>
										<li><a class="footer-links text-decoration-none" href="#">RSS</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Twitter</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Facebook</a></li>
									</ul>
									<ul class="list-unstyled footer-list">
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Lorem, ipsum.</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Contact Us</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Our Team</a></li>
										<li><a class="footer-links text-decoration-none" href="#">E-Paper</a></li>
										<li><a class="footer-links text-decoration-none" href="#">RSS</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Twitter</a></li>
										<li><a class="footer-links text-decoration-none" href="#">Facebook</a></li>
									</ul>
								</div>
							</div>
							<!-- 2 -->
						
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	<div class="sub-footer">
		<p class="mb-0"> {{ $footersetting->content ?? 'Copyright © 2020 Tej Yug News. - All Right Reserved' }} 
		
		</p>
	</div>
	<div class="footer-mobile-menu">
	    <div class="footer-menu">
	        <div class="menu-bottom">
	            <h3><i class="fa fa-home"></i></h3>
	            <h4>Home</h4>
	        </div>
	        <div class="menu-bottom">
	            <h3><i class="fa fa-bars"></i></h3>
	            <h4>Categories</h4>
	        </div>
	        <div class="menu-bottom">
	            <h3><i class="fa fa-video"></i></h3>
	            <h4>Video's</h4>
	        </div>
	        <div class="menu-bottom">
	            <h3><i class="fa fa-file"></i></h3>
	            <h4>E-Paper</h4>
	        </div>
	        <div class="menu-bottom">
	            <h3><i class="fa fa-user"></i></h3>
	            <h4>Account</h4>
	        </div>
	        
	    </div>
	    
	</div>
</footer>

<script src="{{ URL::asset('front/js/library/jquery/jquery.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('front/js/library/jquery/poppers.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('front/js/library/bootstrap-v4/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('front/js/custom.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
</body>
</html>
