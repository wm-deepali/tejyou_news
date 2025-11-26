@include( 'front.header' )
<style type="text/css">
    .t-head {
    border-bottom: 2px solid #333;
    color: #333;
    padding: 7px;
    display: inline-block;
    margin: 0;
    font-size: 1.2em;
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
										<li class="breadcrumb-item active" aria-current="page">Our Team</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">Our Team</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row text-center">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="">
							<h3 class="mb-3">Patron</h3>
							<div class="card" style="background: #f8f8fb;">
								<div class="card-body">
									<img src="http://127.0.0.1:8000/storage/teams/t4MlqQcxHddhpl7L9vWqRs8WUW4euOLy0ryb8URW.jpeg" alt="" class="img-fluid team-img" / >
									<div class="pt-3">
										<h5>MR. NITESH SEXENA</h5>
										<p class="mb-0">PATRON</p>
										<p class="mb-0">Lucknow (Uttar Pradesh)</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="">
							<h3 class="mb-3">Editor</h3>
							<div class="card" style="background: #f8f8fb;">
								<div class="card-body">
									<img src="http://127.0.0.1:8000/storage/teams/m0bZMXWErVfYp98jHrROzM3CBQ7xYTZKooCzaDq9.jpeg" alt="" class="img-fluid team-img" />
									<div class="pt-3">
										<h5>MR. MOHD. RAIS</h5>
										<p class="mb-0">EDITORS </p>
										<p class="mb-0">Lucknow (Uttar Pradesh)</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- @if(isset($categories) && count($categories)>0)
					@foreach($categories as $category)
					<div class="row justify-content-center">
						<div class="col-sm-12 mb-4 text-center">
							<h4 class="t-head">{{ $category->name }}</h4>
						</div>
						
						@if(isset($category->teams) && count($category->teams)>0)
						@foreach($category->teams as $team)
						<div class="col-sm-3 mb-4">
							<div class="team-main">
								<div class="team-img">
									@if(isset($team->image) && Storage::exists($team->image))
									<img src="{{ URL::asset('storage/'.$team->image) }}" alt="{{ $team->name }}" class="img-fluid">
									@endif
								</div>
								<div class="team-contnt">
									<h3>{{ $team->name }}</h3>
									<h4>{{ $team->designation }}</h4>
									<h4>{{ $team->city->name }} ({{ $team->state->name }})</h4>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
					@endforeach
					@endif -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 2 -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">Sub Editors</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Patron</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/VNEeu9wSc5Ah7DhrwA55GgqHo9fb37fJXqL7wu1j.jpeg" alt="" class="img-fluid team-img" / >
							<div class="pt-3">
								<h5>MR. NITESH SEXENA</h5>
								<p class="mb-0">PATRON</p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Editor</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/XzYcjMBKPL2AEslnJMP4jJHetjD9XWZZFry5AfbN.jpeg" alt="" class="img-fluid team-img" />
							<div class="pt-3">
								<h5>MR. MOHD. RAIS</h5>
								<p class="mb-0">EDITORS </p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 3 -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">MEDIA ADVISOR</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Patron</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/4qwIYL7zcYpuVvVMWsbHA55AsqLHFJjHy3poQI0g.jpeg" alt="" class="img-fluid team-img" / >
							<div class="pt-3">
								<h5>MR. NITESH SEXENA</h5>
								<p class="mb-0">PATRON</p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 4 -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">SPECIAL CORRESPONDENCE DESK EDITOR</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Patron</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/KfBCXuAxNINbtT7E7c6SNEnxMyO6N3h11LXwnNdm.jpeg" alt="" class="img-fluid team-img" / >
							<div class="pt-3">
								<h5>MR. NITESH SEXENA</h5>
								<p class="mb-0">PATRON</p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Editor</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/m0bZMXWErVfYp98jHrROzM3CBQ7xYTZKooCzaDq9.jpeg" alt="" class="img-fluid team-img" />
							<div class="pt-3">
								<h5>MR. MOHD. RAIS</h5>
								<p class="mb-0">EDITORS </p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 5 -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">BUREAUS/ ASSTT. BUREAU</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Patron</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/cSmhl0kv2ag4WcqjvrxWMirRWcwJpcE8aQEpOKd1.jpeg" alt="" class="img-fluid team-img" / >
							<div class="pt-3">
								<h5>MR. NITESH SEXENA</h5>
								<p class="mb-0">PATRON</p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="">
					<!-- <h3 class="mb-3">Editor</h3> -->
					<div class="card" style="background: #f8f8fb;">
						<div class="card-body">
							<img src="http://127.0.0.1:8000/storage/teams/6UwomKfDaAxqunmHMBWr8HjSrTP1LYPPSABVvUOz.jpeg" alt="" class="img-fluid team-img" />
							<div class="pt-3">
								<h5>MR. MOHD. RAIS</h5>
								<p class="mb-0">EDITORS </p>
								<p class="mb-0">Lucknow (Uttar Pradesh)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- 6 -->
<section class="py-4" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h3 class="text-center">Our Team</h3>
				<hr style=" width: 200px;background: red; height: 1px;">
			</div>
		</div>
	</div>
</section>
<section class="our-teams pb-5" style="background: #f8f8fb;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row text-center">
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/Q0bRExHhdLrGE8ua3eSwtoULJOExXrRJcwYWHjCz.jpeg" alt="" class="img-fluid team-img" / >
								<div class="pt-3">
									<h5>MR. NITESH SEXENA</h5>
									<p class="mb-0">PATRON</p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/Nc6zCDadDMv4Px0W6D3h7nFxh3Q4V2xe0hcz6rtX.jpeg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/v6uzhzs1f2LnXbbPx5dt3EGhny0Vioxkhog3ASM0.jpeg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/WcpthrkjY5phdgXi2BEEemDYOWQqmFHUQ5Ny0iBg.jpeg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="row">
			<div class="col-lg-12">
				<div class="row text-center">
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/A6NnNUymq7ZpIjGKJZ8KfYlBOGsZrohUS3YPXbAj.jpeg" alt="" class="img-fluid team-img" / >
								<div class="pt-3">
									<h5>MR. NITESH SEXENA</h5>
									<p class="mb-0">PATRON</p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/lTTaG5vJkqpZNfgorrBrPZK2rMDyJHsoNpNWb65i.jpeg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/JBNKDjcBsSTJd397xepcnsPFylc8ncmYABgql8CZ.jpeg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
						<div class="card" style="background: #f8f8fb;">
							<div class="card-body">
								<img src="http://127.0.0.1:8000/storage/teams/5aZ1GBoHRZqJRlqVsBxDQ19I8UQsTBy18PVrY4LG.jpg" alt="" class="img-fluid team-img" />
								<div class="pt-3">
									<h5>MR. MOHD. RAIS</h5>
									<p class="mb-0">EDITORS </p>
									<p class="mb-0">Lucknow (Uttar Pradesh)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@include( 'front.footer' )