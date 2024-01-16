<div class="modal fade" id="EditUser{{$u->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User {{$u->name}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('user.edit',$u->id)}}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
                    <div class="col-md">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" id="name" class="form-control" value="{{$u->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="email">Email</label>
                            @if ($u->email == null)
                            <input name="email" type="text" id="email" class="form-control" value="{{$u->email}}" disabled>
                            @else
                            <input name="email" type="text" id="email" class="form-control" value="{{$u->email}}">
                            @endif
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            @if ($u->phone == null)
                            <input name="phone" type="text" id="phone" class="form-control" value="{{$u->phone}}" disabled>
                            @else
                            <input name="phone" type="text" id="phone" class="form-control" value="{{$u->phone}}">
                            @endif
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input name="country" type="text" id="country" class="form-control" value="{{$u->country}}">
                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input name="state" type="text" id="state" class="form-control" value="{{$u->state}}">
                            @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input name="city" type="text" id="city" class="form-control" value="{{$u->city}}">
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control select2" style="width: 100%;" name="status" id="status">
                            <option value="{{$u->status}}">{{$u->status}}</option>
                            <option value="admin">Admin</option>
                            <option value="customer_service">Customer Service</option>
                            <option value="user">User</option>
                             @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </select>
                          </div>
                    </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update">
                  </div>
            </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
