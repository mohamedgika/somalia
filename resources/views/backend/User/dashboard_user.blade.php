@extends('layouts.backend.index')

@section('title')
    Dashboard | User
@endsection

@section('css')
@endsection

@section('after_next')
    User <input type="submit" class="ml-3 btn btn-success" value="Add User" data-toggle="modal" data-target="#AddUser">
    @include('backend.User.dashboard_add_user')
@endsection

@section('next')
    User
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        @include('backend.User.dashboard_user_massage')
        <!-- Default box -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!--card-body -->
            <div class="card-body">
                <table id="example1" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th style="">
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Country
                            </th>
                            <th>
                                State
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            <tr>
                                <td>#</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                <td><span
                                        class="badge {{ $u->status == 'admin' ? 'badge-danger' : 'badge-success' }}">{{ $u->status }}
                                </td>
                                <td>{{ $u->country }}</td>
                                <td>{{ $u->state }}</td>
                                <td>{{ $u->city }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditUser{{ $u->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteUser{{ $u->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.User.dashboard_edit_user')
                            @include('backend.User.dashboard_delete_user')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th style="">
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Country
                            </th>
                            <th>
                                State
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Action
                            </th>
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
    @include('backend.User.dashboard_end_user')
@endsection
