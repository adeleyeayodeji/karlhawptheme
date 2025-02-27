/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/frontend/frontend.js":
/*!**********************************!*\
  !*** ./src/frontend/frontend.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_terminal_entry_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/terminal/entry.scss */ "./src/frontend/scss/terminal/entry.scss");
/* harmony import */ var _script_script__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./script/script */ "./src/frontend/script/script.js");
/* harmony import */ var _script_script__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_script_script__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./src/frontend/script/script.js":
/*!***************************************!*\
  !*** ./src/frontend/script/script.js ***!
  \***************************************/
/***/ (() => {

jQuery(document).ready(function ($) {
  /**
   * class array
   *
   */
  const classArray = [".home-hero-header", ".home-hero-text .OutlineElement", ".home-hero-cta"];
  classArray.forEach((selector, index) => {
    $(selector).delay(index * 500).animate({
      opacity: 1,
      top: "0px"
    }, 800);
  });

  /**
   * Get all .header-nav-link-block
   *
   */
  const headerNavLinkBlock = $(".header-nav-link-block");
  headerNavLinkBlock.each(function () {
    const $this = $(this);
    //on hover, show the dropdown
    $this.hover(function () {
      $(this).find(".header-nav-dropdown").fadeIn();
    }, function () {
      $(this).find(".header-nav-dropdown").hide();
    });
  });

  /**
   * Onclick top-header-icon-block search
   *
   */
  $(".top-header-icon-block.search").click(function (e) {
    e.preventDefault();
    //hide all .top-header-icon-block
    $(".top-header-icon-block").hide();
    //show .top-header-icon-block.searchform
    $(".top-header-icon-block.searchform").show();
  });
  $(".top-header-icon-block.searchform span").click(function (e) {
    e.preventDefault();
    $(".top-header-icon-block").show();
    $(".top-header-icon-block.searchform").hide();
  });
});

/***/ }),

/***/ "./src/frontend/scss/terminal/entry.scss":
/*!***********************************************!*\
  !*** ./src/frontend/scss/terminal/entry.scss ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!******************************!*\
  !*** ./src/karlhawptheme.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _frontend_frontend_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./frontend/frontend.js */ "./src/frontend/frontend.js");

})();

/******/ })()
;
//# sourceMappingURL=karlhawptheme.js.map