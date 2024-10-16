<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/card-input.css" rel="stylesheet">
  <title>カード情報-入力 | C.C.Donuts</title>
</head>
<main>
  <div class="main-inner">
    <p>
      <a href="index.php">
        <img src="common/images/logo.svg" alt="logo" class="logo">
      </a>
    </p>
    <h2>カード情報登録</h2>
    <?php
    $card_name = $card_type = $card_no = $card_month = $card_year = $card_security_code = '';
    if (isset($_SESSION['customer'])) {
      $card_name = $_SESSION['customer']['name'] ?? '';
      $card_type = $_SESSION['card']['card_type'] ?? '';
      $card_no = $_SESSION['card']['card_no'] ?? '';
      $card_month = $_SESSION['card']['card_month'] ?? '';
      $card_year = $_SESSION['card']['card_year'] ?? '';
      $card_security_code = $_SESSION['card']['card_security_code'] ?? '';
      echo <<<END
    <form action="card-confirm.php" method="post">
    <p class="title">お名前（必須）</p>
    <p><input type="text" id="card_name" name="card_name" value="{$card_name}" required></p>
    <p class="title">カード会社（必須）</p>
    <label><input type="radio" name="card_type" value="JCB" required checked>JCB</label>
    <label><input type="radio" name="card_type" value="Visa" required>Visa</label>
    <label><input type="radio" name="card_type" value="Mastercard" required>Mastercard</label>
    <p class="title">カード番号（必須）</p>
    <p><input type="text" id="card_no" name="card_no" value="{$card_no}" required></p>
    <p class="title">有効期限（必須）</p>
    <p><input type="text" id="card_month" name="card_month" value="{$card_month}" required>月</p>
    <p><input type="text" id="card_year" name="card_year" value="{$card_year}" required>年</p>
    <p class="title">セキュリティコード（必須）</p>
    <p><input type="text" id="card_security_code" name="card_security_code" value="{$card_security_code}" required></p>
    <button type="submit">ご入力内容を確認する</button>
    </form>
END;
    } else {
      echo '<h2>ログインしていません。</h2>';
    }
    ?>
  </div>
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>