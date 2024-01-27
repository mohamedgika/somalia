@extends('layouts.backend.index')

@section('title')
    Dashboard | Slider
@endsection

@section('css')
    @include('backend.Slider.dashboard_head_slider')
@endsection

@section('after_next')
    Slider
    <a href="{{ route('slider.create') }}"><input type="submit" class="ml-3 btn btn-success" value="Add Slider"></a>
@endsection

@section('next')
    Slider
@endsection

@section('content')
    {{-- @include('backend.Category.dashboard_category_massage') --}}

    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Slider</h3>

            </div>
            <div class="card-body">

                <table id="test" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($slider as $s)
                            <tr>
                                <td>{{ $s->title }}</td>
                                <td><img src="{{ $s->getFirstMediaUrl('slider') }}" width="75px"><br /></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditSlider{{ $s->id }}">
                                        <i class="fa fa-eye"></i>
                                        Preview
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteSlider{{ $s->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            {{-- @include('backend.Category.dashboard_edit_category')
                            @include('backend.Category.dashboard_delete_category') --}}
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
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
    @include('backend.Slider.dashboard_end_slider')
@endsection
