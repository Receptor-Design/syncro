/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./packages/frontend/src/search.js":
/*!*****************************************!*\
  !*** ./packages/frontend/src/search.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils */ "./packages/frontend/src/utils.js");

const $ = jQuery;
class GutenberghubQueryFilterSearch {
  /**
   * Constructor.
   *
   * @param {HTMLFormElement} blockElement
   * @param {HTMLDivElement} queryLoopBlockElement
   */
  constructor(blockElement, queryLoopBlockElement, queryBlockIndex) {
    this.blockElement = blockElement;
    this.queryLoopBlockElement = queryLoopBlockElement;
    this.queryBlockIndex = queryBlockIndex;
    this.postTemplate = $(this.queryLoopBlockElement).find('.wp-block-post-template');
    this.loadMoreButton = $(this.queryLoopBlockElement).find('.ghub-query-load-more');
    this.resultCount = $(this.queryLoopBlockElement).find('.gutenberghub-query-result-count');
    /**
     * Query Identity.
     *
     * @type {number}
     */
    this.queryId = (0,_utils__WEBPACK_IMPORTED_MODULE_0__.ghqSearchParseQueryId)(queryLoopBlockElement);

    /**
     * @type {HTMLInputElement|null} Search input.
     */
    this.searchInput = this.blockElement.querySelector('input[type="search"]');
    this.initialize();
  }

  /**
   * Initializes the search control.
   *
   * @return {void}
   */
  initialize() {
    /**
     * Removing the default required attribute.
     */
    this.searchInput?.removeAttribute('required');

    /**
     * Adding default value.
     */
    const currentSearchQuery = new URLSearchParams(location.search);
    if (currentSearchQuery.has('qid')) {
      const isCurrentDefaultSearch = currentSearchQuery.get('qid') === this.queryId.toString();
      if (isCurrentDefaultSearch) {
        this.searchInput.value = currentSearchQuery.get('qs');
      }
    }
    this.preventDefaultSubmission();
    this.handleSubmission();
  }

  /**
   * Handles the load more visibility.
   *
   * @param {HTMLElement} newPostWrapper Next page query loop instance
   */
  handleLoadMoreButton(newPostWrapper) {
    if (this.loadMoreButton.get(0) === undefined) {
      return null;
    }
    const newLoadMoreButton = $(newPostWrapper).find('.ghub-query-load-more');
    const newLoadMoreTotalPages = newLoadMoreButton.data('totalpages');
    this.loadMoreButton.attr('data-totalpages', newLoadMoreTotalPages);
    newLoadMoreTotalPages === 1 || newLoadMoreTotalPages === 0 ? this.loadMoreButton.css('display', 'none') : this.loadMoreButton.css('display', 'flex');
  }
  /**
   * Handles the result count.
   *
   * @param {HTMLElement} newPostWrapper Next page query loop instance
   */
  handleResultCount(newPostWrapper) {
    if (this.resultCount.get(0) === undefined) {
      return null;
    }
    const newResultCount = $(newPostWrapper).find('.gutenberghub-query-result-count');
    this.resultCount.replaceWith(newResultCount);
    this.resultCount = newResultCount;
  }

  /**
   * Loads the requested query.
   *
   * @param {{
   *  search: string;
   * }} query
   *
   * @return {void}
   */
  loadQuery(query) {
    const url = new URL(location.href);
    url.searchParams.set('qs', query.search);
    url.searchParams.set('qid', this.queryId.toString());
    const self = this;
    $.ajax({
      url: url.href,
      success: function (response) {
        const responseDocument = $($.parseHTML(response));
        const newPostWrapper = responseDocument.find(`.wp-block-query`)[self.queryBlockIndex];
        const newPosts = $(newPostWrapper).find(`.wp-block-post-template .wp-block-post`);
        self.handleLoadMoreButton(newPostWrapper);
        self.handleResultCount(newPostWrapper);
        self.postTemplate.html(newPosts);
      }
    });
    window.history.pushState({}, '', decodeURIComponent(url));
  }

  /**
   * Removes the search query.
   *
   * @return {void}
   */
  removeQuery(query) {
    const url = new URL(location.href);
    url.searchParams.delete('qs');
    const self = this;
    $.ajax({
      url: url.href,
      success: function (response) {
        const responseDocument = $($.parseHTML(response));
        const newPostWrapper = responseDocument.find(`.wp-block-query`)[self.queryBlockIndex];
        const newPosts = $(newPostWrapper).find(`.wp-block-post-template .wp-block-post`);
        self.handleLoadMoreButton(newPostWrapper);
        self.handleResultCount(newPostWrapper);
        self.postTemplate.html(newPosts);
      }
    });
    window.history.pushState({}, '', decodeURIComponent(url));
  }

  /**
   * Obtains the current search query.
   *
   * @return {string} Searched query.
   */
  getSearchQuery() {
    var _this$searchInput$val;
    return (_this$searchInput$val = this.searchInput?.value) !== null && _this$searchInput$val !== void 0 ? _this$searchInput$val : '';
  }

  /**
   * Handles the form ajax submission.
   */
  handleSubmission() {
    this.blockElement.addEventListener('submit', event => {
      const searchQuery = this.getSearchQuery();
      const hasSearchQuery = searchQuery.trim() !== '';
      hasSearchQuery ? this.loadQuery({
        search: searchQuery
      }) : this.removeQuery();
    });
  }

  /**
   * Prevents the default core search submission.
   */
  preventDefaultSubmission() {
    this.blockElement.addEventListener('submit', event => {
      event.preventDefault();
    });
  }
}
window.addEventListener('load', () => {
  /**
   * @type {NodeListOf<HTMLDivElement>} Loop Blocks.
   */
  const queryLoopBlocks = document.querySelectorAll('.wp-block-query');
  queryLoopBlocks.forEach((queryLoopBlock, queryBlockIndex) => {
    /**
     * @type {NodeListOf<HTMLFormElement>} Search forms.
     */
    const searchBlocks = queryLoopBlock.querySelectorAll('.ghub-query-search');
    if (searchBlocks.length === 0) {
      return;
    }
    searchBlocks.forEach(searchBlock => {
      new GutenberghubQueryFilterSearch(searchBlock, queryLoopBlock, queryBlockIndex);
    });
  });
});

/***/ }),

/***/ "./packages/frontend/src/utils.js":
/*!****************************************!*\
  !*** ./packages/frontend/src/utils.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ghqSearchParseQueryId": () => (/* binding */ ghqSearchParseQueryId)
/* harmony export */ });
/**
 * Parses the gutenberghub query id from the query loop instance.
 *
 * @param {HTMLDivElement|null} queryLoopInstance - Query loop instance.
 * @return {number} - Query id if found, otherwise -1.
 */
function ghqSearchParseQueryId(queryLoopInstance) {
  if (!queryLoopInstance) {
    return -1;
  }
  const classList = Array.from(queryLoopInstance.classList);
  const queryClass = classList.find(className => className.startsWith('ghub-query-id-'));
  if (!queryClass) {
    return -1;
  }
  const classTokens = queryClass.split('-');
  return Number(classTokens[classTokens.length - 1]);
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!****************************************!*\
  !*** ./packages/frontend/src/index.js ***!
  \****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./search */ "./packages/frontend/src/search.js");

})();

/******/ })()
;
//# sourceMappingURL=frontend.js.map