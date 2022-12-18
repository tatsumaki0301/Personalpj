/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
var target = document.getElementById("menu");
target.addEventListener('click', function () {
  target.classList.toggle('open');
  var nav = document.getElementById("nav");
  nav.classList.toggle('in');
});
var back = document.getElementById('btn--back');
back.addEventListener('click', function (e) {
  history.back();
  return false;
});
/******/ })()
;