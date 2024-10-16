<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ミスタードーナツのメニューはご紹介していません。栄養成分情報、アレルギー成分情報はご覧いただけません。">
  <link href="common/css/reset.css" rel="stylesheet">
  <link href="common/css/common.css" rel="stylesheet">
  <link href="common/css/product.css" rel="stylesheet">
  <script src="common/js/drawer.js"></script>
  <script src="common/js/favorite.js"></script>
  <title>product</title>
</head>

<body>

  <?php
  require '../donuts-site/includes/header.php';
  // header終了タグまで
  ?>


  <main>
    <!-- パンくず↓ -->
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">TOP</a></li>
        <li class="breadcrumb-item active" aria-current="page">商品一覧</li>
      </ul>
    </nav>
    <p class="border"></p>
    <!--パンくず↑  -->

    <?php
    // セッション変数がセットされているかどうかを判定(セッション情報がちゃんと取得できているかどうかを判断)
    if (isset($_SESSION['customer'])) {
      // セットされていればtrue
      echo '<p class="user">ようこそ　', $_SESSION['customer']['name'], '様</p>';
    } else {
      echo '<p class="user">ようこそ　ゲスト様</p>';
    }
    ?>
    <p class="border"></p>

    <section>

      <h2>商品一覧</h2>
      <ol class="products">

        <?php
        require 'includes/database.php';
        // SQL文準備
        $sql = $pdo->query('select * from product where id >= 1 and id <= 6');

        foreach ($sql as $row) {
          echo <<<END
        <li>
          <form action="cart-input.php" method="post">
            <p>
            <a href="detail.php?id={$row['id']}">
            <img src="common/images/product-item{$row['id']}.jpg" alt="image" class="fluid">
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

    <section>
      <h3>バラエティセット</h3>
      <ol class="set-container">
        <?php
        require 'includes/database.php';
        // SQL文準備
        $sql = $pdo->query('select * from product where id >= 7 and id <= 12');

        foreach ($sql as $row) {
          echo <<<END
        <li>
          <form action="cart-input.php" method="post">
            <p>
            <a href="detail.php?id={$row['id']}">
            <img src="common/images/product-item{$row['id']}.jpg" alt="image" class="fluid">
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
  //footer開始タグから
  require '../donuts-site/includes/footer.php';
  ?>