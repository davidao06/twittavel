<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/profile.css" rel="stylesheet">

    </head>
    <body>
        <div class="profileContainer">
            <div class="topBar">
                <span class="welcomeProfile">Olá {{Auth::user()->username}}!</span>
                <form action="{{route('logout.user')}}" method="get">
                    @csrf
                    <input type="submit" value="Logout" class="logoutButton">
                </form>
            </div>

            <div class="messageContainer">
                <form action="{{route('add.comment')}}" method="post">
                    @csrf
                    <textarea name="messageInput" class="inputMessage"></textarea>
                    <button type="submit">Add message</button>
                </form>

                @foreach (App\Models\Message::where('user_id',Auth::user()->id)->get() as $message)
                    <div class="message">
                        <span>{{$message->messageText}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
