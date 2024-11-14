<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>dispatche</h1>
    <form action="/menu" method="get">
        @csrf
        <input type="submit" value="menuに戻る">
    </form>
    <form action="/dispatche/create" method="get">
        @csrf
        <input type="submit" value="派遣情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>人材氏名</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($dispatches as $dispatche)
                <tr>
                    <td>{{$dispatche->event->name}}</td>
                    <td>{{$dispatche->worker->name}}</td>
                    <td>
                        <form action="/dispatche/{{$dispatche->id}}/edit" method="get">
                            @csrf
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route("dispatche.destroy", $dispatche->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" onclick="return confirm('削除してもよろしいですか？')" value="削除">
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
    @if(session("res"))
        <p>{{ session("res") }}</p>
    @endif
</body>

</html>