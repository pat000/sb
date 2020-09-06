@extends('layouts.header')

@section('content')

@section('content')

@if(session()->has('status'))
<div class="alert alert-success alert-dismissable mt-2">
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
                    <h5>Legalization</h5>
                    <div class="ibox-tools">
                        
                        <a href="#">
                            <button class="btn btn-primary" id="btn-new" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Legalization</button>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                
                                
                                <table id='tblmotorized' class="table table-striped table-bordered table-hover dataTables-example mb-5" >
                                    <thead>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="txtcase_no" placeholder="case no">
                                            </td>
                                            <td>
                                                 <input type="text" class="form-control" id="txtoperator_name" placeholder="operator name">
                                            </td>
                                            <td>
                                                 <input type="text" class="form-control" id="txtmotor_name" placeholder="Motor name">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="txtdate" placeholder="date">
                                            </td>
                                            <td colspan="3">
                                               <select class="form-control" id="txtstatus">
                                                   <option>Good</option>
                                                   <option>Expire</option>
                                               </select>
                                            </td>

                                            
                                        </tr>

                                        <tr>
                                            <th > Case No. </th>
                                            <th width="500px"> Operator Informations</th>
                                            <th width="300px"> Vehicle Informations</th>
                                            <th > Date</th>
                                            <th>Status</th>
                                            <th>Attachments</th>
                                            <th width="200px"> Action</th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>

</div>

@include('new_motorized')    
@include('edit_motorized')
@endsection


@section('js-custom')
<script type="text/javascript">
     var motorized_table = $('#tblmotorized').DataTable({
        lengthMenu: [[10, 25, 50,-1], [10, 25, 50,"All"]],
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        // "order" : [[ 8, "desc" ]],
        ajax: '{{url('getMotorized')}}',
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [

                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 2, 1 ,3, 4, 6]
                    },
                    "bShowAll": true,
                    "oSelectorOpts": { filter: 'all', order: 'current' },
                    title : '{{config('app.name')}} - Legalizations',
                    
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
            {data: 'case_no', name: 'case_no'},
            {   
                "data":"operator_name",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '25%');
                  },
                  "mRender": function( data, type, full ,meta) {
                        return "<strong>"+full.operator_name+"</strong> <br><small>Address : "+full.address+"</small> <br> <small>Age : "+full.age+"</small>";
                        
                  }
            },
            
            {   
                "data":"motor_name",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '25%');
                  },
                  "mRender": function( data, type, full ,meta) {
                        return "<strong>"+full.motor_name +"</strong><br><small>No:  "+ full.motor_no +"</small><br><small>Chassic:  "+ full.motor_chassic +"</small><br><small>Plate No:  "+ full.plate_number +"</small>";    
                  }
            },
            

            {data: 'date_issued', name: 'date_issued'},
            {   
                "data":"status",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                  },
                  "mRender": function( data, type, full ,meta) {

                      if (full.status == 'Expire') {

                        return  '<a class="label label-default text-danger">Expire</a>';
                      }else  {
                        return '<a class="label label-primary text-white">Good</a>';
                      }
                  }
            },
            {   
                "data":"signed_form",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '15%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        var class_form = (full.signed_form != "") ? "" : "hidden" ;

                        return '<a href="legalization/get-form/'+full.id+'" target="_blank" type="button" class="btn btn-xs btn-info"><i class="fa fa-download"></i> Application</a> <a href="/motorized_form/'+full.id+'/'+ full.signed_form+'" target="_blank" type="button" '+class_form+' class="  btn btn-xs btn-primary"><i class="fa fa-download"></i> Signed</a> ' ;
                  }
            },
            
            {   
                "data":"id",
                 "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                  {
                      $(nTd).css('text-align', 'left');
                      $(nTd).css('width', '15%');
                  },
                  "mRender": function( data, type, full ,meta) {

                        return '<button onclick="editMotorized('+full.id+')"  data-toggle="modal" class="btn btn-info text-white btn-sm"><i class="fa fa-pencil"></i> Edit </button> @if (auth()->user()->is_admin)  <a href="delete-motorized/'+full.id+'" type="button" type="button" class="btn btn-white btn-sm"><i class="fa fa-times"></i> Delete </a> @endif';
                  }
            },

        ]
    });
        
     $(".form-motorized").on('submit', function(e) {
        e.preventDefault();
        manage_motorized();
    });

    function manage_motorized(){
        show();
        let form_data = new FormData($(".form-motorized")[0]);
          form_data.append('_method', 'post');
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              url: "{{ route('motorized.store') }}",
              type: 'POST', 
              dataType:'text',
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,       
              success: function(data){
                show('none');
                motorized_table.ajax.reload();

                alert('Data successfully saved. You can input data continously');

                document.getElementById("form-motorized").reset();
              },
              error: function(data){
                alert('something went wrong');
              }
          });
    }

    var motorized_id;
    function editMotorized (id) {
        $("#file_ul").empty();
        show();
        $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "edit-motorized/"+id,
          type: 'get', 
          dataType:'text',
          cache: false,
          contentType: false,
          processData: false, 
          success: function(data){
            
            $("#signed_form").empty();

            var info = JSON.parse(data);

            motorized_id = info.id;
            $('input[name="case_no"]').val(info.case_no);
            $('input[name="operator_name"]').val(info.operator_name);
            $('input[name="address"]').val(info.address);
            $('input[name="motor_name"]').val(info.motor_name);
            $('input[name="motor_number"]').val(info.motor_no);
            $('input[name="motor_chassic"]').val(info.motor_chassic);
            $('input[name="plate_number"]').val(info.plate_number);
            $('input[name="date_issued"]').val(info.date_issued);
            $('input[name="vice_mayor"]').val(info.vice_mayor);
            $('input[name="age"]').val(info.age);

            $("#txtoperator").text(info.operator_name);

            if (info.signed_form) {

                $("#signed_form").html('<label>Download signed form:</label> <a href="motorized_form/'+info.id+'/'+info.signed_form+'" target="_blank" type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i> Signed form ('+info.signed_form+')</a>');

            }

            $("#edit_motorized").modal('show');
            show('none');
          },
          error: function(data){

          }
        });
    }

    $(".form-update-motorized").on('submit', function(e) {
        e.preventDefault();
        update_motorized();
    });

     function update_motorized(){
        show();
        let form_data = new FormData($(".form-update-motorized")[0]);
          form_data.append('_method', 'put');
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              url: `motorized/${motorized_id}`,
              type: 'POST', 
              dataType:'text',
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,       
              success: function(data){
                var info = JSON.parse(data);

                motorized_table.ajax.reload();
                
                alert('Data successfully updated.');

                $("#signed_form").empty();
                if (info.signed_form) {
                    $("#signed_form").html('<label>Download signed form:</label> <a href="motorized_form/'+info.id+'/'+info.signed_form+'" target="_blank" type="button" class="btn btn-xs btn-warning"><i class="fa fa-download"></i> Signed form ('+info.signed_form+')</a>');
                }


                show('none');
              },
              error: function(data){
                alert('something went wrong');
              }
          });
    }

     $('#btn-new').on( 'click', function () {
        document.getElementById("form-motorized").reset();
        $('#new_motorized').modal('show');
    });


    $('#txtcase_no').on( 'keyup', function () {
        motorized_table.column(0).search( this.value ).draw();
    });

    $('#txtoperator_name').on( 'keyup', function () {
        motorized_table.column(1).search( this.value ).draw();
    });

     $('#txtmotor_name').on( 'keyup', function () {
        motorized_table.column(2).search( this.value ).draw();
    });
    $('#txtdate').on( 'keyup', function () {
        motorized_table.column(3).search( this.value ).draw();
    });

    $('#txtstatus').on( 'change', function () {
        motorized_table.column(4).search( this.value ).draw();
    })
    // $('#txtcategory').on( 'change', function () {
    //     motorized_table.column(4).search( this.value ).draw();
    // });

    // $('#txtsponsor').on( 'keyup', function () {
    //     motorized_table.column(6).search( this.value ).draw();
    // });
</script>
@endsection
