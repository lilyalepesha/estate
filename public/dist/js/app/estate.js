/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app/burger.js":
/*!************************************!*\
  !*** ./resources/js/app/burger.js ***!
  \************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
window.onload = function () {
  (function () {
    var menu = document.querySelector('.header__nav');
    var button = document.querySelector('.icon__menu');
    if (menu && button) {
      button.addEventListener('click', function () {
        button.classList.toggle('active');
        menu.classList.toggle('active');
        document.body.classList.toggle('lock');
      });
      document.querySelectorAll('.header__list-item').forEach(function (item) {
        item.addEventListener('click', function () {
          button.classList.remove('active');
          menu.classList.remove('active');
          document.body.classList.remove('lock');
        });
      });
    }
  })();
};

/***/ }),

/***/ "./resources/js/app/goods.js":
/*!***********************************!*\
  !*** ./resources/js/app/goods.js ***!
  \***********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
document.addEventListener('DOMContentLoaded', function () {
  var filterButton = document.querySelector('.goods__filter-button');
  loadProjects();
  filterButton.addEventListener('click', function () {
    // Загрузка отфильтрованных проектов при клике на кнопку фильтра
    loadProjects();
  });
});

// Функция для загрузки проектов
function loadProjects() {
  var type = document.getElementById('type').value;
  var region = document.getElementById('region').value;
  var url = '/api/goods';

  // Добавляем параметры к URL, если они не пустые
  if (type.trim() !== '' || region.trim() !== '') {
    url += "?type=".concat(type, "&region=").concat(region);
  }
  fetch(url, {
    method: 'GET',
    // Используем метод GET для получения данных
    headers: {
      'Content-Type': 'application/json',
      // Устанавливаем заголовок Content-Type
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Получаем CSRF токен
    }
  }).then(function (response) {
    return response.json();
  }) // Преобразуем ответ сервера в JSON
  .then(function (data) {
    // Обновляем данные на странице
    updateGoodsItems(data.data);
  })["catch"](function (error) {
    console.error('Error:', error);
  });
}

// Функция для обновления товаров на странице
function updateGoodsItems(data) {
  var goodsItemsContainer = document.querySelector('.goods__items');
  goodsItemsContainer.innerHTML = ''; // Очищаем контейнер товаров

  // Добавляем новые товары на страницу
  data.forEach(function (item) {
    var goodsItem = "\n            <div class=\"goods__item\">\n                <div class=\"goods__item-image\">\n                    <img src=\"".concat(item.image_url, "\" alt=\"#!\">\n                </div>\n                <div class=\"goods__item-info\">\n                    <p>").concat(item.region_name, "</p>\n                    <p>").concat(item.area, " \u043C<sup>2</sup</p>\n                </div>\n                <h3 class=\"goods__item-title\">").concat(item.street, "</h3>\n                <div class=\"goods__item-cost goods__cost\">\n                    <p>\u0426\u0435\u043D\u0430 \u0437\u0430 \u043C<sup>2</sup></p>\n                    <div class=\"goods__cost-text\">").concat(item.price, "</div>\n                </div>\n            </div>\n        ");
    goodsItemsContainer.innerHTML += goodsItem;
  });
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!********************************!*\
  !*** ./resources/js/estate.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_app_goods_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../js/app/goods.js */ "./resources/js/app/goods.js");
/* harmony import */ var _js_app_burger_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../js/app/burger.js */ "./resources/js/app/burger.js");


})();

/******/ })()
;