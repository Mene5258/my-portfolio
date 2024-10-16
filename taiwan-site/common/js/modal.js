'use strict';

const dialog = document.querySelector('dialog');
const openbtn = document.getElementById('otameshi');
//⇑のopenbtnの定数は各自で取得してもらうしかないです。
//各ページのhtmlから適切な要素を取得して、代入してもらえればokです。
openbtn.onclick = function () {
  dialog.show();

};

const closebtn = document.getElementById('closebtn');
closebtn.onclick = function () {
  dialog.close();
};
