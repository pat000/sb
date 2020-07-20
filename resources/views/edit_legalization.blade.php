
<div class="modal fade" id="edit_legalization{{$legalization->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Edit Legalization</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='POST' action='edit-legalization/{{$legalization->id}}' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12'>
                       Legalization No.:
                       <input class='form-control' value='{{$legalization->legalization_number}}' type='text' name='legalization_number' required>
                    </div>
                    <div class='col-md-12'>
                       Title:
                       <input class='form-control' value='{{$legalization->title}}'  type='text' name='title' required>
                    </div>
                    <div class='col-md-12'>
                       Date Approved:
                       <input class='form-control' value='{{$legalization->date_approved}}'  type='date' name='date_approved' >
                    </div>
                    <div class='col-md-12'>
                       Status :
                       <select class='form-control'  name='status' required>
                           <option value=''></option>
                           <option value=1 {{ ($legalization->status ==1 ? "selected":"") }}>Implemented</option>
                        <option value=0 {{ ( $legalization->status == 0? "selected":"") }}>Not Implemented</option>
                        <option value=2 {{ ( $legalization->status == 2? "selected":"") }}>Approved</option>
                        <option value=3 {{ ( $legalization->status == 3? "selected":"") }}>Disapproved</option>
                       </select>
                    </div>
                    <div class='col-md-12'>
                       Category :
                       <select class='form-control'  name='category' required>
                           <option value=''></option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}' {{($legalization->category->id == $category->id ? "selected":"") }}>{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                
                    <div class='col-md-12'>
                        Change File (current file : <a href='{{url($legalization->uploaded_file)}}' target='_blank'>Download File </a>  ):
                        <input class='form-control' type='file' name='attachment' >
                     </div>
                  
                     <div class='col-md-12'>
                       Sponsored By:
                       <input class='form-control' type='text' name='sponsor' required value="{{$legalization->sponsor}}">
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