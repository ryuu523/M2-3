<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/dispatche" method="get">
        @csrf
        <input type="submit" value="dispatcheに戻る">
    </form>
    <form action="/dispatche" method="post">
        @csrf
        イベント名:
        <select name="event">
            @foreach ($events as $event)

                <option value="{{$event->id}}">{{$event->name}}</option>
            @endforeach
        </select><br>
        人材氏名 :
        <select name="workers[]" multiple>
            @foreach ($workers as $worker)

                <option value="{{$worker->id}}">{{$worker->name}}</option>
            @endforeach
        </select>
        <br>
        memo:<input type="text" name="memo"><br>
        <input type="submit" value="新規登録">
    </form>


</body>

</html>