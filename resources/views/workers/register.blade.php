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
    <form action="/worker" method="post">
        @csrf
        氏名: <input type="text" name="name"><br>
        Email : <input type="text" name="email"><br>
        Password : <input type="text" name="password"><br>
        メモ : <input type="text" name="memo"><br>
        <input type="submit" value="新規登録">
    </form>

   
</body>

</html>