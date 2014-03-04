
/* 
 * 简单的幻灯切换
**/

(function($) {
    $.fn.extend({
        banner_thaw: function(opt) {
            opt = $.extend({
                thumbObj: null,
                botPrev: null,
                botNext: null,
                thumbNowClass: "hover",
                thumbOverEvent: true,
                slideTime: 1000,
                autoChange: true,
                clickFalse: true,
                overStop: true,
                changeTime: 5000,
                delayTime: 300
            },
            opt || {});
            
            var _this = $(this);
            var thumbObj;
            var size = _this.size();
            var nowIndex = 0;
            var current;
            var startRun;
            var delayRun;
            
            function fadeAB() {
                if (nowIndex != current) {
                    if (opt.thumbObj != null) {
                        $(opt.thumbObj).removeClass(opt.thumbNowClass).eq(current).addClass(opt.thumbNowClass)
                    }
                    if (opt.slideTime <= 0) {
                        _this.eq(nowIndex).hide();
                        _this.eq(current).show()
                    } else {
                        _this.eq(nowIndex).fadeOut(opt.slideTime);
                        _this.eq(current).fadeIn(opt.slideTime)
                    }
                    nowIndex = current;
                    if (opt.autoChange == true) {
                        clearInterval(startRun);
                        startRun = setInterval(runNext, opt.changeTime)
                    }
                }
            }
            
            function runNext() {
                current = (nowIndex + 1) % size;
                fadeAB()
            }
            
            _this.hide().eq(0).show();
            
            if (opt.thumbObj != null) {
                thumbObj = $(opt.thumbObj);
                thumbObj.removeClass(opt.thumbNowClass).eq(0).addClass(opt.thumbNowClass);
                
                thumbObj.click(function() {
                    current = thumbObj.index($(this));
                    fadeAB();
                    if (opt.clickFalse == true) {
                        return false
                    }
                });
                
                if (opt.thumbOverEvent == true) {
                    thumbObj.mouseenter(function() {
                        current = thumbObj.index($(this));
                        delayRun = setTimeout(fadeAB, opt.delayTime)
                    });
                    thumbObj.mouseleave(function() {
                        clearTimeout(delayRun)
                    })
                }
            }
            
            if (opt.botNext != null) {
                $(opt.botNext).click(function() {
                    if (_this.queue().length < 1) {
                        runNext()
                    }
                    return false
                })
            }
            
            if (opt.botPrev != null) {
                $(opt.botPrev).click(function() {
                    if (_this.queue().length < 1) {
                        current = (nowIndex + size - 1) % size;
                        fadeAB()
                    }
                    return false
                })
            }
            
            if (opt.autoChange == true) {
                
                startRun = setInterval(runNext, opt.changeTime);
                
                if (opt.overStop == true) {
                    _this.mouseenter(function() {
                        clearInterval(startRun)
                    });
                    _this.mouseleave(function() {
                        startRun = setInterval(runNext, opt.changeTime)
                    })
                }
            }
        }
    })
})(jQuery);







