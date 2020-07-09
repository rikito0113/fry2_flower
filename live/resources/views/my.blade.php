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
        <div style="background-color: black; color: white text-align:center;">イベント情報</div>


        <br><br>

        {{-- girl表示 --}}
        @foreach ($char_info as $index => $char)
            <span width="20%">
                <a href="/girl_select/{{ $char->char_id }}"><img src="{{ asset('/images/character/{{ $char->char_id }}.jpg') }}" alt="girl" width="19%"></a>
            </span>
            @if ($index == 3)
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
