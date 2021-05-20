<?php

require_once('./env.php');
ini_set('display_errors', true);

/**
 * データベースに接続
 * @param void
 * @return $pdo
 */
function connect() {
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $password = DB_PASSWORD;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch (PDOException $e) {
        echo '接続失敗です。'.$e->getMessage();
        exit();
    }
    
}