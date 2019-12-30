@extends('layouts.master')
@section('pageTitle', 'Create Banners')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li><a href="{{url('banners')}}"> User</a></li>
    <li class="active">Create</li>

@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Users</h3>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <strong>{{ session()->get('error') }}</strong>
                        </div>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('user-create/')}}">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Name<span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" placeholder="Full Name" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email<span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" placeholder="Email" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Password<span
                                                style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" placeholder="Password" required class="form-control">
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