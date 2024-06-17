/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/estate.scss":
/*!************************************!*\
  !*** ./resources/scss/estate.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/admin.scss":
/*!***********************************!*\
  !*** ./resources/scss/admin.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_app_swiper_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../js/app/swiper.js */ "./resources/js/app/swiper.js");
/* harmony import */ var _js_app_script_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../js/app/script.js */ "./resources/js/app/script.js");
/* harmony import */ var _js_app_image_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../js/app/image.js */ "./resources/js/app/image.js");
/* harmony import */ var _js_app_burger_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../js/app/burger.js */ "./resources/js/app/burger.js");
/* harmony import */ var _js_app_rating_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../js/app/rating.js */ "./resources/js/app/rating.js");
/* harmony import */ var _js_app_star_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../js/app/star.js */ "./resources/js/app/star.js");







/***/ }),

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

/***/ "./resources/js/app/image.js":
/*!***********************************!*\
  !*** ./resources/js/app/image.js ***!
  \***********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
document.addEventListener("DOMContentLoaded", function () {
  var modal = document.querySelector('.modal');
  document.querySelectorAll('.best__image-wrapper').forEach(function (wrapper) {
    wrapper.querySelectorAll('.image').forEach(function (image) {
      image.addEventListener('click', function () {
        modal.classList.add('active');
        modal.querySelector('.modal-content').setAttribute('src', image.getAttribute('src'));
      });
    });
  });
  modal.querySelector('.close').addEventListener('click', function () {
    modal.classList.remove('active');
  });
});

/***/ }),

/***/ "./resources/js/app/rating.js":
/*!************************************!*\
  !*** ./resources/js/app/rating.js ***!
  \************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
window.onload = function () {
  var stars = document.querySelectorAll('.architect__stars svg');
  var ratingInput = document.querySelector('#rating');
  stars.forEach(function (star) {
    star.addEventListener('click', function () {
      var value = this.getAttribute('data-value');
      ratingInput.value = value;
      highlightStars(value);
    });
    star.addEventListener('mouseover', function () {
      var value = this.getAttribute('data-value');
      highlightStars(value);
    });
    star.addEventListener('mouseout', function () {
      var value = ratingInput.value;
      highlightStars(value);
    });
  });
  function highlightStars(value) {
    stars.forEach(function (star) {
      if (star.getAttribute('data-value') <= value && value) {
        star.classList.add('active');
      } else {
        star.classList.remove('active');
      }
    });
  }
};

/***/ }),

/***/ "./resources/js/app/script.js":
/*!************************************!*\
  !*** ./resources/js/app/script.js ***!
  \************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
document.addEventListener('DOMContentLoaded', function () {
  var showMoreButton = document.getElementById('show-more-btn');
  var estateItems = document.getElementById('estate-items');

  // Функция для загрузки данных
  var loadData = function loadData(showMore) {
    var url = '/api/projects';
    if (showMore) {
      url += '?show-more=true';
    }
    fetch(url).then(function (response) {
      return response.json();
    }).then(function (data) {
      if (data.success) {
        var html = '';
        data.message.forEach(function (item) {
          html += "\n                        <a href=\"/goods/".concat(item.project_id, "\" class=\"goods__item-link\">\n                            <div class=\"estate__item\">\n                                <img src=\"").concat(item.image_url, "\" alt=\"img\">\n                                <div class=\"estate__item-content estate__content\">\n                                    <div class=\"estate__content-info\">\n                                        <p>").concat(item.region_name, "</p>\n                                        <p>").concat(item.area, " BYN</p>\n                                    </div>\n                                    <h4 class=\"estate__content-title\">").concat(item.region_street, "</h4>\n                                    <div class=\"estate__content-cost estate__cost\">\n                                        <p>\u0426\u0435\u043D\u0430</p>\n                                        <div class=\"estate__cost-text\">").concat(item.price, "</div>\n                                    </div>\n                                </div>\n                            </div>\n                        </a>");
        });
        estateItems.innerHTML = html;
      } else {
        console.error('Ошибка при загрузке данных');
      }
    })["catch"](function (error) {
      return console.error('Ошибка при выполнении запроса:', error);
    });
  };

  // При загрузке страницы загружаем только первые 6 записей
  loadData(false);

  // При нажатии на кнопку "Показать ещё" загружаем все записи
  showMoreButton.addEventListener('click', function () {
    loadData(true);
  });
});

/***/ }),

/***/ "./resources/js/app/star.js":
/*!**********************************!*\
  !*** ./resources/js/app/star.js ***!
  \**********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
document.addEventListener('DOMContentLoaded', function () {
  var starsContainer = document.querySelector('.architect__image-stars');
  var stars = document.querySelectorAll('.star-container');
  var rating = parseFloat(starsContainer.getAttribute('data-rating'));
  highlightStars(rating);
  function highlightStars(value) {
    stars.forEach(function (star) {
      var starValue = parseFloat(star.getAttribute('data-value'));
      var fillWidth = 0;
      if (value >= starValue) {
        fillWidth = 100;
      } else if (value > starValue - 1) {
        fillWidth = (value - (starValue - 1)) * 100;
      }
      star.style.setProperty('--clip-width', "".concat(fillWidth, "%"));
    });
  }
});

/***/ }),

/***/ "./resources/js/app/swiper.js":
/*!************************************!*\
  !*** ./resources/js/app/swiper.js ***!
  \************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper('.regions__slider', {
    autoplay: {
      delay: 1000
    },
    slidesPerView: 3,
    spaceBetween: 30,
    breakpoints: {
      600: {
        slidesPerView: 3
      },
      400: {
        slidesPerView: 20
      },
      320: {
        slidesPerView: 1
      },
      1260: {
        slidesPerView: 4
      }
    },
    navigation: {
      nextEl: '.regions__slider-button--prev ',
      prevEl: '.regions__slider-button--next'
    }
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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/js/app/app": 0,
/******/ 			"dist/css/app/admin": 0,
/******/ 			"dist/css/app/estate": 0,
/******/ 			"dist/css/app/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/css/app/admin","dist/css/app/estate","dist/css/app/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app/admin","dist/css/app/estate","dist/css/app/app"], () => (__webpack_require__("./resources/scss/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app/admin","dist/css/app/estate","dist/css/app/app"], () => (__webpack_require__("./resources/scss/estate.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/css/app/admin","dist/css/app/estate","dist/css/app/app"], () => (__webpack_require__("./resources/scss/admin.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;