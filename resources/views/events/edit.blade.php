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
    <form action="/event/{{$event->id}}" method="post">
        
        @csrf
        @method("PUT")
        イベント名: <input type="text" name="name" value="{{$event->name}}"><br>
        開催場所: <input type="text" name="place"  value="{{$event->place}}"><br>
        開催日時 : <input type="date" name="date" value="{{$event->date}}"><br>
        <input type="submit" value="更新">
    </form>

    
</body>

</html>