<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/customer-confirm.css" rel="stylesheet">
  <title>会員登録-確認 | C.C.Donuts</title>
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
$name = htmlspecialchars($_REQUEST['name']);
$kana = htmlspecialchars($_REQUEST['kana']);
$post_code = $_REQUEST['post_code'];
$address = $_REQUEST['address'];
$mail = $_REQUEST['mail'];
$password = $_REQUEST['password'];
$str = str_repeat("・",strlen($password));

$form = array(
  'お名前' => $name,
  'お名前（フリガナ）' => $kana,
  '郵便番号' => $post_code,
  '住所' => $address,
  'メールアドレス' => $mail,
  'パスワード' => $str
);
if (preg_match('/^(?=.*[0-9])[0-9]{7}$/',$post_code)){
  if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/', $password)) {
    foreach ($form as $key => $value) {
      echo <<<END
      <div class="customer-inner">
      <p class="confirm-top">{$key}</p>
      <p class="confirm-bottom">{$value}</p>
      </div>
      END;
      }
      echo<<<END
      <form action="customer-complete.php" method="post">  
      <input type="hidden" name="name" value="{$name}">
      <input type="hidden" name="kana" value="{$kana}">
      <input type="hidden" name="post_code" value="{$post_code}">
      <input type="hidden" name="address" value="{$address}">
      <input type="hidden" name="mail" value="{$mail}">
      <input type="hidden" name="password" value="{$password}">
      <button type="submit">この内容で登録する</button>
      </form>
      <p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力内容を修正する</a></p>
      END;
      } else {
	echo '<p class="login-box">パスワードは<br>「A-Z、a-z、0-9」を少なくとも<br>各1つは含めて8文字以上で入力してください。</p>';
  echo '<p class="reverse"><a href="javascript:void(0);" onclick="goBack()">入力画面に戻る</a></p>';
}
}else{
  echo '<p class="login-box">郵便番号は<br>ハイフン無しの数字7桁で入力してください。</p>';
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
require 'includes/footer.php';
?>