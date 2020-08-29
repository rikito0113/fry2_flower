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
    <form action="/Admin/newsConfirm" method="POST">
        @csrf
        <textarea name="title" cols="50" rows="4" placeholder="タイトルを入力"></textarea>
        <textarea name="content" cols="50" rows="4" placeholder="メッセージを入力"></textarea>
        <button type="submit" onclick="submit();">確認へ</button>
    </form>
    <br><br>

    {{-- 今までの新着情報 --}}
    @if (isset($all_news))
        <table border="1" bordercolor="red" width="60%">
            <tr>
                <td>news_id</td>
                <td>title</td>
                <td>content</td>
            </tr>
            @foreach ($all_news as $row)
                <tr>
                    <td>{{$row->news_id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{!! $row->content !!}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>

</body>
</html>
