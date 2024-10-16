<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/login-complete.css" rel="stylesheet">
  <script src="common/js/drawer.js"></script>
  <title>ログイン-完了 | C.C.Donuts</title>
</head>
<?php
require 'includes/header.php';
// header終了タグまで
?>

<main>
  <?php
  unset($_SESSION['customer']);
  require 'includes/database.php';
  $sql = $pdo->prepare('select * from customer where mail=? and password=?');
  $sql->execute([$_REQUEST['mail'], $_REQUEST['password']]);
  foreach ($sql as $row) {
    $_SESSION['customer'] = [
      'id' => $row['id'],
      'name' => $row['name'],
      'kana' => $row['kana'],
      'post_code' => $row['post_code'],
      'address' => $row['address'],
      'mail' => $row['mail'],
      'password' => $row['password']
    ];
  }
  if (isset($_SESSION['customer'])) {
    echo <<<END
  <p class="user">ようこそ　{$row['name']}様</p>
  <p class="border"></p>
  <h2>ログイン完了</h2>
  <p class="login-box">ログインが完了しました。</p>
  <p class="reverse">
    <a href="index.php">topページへ戻る</a>
  </p>
END;
  } else {
    echo <<<END
  <p class="user">ようこそ　ゲスト様</p>
  <p class="border"></p>
  <h2>ログインエラー</h2>
  <p class="login-box">
  メールアドレス<br>
  または<br>
  パスワードが違います
  </p>
  <p class="reverse">
    <a href="login-input.php">ログインページへ戻る</a>
  </p>
END;
  }
  ?>
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>