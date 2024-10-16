'use strict';
window.addEventListener('load', function () {
  // すべての.create要素を取得
  const createButtons = document.querySelectorAll('.create'); // <a>タグを取得

  // 各要素にイベントリスナーを追加
  createButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault(); // デフォルトのリンク動作を防ぐ
      window.alert('準備中です');
    });
  });
});