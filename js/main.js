'use strict';

//コンテンツフェードイン表示
////////////////////////////////////////////////////////////////////////////////////////
window.addEventListener('load', (event) => {
  //すべてのsection要素取得
  const sectionElements = document.querySelectorAll('section');
  //section要素にクラスfadeInを付与
  sectionElements.forEach(function (section) {
    //section要素にクラスfadeInを付与
    section.classList.add('fadeIn');
  });
  //fadeIn()呼び出し
  fadeIn();
});
//スクロール時fadeIn()呼び出し
window.addEventListener('scroll', fadeIn);
//関数定義fadeIn()
function fadeIn() {
  //すべてのsection要素取得
  const fadeInElements = document.querySelectorAll('.fadeIn');
  fadeInElements.forEach(function (section) {
    //section要素の現在位置取得
    const top = section.getBoundingClientRect().top;
    //ウィンドウの高さ取得
    const windowHeight = window.innerHeight;
    //section要素の現在位置がウィンドウの高さより200px以上、上にある場合true
    if (top < windowHeight - 200) {
      //要素にクラスanimatedを付与
      section.classList.add('animated');
    }
  });
}

//ページトップへ戻るボタン
////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', function () {
  //要素を取得
  const topBtn = document.querySelector('.page-top');
  //ウィンドウの高さを取得
  const windowHeight = window.innerHeight;
  //スクロール時の処理
  window.addEventListener('scroll', function () {
    //現在の垂直のスクロール位置がウィンドウの高さよりも大きい場合クラス属性値showを付与
    topBtn.classList.toggle('show', window.scrollY > windowHeight);
  });
  //クリック時の処理
  topBtn.addEventListener('click', function () {
    //ページのトップへ戻る
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
    return false;
  });
});

//文字のちらつき回避
////////////////////////////////////////////////////////////////////////////////////////
window.WebFontConfig = {
  //フォントのファミリーの指定
  google: { families: ['Hind', 'Noto+Sans+JP'] },
  //フォントの読み込み完了後に実行する関数
  // active: function () {
  //セッションストレージにfonts=trueを保存
  // sessionStorage.fonts = true;
};
// };

//即時関数で関数定義と同時に実行
(function () {
  //script要素生成
  let WebFont = document.createElement('script');
  //src属性 GoogleFontsのURL
  WebFont.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  //async属性 非同期で読み込み
  WebFont.async = 'true';
  //初めのscript要素を取得
  let scriptElement = document.getElementsByTagName('script')[0];
  //その先頭に生成したscript要素を挿入
  scriptElement.parentNode.insertBefore(WebFont, scriptElement);
})();


//ローディング画面の処理
window.addEventListener('DOMContentLoaded', function () {
  const loadingElement = document.getElementById('loading');

  // ローディング画面を非表示にする関数
  function hideLoading() {
    loadingElement.style.transition = 'opacity .6s ease, visibility .6s ease';
    loadingElement.style.opacity = 0;
    loadingElement.style.visibility = 'hidden';
  }

  // ページが初回訪問かどうかをセッションストレージで確認
  if (!sessionStorage.getItem('firstVisit')) {
    // 初回訪問の場合、セッションストレージにフラグをセット
    sessionStorage.setItem('firstVisit', 'true');

    // ローディング画面を表示し、4秒後に非表示にする
    setTimeout(function () {
      hideLoading();
    }, 4000);

  } else {
    // 初回訪問ではない場合、ローディング画面を非表示にする
    loadingElement.style.display = 'none';
  }
});