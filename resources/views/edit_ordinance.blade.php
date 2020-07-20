
<div class="modal fade" id="edit_ordinance{{$ordinance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ordinance</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='POST' action='edit-ordinance/{{$ordinance->id}}' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12'>
                       Ordinance No.:
                       <input class='form-control' value='{{$ordinance->ordinance_number}}' type='text' name='ordinance_number' required>
                    </div>
                    <div class='col-md-12'>
                       Title:
                       <input class='form-control' value='{{$ordinance->title}}'  type='text' name='title' required>
                    </div>
                    <div class='col-md-12'>
                       Date Approved:
                       <input class='form-control' value='{{$ordinance->date_approved}}'  type='date' name='date_approved' >
                    </div>
                    <div class='col-md-12'>
                       Status :
                       <select class='form-control'  name='status' required>
                           <option value=''></option>
                           <option value=1 {{ ($ordinance->status ? "selected":"") }}>Implemented</option>
                        <option value=0 {{ (!$ordinance->status ? "selected":"") }}>Not Implemented</option>
                       </select>
                    </div>
                    <div class='col-md-12'>
                       Category :
                       <select class='form-control'  name='category' required>
                           <option value=''></option>
                           @foreach($categories as $category)
                           <option value='{{$category->id}}' {{($ordinance->category->id == $category->id ? "selected":"") }}>{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                
                    <div class='col-md-12'>
                        Change File (current file : <a href='{{url($ordinance->uploaded_file)}}' target='_blank'>Download File </a>  ):
                        <input class='form-control' type='file' name='attachment' >
                     </div>
                    <div class='col-md-12'>
                        Remarks:
                        <textarea class='form-control' type='file' name='remarks' >{{$ordinance->remarks}}</textarea>
                     </div>

                     <div class='col-md-12'>
                       Sponsored By:
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