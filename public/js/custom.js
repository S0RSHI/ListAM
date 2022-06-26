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
} //
// document.querySelector('#add_to_list').addEventListener('click', addlist);
// function addlist(e) {
//     e.preventDefault();
//     let id_am = {{$anime_manga[0]->id_am}};
//     let status = document.querySelector('input[name="status"]');
//     let progress = document.querySelector('input[name="porgress"]');
//     let rate = document.querySelector('input[name="rate"]');
//     let params = {
//         id_am: id_am,
//         status: status,
//         progress: progress,
//         rate: rate,
//         _token: '{{csrf_token()}}'
//     }
//     fetch('/addList', {
//         method: 'POST',
//         body: JSON.stringify(params)
//     })
// }
/******/ })()
;