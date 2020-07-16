<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side')

<div class="main">
    <form action="/admin/shold_reply">
        @csrf
        <input type="text" name="player_id" size="40" placeholder="playerId">
        <input type="text" name="pf_player_id" size="40" placeholder="PFlayerId">
        <input type="text" name="name" size="40" placeholder="プレイヤー名">
        <input type="hidden" name="find_player" value="1">
        <input type="submit" value="検索">
    </form><br>
    ※空白検索で全プレイヤーが検索できます(未実装)

    <br><br>

    @if ($get_players)
        @foreach ($get_players as $player)
            <table border="5" bordercolor="red">
                <tr>
                    <td>プレイヤーID</td>
                    <td><a href="/admin/player_detail/{{ $player->player_id }}">{{$player->player_id}}</a></td>
                </tr>
                <tr>
                    <td>PF別プレイヤーID</td>
                    <td>{{$player->pf_player_id}}</td>
                </tr>
                <tr>
                    <td>プレイヤー名</td>
                    <td>{{$player->name}}</td>
                </tr>
            </table>
        @endforeach
    @endif

    @if ($player_info)
        プレイヤーID : {{$player->player_id}}<br>
        PF別プレイヤーID : {{$player->pf_player_id}}<br>
        プレイヤー名 : {{$player->name}}<br><br>

        @if ($all_chats)
            @foreach ($all_chats as $chats)
                {{$chats->char_name}}<br><br>
                @foreach ($chats as $row)
                    {{$row->content}}<br>
                    {{$row->created_at}}<br><br>
                @endforeach
            @endforeach
        @endif
    @endif
</div>

</body>
</html>