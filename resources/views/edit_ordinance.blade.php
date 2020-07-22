
<div class="modal fade" id="edit_ordinance{{$ordinance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h2  id="exampleModalLabel">Edit Ordinance</h2>
                
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
            <form method='POST' action='edit-ordinance/{{$ordinance->id}}' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12 form-group'>
                       
                       <label>Ordinance No.:</label>
                       <input class='form-control' value='{{$ordinance->ordinance_number}}' type='text' name='ordinance_number' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Title:</label>
                       <input class='form-control' value='{{$ordinance->title}}'  type='text' name='title' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Date Approved:</label>
                       <input class='form-control' value='{{$ordinance->date_approved}}'  type='date' name='date_approved' >
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Status :</label>
                       <select class='form-control'  name='status' required>
                           <option value=''></option>
                           <option value=1 {{ ($ordinance->status == 1 ? "selected":"") }}>Implemented</option>
                          <option value=0 {{ ($ordinance->status  == 0? "selected":"") }}>Not Implemented</option>
                          <option value=2 {{ ($ordinance->status == 2 ? "selected":"") }}>Approved</option>
                          <option value=3 {{ ($ordinance->status  == 3? "selected":"") }}>Disapproved</option>

                       </select>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Category :</label>
                       <select class='form-control'  name='category' required>
                           <option value=''></option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}' {{($ordinance->category->id == $category->id ? "selected":"") }}>{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                
                    <div class='col-md-12 form-group'>
                  
                        <input type="hidden" name="attachment_folder" value="{{$folder}}">
                        
                        <label>Attachments:</label>

                        @if ( isset($files) )
                          <ul style="list-style: none;padding: 5px 0px;">
                          @foreach( $files as $file)
                              <li style="padding: 5px 0px;">

                                  <a href="{{ route('delete_or_file' , [$ordinance->id , $file] ) }}" class=" btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                                  <a href='{{url('attachments/'.$folder.'/'.$file)}}' class="btn btn-warning btn-xs" target='_blank'><i class="fa fa-download"></i>  {{$file}} </a>
                                   
                              </li>                              
                          @endforeach
                        </ul>
                        @endif
                        

                        <input class='form-control' type='file' name='attachment[]' multiple="" >
                     </div>
                    <div class='col-md-12 form-group'>
                        
                        <label>Remarks:</label>
                        <textarea class='form-control' type='file' name='remarks' >{{$ordinance->remarks}}</textarea>
                     </div>

                     <div class='col-md-12 form-group'>
                       
                       <label>Sponsored By:</label>
                       <input class='form-control' type='text' name='sponsor' required value="{{$ordinance->sponsor}}">
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