<div class="modal fade" id="EditCategory{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category {{ $category->title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input name="name_category" value="{{ $category->name }}" type="text" id="name_category" class="form-control">
                                @error('name_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_subcategory">SubCategory</label>
                                @foreach ($category->subCategories as $sub )
                                    <input name="name_subcategory" value="{{ $sub->name }}" type="text" id="name_subcategory"
                                @endforeach
                                    class="form-control">
                                @error('name_subcategory')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Category Image</label>
                                <img src="{{ $category->getFirstMediaUrl('category') }}" width="75px"><br />
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image_category" type="file" class="custom-file-input"
                                            id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">SubCategory Image</label>
                                @foreach ($category->subCategories as $sub)
                                <img src="{{ $sub->getFirstMediaUrl('subcategory') }}" width="75px"><br />
                                @endforeach
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image_subcategory" type="file" class="custom-file-input"
                                            id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image_subcategory')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Input:
                        </div>
                        <div class="col-md-8">
                            Type:
                        </div>
                    </div>
                    @for ($i = 0; $i < 1; $i++)
                        <div class="row">
                            <div class="col-md-4" id="formfield1">
                                <input type="text" value="inputs[{{ $i }}][name]" class="form-control">
                                @error('inputs.' . $i . '.input')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8" id="formfield2">
                                <input type="text" value="inputs[{{ $i }}][type]" class="form-control">
                                @error('inputs.' . $i . '.type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
