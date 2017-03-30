@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')
    <body class="hold-transition register-page">
        <div id="app">
            <div class="register-box">
                <div class="register-logo">
                    <a class="text-green" href="{{ url('/') }}"><b>Exam</b>Planner</a>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <span class="fa fa-exclamation-triangle"></span> There were some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="register-box-body">
                    <p class="login-box-msg">Register a new account</p>
                    <form action="{{ url('/register') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control"
                                   placeholder="Full Name" name="name"
                                   value="{{ old('name') }}"/>
                            <span class="fa fa-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="email" class="form-control"
                                   placeholder="Email: id@aui.ma" name="email"
                                   value="{{ old('email') }}"/>
                            <span class="fa fa-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control"
                                   placeholder="Password" name="password"/>
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control"
                                   placeholder="Retype password"
                                   name="password_confirmation"/>
                            <span class="fa fa-repeat form-control-feedback"></span>
                        </div>

                        <div class="row">
                            <div class="col-xs-1">
                                <label>
                                    <div class="checkbox_register icheck">
                                        <label>
                                            <input type="checkbox" name="terms">
                                        </label>
                                    </div>
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <a style="text-decoration: none" href="javascript:void(0)" data-toggle="modal"
                                            data-target="#termsModal">I agree to the terms.</a>
                                </div>
                            </div>
                            <div class="col-xs-4 col-xs-push-1">
                                <button type="submit"
                                        class="btn btn-success btn-block btn-flat">Register</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <a href="{{ url('/login') }}"
                       class="btn btn-block btn-flat btn-default">I already have an account</a>
                </div>
            </div>
        </div>

        @include('adminlte::layouts.partials.scripts_auth')

        @include('adminlte::auth.terms')

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%' // optional
                });
            });
        </script>

    </body>

@endsection
