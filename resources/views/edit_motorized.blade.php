
<div class="modal fade" id="edit_motorized{{$motor_info->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Edit Legalization</h2>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form method='POST' action="{{ route('motorized.update' , $motor_info->id)}}" onsubmit='show();'  enctype="multipart/form-data"  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class=' form-group col-md-2'>
                           <label>Case: no</label>
                           <input class='form-control' type='text' name='case_no' required value="{{$motor_info->case_no}}">
                        </div>

                        <div class=' form-group col-md-10'>
                           <label>Name of Operator</label>
                           <input class='form-control' type='text' name='operator_name' required value="{{$motor_info->operator_name}}">
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class=' form-group col-md-12'>
                           <label>Address</label>
                           <input class='form-control' type='text' name='address' required value="{{$motor_info->address}}">
                        </div>
                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-3'>
                           <label>Motor Name</label>
                           <input class='form-control' type='text' name='motor_name' required value="{{$motor_info->motor_name}}">
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Number</label>
                           <input class='form-control' type='text' name='motor_number' required value="{{$motor_info->motor_no}}">
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Chassic</label>
                           <input class='form-control' type='text' name='motor_chassic' required value="{{$motor_info->motor_chassic}}">
                        </div>

                        <div class=' form-group col-md-3'>
                           <label>Plate Number</label>
                           <input class='form-control' type='text' name='plate_number' required value="{{$motor_info->plate_number}}">
                        </div>

                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-4'>
                           <label>Date</label>
                           <input class='form-control' type='date' name='date_issued' required value="{{$motor_info->date_issued}}">
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Municipal Vice Mayor</label>
                           <input class='form-control' type='text' name='vice_mayor' required value="{{$motor_info->vice_mayor}}">
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Age</label>
                           <input class='form-control' type='number' name='age' required value="{{$motor_info->age}}">
                        </div>

                        <div class="form-group col-md-12">
                            @if ($motor_info->signed_form)
                              <label>Download signed form:</label>
                                <a href="{{ url('motorized_form/'.$motor_info->id.'/'.$motor_info->signed_form) }}" target="_blank" type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i> Signed form</a>
                            @endif
                            <br>

                            <label>Upload Signed form: </label>
                            <input type="file" name="signed_form" class="form-control">
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type='submit'  class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>