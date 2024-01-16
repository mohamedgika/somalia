@extends('layouts.backend.index')

@section('title')
    Dashboard | Ads
@endsection

@section('css')
    @include('backend.Ads.dashboard_head_ads')
@endsection

@section('after_next')
    Ads
    {{-- <a href="{{ route('post.create') }}"><input type="submit" class="ml-3 btn btn-success"
            value="{{ __('backend/dashboard_post.Add Posts') }}"></a> --}}
@endsection

@section('next')
    Ads
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
                            <th>Name</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Feature</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Ad Detail</th>
                            <th>Active</th>
                            <th>Active Actions</th>
                            <th>Actions</th>
                            {{-- @can('view', $posts)
                                <th>{{ __('backend/dashboard_post.action') }}</th>
                            @endcan --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ads as $ad)
                            <tr>
                                <td>{{ $ad->name }}</td>
                                <td>
                                    @foreach ($ad->getMedia('ads') as $media)
                                        <img src="{{ $media->getUrl() }}" width="75px"><br />
                                    @endforeach
                                </td>
                                <td>{{ $ad->subCategory->name }}</td>
                                <td>{{ $ad->subCategory->category->name }}</td>
                                <td>{{ $ad->user->name }}</td>
                                <td>{{ $ad->price }}</td>
                                <td>
                                    <textarea id="" cols="20" rows="2" disabled>{{ $ad->description }}</textarea>
                                </td>
                                <td>
                                    <textarea id="" cols="20" rows="2" disabled>{{ $ad->feature }}</textarea>
                                </td>
                                <td>{{ $ad->country }}</td>
                                <td>{{ $ad->state }}</td>
                                <td>{{ $ad->city }}</td>
                                <td>
                                    @php
                                        $data = json_decode($ad->adDetail->ad_detail);
                                    @endphp

                                    @if (is_array($data))
                                        <ul>
                                            @foreach ($data as $adDetail)
                                                @if (is_object($adDetail))
                                                    <li>
                                                        @foreach ($adDetail as $key => $value)
                                                            <strong>{{ $key }}:</strong>
                                                            {{ $value }}&nbsp;&nbsp;
                                                        @endforeach
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Invalid data structure</p>
                                    @endif
                                </td>
                                <td><span
                                        class="badge {{ $ad->is_active == 1 ? 'badge-success' : 'badge-danger' }}">{{ $ad->is_active == 1 ? 'Active' : 'Not Active' }}
                                </td>
                                <td>
                                    @if ($ad->is_active == 1)
                                        <form action="{{ route('ads.show', $ad->id) }}">
                                            @csrf
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#EditCategory" disabled>
                                                Active
                                            </button>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Disactive">
                                            <input type="hidden" name="active" value="0">
                                        </form>
                                    @elseif ($ad->is_active == 0)
                                        <form action="{{ route('ads.show', $ad->id) }}">
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
                                        data-target="#EditAds{{ $ad->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteAds{{ $ad->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Ads.dashboard_delete_ads')
                            @include('backend.Ads.dashboard_edit_ads')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Feature</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Ad Detail</th>
                            <th>Active</th>
                            <th>Active Actions</th>
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
    @include('backend.Ads.dashboard_end_ads')
@endsection
