@extends('layouts.master')
@section('pageTitle', 'Edit Admin')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li><a href="{{url('admin/admins')}}"> Advertisers</a></li>
    <li class="active">Update</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Advertisers</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('users/advertiser/'. $user->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="panel panel-default">
                                <div style="background-color: #7665e5" class="panel-heading">
                                    <h3 style="color: white;" class="panel-title" data-toggle="collapse" href="#multiCollapseExample1">Detail</h3>
                                </div>
                                <div class="panel-body" id="multiCollapseExample1">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Full
                                                Name<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="full_name" required placeholder="Name"
                                                       class="form-control" value="{{$user->full_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email <span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="email" name="email" required placeholder="Email"
                                                       id="demo-hor-inputemail" class="form-control"
                                                       value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Type<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="type" required placeholder="Type"
                                                       class="form-control" value="advertiser">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Status<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" id="status">
                                                    <option disabled readonly value="">Select Role</option>
                                                    <option @if($user->account_status == "pending") selected
                                                            @endif value="pending">Pending
                                                    </option>
                                                    <option @if($user->account_status == "approved") selected
                                                            @endif value="approved">Approved
                                                    </option>
                                                    <option @if($user->account_status == "rejected") selected
                                                            @endif value="rejected">Rejected
                                                    </option>
                                                    {{--                                            <option @if($user->account_status == "discard") selected @endif value="discard">Discard</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($user->advertiser_profile != null)
                                <div style="background-color: #7665e5" class="panel-heading">
                                    <h3 style="color: white;" class="panel-title" data-toggle="collapse" href="#multiCollapseExample2">Personal Detail</h3>
                                </div>
                                <div class="panel-body" id="multiCollapseExample2">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">First
                                                Name<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="first_name" required
                                                       placeholder="First Name"
                                                       class="form-control"
                                                       value="{{$user->advertiser_profile->first_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Last
                                                Name<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="last_name" required
                                                       placeholder="Last Name"
                                                       class="form-control"
                                                       value="{{$user->advertiser_profile->last_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Gender<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="gender" required placeholder="Gender"
                                                       class="form-control"
                                                       value="{{$user->advertiser_profile->gender}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Gender<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="age" required placeholder="Age"
                                                       class="form-control" value="{{$user->advertiser_profile->age}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($user->advertiser_company_detail != null)
                                <div style="background-color: #7665e5" class="panel-heading">
                                    <h3 style="color: white;" class="panel-title" data-toggle="collapse" href="#multiCollapseExample3">Company Detail</h3>
                                </div>
                                <div class="panel-body" id="multiCollapseExample3">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail" >Company Name<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="company_name" required
                                                       placeholder="company_name"
                                                       class="form-control"
                                                       value="{{$user->advertiser_company_detail->company_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"
                                                   for="demo-hor-inputemail">Designation<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="designation" required
                                                       placeholder="Designation"
                                                       class="form-control"
                                                       value="{{$user->advertiser_company_detail->designation}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"
                                                   for="demo-hor-inputemail">Designation<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="company_email" required
                                                       placeholder="Company Email"
                                                       class="form-control"
                                                       value="{{$user->advertiser_company_detail->company_email}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Company
                                                Location<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="company_location" required
                                                       placeholder="Company Location"
                                                       class="form-control"
                                                       value="{{$user->advertiser_company_detail->company_location}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Company
                                                Phone Number<span
                                                        style="color:red">*</span></label>
                                            <div class="col-sm-9">
                                                <input readonly type="text" name="company_phone_number" required
                                                       placeholder="Company Phone Number"
                                                       class="form-control"
                                                       value="{{$user->advertiser_company_detail->company_phone_number}}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endif
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