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

    </div>
    @if (isset($chat_info))
        {{-- ガール立ち絵 --}}
        <div class="wrapper-girl">
            <div class="girl-img" style="width: 100%">
                {{-- <img src="{{ asset('/images/character/11.png') }}" alt="background" width="100%"><br>
                <div class="avatar">
                    <img src="{{ asset('/images/character/1.png') }}" alt="avatar" width="100%"><br>
                </div> --}}
                <img src="{{ asset('/images/'.$owned_char_info->bg_img) }}" alt="background" width="100%"><br>
                <div class="avatar">
                    <img src="{{ asset('/images/'.$owned_char_info->avatar_img) }}" alt="avatar" width="100%"><br>
                </div>
            </div>
        </div>

        @foreach ($chat_info as $char_name => $chats)
            <div class="wrapper-chat">
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
                    <form action="/Admin/mainChatConfirm" method="POST">
                        @csrf
                        <textarea name="content" cols="50" rows="4" placeholder="メッセージを入力"></textarea>
                        <input type="hidden" name="player_id" value="{{ $player_info->player_id }}">
                        <input type="hidden" name="char_name" value="{{ $char_name }}">
                        <input type="hidden" name="char_id" value="{{ $char_id }}">
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
