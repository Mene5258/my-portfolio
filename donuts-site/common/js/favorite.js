'use strict';

window.addEventListener('load', function () {
  for (let i = 1; i <= 12; i++) {
    document.querySelector(`#heart-${i}`).addEventListener('click', function () {
      const heartElement = document.querySelector(`.heart-${i}`);
      heartElement.classList.toggle('show');

      // クラス 'show' が付いているかどうかを確認
      if (heartElement.classList.contains('show')) {
        heartElement.innerHTML = `&#9829;`; // ハートの表示を変更
      } else {
        heartElement.innerHTML = `&#9825;`; // 元に戻す
      }
    });
  }
});