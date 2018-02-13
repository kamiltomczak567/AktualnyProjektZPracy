<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CMS U4U - TOPOZ</title>
    
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('backend/img/favicon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/css/app.css')}}">
</head>

<body class="login">

    <div id="app">
        <div class="login-container">

          <div class="row">

            @if (\Session::has('error'))
            <div class="error">{!! \Session::get('error') !!}</div>
            @endif

            <img src="../backend/img/logo-u4u.png">
            <form method="POST" action="{{ route('post-login') }}" class="form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12">
                        <div class="input-field">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" required>
                            <label for="email">ADRES E-MAIL</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field">
                            <input id="password" type="password" name="password" class="validate" pattern=".{8,}" required>
                            <label for="password">HASŁO</label>
                        </div>
                    </div>
                </div>

                <div class="remember-me">
                    <label>
                        <div class="checkbox">
                            <input type="checkbox" name="remember-me">
                            <span></span>
                        </div>    
                        Zapamiętaj mnie
                    </label>
                </div>
                <div>
                    <button class="button-yellow" type="submit">ZALOGUJ</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDof_9Q5vlf7L2iOzbE9yEoxyaRgjt7p70"></script>
<script type="text/javascript" src="{{URL::asset('backend/js/app.js')}}"></script>

</body>
</html>