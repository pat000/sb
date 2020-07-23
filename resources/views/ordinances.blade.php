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
        @include('new_ordinance')    
                                
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title pb-3">
                    <h5>Ordinances</h5>
                    <div class="ibox-tools">
                        
                        <a href="#">
                            <button class="btn btn-primary" data-target="#new_ordinance" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Ordinance</button>
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
                                            <td><input type="text" name="" id="txtorno" class="form-control" placeholder="Ordinance No."></td>
                                            <td><input type="text" name="" id="txttitle" class="form-control" placeholder="Title"></td>
                                            <td><input type="text" name="" id="txtdate" class="form-control" placeholder="Date Approved"></td>
                                            <td>
                                                <select class="form-control" id="txtstatus">
                                                    <option disabled="" selected="">-- Select status</option>

                                                    <option >Implemented</option>
                                                    <option >Not Implemented</option>
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
                                            <th hidden> Remarks</th>
                                            <th hidden> Uploaded By</th>
                                            <th width="200px"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ordinances as $ordinance)

                                        @php
                                            $attachment_arr = @unserialize($ordinance->uploaded_file);

                                            $folder = $attachment_arr['attachment_folder'];
                                            $files = $attachment_arr['files'];
                                        @endphp


                                        <tr >
                                            <td > {{$ordinance->ordinance_number}} </td>
                                            <td width="500px"> <strong>{{$ordinance->title}}</strong></td>
                                            <td >{{date("M d, Y",strtotime($ordinance->date_approved))}}</td>
                                            <td >  
                                                @if ($ordinance->status == 1) 
                                                    <span class="label label-primary">Implemented</span> 
                                                @elseif ($ordinance->status == 2) 
                                                    <span class="label label-success">Approved</span> 
                                                @elseif ($ordinance->status == 3) 
                                                    <span class="label label-warning">Disapproved</span> 
                                                @else 
                                                    <span class="label label-default">Not Implemented</span> 
                                                @endif

                                            </td>
                                            <td > {{$ordinance->category->name}}</td>
                                            <td > 

                                             <a  data-target="#edit_resolution{{$ordinance->id}}" data-toggle="modal"   class="btn btn-white btn-sm"><i class="fa fa-folder-o"></i> {{ ( empty($files) ? 'No' : count($files) )}} File (s) </a>
                                             
                                            <td> {{ $ordinance->sponsor }}</td>
                                            <td hidden=""> {{$ordinance->remarks}}</td>
                                            <td hidden="">{{$ordinance->added_by->name}}</td>
                                            <td width="200px">    

                                                {{-- <a  onclick='' data-target="#view_history{{$ordinance->id}}" data-toggle="modal" type="button"  class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a> --}}

                                                <a onclick='' data-target="#edit_ordinance{{$ordinance->id}}" data-toggle="modal" type="button" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>

                                                <a href="delete-ordinance/{{$ordinance->id}}" type="button" type="button" class="btn btn-white btn-sm"><i class="fa fa-times"></i> Delete </a>

                                                
                                            </td>
                                        </tr>
                                        @include('edit_ordinance')
                                        @include('view_history')
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
                                    columns: [ 0, 2, 1 ,3, 4, 6]
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
