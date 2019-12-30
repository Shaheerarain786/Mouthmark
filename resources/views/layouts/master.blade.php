<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.head')
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    @include('layouts.header')
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    @yield('title')
                </div>
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </div>
            @yield('content')
        </div>
        @include('layouts.sidebar')
    </div>
    @include('layouts.footer')
</div>
@include('layouts.scripts')
</body>
</html>

