@extends('layouts.backend.index')

@section('title')
    Dashboard | Category
@endsection

@section('css')
    @include('backend.Category.dashboard_head_category')
@endsection

@section('after_next')
    Category
    <a href="{{ route('category.create') }}"><input type="submit" class="ml-3 btn btn-success" value="Add Category"></a>
@endsection

@section('next')
    Category
@endsection

@section('content')
    @include('backend.Category.dashboard_category_massage')

    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Category</h3>

            </div>
            <div class="card-body">

                <table id="test" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Category Image</th>
                            <th>SubCategory Image</th>
                            <th>Inputs</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>

                                <td>
                                    @foreach ($category->subCategories as $sub)
                                        {{ $sub->name }}
                                    @endforeach
                                </td>

                                <td>
                                    <img src="{{ $category->getFirstMediaUrl('category') }}" width="75px"><br />
                                </td>

                                <td>
                                    @foreach ($category->subCategories as $sub)
                                        <img src="{{ $sub->getFirstMediaUrl('subcategory') }}" width="75px"><br />
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($category->inputs as $input)
                                        @foreach ($input->inputs as $it)
                                            <p><b>Input</b> : {{ $it['name'] }} - <b>Type</b>: {{ $it['type'] }}</p>
                                        @endforeach
                                    @endforeach

                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditCategory{{ $category->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteCategory{{ $category->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Category.dashboard_edit_category')
                            @include('backend.Category.dashboard_delete_category')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Category Image</th>
                            <th>SubCategory Image</th>
                            <th>Inputs</th>
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
    @include('backend.Category.dashboard_end_category')
@endsection
