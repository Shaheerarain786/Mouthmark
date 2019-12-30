@include('layouts.head')

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container" class="cls-container">


    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay"></div>


    <!-- REGISTRATION FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Create a New Account</h1>
                                        <kbd>Sign Up as influencer</kbd>
                </div>
                <form action="{{url('influencer')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="check">
                        <label for="demo-form-checkbox">I agree with the <a href="#" class="btn-link text-bold">Terms
                                and Conditions</a>
                        </label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Step 1</button>
                </form>
            </div>
            <div class="pad-all">
                Already have an account ? <a href="{{'login'}}" class="btn-link mar-rgt text-bold">Sign In</a>
            </div>
        </div>
    </div>

</div>
@include('layouts.scripts')

</body>
</html>
