<style type="text/css">
  input{
    text-transform: uppercase;
  }

</style>
<div class="modal fade" id="edit_resolution{{$resolution->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                  <h2 id="exampleModalLabel">Edit Resolution</h2>
              
                  <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" >
                      <span aria-hidden="true">&times;</span>
                  </button>
               
            </div>
            <form method='POST' action='edit-resolution/{{$resolution->id}}' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12 form-group'>
                       
                       <label>Resolution No.:</label>
                       <input class='form-control' value='{{$resolution->legalization_number}}' type='text' name='legalization_number' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Title:</label>
                       <input class='form-control' value='{{$resolution->title}}'  type='text' name='title' required>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Date Approved:</label>
                       <input class='form-control' value='{{$resolution->date_approved}}'  type='date' name='date_approved' >
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Status :</label>
                       <select class='form-control'  name='status' required>
                           <option value=''></option>
                           <option value=1 {{ ($resolution->status ==1 ? "selected":"") }}>Implemented</option>
                        <option value=0 {{ ( $resolution->status == 0? "selected":"") }}>Not Implemented</option>
                        <option value=2 {{ ( $resolution->status == 2? "selected":"") }}>Approved</option>
                        <option value=3 {{ ( $resolution->status == 3? "selected":"") }}>Disapproved</option>
                       </select>
                    </div>
                    <div class='col-md-12 form-group'>
                       
                       <label>Category :</label>
                       <select class='form-control'  name='category' required>
                           <option value=''></option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}' {{($resolution->category->id == $category->id ? "selected":"") }}>{{$category->name}}</option>
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

                                  <a href="{{ route('delete_leg_file' , [$resolution->id , $file] ) }}" class=" btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                                  <a href='{{url('attachments/'.$folder.'/'.$file)}}' class="btn btn-warning btn-xs" target='_blank'><i class="fa fa-download"></i>  {{$file}} </a>
                                   
                              </li>                              
                          @endforeach
                        </ul>
                        @endif
                        

                        <input class='form-control' type='file' name='attachment[]' multiple="" >
                     </div>
                  
                     <div class='col-md-12 form-group'>
                       
                       <label>Sponsored By:</label>
                       <input class='form-control' type='text' name='sponsor' required value="{{$resolution->sponsor}}">
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