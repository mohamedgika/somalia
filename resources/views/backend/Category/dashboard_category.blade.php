@extends('layouts.backend.index')

@section('title')
    Dashboard | Category
@endsection

@section('css')
    @include('backend.Category.dashboard_head_category')
@endsection

@section('after_next')
    Category
    <a href="{{ route('category.create') }}"><input type="submit" class="btn btn-success ml-3" value="Add Category"></a>
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
                <h3 class="card-title">Show Category And SubCategory</h3>

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

                <table id="example2" class="table table-striped" style="width:100%">
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
                                <td>{{ $category->name }}
                                </td>
                                @foreach ($category->subCategories as $sub)
                                    <td>{{ $sub->name }}
                                    </td>
                                @endforeach
                                <td>
                                    <img src="{{ $category->getFirstMediaUrl('category') }}" width="75px"><br />
                                </td>
                                @foreach ($category->subCategories as $sub)
                                    <td>
                                        <img src="{{ $sub->getFirstMediaUrl('subcategory') }}" width="75px"><br />
                                    </td>
                                @endforeach
                                <td>
                                    @foreach ($inputs as $input)
                                        @if (is_array($input))
                                            <p>
                                                Name: {{ $input['name'] ?? '' }}, Type: {{ $input['type'] ?? '' }}
                                            </p>
                                        @elseif (is_object($input))
                                            <p>
                                                Name: {{ $input->name ?? '' }}, Type: {{ $input->type ?? '' }}
                                            </p>
                                        @endif
                                    @endforeach
                                <td>
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
