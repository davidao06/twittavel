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
        <span class="alertError">
            {{ session('error') }}
        </span>
        @endif
        <form method="post" action="{{route('change.passwordPost')}}" class="formPass">
            @csrf
            <span class="changeText">Change Password</span>
            <label for="oldPass" class="passLabels">Old Password</label>
            <div class="passError"><span>{{$errors->first('oldPass')}}</span></div>
            <input type="password" name="oldPass" id="oldPass"
                placeholder="Insira a sua password antiga" class="passInput" required>
            <label for="newPass" class="passLabels">New Password</label>
            <div class="passError"><span>{{$errors->first('newPass')}}</span></div>
            <input type="password" name="newPass" id="newPass"
                placeholder="Insira a sua nova password" class="passInput" required>
            <label for="confPass" class="passLabels">Confirm Password</label>
            <input type="password" name="confPass" id="confPass"
                placeholder="Confirme a nova password" class="passInput" required>
            <button type="submit" class="passSubmit">Change Password</button>
        </form>
        @if (session('success'))
        <span class="alertSucess">
            {{ session('success') }}
        </span>
        @endif

    </body>
</html>
