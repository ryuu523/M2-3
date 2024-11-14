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
    <form action="/dispatche/{{$dispatche->id}}" method="post">
        
        @csrf
        @method("PUT")
        イベント名: 
        <select name="event">
            @foreach ($events as $event)
            <option value="{{$event->id}}" {{$dispatche->event->id==$event->id ? "selected" : ""}}>{{$event->name}}</option>
            
            @endforeach
        </select>
        人材氏名:
            <select name="worker">
                @foreach ($workers as $worker)
                <option value="{{$worker->id}}" {{$dispatche->worker->id==$worker->id ? "selected" : ""}}>{{$worker->name}}</option>
                
                @endforeach
            </select>
        <input type="submit" value="更新">
    </form>

    
</body>

</html>