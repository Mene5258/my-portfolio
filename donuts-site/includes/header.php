<!-- header部 ｺｺｶﾗ -->

<header>
  <div id="inner">
    <ul class="header-flex">
      <li class="li-left">
        <img src="common/images/hamburger-icon.svg" alt="hamburger-menu" class="hamburger-btn" id="hamburger-style">
      </li>
      <li>
        <a href="index.php"><img src="common/images/logo.svg" alt="logo" class="logo-icon"></a>
      </li>
      <li>
        <?php
        if (isset($_SESSION['customer'])) {
          echo ' <a href="logout-input.php"><img src="common/images/icon-logout.svg" alt="logout" class="login-icon"></a>';
        } else {
          echo ' <a href="login-input.php"><img src="common/images/icon-login.svg" alt="login" class="login-icon"></a>';
        }
        ?>
        <a href="cart-show.php"><img src="common/images/icon-cart.svg" alt="cart" class="cart-icon"></a>
      </li>
    </ul>
  </div>


  <!-- 検索 -->
  <div class="max-inner">
    <form action="#" method="post">
      <input type="search" name="product">
      <input type="submit" value="test" id="submit-btn">
      <label for="submit-btn" class="submit-btn">
        <img src="common/images/icon-search.svg" alt="検索">
      </label>
    </form>
  </div>


  <!-- メニュー部 -->
  <nav id="menu-container">
    <div class="menu-logo">
      <a href="index.php"><img src="common/images/logo.svg" alt="logo"></a>
      <img src="common/images/close-btn.svg" alt="logo" id="close-btn" class="hamburger-btn">
    </div>
    <ul class="menu-list">
      <li><a href="index.php">TOP</a></li>
      <li><a href="product.php">商品一覧</a></li>
      <li><a href="#" class="create">よくある質問</a></li>
      <li><a href="#" class="create">問い合わせ</a></li>
      <li><a href="#" class="create">当サイトのポリシー</a></li>
    </ul>
  </nav>
</header>
<!-- header部 ｺｺﾏﾃﾞ -->