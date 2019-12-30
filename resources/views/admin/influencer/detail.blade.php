@extends('layouts.master')
@section('pageTitle', 'Edit Admin')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li><a href="{{url('admin/admins')}}"> Influencer</a></li>
    <li class="active">Update</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Influencer</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('users/influencer/'. $inf->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="panel panel-default">
                                <div style="background-color: #7665e5" class="panel-heading">
                                    <h3 style="color: white;" class="panel-title" data-toggle="collapse"
                                        href="#multiCollapseExample1">Detail</h3>
                                </div>
                                <div class="panel-body" id="multiCollapseExample1">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Full
                                                Name<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="full_name" required placeholder="Name"
                                                       class="form-control" value="{{$inf->full_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Username
                                                <span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="username" required
                                                       placeholder="Username"
                                                       id="demo-hor-inputemail" class="form-control"
                                                       value="{{$inf->username}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Type<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="type" required placeholder="Type"
                                                       class="form-control" value="influencer">
                                            </div>
                                        </div>

                                        @if($inf->user_images != null)

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">CNIC front
                                                    <span
                                                            style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <img src="{{$inf->user_images->cnic_front}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">CNIC back
                                                    <span
                                                            style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <img src="{{$inf->user_images->cnic_back}}">
                                                </div>
                                            </div>
                                        @else
                                        @endif

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Status<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" id="status">
                                                    <option disabled readonly value="">Select Role</option>
                                                    <option @if($inf->account_status == "pending") selected
                                                            @endif value="pending">Pending
                                                    </option>
                                                    <option @if($inf->account_status == "approved") selected
                                                            @endif value="approved">Approved
                                                    </option>
                                                    <option @if($inf->account_status == "rejected") selected
                                                            @endif value="rejected">Rejected
                                                    </option>
                                                    {{--                                            <option @if($user->account_status == "discard") selected @endif value="discard">Discard</option>--}}
                                                </select>
                                            </div>
                                        </div>
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
