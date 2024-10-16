<?php
// ログイン確認用セッションスタート
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="C.C.ドーナツの公式ウェブサイト。中国4000年以上続く秘密のレシピが作り出すドーナツの情報をご紹介します。">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/index.css" rel="stylesheet">
  <script src="common/js/loading.js"></script>
  <script src="common/js/drawer.js"></script>
  <script src="common/js/favorite.js"></script>
  <title>C.C.Donuts</title>
</head>

<?php
require 'includes/header.php';
?>

<!-- topページ領域 -->
<!-- ローディング画面 -->
<div id="loading" class="loading">
  <!-- 画像埋め込み -->
  <div class="content">
    <img src="common/images/logo.png" alt="logo">
  </div>
  <!-- 文字が現れるアニメーション -->
  <div class="txt">
    <p>L</p>
    <p>o</p>
    <p>a</p>
    <p>d</p>
    <p>i</p>
    <p>n</p>
    <p>g</p>
    <p>・</p>
    <p>・</p>
    <p>・</p>
  </div>

</div>

<!-- ここまで -->
<main class=top-page>

  <?php
  // セッション変数がセットされているかどうかを判定(セッション情報がちゃんと取得できているかどうかを判断)
  if (isset($_SESSION['customer'])) {
    // セットされていればtrue
    echo '<p class="user">ようこそ　', $_SESSION['customer']['name'], '様</p>';
  } else {
    echo '<p class="user">ようこそ　ゲスト様</p>';
  }
  ?>
  <div class="top-hero">
    <img src="common/images/hero.jpg" alt="hero" class="fluid">
  </div>

  <div class="top-item-container">
    <div class="top-item-content">

      <?php
      require 'includes/database.php';
      echo <<<END
      <a href="detail.php?id=5"
      END;
      ?>
      <div class="top-item1">
        <p>新商品</p>
        <p>サマーシトラス</p>
        </a><!-- top-item1-->


        <div class="top-item2">
          <p>ドーナツのある生活</p>
        </div><!-- top-item2-->
      </div><!-- top-item-content-->

      <a href="product.php">
        <div class="top-image">
          <p>商品一覧</p>
        </div>
      </a>

    </div>

    <div class="top-bg">
      <h1>Philosophy</h1>
      <p>私たちの信念</p>
      <p>"Creating Connections"</p>
      <p>ドーナツでつながる</p>
    </div>

    <section>
      <div class="top-rank">
        <h2>人気ランキング</h2>
        <ol class="top-rank-content mx">

          <?php
          require 'includes/database.php';
          // SQL文準備
          $sql = $pdo->query('select * from product where ranking >= 1 and ranking <= 6 order by ranking asc');

          foreach ($sql as $row) {
            echo <<<END
        <li>
          <form action="cart-input.php" method="post">
            <p class="rank">
            <a href="detail.php?id={$row['id']}">{$row['ranking']}</a>
            </p>
            <p>
            <a href="detail.php?id={$row['id']}">
            <img src="common/images/product-item{$row['id']}.jpg" alt="image" class="product-fluid">
            </a>
            </p>
            <p class="product-name">
            <a href="detail.php?id={$row['id']}">
        {$row['name']}
            </a>
            </p>
            <div class="price-content">
              <p class="price">
              <a href="detail.php?id={$row['id']}">税込 ￥
END;

            echo number_format($row['price']);

            echo <<<END
              </a></p>
            

                <button id="heart-{$row['ranking']}" class="hearts-btn" type="button">
                    <span class="hearts-btn heart-{$row['ranking']}">&#9825;</span>
                </button>
                

            </div>

            <input type="hidden" name="id" value="{$row['id']}">
            <input type="hidden" name="name" value="{$row['name']}">
            <input type="hidden" name="price" value="{$row['price']}">
            <input type="hidden" name="count" value="1">
            <input type="submit" value="カートに入れる">

          </form>
        </li>
END;
          }
          ?>
          </li>



        </ol>
      </div>
    </section>

</main>
<?php
require 'includes/footer.php';
?>