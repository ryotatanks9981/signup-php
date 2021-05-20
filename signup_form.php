<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form action="signup.php" method="post">
    <p><label for="username" style="width: 100px;">ユーザー名:</label><input type="username" name="username"></p>
    <p><label for="email"style="width: 100px;">メールアドレス:</label><input type="email" name="email"></p>
    <p><label for="password"style="width: 100px;">パスワード:</label><input type="password" name="password"></p>
    <p><label for="conf_password"style="width: 100px;">確認用パスワード:</label><input type="password" name="conf_password"></p>
    <p><input type="submit" value="新規登録"></p>
    </form>
</body>
</html>