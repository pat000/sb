
<div class="modal fade" id="new_legalization" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h2  id="exampleModalLabel">New resolution</h2>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form  class="form-legalization"  id="form-legalization" enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12 form-group'>
                       
                      <label>Resolution No.:</label>
                       <input class='form-control' type='text' name='legalization_number' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Date Approved:</label>
                       <input class='form-control' type='date' name='date_approved' required="" >
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Title:</label>
                       <input class='form-control' type='text' name='title' required>
                    </div>
                    
                    <div class='col-md-12 form-group'>
                       
                       <label>Status :</label>
                       <select class='form-control'  name='status' required>
                           <option value=''> -- Select status</option>
                            <option value=1>Implemented</option>
                            <option value=0>Not Implemented</option>
                            <option value="2">Approved</option>
                            <option value="3">Disapproved</option>
                       </select>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Category :</label>
                       <select class='form-control'  name='category' required>
                           <option value=''>-- Select category</option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}'>{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class='col-md-12 form-group'>
                     
                     <label>Sponsored By:</label>
                     <input class='form-control' type='text' name='sponsor' required>
                    </div>
                   
                     <div class='col-md-12 form-group'>
                        
                        <label>Files (Multiple files):</label>
                        <input class='form-control' type='file' name='attachment[]' multiple="" required>
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