<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu' => 'should_reply'])

<div id="Contents">
    @if (isset($list))
        @foreach ($list as $key => $row)
            <h1 style="text-align: center"><{{$key}}></h1>
            <table border="1" width="100%">
                <tr align="center">
                    <th>キャラ名</th>
                    <th>message</th>
                    <th>時間</th>
                    <th>ユーザー名</th>
                    <th>返信する</th>
                    <th>視聴する</th>
                </tr>
                @if (isset($row))
                    @foreach ($row as $r)
                        <tr align="center">
                            <td>{{$r->char_name}}</td>
                            <td>{{$r->content}}</td>
                            <td>{{$r->created_at}}</td>
                            <td>{{$r->player_name}}</td>
                            <td> <a href="/Admin/eventChat/{{$r->scenario_id}}/{{$r->player_id}}">返信する</a></td>
                            <td>視聴用</td>
                        </tr>
                    @endforeach
                @else
                    <div style="text-align: center">
                        {{$key}}での未返信はありません。
                    </div>
                @endif
            </table>
        @endforeach
    @endif
</div>

</body>
</html>
