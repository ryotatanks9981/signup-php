<?php

session_start();
session_regenerate_id(true);

require_once './classes/UserLogic.php';

$err[] = [];

$token = filter_input(INPUT_POST, 'csrf_token');
//トークンがない、もしくは一致しない場合、処理を中止
if(isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエスと'); 
}
//セッションが消える（２回目に送信されてきた時にセッションがないから二重送信対策になる。）
unset($_SESSION['csrf_token']);


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
    UserLogic::createUser($_POST);
    header('Location: user_info.php');
}