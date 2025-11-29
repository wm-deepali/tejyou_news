@include('admin.header')

<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Posts</li>
            <li class="breadcrumb-item active">Manage Comments</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content-main-body">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="card-block">
              <div class="table-responsive">
                <table class="table table-bordered table-fitems" id="manage-comment">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Date & Time</th>
                      <th>News Title</th>
                      <th>Comment By</th>
                      <th>Comment</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
  @if(isset($comments) && count($comments) > 0)
    @foreach($comments as $comment)
      @if($comment->post)
        @include('admin.comments-row', ['comment' => $comment, 'level' => 0, 'globalIndex' => $loop->index])
      @endif
    @endforeach
  @endif
</tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- VIEW COMMENT MODAL -->
<div class="modal fade" id="view-comment-modal" tabindex="-1" role="dialog" aria-labelledby="viewCommentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="view-comment-content">
      <!-- AJAX content will load here -->
    </div>
  </div>
</div>

@include('admin.footer')

<script>
$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$(document).ajaxStart(function(){ $("#loader").modal('show'); });
$(document).ajaxComplete(function(){ $("#loader").modal('hide'); });

$(document).ready(function(){

  $('#manage-comment').DataTable();

  // VIEW COMMENT
  $(document).on('click', '.view-comment', function(){
    let comment_id = $(this).attr('comment_id');
    $.ajax({
      url: `{{ URL::to('manage-comment/${comment_id}') }}`,
      type: 'GET',
      dataType: 'json',
      success: function(res){
        if(res.msgCode === '200'){
          $('#view-comment-content').html(res.html);
          $('#view-comment-modal').modal('show');
        } else {
          toastr.error(res.msgText);
        }
      },
      error: function(err){
        toastr.error(err.statusText);
      }
    });
  });

  // UPDATE COMMENT STATUS FROM MODAL
  $(document).on('click', '.update-comment-status', function(){
    let comment_id = $(this).attr('comment_id');
    let status = $('#comment-status-'+comment_id).val();
    $.ajax({
      url: `{{ URL::to('manage-comment/${comment_id}') }}`,
      type: 'PUT',
      data: { status: status },
      dataType: 'json',
      success: function(res){
        if(res.msgCode === '200'){
          toastr.success(res.msgText);
          location.reload();
        } else {
          toastr.error(res.msgText);
        }
      },
      error: function(err){
        toastr.error(err.statusText);
      }
    });
  });

  // DELETE COMMENT
  $(document).on('click', '.delete-comment', function(){
    if(!confirm('Are you sure to delete this comment?')) return;
    let comment_id = $(this).attr('comment_id');
    $.ajax({
      url: `{{ URL::to('manage-comment/${comment_id}') }}`,
      type: 'DELETE',
      dataType: 'json',
      context: this,
      success: function(res){
        if(res.msgCode === '200'){
          $(this).closest('tr').remove();
          toastr.success(res.msgText);
        } else {
          toastr.error(res.msgText);
        }
      },
      error: function(err){
        toastr.error(err.statusText);
      }
    });
  });

});
</script>
