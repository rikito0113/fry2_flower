<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu'=>'news'])

<div id="Contents">
    <form action="/Admin/newsSend" method="POST">
        @csrf
        <textarea readonly name="title" cols="50" rows="4">{{ $title }}</textarea>
        <textarea readonly name="content" cols="50" rows="4">{{ $content }}</textarea>
        <button type="submit" onclick="submit();">最終送信ボタン</button>
    </form>
</div>

</body>
</html>
