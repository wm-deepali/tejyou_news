@if(isset($datas) && count($datas)>0)
@foreach($datas as $data)
<div class="col-lg-3">
	<div class="card card-body mb-4">
		<div class="">
			<h4>{{$data->title}}</h4>
			
			<img src="{{ $data->image ?  URL::asset('storage/'.$data->image) : 'front/images/epaper2.png' }} " alt="" class="img-fluid"  width="300" />
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
@else
<div class="col-lg-12">
	<div class="card card-body mb-4">
		<div class="">
			<h4>No Paper Found</h4>
			
			
		</div>
		
	</div>
</div>

@endif