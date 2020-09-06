
<div class="modal fade" id="edit_motorized" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Edit Legalization - <span id="txtoperator"></span></h3>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form id="form-update-motorized" class="form-update-motorized" enctype="multipart/form-data"  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class=' form-group col-md-2'>
                           <label>Case: no</label>
                           <input class='form-control' type='text' name='case_no' required >
                        </div>

                        <div class=' form-group col-md-10'>
                           <label>Name of Operator</label>
                           <input class='form-control' type='text' name='operator_name' required >
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class=' form-group col-md-12'>
                           <label>Address</label>
                           <input class='form-control' type='text' name='address' required >
                        </div>
                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-3'>
                           <label>Motor Name</label>
                           <input class='form-control' type='text' name='motor_name' required >
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Number</label>
                           <input class='form-control' type='text' name='motor_number' required >
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Chassic</label>
                           <input class='form-control' type='text' name='motor_chassic' required >
                        </div>

                        <div class=' form-group col-md-3'>
                           <label>Plate Number</label>
                           <input class='form-control' type='text' name='plate_number' required >
                        </div>

                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-4'>
                           <label>Date</label>
                           <input class='form-control' type='date' name='date_issued' required >
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Municipal Vice Mayor</label>
                           <input class='form-control' type='text' name='vice_mayor' required >
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Age</label>
                           <input class='form-control' type='number' name='age' required >
                        </div>

                        <div class="form-group col-md-12">
                            {{-- @if ($motor_info->signed_form)
                              <label>Download signed form:</label>
                                <a href="{{ url('motorized_form/'.$motor_info->id.'/'.$motor_info->signed_form) }}" target="_blank" type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i> Signed form</a>
                            @endif --}}

                            <span id="signed_form"></span>
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