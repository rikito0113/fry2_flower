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
    <form action="/Admin/eventInfoConfirm" method="POST">
        @csrf
        <textarea name="title" cols="50" rows="4" placeholder="タイトルを入力"></textarea>
        <textarea name="content" cols="50" rows="4" placeholder="メッセージを入力"></textarea>
        <br />
        <input type="text" name="start_time" placeholder="開始時間">
        <input type="text" name="end_time" placeholder="終了時間">
        <input type="text" name="banner_img" placeholder="バナーファイル名">
        <input type="text" name="content_img" placeholder="画像ファイル名">
        <button type="submit" onclick="submit();">確認へ</button>
    </form>
    <br><br>

    {{-- 今までの新着情報 --}}
    @if (isset($all_event_info))
        <table border="1" bordercolor="red" width="80%">
            <tr>
                <td>event_info_id</td>
                <td>作成日</td>
                <td>タイトル</td>
                <td>内容</td>
                <td>開始時間</td>
                <td>終了時間</td>
                <td>バナーファイル名</td>
                <td>画像ファイル名</td>
            </tr>
            @foreach ($all_event_info as $row)
                <tr>
                    <td>{{ $row->event_info_id }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{!! $row->content !!}</td>
                    <td>{{ $row->start_time }}</td>
                    <td>{{ $row->end_time }}</td>
                    <td>{{ $row->banner_img }}</td>
                    <td>{{ $row->content_img }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>

</body>
</html>
