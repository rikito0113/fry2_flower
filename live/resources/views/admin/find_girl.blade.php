<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu' => 'find_girl'])

<div id="Contents">
    <div style="text-align: center">
        私は管理画面のガール検索だ。
    </div>
</div>

</body>
</html>
