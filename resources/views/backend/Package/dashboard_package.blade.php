@extends('layouts.backend.index')

@section('title')
    Dashboard | Package
@endsection

@section('css')
    @include('backend.Package.dashboard_head_package')
@endsection

@section('after_next')
    Package
    <a href="{{ route('package.create') }}"><input type="submit" class="ml-3 btn btn-success" value="Add Package"></a>
@endsection

@section('next')
    Package
@endsection

@section('content')
    @include('backend.Package.dashboard_package_massage')

    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Package</h3>

            </div>
            <div class="card-body">

                <table id="test" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditPackage{{ $package->id }}">
                                        <i class="fa fa-eye"></i>
                                        Preview
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeletePackage{{ $package->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Package.dashboard_edit_package')
                            @include('backend.Package.dashboard_delete_package')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
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
    @include('backend.Package.dashboard_end_package')
@endsection
