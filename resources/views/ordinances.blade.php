@extends('layouts.header')

@section('content')

@section('content')


@if(session()->has('status'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{session()->get('status')}}
</div>
@endif
@include('error')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title pb-3">
                    <h5>Ordinances</h5>
                    <div class="ibox-tools">
                        
                        <a href="#">
                            <button class="btn btn-primary" id="btn-new" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Ordinance</button>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                
                                
                                <table id='tblordinances' class="table table-striped table-bordered table-hover mb-5"  style="width: 100% !important">
                                    <thead>
                                        <tr>
                                            <td><input type="text" name="" id="txtorno" class="form-control" placeholder="Ordinance No."></td>
                                            <td><input type="text" name="" id="txttitle" class="form-control" placeholder="Title"></td>
                                            <td><input type="text"  name="" id="txtdate" class="form-control" placeholder="Date Approved"></td>
                                            <td>
                                                <select class="form-control" id="txtstatus">
                                                    <option disabled="" selected="">-- Select status</option>
                                                    <option value="1">Implemented</option>
                                                    <option value="0">Not Implemented</option>
                                                    <option value="2"> Approved</option>
                                                    <option value="3"> Disapproved</option>
                                                </select>
                                            </td>
                                            <td colspan="2">
                                                <select class="form-control" id="txtcategory">
                                                    <option disabled="" selected=""> --Select category</option>
                                                    @foreach($categories as $category)
                                                        <option value='{{$category->name}}'>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td colspan="4"><input type="text" name="" id="txtsponsor" class="form-control" placeholder="Sponsor"></td>
                                        </tr>
                                        <tr>
                                            <th > Ordinance No. </th>
                                            <th width="500px"> Title</th>
                                            <th > Date Approved</th>
                                            <th > Status</th>
                                            <th > Category</th>
                                            <th > File</th>
                                            <th>Sponsor</th>
                                            <th width="200px"> Action</th>
                                            <th hidden >id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>


</div>

@endsection

@section('modal')
  @include('edit_ordinance')
  @include('new_ordinance')   
@endsection

@section('js-custom')
<script type="text/javascript">
    var ordinance_table = $('#tblordinances').DataTable({
        lengthMenu: [[10, 25, 50,-1], [10, 25, 50,"All"]],
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "order" : [[ 8, "desc" ]],
        ajax: '{{url('getOrdinances')}}',
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [

                {extend: 'csv'},
                {extend: 'excel', title: '{{config('app.name')}} - Ordinances'},
                {extend: 'pdf',
                  exportOptions: {
                      columns: [ 0, 2, 1 ,3, 4, 6]
                  },
                  "ShowAll": true,
                  "oSelectorOpts": { filter: 'all', order: 'current' },
                  title: '{{config('app.name')}} - Ordinances'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 2, 1 ,3, 4, 6]
                    },
                    ShowAll: true,
                    SelectorOpts: { filter: 'all', order: 'current' },
                    title : '{{config('app.name')}} - Ordinances',
                    
                    customize: function (win)
                    {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).css('margin', '20px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                        var last = null;
                        var current = null;
                        var bod = [];
         
                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');
         
                        style.type = 'text/css';
                        style.media = 'print';
         
                        if (style.styleSheet)
                        {
                          style.styleSheet.cssText = css;
                        }
                        else
                        {
                          style.appendChild(win.document.createTextNode(css));
                        }
         
                        head.appendChild(style);
                    }
        }],

        columns: [
            {   
                "data":"ordinance_number",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('width', '5%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        return full.ordinance_number;
                  }
            },
            {   
                "data":"title",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('width', '25%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        return full.title;
                  }
            },
            {data: 'date_approved', name: 'date_approved'},
            {   
                "data":"status",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '15%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        if (full.status == 1) 
                        {
                            return '<a class="label label-primary text-white">Implemented</a>'; 
                        }else if (full.status == 2) {

                            return '<span class="label label-success">Approved</span>'; 
                        }
                        else if (full.status == 3) {
                            return '<span class="label label-warning">Disapproved</span>'; 
                        }
                        else {
                            return '<a class="label label-default text-danger">Not Implemented</a>'; 
                        }

                  }
            },

            {data: 'name', name: 'categories.name'},
            {
                name : 'uploaded_file', 
                "data":"uploaded_file",
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                  $(nTd).css('text-align', 'left');
                  $(nTd).css('width', '15%');
                },
                "mRender": function( data, type, full ,meta) {

                    return '<a onclick="editOrdinance('+full.id+')"   data-toggle="modal"   class="btn btn-white btn-sm"><i class="fa fa-folder-o"></i> '+full.file_count+' File (s) </a>';
                }

            },
            {data: 'sponsor', name: 'sponsor'},
            
            {   
                "data":"id",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '15%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        return '<button onclick="editOrdinance('+full.id+')"  data-toggle="modal" class="btn btn-info text-white btn-sm"><i class="fa fa-pencil"></i> Edit </button> @if (auth()->user()->is_admin)  <a href="delete-ordinance/'+full.id+'" type="button" type="button" class="btn btn-white btn-sm"><i class="fa fa-times"></i> Delete </a> @endif';
                  }
            },
            {   
                "data":"id",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('display', 'none');
                  },
                  "mRender": function( data, type, full ,meta) {

                        return full.id;
                  }
            },

        ]
    });
    
    $('#btn-new').on( 'click', function () {
        document.getElementById("form-ordinance").reset();
        $('#new_ordinance').modal('show');
    });


    $('#txtorno').on( 'keyup', function () {
        ordinance_table.column(0).search( this.value ).draw();
    });


    $('#txttitle').on( 'keyup', function () {
        ordinance_table.column(1).search( this.value ).draw();
    });
    $('#txtdate').on( 'keyup', function () {
        ordinance_table.column(2).search( this.value ).draw();
    });
    $('#txtstatus').on( 'change', function () {
        ordinance_table.column(3).search( this.value ).draw();
    })
    $('#txtcategory').on( 'change', function () {
        ordinance_table.column(4).search( this.value ).draw();
    });
    $('#txtsponsor').on( 'keyup', function () {
        ordinance_table.column(6).search( this.value ).draw();
    });


    $(".form-ordinance").on('submit', function(e) {
        e.preventDefault();
        manage_ordinance();
    });

    function manage_ordinance(){
        show();
        let form_data = new FormData($(".form-ordinance")[0]);
          form_data.append('_method', 'post');
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              url: "new-ordinance",
              type: 'POST', 
              dataType:'text',
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,       
              success: function(data){
                show('none');
                ordinance_table.ajax.reload();

                alert('Data successfully saved. You can input data continously');

                document.getElementById("form-ordinance").reset();
              },
              error: function(data){
                alert('something went wrong');
              }
          });
    }

    $(".form-update-ordinance").on('submit', function(e) {
        e.preventDefault();
        update_ordinance();
    });

     function update_ordinance(){
        show();
        let form_data = new FormData($(".form-update-ordinance")[0]);
          form_data.append('_method', 'post');
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              url: `update-ordinance/${ordinance_id}`,
              type: 'POST', 
              dataType:'text',
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,       
              success: function(data){
                var info = JSON.parse(data);

                ordinance_table.ajax.reload();

                $("#file_ul").empty();
                $.each(info.files, function( index, value ) {
                    $("#file_ul").append("<li> @if (auth()->user()->is_admin) <a href='delete-ordinance-file/"+info.id+"/"+value+"' class='btn btn-xs btn-danger'> <i class='fa fa-trash'></i></a>@endif <a href='attachments/"+info.file_folder+"/"+value+"' class='btn btn-warning btn-xs' target='_blank'><i class='fa fa-download'></i>  "+value+" </a></li>");
                });

                alert('Data successfully updated.');

                show('none');
              },
              error: function(data){
                alert('something went wrong');
              }
          });
    }

    var ordinance_id;
    function editOrdinance (id) {
        $("#file_ul").empty();
        show();
        $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "edit-ordinance/"+id,
          type: 'get', 
          dataType:'text',
          cache: false,
          contentType: false,
          processData: false, 
          success: function(data){
            var info = JSON.parse(data);
            ordinance_id = info.id;
            $('input[name="ordinance_id"]').val(info.id);
            $('input[name="ordinance_number"]').val(info.ordinance_number);
            $('input[name="title"]').val(info.title);
            $('#txtname').text(info.title);
            $('input[name="date_approved"]').val(info.date_approved);
            $('select[name="status"]').val(info.status);
            $('select[name="category"]').val(info.category_id);
            $('textarea[name="remarks"]').val(info.remarks);
            $('input[name="sponsor"]').val(info.sponsor);
            $('input[name="attachment_folder"]').val(info.file_folder);


            $.each(info.files, function( index, value ) {
                
                $("#file_ul").append("<li> @if (auth()->user()->is_admin) <a href='delete-ordinance-file/"+info.id+"/"+value+"' class='btn btn-xs btn-danger'> <i class='fa fa-trash'></i></a>@endif <a href='attachments/"+info.file_folder+"/"+value+"' class='btn btn-warning btn-xs' target='_blank'><i class='fa fa-download'></i>  "+value+" </a></li>");
            });  

            $("#edit_ordinance").modal('show');
            show('none');
          },
          error: function(data){

          }
        });
    }
   
</script>
@endsection


        

