<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/card-complete.css" rel="stylesheet">
  <title>カード情報-完了 | C.C.Donuts</title>
</head>
<main>
  <div class="main-inner">
    <p>
      <a href="index.php">
        <img src="common/images/logo.svg" alt="logo" class="logo">
      </a>
    </p>

    <?php
    require 'includes/database.php';
//card-confirmからpostされたデータをセッションに入力
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_SESSION['card']['card_name'] = $_POST['card_name'];
      $_SESSION['card']['card_type'] = $_POST['card_type'];
      $_SESSION['card']['card_no'] = $_POST['card_no'];
      $_SESSION['card']['card_month'] = $_POST['card_month'];
      $_SESSION['card']['card_year'] = $_POST['card_year'];
      $_SESSION['card']['card_security_code'] = $_POST['card_security_code'];
    }
    // ログイン中かチェック
    // if (isset($_SESSION['customer'])) {
      // セットされている場合true
      // ログイン中
      // データチェック
      // ログイン中のユーザのIDを変数に代入
      // $id = $_SESSION['customer']['id'];
      // SQL文の準備
      // 異なるID、同じメールアドレスを持つ他のユーザーが存在するか
      // $sql = $pdo->prepare('select * from customer where id!=? and mail=?');
      // SQL文を実行
      // $sql->execute([
        // $id,
        // $_SESSION['customer']['mail']
      // ]);
    // } else {
      // セットされていない場合false
      // ログアウト中
      // 入力チェック
      // 同じメールアドレスを持つユーザーがcustomerテーブルに存在するか
      // SQL文の準備
      // $sql = $pdo->prepare('select * from customer where mail=?');
    //   // SQL文の実行
      // $sql->execute(
        // $_SESSION['customer']['mail']
      // );
    // }


// 変数にSQL文の実行結果を全て受け取り、代入
    // $sqlResults = $sql->fetchAll();

    // 変数が空かどうかチェック
    // if (empty($sqlResults)) {
      // 空の場合true array(0)
      // 一致するレコードなし
      // 更新、新規追加可能
      // ログイン中かチェック
      // if (isset($_SESSION['customer']) && isset($_REQUEST['card']['id'])) {
    //     // セットされている場合true
    //     // ログイン中更新処理
    //     // データベース更新
    //     // SQL文の準備
        // $sql = $pdo->prepare('update card set card_name=?,card_type=?,card_no=?,card_month=?,card_year=?,card_security_code=? where id=?');
    //     // SQL文の実行
        // $sql->execute([
          // $_SESSION['card']['card_name'],
          // $_SESSION['card']['card_type'],
          // $_SESSION['card']['card_no'],
          // $_SESSION['card']['card_month'],
          // $_SESSION['card']['card_year'],
          // $_SESSION['card']['card_security_code'],
          // $id
        // ]);

        // 完了メッセージ
    //     echo <<<END
    // <h2>カード情報登録更新</h2>
    // <div class="page-box">
    // <p>クレジットカード情報を更新しました。</p>
    // <p class="reverse">
    // <a href="purchace-confirm.php">購入手続きを続ける</a>
    // </p>
    // </div>
    // END;
    //   } else {
    //     // セットされていない場合false
        // ログアウト中、新規追加処理
        // SQL文の準備
        // $sql = $pdo->prepare('insert into card (id, card_name, card_type, card_no, card_month, card_year, card_security_code) values(?,?,?,?,?,?,?)');
        // SQL文の実行
        // $sql->execute([
        //   $_SESSION['customer']['id'],
        //   $_SESSION['card']['card_name'],
        //   $_SESSION['card']['card_type'],
        //   $_SESSION['card']['card_no'],
        //   $_SESSION['card']['card_month'],
        //   $_SESSION['card']['card_year'],
        //   $_SESSION['card']['card_security_code']
        // ]);
        // // 完了メッセージ表示
        echo <<<END
    <h2>カード情報登録完了</h2>
    <div class="page-box">
    <p>クレジットカード情報を登録しました。</p>
    <p class="reverse">
    <a href="purchace-confirm.php">購入手続きを続ける</a>
    </p>
    </div>
    END;
    //   }
    // } else {
      // 空でない場合false array(1)
      // 一致するレコードあり
      // データ重複あり 更新、新規追加、不可
      // エラーメッセージ表示
  //     echo <<<END
  //  <h2>カード登録エラー</h2>
  //  <div class="page-box">
  //  <p>このクレジットカードは登録されています。</p>
  //  <p class="page-box-2">他のクレジットカードを登録してください。</p>
  //  <p class="reverse">
  //  <a href="card-input.php">カード登録入力画面へ戻る</a>
  //  </p>
  //  </div>
  //  END;
  //   }
    ?>
  </div>
</main>

<?php
//footer開始タグから
require 'includes/footer.php';
?>