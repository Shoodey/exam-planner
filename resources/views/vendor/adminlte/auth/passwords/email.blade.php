@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Password recovery
@endsection

@section('content')

<body class="login-page">
    <div id="app">

        <div class="login-box">
        <div class="login-logo">
            <a class="text-green" href="{{ url('/') }}"><b>Exam</b>Planner</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
            <p class="login-box-msg">Reset Password</p>
            <form action="{{ url('/password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email: id@aui.ma" name="email" value="{{ old('email') }}"/>
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-5">
                    </div>
                    <div class="col-xs-7">
                        <button type="submit" class="btn btn-success btn-block btn-flat">{{ trans('adminlte_lang::message.sendpassword') }}</button>
                    </div>
                </div>
            </form>

            <hr>

            <a class="btn btn-block btn-flat btn-default" href="{{ url('/login') }}">Sign in</a>
            <a class="btn btn-block btn-flat btn-default" href="{{ url('/register') }}" class="text-center">Register</a>

        </div>

    </div>
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
