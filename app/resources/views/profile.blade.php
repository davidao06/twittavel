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
                <form action="{{route('add.comment')}}" method="post"
                class="formText">
                    @csrf
                    <textarea name="messageInput" class="inputMessage"></textarea>
                    <button type="submit" class="submitMessage">Add message</button>
                </form>

                @foreach (App\Models\Message::where('user_id',Auth::user()->id)->orderBy('position')->get() as $message)
                    <div class="message">
                        <span class="positionMessage">{{$message->position}}</span>
                        <span>{{$message->messageText}}</span>
                        <div class="messageButtons">
                            <form action="{{route('up.comment',['id' => $message->id])}}" method="GET">
                                @csrf
                                <button type="submit" class="messageButton">+1</button>
                            </form>
                            <form action="{{route('down.comment',['id' => $message->id])}}" method="GET">
                                @csrf
                                <button type="submit" class="messageButton">-1</button>
                            </form>
                            <form action="{{route('del.comment',['id' => $message->id])}}" method="GET">
                                @csrf
                                <button type="submit" class="messageButton">X</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
