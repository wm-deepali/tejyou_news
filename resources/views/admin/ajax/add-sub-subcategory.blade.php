<div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Sub Sub Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <form id="add-subsubcategory-form">

                <div class="form-group row">

                    <!-- Category -->
                    <div class="col-sm-6">
                        <label class="label-control">Category</label>
                        <select class="text-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @if (isset($categories) && count($categories) > 0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="text-danger" id="category_id-err"></div>
                    </div>

                    <!-- Sub Category -->
                    <div class="col-sm-6">
                        <label class="label-control">Sub Category</label>
                        <select class="text-control" name="subcategory_id" id="subcategory_id">
                            <option value="">Select Sub Category</option>
                        </select>
                        <div class="text-danger" id="subcategory_id-err"></div>
                    </div>

                </div>

                <div class="form-group row">
                    <!-- Sub Sub Category Name -->
                    <div class="col-sm-6">
                        <label class="label-control">Sub Sub Category</label>
                        <input type="text" class="text-control" placeholder="Enter Sub Sub Category Name" name="name">
                        <div class="text-danger" id="name-err"></div>
                    </div>

                    <!-- Slug -->
                    <div class="col-sm-6">
                        <label class="label-control">Slug</label>
                        <input type="text" class="text-control" placeholder="Enter Slug URL" name="slug">
                        <div class="text-danger" id="slug-err"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Meta Title -->
                    <div class="col-sm-6">
                        <label class="label-control">Meta Title</label>
                        <input type="text" class="text-control" placeholder="Enter Meta Title" name="metatitle">
                        <div class="text-danger" id="metatitle-err"></div>
                    </div>

                    <!-- Meta Description -->
                    <div class="col-sm-6">
                        <label class="label-control">Meta Description</label>
                        <input type="text" class="text-control" placeholder="Enter Meta Description" name="metadescription">
                        <div class="text-danger" id="metadescription-err"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Meta Keywords -->
                    <div class="col-sm-12">
                        <label class="label-control">Meta Keywords</label>
                        <input type="text" class="text-control" placeholder="Enter Meta Keywords" name="metakeyword">
                        <div class="text-danger" id="metakeyword-err"></div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="form-action row">
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn btn-dark btn-save add-subsubcategory-btn">
                            Add Sub Sub Category
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
