@extends('layouts.master')
@section('pageTitle', 'Create Admin')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li><a href="{{url('admin/admins')}}"> Roles</a></li>
    <li class="active">Create</li>

@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Roles</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('roles')}}">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Role<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="role" required placeholder="Username"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Permissions<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="permissions[]" id="demo-cs-multiselect" data-placeholder="Choose Permissions ....."
                                                multiple tabindex="4">
                                            @foreach($permissions as $per)
                                                <option value="{{$per->id}}">{{$per->name}}</option>
                                            @endforeach
                                        </select>
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
        $('.js-example-basic-multiple').select2();
    });

</script>
