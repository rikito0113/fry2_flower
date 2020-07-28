<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flower girls 管理画面</title>
</head>
<body>

<div style="text-align: center">
    <form action="/Admin/loginExec" method="POST">
        @csrf
        <input type="text" name="id" size="40" placeholder="id">
        <input type="password" name="password" size="40" placeholder="password">
        <input type="submit" value="ログイン">
    </form>
</div>

</body>
</html>