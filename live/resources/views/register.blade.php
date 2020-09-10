<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls login</title>
</head>
<body>
    <form action="/registerExec" method="POST">
        @csrf
        <input type="hidden" value="{{ $pf_player_id }}" name="pf_player_id">
        name : <input type="text" name="name" size="40" placeholder="nameを入力してください"> <br>
        <input type="submit" value="Login">
    </form>
</html>
