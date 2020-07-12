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
                <div class="ibox-content">
                    <div class="table-responsive">
                        @include('new_ordinance')    
                        <button class="btn btn-primary" data-target="#new_ordinance" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Ordinance</button>
                        
                        <table id='' class="table table-striped table-bordered table-hover dataTables-example mb-5" >
                            <thead>
                                <tr>
                                    <td><input type="text" name="" id="txtorno" class="form-control" placeholder="Ordinance No."></td>
                                    <td><input type="text" name="" id="txttitle" class="form-control" placeholder="Title"></td>
                                    <td><input type="text" name="" id="txtdate" class="form-control" placeholder="Date Approved"></td>
                                    <td>
                                        <select class="form-control" id="txtstatus">
                                            <option disabled="" selected="">-- Select status</option>
                                            <option>Approved</option>
                                            <option>Disapproved</option>
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
                                    <th > Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordinances as $ordinance)
                                <tr>
                                    <td > {{$ordinance->ordinance_number}} </td>
                                    <td > {{$ordinance->title}}</td>
                                    <td >{{date("M d, Y",strtotime($ordinance->date_approved))}}</td>
                                    <td > {{$ordinance->status}}</td>
                                    <td > {{$ordinance->category}}</td>
                                    <td >  <a href='{{url($ordinance->uploaded_file)}}' target='_blank'>Download File </a> </td>
                                    <td> {{ $ordinance->sponsor }}</td>
                                    <td hidden=""> {{$ordinance->remarks}}</td>
                                    <td hidden="">{{$ordinance->added_by->name}}</td>
                                    <td >    
                                        <a onclick='' data-target="#edit_ordinance{{$ordinance->id}}" data-toggle="modal" type="button"><i title='edit' class="fa fa-edit"></i></a>
                                        <a onclick='' data-target="#view_history{{$ordinance->id}}" data-toggle="modal" type="button"><i title='history' class="fa fa-eye"></i></a>
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


<div class="footer">
    
</div>

</div>



@endsection
