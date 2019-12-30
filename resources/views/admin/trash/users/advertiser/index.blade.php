@extends('layouts.master')
@section('pageTitle', 'Admins')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li class="active">Advertiser</li>
@endsection
<style>
</style>
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Advertiser</h3>
                    </div>
                    @if(session()->has("error"))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("error")}}</stong>
                        </div>
                    @endif
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("success")}}</stong>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-body">
                                <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th class="min-tablet">Full Name</th>
                                        <th class="min-tablet">Type</th>
                                        <th class="min-tablet">Status</th>
                                        <th class="min-desktop">Details</th>
                                        <th class="min-desktop">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inf as $i)
                                        <tr>
                                            <td>{{$i->full_name}}</td>
                                            <td>{{$i->type}}</td>
                                            <td>
                                                @if($i->account_status == "pending")
                                                    <kbd>Pending</kbd>
                                                @endif
                                                @if($i->account_status == "approved")
                                                    <kbd style="background-color: limegreen">Approved</kbd>
                                                @endif
                                                @if($i->account_status == "rejected")
                                                    <kbd style="background-color: red">Rejected</kbd>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-success"
                                                   href="{{url('users/advertiser/'. $i->id . '/edit/')}}"><i
                                                            class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle rowlink" data-toggle="dropdown" href="#">
                                                        <kbd>Discard</kbd>
                                                    </a>
                                                    <i style="color:black !important;" class="fa fa-caret-down"></i>
                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                        <li>
                                                             <span>
                                                                 <form action="{{url('trash/users/delete/'.$i->id)}}"
                                                                       method="POST">
                                                                     @csrf
                                                                     @method('DELETE')
                                                                     <button style="background-color: red;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Permanent Delete</button>
                                                                 </form>
                                                            </span>
                                                        </li>
                                                        <li>
                                                             <span>
                                                                <form action="{{url('trash/users/recycle/'.$i->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                     <button style="background-color: limegreen;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Recycle</button>
                                                                 </form>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($inf as $i)
                        <div class="modal fade" id="{{$i->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <h5 class="heading">Are you sure you want to delete <span
                                                    class="text-success">{{$i->username}}</span></h5>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-times fa-4x animated rotateIn"></i>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <form method="POST" action="{{url('users/influencer/' . $i->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="btn" data-dismiss="modal">No</a>
                                            <button type="submit" class="btn btn-danger waves-effect">Yes</button>

                                        </form>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection