@include('layouts.head')
<style>
    #mainnav-menu i{
        color:black !important;
    }
    .active-sub active:first-child a{
        color:white !important;
    }
</style>
<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{asset('assets/img/profile-photos/1.png')}}"
                                     alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">

                                <p class="mnp-name">{{Auth::user()->name}}</p>
                                <span class="mnp-desc">{{Auth::user()->email}}</span>
                            </a>
                        </div>
                    </div>
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-header">Navigation</li>
                        <li class="{{Request::is('/') || Request::is('') ? 'active-sub' : ''}}">
                            <a href="{{url('/')}}">
                                <i class="fa fa-user-secret"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{Request::is('users') || Request::is('users/*') ? 'active-sub active' : ''}}">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">Users</span>
                                <i class="arrow"></i>
                            </a>
                            <ul>
                                <li class="{{Request::is('users/advertiser') ? 'active-sub' : ''}}">
                                    <a href="{{url('users/advertiser')}}">Advertiser</a>
                                </li>
                                <li class="{{Request::is('users/influencer') ? 'active-sub' : ''}}">
                                    <a href="{{url('users/influencer')}}">Influencer</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admins') || Request::is('admins/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/admins')}}">
                                <i class="fa fa-user-secret"></i>
                                <span class="menu-title">Admins</span>
                            </a>
                        </li>
                        <li class="{{Request::is('roles') || Request::is('roles/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/roles')}}">
                                <i class="fa fa-user-plus"></i>
                                <span class="menu-title">Roles</span>
                            </a>
                        </li>
                        <li class="{{Request::is('tasks') || Request::is('tasks/*') ? 'active-sub' : ''}}">
                            <a href="{{url('/tasks')}}">
                                <i class="fa fa-flag"></i>
                                <span class="menu-title">Tasks</span>
                            </a>
                        </li>
                        <li class="{{Request::is('trash') || Request::is('trash/*') ? 'active-sub active' : ''}}">
                            <a href="#">
                                <i class="fa fa-trash"></i>
                                <span class="menu-title">Trash</span>
                                <i class="arrow"></i>
                            </a>
                            <ul>
                                <li class="{{Request::is('trash/users') ? 'active-sub' : ''}}">
                                    <a href="{{url('trash/users')}}">Advertisers</a>
                                </li>
                                <li class="{{Request::is('trash/inf') ? 'active-sub' : ''}}">
                                    <a href="{{url('trash/inf')}}">Influencer</a>
                                </li>
                                <li class="{{Request::is('trash/tasks') ? 'active-sub' : ''}}">
                                    <a href="{{url('trash/tasks')}}">Tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{Request::is('reporting') || Request::is('reporting/*') ? 'active-sub' : ''}}">
                            <a href="{{url('reporting')}}">
                                <i class="fa fa-address-card"></i>
                                <span class="menu-title">Reporting</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
