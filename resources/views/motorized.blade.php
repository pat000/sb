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
        @include('new_motorized')    
                                
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title pb-3">
                    <h5>Legalization</h5>
                    <div class="ibox-tools">
                        
                        <a href="#">
                            <button class="btn btn-primary" data-target="#new_motorized" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Legalization</button>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                
                                
                                <table id='' class="table table-striped table-bordered table-hover dataTables-example mb-5" >
                                    <thead>
                                       
                                        <tr>
                                            <th > Case No. </th>
                                            <th width="500px"> Operator Informations</th>
                                            <th width="300px"> Vehicle Informations</th>
                                            <th > Date Issued</th>
                                            <th>Status</th>
                                            <th>Attachments</th>
                                            <th width="200px"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($motorized as $motor_info)

                                        <tr >
                                            <td > {{$motor_info->case_no}} </td>
                                            <td width="500px"> <strong>{{$motor_info->operator_name}}</strong> <br><small>Address : {{$motor_info->address}}</small> <br> <small>Age : {{$motor_info->age}}</small></td>
                                            
                                            <td width="300px">
                                                <strong>{{$motor_info->motor_name}}</strong>
                                                <br>
                                                <small>No:  {{ $motor_info->motor_no}}</small>
                                                <br>
                                                <small>Chassic:  {{ $motor_info->motor_chassic}}</small>
                                                <br>
                                                <small>Plate No:  {{ $motor_info->plate_number}}</small>
                                            </td>

                                            <td >{{date("M d, Y",strtotime($motor_info->date_issued))}}</td>
                                            
                                            @php
                                                $date_now = \Carbon\Carbon::now();
                                                $date_issue = \Carbon\Carbon::parse($motor_info->date_issued);

                                                $data_status = $date_now->diffInYears($date_issue);
                                            @endphp
                                            <td><span class="label {{($data_status >= 3) ? 'label-danger' : 'label-success'}}"> {{($data_status >= 3) ? 'Expired' : 'Good'}}</span></ntd>

                                            <td>
                                                <a href="{{ route('get-form', $motor_info->id) }}" target="_blank" type="button" class="btn btn-xs btn-info"><i class="fa fa-download"></i> Application</a>

                                                @if ($motor_info->signed_form)

                                                    <a href="{{ url('motorized_form/'.$motor_info->id.'/'.$motor_info->signed_form) }}" target="_blank" type="button" class="btn btn-xs btn-primary"><i class="fa fa-download"></i> Signed</a>
                                                @endif
                                                
                                            </td>

                                            <td width="200px">    

                                                <a onclick='' data-target="#edit_motorized{{$motor_info->id}}" data-toggle="modal" type="button" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>

                                                @if (auth()->user()->is_admin) 
                                                <form  style="display:inline-block;" method="post" action="{{route('motorized.destroy' ,$motor_info->id )}}">
                                                    {{ csrf_field() }}
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-white btn-sm"><i class="fa fa-times"></i> Delete </button>
                                                </form>
                                                @endif
                                                

                                                
                                            </td>
                                        </tr>
                                        @include('edit_motorized')
                                        {{-- @include('view_history') --}}
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>


<div class="footer">
    
</div>

</div>



@endsection


@section('js-custom')
<script type="text/javascript">
    
    var ordinance_table = $('.dataTables-example').DataTable({
                            lengthMenu: [[10, 25, 50,-1], [10, 25, 50,"All"]],
                            // pageLength: -1,
                            scrollY:        true,
                            responsive: true,
                            searching: true,
                            ordering: false,
                     
                            // dom: "<'html5buttons'B>Tfglip",
                            dom: '<"html5buttons"B>lTfgitp',

                            buttons: [
                            // { extend: 'copy'},
                            {extend: 'csv'},
                            {extend: 'excel', title: 'ExampleFile'},
                            {extend: 'pdf', title: 'ExampleFile'},
                            
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 2, 1 ,6]
                                },
                                title : '{{config('app.name')}} - Ordinances',
                                
                                customize: function (win)
                                {
                                    $(win.document.body).addClass('white-bg');
                                    $(win.document.body).css('font-size', '10px');
                                    $(win.document.body).css('margin', '20px');

                    
                                    $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                                }
                            }]
                            
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
</script>
@endsection
