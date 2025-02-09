// SELECTORS
const order_table = document.querySelector('.order-quantity');
const riceBtn = document.querySelectorAll('.rice-btn');
const food_order = document.querySelector('#food');
// name of rice that is selected
// const rice = document.querySelector('.food-name');
// console.log(rice);
// the form
const food_form = document.querySelector('.food');
const menu_btn = document.querySelectorAll('.menu-btn');
const quantity_amount = document.querySelector('.quantity');
// const amount = document.querySelector('.amount');
const amount = document.querySelectorAll('.td-amount');
const delivery_amount = document.querySelector('.delivery');
// console.log(delivery_amount);
const total_amount = document.querySelector('.total');
const amount_val = document.querySelectorAll('.amount');
const proceedBtn = document.querySelector('.proceed-btn');
const p_btn = document.querySelector('.p_btn2');
// console.log(p_btn);
// console.log(amount_val[0].value);

//
proceedBtn.addEventListener('click', function (e) {
  e.preventDefault();

  let total =
    ~~amount_val[0].value +
    ~~amount_val[1].value +
    ~~amount_val[2].value +
    ~~amount_val[3].value +
    ~~amount_val[4].value +
    ~~amount_val[5].value +
    ~~amount_val[6].value;
  // console.log(total);

  if (~~amount_val[7].value === 0) {
    total_amount.value = total + ~~delivery_amount.value;
  } else {
    total_amount.value =
      total * ~~amount_val[7].value + ~~delivery_amount.value;
    // this code is done to keep the delivery fee at thesame price even if the number of plates is more than one. i.e, if its 5 plates, the customer will pay for five plates and one delivery fee.
  }

  proceedBtn.classList.remove('show-btn');
  p_btn.classList.add('show-btn');
  //
});
//
// console.log(amount[1].childNodes[1].value);
// amount[1].value = 100;
//
// // totalamount.forEach(function (amount) {
// for (let index = 0; index < amount.length; index++) {
//   const element = amount[index];
//   console.log(element);
//   var val = ~~element.textContent;
//   console.log(val);
//   var a = val + ~~element.textContent;
//   // console.log(a);
// }
var val = ~~amount.textContent;
val += val;
// console.log(val);
// });
//
// console.log(menu_btn);
// let pre = order_table.previousElementSibling;
// let post = order_table.nextSibling;
// console.log(pre);
// console.log(post);

// *** END OF SELECTORS ***
// adding event listener to the rice btn
riceBtn.forEach(function (rice) {
  rice.addEventListener('click', function (e) {
    riceName = e.currentTarget.innerHTML;
    console.log(riceName);
    order_table.classList.add('show-quantity');
    // rice.textContent = riceName;
    document.querySelector('.food-name').value = riceName;
  });
});
//***  adding event listener to the rice btn

//menu btn
menu_btn.forEach(function (btn) {
  btn.addEventListener('click', Add_subtract);
});

function Add_subtract(btn) {
  btn.preventDefault();
  const currentBtn = btn.currentTarget;
  // console.log(currentBtn);
  var btnVal = btn.currentTarget.textContent.slice(1);
  // BUTTON SIBLINGS

  const rightSibling = btn.currentTarget.parentNode.nextElementSibling;
  // console.log(rightSibling.childNodes[1]);
  const leftSibling =
    btn.currentTarget.parentNode.previousElementSibling.previousElementSibling;

  var btnValInt = ~~btnVal;

  var preVal = btn.currentTarget.parentNode.previousElementSibling.innerHTML;

  var next = btn.currentTarget.parentNode.nextElementSibling;
  // console.log(next);
  var nextVal = ~~next.textContent;
  // console.log(nextVal);
  //
  add(currentBtn, btnValInt);
  subtract(currentBtn, btnValInt);
}
//

// ADD BUTTON
function add(current, btnValInt) {
  // CL class list
  const CL = current.classList.contains('increase');
  if (CL) {
    const left = current.parentNode.previousElementSibling;
    var leftValue = ~~left.textContent;
    const right =
      current.parentNode.nextElementSibling.nextElementSibling.childNodes[1];
    // console.log(right.childNodes[1]);
    var rightValue = ~~right.textContent;
    var temp = leftValue + btnValInt;
    // right.innerHTML = temp;
    right.value = temp;
    left.innerHTML = temp;
    // console.log(rightValue);
  }
  if (!proceedBtn.classList.contains('show-btn')) {
    proceedBtn.classList.remove('hide-btn');
    proceedBtn.classList.add('show-btn');
  }
}

//
//
function subtract(current, btnValInt) {
  // CL class list
  const CL = current.classList.contains('decrease');
  if (CL) {
    const left =
      current.parentNode.previousElementSibling.previousElementSibling;
    var leftValue = ~~left.textContent;
    const right = current.parentNode.nextElementSibling.childNodes[1];
    var rightValue = ~~right.value;
    // let temp = leftValue - btnValInt;
    let temp = rightValue - btnValInt;
    if (temp < 100) {
      // right.innerHTML = 0;
      right.value = 0;
      left.innerHTML = 0;
    } else {
      // right.innerHTML = temp;
      right.value = temp;
      left.innerHTML = temp;
    }
  }
  if (p_btn.classList.contains('show-btn')) {
    p_btn.classList.remove('show-btn');
    proceedBtn.classList.add('show-btn');
  }
  if (!proceedBtn.classList.contains('show-btn')) {
    proceedBtn.classList.add('show-btn');
  }
}
//
const no_sales_day = new Date().getDay();
if (no_sales_day == 0) {
  food_order.innerHTML = `<div class="welcome text-red"><h4 class="sales-time">oops! No Sales On Sunday!</h4></div>`;
}
// FOOD IS FINISHED DISPLAY
const sales_sts = document.getElementById('sales-status').value;
if (sales_sts == 'off') {
  food_order.innerHTML = `<div class="welcome text-red"><h4 class="sales-time">oops! Food has finished!</h4></div>`;
}
