@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <body class="hold-transition login-page">
        <div id="app">
            <div class="login-box">
                <div class="login-logo">
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

                <div class="login-box-body">
                    <p class="login-box-msg"> Sign in to start your session</p>
                    <form action="{{ url('/login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control"
                                   placeholder="Email: id@aui.ma" name="email"/>
                            <span class="fa fa-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control"
                                   placeholder="Password" name="password"/>
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input style="display:none;" type="checkbox"
                                               name="remember"> &nbsp; Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit"
                                        class="btn btn-success btn-block btn-flat">Sign In
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <a class="btn btn-default btn-flat btn-block"
                       href="{{ url('/password/reset') }}">I forgot my password</a>
                    <a class="btn btn-default btn-flat btn-block" href="{{ url('/register') }}"
                       class="text-center">I don't have an account</a>

                </div>

            </div>
        </div>
        @include('layouts.partials.scripts_auth')

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
