'use strict';

const btn = document.querySelectorAll('.slider_btn');

const prebtn = document.getElementById('pre_btn');
const nextbtn = document.getElementById('next');
const contents = document.querySelector('.contents');
const btn1 = document.getElementById('sl1');
const btn2 = document.getElementById('sl2');
const btn3 = document.getElementById('sl3');
const btn4 = document.getElementById('sl4');
const btn5 = document.getElementById('sl5');


function premove() {
  if (btn1.checked === true) {
    contents.classList.remove('contents1');
    contents.classList.add('contents5');
    btn5.checked = true;
  } else if (btn2.checked === true) {
    contents.classList.remove('contents2');
    contents.classList.add('contents1');
    btn1.checked = true;

  } else if (btn3.checked === true) {
    contents.classList.remove('contents3');
    contents.classList.add('contents2');
    btn2.checked = true;

  } else if (btn4.checked === true) {
    contents.classList.remove('contents4');
    contents.classList.add('contents3');
    btn3.checked = true;

  } else {
    contents.classList.remove('contents5');
    contents.classList.add('contents4');
    btn4.checked = true;
  }


}

function nextmove() {
  if (btn1.checked === true
  ) {
    contents.classList.remove('contents1');
    contents.classList.add('contents2');
    btn2.checked = true;

  } else if (btn2.checked === true) {
    contents.classList.remove('contents2');
    contents.classList.add('contents3');
    btn3.checked = true;

  } else if (btn3.checked === true) {
    contents.classList.remove('contents3');
    contents.classList.add('contents4');
    btn4.checked = true;

  } else if (btn4.checked === true) {
    contents.classList.remove('contents4');
    contents.classList.add('contents5');
    btn5.checked = true;

  } else if ((btn5.checked === true)) {
    contents.classList.remove('contents5');
    contents.classList.add('contents1');
    btn1.checked = true;
  }

}

// インジケーターをクリックしてもうごけるように

function click1() {
  contents.classList.remove('contents2');
  contents.classList.remove('contents3');
  contents.classList.remove('contents4');
  contents.classList.remove('contents5');
  contents.classList.add('contents1');
}

function click2() {
  contents.classList.remove('contents1');
  contents.classList.remove('contents3');
  contents.classList.remove('contents4');
  contents.classList.remove('contents5');
  contents.classList.add('contents2');
}

function click3() {
  contents.classList.remove('contents1');
  contents.classList.remove('contents2');
  contents.classList.remove('contents4');
  contents.classList.remove('contents5');
  contents.classList.add('contents3');
} function click4() {
  contents.classList.remove('contents1');
  contents.classList.remove('contents3');
  contents.classList.remove('contents2');
  contents.classList.remove('contents5');
  contents.classList.add('contents4');
}
function click5() {
  contents.classList.remove('contents1');
  contents.classList.remove('contents3');
  contents.classList.remove('contents4');
  contents.classList.remove('contents2');
  contents.classList.add('contents5');
}





const mql = window.matchMedia('(max-width: 768px)');
mql.addEventListener('change', handleTabletChange)

function handleTabletChange(mwd) {
  if (mwd.matches) {
    btn.forEach(function (item) {
      item.onclick = function () {
        document.getElementById('main_image').src = this.dataset.image;

      };
    });
  } else {
    const dialog = document.querySelector('dialog');
    const openbtn = document.querySelectorAll('.modal_img');
    prebtn.addEventListener('click', premove);
    nextbtn.addEventListener('click', nextmove);
    btn1.addEventListener('click', click1);
    btn2.addEventListener('click', click2);
    btn3.addEventListener('click', click3);
    btn4.addEventListener('click', click4);
    btn5.addEventListener('click', click5);

    openbtn.forEach(function (item) {
      item.onclick = function () {
        document.getElementById('modal_main').src = this.dataset.image;

        dialog.show();

      };

    }
    );

    const closebtn = document.getElementById('closebtn');
    closebtn.onclick = function () {
      dialog.close();
    };
  }

}

handleTabletChange(mql);


// 画像をクリックしたら、各ページに飛ぶ
const jump = document.querySelectorAll('.mini_name');
jump.forEach(function (item) {
  item.onclick = function () {
    location.href = this.dataset.href;
  }
});

