
/* 
 * tab 选项卡插件
 *
  - tab 选项个数任意
  - 可禁用指定tab选项
  - 可以绑定tab事件触发函数
  - 可以定制tab切换动画显示效果
  - 支持三种回调函数，方便Ajax异步交换数据，
    包括callBackStartEvent,callBackHideEvent,callBackShowEvent
  
  * 本插件是一个类型插件，需要初始化才能够使用，故没有返回值。
**/


$(function($){
    var isShow = false;     //初始化显示变量
    
    //类型结构
    $.fn.tab = function(options){
        
        this.opts = $.extend({}, $.fn.tab.defaults, options);
        
        this._init();   //调用初始化配置方法
        
        this.disableArr=[];     //本地私有属性，存储禁用选项
        
    };
    
    
    //类型原型对象
    $.fn.tab.prototype = {
        
        //初始化配置方法
        _init : function(){
            
            //获取当前对象
            var _this = this;
            
            if($(_this.opts.tabList).length > 0){
                
                //如果存在选项，遍历选项
                $(_this.opts.tabList).each(function(index){
                    
                    //为选项卡注册事件
                    $(this).bind(_this.opts.eventType, function(){
                        
                        //判断是否禁用，是否效果还在执行中，是否在当前选中的选项上
                        if($.inArray(index, _this.disableArr) == -1 && (!isShow) && $(this).attr("class").indexOf(_this.opts.tabActiveClass) == -1){
                            
                            //调用回调函数
                            if(_this.opts.callBackStartEvent){
                                _this.opts.callBackStartEvent(index);
                            }
                            
                            //移出所有激活选项卡
                            $(_this.opts.tabList).removeClass(_this.opts.tabActiveClass);
                            
                            //设置当前选项为激活状态
                            $(this).addClass(_this.opts.tabActiveClass);
                            
                            //调用showContent()私有函数，显示内容
                            showContent(index, _this.opts);
                        }
                    });
                    
                });
            }
            
        },
        
        //公共方法：禁用函数
        setDisable : function(index){
            var _this = this;
            
            //如果当前选项没有被禁用
            if($.inArray(index, this.disableArr) == -1){
                
                //记录当前选项序号
                this.disableArr.push(index);
                
                //禁用选项
                $(_this.opts.tabList).eq(index).addClass(_this.opts.tabDisableClass);
                
            }
        },
        
        //公共方法：解禁函数
        setEnable : function(index){
            var _this = this;
            var i = $.inArray(index, this.disableArr);
            
            //如果禁用，则解禁，并清除记录数组中的序号
            if(i>-1){
                this.disableArr.splice(i, 1);
                $(_this.opts.tabList).eq(index).removeClass(_this.opts.tabDisableClass);
            }
            
        },
        
        //公共方法：出发函数，根据指定序号，可以选中该项
        triggleTab : function(index){
            $(this.opts.tablist).eq(index).trigger.(this.opts.eventType);
        }
    }
    
    //公共属性，设置插件的默认选项，详细说明请参阅上面的参数说明
    $.fn.tab.defaults = {
        tabList: ".tab_list li",
        contentList: ".tab_content",
        tabActiveClass: "active",
        tabDisableClass: "disable",
        enentType: "click",
        showType: "show",
        showSpeed: 200,
        callBackStartEvent: null,
        callBackHideEvent: null,
        callBackShowEvent: null
    };
    
    //内部函数，显示选项内容
    function showContent(index,opts){
        isShow = true;
        var _this = this;
        switch(opts.showType){
            
            //直接显示
            case "show":
                $(opts.contentList+":visible").hide();
                
                //调用单击回调函数
                if(opts.callBackHideEvent){
                    optis.callBackHideEvent(index);
                }
                
                isShow = false;
                break;
                
            case "fade":
                $(opts.contentList+":visible").fadeOut(opts.showSpeed,function(){
                    
                    //调用隐藏回调函数
                    if(opts.callBackHideEvent){
                        opts.callBackHideEvent(index);
                    }
                    
                    //渐显当前选项
                    $(opts.contentList).eq(index).fadeIn(function(){
                        
                        //调用显示回调函数
                        if(opts.callBackShowEvent){
                            opts.callBackShowEvent(index);
                        }
                        
                        isShow = false;
                    });
                    
                });
                break;
                
            //滑动显示
            case "slide":
                $(opts.contentList+":visible").slideUp(opts.showSpeed,function(){
                    
                    //调用隐藏回调函数
                    if(opts.callBackHideEvent){
                        opts.callBackHideEvent(index);
                    }
                    
                    //滑动显示当前选项
                    $(opts.contentList).eq(index).slideDown(function(){
                        
                        //调用显示回调函数
                        if(opts.callBackShowEvent){
                            opts.callBackShowEvent(index);
                        }
                        
                        isShow = false;
                    });
                    
                });
                break;
        }
    }
    
    
})(jQuery);

/*
$(function(){
    //实例化$.fn.tab()类型
    var tab = new $.fn.tab({
        tabList: ".tab_list li",
        contentList: ".tab_content",
        eventType: "mouseover",
        showType: "fade"
    });
    
})



**/
