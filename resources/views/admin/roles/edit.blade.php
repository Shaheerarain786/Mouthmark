@extends('layouts.master')
@section('pageTitle', 'Edit Admin')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li><a href="{{url('admin/admins')}}"> Admin</a></li>
    <li class="active">Update</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Admin</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('roles/' . $role->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Role <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="role" placeholder="Role" class="form-control" value="{{$role->role}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Permissions<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <select disabled id="demo-cs-multiselect" data-placeholder="Choose Permissions ....."
                                                multiple tabindex="4">
                                            @foreach($permissions as $key => $per)
                                                <option selected value="{{$per->id}}">{{$per->permission_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-offset-3 col-sm-9">
                                    <button class="btn btn-success" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
