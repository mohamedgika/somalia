@extends('layouts.backend.index')

@section('title')
    Add Category
@endsection

@section('css')

@endsection

@section('after_next')
    Dashboard | Add Category
@endsection

@section('next')
    Add Category
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        @include('backend.Category.dashboard_category_massage')
        <!-- Default box -->
        <div class="card card-cyan">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input name="en_title" type="text" id="en_title" class="form-control">
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategory">SubCategory</label>
                                <input name="subcategory" type="text" id="subcategory" class="form-control">
                                @error('subcategory')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Category Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">SubCategory Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="properties">Inputs</label>
                        <div class="row">
                            <div class="col-md-4">
                                Input:
                            </div>
                            <div class="col-md-8">
                                Type:
                            </div>
                        </div>
                        <div class="row">

                            <div id="formfield">
                                <input type="text" name="text" class="text" size="50" placeholder="Name" required>
                                <input type="text" name="text" class="text" size="50" placeholder="Email" required>
                                <input type="text" name="text" class="text" size="50" placeholder="Optional Field">
                              </div>
                              <input name="submit" type="Submit" value="Submit">
                            {{-- <div class="col-md-4">
                                    <input type="text" name="inputs[{{ $i }}][input]" class="form-control"
                                        value="{{ old('inputs[' . $i . '][input]') }}">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="inputs[{{ $i }}][type]" class="form-control"
                                        value="{{ old('inputs[' . $i . '][type]') }}">
                                </div> --}}
                        </div>
                        @error('inputs')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>




                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-block btn-outline-success">
                            </div>
                        </div>
                    </div>

                </form>
                <div class="controls">
                    <button class="add" onclick="add()"><i class="fa fa-plus"></i>Add</button>
                    <button class="remove" onclick="remove()"><i class="fa fa-minus"></i>Remove</button>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection


@section('js')
<script>
    var formfield = document.getElementById('formfield');

    function add() {
        var newField = document.createElement('input');
        newField.setAttribute('type', 'text');
        newField.setAttribute('name', 'text');
        newField.setAttribute('class', 'text');
        newField.setAttribute('siz', 50);
        newField.setAttribute('placeholder', 'Optional Field');
        formfield.appendChild(newField);
    }

    function remove() {
        var input_tags = formfield.getElementsByTagName('input');
        if (input_tags.length > 2) {
            formfield.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }
</script>
@endsection
