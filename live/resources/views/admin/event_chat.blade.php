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

    @if (isset($chat_info))
        @foreach ($chat_info as $char_name => $chats)
            <div  style="text-align: center;">
                <span style="color: red">
                    {{$char_name}}
                </span>
                <br>
                @foreach ($chats as $row)
                    <div class="chat">
                        <span style="font-size: small; float: {{$row->side}};">
                            {{$row->created_at}}
                        </span>
                        <br>
                        <div class="chat-text-{{$row->side}}">
                            <p class="chat-text">
                                {{$row->content}}
                            </p>
                        </div>
                    </div>
                @endforeach

                <form action="/Admin/eventChatSend" method="POST">
                    @csrf
                    @if (isset($fixed_phrase))
                        <input type="text" name="content" value="{{ $fixed_phrase->content }}">
                    @else
                        <input type="text" name="content" placeholder="定型文はありません">
                    @endif
                    <input type="hidden" name="player_id" value="{{ $chats[0]->player_id }}">
                    <input type="hidden" name="scenario_id" value="{{ $chats[0]->scenario_id }}">
                    <input type="submit" value="送信">
                </form>
            </div>
            <br><br><br>
        @endforeach
    @endif
</div>

</body>
</html>