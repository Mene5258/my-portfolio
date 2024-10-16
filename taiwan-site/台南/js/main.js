'use strict'

// 各ボタンの要素を取得
var btn1 = document.getElementById('btn1');

// 全てのボタンを配列として取得
var allButtons = document.getElementsByClassName('btn');

// 画像の要素を取得
var img = document.getElementById('img');

// ボタンがクリッ クされたときの処理を設定
btn1.addEventListener('click', function () {
  changeImage('https://source.unsplash.com/bIhpiQA009k');
  setActiveButton(btn1);
});