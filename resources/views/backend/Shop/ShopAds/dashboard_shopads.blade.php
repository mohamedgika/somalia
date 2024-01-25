@extends('layouts.backend.index')

@section('title')
    Dashboard | ShopAds
@endsection

@section('css')
    @include('backend.Shop.ShopAds.dashboard_head_shopads')
@endsection

@section('after_next')
    ShopAds
    {{-- <a href="{{ route('post.create') }}"><input type="submit" class="ml-3 btn btn-success"
            value="{{ __('backend/dashboard_post.Add Posts') }}"></a> --}}
@endsection

@section('next')
    ShopAds
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
                <h3 class="card-title">ShopAds</h3>

            </div>
            <div class="card-body">

                <table id="example2" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Shop</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Feature</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Shop Ad Detail</th>
                            <th>Active</th>
                            <th>Active Actions</th>
                            <th>Actions</th>
                            {{-- @can('view', $posts)
                                <th>{{ __('backend/dashboard_post.action') }}</th>
                            @endcan --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($shopads as $ad)
                            <tr>
                                <td>{{ $ad->name }}</td>
                                <td>
                                    @foreach ($ad->getMedia('shopads') as $media)
                                        <img src="{{ $media->getUrl() }}" width="75px"><br />
                                    @endforeach
                                </td>
                                <td>{{ $ad->shop->name }}</td>
                                <td>{{ $ad->shop->categories->name }}</td>
                                <td>{{ $ad->shop->user->name }}</td>
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
                                    @if ($ad->shopAdsDetail != null && $ad->shopAdsDetail->shop_ad_detail != null)
                                        @foreach ($ad->shopAdsDetail->shop_ad_detail as $item)
                                            @foreach ($item as $key => $value)
                                                <p><b>{{ $key }}:</b> {{ $value }}</p>
                                            @endforeach
                                        @endforeach
                                    @else
                                        <p>Shop Ad Detail is null</p>
                                    @endif
                                </td>
                                <td><span
                                        class="badge {{ $ad->is_active == 1 ? 'badge-success' : 'badge-danger' }}">{{ $ad->is_active == 1 ? 'Active' : 'Not Active' }}
                                </td>
                                <td>
                                    @if ($ad->is_active == 1)
                                        <form action="{{ route('shopAds.show', $ad->id) }}">
                                            @csrf
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#EditCategory" disabled>
                                                Active
                                            </button>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Disactive">
                                            <input type="hidden" name="active" value="0">
                                        </form>
                                    @elseif ($ad->is_active == 0)
                                        <form action="{{ route('shopAds.show', $ad->id) }}">
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
                                        data-target="#EditShopAds{{ $ad->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#DeleteShopAds{{ $ad->id }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('backend.Shop.ShopAds.dashboard_delete_shopads')
                            @include('backend.Shop.ShopAds.dashboard_edit_shopads')
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Shop</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Feature</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Shop Ad Detail</th>
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
    @include('backend.Shop.ShopAds.dashboard_end_shopads')
@endsection
