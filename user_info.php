<?php

require_once './classes/UserLogic.php';

$result = UserLogic::checkLogin();

if (!$result)  {
    $_SESSION['err']['login_err'] = "ユーザを登録してログインしてください。";
    header("Location: signup_form.php" );
    return;
}

if ($username = filter_input(INPUT_GET, "usrname")) {
    header("Location: signup_form.php");
    exit();
}
if ($email = filter_input(INPUT_GET, "email")) {
    header("Location: signup_form.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
</head>
<body>
    <p>username: <?php echo $username ?></p>
    <p>email: <?php echo $email ?></p>
</body>
</html>