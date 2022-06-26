/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
document.onload = addToList();

function addToList() {
  var popup = document.querySelector('#popup');
  document.querySelector('#single-am__button').addEventListener('click', function () {
    if (popup.style.display != 'flex') {
      popup.style.display = 'flex';
      popup.style.width = '100%';
      popup.style.height = '100%';
    } else {
      popup.style.display = 'none';
      popup.style.width = '0%';
      popup.style.height = '0%';
    }
  });
  popup.addEventListener('click', function (e) {
    if (e.target == popup) popup.style.display = 'none';
  });
}
/******/ })()
;