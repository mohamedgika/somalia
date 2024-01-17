<div class="modal fade" id="AddUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-md">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" id="name" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" id="email" class="form-control" >
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input name="country" type="text" id="country" class="form-control" >
                    @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="state">State</label>
                    <input name="state" type="text" id="state" class="form-control" >
                    @error('state')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="city">City</label>
                    <input name="city" type="text" id="city" class="form-control" >
                    @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="text" id="password" class="form-control" >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;" name="status" id="status">
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
                    <input type="submit" class="btn btn-primary" value="Add">
                  </div>
            </form>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
