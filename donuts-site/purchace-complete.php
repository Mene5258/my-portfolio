<?php session_start() ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/purchace-complete.css" rel="stylesheet">
  <title>ご購入完了 | C.C.Donuts</title>

  <main>
    <div class="main-inner">
      <p>
        <a href="index.php">
          <img src="common/images/logo.svg" alt="logo" class="logo">
        </a>
      </p>

      <?php
      // 購入したらカート空にする10071449
      if (isset($_SESSION['product'])) {
        unset($_SESSION['product']);
        unset($_SESSION['card_name']);
        unset($_SESSION['card_type']);
        unset($_SESSION['card_no']);
        unset($_SESSION['card_month']);
        unset($_SESSION['card_year']);
        unset($_SESSION['card_security_code']);
      }
      ?>
      <h2>ご購入完了</h2>
      <div class="container">
        <p>ご購入が完了しました。</p>
        <p>今後ともご愛顧の程、宜しくお願いいたします。</p>
      </div>
      <p class="return-top">
        <a href="index.php">TOPページへ戻る</a>
    </div>
  </main>

  <?php require 'includes/footer.php';
