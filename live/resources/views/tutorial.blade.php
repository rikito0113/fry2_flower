<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls login</title>
    <link rel="stylesheet" href="{{ asset('css/girl.css') }}">
</head>
<body>
    <div style="text-align: center;">チュートリアル</div>
    @foreach ($tutorial_phrase as $key => $row)
        <div class="chat">
            <span class="chat-text-{{$row->side}}">
                <p class="chat-text">
                    {{-- {!! nl2br(e($row->content)) !!} --}}
                    {{ $row->content }}
                </p>
            </span>
        </div>
    @endforeach
    <br><br>
    <div style="text-align: center"><a href="{{ route('my.my') }}">スキップする</a></div>
</html>