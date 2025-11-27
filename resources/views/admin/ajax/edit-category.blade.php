<div class="modal-dialog">
  <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Edit Category</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
      <form action="" id="edit-category-form" categoryid={{ $category->id }} enctype="multipart/form-data">
        @method('PUT')
        <div class="form-group row">
          <div class="col-sm-6">
            <label class="label-control">Category</label>
            <input type="text" class="text-control" placeholder="Enter Category Name" name="name" id="name"
              value="{{ $category->name }}">
            <div class="text-danger" id="name-err"></div>
          </div>
          <div class="col-sm-6">
            <label class="label-control">Settings</label><br>

            <label>
              <input type="checkbox" name="hassubcategory" value="yes" id="hassubcategory" @if (isset($category) && $category->hassubcategory == 'yes') checked @endif>
              Has Sub Category
            </label><br>

            <label>
              <input type="checkbox" name="showonheader" value="yes" id="showonheader" @if (isset($category) && $category->showonheader == 'yes') checked @endif>
              Show on Header
            </label><br>

            <label>
              <input type="checkbox" name="showonfooter" value="yes" id="showonfooter" @if (isset($category) && $category->showonfooter == 'yes') checked @endif>
              Show on Footer
            </label><br>

            <label>
              <input type="checkbox" name="show_in_menu" value="yes" id="show_in_menu" @if (isset($category) && $category->show_in_menu == 'yes') checked @endif>
              Show Posts in Menu
            </label>
          </div>

        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <label class="label-control">Slug</label>
            <input type="text" class="text-control" placeholder="Enter URL Slug" name="slug" id="slug"
              value="{{ $category->slug }}">
            <div class="text-danger" id="slug-err"></div>
          </div>
          <div class="col-sm-6">
            <label class="label-control">Meta Title</label>
            <input type="text" class="text-control" placeholder="Enter Meta Title" name="metatitle" id="metatitle"
              value="{{ $category->metatitle }}">
            <div class="text-danger" id="metatitle-err"></div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label class="label-control">Meta Description</label>
            <input type="text" class="text-control" placeholder="Enter Meta Description" name="metadescription"
              id="metadescription" value="{{ $category->metadescription }}">
            <div class="text-danger" id="metadescription-err"></div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label class="label-control">Meta Keywords</label>
            <input type="text" class="text-control" placeholder="Enter Meta Keywords" name="metakeyword"
              id="metakeyword" value="{{ $category->metakeyword }}">
            <div class="text-danger" id="metakeyword-err"></div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <label class="label-control">Image</label>
            <input type="file" class="text-control" name="image" id="image" onchange="preview()">
            <div class="text-danger" id="image-err"></div>
          </div>
          <div class="col-md-6">
            @if($category->image)
              <img class="frame" src="{{url('') . "/storage/" . $category->image}}" width="100px" height="100px" />
            @else
              <img class="frame" src="" width="100px" height="100px" style="display:none" />
            @endif

          </div>
        </div>
        <div class="form-action row">
          <div class="col-sm-12 text-center">
            <button class="btn btn-dark btn-save edit-category-btn" type="button">Update Category</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function preview() {
    $(".frame").attr("src", URL.createObjectURL(event.target.files[0]));
    $(".frame").removeAttr("style")
  }
</script>