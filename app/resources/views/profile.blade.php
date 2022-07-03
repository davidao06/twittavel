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
                <form action="{{route('main.page')}}" method="post">
                    <textarea name="messageInput" class="inputMessage"></textarea>
                    <button type="submit">Add message</button>
                </form>
                <div class="message">
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet illo dignissimos rem consequuntur, repellendus vero sapiente perferendis odit quia, quisquam, similique cum accusamus nisi voluptas. Expedita harum veritatis illum rem!</span>
                </div>

                <div class="message">
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet illo dignissimos rem consequuntur, repellendus vero sapiente perferendis odit quia, quisquam, similique cum accusamus nisi voluptas. Expedita harum veritatis illum rem!</span>
                </div>

                <div class="message">
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet illo dignissimos rem consequuntur, repellendus vero sapiente perferendis odit quia, quisquam, similique cum accusamus nisi voluptas. Expedita harum veritatis illum rem!</span>
                </div>

                <div class="message">
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet illo dignissimos rem consequuntur, repellendus vero sapiente perferendis odit quia, quisquam, similique cum accusamus nisi voluptas. Expedita harum veritatis illum rem!</span>
                </div>

                <div class="message">
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet illo dignissimos rem consequuntur, repellendus vero sapiente perferendis odit quia, quisquam, similique cum accusamus nisi voluptas. Expedita harum veritatis illum rem!</span>
                </div>
            </div>
        </div>
    </body>
</html>
