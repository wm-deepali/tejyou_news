<div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Sub-Subcategory</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="edit-subsubcategory-form" subsubcategoryid="{{ $subsubcategory->id }}">

                <div class="form-group row">

                    {{-- Category --}}
                    <div class="col-sm-6">
                        <label class="label-control">Category</label>
                        <select class="text-control category-select" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($category->id == $subsubcategory->subcategory->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="text-danger" id="category_id-err"></div>
                    </div>

                    {{-- Subcategory --}}
                    <div class="col-sm-6">
                        <label class="label-control">Subcategory</label>
                        <select class="text-control subcategory-select" name="subcategory_id">
                            <option value="">Select Subcategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    @if($subcategory->id == $subsubcategory->subcategory_id) selected @endif>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="text-danger" id="subcategory_id-err"></div>
                    </div>

                </div>

                {{-- Sub-Subcategory Name --}}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control">Sub-Subcategory Name</label>
                        <input type="text" class="text-control" name="name" value="{{ $subsubcategory->name }}">
                        <div class="text-danger" id="name-err"></div>
                    </div>
                </div>

                {{-- Slug & Meta Title --}}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control">Slug</label>
                        <input type="text" class="text-control" name="slug" value="{{ $subsubcategory->slug }}">
                        <div class="text-danger" id="slug-err"></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="label-control">Meta Title</label>
                        <input type="text" class="text-control" name="metatitle" value="{{ $subsubcategory->metatitle }}">
                        <div class="text-danger" id="metatitle-err"></div>
                    </div>
                </div>

                {{-- Meta Description --}}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control">Meta Description</label>
                        <input type="text" class="text-control" name="metadescription" value="{{ $subsubcategory->metadescription }}">
                        <div class="text-danger" id="metadescription-err"></div>
                    </div>
                </div>

                {{-- Meta Keywords --}}
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="label-control">Meta Keywords</label>
                        <input type="text" class="text-control" name="metakeyword" value="{{ $subsubcategory->metakeyword }}">
                        <div class="text-danger" id="metakeyword-err"></div>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="form-action row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-dark btn-save edit-subsubcategory-btn" type="button">
                            Update Sub-Subcategory
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
