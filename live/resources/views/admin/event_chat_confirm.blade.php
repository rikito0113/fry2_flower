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
                                {!! $row->content !!}
                            </p>
                        </div>
                    </div>
                @endforeach


                <form action="/Admin/eventChatSend" method="POST">
                    @csrf
                    <textarea readonly name="content" cols="50" rows="4">{{ $content }}</textarea>
                    <input type="hidden" name="player_id" value="{{ $chats[0]->player_id }}">
                    <input type="hidden" name="scenario_id" value="{{ $chats[0]->scenario_id }}">
                    <button type="submit" onclick="submit();">最終送信ボタン</button>
                </form>
            </div>
            <br><br><br>
        @endforeach
    @endif
</div>

</body>
</html>
