<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>flower girls</title>
</head>
<body> -->
@include('header')

    {{-- body --}}
    <div style="text-align:center;">

        {{-- イベント情報 スライダー表示 --}}
        <div style="color: white; background-color: black; text-align:center;">イベント情報</div>
        <div height="20%" style="text-align: center">
            スライダーを表示する!!!!
        </div>

        <br><br>

        {{-- girl表示 --}}
        @foreach ($owned_char_info as $index => $char)
            <span width="20%">
                <img src="{{ asset('/images/character/'.$char->avatar_img.'.png') }}" alt="girl" width="19%">
            </span>
            @if ($index % 3 == 0)
                <br>
            @endif
        @endforeach
    </div>

    <br><br>

    トップ〜〜〜<br>
    <p>
    player_id ::: {{$test_1}}
    </p>

@include('footer')
<!-- </body>
</html> -->
