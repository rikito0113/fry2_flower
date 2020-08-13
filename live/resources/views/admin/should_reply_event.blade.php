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
    @foreach ($list as $key => $value)
        <h2 style="text-align: center">{{$key}}</h2>
        <table border="1" width="100%">
            <tr>
              <th>キャラ名</th>
              <th>message</th>
              <th>時間</th>
              <th>ユーザー名</th>
            </tr>
            @if (isset($list))
                @foreach ($list as $l)
                <tr>
                    <td>{{$l->char_name}}</td>
                    <td>{{$l->content}}</td>
                    <td>{{$l->created_at}}</td>
                    <td>{{$l->player_name}}</td>
                </tr>
                @endforeach
            @endif
        </table>
    @endforeach
</div>

</body>
</html>
