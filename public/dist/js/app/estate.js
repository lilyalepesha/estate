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
  var stars = document.querySelectorAll('.goods_item-start');
  stars.forEach(function (star) {
    star.addEventListener('click', function (event) {
      var _document$getElementB, _document$getElementB2, _goodsItem$querySelec, _document$getElementB3;
      event.preventDefault();
      var goodsItem = this.closest('.goods__item');
      if (!goodsItem) {
        console.error('Goods item not found');
        return;
      }
      var userType = (_document$getElementB = document.getElementById('userType')) === null || _document$getElementB === void 0 ? void 0 : _document$getElementB.value;
      var favouriteType = (_document$getElementB2 = document.getElementById('favouriteType')) === null || _document$getElementB2 === void 0 ? void 0 : _document$getElementB2.value;
      var favouriteId = (_goodsItem$querySelec = goodsItem.querySelector('#favouriteId')) === null || _goodsItem$querySelec === void 0 ? void 0 : _goodsItem$querySelec.value;
      var userId = (_document$getElementB3 = document.getElementById('userId')) === null || _document$getElementB3 === void 0 ? void 0 : _document$getElementB3.value;
      if (!userType || !favouriteType || !favouriteId || !userId) {
        console.error('Required fields are missing');
        return;
      }
      var isFavourite = goodsItem.classList.contains('active');
      fetch('api/update/favourites', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
          user_type: userType,
          favourite_type: favouriteType,
          favourite_id: favouriteId,
          user_id: userId,
          remove: isFavourite // Pass this to handle removal
        })
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        if (data.success) {
          star.classList.add('active');
        } else {
          star.classList.remove('active');
          console.error(data.message);
        }
      })["catch"](function (error) {
        return console.error('Error:', error);
      });
    });
  });
});

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