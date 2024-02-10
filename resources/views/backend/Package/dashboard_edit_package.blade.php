<div class="modal fade" id="EditPackage{{ $package->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Package {{ $package->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" value="{{ $package->name }}" type="text" id="name"
                                    class="form-control">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="summernote_slider_edit">Description</label>
                                <!-- Hidden input field to store the content of the summernote div -->
                                <!-- summernote div to display the description content -->
                                <textarea class="summernote" name="desc">{{ $package->desc }}</textarea>
                                @error('desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Ads:
                        </div>
                        <div class="col-md-4">
                            Price:
                        </div>
                        <div class="col-md-4">
                            Month:
                        </div>
                    </div>
                    @foreach ($package->package_details as $index => $it)
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="package_details[{{ $index }}][ads]"
                                    class="form-control" value="{{ $it['ads'] }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="package_details[{{ $index }}][price]"
                                    class="form-control" value="{{ $it['price'] }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="package_details[{{ $index }}][month]"
                                    class="form-control" value="{{ $it['month'] }}">
                            </div>
                        </div>
                    @endforeach

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
