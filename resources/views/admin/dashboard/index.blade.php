@extends('layouts.master')
@section('PageTitle', 'Dashboard')
@section('breadcrumb')
    <li><a href=""><i class="demo-pli-home"></i></a></li>
    <li><a href="">Dashboard</a></li>
@endsection
<style>
    #tasks p {
        color: white !important;
    }
    #page-head p,h3 {
        color:white !important;
    }
    #page-content h3{
        color:black !important;
    }
</style>
@section('content')
    <div id="page-head">

        <div class="pad-all text-center">
            <h3>Welcome back to the <strong>Mouthmark</strong></h3>
            <p>Scroll down to see quick links and overviews of your website<p></p>
            </div>
    </div>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div id="page-content">
                        <h3>TASKS</h3>
                        <hr>
                        <div id="tasks" class="row">
                            <div class="col-md-2">
                                <div style="background: #000 !important;"
                                     class="panel panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['today']}}</p>
                                        <strong><p class="mar-no">Today</p></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-primary panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['total']}}</p>
                                        <strong><p class="mar-no">Total Tasks</p></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-warning panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['tasks_pending']}}</p>
                                        <strong><p class="mar-no">Pending</p></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-success panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['task_approved']}}</p>
                                        <strong><p class="mar-no">Approved</p></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-info panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['task_completed']}}</p>
                                        <strong><p class="mar-no">Completed</p></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-danger panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="fa fa-flag icon-2x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold">{{$tasks_count['task_discard']}}</p>
                                        <strong><p class="mar-no">Discard</p></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>USERS</h3>
                        <hr>
                        <div id="tasks" class="row">
                            <div class="col-md-4">
                                <div class="panel panel-success panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-bold"><i class="fa fa-user"></i> USERS</p>
                                        <p class="mar-no text-bold">
                                            <span class="pull-right text-bold">{{$users}}</span> Total Users
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span class="pull-right text-bold">{{$super_admins}}</span> Total
                                            Superadmins
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span class="pull-right text-bold">{{$admins}}</span> Total Admins
                                        </p>
                                    </div>
                                    <div class="pad-top text-center">
                                        <!--Placeholder-->
                                        <div id="demo-sparkline-area" class="sparklines-full-content">
                                            <canvas width="240" height="60"
                                                    style="display: inline-block; width: 240px; height: 60px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-info panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-bold"><i class="demo-pli-data-storage icon-fw"></i>
                                            ADVERTISERS</p>
                                        <p class="mar-no text-bold">
                                            <span class="pull-right text-bold">{{$advertiser_count['total']}}</span>
                                            Total
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span
                                                class="pull-right text-bold">{{$advertiser_count['adv_approved']}}</span>
                                            Approved
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span
                                                class="pull-right text-bold">{{$advertiser_count['adv_pending']}}</span>
                                            Pending
                                        </p>
                                    </div>
                                    <div class="pad-top text-center">
                                        <!--Placeholder-->
                                        <div id="demo-sparkline-area" class="sparklines-full-content">
                                            <canvas width="240" height="60"
                                                    style="display: inline-block; width: 240px; height: 60px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-dark panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-bold"><i class="demo-pli-data-storage icon-fw"></i>
                                            INFLUENCERS</p>
                                        <p class="mar-no text-bold">
                                            <span class="pull-right text-bold">{{$influencer_count['total']}}</span>
                                            Approved
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span
                                                class="pull-right text-bold">{{$influencer_count['inf_approved']}}</span>
                                            Approved
                                        </p>
                                        <p class="mar-no text-bold">
                                            <span
                                                class="pull-right text-bold">{{$influencer_count['inf_pending']}}</span>
                                            Pending
                                        </p>
                                    </div>
                                    <div class="pad-top text-center">
                                        <!--Placeholder-->
                                        <div id="demo-sparkline-area" class="sparklines-full-content">
                                            <canvas width="240" height="60"
                                                    style="display: inline-block; width: 240px; height: 60px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-md-5">--}}
                        {{--                                <div class="panel panel-info panel-colorful">--}}
                        {{--                                    <div class="panel-body text-center clearfix">--}}
                        {{--                                        <div class="col-sm-4 pad-top">--}}
                        {{--                                            <div class="text-lg">--}}
                        {{--                                                <p class="text-5x text-thin text-main">{{$users}}</p>--}}
                        {{--                                            </div>--}}
                        {{--                                            <p class="text-sm text-bold text-uppercase">USERS</p>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="col-sm-8">--}}
                        {{--                                            <p class="text-2x">Total Users</p>--}}
                        {{--                                            <ul class="list-unstyled text-center bord-top pad-top mar-no row">--}}
                        {{--                                                <li class="col-xs-4">--}}
                        {{--                                                    <span class="text-lg text-semibold text-main">{{$advertiser_count['total']}}</span>--}}
                        {{--                                                    <p class="text-sm text-muted mar-no">Advertisers</p>--}}
                        {{--                                                </li>--}}
                        {{--                                                <li class="col-xs-4">--}}
                        {{--                                                    <span class="text-lg text-semibold text-main">{{$influencer_count['total']}}</span>--}}
                        {{--                                                    <p class="text-sm text-muted mar-no">Influencers</p>--}}
                        {{--                                                </li>--}}
                        {{--                                                <li class="col-xs-4">--}}
                        {{--                                                    <span class="text-lg text-semibold text-main">{{$admins}}</span>--}}
                        {{--                                                    <p class="text-sm text-muted mar-no">Admin</p>--}}
                        {{--                                                </li>--}}
                        {{--                                            </ul>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                        </div>--}}

                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-xs-12">--}}
                        {{--                                <div class="panel">--}}
                        {{--                                    <div class="panel-heading">--}}
                        {{--                                        <h3 class="panel-title">Activity Logs</h3>--}}
                        {{--                                    </div>--}}

                        {{--                                    <!--Data Table-->--}}
                        {{--                                    <!--===================================================-->--}}

                        {{--                                    <div class="panel">--}}
                        {{--                                        <div class="panel-body">--}}
                        {{--                                            <div id="demo-dt-basic_wrapper"--}}
                        {{--                                                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">--}}
                        {{--                                                <div class="row">--}}
                        {{--                                                    <div class="col-sm-12">--}}
                        {{--                                                        <table id="demo-dt-basic"--}}
                        {{--                                                               class="table table-striped table-bordered dataTable no-footer dtr-inline"--}}
                        {{--                                                               cellspacing="0" width="100%" role="grid"--}}
                        {{--                                                               aria-describedby="demo-dt-basic_info"--}}
                        {{--                                                               style="width: 100%;">--}}
                        {{--                                                            <thead>--}}
                        {{--                                                            <tr role="row">--}}
                        {{--                                                                <th class="sorting_asc" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 181px;"--}}
                        {{--                                                                    aria-sort="ascending"--}}
                        {{--                                                                    aria-label="Name: activate to sort column descending">--}}
                        {{--                                                                    Name--}}
                        {{--                                                                </th>--}}
                        {{--                                                                <th class="sorting" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 274px;"--}}
                        {{--                                                                    aria-label="Position: activate to sort column ascending">--}}
                        {{--                                                                    Position--}}
                        {{--                                                                </th>--}}
                        {{--                                                                <th class="min-tablet sorting" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 130px;"--}}
                        {{--                                                                    aria-label="Office: activate to sort column ascending">--}}
                        {{--                                                                    Office--}}
                        {{--                                                                </th>--}}
                        {{--                                                                <th class="min-tablet sorting" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 82px;"--}}
                        {{--                                                                    aria-label="Extn.: activate to sort column ascending">--}}
                        {{--                                                                    Extn.--}}
                        {{--                                                                </th>--}}
                        {{--                                                                <th class="min-desktop sorting" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 138px;"--}}
                        {{--                                                                    aria-label="Start date: activate to sort column ascending">--}}
                        {{--                                                                    Start date--}}
                        {{--                                                                </th>--}}
                        {{--                                                                <th class="min-desktop sorting" tabindex="0"--}}
                        {{--                                                                    aria-controls="demo-dt-basic" rowspan="1"--}}
                        {{--                                                                    colspan="1" style="width: 102px;"--}}
                        {{--                                                                    aria-label="Salary: activate to sort column ascending">--}}
                        {{--                                                                    Salary--}}
                        {{--                                                                </th>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            </thead>--}}
                        {{--                                                            <tbody>--}}

                        {{--                                                            <tr role="row" class="odd">--}}
                        {{--                                                                <td tabindex="0" class="sorting_1">Airi Satou</td>--}}
                        {{--                                                                <td>Accountant</td>--}}
                        {{--                                                                <td>Tokyo</td>--}}
                        {{--                                                                <td>33</td>--}}
                        {{--                                                                <td>2008/11/28</td>--}}
                        {{--                                                                <td>$162,700</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="even">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Angelica Ramos</td>--}}
                        {{--                                                                <td>Chief Executive Officer (CEO)</td>--}}
                        {{--                                                                <td>London</td>--}}
                        {{--                                                                <td>47</td>--}}
                        {{--                                                                <td>2009/10/09</td>--}}
                        {{--                                                                <td>$1,200,000</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="odd">--}}
                        {{--                                                                <td tabindex="0" class="sorting_1">Ashton Cox</td>--}}
                        {{--                                                                <td>Junior Technical Author</td>--}}
                        {{--                                                                <td>San Francisco</td>--}}
                        {{--                                                                <td>66</td>--}}
                        {{--                                                                <td>2009/01/12</td>--}}
                        {{--                                                                <td>$86,000</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="even">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Bradley Greer</td>--}}
                        {{--                                                                <td>Software Engineer</td>--}}
                        {{--                                                                <td>London</td>--}}
                        {{--                                                                <td>41</td>--}}
                        {{--                                                                <td>2012/10/13</td>--}}
                        {{--                                                                <td>$132,000</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="odd">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Brenden Wagner</td>--}}
                        {{--                                                                <td>Software Engineer</td>--}}
                        {{--                                                                <td>San Francisco</td>--}}
                        {{--                                                                <td>28</td>--}}
                        {{--                                                                <td>2011/06/07</td>--}}
                        {{--                                                                <td>$206,850</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="even">--}}
                        {{--                                                                <td tabindex="0" class="sorting_1">Brielle Williamson--}}
                        {{--                                                                </td>--}}
                        {{--                                                                <td>Integration Specialist</td>--}}
                        {{--                                                                <td>New York</td>--}}
                        {{--                                                                <td>61</td>--}}
                        {{--                                                                <td>2012/12/02</td>--}}
                        {{--                                                                <td>$372,000</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="odd">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Bruno Nash</td>--}}
                        {{--                                                                <td>Software Engineer</td>--}}
                        {{--                                                                <td>London</td>--}}
                        {{--                                                                <td>38</td>--}}
                        {{--                                                                <td>2011/05/03</td>--}}
                        {{--                                                                <td>$163,500</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="even">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Caesar Vance</td>--}}
                        {{--                                                                <td>Pre-Sales Support</td>--}}
                        {{--                                                                <td>New York</td>--}}
                        {{--                                                                <td>21</td>--}}
                        {{--                                                                <td>2011/12/12</td>--}}
                        {{--                                                                <td>$106,450</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="odd">--}}
                        {{--                                                                <td class="sorting_1" tabindex="0">Cara Stevens</td>--}}
                        {{--                                                                <td>Sales Assistant</td>--}}
                        {{--                                                                <td>New York</td>--}}
                        {{--                                                                <td>46</td>--}}
                        {{--                                                                <td>2011/12/06</td>--}}
                        {{--                                                                <td>$145,600</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            <tr role="row" class="even">--}}
                        {{--                                                                <td tabindex="0" class="sorting_1">Cedric Kelly</td>--}}
                        {{--                                                                <td>Senior Javascript Developer</td>--}}
                        {{--                                                                <td>Edinburgh</td>--}}
                        {{--                                                                <td>22</td>--}}
                        {{--                                                                <td>2012/03/29</td>--}}
                        {{--                                                                <td>$433,060</td>--}}
                        {{--                                                            </tr>--}}
                        {{--                                                            </tbody>--}}
                        {{--                                                        </table>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                    <!--===================================================-->--}}
                        {{--                                    <!--End Data Table-->--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
