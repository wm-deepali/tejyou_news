@include('front.header')

<div class="videos">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
           @php $datas = \App\Post::select('id','video')->where('status','published')->where('video','!=',"")->orderBy('id','DESC')->get();  @endphp
        <div class="row">
          
           
                @foreach($datas as $data)
                <div class="col-md-4">
              <div class="card-body embed-responsive-4by3 mb-3">
                <img class="embed-responsive-item youtube-video"  data-videoid="{{$data['video']}}" src="https://img.youtube.com/vi/{{$data->video}}/0.jpg" />
              </div>
               </div>
              @endforeach
             
           
         
        </div>
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="videoFrame" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@include('front.footer')
<script>
    function openVideo(videoId) {
    $('#videoFrame').attr('src', 'https://www.youtube.com/embed/' + videoId+'?rel=0');
    $('#videoModal').modal('show');
}
$('.youtube-video').on('click', function() {
    openVideo($(this).data("videoid"));
});
</script>