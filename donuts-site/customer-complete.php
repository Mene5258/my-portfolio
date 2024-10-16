<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/customer-complete.css" rel="stylesheet">
  <title>会員登録-完了 | C.C.Donuts</title>
</head>
<main>
  <div class="main-inner">
<p>
    <a href="index.php">
      <img src="common/images/logo.svg" alt="logo" class="logo">
    </a>
  </p>

<?php
// データベース接続
require 'includes/database.php';
// ログイン中かチェック
if (isset($_SESSION['customer'])) {
  // セットされている場合true
  // ログイン中
  // データチェック
  // ログイン中のユーザのIDを変数に代入
  $id = $_SESSION['customer']['id'];
  // SQL文の準備
  // 異なるID、同じログイン名を持つほかのユーザーが存在するか
  $sql = $pdo->prepare('select * from customer where id!=? and mail=?');
  // SQL文を実行
  $sql->execute([
    $id,
    $_REQUEST['mail']
  ]);
} else {
  // セットされていない場合false
  // ログアウト中
  // 入力チェック
  // 同じログイン名を持つユーザーがcustomerテーブルに存在するか
  // SQL文の準備
  $sql = $pdo->prepare('select * from customer where mail=?');
  // SQL文の実行
  $sql->execute([
    $_REQUEST['mail']
  ]);
}

// 変数にSQL文の実行結果を全て受けとり、代入
$sqlResults = $sql->fetchAll();

// 変数が空かどうかチェック
if (empty($sqlResults)) {
  // 空の場合true array(0)
  // 一致するレコードなし
  // 更新、新規追加可能
  // ログイン中かチェック
  if (isset($_SESSION['customer'])) {
    // セットされている場合true
    // ログイン中、更新処理
    // データベース更新
    // SQL文の準備
    $sql = $pdo->prepare('update customer set name=?,kana=?,post_code=?,address=?,mail=?,password=? where id=?');
    // SQL文の実行
    $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['kana'],
      $_REQUEST['post_code'],
      $_REQUEST['address'],
      $_REQUEST['mail'],
      $_REQUEST['password'],
      $id
    ]);

    // セッションの更新
    $_SESSION['customer'] = [
      'id' => $id,
      'name' => $_REQUEST['name'],
      'kana' => $_REQUEST['kana'],
      'post_code' => $_REQUEST['post_code'],
      'address' => $_REQUEST['address'],
      'mail' => $_REQUEST['mail'],
      'password' => $_REQUEST['password']
    ];
    // 完了メッセージ表示
    echo <<<END
    <h2>会員登録更新</h2>
    <div class="page-box">
    <p>会員登録を更新しました。</p>
    <p class="reverse">
    <a href="login-input.php">ログイン画面へ進む</a>
    </p>
    </div>  
    END;
  } else {
    // セットされていない場合false
    // ログアウト中、新規追加処理
    // SQL文の準備
    $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?,?)');
    // SQL文の実行
    $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['kana'],
      $_REQUEST['post_code'],
      $_REQUEST['address'],
      $_REQUEST['mail'],
      $_REQUEST['password']
    ]);
    // 完了メッセージ表示
    echo <<<END
    <h2>会員登録完了</h2>
    <div class="page-box">
    <p>会員登録が完了しました。</p>
    <p class="reverse">
    <a href="login-input.php">ログイン画面へ進む</a>
    </p>
    </div>  
    END;
  }
} else {
  // 空でない場合false array(1)
  // 一致するレコードあり
  // データ重複あり 更新、新規追加、不可
  // エラーメッセージ表示
  echo<<<END
  <h2>会員登録エラー</h2>
  <div class="page-box">
  <p>このメールアドレスは登録されています。</p>
  <p class="page-box-2">他のメールアドレスで登録してください。</p>
  <p class="reverse">
    <a href="customer-input.php">会員入力画面へ戻る</a>
  </p>
</div>
END;
}
?>
</div>
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>