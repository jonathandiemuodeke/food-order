const customer_name = document.querySelector('#name');
const number = document.querySelector('#number');
const email = document.querySelector('#email');
const message = document.querySelector('.message');
const btn = document.querySelector('.proceed-btn');
const alertBox = document.querySelector('.alert-box');

// JUST THE BOX
// const nameBox = document.querySelector('#name');
// const numberBox = document.querySelector('#number');
// const emailBox = document.querySelector('#email');
// const messageBox = document.querySelector('.message');
// JUST THE BOX
// the date
const Y = new Date().getFullYear();
const M = new Date().getMonth() + 1;
const D = new Date().getDay() + 1;
const H = new Date().getHours() - 12;
const min = new Date().getMinutes();
const S = new Date().getSeconds();
// the date ends here

function ValidateDetails(e) {
  e.preventDefault();

  num = number.value.toString();
  cname = customer_name.value;

  if (customer_name.value == '') {
    showalert(`Please Fill in Your Name`);
    RemoveAlert('show-alert', 3000);
    addborder(customer_name);
    RemoveBorder(customer_name);
    //
  } else if (num.length !== 11) {
    showalert(`Phone number ${num} is not Valid`);
    console.log(num.length);
    addborder(number);
    RemoveAlert('show-alert', 3000);
    RemoveBorder(number);
    //
  } else if (!validateEmail(email)) {
    showalert(`Please enter a valid email`);
    addborder(email);
    RemoveAlert('show-alert', 3000);
    RemoveBorder(email);
    //
  } else if (message.value == '' || message < 20) {
    showalert(`Please leave a message for us`);
    addborder(message);
    RemoveAlert('show-alert', 3000);
    RemoveBorder(message);
  } else {
    Greenalert(
      `Dear ${cname}, We have recieved your message and we would reply shortly`
    );
    RemoveAlert('green-alert', 3000);
  }
}
btn.addEventListener('click', ValidateDetails);
// END OF FORM VALIDATION
//
//

function showalert(alertType) {
  alertBox.classList.add('show-alert');
  alertBox.innerHTML = alertType;
}
function Greenalert(alertType) {
  alertBox.classList.add('green-alert');
  alertBox.innerHTML = alertType;
}

// add border function
function addborder(border) {
  border.classList.add('add-border');
}

function RemoveAlert(className, delay) {
  setTimeout(() => {
    alertBox.classList.remove(className);
  }, delay);
}
function RemoveBorder(remove) {
  setTimeout(() => {
    remove.classList.remove('add-border');
  }, 3000);
}

// email validation
function validateEmail(input) {
  // const validRegex =
  // /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\[a-zA-Z0-9-]+)*$/;
  const validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (input.value.match(validRegex)) {
    return true;
  } else {
    return false;
  }
}
