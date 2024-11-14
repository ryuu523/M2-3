<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/worker" method="get">
        @csrf
        <input type="submit" value="workerに戻る">
    </form>
    <form action="/worker/{{$worker->id}}" method="post">
        
        @csrf
        @method("PUT")
        氏名: <input type="text" name="name" value="{{$worker->name}}"><br>
        Email : <input type="text" name="email"  value="{{$worker->email}}"><br>
        Password : <input type="text" name="password" value="{{$worker->password}}"><br>
        メモ : <input type="text" name="memo" value="{{$worker->memo}}"><br>
        <input type="submit" value="更新">
    </form>

    
</body>

</html>