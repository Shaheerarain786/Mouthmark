@include('layouts.head')
@section('pageTitle', 'Login')
<style>
    .panel-body {
        background-color: #7665e5 !important;
    }

    input:focus {
        background-color: #fff;
    }
</style>
<div id="container" class="cls-container">
    <div id=""></div>

    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 style="color:white" class="h3">Account Login</h1>
                    <p style="color:white">Sign In to your account</p>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                @if (session('error'))
                    <div style="background-color: white" class="alert alert-white">
                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                        <strong>{{ session()->get('error') }}</strong>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" placeholder="Email "
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>
                    </div>
                    <button style="background-color: white;color: #7665e5;" class="btn btn-primary btn-lg btn-block"
                            type="submit">Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@include('layouts.scripts')