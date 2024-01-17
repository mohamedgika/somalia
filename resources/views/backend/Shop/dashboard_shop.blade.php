@extends('layouts.backend.index')

@section('title')
    Dashboard | Shop
@endsection

@section('css')
@endsection

@section('after_next')
    Shop
    @include('backend.Shop.dashboard_add_shop')
@endsection

@section('next')
    Shop
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        @include('backend.Shop.dashboard_shop_massage')
        <!-- Default box -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Shops</h3>

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
                            <th>
                                User
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Discription
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Active Actions
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shop as $s)
                            <tr>
                                <td>#</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->user->name }}</td>
                                <td>
                                    @foreach ($s->getMedia('shop') as $media)
                                        <img src="{{ $media->getUrl() }}" width="75px"><br />
                                    @endforeach
                                </td>
                                <td>{{ $s->categories->name }}</td>
                                <td>{{ $s->phone }}</td>
                                <td>
                                    <textarea id="" cols="20" rows="2" disabled>{{ $s->description }}</textarea>
                                </td>
                                <td><span
                                        class="badge {{ $s->is_active == 1 ? 'badge-success' : 'badge-danger' }}">{{ $s->is_active == 1 ? 'Active' : 'Not Active' }}
                                </td>
                                <td>
                                    @if ($s->is_active == 1)
                                        <form action="{{ route('shop.show', $s->id) }}">
                                            @csrf
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#EditCategory" disabled>
                                                Active
                                            </button>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Disactive">
                                            <input type="hidden" name="active" value="0">
                                        </form>
                                    @elseif ($s->is_active == 0)
                                        <form action="{{ route('shop.show', $s->id) }}">
                                            @csrf
                                            <input type="submit" class="btn btn-info btn-sm" value="Active">
                                            <input type="hidden" name="active" value="1">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#EditCategory" disabled>
                                                Disactive
                                            </button>
                                        </form>
                                    @endif

                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#EditShop{{ $s->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteShop{{ $s->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Shop.dashboard_edit_shop')
                            @include('backend.Shop.dashboard_delete_shop')
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
                            <th>
                                User
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Discription
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Active Actions
                            </th>
                            <th>
                                Actions
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
    @include('backend.Shop.dashboard_end_shop')
@endsection
