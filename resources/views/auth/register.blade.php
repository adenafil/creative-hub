<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
<form action="/register" method="post">
    @csrf

    @if($errors->any())
        <h1>error : {{$errors->first()}}</h1>
    @endif
    <label for="name">name:</label>
    <input name="name" type="text" id="name">
    <br>

    <label for="username">username:</label>
    <input name="username" type="text" id="username">
    <br>

    <label for="email">email:</label>
    <input name="email" type="email" id="email">
    <br>

    <label for="password">password:</label>
    <input name="password" type="password" id="password">
    <br>

    <label for="password_confirmation">confirmed password:</label>
    <input name="password_confirmation" type="password" id="password_confirmation">
    <br>

    <input type="submit" value="register">
</form>
</body>
</html>
