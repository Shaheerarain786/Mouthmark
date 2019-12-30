@extends('layouts.master')
@section('pageTitle', 'Admins')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active">Admin</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Admins</h3>
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
                        <a href="{{url('admins/create')}}">
                            <button type="button" class="btn  btn-dark">ADD ADMIN</button>
                        </a>
                        <div class="panel">
                            <div class="panel-body">
                                <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th class="min-tablet">Email</th>
                                        <th class="min-tablet">Role</th>
                                        <th class="min-desktop">Edit</th>
                                        <th class="min-desktop">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->username}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->roles->role}}</td>
                                            <td>
                                                <a class="btn btn-success"
                                                   href="{{url('admins/'. $admin->id . '/edit/')}}"><i
                                                            class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                        @if(auth()->user()->id == $admin->id) disabled
                                                        @endif data-toggle="modal" data-target="#{{$admin->id}}"><i
                                                            class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($admins as $admin)
                        <div class="modal fade" id="{{$admin->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <h5 class="heading">Are you sure you want to delete <span
                                                    class="text-success">{{$admin->name}}</span></h5>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-times fa-4x animated rotateIn"></i>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <form method="POST" action="{{url('admins/' . $admin->id)}}">
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
