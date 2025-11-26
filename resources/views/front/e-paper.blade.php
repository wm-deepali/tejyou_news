@include( 'front.header' )
{{-- @include( 'front.e-paper-header' ) --}}



<style type="text/css">
	.e-paper-section {
		background-image: url(front/images/bg1.png);
		background-repeat: no-repeat;
	}
	.e-paper-section.team-section {
	padding: 15px 0;
}
	.date-h {
	font-size: 18px;
	text-decoration: underline;
	margin: 1em 0 0.7em;
	}
	.date-h a { 
		float: right;
		background: #c02222;
		padding: 6px 8px;
		color: #fff;
		border-radius: 3px;
		display: inline-block;
		font-size: 0.7em;
	}
	.e-paper-btn {
		font-size: 1.2rem;
		display: block;
		width: 400px;
		max-width: 100%;
		margin: auto;
		padding: 10px;
	}
	.p-paper-section-two {
		border-top: 8px solid #ededf2;
  	border-bottom: 8px solid #ededf2;
	}
	.osd-img-box img{
	    width:100%;
	}
	.osd-img-box img {
	max-width: 600px;
	padding: 20px 0;
}
.calender-filter input {
	font-size: 18px;
	border: 1px solid #b3b3b3;
	padding: 4px 6px;
}
</style>
<!-- <section class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumb-sec">
					<div class="row">
						<div class="col-sm-12">
							<nav class="breadcrumb-m" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="item">You are here :&nbsp;&nbsp;</li>
									<li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">E-Paper</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!--  -->
<section class="e-paper-section team-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="">
					<h3 class="py-2"><b>तेज युग ई-पेपर में आपका स्वागत है</b></h3>
					<h5>अपने शहर समेत 11 राज्यों के 270 शहरों के ई-पेपर कहीं भी और कभी भी पढ़ें</h5>
				</div>
				<div class="osd-img-box">
				    @php $datatoday = \App\Epaper::where('status','active')->orderBy('date','DESC')->first();  @endphp
					<img src="{{ $datatoday->image ?  URL::asset('storage/'.$datatoday->image) : 'front/images/epaper1.png' }} " alt="">
					<div class="mb-4">
					   
						<a href="{{ URL::asset('storage/'.$datatoday->file) }}" target="_blank" type="button" class="e-paper-btn btn btn-warning text-white"><b>पढ़ने के लिए क्लिक करें</b></a>
				
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row justify-content-center">
			<div class="col-sm-4">
				<form id="filter-form" style="display:flex;justify-content: center;">
					<div>
						<label class="m-0 label-control">Select Date</label>
						<select class='form-control' name='date' id='date'>
							<option value=''>Select Date</option>
							@if(isset($dates) && count($dates)>0)
							@foreach($dates as $date)
							<option value='{{ $date->date }}'>{{ $date->date }}</option>
							@endforeach
							@endif
						</select>
					</div>
					&nbsp;&nbsp;
					<div style="align-self: flex-end;">
						<button class="btn btn-primary filterBtn" type="button">Filter</button>
					</div>
				</form>
			</div>
		</div> -->
		<!-- <div class="row justify-content-center" id="epaperDiv">
			<div class="col-sm-8">
				@if (isset($epaper))
							<h3 class="date-h">Showing Result: {{ $epaper->date }} <a href="{{ URL::asset('storage/'.$epaper->file) }}" download>Download E-Paper</a></h3>
							@if (isset($epaper->file) && Storage::exists($epaper->file))
							<iframe src="{{ URL::asset('storage/'.$epaper->file) }}" width="100%" height="800px"></iframe>
							@else
							<a href="#">File Not Available</a>
							@endif
					@endif
			</div>
		</div> -->
	</div>
</section>
<!-- 2 -->
<section class="p-paper-section-two">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="py-3">
					<h3 class="mt-3"><b>प्रमुख शहर</b></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 3 -->
<section class="">
	<div class="container">
		<div class="row pb-4">
			<div class="col-lg-12">
				<div class="py-3">
					<h3 class="mt-3"><b>
					    <!--मैगजीन-->
					    E-Paper</b>
					    <span class="calender-filter">
					        <input type="date" class="text-control" placeholder="Enter Date" name="date" id="date" value="2024-01-06">
					    </span></h3>
				</div>
				<div class="row">
				    @php $datas = \App\Epaper::where('status','active')->orderBy('date','DESC')->get();  @endphp
				    @foreach($datas as $data)
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>{{$data->title}}</h4>
								
								<img src="{{ $data->image ?  URL::asset('storage/'.$data->image) : 'front/images/epaper1.png' }} " alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">{{date('d-M-Y',strtotime($data->date))}}</span>
								</div>
								<div class="mt-3">
									<a href="{{ URL::asset('storage/'.$data->file) }}" target="_blank"><i class="fas fa-eye"  style="font-size: 2rem; color:lightgray"></i> </a>
									<i class="fas fa-share-alt-square" onclick="copytoclipboard('{{ URL::asset('storage/'.$data->file) }}')" style="font-size: 2rem; color:lightgray"></i> 
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<script>
                                function copytoclipboard(text){
                              console.time('time1');
                            	var temp = $("<input>");
                              $("body").append(temp);
                             temp.val(text).select();
                              document.execCommand("copy");
                              alert("Copied Successfully!")
                              temp.remove();
                                console.timeEnd('time1');
                            }
                            </script>
				{{--	<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- 2 -->
			{{--	<div class="row">
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 3 -->
				<div class="row">
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 3 -->
				<div class="row">
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 4 -->
				<div class="row">
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card card-body mb-4">
							<div class="">
								<h4>lorem</h4>
								<img src="front/images/e-paper-banner.png" alt="" class="img-fluid"  width="300" />
							</div>
							<div class="d-flex justify-content-between border-top">
								<div class="mt-3">
									<span style="font-weight: 500;">15-12-2023</span>
								</div>
								<div class="mt-3">
									<i class="fas fa-share-alt-square" style="font-size: 2rem; color:lightgray"></i>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@include('front.footer-two')

