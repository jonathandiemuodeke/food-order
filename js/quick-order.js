const cityVal = document.querySelector('#city ');
const alertBox = document.querySelector('.alert-box');
const FormBtn = document.querySelector('.submit');
const pBtn = document.querySelector('.p_btn2');
const address = document.querySelector('.input-address');
const city = document.querySelector('#city');
const area = document.querySelector('.area');
const num1 = document.querySelector('.phone1');
const num2 = document.querySelector('.phone2');
const hiddenID = document.querySelector('.ID');
// console.log(cityVal.textContent);
// adding event listener to the form
// validateDetails function
// const name = "jonathan";

const Y = new Date().getFullYear();
const M = new Date().getMonth() + 1;
const D = new Date().getDay() + 1;
const H = new Date().getHours() - 12;
const min = new Date().getMinutes();
const S = new Date().getSeconds();

// console.log(Y,M,D,H,min,S);

function ValidateDetails(e) {
  e.preventDefault();
  let location_Value = cityVal.value;
  var phone_number1 = num1.value.toString();
  var phone_number2 = num2.value.toString();

  //
  let spec1 = cityVal.value.slice(0, 3).toLocaleUpperCase();
  let spec2 = area.value.slice(0, 3).toLocaleUpperCase();

  let ID = `${spec1}${spec2}${Y}${M}${D}${H}${min}-${S}${phone_number1} `;
  console.log(ID);
  // const names = 'jonathan';
  // console.log(names.slice(0, 3).toLocaleUpperCase());

  // let sp2 = sp1.

  // GETTING THE ORDER ID

  //
  if (cityVal.value === 'ughelli') {
    area.style.display = 'inline';
  }
  if (cityVal.value !== 'ughelli') {
    // alertBox.classList.add("show-alert")
    // showAlert()
    showalert(`Delivery to ${location_Value} Currently not Available`);
    RemoveAlert('show-alert', 3000);
    addborder(city);
    RemoveBorder(city);
  } else if (area.value === 'select') {
    // alertBox.classList.add("show-alert")
    // showAlert()
    showalert(`Please Select Your Area within ${location_Value} `);
    RemoveAlert('show-alert', 3000);
    addborder(area);
    RemoveBorder(area);
  }
  // if address is not properly filled
  else if (address.value === '') {
    showalert('Please Enter a valid reciepient Address !');
    // address.classList.add("add-border")
    RemoveAlert('show-alert', 3000);
    addborder(address);
    RemoveBorder(address);
  }
  // PHONE NUMBER VALIDATION
  else if (phone_number1.length !== 11) {
    showalert(`Phone number ${phone_number1} is not Valid`);
    addborder(num1);
    RemoveAlert('show-alert', 3000);
    RemoveBorder(num1);
  } else if (phone_number2.length > 0 && phone_number2.length !== 11) {
    showalert(`Phone number ${phone_number2} is not Valid`);
    addborder(num2);
    RemoveAlert('show-alert', 3000);
    RemoveBorder(num2);
  } else {
    FormBtn.classList.add('hide-btn');
    Greenalert(
      `Your order with ID ${ID} has been received and is been processed`
    );
    RemoveAlert('green-alert', 10000);
    FormBtn.classList.remove('show-btn');
    pBtn.classList.add('show-btn');
    hiddenID.value = ID;
  }
}

FormBtn.addEventListener('click', ValidateDetails);
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
