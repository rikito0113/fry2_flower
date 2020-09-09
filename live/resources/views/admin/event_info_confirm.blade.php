<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu'=>'event_info'])

<div id="Contents">
    <form action="/Admin/eventInfoSend" method="POST">
        @csrf
        <textarea readonly name="title" cols="50" rows="4">{{ $title }}</textarea>
        <textarea readonly name="content" cols="50" rows="4">{{ $content }}</textarea>
        <br />
        <input type="text" name="start_time" value="{{ $start_time }}">
        <input type="text" name="end_time" value="{{ $end_time }}">
        <input type="text" name="banner_img" value="{{ $banner_img }}">
        <input type="text" name="content_img" value="{{ $content_img }}">
        <button type="submit" onclick="submit();">最終送信ボタン</button>
    </form>
</div>

</body>
</html>
