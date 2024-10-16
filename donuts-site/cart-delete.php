<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css"
    rel="stylesheet">
  <link href="common/css/cart.css" rel="stylesheet">
  </link>
  <script src="common/js/drawer.js"></script>
  <title>カート-商品一覧| C.C.Donuts</title>
</head>

<?php
require 'includes/header.php';
// header終了タグまで
?>


<main>

  <!-- パンくず↓ -->
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">TOP</a></li>
      <li class="breadcrumb-item active" aria-current="page">カート</li>
    </ul>
  </nav>
  <p class="border"></p>
  <!-- /パンくずここまで -->

  <!-- ログイン情報ここから -->
  <?php
  // セッション変数がセットされているかどうかを判定(セッション情報がちゃんと取得できているかどうかを判断)
  if (isset($_SESSION['customer'])) {
    // セットされていればtrue
    echo '<p class="user">ようこそ　', $_SESSION['customer']['name'], '様</p>';
  } else {
    echo '<p class="user">ようこそ　ゲスト様</p>';
  }
  echo '<p class="border"></p>'
  ?>
  <!-- /ログイン情報ここまで -->

  <div class="grid">
    <?php
    unset($_SESSION['product'][$_REQUEST['id']]);

    echo '<p class="cart-action">カートから商品を削除しました。</p>'

    ?>

    <!-- カート情報の出力 -->
    <?php
    require 'cart.php';
    ?>

  </div><!-- /grid -->
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>