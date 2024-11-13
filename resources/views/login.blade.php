<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        @csrf
        email:<input type="text" name="email"><br>
        password:<input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
    @if(session("error"))
        <p>{{ session("error") }}</p>
    @endif
</body>

</html>