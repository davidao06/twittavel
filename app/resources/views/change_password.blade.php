<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/password.css" rel="stylesheet">

    </head>
    <body>

        @if (session('error'))
            <span class="alert alert-danger">
                {{ session('error') }}
            </span>
        @endif
        @if (session('success'))
            <span class="alert alert-success">
                {{ session('success') }}
            </span>
        @endif
        @if($errors)
            @foreach ($errors->all() as $error)
                <span class="alert alert-danger">{{ $error }}</span>
            @endforeach
        @endif
        <form method="post" action="{{route('change.passwordPost')}}" class="formLogin">
            @csrf
            <label for="oldPass" class="loginLabels">Old Password</label>
            <input type="password" name="oldPass" id="oldPass" placeholder="Insira a sua password antiga" class="loginInput">
            <label for="newPass" class="loginLabels">New Password</label>
            <input type="password" name="newPass" id="newPass" placeholder="Insira a sua nova password" class="loginInput">
            <label for="confPass" class="loginLabels">Confirm Password</label>
            <input type="password" name="confPass" id="confPass" placeholder="Confirme a nova password" class="loginInput">
            <button type="submit" class="loginSubmit">Change Password</button>
        </form>

    </body>
</html>
