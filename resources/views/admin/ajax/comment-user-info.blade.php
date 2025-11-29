<div class="modal-dialog">
  <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Comment Details</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">
      <div class="form-group row">
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Name</th>
                <td>{{ $comment->name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $comment->email }}</td>
              </tr>
              <tr>
                <th>Mobile No.</th>
                <td>{{ $comment->contact }}</td>
              </tr>
              <tr>
                <th>Comment</th>
                <td>{{ $comment->content }}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  <select id="comment-status-{{ $comment->id }}" class="form-control">
                    <option value="block" {{ $comment->status == 'block' ? 'selected' : '' }}>block</option>
                    <option value="active" {{ $comment->status == 'active' ? 'selected' : '' }}>active</option>
                  </select>
                  <button class="btn btn-primary mt-2 update-comment-status" comment_id="{{ $comment->id }}">
                    Update Status
                  </button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
