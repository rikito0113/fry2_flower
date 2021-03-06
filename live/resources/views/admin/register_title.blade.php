<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('admin.side', ['menu'=>'regist_title'])

<div id="Contents">
    <div style="text-align: center; align:center;">
        <form action="/Admin/registerTitleExec" method="POST">
            @csrf
            <input type="text" name="content" placeholder="新しい称号を入力">
            <input type="submit" value="追加">
        </form>
    </div>

    <br>

    @if (isset($titles))
        <table>
            <tr>
                <th>title_id</th>
                <th>title_text</th>
            </tr>
            @foreach ($titles as $title)
                <tr>
                    <td>{{ $title->title_id }}</td>
                    <td>{{ $title->title_text }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>

</body>
</html>
