!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=3)}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.blocks},function(e,t,r){"use strict";r.r(t);var n=r(0),o=r(2),c=r(1),i=[["core/heading",{placeholder:"Insira o conteúdo do título",className:"is-style-title-iphan-underscore"}],["core/paragraph",{placeholder:"Insira o conteúdo"}],["core/buttons",{}]];Object(o.registerBlockType)("iphan/card-block-iphan",{title:"Cartão do IPHAN",icon:"text",category:"text",attributes:{title:{type:"string",source:"html",selector:"h1"},content:{type:"string",source:"html",selector:"p"}},edit:function(e){e.attributes.title,e.attributes.content;var t=Object(c.useBlockProps)({className:"style-card-iphan"});return Object(n.createElement)("div",t,Object(n.createElement)(c.InnerBlocks,{template:i}))},save:function(e){var t=c.useBlockProps.save({className:"style-card-iphan"});return Object(n.createElement)("div",t,Object(n.createElement)(c.InnerBlocks.Content,null))}})}]);