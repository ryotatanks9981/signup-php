<?php

session_start();
session_regenerate_id(true);

$err[] = [];

if (!$username = filter_input(INPUT_POST, 'username')) {
    $err['username'] = "ユーザー名を入力してください";
}
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = "メールアドレスを入力してください";
}

$password = filter_input(INPUT_POST, 'password');
$conf_password = filter_input(INPUT_POST, 'conf_password');

if (!preg_match('/\A(?=.*?[^\w])(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[\d])[!-~]{8,100}\z/', $password)) {
    $err['password'] = "パスワードは大小英数字記号を最低1文字ずつ含んだ8~100文字以内にしてください";
}

if ($password !== $conf_password) {
    $err['conf_password'] = "パスワードが一致しません";
}

if (count($err) !== 0) {
    $_SESSION['err'] = $err;
    header("Location: signup_form.php");
    exit();
} else {
    //新規登録処理
}