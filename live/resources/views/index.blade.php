<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls</title>
    <script type="text/javascript" src="https://spgm.nijiyome.jp/js/touch.js"></script>
    @if ($first == 1)
        <script>
            document.addEventListener = nijiyome.auth({
            state: 'd144c46760d8b0bc4c3e1a6143c744be',
            });
        </script>
    @endif
</head>
<body style="margin:0px;">
    <div>
        @if ($player_id != 0)
            <a href="{{ route('login') }}">
                <img src="{{ asset('/images/title_logo.png') }}" alt="title_logo" width="100%">
            </a>
        @else
            <a href="{{ route('register') }}">
                <img src="{{ asset('/images/title_logo.png') }}" alt="title_logo" width="100%">
            </a>
        @endif
    </div>
</body>
</html>
