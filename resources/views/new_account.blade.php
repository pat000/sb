
<div class="modal fade" id="new_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='POST' action='new-account' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='col-md-12'>
                       Name:
                       <input class='form-control' type='text' name='name' required>
                    </div>
                    <div class='col-md-12'>
                       Email:
                       <input class='form-control' type='email' name='email' required>
                    </div>
                    <div class='col-md-12'>
                       Password:
                       <input class='form-control' type='password' name='password' required>
                    </div>
                    <div class='col-md-12'>
                     Role:
                        <select  name='role' class="form-control"  required>
                            <option value=''></option>
                            {{-- @foreach($roles as $role) --}}
                            <option value='Admin'>Admin</option>
                            <option value='Staff'>Staff</option>
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