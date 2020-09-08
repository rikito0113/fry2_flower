@include('header')
    <form action="/loginExec" method="POST">
        @csrf
        pf_player_id : <input type="number" name="pf_player_id" size="40" placeholder="pf_player_idを入力してください"> <br>
        <input type="submit" value="Login">
    </form>

    <br><br>

    <div>
        <a href="{{ route('register') }}">登録はこちら</a>
    </div>


@include('footer')
