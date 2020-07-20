@extends('layouts.header')

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
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        @include('new_account')    
                       <button class="btn btn-primary" data-target="#new_account" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Account</button>
                        
                        <table id='' class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th > Name </th>
                                    <th > Email</th>
                                    <th > Created By</th>
                                    <th > Role</th>
                                    <th > Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}
                                    </td>
                                    <td>{{$user->email}}
                                    </td>
                                    <td>
                                    </td>
                                    <td>{{$user->role}}
                                    </td>
                                    <td>
                                        <a onclick='' data-target="#edit_account{{$user->id}}" data-toggle="modal" type="button"><i title='edit' class="fa fa-edit"></i></a>
                                        <a  href="reset-account/{{$user->id}}" type="button"><i title='reset password' class="fa fa-undo"></i></a><br>
                                    </td>
                                </tr>
                                @include('edit')    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        @include('new_category')    
                       <button class="btn btn-primary" data-target="#new_category" data-toggle="modal" type="button"><i class="fa fa-plus"></i>&nbsp;New Category</button>
                        
                        <table id='' class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th > Name </th>
                                    <th > Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a onclick='' data-target="#edit_category{{$category->id}}" data-toggle="modal" type="button"><i title='edit' class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @include('edit_category')    
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
<script type='text/javascript'>
    
    
</script>
@endsection
