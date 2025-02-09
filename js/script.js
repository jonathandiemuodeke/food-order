const footerYear = document.querySelector('.current-year');
footer_fixed = document.querySelector('.footer-fixed');
const bd = document.querySelector('body');

// SELECTORS
//
//
// FOR THE NAVAIGATION
const navToggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('nav');
const links = document.querySelector('.links');
const container = document.querySelector('.links-container');
navToggle.addEventListener('click', function (e) {
  // to make the links height to be dynaymic, we use the setup commented below
  // con_height = container.getBoundingClientRect().height;
  // li_height = links.getBoundingClientRect().height;
  // console.log(con_height);
  // console.log(li_height);
  // if (con_height === 0) {
  //   container.style.height = `${li_height}`;
  // } else {
  //   container.style.height = 0;
  // }
  links.classList.toggle('show-links');
});

//
// FIXED-NAV ON SCROLL
window.addEventListener('scroll', function () {
  const scrollHeight = window.pageYOffset;
  if (scrollHeight > '69') {
    nav.classList.add('fixed-nav');
  } else {
    nav.classList.remove('fixed-nav');
  }
  if (links.classList.contains('show-links')) {
    links.classList.remove('show-links');
  }
});
//
// FOR THE NAVAIGATION
//

//
//

// Preparation Going On
const dateBuilt = new Date('09/03/2021').getFullYear();
const CurrentYear = new Date().getFullYear();
// const date = ;
if (dateBuilt === CurrentYear) {
  footerYear.innerHTML = dateBuilt;
} else {
  footerYear.innerHTML = `${dateBuilt} - ${CurrentYear}`;
}
// END OF FOOTER YEAR
// fixing the footer at the bottom

const bodyHeight = bd.offsetHeight;
if (bodyHeight < 500) {
  footer_fixed.classList.add('fixed');
} else {
  footer_fixed.classList.remove('fixed');
}
