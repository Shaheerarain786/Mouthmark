@extends('layouts.master')
@section('pageTitle', 'Admins')
@section('breadcrumb')
    <li><a href="{{url('admin')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('admin')}}">Dashboard</a></li>
    <li class="active">Task</li>
@endsection

@section('content')
    <style>
        .dropdown-menu a {
            margin-left: 20px;
        }

        .task_image {
            max-height: 500px;
            max-width: 800px;
        }
    </style>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Tasks</h3>
                    </div>
                    @if(session()->has("error"))
                        <div class="alert alert-danger">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <span style="color:white">{{session()->get("error")}}</span>
                        </div>
                    @endif
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <span style="color: white;">{{session()->get("success")}}</span>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-body">
                                <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>

                                        <th>Sr No</th>
                                        <th>User Name</th>
                                        <th>Title</th>
                                        <th>Media</th>
                                        <th>Filters</th>
                                        <th>Countries</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $key => $task)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{isset($task->user->username) ? $task->user->username : "Not Added"}}</td>
                                            <td>{{$task->title}}</td>
                                            @if($task->filter_applied == 1)
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                            data-target="#image-{{$task->id}}">
                                                        <i
                                                                class="fas fa-image"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#filter-{{$task->id}}"><i
                                                                class="fas fa-filter"></i></button>
                                                </td>
                                            @else
                                                <td>Not Applied</td>
                                                <td>Not Applied</td>
                                            @endif
                                            @if(!is_null($task->country_filter))
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                                            data-target="#country-{{$task->id}}">
                                                        <i
                                                                class="fas fa-flag"></i></button>
                                                </td>
                                            @else
                                                <td>Not Applied</td>
                                            @endif
                                            <td>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle rowlink" data-toggle="dropdown" href="#">
                                                        @if($task->status == "pending")
                                                            <kbd style="background-color:blue;color: white;">{{$task->status}}</kbd>
                                                        @elseif($task->status == "completed")
                                                            <kbd style="background-color:limegreen;color: white;">{{$task->status}}</kbd>
                                                        @elseif($task->status == "discard")
                                                            <kbd style="background-color:red;color: white;">{{$task->status}}</kbd>
                                                        @else
                                                            <kbd style="background-color:green;color: white;">{{$task->status}}</kbd>
                                                        @endif
                                                    </a>
                                                    <i style="color:black !important;" class="fa fa-caret-down"></i>
                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                        <li>
                                                             <span>
                                                                 <form action="{{url('tasks/completed/'.$task->id)}}"
                                                                       method="POST">
                                                                     @csrf
                                                                     @method('PUT')
                                                                     <button style="background-color: limegreen;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Completed</button>
                                                                 </form>
                                                            </span>
                                                        </li>
                                                        <li>
                                                             <span>
                                                                <form action="{{url('tasks/pending/'.$task->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                     <button style="background-color: blue;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Pending</button>
                                                                 </form>
                                                            </span>
                                                        </li>
                                                        <li>
                                                             <span>
                                                                <form action="{{url('tasks/discard/' . $task->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                     <button style="background-color: red;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Discard</button>
                                                                 </form>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <form action="{{url('tasks/approved/' . $task->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                     <button style="background-color: green;color: white;"
                                                                             class="btn btn-sm btn-block" type="submit">Approved</button>
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
                    {{--                    FILTERS MODEL START--}}
                    @foreach($tasks as $task)
                        <div class="modal fade" id="filter-{{$task->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Filters Applied</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="fa fa-2x" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <table id="demo-dt-selection" class="table table-striped table-bordered"
                                               cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>

                                                <th>Sr No</th>
                                                <th>Gender</th>
                                                <th>Min Age</th>
                                                <th>Max Age</th>
                                                <th>User Required</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--                                            @foreach($tasks as $key => $task)--}}
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{isset($task->filters->gender) ? $task->filters->gender : "Not Added"}}</td>
                                                <td>{{isset($task->filters->min_age) ? $task->filters->min_age : "Not Added"}}</td>
                                                <td>{{isset($task->filters->max_age) ? $task->filters->max_age : "Not Added"}}</td>
                                                <td>{{isset($task->filters->user_required) ? $task->filters->user_required : "Not Added"}}</td>
                                            </tr>
                                            {{--                                            @endforeach--}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <a type="button" class="btn" data-dismiss="modal"><i
                                                    class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    @endforeach
                    {{--                    FILTERS MODEL END--}}
                    {{--                    COUNTRY MODEL START--}}
                    @foreach($tasks as $task)
                        <div class="modal fade" id="country-{{$task->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Countries Selected</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="fa fa-2x" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            @foreach($task->country_filter as $key => $val)
                                                <li class="list-group-item">{{$val->country}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <a type="button" class="btn" data-dismiss="modal"><i
                                                    class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    @endforeach
                    {{--                    COUNTRY MODEL END--}}
                    {{--                    COUNTRY MODEL START--}}
                    @foreach($tasks as $task)
                        <div class="modal fade" id="image-{{$task->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Task Media</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="fa fa-2x" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <img class="task_image" src="{{$task->task_image}}">
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <a type="button" class="btn" data-dismiss="modal"><i
                                                    class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                    @endforeach
                    {{--                    COUNTRY MODEL END--}}
                </div>
            </div>
        </div>
    </div>
@endsection
