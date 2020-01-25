<?php
// controller code active/deactive

// active code
About::where('status',1)->update([
    'status'=>0,
]);
About::where('id',$id)->update([
'status'=>1,
]);

// deactive code
Service::where('id',$id)->update([
    'status'=>0,
]);

// html code using modal
<td>
// making deactive
@if ($service->status==1)
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$service->id}}">
    Active
  </button>
  <!-- Modal -->
   <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Do u want changes?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
          Action will be deactiveted
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a class="btn btn-warning" href="{{url('deactive')}}/{{$service->id}}">Deactive</a>
          </div>
      </div>
      </div>
  </div>
// making active
@else
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$service->id}}">
    Deactive
  </button>
     <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do you want to Active this?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            Action will be activated
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a class="btn btn-info" href="{{url('active')}}/{{$service->id}}">YES</a>
        </div>
    </div>
    </div>
</div>
@endif
</td>




























?>


