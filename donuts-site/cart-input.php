<?php session_start();
// 送信データ確認用
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
// エラー確認用
// error_reporting(E_ALL);ini_set('display_errors,1');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/cart.css" rel="stylesheet">
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
  require 'includes/database.php';
  if (isset($_SESSION['customer'])) {
    // セットされていればtrue
    echo '<p class="user">ようこそ　', $_SESSION['customer']['name'], '様</p>';
  } else {
    echo '<p class="user">ようこそ　ゲスト様</p>';
  }
  echo '<p class="border"></p>'
  ?>
  <!-- /ログイン情報ここまで -->

  <?php
  if (!empty($_POST['count'])) {
    // if (preg_match('/^(?=.*[0-9])[0-9]{2}$/', $_POST['count']) && $_POST['count'] > 0) {
    // 追加した商品のID取得
    $id = $_REQUEST['id'];

    if (!isset($_SESSION['product'])) {
      $_SESSION['product'] = [];
    }

    //商品の個数カウント
    $count = 0;

    //選択した商品が既にカートに入っているかどうか判定
    if (isset($_SESSION['product'][$id])) {
      //選択した商品と同じidの商品がカートに入っている場合true
      //$countの変数に商品の個数を代入(productというセッションが持つidのcountを$countに代入)
      $count = $_SESSION['product'][$id]['count'];
    }

    //product変数に追加したいカートの情報を保存する
    $_SESSION['product'][$id] = [
      'name' => $_REQUEST['name'],
      'price' => $_REQUEST['price'],
      //もともとの個数＋追加した個数(なかったら指定1)
      'count' => $count + ($_REQUEST['count'])
    ];

    //完了メッセージ
    echo '  <div class="grid">';
    echo '<p class="cart-action">カートに商品を追加しました。</p>';
    echo '</div>';

    //カート情報の出力
    require 'cart.php';
    // } 
    // else {
    //   // 個数０以下
    //   echo <<<END
    //   <div class="login-box">
    //   <p>個数は1以上を入力してください。</p>
    //   <p class="reverse"><a href="javascript:void(0);" onclick="goBack()">ひとつ前の画面に戻る</a></p>
    //   </div>
    //   END;
    // }
  } else {
    // 個数空
    echo <<<END
       <div class="login-box">
        <p>個数が入力されていないか、<br>0が指定されています。<br>個数は1以上を入力してください。</p>
        <p class="reverse"><a href="javascript:void(0);" onclick="goBack()">ひとつ前の画面に戻る</a></p>
        </div>
 END;
  }
  ?>

  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>