<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side')

<div class="main">
    <div style="text-align: center">
        <form action="/admin/register_title" method="POST">
            @csrf
            <input type="text" name="content" placeholder="新しい称号を入力">
            <input type="submit" value="追加">
        </form>
    </div>

    <br>

    <table>
        <th>title_id</th>
        <th>title_text</th>
        @foreach ($titles as $title)
            <td>{{ $title->title_id }}</td>
            <td>{{ $title->title_text }}</td>
        @endforeach
    </table>
</div>

</body>
</html>