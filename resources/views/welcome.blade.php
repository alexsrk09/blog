<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Symblog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body>
        @if (isset($_SESSION['user']))
            <h1>Welcome {{$_SESSION['user']->name}}</h1>
        @else
        <form method="post" action="/login">
            @csrf
            <input type="username" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="Login" />
        </form>
        <form method="post" action="/register">
            @csrf
            <input type="username" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="password2" placeholder="Repeat password" />
            <input type="email" name="email" placeholder="Email" />
            <input type="submit" value="Register" />
        </form>
        @endif
        
    </body>
</html>
