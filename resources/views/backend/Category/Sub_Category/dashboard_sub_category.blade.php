@extends('layouts.backend.index')

@section('title')
{{__('backend/dashboard_setting.| SubCategory')}}
@endsection

@section('css')
@include('backend.Category.dashboard_head_category')
@endsection

@section('after_next')
{{__('backend/dashboard_category.Sub Category')}}
<a href="{{route('subcategory.create')}}"><input type="submit" class="btn btn-danger ml-2" value="{{__('backend/dashboard_category.Add Sub Category')}}"></a>
@endsection

@section('next')
{{__('backend/dashboard_category.Sub Category')}}
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-blue">
          <div class="card-header">
            <h3 class="card-title">{{__('backend/dashboard_category.Sub Category')}}</h3>

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
                        <th>{{__('backend/dashboard_category.Sub Category')}}</th>
                        <th>{{__('backend/dashboard_category.Category')}}</th>
                        <th>{{__('backend/dashboard_category.Content')}}</th>
                        <th>{{__('backend/dashboard_category.Image')}}</th>
                        <th>{{__('backend/dashboard_category.Action')}}</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach ($subcategories as $subcategory)
                    <tr>
                        {{-- <td>{{$loop->iteration}}</td> --}}
                        <td>{{$subcategory->title}}</td>
                        <td><a href="{{route('category.index')}}">{{$subcategory->category->title}}</a></td>
                        <td>{{$subcategory->content}}</td>
                        <td><img src="{{URL::asset('imgs/'.$subcategory->image)}}" width="50px" height="50px" alt=""><td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditCategory">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteCategory">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                  @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>{{__('backend/dashboard_category.Sub Category')}}</th>
                        <th>{{__('backend/dashboard_category.Category')}}</th>
                        <th>{{__('backend/dashboard_category.Content')}}</th>
                        <th>{{__('backend/dashboard_category.Image')}}</th>
                        <th>{{__('backend/dashboard_category.Action')}}</th>
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
@include('backend.Category.dashboard_end_category')
@endsection
