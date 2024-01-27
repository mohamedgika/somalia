@extends('layouts.backend.index')

@section('title')
    Dashboard | Blog
@endsection

@section('css')
    @include('backend.Blog.dashboard_head_blog')
@endsection

@section('after_next')
    Blog
    <a href="{{ route('blog.create') }}"><input type="submit" class="ml-3 btn btn-success" value="Add Blog"></a>
@endsection

@section('next')
    Blog
@endsection

@section('content')
    {{-- @include('backend.Category.dashboard_category_massage') --}}

    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Blog</h3>

            </div>
            <div class="card-body">

                <table id="test" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blog as $b)
                            <tr>
                                <td>{{ $b->title }}</td>
                                <td>{{ $b->author }}</td>
                                <td><img src="{{ $b->getFirstMediaUrl('blog') }}" width="75px"><br /></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditBlog{{ $b->id }}">
                                        <i class="fa fa-eye"></i>
                                        Preview
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteBlog{{ $b->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Blog.dashboard_edit_blog')
                            @include('backend.Blog.dashboard_delete_blog')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
    @include('backend.Blog.dashboard_end_blog')
@endsection
