@include('header')
    <div>
        <a href="{{ route('login') }}">始まるボタン</a>
    </div>

    <div>
        <a href="{{ route('register') }}">登録はこちら</a>
    </div>

    <script>
        nijiyome.auth({
        state: 'd144c46760d8b0bc4c3e1a6143c744be',
        });
    </script>
@include('footer')
