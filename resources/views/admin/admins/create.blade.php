@extends('layouts.master')
@section('pageTitle', 'Create Admin')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li><a href="{{url('admin/admins')}}"> Admin</a></li>
    <li class="active">Create</li>

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
                        <form class="form-horizontal" method="POST" action="{{route('admins.store')}}">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Username<span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" required placeholder="Username" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email <span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" required placeholder="Email"
                                               id="demo-hor-inputemail" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Role <span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="role_id" id="roles">
                                            <option disabled selected value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password <span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" required placeholder="Password"
                                               id="demo-hor-inputpass" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-offset-3 col-sm-9">
                                    <button class="btn btn-success" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $("#roles").select2();
    })

</script>