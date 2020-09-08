<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls login</title>
</head>
<body>
    <form action="/loginExec" method="POST">

        pf_player_id : <input type="text" name="pf_player_id" size="40" placeholder="pf_player_idを入力してください"> <br>
        <input type="submit" value="Login">
    </form>

    <br><br>

    <div>
        <a href="{{ route('register') }}">登録はこちら</a>
    </div>
</html>
