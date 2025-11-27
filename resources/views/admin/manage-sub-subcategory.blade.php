@include('admin.header')

<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
            <button class="btn btn-dark btn-save add-subsubcategory"><i class="fas fa-plus"></i> Add Sub Sub Category</button>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item active">Manage Sub Sub Category</li>
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
                <table class="table table-bordered table-fitems">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Sub Sub Category</th>
                      <th>URL Slug</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($subsubcategories as $subsubcategory)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $subsubcategory->subcategory->category->name }}</td>
                      <td>{{ $subsubcategory->subcategory->name }}</td>
                      <td>{{ $subsubcategory->name }}</td>
                      <td>{{ $subsubcategory->slug }}</td>
                      <td class="status">{{ $subsubcategory->status }}</td>
                      <td>
                        <ul class="action">
                          <li><a href="javascript:void(0)" class="edit-subsubcategory" subsubcategoryid="{{ $subsubcategory->id }}"><i class="fas fa-pencil-alt"></i></a></li>
                          <li><a href="javascript:void(0)" class="change-status-subsubcategory" subsubcategoryid="{{ $subsubcategory->id }}"><i class="fas fa-times"></i></a></li>
                          <li><a href="javascript:void(0)" class="delete-subsubcategory" subsubcategoryid="{{ $subsubcategory->id }}"><i class="fas fa-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach
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

{{-- Modals --}}
<div class="modal" id="add-subsubcategory"></div>
<div class="modal" id="edit-subsubcategory"></div>

@include('admin.footer')

<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function(){

  /* -------------------------
     OPEN ADD MODAL
  --------------------------*/
  $(document).on("click",".add-subsubcategory",function(){
      $.ajax({
          url:"{{ URL::to('manage-sub-subcategory/create') }}",
          type:"get",
          dataType:"json",
          success:function(result){
              if(result.msgCode==='200'){
                  $("#add-subsubcategory").html(result.html);
                  $("#add-subsubcategory").modal('show');
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  /* -------------------------
     SAVE SUB SUB CATEGORY
  --------------------------*/
  $(document).on('click','.add-subsubcategory-btn',function(){
      $('.text-danger').html('');

      $.ajax({
          url:"{{ URL::to('manage-sub-subcategory') }}",
          type:'POST',
          dataType:'json',
          data:$('#add-subsubcategory-form').serialize(),
          success:function(result){
              if(result.msgCode === '200'){
                  toastr.success(result.msgText);
                  location.reload();
              } else if(result.msgCode === '401'){
                  $.each(result.errors,function(field,msg){
                      $('#' + field + '-err').html(msg[0]);
                  });
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  /* -------------------------
     OPEN EDIT MODAL
  --------------------------*/
  $(document).on("click",".edit-subsubcategory",function(){
      let id = $(this).attr('subsubcategoryid');
      $.ajax({
          url:`{{ URL::to('manage-sub-subcategory/${id}/edit') }}`,
          type:"get",
          dataType:"json",
          success:function(result){
              if(result.msgCode==='200'){
                  $("#edit-subsubcategory").html(result.html);
                  $("#edit-subsubcategory").modal('show');
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  /* -------------------------
     UPDATE SUB SUB CATEGORY
  --------------------------*/
  $(document).on('click','.edit-subsubcategory-btn',function(){
      $('.text-danger').html('');
      let id = $('#edit-subsubcategory-form').attr('subsubcategoryid');

      $.ajax({
          url:`{{ URL::to('manage-sub-subcategory/${id}') }}`,
          type:'PUT',
          dataType:'json',
          data:$('#edit-subsubcategory-form').serialize(),
          success:function(result){
              if(result.msgCode === '200'){
                  toastr.success(result.msgText);
                  location.reload();
              } else if(result.msgCode === '401'){
                  $.each(result.errors,function(field,msg){
                      $('#' + field + '-err').html(msg[0]);
                  });
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  /* -------------------------
     DELETE SUB SUB CATEGORY
  --------------------------*/
  $(document).on("click",".delete-subsubcategory",function(){
      let id = $(this).attr('subsubcategoryid');
      $.ajax({
          url:`{{ URL::to('manage-sub-subcategory/${id}') }}`,
          type:"DELETE",
          dataType:"json",
          context:this,
          success:function(result){
              if(result.msgCode==='200'){
                  $(this).closest('tr').remove();
                  toastr.success(result.msgText);
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  /* -------------------------
     CHANGE STATUS
  --------------------------*/
  $(document).on('click','.change-status-subsubcategory',function(){
      let id = $(this).attr('subsubcategoryid');
      let status = $(this).closest('tr').find('.status').html();

      $.ajax({
          url:`{{ URL::to('change-sub-subcategory-status/${id}/${status}') }}`,
          type:'PUT',
          dataType:'json',
          context:this,
          success:function(result){
              if(result.msgCode==='200'){
                  $(this).closest('tr').find('.status').html(result.status);
                  toastr.success(result.msgText);
              } else {
                  toastr.error(result.msgText);
              }
          }
      });
  });

  // Load Subcategories When Category Changes
$(document).on("change", "#category_id", function () {
    let category_id = $(this).val();

    $("#subcategory_id").html('<option value="">Loading...</option>');

    $.ajax({
        url: "{{ URL::to('get-subcategories') }}/" + category_id,
        type: "GET",
        success: function (response) {
            $("#subcategory_id").html('<option value="">Select Sub Category</option>');
            $.each(response, function (i, subcat) {
                $("#subcategory_id").append(`<option value="${subcat.id}">${subcat.name}</option>`);
            });
        }
    });
});


});
</script>
