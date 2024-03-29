@extends('layouts.backend.index')

@section('title')
    Add Blog
@endsection

@section('css')
@endsection

@section('after_next')
    Dashboard | Add Blog
@endsection

@section('next')
    Add Blog
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-cyan">
            <div class="card-header">
                <h3 class="card-title">Add Blog</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" id="title" class="form-control">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="image">Blog Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input"
                                            id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="author">Author (Optional)</label>
                                <input name="author" type="text" id="author" class="form-control">
                                @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="summernote_slider">Content</label>
                                <textarea class="summernote" name="content"></textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-block btn-success">
                            </div>
                        </div>
                    </div>
                </form>
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
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
