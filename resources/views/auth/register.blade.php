@include('partials.head')
@section('page_title','Register')
<body>
<div id="app">
    <div class="bg-white pulldown">
        <div class="content content-boxed overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="push-30-t push-20 animated fadeIn">
                        <!-- Register Title -->
                        <div class="text-center">
                            <i class="fa fa-2x fa-circle-o-notch text-primary"></i>
                            <h1 class="h3 push-10-t">Create Account</h1>
                        </div>
                        <!-- END Register Title -->
                        <!-- Register Form -->
                        <!-- jQuery Validation (.js-validation-register class is initialized in js/pages/base_pages_register.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-register form-horizontal push-50-t push-50" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="text" name="first_name" placeholder="Please enter your first name" value="{{ old('first_name') }}" required autofocus>
                                        <label>First Name</label>
                                        @if ($errors->has('first_name'))<span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="text" name="last_name" placeholder="Please enter your last name" value="{{ old('last_name') }}" required autofocus>
                                        <label>Last Name</label>
                                        @if ($errors->has('last_name'))<span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="email" name="email" placeholder="Please enter your email address" value="{{ old('email') }}" required autofocus>
                                        <label>Email</label>
                                        @if ($errors->has('email'))<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="password" name="password" placeholder="Please enter a password" required autofocus>
                                        <label>Password</label>
                                        @if ($errors->has('password'))<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success">
                                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password...">
                                        <label for="register-password2">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <button class="btn btn-sm btn-block btn-success" type="submit">Create Account</button>
                                </div>
                            </div>
                        </form>
                        <!-- END Register Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Register Content -->

    <!-- Register Footer -->
    <div class="pulldown push-30-t text-center animated fadeInUp">
        <small class="text-muted">{{ date("Y") }}</span> &copy; Harvey Connor</small>
    </div>
    <!-- END Register Footer -->
</div>
</body>
</html>
