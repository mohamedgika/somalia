<div class="modal fade" id="DeleteContact{{$con->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete ContactUs {{$con->email}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('contact.destroy',$con->id)}}" method="POST" enctype="multipart/form-data">
              @method('DELETE')
              @csrf
                    <div class="col-md">
                        <div class="form-group">
                            <p class="text-danger"><b>Are You Sure Delete {{$con->email}}</b></p>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </div>
            </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
