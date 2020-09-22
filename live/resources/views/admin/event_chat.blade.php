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
    <div style="width: 100%; color: white; background-color: gray; text-align:center;">
        @if ($is_read)
            既読しました。
        @else
            閲覧のみです。既読はつけていません。
        @endif
    </div>

    @if (isset($chat_info))
        {{-- ガール立ち絵 --}}
        <div class="wrapper_girl">
            <div class="girl-img" style="width: 60%">
                <img src="{{ asset('/images/character/'.$scenario_info->default_background.'.png') }}" alt="background" width="100%"><br>
                <div class="avatar">
                    <img src="{{ asset('/images/character/'.$scenario_info->char_id.'.png') }}" alt="avatar" width="100%"><br>
                </div>
            </div>
        </div>

        @foreach ($chat_info as $char_name => $chats)
            <div class="wrapper_chat">
                <span style="color: red">
                    {{$char_name}}
                </span>
                <br>
                <div class="chat_scroll">
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
                </div>

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
                        <button type="submit" onclick="submit();">確認へ</button>
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
