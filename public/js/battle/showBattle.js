/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/battle/ShowBattleLog.js":
/*!**********************************************!*\
  !*** ./resources/js/battle/ShowBattleLog.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ ShowBattleLog)\n/* harmony export */ });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nvar ShowBattleLog = /*#__PURE__*/function () {\n  function ShowBattleLog(obj) {\n    _classCallCheck(this, ShowBattleLog);\n\n    this.apiData = [];\n    this.mainWrapper = $('#' + obj[0].id);\n  }\n\n  _createClass(ShowBattleLog, [{\n    key: \"setData\",\n    value: function setData() {\n      var apiData = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];\n      this.apiData = apiData;\n    }\n  }, {\n    key: \"buildElement\",\n    value: function buildElement() {\n      var battleable = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {\n        battleable_name: '',\n        action_type: '',\n        action_value: ''\n      };\n      return $(\"<h4 class=\\\"py-0 my-0\\\" ><span class=\\\"text-success\\\">\".concat(battleable.battleable_name, \"</span>\\n                            { \").concat(battleable.action_type, \" }\\n                            \").concat(battleable.action_value, \" \").concat(this.getLabel(battleable.action_type), \"</h4>\"));\n    }\n  }, {\n    key: \"getLabel\",\n    value: function getLabel() {\n      var action_type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';\n\n      switch (action_type) {\n        case 'attack':\n          return 'DMG';\n\n        case 'survive':\n          return 'HP LEFT';\n\n        default:\n          return action_type;\n      }\n    }\n  }, {\n    key: \"showLogs\",\n    value: function showLogs() {\n      var _this = this;\n\n      this.mainWrapper.find('.alert').empty();\n      this.mainWrapper.removeClass('d-none');\n      var alertWrapper = this.mainWrapper.find('.alert');\n      this.apiData.forEach(function (e) {\n        alertWrapper.append(_this.buildElement(e));\n      });\n    }\n  }]);\n\n  return ShowBattleLog;\n}();\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYmF0dGxlL1Nob3dCYXR0bGVMb2cuanMuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztJQUFxQkE7QUFDakIseUJBQVlDLEdBQVosRUFBaUI7QUFBQTs7QUFDYixTQUFLQyxPQUFMLEdBQWUsRUFBZjtBQUNBLFNBQUtDLFdBQUwsR0FBbUJDLENBQUMsQ0FBQyxNQUFNSCxHQUFHLENBQUMsQ0FBRCxDQUFILENBQU9JLEVBQWQsQ0FBcEI7QUFDSDs7OztXQUVELG1CQUFzQjtBQUFBLFVBQWRILE9BQWMsdUVBQUosRUFBSTtBQUNsQixXQUFLQSxPQUFMLEdBQWVBLE9BQWY7QUFDSDs7O1dBRUQsd0JBQW9GO0FBQUEsVUFBdkVJLFVBQXVFLHVFQUExRDtBQUFDQyxRQUFBQSxlQUFlLEVBQUUsRUFBbEI7QUFBc0JDLFFBQUFBLFdBQVcsRUFBRSxFQUFuQztBQUF1Q0MsUUFBQUEsWUFBWSxFQUFFO0FBQXJELE9BQTBEO0FBQ2hGLGFBQU9MLENBQUMsaUVBQXNERSxVQUFVLENBQUNDLGVBQWpFLG9EQUNnQkQsVUFBVSxDQUFDRSxXQUQzQiw2Q0FFY0YsVUFBVSxDQUFDRyxZQUZ6QixjQUV5QyxLQUFLQyxRQUFMLENBQWNKLFVBQVUsQ0FBQ0UsV0FBekIsQ0FGekMsV0FBUjtBQUdIOzs7V0FFRCxvQkFBMkI7QUFBQSxVQUFsQkEsV0FBa0IsdUVBQUosRUFBSTs7QUFDdkIsY0FBUUEsV0FBUjtBQUNJLGFBQUssUUFBTDtBQUNJLGlCQUFPLEtBQVA7O0FBQ0osYUFBSyxTQUFMO0FBQ0ksaUJBQU8sU0FBUDs7QUFDSjtBQUNJLGlCQUFPQSxXQUFQO0FBTlI7QUFRSDs7O1dBRUQsb0JBQVc7QUFBQTs7QUFDUCxXQUFLTCxXQUFMLENBQWlCUSxJQUFqQixDQUFzQixRQUF0QixFQUFnQ0MsS0FBaEM7QUFDQSxXQUFLVCxXQUFMLENBQWlCVSxXQUFqQixDQUE2QixRQUE3QjtBQUNBLFVBQU1DLFlBQVksR0FBRyxLQUFLWCxXQUFMLENBQWlCUSxJQUFqQixDQUFzQixRQUF0QixDQUFyQjtBQUVBLFdBQUtULE9BQUwsQ0FBYWEsT0FBYixDQUFxQixVQUFDQyxDQUFELEVBQU87QUFDeEJGLFFBQUFBLFlBQVksQ0FBQ0csTUFBYixDQUFvQixLQUFJLENBQUNDLFlBQUwsQ0FBa0JGLENBQWxCLENBQXBCO0FBQ0gsT0FGRDtBQUdIIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2JhdHRsZS9TaG93QmF0dGxlTG9nLmpzPzA2MmQiXSwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IGRlZmF1bHQgY2xhc3MgU2hvd0JhdHRsZUxvZyB7XG4gICAgY29uc3RydWN0b3Iob2JqKSB7XG4gICAgICAgIHRoaXMuYXBpRGF0YSA9IFtdO1xuICAgICAgICB0aGlzLm1haW5XcmFwcGVyID0gJCgnIycgKyBvYmpbMF0uaWQpO1xuICAgIH1cblxuICAgIHNldERhdGEoYXBpRGF0YSA9IFtdKSB7XG4gICAgICAgIHRoaXMuYXBpRGF0YSA9IGFwaURhdGE7XG4gICAgfVxuXG4gICAgYnVpbGRFbGVtZW50KGJhdHRsZWFibGUgPSB7YmF0dGxlYWJsZV9uYW1lOiAnJywgYWN0aW9uX3R5cGU6ICcnLCBhY3Rpb25fdmFsdWU6ICcnfSkge1xuICAgICAgICByZXR1cm4gJChgPGg0IGNsYXNzPVwicHktMCBteS0wXCIgPjxzcGFuIGNsYXNzPVwidGV4dC1zdWNjZXNzXCI+JHtiYXR0bGVhYmxlLmJhdHRsZWFibGVfbmFtZX08L3NwYW4+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyAke2JhdHRsZWFibGUuYWN0aW9uX3R5cGV9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAke2JhdHRsZWFibGUuYWN0aW9uX3ZhbHVlfSAke3RoaXMuZ2V0TGFiZWwoYmF0dGxlYWJsZS5hY3Rpb25fdHlwZSl9PC9oND5gKTtcbiAgICB9XG5cbiAgICBnZXRMYWJlbChhY3Rpb25fdHlwZSA9ICcnKSB7XG4gICAgICAgIHN3aXRjaCAoYWN0aW9uX3R5cGUpIHtcbiAgICAgICAgICAgIGNhc2UgJ2F0dGFjayc6XG4gICAgICAgICAgICAgICAgcmV0dXJuICdETUcnO1xuICAgICAgICAgICAgY2FzZSAnc3Vydml2ZSc6XG4gICAgICAgICAgICAgICAgcmV0dXJuICdIUCBMRUZUJztcbiAgICAgICAgICAgIGRlZmF1bHQ6XG4gICAgICAgICAgICAgICAgcmV0dXJuIGFjdGlvbl90eXBlO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgc2hvd0xvZ3MoKSB7XG4gICAgICAgIHRoaXMubWFpbldyYXBwZXIuZmluZCgnLmFsZXJ0JykuZW1wdHkoKTtcbiAgICAgICAgdGhpcy5tYWluV3JhcHBlci5yZW1vdmVDbGFzcygnZC1ub25lJyk7XG4gICAgICAgIGNvbnN0IGFsZXJ0V3JhcHBlciA9IHRoaXMubWFpbldyYXBwZXIuZmluZCgnLmFsZXJ0Jyk7XG5cbiAgICAgICAgdGhpcy5hcGlEYXRhLmZvckVhY2goKGUpID0+IHtcbiAgICAgICAgICAgIGFsZXJ0V3JhcHBlci5hcHBlbmQodGhpcy5idWlsZEVsZW1lbnQoZSkpO1xuICAgICAgICB9KTtcbiAgICB9XG59XG4iXSwibmFtZXMiOlsiU2hvd0JhdHRsZUxvZyIsIm9iaiIsImFwaURhdGEiLCJtYWluV3JhcHBlciIsIiQiLCJpZCIsImJhdHRsZWFibGUiLCJiYXR0bGVhYmxlX25hbWUiLCJhY3Rpb25fdHlwZSIsImFjdGlvbl92YWx1ZSIsImdldExhYmVsIiwiZmluZCIsImVtcHR5IiwicmVtb3ZlQ2xhc3MiLCJhbGVydFdyYXBwZXIiLCJmb3JFYWNoIiwiZSIsImFwcGVuZCIsImJ1aWxkRWxlbWVudCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/battle/ShowBattleLog.js\n");

/***/ }),

/***/ "./resources/js/battle/showBattle.js":
/*!*******************************************!*\
  !*** ./resources/js/battle/showBattle.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _ShowBattleLog__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShowBattleLog */ \"./resources/js/battle/ShowBattleLog.js\");\n\nvar init = null;\n$.fn.extend({\n  initBattleClass: function initBattleClass() {\n    init = new _ShowBattleLog__WEBPACK_IMPORTED_MODULE_0__[\"default\"](this);\n  },\n  setData: function setData(apiData) {\n    if (init) {\n      init.setData(apiData);\n    }\n  },\n  showLogs: function showLogs(route) {\n    if (init && init.apiData !== []) {\n      axios.get(route).then(function (response) {\n        init.setData(response.data.data);\n        init.showLogs();\n      })[\"catch\"](function (error) {\n        console.log(error);\n      });\n    }\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYmF0dGxlL3Nob3dCYXR0bGUuanMuanMiLCJtYXBwaW5ncyI6Ijs7QUFBQTtBQUVBLElBQUlDLElBQUksR0FBRyxJQUFYO0FBRUFDLENBQUMsQ0FBQ0MsRUFBRixDQUFLQyxNQUFMLENBQVk7QUFDUkMsRUFBQUEsZUFBZSxFQUFFLDJCQUFZO0FBQ3pCSixJQUFBQSxJQUFJLEdBQUcsSUFBSUQsc0RBQUosQ0FBa0IsSUFBbEIsQ0FBUDtBQUNILEdBSE87QUFJUk0sRUFBQUEsT0FBTyxFQUFFLGlCQUFDQyxPQUFELEVBQWE7QUFDbEIsUUFBSU4sSUFBSixFQUFVO0FBQ05BLE1BQUFBLElBQUksQ0FBQ0ssT0FBTCxDQUFhQyxPQUFiO0FBQ0g7QUFDSixHQVJPO0FBU1JDLEVBQUFBLFFBQVEsRUFBRSxrQkFBQ0MsS0FBRCxFQUFXO0FBQ2pCLFFBQUlSLElBQUksSUFBSUEsSUFBSSxDQUFDTSxPQUFMLEtBQWlCLEVBQTdCLEVBQWlDO0FBQzdCRyxNQUFBQSxLQUFLLENBQUNDLEdBQU4sQ0FBVUYsS0FBVixFQUNLRyxJQURMLENBQ1UsVUFBQ0MsUUFBRCxFQUFjO0FBQ2hCWixRQUFBQSxJQUFJLENBQUNLLE9BQUwsQ0FBYU8sUUFBUSxDQUFDQyxJQUFULENBQWNBLElBQTNCO0FBRUFiLFFBQUFBLElBQUksQ0FBQ08sUUFBTDtBQUNILE9BTEwsV0FLYSxVQUFBTyxLQUFLLEVBQUk7QUFDbEJDLFFBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZRixLQUFaO0FBQ0gsT0FQRDtBQVFIO0FBQ0o7QUFwQk8sQ0FBWiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9iYXR0bGUvc2hvd0JhdHRsZS5qcz82MDljIl0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBTaG93QmF0dGxlTG9nIGZyb20gXCIuL1Nob3dCYXR0bGVMb2dcIjtcblxubGV0IGluaXQgPSBudWxsO1xuXG4kLmZuLmV4dGVuZCh7XG4gICAgaW5pdEJhdHRsZUNsYXNzOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGluaXQgPSBuZXcgU2hvd0JhdHRsZUxvZyh0aGlzKTtcbiAgICB9LFxuICAgIHNldERhdGE6IChhcGlEYXRhKSA9PiB7XG4gICAgICAgIGlmIChpbml0KSB7XG4gICAgICAgICAgICBpbml0LnNldERhdGEoYXBpRGF0YSk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIHNob3dMb2dzOiAocm91dGUpID0+IHtcbiAgICAgICAgaWYgKGluaXQgJiYgaW5pdC5hcGlEYXRhICE9PSBbXSkge1xuICAgICAgICAgICAgYXhpb3MuZ2V0KHJvdXRlKVxuICAgICAgICAgICAgICAgIC50aGVuKChyZXNwb25zZSkgPT4ge1xuICAgICAgICAgICAgICAgICAgICBpbml0LnNldERhdGEocmVzcG9uc2UuZGF0YS5kYXRhKTtcblxuICAgICAgICAgICAgICAgICAgICBpbml0LnNob3dMb2dzKCk7XG4gICAgICAgICAgICAgICAgfSkuY2F0Y2goZXJyb3IgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycm9yKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfVxufSk7XG5cbiJdLCJuYW1lcyI6WyJTaG93QmF0dGxlTG9nIiwiaW5pdCIsIiQiLCJmbiIsImV4dGVuZCIsImluaXRCYXR0bGVDbGFzcyIsInNldERhdGEiLCJhcGlEYXRhIiwic2hvd0xvZ3MiLCJyb3V0ZSIsImF4aW9zIiwiZ2V0IiwidGhlbiIsInJlc3BvbnNlIiwiZGF0YSIsImVycm9yIiwiY29uc29sZSIsImxvZyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/battle/showBattle.js\n");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/battle/showBattle.js");
/******/ 	
/******/ })()
;