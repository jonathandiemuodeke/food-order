const salesTime = document.querySelector('.sales-time');
const sales_status = document.getElementById('sales-status').value;

//
const sun = new Date().getDay();

const time = new Date().getHours();
const prepTime = 11;
if (sun == 0) {
  // order_details.classList.add('hide-display');
  salesTime.innerHTML = `No Sales On Sunday!`;
  salesTime.style.color = 'blue';
  //
} else if (sales_status == 'off') {
  salesTime.innerHTML = `Sales has ended For The Day!`;
  salesTime.style.color = 'red';
} else if (time <= prepTime) {
  salesTime.innerHTML = `Preparation Is Currently Going On!`;
  salesTime.style.color = 'orange';
} else if (prepTime < time && time < 18) {
  salesTime.innerHTML = `Sales Currently Going On!`;
  salesTime.style.color = 'green';
} else if (time >= 18) {
  salesTime.innerHTML = `Sales Has Ended For The Day!`;
  salesTime.style.color = 'red';
} else {
  salesTime.innerHTML = `Enjoy Your Day`;
}

