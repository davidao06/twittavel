<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/register.css" rel="stylesheet">

    </head>
    <body>
        @if (session('error'))
        <span class="alertError">
            {{ session('error') }}
        </span>
        @endif
        <form method="post" action="{{route('registerPost')}}" class="formregister">
            @csrf
            <span class="registerText">REGISTER</span>
            <label for="username" class="registerLabels">Username</label>
            <input type="text" name="username" id="username"
                placeholder="Insira o seu username" class="registerInput" autocomplete="off" required>
            <label for="pass" class="registerLabels">Password</label>
            <input type="password" name="password" id="pass"
                placeholder="Insira a sua password" class="registerInput" required>
            <label for="confPass" class="registerLabels">Confirm Password</label>
            <input type="password" name="confPass" id="confPass"
                placeholder="Insira a sua password novamente" class="registerInput" required>
            <button type="submit" class="registerSubmit">Register</button>
        </form>
        <div class="registerError"><span>{{$errors->first('failedRegister')}}</span></div>
    </body>
</html>
