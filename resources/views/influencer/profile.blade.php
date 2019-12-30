@include('layouts.head')

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container">


    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay"></div>


    <!-- REGISTRATION FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <form class="panel-body form-horizontal form-padding" action="{{url('profile')}}" method="POST">
                                @csrf
                                <div class="mar-ver pad-btm text-center">
                                    <h1 class="h3">Create a New Account</h1>
                                    <kbd>Sign Up as influencer</kbd>
                                </div>

                                <!--Text Input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="demo-text-input">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="demo-text-input" name="first_name" class="form-control"
                                               placeholder="First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="demo-text-input">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="demo-text-input" name="last_name" class="form-control"
                                               placeholder="Last Name">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-9">
                                        <div class="radio">
                                            <input id="demo-inline-form-radio" class="magic-radio" type="radio"
                                                   name="gender" value="male">
                                            <label for="demo-inline-form-radio">Male</label>

                                            <input id="demo-inline-form-radio-2" class="magic-radio" type="radio"
                                                   name="gender" value="female">
                                            <label for="demo-inline-form-radio-2">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Profile Image</label>
                                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file" name="profile_image">
					                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">CNIC Front</label>
                                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file" name="cnic_front">
					                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">CNIC Back</label>
                                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file" name="cnic_back">
					                        </span>
                                    </div>
                                </div>
                                <input type="hidden" name="uid" value="{{$inf->id}}">
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <input class="btn btn-success" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('layouts.scripts')

</body>
</html>
