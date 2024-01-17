@extends('layouts.backend.index')

@section('title')
    Dashboard | Contact Us
@endsection

@section('css')
    @include('backend.ContactUs.dashboard_head_contact')
@endsection

@section('after_next')
    Contact Us <button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#CreateContact">
        Add ContactUs
    </button>
    @include('backend.ContactUs.dashboard_add_contact')
@endsection

@section('next')
    Contact Us
@endsection


@section('content')
    <!--For Add Setting Successfully-->
    <!-- Main content -->
    @if (session()->has('ActiveAds'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ session()->get('ActiveAds') }}</strong>
        </div>
    @endif
    @if (session()->has('edit_ads'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ session()->get('edit_ads') }}</strong>
        </div>
    @endif
    <section class="content">

        <!-- Default box -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Ads</h3>

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
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                            {{-- @can('view', $posts)
                                <th>{{ __('backend/dashboard_post.action') }}</th>
                            @endcan --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contacts as $con)
                            <tr>
                                <td>{{ $con->phone }}</td>
                                <td>{{ $con->email }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditContact{{ $con->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteContact{{ $con->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.ContactUs.dashboard_delete_contact')
                            @include('backend.ContactUs.dashboard_edit_contact')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                            {{-- @can('view', $posts)
                                <th>{{ __('backend/dashboard_post.action') }}</th>
                            @endcan --}}
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection


@section('js')
    @include('backend.ContactUs.dashboard_end_contact')
@endsection
