<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/event" method="get">
        @csrf
        <input type="submit" value="eventに戻る">
    </form>
    <form action="/event" method="post">
        @csrf
        イベント名: <input type="text" name="name"><br>
        開催場所 : <input type="text" name="place"><br>
        開催日時 : <input type="date" name="date"><br>
        <input type="submit" value="新規登録">
    </form>

    
</body>

</html>