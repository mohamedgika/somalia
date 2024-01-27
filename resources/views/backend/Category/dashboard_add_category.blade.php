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
        <!-- Default box -->
        <div class="card card-cyan">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input name="name_category" type="text" id="name_category" class="form-control">
                                @error('name_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="image">Category Image</label>
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
                                <input type="text" name="inputs[{{ $i }}][name]" class="form-control">
                                @error('inputs.' . $i . '.input')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8" id="formfield2">
                                <input type="text" name="inputs[{{ $i }}][type]" class="form-control" placeholder="*(Only Write 'text' or 'number')">
                                @error('inputs.' . $i . '.type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-block btn-outline-success">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="controls">
                    <button class="btn btn-success" onclick="add()"><i class="fa fa-plus"></i>Text Field</button>
                    <button class="btn btn-success" onclick="add_number()"><i class="fa fa-plus"></i>Number Field</button>
                    <button class="btn btn-danger" onclick="remove()"><i class="fa fa-minus"></i>Remove</button>
                </div>
                <br>

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
        var formfield1 = document.getElementById('formfield1');
        var formfield2 = document.getElementById('formfield2');
        var counter = 0;


        function add() {
            counter++;

            var newField1 = document.createElement('input');
            newField1.setAttribute('type', 'text');
            newField1.setAttribute('name', 'inputs[' + counter + '][name]');
            newField1.setAttribute('class', 'form-control');

            var newField2 = document.createElement('input');
            newField2.setAttribute('type', 'text');
            newField2.setAttribute('name', 'inputs[' + counter + '][type]');
            newField2.setAttribute('value', 'text');
            newField2.setAttribute('class', 'form-control');

            formfield1.appendChild(newField1);
            formfield2.appendChild(newField2);
        }

        function add_number() {
            counter++;

            var newField1 = document.createElement('input');
            newField1.setAttribute('type', 'text');
            newField1.setAttribute('name', 'inputs[' + counter + '][name]');
            newField1.setAttribute('class', 'form-control');

            var newField2 = document.createElement('input');
            newField2.setAttribute('type', 'text');
            newField2.setAttribute('name', 'inputs[' + counter + '][type]');
            newField2.setAttribute('value', 'number');
            newField2.setAttribute('class', 'form-control');

            formfield1.appendChild(newField1);
            formfield2.appendChild(newField2);
        }

        function remove() {
            var input_tags1 = formfield1.getElementsByTagName('input');
            var input_tags2 = formfield2.getElementsByTagName('input');

            if (input_tags1.length > 1 && input_tags2.length > 1) {
                formfield1.removeChild(input_tags1[(input_tags1.length) - 1]);
                formfield2.removeChild(input_tags2[(input_tags2.length) - 1]);
                counter--;
            }
        }
    </script>
@endsection
