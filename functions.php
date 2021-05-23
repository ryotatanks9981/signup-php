<?php

/**
 * XSS対策：エスケープ処理
 * 
 * @param string $str
 * @return string $str
 */
 function h($str) {
     /**
      * @param string $string, 変換される文字
      * @param int $flag, ビットマスク
      * @param string|null $encoding, 文字を変換するときに使うエンコーディングを定義
      * @param bool $double_encode = true, 
      * @return string
      */
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
 }

 /**
  * CSRF対策
  * @param void
  * @return string csrf_token
  */

  function set_token() {
      //トークンを生成
      //フォームからそのトークンを送信
      //送信後のがめんでそのトークンを照会
      //トークンを削除
      session_start();
      //bin2hex — バイナリのデータを16進表現に変換する
    //   暗号論的に安全な、疑似ランダムなバイト列を生成する
      $csrf_token = bin2hex(random_bytes(32));
      $_SESSION['csrf_token'] = $csrf_token;
      return $csrf_token;
  }