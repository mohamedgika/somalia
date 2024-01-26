@extends('layouts.backend.index')

@section('title')
    Dashboard | SubCategory
@endsection

@section('css')
    @include('backend.Category.SubCategory.dashboard_head_subcategory')
@endsection

@section('after_next')
    SubCategory
    <input type="submit" class="ml-3 btn btn-success" value="Add SubCategory" data-toggle="modal" data-target="#AddSubCategory">
    @include('backend.Category.SubCategory.dashboard_add_subcategory')
@endsection

@section('next')
    SubCategory
@endsection

@section('content')
    @include('backend.Category.SubCategory.dashboard_subcategory_massage')

    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">SubCategory</h3>

            </div>
            <div class="card-body">

                <table id="test" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>SubCategory</th>
                            <th>Category</th>
                            <th>SubCategory Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->name }}</td>

                                <td>
                                    {{ $subcategory->category->name }}
                                </td>

                                <td>
                                    <img src="{{ $subcategory->getFirstMediaUrl('subcategory') }}" width="75px"><br />
                                </td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditCategory{{ $subcategory->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteCategory{{ $subcategory->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            {{-- @include('backend.Category.SubCategory.dashboard_edit_subcategory')
                            @include('backend.Category.SubCategory.dashboard_delete_subcategory') --}}
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SubCategory</th>
                            <th>Category</th>
                            <th>SubCategory Image</th>
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
    @include('backend.Category.SubCategory.dashboard_end_subcategory')
@endsection
