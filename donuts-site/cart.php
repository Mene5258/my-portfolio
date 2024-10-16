<div class="grid">
  <form action="purchace-confirm.php" method="post">
    <?php
    // プロダクト関数入ってたらカート情報表示
    if (!empty($_SESSION['product'])) {
      // 合計変数金額用の変数
      $total = 0;

      //カート内の商品情報をHTMLで出力
      foreach ($_SESSION['product'] as $id => $product) {
        //小計用の変数定義(価格＊個数)
        $subtotal = $product['price'] * $product['count'];

        //合計金額の算出
        $total += $subtotal;

        echo <<<END

<div class="cart-product">
<img src="common/images/product-item{$id}.jpg">
<div class="product-item-detail">
<p>{$product['name']}</p>
<div class="detail-block">
<p>税込 &#0165;
END;

        echo number_format($subtotal);

        echo <<<END
</p>
<p>数量 　{$product['count']}個</p>
</div>
<a href="cart-delete.php?id={$id}">削除する</a>
</div>
</div>
END;
      }
      // foreach

      // 合計情報
      echo <<<END
<div class="cart-total">
<p>ご注文合計：<span>税込み ￥
END;

      echo number_format($total);

      echo <<<END
</span></p>
<input type="submit" class="purchase-btn" value="ご購入確認へ進む">
</form>
</div>
<button class="continue-btn" type="button" onclick="location.href='product.php'">買い物を続ける</button>
END;
    } //empty
    else {
      echo <<<END
    <p class="nonproducts">カートに商品がありません。</p>
    <p class="top-reverse">
    <a href="index.php">topページへ戻る</a>
    </p>
    </div>
    END;
    }
    ?>



    <!-- スタイル確認用 -->
    <!-- <div class="cart-product">
    <img src="common/images/product-item1.jpg">
    <div class="product-item-detail">
      <p>CCドーナツ 当店オリジナル（５個入り）</p>

      <div class="detail-block">
        <p>税込 ￥1,500</p>
        <p>数量 　1 個</p>
      </div>
      <a href="#">削除する</a>
    </div>
  </div>

  <div class="cart-total">
    <p>ご注文合計：<span>税込み ￥x,xxx</span></p>
    <button class="purchase-btn" type="submit" onclick="location.href='purchace-complete.php'">ご購入へ進む</button>
  </div>
  <button class="continue-btn" type="submit" onclick="location.href='product.php'">買い物を続ける</button> -->
    <!-- スタイルのため上記のこす -->