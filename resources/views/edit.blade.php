
<div class="modal fade" id="edit_account{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='POST' action='edit-account/{{$user->id}}' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12'>
                       Name:
                       <input class='form-control' type='text' value='{{$user->name}}' name='name' required>
                    </div>
                    <div class='col-md-12'>
                       Email:
                       <input class='form-control' type='email' value='{{$user->email}}' name='email' required>
                    </div>
                    {{-- <div class='col-md-12'>
                       Password:
                       <input class='form-control' type='password' name='password' required>
                    </div> --}}
                    <div class='col-md-12'>
                     Role:
                        <select  name='role' class="form-control"  required>
                            <option value=''></option>
                            {{-- @foreach($roles as $role) --}}
                            <option value=1 {{ ($user->is_admin ? "selected":"") }}>Admin</option>
                            <option value=0 {{ (!$user->is_admin ? "selected":"") }}>Staff</option>
                            {{-- @endforeach --}}
                        </select>
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