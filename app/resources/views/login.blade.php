<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/login.css" rel="stylesheet">

    </head>
    <body>

        <form method="post" action="{{route('auth.user')}}" class="formLogin">
            @csrf
            <label for="username" class="loginLabels">Username</label>
            <div class="loginError"><span>{{$errors->first('username')}}</span></div>
            <input type="text" name="username" id="username" placeholder="Insira o seu username" class="loginInput" autocomplete="off">
            <label for="pass" class="loginLabels">Password</label>
            <div class="loginError"><span>{{$errors->first('password')}}</span></div>
            <input type="password" name="password" id="pass" placeholder="Insira a sua password" class="loginInput">
            <button type="submit" class="loginSubmit">Login</button>
            <div class="loginError"><span>{{$errors->first('failedLogin')}}</span></div>
        </form>

    </body>
</html>
