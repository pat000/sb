
<div class="modal fade" id="edit_ordinance" tabindex="-1" role="dialog" aria-labelledby="edit_ordinance" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3  id="exampleModalLabel">Edit Ordinance - <span id="txtname"></span></h3>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form method='POST' action='edit-ordinance/' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="text" hidden name="ordinance_id" >
                    <div class='col-md-12 form-group'>
                       
                       <label>Ordinance No.:</label>
                       <input class='form-control' value='' type='text' name='ordinance_number' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Title:</label>
                       <input class='form-control' value=''  type='text' name='title' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Date Approved:</label>
                       <input class='form-control' value=''  type='date' name='date_approved' >
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Status :</label>
                       <select class='form-control'  name='status' required>
                            <option value=''></option>
                            <option value=1>Implemented</option>
                            <option value=0>Not Implemented</option>
                            <option value=2>Approved</option>
                            <option value=3>Disapproved</option>
                       </select>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Category :</label>
                       <select class='form-control'  name='category' required>
                           <option value=''></option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}'>{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                
                    <div class='col-md-12 form-group'>
                  
                        <input type="hidden" name="attachment_folder" >
                        
                        <label>Attachments:</label>


                        <input class='form-control' type='file' name='attachment[]' multiple="" >
                     </div>
                    <div class='col-md-12 form-group'>
                        
                        <label>Remarks:</label>
                        <textarea class='form-control' type='file' name='remarks' ></textarea>
                     </div>

                     <div class='col-md-12 form-group'>
                       
                       <label>Sponsored By:</label>
                       <input class='form-control' type='text' name='sponsor' required value="">
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