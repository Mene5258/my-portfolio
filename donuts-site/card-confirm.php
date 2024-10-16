<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/card-confirm.css" rel="stylesheet">
  <title>カード情報-入力確認 | C.C.Donuts</title>
</head>
<main>
  <div class="main-inner">
    <p>
      <a href="index.php">
        <img src="common/images/logo.svg" alt="logo" class="logo">
      </a>
    </p>
    <h2>ご入力内容の確認</h2>

    <?php
    $card_name = htmlspecialchars($_REQUEST['card_name']);
    $card_type = $_REQUEST['card_type'];
    $card_no = htmlspecialchars($_REQUEST['card_no']);
    $card_month = $_REQUEST['card_month'];
    $card_year = $_REQUEST['card_year'];
    $card_security_code = $_REQUEST['card_security_code'];
    $str = str_repeat("・", strlen($card_security_code));

    $form = array(
      'お名前' => $card_name,
      'カード会社' => $card_type,
      'カード番号' => $card_no,
      '有効期限' => $card_month . '/' . $card_year,
      'セキュリティコード' => $str
    );
    if (preg_match('/^(?=.*[0-9])[0-9]{16}$/', $card_no)) {
      if (preg_match('/^(?=.*[0-9])[a-zA-Z0-9]{2}$/', $card_month)) {
        if (preg_match('/^(?=.*[0-9])[a-zA-Z0-9]{4}$/', $card_year)) {
          if (preg_match('/^(?=.*[0-9])[a-zA-Z0-9]{3}$/', $card_security_code)) {
            foreach ($form as $key => $value) {
              echo <<<END
     <div class="card-inner">
     <p class="confirm-top">{$key}</p>
     <p class="confirm-bottom">{$value}</p>
     </div>
     END;
            }
            echo <<<END
     <form action="card-complete.php" method="post" id="card-form">  
     <input type="hidden" name="card_name" value="{$card_name}">
     <input type="hidden" name="card_type" value="{$card_type}">
     <input type="hidden" name="card_no" value="{$card_no}">
     <input type="hidden" name="card_month" value="{$card_month}">
     <input type="hidden" name="card_year" value="{$card_year}">
     <input type="hidden" name="card_security_code" value="{$card_security_code}">
     <button type="submit">この内容で登録する</button>
     </form>
     <p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力内容を修正する</a></p>
     END;
          } else {
            echo '<p class="login-box">セキュリティコードは<br>数字3桁で入力してください。</p>';
            echo '<p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力画面に戻る</a></p>';
          }
        } else {
          echo '<p class="login-box">カード番号有効期限の年は<br>数字4桁で入力してください。</p>';
          echo '<p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力画面に戻る</a></p>';
        }
      } else {
        echo '<p class="login-box">カード番号有効期限の月は<br>数字2桁で入力してください。</p>';
        echo '<p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力画面に戻る</a></p>';
      }
    } else {
      echo '<p class="login-box">カード番号は<br>数字16桁で入力してください。</p>';
      echo '<p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力画面に戻る</a></p>';
    }
    ?>

    </form>
  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>

</main>

<?php
//footer開始タグから
require '../donuts-site/includes/footer.php';
?>