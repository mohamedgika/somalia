@extends('layouts.backend.index')

@section('title')
    Add Package
@endsection

@section('css')
@endsection

@section('after_next')
    Dashboard | Add Package
@endsection

@section('next')
    Add Package
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-cyan">
            <div class="card-header">
                <h3 class="card-title">Add Package</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="name">Package</label>
                                <input name="name" type="text" id="name" class="form-control">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="summernote_slider">Description</label>
                                <textarea class="summernote" name="desc"></textarea>

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
                    @for ($i = 0; $i < 1; $i++)
                        <div class="row">
                            <div class="col-md-4" id="formfield1">
                                <input type="text" name="packages[{{ $i }}][ads]" class="form-control" placeholder="*(Number Of Ads)">
                                @error('package.' . $i . '.ads')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4" id="formfield2">
                                <input type="text" name="packages[{{ $i }}][price]" class="form-control" placeholder="*(Price)">
                                @error('package.' . $i . '.price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4" id="formfield3">
                                <input type="text" name="packages[{{ $i }}][month]" class="form-control" placeholder="*(Number Of Months)">
                                @error('package.' . $i . '.month')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-block btn-success">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="controls">
                    <button class="btn btn-success" onclick="add()"><i class="fa fa-plus"></i>Add More Ads and Price and Mounth</button>
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
        var formfield3 = document.getElementById('formfield3');
        var counter = 0;


        function add() {
            counter++;

            var newField1 = document.createElement('input');
            newField1.setAttribute('name', 'packages[' + counter + '][ads]');
            newField1.setAttribute('class', 'form-control');
            newField1.setAttribute('placeholder', '*(Number Of Ads)');

            var newField2 = document.createElement('input');
            newField2.setAttribute('name', 'packages[' + counter + '][price]');
            newField2.setAttribute('class', 'form-control');
            newField2.setAttribute('placeholder', '*(Price)');


            var newField3 = document.createElement('input');
            newField3.setAttribute('name', 'packages[' + counter + '][month]');
            newField3.setAttribute('class', 'form-control');
            newField3.setAttribute('placeholder', '*(Number Of Months)');

            formfield1.appendChild(newField1);
            formfield2.appendChild(newField2);
            formfield3.appendChild(newField3);
        }


        function remove() {
            var package_tags1 = formfield1.getElementsByTagName('input');
            var package_tags2 = formfield2.getElementsByTagName('input');
            var package_tags3 = formfield3.getElementsByTagName('input');


            if (package_tags1.length > 1 && package_tags2.length > 1 && package_tags3.length > 1) {
                formfield1.removeChild(package_tags1[(package_tags1.length) - 1]);
                formfield2.removeChild(package_tags2[(package_tags2.length) - 1]);
                formfield3.removeChild(package_tags3[(package_tags3.length) - 1]);
                counter--;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
