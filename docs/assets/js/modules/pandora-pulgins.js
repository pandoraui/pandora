
/* pandora插件库实现方式
 * 分三步形式
**/

/*一般jQuery插件实现

//使用闭包
(function($) {
    // 在插件包中使用$代替jQuery
    // Code goes here
})(jQuery);

解析时如下：
var jq = function($) {
    // Code goes here
};
jq(jQuery);

//jQuery提供了2个供用户扩展的‘基类’ – $.extend和$.fn.extend.
//$.extend 用于扩展自身方法，如$.ajax, $.getJSON等，
//$.fn.extend则是用于扩展jQuery类，包括方法和对jQuery对象的操作。
//为了保持jQuery的完整性，推荐使用$.fn.extend进行插件开发

//效率问题
尽量使用Id选择器
样式选择器应该尽量明确指定tagName
避免迭代，如$('.jquery .child')，
    应用$(selector,context)、
        $('selector1>selector2')或
        $(selctor1).find(selector2)之类方式替代

//类级别(理解为拓展jquery自身)插件开发
//调用类似  $.pulgins("#ID");
            $.pulgins("#ID",{});
$.extend({
    pulgins : function(xobj,options){
        var defaults = {
            pulginsEvent:"parameter", //参数事件
            customName: false
        }
        var thisObj = $(xobj);
        var options = $.extend(defaults, options);
        //方法体
    }
});
$.extend($.fn, {
    pulgins: function(setting) {
        
    }
});


//对象级别(理解为基于对象的拓展)插件开发
//调用类似 $("#ID").pulgins({});
(function ($) {
    $.fn.pulgins = function(options){
        var defaults = {
            pulginsEvent:"parameter", //参数事件
            customName: false
        }
        var options = $.extend(defaults, options);
        this.each(function(){
            //方法体等
        });
    };
})(jQuery);



//调用方法
$(document).ready(function () {
    //$("#ID").pulgins();
  
    //$("#ID").pulgins({
        pulginsEvent:"parameter", //参数事件
        customName: true
    });

});

*/



























//pandora插件
(function (global, $, pandora, undefined) {
    "use strict" // 严格模式

    if (pandora.pulgins) {
        return;
    }
    
    //一般jQuery插件的结构
    //(function($) {
    //    $.fn.pulgins = function(options){
    //        var defaults = {
    //            pulginsEvent:"parameter", //参数事件
    //            customName: true
    //        }
    //
    //        //$.extend 中true参数为深拷贝
    //        var opt = $.extend(true, defaults, options || {});
    //
    //        this.each(function(){
    //            //方法体等
    //        });
    //    };
    //})(jQuery);
    
    
    //一些工具方法类
    
    /* 工厂模式 - 单例如日历 */
    function Factory(options) {
        var options = options || {},
            defaults = Factory.defaults;

        // 合并默认配置
        for (var i in defaults) {

            if (options[i] === undefined) {
                options[i] = defaults[i];
            };

        };

        return new Calendar(options);
    }
    
    /* 工厂模式 - 多例如弹窗 */
    var universe = null,
        count = 0,
        expando = "dialog" + (+new Date);
        
    function Factory(options, ok, cancel) {
        var options = options || {},
            defaults = Factory.defaults,
            list = [];
        
        // 合并默认配置
        for (var i in defaults) {
            if (options[i] === undefined) {
                options[i] = defaults[i];
            };
        };
        
        options.id = expando + count;
        count++;
        
        return Dialog.list[options.id] = universe ? universe._init(options) : new Dialog(options);
    }
    
    
    function Pulgins(options) {
        this._init(options);
    }

    Pulgins.prototype = {
        constructor: Pulgins,

        _init: function (options) {
            var that = this;
            that.options = options;
            that.warp = this.warp || $($.trim(this.options.template.warp));

            if (universe === null) {
                $("body").append(that.wrap);
            }
            
            return that;
        },
        
        
        
        /**
         * 对外提供可扩展 Dialog 对象属性、方法的接口
         * REVIEW
         * @param {Object} 
         */
        extend: function (object) {
            var fn = Dialog.prototype;
            for (var i in object) {
                fn[i] = object[i];
            }

            return this;
        }
    };

    Factory.defaults = {
        theme: "default",   //主题
        template: "template-default",   //模板
        skin: "dialog-default",   //皮肤或类型 theme or skin
        wrapClass: ""   //规格 size
        mask: true,     //遮罩
        drag: false,    //拖动
        fixed: true,    //跟随
        maskClass: "overlay",   //自定义遮罩
        zIndex: 4000    //层级
    };
    
    
    
    // 前端框架 pandora 对象 
    $.fn.calendar = pandora.calendar = Factory;
    
    global.pandora = pandora;
}(this, this.jQuery || {}, this.pandora || {}));


//第二步 定义相关的可变参数及模板
//参考Calendar实现
















//原生js工具类集合

(function (global, $, G, undefined) {
    "use strict" // 严格模式
    
    //要求此中方法全为原生实现
    G = {
        init: function() {
            G.initSite();
        },
        initSite: function() {
            G.site.browser();
        },
        site: {
            browser: function() {
            
            }
        },
        common: {
            browser: function() {
                
            },css3test: function(a) {
                
            }
        }
    }
    
    G.init();
    global.G = G;
}(this, this.jQuery || {}, this.G || {}));




