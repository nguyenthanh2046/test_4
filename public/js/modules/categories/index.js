/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/modules/categories/index.js":
/*!**************************************************!*\
  !*** ./resources/js/modules/categories/index.js ***!
  \**************************************************/
/***/ (() => {

eval("$(function () {\n  $('body').on('click', '.btn-action-delete', function () {\n    var url = $(this).data('url');\n    var $removeRow = $(this).parents('tr');\n    $('#alert_action_result').hide();\n    $.ajax({\n      type: 'GET',\n      url: url\n    }).done(function (result) {\n      $removeRow.remove();\n      $('#alert_action_result').show().children('.message').text(result.message);\n      setTimeout(function () {\n        $('#alert_action_result').hide();\n      }, 3000);\n    }).fail(function (response) {\n      console.log(response.message);\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbW9kdWxlcy9jYXRlZ29yaWVzL2luZGV4LmpzPzVhMjkiXSwibmFtZXMiOlsiJCIsIm9uIiwidXJsIiwiZGF0YSIsIiRyZW1vdmVSb3ciLCJwYXJlbnRzIiwiaGlkZSIsImFqYXgiLCJ0eXBlIiwiZG9uZSIsInJlc3VsdCIsInJlbW92ZSIsInNob3ciLCJjaGlsZHJlbiIsInRleHQiLCJtZXNzYWdlIiwic2V0VGltZW91dCIsImZhaWwiLCJyZXNwb25zZSIsImNvbnNvbGUiLCJsb2ciXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsWUFBVztBQUNUQSxFQUFBQSxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLEVBQVYsQ0FBYSxPQUFiLEVBQXNCLG9CQUF0QixFQUE0QyxZQUFXO0FBQ25ELFFBQUlDLEdBQUcsR0FBR0YsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRRyxJQUFSLENBQWEsS0FBYixDQUFWO0FBQ0EsUUFBSUMsVUFBVSxHQUFHSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLE9BQVIsQ0FBZ0IsSUFBaEIsQ0FBakI7QUFDQUwsSUFBQUEsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJNLElBQTFCO0FBQ0FOLElBQUFBLENBQUMsQ0FBQ08sSUFBRixDQUFPO0FBQ0hDLE1BQUFBLElBQUksRUFBRSxLQURIO0FBRUhOLE1BQUFBLEdBQUcsRUFBRUE7QUFGRixLQUFQLEVBR0dPLElBSEgsQ0FHUSxVQUFTQyxNQUFULEVBQWlCO0FBQ3JCTixNQUFBQSxVQUFVLENBQUNPLE1BQVg7QUFDQVgsTUFBQUEsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJZLElBQTFCLEdBQWlDQyxRQUFqQyxDQUEwQyxVQUExQyxFQUFzREMsSUFBdEQsQ0FBMkRKLE1BQU0sQ0FBQ0ssT0FBbEU7QUFDQUMsTUFBQUEsVUFBVSxDQUFDLFlBQVc7QUFDbEJoQixRQUFBQSxDQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQk0sSUFBMUI7QUFDSCxPQUZTLEVBRVAsSUFGTyxDQUFWO0FBR0gsS0FURCxFQVNHVyxJQVRILENBU1EsVUFBU0MsUUFBVCxFQUFtQjtBQUN2QkMsTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVlGLFFBQVEsQ0FBQ0gsT0FBckI7QUFDSCxLQVhEO0FBWUgsR0FoQkQ7QUFpQkgsQ0FsQkEsQ0FBRCIsInNvdXJjZXNDb250ZW50IjpbIiQoZnVuY3Rpb24gKCl7XHJcbiAgICAkKCdib2R5Jykub24oJ2NsaWNrJywgJy5idG4tYWN0aW9uLWRlbGV0ZScsIGZ1bmN0aW9uICgpe1xyXG4gICAgICAgIGxldCB1cmwgPSAkKHRoaXMpLmRhdGEoJ3VybCcpXHJcbiAgICAgICAgbGV0ICRyZW1vdmVSb3cgPSAkKHRoaXMpLnBhcmVudHMoJ3RyJylcclxuICAgICAgICAkKCcjYWxlcnRfYWN0aW9uX3Jlc3VsdCcpLmhpZGUoKVxyXG4gICAgICAgICQuYWpheCh7XHJcbiAgICAgICAgICAgIHR5cGU6ICdHRVQnLFxyXG4gICAgICAgICAgICB1cmw6IHVybCxcclxuICAgICAgICB9KS5kb25lKGZ1bmN0aW9uKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAkcmVtb3ZlUm93LnJlbW92ZSgpXHJcbiAgICAgICAgICAgICQoJyNhbGVydF9hY3Rpb25fcmVzdWx0Jykuc2hvdygpLmNoaWxkcmVuKCcubWVzc2FnZScpLnRleHQocmVzdWx0Lm1lc3NhZ2UpXHJcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCl7XHJcbiAgICAgICAgICAgICAgICAkKCcjYWxlcnRfYWN0aW9uX3Jlc3VsdCcpLmhpZGUoKVxyXG4gICAgICAgICAgICB9LCAzMDAwKVxyXG4gICAgICAgIH0pLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UpIHtcclxuICAgICAgICAgICAgY29uc29sZS5sb2cocmVzcG9uc2UubWVzc2FnZSlcclxuICAgICAgICB9KVxyXG4gICAgfSlcclxufSlcclxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9tb2R1bGVzL2NhdGVnb3JpZXMvaW5kZXguanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/modules/categories/index.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/modules/categories/index.js"]();
/******/ 	
/******/ })()
;