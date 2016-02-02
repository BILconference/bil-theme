/*global jQuery *//*! 
* FitText.js 1.1
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license 
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
*/(function(e){e.fn.fitText=function(t,n){var r=t||1,i=e.extend({minFontSize:Number.NEGATIVE_INFINITY,maxFontSize:Number.POSITIVE_INFINITY},n);return this.each(function(){var t=e(this),n=function(){t.css("font-size",Math.max(Math.min(t.width()/(r*10),parseFloat(i.maxFontSize)),parseFloat(i.minFontSize)))};n(),e(window).on("resize",n)})}})(jQuery);

/*! jQuery slabtext plugin v2.3.1 MIT/GPL2 @freqdec */
(function($){$.fn.slabText=function(options){var settings={fontRatio:0.78,forceNewCharCount:true,wrapAmpersand:true,headerBreakpoint:null,viewportBreakpoint:null,noResizeEvent:false,resizeThrottleTime:300,maxFontSize:999,postTweak:true,precision:3,minCharsPerLine:0};$("body").addClass("slabtexted");return this.each(function(){if(options){$.extend(settings,options)}var $this=$(this),keepSpans=$("span.slabtext",$this).length,words=keepSpans?[]:String($.trim($this.text())).replace(/\s{2,}/g," ").split(" "),origFontSize=null,idealCharPerLine=null,fontRatio=settings.fontRatio,forceNewCharCount=settings.forceNewCharCount,headerBreakpoint=settings.headerBreakpoint,viewportBreakpoint=settings.viewportBreakpoint,postTweak=settings.postTweak,precision=settings.precision,resizeThrottleTime=settings.resizeThrottleTime,minCharsPerLine=settings.minCharsPerLine,resizeThrottle=null,viewportWidth=$(window).width(),headLink=$this.find("a:first").attr("href")||$this.attr("href"),linkTitle=headLink?$this.find("a:first").attr("title"):"";if(!keepSpans&&minCharsPerLine&&words.join(" ").length<minCharsPerLine){return}var grabPixelFontSize=function(){var dummy=jQuery('<div style="display:none;font-size:1em;margin:0;padding:0;height:auto;line-height:1;border:0;">&nbsp;</div>').appendTo($this),emH=dummy.height();dummy.remove();return emH};var resizeSlabs=function resizeSlabs(){var parentWidth=$this.width(),fs;if(parentWidth===0){return}$this.removeClass("slabtextdone slabtextinactive");if(viewportBreakpoint&&viewportBreakpoint>viewportWidth||headerBreakpoint&&headerBreakpoint>parentWidth){$this.addClass("slabtextinactive");return}fs=grabPixelFontSize();if(!keepSpans&&(forceNewCharCount||fs!=origFontSize)){origFontSize=fs;var newCharPerLine=Math.min(60,Math.floor(parentWidth/(origFontSize*fontRatio))),wordIndex=0,lineText=[],counter=0,preText="",postText="",finalText="",slice,preDiff,postDiff;if(newCharPerLine!=0&&newCharPerLine!=idealCharPerLine){idealCharPerLine=newCharPerLine;while(wordIndex<words.length){postText="";while(postText.length<idealCharPerLine){preText=postText;postText+=words[wordIndex]+" ";if(++wordIndex>=words.length){break}}if(minCharsPerLine){slice=words.slice(wordIndex).join(" ");if(slice.length<minCharsPerLine){postText+=slice;preText=postText;wordIndex=words.length+2}}preDiff=idealCharPerLine-preText.length;postDiff=postText.length-idealCharPerLine;if((preDiff<postDiff)&&(preText.length>=(minCharsPerLine||2))){finalText=preText;wordIndex--}else{finalText=postText}finalText=$("<div/>").text(finalText).html();if(settings.wrapAmpersand){finalText=finalText.replace(/&amp;/g,'<span class="amp">&amp;</span>')}finalText=$.trim(finalText);lineText.push('<span class="slabtext">'+finalText+"</span>")}$this.html(lineText.join(" "));if(headLink){$this.wrapInner('<a href="'+headLink+'" '+(linkTitle?'title="'+linkTitle+'" ':"")+"/>")}}}else{origFontSize=fs}$("span.slabtext",$this).each(function(){var $span=$(this),innerText=$span.text(),wordSpacing=innerText.split(" ").length>1,diff,ratio,fontSize;if(postTweak){$span.css({"word-spacing":0,"letter-spacing":0})}ratio=parentWidth/$span.width();fontSize=parseFloat(this.style.fontSize)||origFontSize;$span.css("font-size",Math.min((fontSize*ratio).toFixed(precision),settings.maxFontSize)+"px");diff=!!postTweak?parentWidth-$span.width():false;if(diff){$span.css((wordSpacing?"word":"letter")+"-spacing",(diff/(wordSpacing?innerText.split(" ").length-1:innerText.length)).toFixed(precision)+"px")}});$this.addClass("slabtextdone")};resizeSlabs();if(!settings.noResizeEvent){$(window).resize(function(){if($(window).width()==viewportWidth){return}viewportWidth=$(window).width();clearTimeout(resizeThrottle);resizeThrottle=setTimeout(resizeSlabs,resizeThrottleTime)})}})}})(jQuery);

/* BIG Text */
!function(e,t){"use strict";function i(e,t,i,n,s,r,o){var a;if(o="number"==typeof o?o:0,e.css(i,n+r),a=e.width(),a>=t){if(e.css(i,""),a===t)return{match:"exact",size:parseFloat((parseFloat(n)-.1).toFixed(3))};var c=t-o,l=a-t;return{match:"estimate",size:parseFloat((parseFloat(n)-("word-spacing"===i&&o&&c>l?0:s)).toFixed(3))}}return a}function n(e,n,s,r,o){var a=e.clone(!0).addClass("bigtext-cloned").css({fontFamily:e.css("font-family"),textTransform:e.css("text-transform"),wordSpacing:e.css("word-spacing"),letterSpacing:e.css("letter-spacing"),position:"absolute",left:c.DEBUG_MODE?0:-9999,top:c.DEBUG_MODE?0:-9999}).appendTo(document.body),l=[],u=[],p=[],f=[];return n.css("float","left").each(function(){var e,n,a=t(this),u=c.supports.wholeNumberFontSizeOnly?[8,4,1]:[8,4,1,.1];if(a.hasClass(c.EXEMPT_CLASS))return l.push(null),f.push(null),void p.push(!1);var d=32,g=parseFloat(a.css("font-size")),S=(a.width()/g).toFixed(6);n=parseInt(s/S,10)-d;e:for(var h=0,_=u.length;_>h;h++)t:for(var E=1,x=10;x>=E;E++){if(n+E*u[h]>r){n=r;break e}if(e=i(a,s,"font-size",n+E*u[h],u[h],"px",e),"number"!=typeof e){if(n=e.size,"exact"===e.match)break e;break t}}f.push(s/n),n>r?(l.push(r),p.push(!1)):o&&o>n?(l.push(o),p.push(!0)):(l.push(n),p.push(!1))}).each(function(e){var n,r=t(this),o=0,a=1;if(r.hasClass(c.EXEMPT_CLASS))return void u.push(null);r.css("font-size",l[e]+"px");for(var p=1,f=3;f>p;p+=a)if(n=i(r,s,"word-spacing",p,a,"px",n),"number"!=typeof n){o=n.size;break}r.css("font-size",""),u.push(o)}).removeAttr("style"),c.DEBUG_MODE?a.css({"background-color":"rgba(255,255,255,.4)"}):a.remove(),{fontSizes:l,wordSpacings:u,ratios:f,minFontSizes:p}}var s=0,r=t("head"),o=e.BigText,a=t.fn.bigtext,c={DEBUG_MODE:!1,DEFAULT_MIN_FONT_SIZE_PX:null,DEFAULT_MAX_FONT_SIZE_PX:528,GLOBAL_STYLE_ID:"bigtext-style",STYLE_ID:"bigtext-id",LINE_CLASS_PREFIX:"bigtext-line",EXEMPT_CLASS:"bigtext-exempt",noConflict:function(i){return i&&(t.fn.bigtext=a,e.BigText=o),c},supports:{wholeNumberFontSizeOnly:function(){if(!("getComputedStyle"in e))return!0;var i=t("<div/>").css({position:"absolute","font-size":"14.1px"}).insertBefore(t("script").eq(0)),n=e.getComputedStyle(i[0],null),s=n&&"14px"===n.getPropertyValue("font-size");return i.remove(),s}()},init:function(){t("#"+c.GLOBAL_STYLE_ID).length||r.append(c.generateStyleTag(c.GLOBAL_STYLE_ID,[".bigtext * { white-space: nowrap; } .bigtext > * { display: block; }",".bigtext ."+c.EXEMPT_CLASS+", .bigtext ."+c.EXEMPT_CLASS+" * { white-space: normal; }"]))},bindResize:function(i,n){var s;t(e).unbind(i).bind(i,function(){s&&clearTimeout(s),s=setTimeout(n,100)})},getStyleId:function(e){return c.STYLE_ID+"-"+e},generateStyleTag:function(e,i){return t("<style>"+i.join("\n")+"</style>").attr("id",e)},clearCss:function(e){var i=c.getStyleId(e);t("#"+i).remove()},generateCss:function(e,t,i,n){var s=[];c.clearCss(e);for(var r=0,o=t.length;o>r;r++)s.push("#"+e+" ."+c.LINE_CLASS_PREFIX+r+" {"+(n[r]?" white-space: normal;":"")+(t[r]?" font-size: "+t[r]+"px;":"")+(i[r]?" word-spacing: "+i[r]+"px;":"")+"}");return c.generateStyleTag(c.getStyleId(e),s)},jQueryMethod:function(e){return c.init(),e=t.extend({minfontsize:c.DEFAULT_MIN_FONT_SIZE_PX,maxfontsize:c.DEFAULT_MAX_FONT_SIZE_PX,childSelector:"",resize:!0},e||{}),this.each(function(){var i=t(this).addClass("bigtext"),o=i.width(),a=i.attr("id"),l=e.childSelector?i.find(e.childSelector):i.children();a||(a="bigtext-id"+s++,i.attr("id",a)),e.resize&&c.bindResize("resize.bigtext-event-"+a,function(){c.jQueryMethod.call(t("#"+a),e)}),c.clearCss(a),l.addClass(function(e,t){return[t.replace(new RegExp("\\b"+c.LINE_CLASS_PREFIX+"\\d+\\b"),""),c.LINE_CLASS_PREFIX+e].join(" ")});var u=n(i,l,o,e.maxfontsize,e.minfontsize);r.append(c.generateCss(a,u.fontSizes,u.wordSpacings,u.minFontSizes))}),this.trigger("bigtext:complete")}};t.fn.bigtext=c.jQueryMethod,e.BigText=c}(this,jQuery);

/**
* @preserve Sticky Anything 1.1.3 | @senff | GPL2 Licensed
* https://github.com/senff/Sticky-Anything
*/
(function(e){function t(t,n,r){var i=e(".original").offset();orgElementTop=i.top;var s=window,o="inner";if(!("innerWidth"in window)){o="client";s=document.documentElement||document.body}viewport=s[o+"Width"];if(e(window).scrollTop()>=orgElementTop-t&&viewport>=n&&viewport<=r){orgElement=e(".original");coordsOrgElement=orgElement.offset();leftOrgElement=coordsOrgElement.left;widthOrgElement=orgElement.css("width");e(".cloned").css("left",leftOrgElement+"px").css("top",t+"px").css("width",widthOrgElement).show();e(".original").css("visibility","hidden")}else{e(".cloned").hide();e(".original").css("visibility","visible")}}e.fn.stickThis=function(n){var r=e.extend({top:0,minscreenwidth:0,maxscreenwidth:99999,zindex:1,debugmode:false},n);var i=e(this).length;if(i<1){if(r.debugmode==true){console.error("STICKY ANYTHING DEBUG: There are no elements with the class/ID you selected.")}}else if(i>1){if(r.debugmode==true){console.error("STICKY ANYTHING DEBUG: There is more than one element with the class/ID you selected. You can only make ONE element sticky.")}}else{e(this).addClass("original").clone().insertAfter(this).addClass("cloned").css("position","fixed").css("top",r.top+"px").css("margin-top","0").css("margin-left","0").css("z-index",r.zindex).removeClass("original").hide();checkElement=setInterval(function(){t(r.top,r.minscreenwidth,r.maxscreenwidth)},10)}return this}})(jQuery)


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


// function loadGravatars() {
//   // set the viewport using the function above
//   viewport = updateViewportDimensions();
//   // if the viewport is tablet or larger, we load in the gravatars
//   if (viewport.width >= 768) {
//   jQuery('.comment img[data-gravatar]').each(function(){
//     jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
//   });
// 	}
// }


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	// Allows us to use a class to create DIV TEXT FILLING GOODNESS. 
	$(".bigtext").bigtext();

	$(".single-event-nav-container").stickThis({
	    top:        0,      // top position of sticky element, measured from 'ceiling'
	    minscreenwidth: 960,      // element will not be sticky when viewport width smaller than this
	    maxscreenwidth: 999999,     // element will not be sticky when viewport width larger than this 
	    zindex:     1,      // z-index value of sticky element
	    debugmode:  true   // when true, errors will be logged to console
	});


	// FILTERS
	// ToDo: We will want to make an Ajax call in future to grab all related taxonomy terms to the particular filter.
	// TALKS
	var $btns = $('.btn').click(function() {
	  if (this.id == 'all') {
	    $('#parent > div').fadeIn(450);
	    console.log('all Fade In');
	  } else {
	    var $el = $('.' + this.id).fadeIn(450);
	    $('#parent > div').not($el).hide();
	    console.log('show ' + this.id);
	  }
	  $btns.removeClass('active');
	  $(this).addClass('active');
	});

 	//  var clicked = false;
	// $('.sidebar li a').click(
	// function(){
	// 	//$('#mycontent > div > h2').css('padding-top',0);

	// 	// I want to kill this next line. It adds that padding, but can be done a better way so when you scroll to the top it doesn't look like shit.
	// 	// https://www.dropbox.com/s/6ilpfzro6xej5b4/Screenshot%202015-08-14%2016.41.40.png?dl=0

	// 	$( $( this ).attr('href') ).css('padding-top','50px');
	// 	clicked = true;
	// 	}
	// );	

	$('#menu_affix').affix({
		offset: {
			bottom: function () {
			return (this.bottom = $('#footer').outerHeight(true) + 50)
		}
	}
})

});