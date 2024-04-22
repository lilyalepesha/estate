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
/* harmony import */ var _js_app_goods_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../js/app/goods.js */ "./resources/js/app/goods.js");
/* harmony import */ var _js_app_burger_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../js/app/burger.js */ "./resources/js/app/burger.js");





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
    var isFavorite = item.is_favourite; // Получаем состояние избранного из API
    var goodsItem = "\n        <div class=\"goods__item\" data-id=\"".concat(item.id, "\"> <!-- \u0414\u043E\u0431\u0430\u0432\u043B\u0435\u043D \u0430\u0442\u0440\u0438\u0431\u0443\u0442 data-id -->\n            <div class=\"goods__item-start-container\">\n                <svg class=\"goods_item-start ").concat(isFavorite ? 'active' : '', "\" width=\"33\" height=\"31\" viewBox=\"0 0 33 31\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                    <path d=\"M16.9743 1.00294L20.1757 10.6032C20.3799 11.2156 20.9531 11.6287 21.5987 11.6287H31.9023C32.3898 11.6287 32.589 12.2551 32.1912 12.5368L23.9005 18.4059C23.361 18.7877 23.1351 19.4777 23.3442 20.1047L26.5214 29.6325C26.6743 30.0909 26.1526 30.4779 25.7582 30.1988L17.3667 24.2583C16.8474 23.8907 16.1526 23.8907 15.6333 24.2583L7.24179 30.1988C6.84741 30.4779 6.32572 30.0909 6.47857 29.6325L9.65582 20.1047C9.8649 19.4777 9.63897 18.7877 9.09954 18.4059L0.808844 12.5368C0.410949 12.2551 0.610239 11.6287 1.09774 11.6287H11.4013C12.0469 11.6287 12.6201 11.2156 12.8243 10.6032L16.0257 1.00293C16.1777 0.547167 16.8223 0.547164 16.9743 1.00294Z\" stroke=\"white\"/>\n                </svg>\n            </div>\n            <div class=\"goods__item-image\">\n                <img src=\"").concat(item.image_url, "\" alt=\"#!\">\n            </div>\n            <div class=\"goods__item-info\">\n                <p>").concat(item.region_name, "</p>\n                <p>").concat(item.area, " \u043C<sup>2</sup></p>\n            </div>\n            <h3 class=\"goods__item-title\">").concat(item.street, "</h3>\n            <div class=\"goods__item-cost goods__cost\">\n                <p>\u0426\u0435\u043D\u0430 \u0437\u0430 \u043C<sup>2</sup></p>\n                <div class=\"goods__cost-text\">").concat(item.price, "</div>\n            </div>\n        </div>\n        ");
    goodsItemsContainer.innerHTML += goodsItem;
  });

  // Добавляем обработчик клика на звезду
  var starContainers = document.querySelectorAll('.goods__item-start-container');
  starContainers.forEach(function (starContainer) {
    starContainer.addEventListener('click', function () {
      var projectId = this.closest('.goods__item').getAttribute('data-id'); // Получаем ID проекта
      var isFavorite = !this.querySelector('.goods_item-start').classList.contains('active'); // Получаем текущее состояние избранного

      this.querySelector('.goods_item-start').classList.toggle('active', isFavorite); // Добавляем/удаляем класс active при клике на звезду

      toggleFavorite(projectId, isFavorite); // Вызываем функцию для обновления состояния избранного
    });
  });
}

// Функция для обновления состояния избранного
function toggleFavorite(projectId, isFavorite) {
  fetch('/api/update/favourites', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
      project_id: projectId,
      is_favourite: isFavorite // Отправляем текущее состояние избранного на сервер
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.success) {
      console.log('Избранное обновлено успешно');
      // Сохраняем состояние избранного в локальном хранилище
      localStorage.setItem("project_".concat(projectId, "_favorite"), isFavorite);
    } else {
      console.error('Ошибка при обновлении избранного:', data.message);
    }
  })["catch"](function (error) {
    console.error('Ошибка при выполнении запроса:', error);
  });
}

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
          html += "<div class=\"estate__item\">\n                            <img src=\"".concat(item.image_url, "\" alt=\"img\">\n                            <div class=\"estate__item-content estate__content\">\n                                <div class=\"estate__content-info\">\n                                    <p>").concat(item.region_name, "</p>\n                                    <p>").concat(item.area, " \u043C<sup>2</sup></p>\n                                </div>\n                                <h4 class=\"estate__content-title\">").concat(item.region_street, "</h4>\n                                <div class=\"estate__content-cost estate__cost\">\n                                    <p>\u0426\u0435\u043D\u0430 \u0437\u0430 \u043C<sup>2</sup></p>\n                                    <div class=\"estate__cost-text\">").concat(item.price, "</div>\n                                </div>\n                            </div>\n                        </div>");
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