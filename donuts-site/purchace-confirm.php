<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/purchace-confirm.css" rel="stylesheet">
  <script src="common/js/drawer.js"></script>
  <title>ご購入確認 | C.C.Donuts</title>


</head>

<body>
  <main>
    <div class="grid">
      <p>
        <a href="index.php">
          <img src="common/images/logo.svg" alt="logo" class="logo">
        </a>
      </p>


      <?php

      // PDO接続
      require 'includes/database.php';

      // $card_type = $_REQUEST['card_type'];
      // $card_no = $_REQUEST['card_no'];
      // $card_no_result = substr_replace($card_no, str_repeat('・', 10), 6, 10);

      // $total初期値を指定
      $total = 0;

      // ログイン判定
      if (isset($_SESSION['customer'])) {
        echo '<h2>ご購入確認</h2>';
        echo '<div class="mini-container">';
        echo '<h3>ご購入商品</h3>';
        foreach ($_SESSION['product'] as $id => $product) {
          $subtotal = $product['price'] * $product['count'];
          //合計金額の算出
          $total += $subtotal;

          echo <<<END
            <table>
            <tr>
            <th>商品名</th>
           <td>{$product['name']}</td>
           </tr>
           <tr>
           <th>数量</th>
           <td>{$product['count']}個</td>
           </tr>
           <tr>
           <th>小計</th>
            <td>税込　¥
           END;

          echo number_format($subtotal);

          echo <<<END
           </td>
           </tr>
           </table>
           END;
        } //foreach

        echo <<<END
<table class="total-row">
<tr>
<th>合計</th>
<td>税込　¥
END;

        echo number_format($total);

        echo <<<END
  </td>
  </tr>
  </table>
  </div>
  <div class="mini-container">
  <h3>お届け先</h3>
  <table>
  <tr>
  <th>お名前</th>
  <td>{$_SESSION['customer']['name']}</td>
  </tr>
  <tr>
  <th>住所</th>
  <td>{$_SESSION['customer']['address']}</td>
  </tr>
  </table>
  </div>
  END;

        if (isset($_SESSION['card']['card_no'])) {
          echo <<<END
  <div class="mini-container">
  <h3>お支払い方法</h3>
  <table class="payment">
  <tr>
  <th>お支払い</th>
  <td>クレジットカード</td>
  </tr>
  <tr>
  <th>カード種類</th>
  <td>{$_SESSION['card']['card_type']}</td>
  </tr>
  <tr>
  <th>カード番号</th>
  <td>
  END;

          echo substr_replace($_SESSION['card']['card_no'], str_repeat('・', 10), 6, 10);

          echo <<<END
  </td>
  </tr>
  </table>
  </div>
  <div class="confirm-btn">
  <a href="purchace-complete.php">ご購入を確定する</a>
  </div>
  END;
          // $card_name = $_SESSION['card']['card_name'];
          // $card_type = $_SESSION['card']['card_type'];
          // $card_no = $_SESSION['card']['card_no'];
          // $card_month = $_SESSION['card']['card_month'];
          // $card_year = $_SESSION['card']['card_year'];
          // $card_security_code = $_SESSION['card']['card_security_code'];

          // echo <<<END
          // <p>{$card_type}</p>
          // <p>{$card_no}</p>
          // <p>{$card_name}</p>
          // END;
        } //isset($_SESSION['card_no'])
        else {
          // $_SESSION['card_no']がなかったら
          echo <<<END
        <div class="mini-container">
        <h3>お支払い方法</h3>
        <div class="non-payment">
        <p>お支払い情報が登録されていません。</p>
        <p>クレジットカード情報を登録してください。</p>
        </div>
        <div class="payment-btn">
        <a href="card-input.php">カード情報を登録する</a>
        </div>
        END;
        }
      } else {
        echo <<<END
        <div class="non-payment">
        <p>商品を購入するにはログインが必要です。</p>
        <p><a href="login-input.php">ログインはこちら</a></p>
        </div>
  END;
      }





      // if (isset($_SESSION['customer'])) {
      // echo '<h2>ご購入確認</h2>';

      // $total=0;

      // foreach($_SESSION['product'] as $id => $product){


      //   $subtotal = $product['price'] * $product['count'];

      //   //合計金額の算出
      //   $total += $subtotal;

      //   echo<<<END
      //   <div class="mini-container">
      //   <h3>ご購入商品</h3>
      //   <table>
      //   <tr>
      //     <th>商品名</th>
      //     <td>{$product['name']}</td>
      //   </tr>
      //   <tr>
      //     <th>数量</th>
      //     <td>{$product['count']}個</td>
      //   </tr>
      //   <tr>
      //     <th>小計</th>
      //     <td>税込　¥
      //     END;

      //     echo number_format($subtotal);

      //     echo<<<END
      //     </td>
      //     </tr>
      //     </table>
      //     END;

      // }//foreach

      // echo '<table><tr><th>合計</th>税込　¥'.number_format($total).'<td></td></tr></table></div>';


      // // お届け
      // echo<<<END
      // <div class="mini-container">
      // <h3>お届け先</h3>
      // <table class="mini-container">
      //   <tr>
      //     <th>お名前</th>
      //     <td>{$_SESSION['customer']['name']}</td>
      //   </tr>
      //   <tr>
      //     <th>住所</th>
      //     <td>{$_SESSION['customer']['address']}</td>
      //   </tr>
      // </table>
      // </div>
      // END;

      // // 支払い方法
      // echo<<<END
      // <div class="mini-container">
      // <h3>お支払い方法</h3>
      // <table class="mini-container">
      //   <tr>
      //     <th>お支払い</th>
      //     <td>クレジットカード</td>
      //   </tr>
      //   <tr>
      //     <th>カード種類</th>
      //     <td>VISA</td>
      //   </tr>
      //   <tr>
      //     <th>カード番号</th>
      //     <td>123456・・・・・・・・・・</td>
      // </tr>
      // </table>
      // </div>
      // END;


      // // ボタン
      // echo<<<END
      // <div class="confirm-btn"><a href="purchace-complete.php"></a></div>
      // END;

      //     } else {
      //       echo <<<END
      //   <p>商品を購入するにはログインが必要です。
      //   </p>
      //   <a href="login-input.php">ログインはこちら</a>

      //   END;
      //     }


      ?>
    </div>
  </main>




  <?php
  //footer開始タグから
  require 'includes/footer.php';
  ?>