!function(t){var e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)r.d(n,o,function(e){return t[e]}.bind(null,o));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=12)}([function(t,e,r){t.exports=r(2)},function(t,e){function r(t,e,r,n,o,i,a){try{var c=t[i](a),u=c.value}catch(t){return void r(t)}c.done?e(u):Promise.resolve(u).then(n,o)}t.exports=function(t){return function(){var e=this,n=arguments;return new Promise(function(o,i){var a=t.apply(e,n);function c(t){r(a,o,i,c,u,"next",t)}function u(t){r(a,o,i,c,u,"throw",t)}c(void 0)})}}},function(t,e,r){var n=function(){return this||"object"==typeof self&&self}()||Function("return this")(),o=n.regeneratorRuntime&&Object.getOwnPropertyNames(n).indexOf("regeneratorRuntime")>=0,i=o&&n.regeneratorRuntime;if(n.regeneratorRuntime=void 0,t.exports=r(3),o)n.regeneratorRuntime=i;else try{delete n.regeneratorRuntime}catch(t){n.regeneratorRuntime=void 0}},function(t,e){!function(e){"use strict";var r,n=Object.prototype,o=n.hasOwnProperty,i="function"==typeof Symbol?Symbol:{},a=i.iterator||"@@iterator",c=i.asyncIterator||"@@asyncIterator",u=i.toStringTag||"@@toStringTag",s="object"==typeof t,l=e.regeneratorRuntime;if(l)s&&(t.exports=l);else{(l=e.regeneratorRuntime=s?t.exports:{}).wrap=x;var f="suspendedStart",h="suspendedYield",d="executing",p="completed",v={},y={};y[a]=function(){return this};var m=Object.getPrototypeOf,w=m&&m(m(N([])));w&&w!==n&&o.call(w,a)&&(y=w);var g=j.prototype=L.prototype=Object.create(y);E.prototype=g.constructor=j,j.constructor=E,j[u]=E.displayName="GeneratorFunction",l.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===E||"GeneratorFunction"===(e.displayName||e.name))},l.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,j):(t.__proto__=j,u in t||(t[u]="GeneratorFunction")),t.prototype=Object.create(g),t},l.awrap=function(t){return{__await:t}},O(_.prototype),_.prototype[c]=function(){return this},l.AsyncIterator=_,l.async=function(t,e,r,n){var o=new _(x(t,e,r,n));return l.isGeneratorFunction(e)?o:o.next().then(function(t){return t.done?t.value:o.next()})},O(g),g[u]="Generator",g[a]=function(){return this},g.toString=function(){return"[object Generator]"},l.keys=function(t){var e=[];for(var r in t)e.push(r);return e.reverse(),function r(){for(;e.length;){var n=e.pop();if(n in t)return r.value=n,r.done=!1,r}return r.done=!0,r}},l.values=N,P.prototype={constructor:P,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=r,this.done=!1,this.delegate=null,this.method="next",this.arg=r,this.tryEntries.forEach(C),!t)for(var e in this)"t"===e.charAt(0)&&o.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=r)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function n(n,o){return c.type="throw",c.arg=t,e.next=n,o&&(e.method="next",e.arg=r),!!o}for(var i=this.tryEntries.length-1;i>=0;--i){var a=this.tryEntries[i],c=a.completion;if("root"===a.tryLoc)return n("end");if(a.tryLoc<=this.prev){var u=o.call(a,"catchLoc"),s=o.call(a,"finallyLoc");if(u&&s){if(this.prev<a.catchLoc)return n(a.catchLoc,!0);if(this.prev<a.finallyLoc)return n(a.finallyLoc)}else if(u){if(this.prev<a.catchLoc)return n(a.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<a.finallyLoc)return n(a.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var n=this.tryEntries[r];if(n.tryLoc<=this.prev&&o.call(n,"finallyLoc")&&this.prev<n.finallyLoc){var i=n;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=e&&e<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=t,a.arg=e,i?(this.method="next",this.next=i.finallyLoc,v):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),v},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),C(r),v}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;C(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,n){return this.delegate={iterator:N(t),resultName:e,nextLoc:n},"next"===this.method&&(this.arg=r),v}}}function x(t,e,r,n){var o=e&&e.prototype instanceof L?e:L,i=Object.create(o.prototype),a=new P(n||[]);return i._invoke=function(t,e,r){var n=f;return function(o,i){if(n===d)throw new Error("Generator is already running");if(n===p){if("throw"===o)throw i;return T()}for(r.method=o,r.arg=i;;){var a=r.delegate;if(a){var c=k(a,r);if(c){if(c===v)continue;return c}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if(n===f)throw n=p,r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n=d;var u=b(t,e,r);if("normal"===u.type){if(n=r.done?p:h,u.arg===v)continue;return{value:u.arg,done:r.done}}"throw"===u.type&&(n=p,r.method="throw",r.arg=u.arg)}}}(t,r,a),i}function b(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}function L(){}function E(){}function j(){}function O(t){["next","throw","return"].forEach(function(e){t[e]=function(t){return this._invoke(e,t)}})}function _(t){var e;this._invoke=function(r,n){function i(){return new Promise(function(e,i){!function e(r,n,i,a){var c=b(t[r],t,n);if("throw"!==c.type){var u=c.arg,s=u.value;return s&&"object"==typeof s&&o.call(s,"__await")?Promise.resolve(s.__await).then(function(t){e("next",t,i,a)},function(t){e("throw",t,i,a)}):Promise.resolve(s).then(function(t){u.value=t,i(u)},function(t){return e("throw",t,i,a)})}a(c.arg)}(r,n,e,i)})}return e=e?e.then(i,i):i()}}function k(t,e){var n=t.iterator[e.method];if(n===r){if(e.delegate=null,"throw"===e.method){if(t.iterator.return&&(e.method="return",e.arg=r,k(t,e),"throw"===e.method))return v;e.method="throw",e.arg=new TypeError("The iterator does not provide a 'throw' method")}return v}var o=b(n,t.iterator,e.arg);if("throw"===o.type)return e.method="throw",e.arg=o.arg,e.delegate=null,v;var i=o.arg;return i?i.done?(e[t.resultName]=i.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=r),e.delegate=null,v):i:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,v)}function S(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function C(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function P(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(S,this),this.reset(!0)}function N(t){if(t){var e=t[a];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var n=-1,i=function e(){for(;++n<t.length;)if(o.call(t,n))return e.value=t[n],e.done=!1,e;return e.value=r,e.done=!0,e};return i.next=i}}return{next:T}}function T(){return{value:r,done:!0}}}(function(){return this||"object"==typeof self&&self}()||Function("return this")())},function(t,e,r){"use strict";r.d(e,"a",function(){return c});var n=r(0),o=r.n(n),i=r(1),a=r.n(i),c=function(){var t=a()(o.a.mark(function t(){var e,r;return o.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,fetch("./api/categories/categories.php");case 2:if(200!==(e=t.sent).status){t.next=10;break}return t.next=6,e.json();case 6:return r=t.sent,t.abrupt("return",r);case 10:throw new Error("Błąd w pobieraniu danych");case 11:case"end":return t.stop()}},t,this)}));return function(){return t.apply(this,arguments)}}()},function(t,e,r){"use strict";r.d(e,"a",function(){return c});var n=r(0),o=r.n(n),i=r(1),a=r.n(i),c=function(){var t=a()(o.a.mark(function t(){var e,r;return o.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,fetch("./api/words/all.php");case 2:if(200!==(e=t.sent).status){t.next=10;break}return t.next=6,e.json();case 6:return r=t.sent,t.abrupt("return",r);case 10:throw new Error("Błąd w pobieraniu danych");case 11:case"end":return t.stop()}},t,this)}));return function(){return t.apply(this,arguments)}}()},function(t,e){t.exports=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e){function r(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}t.exports=function(t,e,n){return e&&r(t.prototype,e),n&&r(t,n),t}},,,,,function(t,e,r){"use strict";r.r(e);var n,o,i,a=r(0),c=r.n(a),u=r(1),s=r.n(u),l=r(6),f=r.n(l),h=r(7),d=r.n(h),p=r(4),v=r(5),y=document.querySelector("#flash-word"),m=(document.querySelector("#flash-translation"),document.querySelector("#typeWord")),w=document.querySelector("#all-words"),g=document.querySelector("#achieved-points"),x=document.querySelector("#time-left"),b=document.querySelector("#score-table"),L=document.querySelector("#cz-flashcards-test-scores"),E=document.querySelector("#select-cat"),j=0,O=10,_=[],k=[],S=function(){function t(e){f()(this,t),this.seconds=10,this.word=e,this.interval=0,this.finished=!1}return d()(t,[{key:"setTime",value:function(){x.textContent="0:".concat(this.seconds),this.countDownWord()}},{key:"reset",value:function(){this.seconds=10,this.interval=0}},{key:"clear",value:function(){clearInterval(this.interval),this.reset()}},{key:"getWord",value:function(){return this.word.word}},{key:"getTranslation",value:function(){return this.word.translation}},{key:"countDownWord",value:function(){var t=this;this.interval=setInterval(function(){return t.seconds--,x.textContent="0:".concat(t.seconds),t.seconds<10&&(x.textContent="0:0".concat(t.seconds)),t.seconds<4&&(x.style.color="red"),t.seconds>=4&&(x.style.color="inherit"),0===t.seconds&&(O--,w.textContent=O+"/10",clearInterval(t.interval),m.value="",t.clear(),I()),t.seconds},1e3)}}]),t}(),C=function(t,e){return t.find(function(t){var r=Number(t.id_topics);if(e===r)return r})},P=function(t,e){t.forEach(function(t,r){t.topic==e&&k.push(t)})},N=function(t){t.forEach(function(t){var e=document.createElement("option");return e.textContent=t.name,E.appendChild(e),e.value=t.id_topics})},T=function(){return Number(E.value)},q=function(){var t=s()(c.a.mark(function t(){var e;return c.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,Object(p.a)();case 2:e=t.sent,N(e);case 4:case"end":return t.stop()}},t,this)}));return function(){return t.apply(this,arguments)}}(),I=function(){var t=s()(c.a.mark(function t(){var e,r,i,a;return c.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,Object(v.a)();case 2:return e=t.sent,t.next=5,Object(p.a)();case 5:r=t.sent,i=C(r,T()),P(e,i.id_topics),c=k,a=Math.floor(Math.random()*c.length),n=new S(k[a]),w.textContent=O+"/10",g.textContent=j,D(),n.countDownWord(),z(y,"#5e9fca"),0===O&&F(),(o=Object.create(null)).word=n.word.word,o.hit=!1,o.class="missed",_.push(o),R(),G();case 23:case"end":return t.stop()}var c},t,this)}));return function(){return t.apply(this,arguments)}}(),R=function(){(i=document.createElement("tr")).classList.add("cz-flashcard-score");var t=document.createElement("td");t.textContent=n.word.word,i.appendChild(t),b.appendChild(i)},G=function(){var t=document.createElement("td");t.textContent=n.word.translation,t.style.color="#000",i.appendChild(t),b.appendChild(i)};x.addEventListener("click",function(){y.classList.add("active"),I()});var F=function(){n.finished=!0,!0===n.finished&&(n.word.word=null,n.word.translation=null),y.textContent="",clearInterval(n.interval),n.clear(),localStorage.setItem("lastWordTestPoints",j),alert("Koniec testu, sprawdź swoje odpowiedzi :)"),m.disabled=!0,x.style.visibility="hidden",M(y,W.finish),z(y,"#ffa155"),L.classList.remove("inactive")},W={start:"-",finish:"Koniec testu"},M=function(t,e){t.textContent=e},z=function(t,e){t.style.background=e};m.addEventListener("input",function(t){t.target.value===n.word.translation&&(j++,O--,o.hit=!0,o.class="active",i.classList.add(o.class),w.textContent=O+"/10",g.textContent=j,clearInterval(n.interval),m.value="",n.clear(),I())});var D=function(){y.textContent=n.getWord()};M(y,W.start),E.addEventListener("change",T),q()}]);