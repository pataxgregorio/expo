@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/dashboard') }}"><b>Sistema Expoferia 2024</a>
            </div><!-- /.login-logo -->
            <div>
                <div style="border-radius: 120px; display:flex; justify-content: center;">
                    <div style="border-radius: 120px; display:flex; justify-content: center;">
                    <div>
                        <img src="/images/logo2.png" alt="logo" srcset="" style="max-width: 240px">
                    </div>
                </div>
            </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> {{ trans('message.siginsession') }} </p>

        <login-form name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"></login-form>


        <!-- <a href="{{ url('/password/reset') }}">{{ trans('message.forgotpassword') }}</a><br>
        <a href="{{ url('/register') }}" class="text-center">{{ trans('message.registermember') }}</a> -->

    </div>

    </div>
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
</body>

@endsection
