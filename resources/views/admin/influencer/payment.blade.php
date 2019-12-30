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
                        <div class="panel panel-default">
                            <div style="background-color: #7665e5" class="panel-heading">
                                <h3 style="color: white;" class="panel-title" data-toggle="collapse"
                                    href="#multiCollapseExample1">Detail</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel">

                                        <!--Block Styled Form -->
                                        <!--===================================================-->
                                        <form>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Name</label>
                                                            <input readonly type="text" class="form-control" value="John">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Type</label>
                                                            <input readonly type="text" class="form-control" value="Debit Card">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Holder's Name</label>
                                                            <input readonly type="email" class="form-control" value="John Doe">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Billing Address</label>
                                                            <input readonly type="url" class="form-control" value="GH-N 346, California">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Zipcode</label>
                                                            <input readonly type="email" class="form-control" value="3450000">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Number</label>
                                                            <input readonly type="url" class="form-control" value="123xxxxxxxxxxxx123">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Card Expiry Date</label>
                                                            <input readonly type="email" class="form-control" value="12/12/2020">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">CCV</label>
                                                            <input readonly type="url" class="form-control" value="3344">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>
                                        </form>
                                        <!--===================================================-->
                                        <!--End Block Styled Form -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
