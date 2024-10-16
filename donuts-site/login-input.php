<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/login-input.css" rel="stylesheet">
  <script src="common/js/drawer.js"></script>
  <title>ログイン-入力 | C.C.Donuts</title>


</head>

<body>

<?php
require 'includes/header.php';
 // header終了タグまで
?>
  <main>
    <p class="user">ようこそ　ゲスト様</p>
    <p class="border"></p>
    <h2>ログイン</h2>
    <form action="login-complete.php" method="post">
      <p>メールアドレス</p>
      <p><input type="email" id="mail" name="mail" required></p>
      <p>パスワード</p>
      <p><input type="password" id="password" name="password" required></p>
      <button class="login" type="submit">ログインする</button>
    </form>

    <p class="not-input">
      <a href="customer-input.php">会員登録がお済みでない方はこちら</a>
    </p>

  </main>



  <?php
  //footer開始タグから
  require 'includes/footer.php';
  ?>