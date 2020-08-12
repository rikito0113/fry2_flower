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
    <div style="text-align: center">
        [未返信]
    </div>
    ・<a href="{{ route('admin.shouldReplyNormal') }}">花嫁修行未返信</a><br>
    <br>
    ・<a href="{{ route('admin.shouldReplyEvent') }}">外へ行く未返信</a><br>
</div>

</body>
</html>
