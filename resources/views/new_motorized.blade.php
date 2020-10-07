<style type="text/css">
  input{
    text-transform: uppercase;
  }

</style>
<div class="modal fade" id="new_motorized" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Legalization</h2>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form class="form-motorized"  id="form-motorized" enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class=' form-group col-md-2'>
                           <label>Case: no</label>
                           <input class='form-control' type='text' name='case_no' required>
                        </div>

                        <div class=' form-group col-md-10'>
                           <label>Name of Operator</label>
                           <input class='form-control' type='text' name='operator_name' required>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class=' form-group col-md-12'>
                           <label>Address</label>
                           <input class='form-control' type='text' name='address' required>
                        </div>
                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-3'>
                           <label>Motor Name</label>
                           <input class='form-control' type='text' name='motor_name' required>
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Number</label>
                           <input class='form-control' type='text' name='motor_number' required>
                        </div>
                        <div class=' form-group col-md-3'>
                           <label>Motor Chassic</label>
                           <input class='form-control' type='text' name='motor_chassic' required>
                        </div>

                        <div class=' form-group col-md-3'>
                           <label>Plate Number</label>
                           <input class='form-control' type='text' name='plate_number' required>
                        </div>

                    </div>
                     

                    <div class="row">
                        <div class=' form-group col-md-4'>
                           <label>Date</label>
                           <input class='form-control' type='date' name='date_issued' required>
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Municipal Vice Mayor</label>
                           <input class='form-control' type='text' name='vice_mayor' required>
                        </div>

                        <div class=' form-group col-md-4'>
                           <label>Age</label>
                           <input class='form-control' type='number' name='age' required>
                        </div>
                    </div>

                    <div class="row">

                        <div class=' form-group col-md-4'>
                           <label>Or No.  <small class="text-white">(Optional)</small></label>
                           <input class='form-control' type='text' name='or_no' >
                        </div>
                        <div class=' form-group col-md-4'>
                           <label>Date issued  <small class="text-white">(Optional)</small></label>
                           <input class='form-control' type='date' name='date_or' >
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