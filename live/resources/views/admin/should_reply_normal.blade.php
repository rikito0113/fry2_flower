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
    そい：：：{{ $is_list }}<br>
    <table border="1" width="100%">
        <tr>
          <th>id</th>
          <th>プレイヤー</th>
          <th>キャラID</th>
          <th>キャラ服id</th>
          <th>キャラ背景id</th>
          <th>message</th>
          <th>create_date</th>
        </tr>
        @if (isset($list))
            @foreach ($list as $l)
            <tr>
                <td>{{$l->player_chat_log_id}}</td>
                <td>{{$l->player_id}}</td>
                <td>{{$l->char_id}}</td>
                <td>{{$l->char_avatar_id}}</td>
                <td>{{$l->char_background_id}}</td>
                <td>{{$l->content}}</td>
                <td>{{$l->created_at}}</td>
            </tr>
            @endforeach
        @endif
    </table>
</div>

</body>
</html>
