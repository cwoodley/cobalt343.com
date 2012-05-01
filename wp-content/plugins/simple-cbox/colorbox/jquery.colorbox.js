(function($){var colorbox='colorbox',hover='hover',TRUE=true,FALSE=false,cboxPublic,isIE=!$.support.opacity,isIE6=isIE&&!window.XMLHttpRequest,cbox_open='cbox_open',cbox_load='cbox_load',cbox_complete='cbox_complete',cbox_cleanup='cbox_cleanup',cbox_closed='cbox_closed',cbox_resize='resize.cbox_resize',$overlay,$cbox,$wrap,$content,$topBorder,$leftBorder,$rightBorder,$bottomBorder,$related,$window,$loaded,$loadingBay,$loadingOverlay,$loadingGraphic,$title,$current,$slideshow,$next,$prev,$close,interfaceHeight,interfaceWidth,loadedHeight,loadedWidth,element,bookmark,index,settings,open,active,defaults={transition:"elastic",speed:350,width:FALSE,height:FALSE,innerWidth:FALSE,innerHeight:FALSE,initialWidth:"400",initialHeight:"400",maxWidth:FALSE,maxHeight:FALSE,scalePhotos:TRUE,scrolling:TRUE,inline:FALSE,html:FALSE,iframe:FALSE,photo:FALSE,href:FALSE,title:FALSE,rel:FALSE,opacity:0.9,preloading:TRUE,current:"image {current} of {total}",previous:"previous",next:"next",close:"close",open:FALSE,overlayClose:TRUE,slideshow:FALSE,slideshowAuto:TRUE,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",onOpen:FALSE,onLoad:FALSE,onComplete:FALSE,onCleanup:FALSE,onClosed:FALSE};function setSize(size,dimension){dimension=dimension==='x'?$window.width():$window.height();return(typeof size==='string')?Math.round((size.match(/%/)?(dimension/100)*parseInt(size,10):parseInt(size,10))):size}function isImage(url){url=$.isFunction(url)?url.call(element):url;return settings.photo||url.match(/\.(gif|png|jpg|jpeg|bmp)(?:\?([^#]*))?(?:#(\.*))?$/i)}function process(){for(var i in settings){if($.isFunction(settings[i])&&i.substring(0,2)!=='on'){settings[i]=settings[i].call(element)}}settings.rel=settings.rel||element.rel;settings.href=settings.href||element.href;settings.title=settings.title||element.title}function launch(elem){element=elem;settings=$(element).data(colorbox);process();if(settings.rel&&settings.rel!=='nofollow'){$related=$('.cboxElement').filter(function(){var relRelated=$(this).data(colorbox).rel||this.rel;return(relRelated===settings.rel)});index=$related.index(element);if(index<0){$related=$related.add(element);index=$related.length-1}}else{$related=$(element);index=0}if(!open){open=TRUE;active=TRUE;bookmark=element;bookmark.blur();$(document).bind("keydown.cbox_close",function(e){if(e.keyCode===27){e.preventDefault();cboxPublic.close()}}).bind("keydown.cbox_arrows",function(e){if($related.length>1){if(e.keyCode===37){e.preventDefault();$prev.click()}else if(e.keyCode===39){e.preventDefault();$next.click()}}});if(settings.overlayClose){$overlay.css({"cursor":"pointer"}).one('click',cboxPublic.close)}$.event.trigger(cbox_open);if(settings.onOpen){settings.onOpen.call(element)}$overlay.css({"opacity":settings.opacity}).show();settings.w=setSize(settings.initialWidth,'x');settings.h=setSize(settings.initialHeight,'y');cboxPublic.position(0);if(isIE6){$window.bind('resize.cboxie6 scroll.cboxie6',function(){$overlay.css({width:$window.width(),height:$window.height(),top:$window.scrollTop(),left:$window.scrollLeft()})}).trigger("scroll.cboxie6")}}$current.add($prev).add($next).add($slideshow).add($title).hide();$close.html(settings.close).show();cboxPublic.slideshow();cboxPublic.load()}cboxPublic=$.fn.colorbox=function(options,callback){var $this=this;if(!$this.length){if($this.selector===''){$this=$('<a/>');options.open=TRUE}else{return this}}$this.each(function(){var data=$.extend({},$(this).data(colorbox)?$(this).data(colorbox):defaults,options);$(this).data(colorbox,data).addClass("cboxElement");if(callback){$(this).data(colorbox).onComplete=callback}});if(options&&options.open){launch($this)}return this};cboxPublic.init=function(){function $div(id){return $('<div id="cbox'+id+'"/>')}$window=$(window);$cbox=$('<div id="colorbox"/>');$overlay=$div("Overlay").hide();$wrap=$div("Wrapper");$content=$div("Content").append($loaded=$div("LoadedContent").css({width:0,height:0}),$loadingOverlay=$div("LoadingOverlay"),$loadingGraphic=$div("LoadingGraphic"),$title=$div("Title"),$current=$div("Current"),$slideshow=$div("Slideshow"),$next=$div("Next"),$prev=$div("Previous"),$close=$div("Close"));$wrap.append($('<div/>').append($div("TopLeft"),$topBorder=$div("TopCenter"),$div("TopRight")),$('<div/>').append($leftBorder=$div("MiddleLeft"),$content,$rightBorder=$div("MiddleRight")),$('<div/>').append($div("BottomLeft"),$bottomBorder=$div("BottomCenter"),$div("BottomRight"))).children().children().css({'float':'left'});$loadingBay=$("<div style='position:absolute; top:0; left:0; width:9999px; height:0;'/>");$('body').prepend($overlay,$cbox.append($wrap,$loadingBay));if(isIE){$cbox.addClass('cboxIE');if(isIE6){$overlay.css('position','absolute')}}$content.children().bind('mouseover mouseout',function(){$(this).toggleClass(hover)}).addClass(hover);interfaceHeight=$topBorder.height()+$bottomBorder.height()+$content.outerHeight(TRUE)-$content.height();interfaceWidth=$leftBorder.width()+$rightBorder.width()+$content.outerWidth(TRUE)-$content.width();loadedHeight=$loaded.outerHeight(TRUE);loadedWidth=$loaded.outerWidth(TRUE);$cbox.css({"padding-bottom":interfaceHeight,"padding-right":interfaceWidth}).hide();$next.click(cboxPublic.next);$prev.click(cboxPublic.prev);$close.click(cboxPublic.close);$content.children().removeClass(hover);$('.cboxElement').live('click',function(e){if(e.button!==0&&typeof e.button!=='undefined'){return TRUE}else{launch(this);return FALSE}})};cboxPublic.position=function(speed,loadedCallback){var animate_speed,winHeight=$window.height(),posTop=Math.max(winHeight-settings.h-loadedHeight-interfaceHeight,0)/2+$window.scrollTop(),posLeft=Math.max(document.documentElement.clientWidth-settings.w-loadedWidth-interfaceWidth,0)/2+$window.scrollLeft();animate_speed=($cbox.width()===settings.w+loadedWidth&&$cbox.height()===settings.h+loadedHeight)?0:speed;$wrap[0].style.width=$wrap[0].style.height="9999px";function modalDimensions(that){$topBorder[0].style.width=$bottomBorder[0].style.width=$content[0].style.width=that.style.width;$loadingGraphic[0].style.height=$loadingOverlay[0].style.height=$content[0].style.height=$leftBorder[0].style.height=$rightBorder[0].style.height=that.style.height}$cbox.dequeue().animate({width:settings.w+loadedWidth,height:settings.h+loadedHeight,top:posTop,left:posLeft},{duration:animate_speed,complete:function(){modalDimensions(this);active=FALSE;$wrap[0].style.width=(settings.w+loadedWidth+interfaceWidth)+"px";$wrap[0].style.height=(settings.h+loadedHeight+interfaceHeight)+"px";if(loadedCallback){loadedCallback()}},step:function(){modalDimensions(this)}})};cboxPublic.resize=function(object){if(!open){return}var topMargin,prev,prevSrc,next,nextSrc,photo,timeout,speed=settings.transition==="none"?0:settings.speed;$window.unbind(cbox_resize);if(!object){timeout=setTimeout(function(){var $child=$loaded.wrapInner("<div style='overflow:auto'></div>").children();settings.h=$child.height();$loaded.css({height:settings.h});$child.replaceWith($child.children());cboxPublic.position(speed)},1);return}$loaded.remove();$loaded=$('<div id="cboxLoadedContent"/>').html(object);function getWidth(){settings.w=settings.w||$loaded.width();settings.w=settings.mw&&settings.mw<settings.w?settings.mw:settings.w;return settings.w}function getHeight(){settings.h=settings.h||$loaded.height();settings.h=settings.mh&&settings.mh<settings.h?settings.mh:settings.h;return settings.h}$loaded.hide().appendTo($loadingBay).css({width:getWidth(),overflow:settings.scrolling?'auto':'hidden'}).css({height:getHeight()}).prependTo($content);$('#cboxPhoto').css({cssFloat:'none'});if(isIE6){$('select:not(#colorbox select)').filter(function(){return this.style.visibility!=='hidden'}).css({'visibility':'hidden'}).one(cbox_cleanup,function(){this.style.visibility='inherit'})}function setPosition(s){cboxPublic.position(s,function(){if(!open){return}if(isIE){if(photo){$loaded.fadeIn(100)}$cbox[0].style.removeAttribute("filter")}if(settings.iframe){$loaded.append("<iframe id='cboxIframe'"+(settings.scrolling?" ":"scrolling='no'")+" name='iframe_"+new Date().getTime()+"' frameborder=0 src='"+settings.href+"' "+(isIE?"allowtransparency='true'":'')+" />")}$loaded.show();$title.show().html(settings.title);if($related.length>1){$current.html(settings.current.replace(/\{current\}/,index+1).replace(/\{total\}/,$related.length)).show();$next.html(settings.next).show();$prev.html(settings.previous).show();if(settings.slideshow){$slideshow.show()}}$loadingOverlay.hide();$loadingGraphic.hide();$.event.trigger(cbox_complete);if(settings.onComplete){settings.onComplete.call(element)}if(settings.transition==='fade'){$cbox.fadeTo(speed,1,function(){if(isIE){$cbox[0].style.removeAttribute("filter")}})}$window.bind(cbox_resize,function(){cboxPublic.position(0)})})}if((settings.transition==='fade'&&$cbox.fadeTo(speed,0,function(){setPosition(0)}))||setPosition(speed)){}if(settings.preloading&&$related.length>1){prev=index>0?$related[index-1]:$related[$related.length-1];next=index<$related.length-1?$related[index+1]:$related[0];nextSrc=$(next).data(colorbox).href||next.href;prevSrc=$(prev).data(colorbox).href||prev.href;if(isImage(nextSrc)){$('<img />').attr('src',nextSrc)}if(isImage(prevSrc)){$('<img />').attr('src',prevSrc)}}};cboxPublic.load=function(){var href,img,setResize,resize=cboxPublic.resize;active=TRUE;element=$related[index];settings=$(element).data(colorbox);process();$.event.trigger(cbox_load);if(settings.onLoad){settings.onLoad.call(element)}settings.h=settings.height?setSize(settings.height,'y')-loadedHeight-interfaceHeight:settings.innerHeight?setSize(settings.innerHeight,'y'):FALSE;settings.w=settings.width?setSize(settings.width,'x')-loadedWidth-interfaceWidth:settings.innerWidth?setSize(settings.innerWidth,'x'):FALSE;settings.mw=settings.w;settings.mh=settings.h;if(settings.maxWidth){settings.mw=setSize(settings.maxWidth,'x')-loadedWidth-interfaceWidth;settings.mw=settings.w&&settings.w<settings.mw?settings.w:settings.mw}if(settings.maxHeight){settings.mh=setSize(settings.maxHeight,'y')-loadedHeight-interfaceHeight;settings.mh=settings.h&&settings.h<settings.mh?settings.h:settings.mh}href=settings.href;$loadingOverlay.show();$loadingGraphic.show();if(settings.inline){$('<div id="cboxInlineTemp" />').hide().insertBefore($(href)[0]).bind(cbox_load+' '+cbox_cleanup,function(){$(this).replaceWith($loaded.children())});resize($(href))}else if(settings.iframe){resize(" ")}else if(settings.html){resize(settings.html)}else if(isImage(href)){img=new Image();img.onload=function(){var percent;img.onload=null;img.id='cboxPhoto';$(img).css({margin:'auto',border:'none',display:'block',cssFloat:'left'});if(settings.scalePhotos){setResize=function(){img.height-=img.height*percent;img.width-=img.width*percent};if(settings.mw&&img.width>settings.mw){percent=(img.width-settings.mw)/img.width;setResize()}if(settings.mh&&img.height>settings.mh){percent=(img.height-settings.mh)/img.height;setResize()}}if(settings.h){img.style.marginTop=Math.max(settings.h-img.height,0)/2+'px'}resize(img);if($related.length>1){$(img).css({cursor:'pointer'}).click(cboxPublic.next)}if(isIE){img.style.msInterpolationMode='bicubic'}};img.src=href}else{$('<div />').appendTo($loadingBay).load(href,function(data,textStatus){if(textStatus==="success"){resize(this)}else{resize($("<p>Request unsuccessful.</p>"))}})}};cboxPublic.next=function(){if(!active){index=index<$related.length-1?index+1:0;cboxPublic.load()}};cboxPublic.prev=function(){if(!active){index=index>0?index-1:$related.length-1;cboxPublic.load()}};cboxPublic.slideshow=function(){var stop,timeOut,className='cboxSlideshow_';$slideshow.bind(cbox_closed,function(){$slideshow.unbind();clearTimeout(timeOut);$cbox.removeClass(className+"off"+" "+className+"on")});function start(){$slideshow.text(settings.slideshowStop).bind(cbox_complete,function(){timeOut=setTimeout(cboxPublic.next,settings.slideshowSpeed)}).bind(cbox_load,function(){clearTimeout(timeOut)}).one("click",function(){stop();$(this).removeClass(hover)});$cbox.removeClass(className+"off").addClass(className+"on")}stop=function(){clearTimeout(timeOut);$slideshow.text(settings.slideshowStart).unbind(cbox_complete+' '+cbox_load).one("click",function(){start();timeOut=setTimeout(cboxPublic.next,settings.slideshowSpeed);$(this).removeClass(hover)});$cbox.removeClass(className+"on").addClass(className+"off")};if(settings.slideshow&&$related.length>1){if(settings.slideshowAuto){start()}else{stop()}}};cboxPublic.close=function(){$.event.trigger(cbox_cleanup);if(settings.onCleanup){settings.onCleanup.call(element)}open=FALSE;$(document).unbind("keydown.cbox_close keydown.cbox_arrows");$window.unbind(cbox_resize+' resize.cboxie6 scroll.cboxie6');$overlay.css({cursor:'auto'}).fadeOut('fast');$cbox.stop(TRUE,FALSE).fadeOut('fast',function(){$('#colorbox iframe').attr('src','about:blank');$loaded.remove();$cbox.css({'opacity':1});try{bookmark.focus()}catch(er){}$.event.trigger(cbox_closed);if(settings.onClosed){settings.onClosed.call(element)}})};cboxPublic.element=function(){return $(element)};cboxPublic.settings=defaults;$(cboxPublic.init)}(jQuery));