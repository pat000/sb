
<div class="modal fade" id="view_history{{$ordinance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">View History</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
            <div class="modal-body">
                <div class='row border'>
                    <div class='col-md-2 border'>
                        Ordinance Number
                    </div>
                    <div class='col-md-2 border'>
                        Title
                    </div>
                    <div class='col-md-1 border'>
                        Date Approved
                    </div>
                    <div class='col-md-1 border'>
                        Status 
                    </div>
                    <div class='col-md-2 border'>
                        Category
                    </div>
                    <div class='col-md-1 border'>
                        File
                    </div>
                    <div class='col-md-2 border'>
                        Remarks
                    </div>
                    <div class='col-md-1 border'>
                        Name
                    </div>
                </div>
                @foreach($ordinance->history as $history)
                <div class='row border'>
                    <div class='col-md-2 border'>
                        {{$history->ordinance_number}}
                    </div>
                    <div class='col-md-2 border'>
                        {{$history->title}}
                    </div>
                    <div class='col-md-1 border'>
                        {{date('M d, Y',strtotime($history->date_approved))}}
                    </div>
                    <div class='col-md-1 border'>
                        {{$history->status}} 
                    </div>
                    <div class='col-md-2 border'>
                        {{$history->category}}
                    </div>
                    <div class='col-md-1 border'>
                        <a href='{{url($history->uploaded_file)}}' target='_blank'>Download File </a> 
                    </div>
                    <div class='col-md-2 border'>
                        {{$history->remarks}}
                    </div>
                    <div class='col-md-1 border'>
                        {{$history->added_by->name}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>