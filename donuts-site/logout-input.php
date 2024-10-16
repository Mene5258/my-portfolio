<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/logout-input.css" rel="stylesheet">
  <script src="common/js/drawer.js"></script>
  <title>ログアウト-入力 | C.C.Donuts</title>
</head>
<?php
require 'includes/header.php';
// header終了タグまで
?>

<main>
  <?php
  if (isset($_SESSION['customer'])) {
    echo <<<END
    <p class="user">ようこそ　{$_SESSION['customer']['name']}様</p>
    <p class="border"></p>
    <h2>ログアウト</h2>
    <form action="logout-complete.php" method="post">
      <p>ログアウトしますか？</p>
      <button class="login" type="submit">ログアウトする</button>
    </form>
    END;
  } else {
    echo <<<END
      <p class="user">ようこそ ゲスト様</p>
      <p class="border"></p>
      <h2>ログアウト中です</h2>
      <p class="not-input">
        <a href="login-input.php">ログインページへ戻る</a>
      </p>
      END;
  }
  ?>
</main>

<?php
//footer開始タグから
require '../donuts-site/includes/footer.php';
?>