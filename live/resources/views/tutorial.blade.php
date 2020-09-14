<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls login</title>
    <link rel="stylesheet" href="{{ asset('css/girl.css') }}">
    <script>
        var tutorialPhrase = @json($tutorial_phrase);
    </script>
    <script src="{{ asset('js/scene.js') }}"></script>
</head>
<body>
    <div style="text-align: center;">チュートリアル</div>
    <div class="wrapper-scene">
        <div class="chat">
            {{-- <span class="chat-text-{{$row->side}}">
                <p class="chat-text">
                    {{ $tutorialPhrase[0]->content }}
                </p>
            </span> --}}
        </div>
    </div>
    <div style="text-align: center;">
        <img src="{{ asset('/images/button/bt_talk_send.png') }}" alt="送信する" width="20%" onclick="nextClick()">
    </div>
    <br><br>
    <div style="text-align: center"><a href="{{ route('my.my') }}">スキップする</a></div>
</html>