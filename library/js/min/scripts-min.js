function updateViewportDimensions(){var t=window,e=document,i=e.documentElement,n=e.getElementsByTagName("body")[0],r=t.innerWidth||i.clientWidth||n.clientWidth,a=t.innerHeight||i.clientHeight||n.clientHeight;return{width:r,height:a}}function loadGravatars(){viewport=updateViewportDimensions(),viewport.width>=768&&jQuery(".comment img[data-gravatar]").each(function(){jQuery(this).attr("src",jQuery(this).attr("data-gravatar"))})}!function(t){t.fn.fitText=function(e,i){var n=e||1,r=t.extend({minFontSize:Number.NEGATIVE_INFINITY,maxFontSize:Number.POSITIVE_INFINITY},i);return this.each(function(){var e=t(this),i=function(){e.css("font-size",Math.max(Math.min(e.width()/(10*n),parseFloat(r.maxFontSize)),parseFloat(r.minFontSize)))};i(),t(window).on("resize",i)})}}(jQuery),function($){$.fn.slabText=function(t){var e={fontRatio:.78,forceNewCharCount:!0,wrapAmpersand:!0,headerBreakpoint:null,viewportBreakpoint:null,noResizeEvent:!1,resizeThrottleTime:300,maxFontSize:999,postTweak:!0,precision:3,minCharsPerLine:0};return $("body").addClass("slabtexted"),this.each(function(){t&&$.extend(e,t);var i=$(this),n=$("span.slabtext",i).length,r=n?[]:String($.trim(i.text())).replace(/\s{2,}/g," ").split(" "),a=null,s=null,o=e.fontRatio,l=e.forceNewCharCount,c=e.headerBreakpoint,d=e.viewportBreakpoint,u=e.postTweak,h=e.precision,p=e.resizeThrottleTime,f=e.minCharsPerLine,g=null,m=$(window).width(),x=i.find("a:first").attr("href")||i.attr("href"),v=x?i.find("a:first").attr("title"):"";if(!(!n&&f&&r.join(" ").length<f)){var w=function(){var t=jQuery('<div style="display:none;font-size:1em;margin:0;padding:0;height:auto;line-height:1;border:0;">&nbsp;</div>').appendTo(i),e=t.height();return t.remove(),e},b=function S(){var t=i.width(),p;if(0!==t){if(i.removeClass("slabtextdone slabtextinactive"),d&&d>m||c&&c>t)return void i.addClass("slabtextinactive");if(p=w(),n||!l&&p==a)a=p;else{a=p;var g=Math.min(60,Math.floor(t/(a*o))),b=0,S=[],E=0,T="",_="",y="",z,F,I;if(0!=g&&g!=s){for(s=g;b<r.length;){for(_="";_.length<s&&(T=_,_+=r[b]+" ",!(++b>=r.length)););f&&(z=r.slice(b).join(" "),z.length<f&&(_+=z,T=_,b=r.length+2)),F=s-T.length,I=_.length-s,I>F&&T.length>=(f||2)?(y=T,b--):y=_,y=$("<div/>").text(y).html(),e.wrapAmpersand&&(y=y.replace(/&amp;/g,'<span class="amp">&amp;</span>')),y=$.trim(y),S.push('<span class="slabtext">'+y+"</span>")}i.html(S.join(" ")),x&&i.wrapInner('<a href="'+x+'" '+(v?'title="'+v+'" ':"")+"/>")}}$("span.slabtext",i).each(function(){var i=$(this),n=i.text(),r=n.split(" ").length>1,s,o,l;u&&i.css({"word-spacing":0,"letter-spacing":0}),o=t/i.width(),l=parseFloat(this.style.fontSize)||a,i.css("font-size",Math.min((l*o).toFixed(h),e.maxFontSize)+"px"),s=u?t-i.width():!1,s&&i.css((r?"word":"letter")+"-spacing",(s/(r?n.split(" ").length-1:n.length)).toFixed(h)+"px")}),i.addClass("slabtextdone")}};b(),e.noResizeEvent||$(window).resize(function(){$(window).width()!=m&&(m=$(window).width(),clearTimeout(g),g=setTimeout(b,p))})}})}}(jQuery),!function(t,e){"use strict";function i(t,e,i,n,r,a,s){var o;if(s="number"==typeof s?s:0,t.css(i,n+a),o=t.width(),o>=e){if(t.css(i,""),o===e)return{match:"exact",size:parseFloat((parseFloat(n)-.1).toFixed(3))};var l=e-s,c=o-e;return{match:"estimate",size:parseFloat((parseFloat(n)-("word-spacing"===i&&s&&l>c?0:r)).toFixed(3))}}return o}function n(t,n,r,a,s){var o=t.clone(!0).addClass("bigtext-cloned").css({fontFamily:t.css("font-family"),textTransform:t.css("text-transform"),wordSpacing:t.css("word-spacing"),letterSpacing:t.css("letter-spacing"),position:"absolute",left:l.DEBUG_MODE?0:-9999,top:l.DEBUG_MODE?0:-9999}).appendTo(document.body),c=[],d=[],u=[],h=[];return n.css("float","left").each(function(){var t,n,o=e(this),d=l.supports.wholeNumberFontSizeOnly?[8,4,1]:[8,4,1,.1];if(o.hasClass(l.EXEMPT_CLASS))return c.push(null),h.push(null),void u.push(!1);var p=32,f=parseFloat(o.css("font-size")),g=(o.width()/f).toFixed(6);n=parseInt(r/g,10)-p;t:for(var m=0,x=d.length;x>m;m++)e:for(var v=1,w=10;w>=v;v++){if(n+v*d[m]>a){n=a;break t}if(t=i(o,r,"font-size",n+v*d[m],d[m],"px",t),"number"!=typeof t){if(n=t.size,"exact"===t.match)break t;break e}}h.push(r/n),n>a?(c.push(a),u.push(!1)):s&&s>n?(c.push(s),u.push(!0)):(c.push(n),u.push(!1))}).each(function(t){var n,a=e(this),s=0,o=1;if(a.hasClass(l.EXEMPT_CLASS))return void d.push(null);a.css("font-size",c[t]+"px");for(var u=1,h=3;h>u;u+=o)if(n=i(a,r,"word-spacing",u,o,"px",n),"number"!=typeof n){s=n.size;break}a.css("font-size",""),d.push(s)}).removeAttr("style"),l.DEBUG_MODE?o.css({"background-color":"rgba(255,255,255,.4)"}):o.remove(),{fontSizes:c,wordSpacings:d,ratios:h,minFontSizes:u}}var r=0,a=e("head"),s=t.BigText,o=e.fn.bigtext,l={DEBUG_MODE:!1,DEFAULT_MIN_FONT_SIZE_PX:null,DEFAULT_MAX_FONT_SIZE_PX:528,GLOBAL_STYLE_ID:"bigtext-style",STYLE_ID:"bigtext-id",LINE_CLASS_PREFIX:"bigtext-line",EXEMPT_CLASS:"bigtext-exempt",noConflict:function(i){return i&&(e.fn.bigtext=o,t.BigText=s),l},supports:{wholeNumberFontSizeOnly:function(){if(!("getComputedStyle"in t))return!0;var i=e("<div/>").css({position:"absolute","font-size":"14.1px"}).insertBefore(e("script").eq(0)),n=t.getComputedStyle(i[0],null),r=n&&"14px"===n.getPropertyValue("font-size");return i.remove(),r}()},init:function(){e("#"+l.GLOBAL_STYLE_ID).length||a.append(l.generateStyleTag(l.GLOBAL_STYLE_ID,[".bigtext * { white-space: nowrap; } .bigtext > * { display: block; }",".bigtext ."+l.EXEMPT_CLASS+", .bigtext ."+l.EXEMPT_CLASS+" * { white-space: normal; }"]))},bindResize:function(i,n){var r;e(t).unbind(i).bind(i,function(){r&&clearTimeout(r),r=setTimeout(n,100)})},getStyleId:function(t){return l.STYLE_ID+"-"+t},generateStyleTag:function(t,i){return e("<style>"+i.join("\n")+"</style>").attr("id",t)},clearCss:function(t){var i=l.getStyleId(t);e("#"+i).remove()},generateCss:function(t,e,i,n){var r=[];l.clearCss(t);for(var a=0,s=e.length;s>a;a++)r.push("#"+t+" ."+l.LINE_CLASS_PREFIX+a+" {"+(n[a]?" white-space: normal;":"")+(e[a]?" font-size: "+e[a]+"px;":"")+(i[a]?" word-spacing: "+i[a]+"px;":"")+"}");return l.generateStyleTag(l.getStyleId(t),r)},jQueryMethod:function(t){return l.init(),t=e.extend({minfontsize:l.DEFAULT_MIN_FONT_SIZE_PX,maxfontsize:l.DEFAULT_MAX_FONT_SIZE_PX,childSelector:"",resize:!0},t||{}),this.each(function(){var i=e(this).addClass("bigtext"),s=i.width(),o=i.attr("id"),c=t.childSelector?i.find(t.childSelector):i.children();o||(o="bigtext-id"+r++,i.attr("id",o)),t.resize&&l.bindResize("resize.bigtext-event-"+o,function(){l.jQueryMethod.call(e("#"+o),t)}),l.clearCss(o),c.addClass(function(t,e){return[e.replace(new RegExp("\\b"+l.LINE_CLASS_PREFIX+"\\d+\\b"),""),l.LINE_CLASS_PREFIX+t].join(" ")});var d=n(i,c,s,t.maxfontsize,t.minfontsize);a.append(l.generateCss(o,d.fontSizes,d.wordSpacings,d.minFontSizes))}),this.trigger("bigtext:complete")}};e.fn.bigtext=l.jQueryMethod,t.BigText=l}(this,jQuery);var viewport=updateViewportDimensions(),waitForFinalEvent=function(){var t={};return function(e,i,n){n||(n="Don't call this twice without a uniqueId"),t[n]&&clearTimeout(t[n]),t[n]=setTimeout(e,i)}}(),timeToWaitForLast=100;jQuery(document).ready(function($){$(".bigtext").bigtext();var t=$(".btn").click(function(){if("all"==this.id)$("#parent > div").fadeIn(450),console.log("all Fade In");else{var e=$("."+this.id).fadeIn(450);$("#parent > div").not(e).hide(),console.log("show "+this.id)}t.removeClass("active"),$(this).addClass("active")});$("body").scrollspy({target:".sidebar",offset:80})});