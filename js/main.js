/* header scroll event */
let header = document.querySelector("header");
let headerHeight = header.offsetHeight;
window.addEventListener('scroll',function(){
  let windowTop = window.scrollY;
  console.log('여기');
  console.log(windowTop);
  // 스크롤 세로값이 헤더높이보다 크거나 같으면 
	// 헤더에 클래스 'drop'을 추가
  if (windowTop >= headerHeight) {
    header.classList.add("drop");
  } 
  // 아니면 클래스 'drop'을 제거
  else {
    header.classList.remove("drop");
  }
})

/* toggle menu */
let openMenu = document.querySelector('.openMenu');
let closeMenu = document.querySelector('#closeIcon');
let sideMenu = document.querySelector('.side_menu');
openMenu.addEventListener('click', function(){
    sideMenu.classList.add('on');
    // document.querySelector('.blackbg').classList.add('on');
})
closeMenu.addEventListener('click', function(){
    sideMenu.classList.remove('on');
    // document.querySelector('.blackbg').classList.remove('on');
})

/* serach modal */
// const open = () => {
//   document.querySelector(".modal").classList.remove("hidden");
// }

// const close = () => {
//   document.querySelector(".modal").classList.add("hidden");
// }

// document.querySelector(".openBtn").addEventListener("click", open);
// document.querySelector(".closeBtn").addEventListener("click", close);
// document.querySelector(".bg").addEventListener("click", close);

/* review */
let reviewDiv = true;
function reviewTable() {
  let con = document.getElementById('review_Form');
  if(con.style.display == 'none') {
    con.style.display = 'block';
  }
  else {
    con.style.display = 'none';
  }
}
// 삭제


/* main banner */
function Slider(target, type) {
  // 상태
  let index = 1;
  let isMoved = true;
  const speed = 3000; // ms

  // 방향
  const transform = "transform " + speed / 1000 + "s";
  let translate = (i) => "translateX(-" + 100 * i + "%)";
  // if (type === "V") {
  //   translate = (i) => "translateY(-" + 100 * i + "%)";
  // }

  // 슬라이더
  const slider = document.querySelector('.slidebox');
  const sliderRects = slider.getClientRects()[0];;
  slider.style["overflow"] = "hidden";

  // 슬라이더 화면 컨테이너
  const container = document.createElement("div");
  container.style["display"] = "flex";
  // container.style["flex-direction"] = type === "V" ? "column" : "row";
  container.style["width"] = sliderRects.width + "px";
  // container.style["height"] = sliderRects.height + "px";
  container.style["transform"] = translate(index);

  // 슬라이더 화면 목록
  let boxes = [].slice.call(slider.children);
  boxes = [].concat(boxes[boxes.length - 1], boxes, boxes[0]);

  // 슬라이더 화면 스타일
  const size = boxes.length;
  for (let i = 0; i < size; i++) {
    const box = boxes[i];
    box.style["flex"] = "none";
    box.style["flex-wrap"] = "wrap";
    box.style["height"] = "800px";
    box.style["width"] = "100%";
    container.appendChild(box.cloneNode(true));
  }

  // 처음/마지막 화면 눈속임 이벤트
  container.addEventListener("transitionstart", function () {
    isMoved = false;
    setTimeout(() => {
      isMoved = true;
    }, speed);
  });
  container.addEventListener("transitionend", function () {
    // 처음으로 순간이동
    if (index === size - 1) {
      index = 1;
      container.style["transition"] = "none";
      container.style["transform"] = translate(index);
    }
    // 끝으로 순간이동
    if (index === 0) {
      index = size - 2;
      container.style["transition"] = "none";
      container.style["transform"] = translate(index);
    }
  });

  // 슬라이더 붙이기
  slider.innerHTML = "";
  slider.appendChild(container);

  return {
    move: function (i) {
      if (isMoved === true) {
        index = i;
        container.style["transition"] = transform;
        container.style["transform"] = translate(index);
      }
    },
    next: function () {
      if (isMoved === true) {
        index = (index + 1) % size;
        container.style["transition"] = transform;
        container.style["transform"] = translate(index);
      }
    },
    prev: function () {
      if (isMoved === true) {
        index = index === 0 ? index + size : index;
        index = (index - 1) % size;
        container.style["transition"] = transform;
        container.style["transform"] = translate(index);
      }
    }
  };
}
const s1 = new Slider(".slider", "H");

setInterval(() => {
  s1.next();
}, 1000)

/* 상품 수량 */
var amount;
var sell_price;

function init() {
  amount = document.product_form.amount.value;
  sell_price = document.product_form.sum.value;
  change();
}

function add() {
  hm = document.product_form.amount;
  sum = document.product_form.sum;
  sell_price = document.product_form.initprice.value;
  const number = sell_price.replace(/,/g, "");
  hm.value++;
  console.log(hm.value);
  calc = parseInt(hm.value) * number;
  console.log(calc);
  sum.value = calc.toLocaleString();
  console.log(sum.value);
}

function del() {
  hm = document.product_form.amount;
  sum = document.product_form.sum;
  sell_price = document.product_form.initprice.value;
  const number = sell_price.replace(/,/g, "");
  console.log(sell_price);
  if (hm.value > 1) {
    hm.value--;
    console.log(hm.value);
    calc = parseInt(hm.value) * number;
    sum.value = calc.toLocaleString();
    console.log(sum.value);
  }
}

function change() {
  hm = document.product_form.amount;
  sell_price = document.product_form.sum.value;
  const number = sell_price.replace(/,/g, "");

  sum = document.product_form.sum;
  if (hm.value < 0) {
    hm.value = 0;
  }
  calc = parseInt(hm.value) * number;
  sum.value = calc.toLocaleString();
  console.log(sum.value)
}


/* cart check */
function checkAll(checked) {
  var chk = document.getElementsByName("check[]");
  for (i = 0; i < chk.length; i++) chk.item(i).checked = 'checked';
}

//테이블 상단의 체크버튼
function allchk() {
  var c0 = document.getElementById("all_chk");
  var chk = document.getElementsByName("check[]");
  for (i = 0; i < chk.length; i++) chk.item(i).checked = c0.checked;
}

// 전체상품 주문 버튼
function orderAll() {
  var chk = document.getElementsByName("check[]");
  for (i = 0; i < chk.length; i++) chk.item(i).checked = 'checked';
}