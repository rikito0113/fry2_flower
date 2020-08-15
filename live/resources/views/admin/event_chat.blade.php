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
    既読 : {{$is_read}}
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

                @if ($is_read)
                    <form action="/Admin/eventChatConfirm" method="POST">
                        @csrf
                        @if (isset($fixed_phrase))
                            <textarea name="content" cols="50" rows="4">{{ $fixed_phrase->content }}</textarea>
                        @else
                            <textarea name="content" cols="50" rows="4" placeholder="定型文はありません"></textarea>
                        @endif
                        <input type="hidden" name="player_id" value="{{ $chats[0]->player_id }}">
                        <input type="hidden" name="scenario_id" value="{{ $chats[0]->scenario_id }}">
                        <button type="submit" onclick="submit();">送信</button>
                    </form>
                @else
                    <div style="text-align: center">
                        視聴用のためメッセージを送信できません。
                    </div>
                @endif
            </div>
            <br><br><br>
        @endforeach
    @endif
</div>

</body>
</html>
