
/* 
 * poptip 悬浮提醒，tooltip功能
 * 想的太好难实现，目前先实现v0.1版，基于卓磊的tooltip完善
 * TODO：1.自动检测边界，超出边界若对应方位可完全显示，则自动取对应方位
 *       2.使用JS模板实现内容填充，采用替换数据填充位方式，方便维护及扩展新模板
**/

(function($) {
    $.fn.poptip = function(options){
        var defaults = {
            templete : 1,
            skin: "default",    //默认皮肤
            tiptitle: "",       //可统一设置标题
            place : 7,          //点钟方位，默认7点钟方向
            offsetX : 0,        //偏移修正
            offsetY : 0, 
            trigger : "mouseenter",     // mouseenter or click
            bindevent : "live",         // bind or live live
            hovershow : 300       // 300 or undefined
        }
        //var opt = $.extend(defaults, options);
        var opt = $.extend(true, defaults, options || {});
        //this.each(function(){
        //    //方法体等
        //});
        
        //点钟方位转化
        var reclock = [6,5,10,9,8,1,12,11,4,3,2,7,6];
        function posclock(clock){
            return reclock[clock];
        }
        
        var templeteStr = "";
        switch(opt.templete){
            case 1:
                templeteStr = ' <div class="poptip tip-light poptip-'+opt.skin+'" '
                            + ' style="display: none;" id="poptip'+opt.templete+'">'
                            + '     <div class="tip-arrow tip-arrow-'+posclock(opt.place)+'">'
                            + '         <em>◆</em>'
                            + '         <i>◆</i>'
                            + '     </div>'
                            + '     <div class="tip-content">'
                            + '         <h5 class="tip-title"></h5>'
                            + '         <p></p>'
                            + '     </div>'
                            + ' </div>';
                break;
            default :
                break;
        }
        if($("#poptip"+opt.templete).length==0){
            $("body").append(templeteStr);
        }
        $(this)[opt.bindevent](opt.trigger,function(){
            var title = $(this).attr("tip-title");
            var content = $(this).attr("tip-content");
            var obj = $("#poptip"+opt.templete);
            clearTimeout(obj.data("timeId"));
            if(title){
                obj.find(".tip-title").html(title).show();
            }else{
                if(opt.tiptitle){
                    obj.find(".tip-title").html(opt.tiptitle).show();
                }else{
                    obj.find(".tip-title").html("").hide();
                }
            }
            if(content){
                obj.find(".tip-content>p").html(content);
            }else{
                obj.hide();
                return;
            }
            var left = $(this).offset().left;
            var top = $(this).offset().top;
            var posdiff = 7;
            switch(opt.place){
                case 12:
                case 0:
                    left-=(obj.outerWidth()-$(this).outerWidth())/2;
                    top-=$(obj).outerHeight() + posdiff;
                    break;
                case 1:
                    left-=$(obj).outerWidth()-$(this).outerWidth();
                    top-=$(obj).outerHeight() + posdiff;
                    break;
                case 2:
                    left+=$(this).outerWidth() + posdiff;
                    break;
                case 3:
                    left+=$(this).outerWidth() + posdiff;
                    top-=($(obj).outerHeight()-$(this).outerHeight())/2;
                    break;
                case 4:
                    left+=$(this).outerWidth() + posdiff;
                    top-=$(obj).outerHeight()-$(this).outerHeight();
                    break;
                case 5:
                    left-=$(obj).outerWidth()-$(this).outerWidth();
                    top+=$(this).outerHeight() + posdiff;
                    break;
                case 6:
                    left-=(obj.outerWidth()-$(this).outerWidth())/2;
                    top+=$(this).outerHeight() + posdiff;
                    break;
                case 7:
                default:
                    top+=$(this).outerHeight() + posdiff;
                    break;
                case 8:
                    left-=$(obj).outerWidth() + posdiff;
                    top-=$(obj).outerHeight()-$(this).outerHeight();
                    break;
                case 9:
                    left-=$(obj).outerWidth() + posdiff;
                    top-=($(obj).outerHeight()-$(this).outerHeight())/2;
                    break;
                case 10:
                    left-=$(obj).outerWidth() + posdiff;
                    break;
                case 11:
                    top-=$(obj).outerHeight() + posdiff;
                    break;
            }
            obj.find(".tip-arrow").attr("class","tip-arrow tip-arrow-"+posclock(opt.place)).end().css({
                left : left + opt.offsetX,
                top : top + opt.offsetY
            }).fadeIn(200);
        })[opt.bindevent]("mouseleave",function(){
            obj.timeId = setTimeout(function(){
                $("#poptip"+opt.templete).hide();
            },opt.hovershow);
            $("#poptip"+opt.templete).data("timeId",obj.timeId);
        });
        var obj = this;
        $("#poptip"+opt.templete).mouseenter(function(){
            clearTimeout(obj.timeId);
        }).mouseleave(function(){
            $(this).hide();
        });
        
    };
})(jQuery);

/* 调用方法
$('.test').poptip({
    templete : 1,
    skin: "default",    //默认皮肤
    tiptitle: "",       //可统一设置标题
    place : 7,          //点钟方位，默认7点钟方向
    offsetX : 0,        //偏移修正
    offsetY : 0, 
    trigger : "mouseenter",     // mouseenter or click
    bindevent : "live",         // bind or live live
    hovershow : 300       // 300 or undefined
});
**/
