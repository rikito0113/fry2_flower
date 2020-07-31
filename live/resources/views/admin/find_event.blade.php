<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu' => 'find_event'])

<div id="Contents">
    <form action="/Admin/findEventPlayer" method="POST" style="text-align: center;">
        @csrf
        <input type="text" name="player_id" size="40" placeholder="playerId">
        <input type="text" name="name" size="40" placeholder="プレイヤー名"><br>
        <input type="text" name="field" size="40" placeholder="場所A">
        <input type="text" name="place" size="40" placeholder="場所B"><br>
        <input type="hidden" name="find_event" value="1">
        <input type="submit" value="検索"><br>
        ※ 各空白検索でallという意味になります。
    </form>

    <br><br>

    @if (isset($event_players))
        @foreach ($event_players as $event_player)
            @if (isset($event_player->scenario_id) && isset($event_player->player_id))
                <div style="width: 70%; display: inline-block; text-align: center; border: medium solid red;">
                    <a href="/Admin/eventChat/{{ $event_player->scenario_id }}/{{ $event_player->player_id }}">
                        {{ $event_player->name }}<br>
                        {{ $event_player->player_id }}<br>
                        {{ $event_player->scenario_id }}<br>
                    </a>
                </div>
                <br><br>
            @endif
        @endforeach
    @endif
</div>



</body>
</html>