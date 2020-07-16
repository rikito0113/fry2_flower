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
    <form action="/admin/find_player" method="POST">
        @csrf
        <input type="text" name="player_id" size="40" placeholder="playerId">
        <input type="text" name="pf_player_id" size="40" placeholder="PFlayerId">
        <input type="text" name="name" size="40" placeholder="プレイヤー名">
        <input type="hidden" name="find_player" value="1">
        <input type="submit" value="検索">
    </form><br>
    ※空白検索で全プレイヤーが検索できます

    <br><br>

    @if (isset($get_players))
        @foreach ($get_players as $player)
            <table border="5" bordercolor="red" width="60%">
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

    @if (isset($player_info))
        プレイヤーID : {{$player_info->player_id}}<br>
        PF別プレイヤーID : {{$player_info->pf_player_id}}<br>
        プレイヤー名 : {{$player_info->name}}<br><br>

        @if (isset($chat_info))
            @foreach ($chat_info as $char_name => $chats)
                <div style="text-align: left">
                    <span style="color: red">
                        {{$char_name}}
                    </span>
                    <br>
                    @foreach ($chats as $row)
                        <table width="100%">
                            <tr>
                                <td width="50%">{{$row->content}}</td>
                                <td style="text-align: right">{{$row->created_at}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
                <br><br><br>
            @endforeach
        @endif
    @endif
</div>

</body>
</html>