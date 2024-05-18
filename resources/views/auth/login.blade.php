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
<form action="/login" method="post">
    @csrf

    @if($errors->any())
        <h1>error : {{$errors->first()}}</h1>
    @endif


    <label for="username">username or email:</label>
    <input name="username" type="text" id="username">
    <br>
    <label for="password">password:</label>
    <input name="password" type="password" id="password">
    <br>
    <input type="submit" value="login">
</form>
<form action="/register" method="get">
    @csrf
    <input type="submit" value="register">
</form>

</body>
</html>
