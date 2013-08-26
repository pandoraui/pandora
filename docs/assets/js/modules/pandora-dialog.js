(function (global, $, undefined) {
    "use strict" // 严格模式

    if (global.pandora && global.pandora.dialog) {
        return;
    }

    var universe = null,
        count = 0,
        expando = "dialog" + (+new Date),
        isIE6 = window.VBArray && !window.XMLHttpRequest,

        isArray = function (obj) {

            // ECMAScript5 isArray 方法 兼容不支持的浏览器
            if (typeof Array.isArray === "undefined") {
                return Object.prototype.toString.call(obj) === "[object Array]";
            }

            return Array.isArray(obj);
        };

    /**
     * 工厂模式 + 单体模式
     * 用于创建 dialog 对象
     */
    function Factory(config, ok, cancel) {
        var config = config || {},
            defaults = Factory.defaults,
            list = [];

        if (typeof config === "string") {
            config = {
                content: config
            }
        }

        // 合并默认配置
        for (var i in defaults) {
            if (config[i] === undefined) {
                config[i] = defaults[i];
            };
        };

        config.id = expando + count;

        // 针对 fixed 属性支持不好，禁用此特性
        if (isIE6) {
            config.fixed = false;
        }

        if (!config.button || !config.button.push) {
            config.button = [];
        };

        // 确定按钮
        if (ok !== undefined) {
            config.ok = ok;
        };

        if (config.ok) {
            config.button.push({
                value: config.okValue,
                callback: config.ok
            });
        };

        // 取消按钮
        if (cancel !== undefined) {
            config.cancel = cancel;
        };

        if (config.cancel) {
            config.button.push({
                value: config.cancelValue,
                callback: config.cancel
            });
        };

        count++;

        return Dialog.list[config.id] = universe ? universe._init(config) : new Dialog(config);
    }

    function Dialog(config) {
        this._init(config);
    }

    Dialog.prototype = {
        constructor: Dialog,

        _init: function (config) {
            var wrap = null,
                that = this;

            that.config = config;

            // wrap 是一个 $(dialog) 对象
            that.wrap = wrap = that.wrap || $($.trim(that._getTemplate(config)));

            if (universe === null) {
                $("body").prepend(that.wrap);
            }

            if (config.wrapClass !== "") {
                wrap.addClass(config.wrapClass);
            }

            if (config.skin !== "") {
                wrap.addClass(config.skin);
            }

            that.button.apply(that, config.button);

            that.title(config.title);
            that.content(config.content);
            that._zIndex();
            that._reset();
            

            if (config.mask === true) {
                that._mask(config);
            }
            
            that.wrap.show();
            that._bindEvent(config);

            if (config.drag === true) {
                that.drag();
            }

            // 模态窗口 弹出子的模态窗口
            universe = null;

            if (typeof config.initialize === "function") {
                config.initialize.call(this);
            }

            return that;
        },

        /**
         * 获取 Dialog 模板
         * REVIEW
         * @param {Object} 获取模板的名称、类型 例如：template-dialog , default
         */
        _getTemplate: function (config) {
            var template = "";

            $.ajax({
                type: "GET",
                async: false,
                url: config.templateUrl,
                dataType: "html",

                success: function (data) {
                    template = $(data).find("#" + config.templateNmae + " > div[data-template=" + config.templateType + "]").html();
                },

                error: function (e) {

                }

            });

            return template;
        },

        /**
         * 遮罩层
         */
        _mask: function (config) {

            this._mask = function () {
                $("[data-mask=overlay]").show();
            }
            
            // 有待完善 HACK
            if ($("[data-mask=overlay]").size() === 0) {
                var div = document.createElement('div');

                $(div).attr("data-mask", "overlay").addClass(config.maskClass)
                    .css("zIndex", config.zIndex - 1);

                if (isIE6) {
                    $(div).css({
                        position: 'absolute',
                        width: $(window).width() + 'px',
                        height: $(document).height() + 'px'
                    });
                }

                $("body").prepend(div);
            }

            this._ismask = true;
        },

        /**
         * 隐藏遮罩层
         * REVIEW
         */
        _unmask: function () {
            var list = Dialog.list,
                count = 0;

            for (var i in list) {
                
                if (list.hasOwnProperty(i)) {
                    
                    if(list[i]._ismask === true){
                        count++;
                    }

                }
            }

            if (this._ismask === true && count === 1) {
                $("[data-mask=overlay]").hide();
            }

            return this;
        },

        /**
         * 拖动窗口
         * 
         */
        _drag: function () {

        },

        /**
         * 重置 dialog 位置 例如窗口发生变化的时候
         */
        _reset: function () {
            var wrap = this.wrap,
                wh = $(window).height(),
                oh = wrap.height();

            if (wh - oh >= 50) {
                wrap.css("position", this.config.fixed ? "fixed" : "absolute");
                this.offsets();
            } else {
                wrap.css("position", "absolute");
            }
            
        },

        /**
         * 置顶对话框
         */
        _zIndex:function(){
            var index = Factory.defaults.zIndex++;
            this.wrap.css("zIndex", index);
        },

        /**
         * 绑定事件 采用事件冒泡
         */
        _bindEvent: function (config) {
            var that = this;

            // 事件监听 (事件冒泡)
            that.wrap.bind("click", function (e) {
                var target = $(e.target),
                    index = 0;

                if (target.attr("data-dismiss") === "dialog") {
                    that.close(this);
                    return false;
                } else {

                    if (target.parent().is("[data-btn=btns]")) { // target[0][expando + "callback"]
                        index = target.index();
                        that._execCallback(index);
                    }
                    
                }
            });
        },

        /**
         * 卸载事件
         * REVIEW
         */
        _unbindEvent: function () {
            this.wrap.unbind("click");
        },

        /**
         * 执行回调函数 
         */
        _execCallback: function (index) {
            var fns = this.config.button,
                fn = fns[index].callback;

            return typeof fn !== "function" || fn.call(this) !== false ? this.close() : this;
        },


        /**
         * 设置标题
         * @param {String}	标题内容
         * TODO
         */
        title: function (title) {
            this.wrap.find("div.dialog-header").html(title);

            return this;
        },

        /**
         * 设置内容
         * TODO
         * @param {String, HTMLElement} 内容 (可选)
         */
        content: function (content) {
            this.wrap.find("div.dialog-content").html(content);

            return this;
        },

        loading: function (content) {
            var html = '<div style="text-align:center">' +
                       '<img width="46" height="46" src="http://pic.lvmama.com/img/new_v/ui_scrollLoading/loadingGIF46px.gif"' +
                       'alt="loading..." ></div>';
            html = content ? content : html;

            this.content(html);

            return this;
        },

        /**
         * 尺寸
         * @param {Number, String} 宽度
         * @param {Number, String} 高度
         */
        size: function (width, height) {

            if (typeof width === "number") {
                width += "px";
            }

            if (typeof height === "number") {
                height += "px";
            }

            this.wrap.css({
                "width": width,
                "height": height
            });

            return this;
        },

        /**
         * 自定义按钮
         * REVIEW
         */
        button: function () {
            var ags = [].slice.call(arguments),
                len = ags.length,
                i = 0,
                j = 0,
                classNameLen = 0,
                className = "",
                button = null,
                buttonAgs = null;

            for (; i < len; i++) {
                buttonAgs = ags[i];
                button = document.createElement("button");

                if (isArray(buttonAgs.className)) {
                    for (classNameLen = buttonAgs.className.length; j < classNameLen; j++) {
                        className += buttonAgs.className[j] + " ";
                    }
                } else {
                    className = buttonAgs.className === undefined ? "" : buttonAgs.className;
                }

                //button[expando + "callback"] = expando; 
                $(button).attr({
                    "class": "btn btn-small " + className + ""
                }).html(buttonAgs.value);

                $(this.wrap).find("[data-btn=btns]").append(button);
            }

            return this;
        },

        /**
         * 设置 dialog 位置
         * TODO 待修改
         * @param {Number} 
         */
        offsets: function (x, y) {
            var wrap = this.wrap,
                ww = $(window).width(),
                wh = $(window).height(),
                ow = wrap.width(),
                oh = wrap.height(),
                left = (ww - ow) / 2,
                top = (wh - oh) * 382 / 1000;

            wrap.css({
                "top": parseInt(top) + "px",
                "left": parseInt(left) + "px"
            });

            return this;
        },

        /**
         * 关闭
         * TODO
         */
        close: function () {
            var wrap = this.wrap,
                config = this.config,
                beforeunload = config.beforeunload;

            if (beforeunload && beforeunload.call(this) === false) {
                return this;
            };

            this._unmask();
            this._unbindEvent();
            delete Dialog.list[config.id];

            if (universe !== null) {
                wrap.remove();
            } else {
                universe = this;

                wrap.hide();
                wrap.css({
                    "top": 0,
                    "left": 0
                });
                wrap.attr("class", "dialog");
                wrap.find("[data-title=title]").html("");
                wrap.find("[data-content=content]").html("");
                wrap.find("[data-btn=btns]").html("");
            }
            
            return this;
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

    // Dialog 对象列表
    Dialog.list = {};
    Dialog.version = "1.0";

    // 浏览器窗口改变后重置对话框位置
    $(window).bind('resize', function () {
        var dialogs = Dialog.list;
        for (var id in dialogs) {
            dialogs[id]._reset();
        };
    });

    Factory.defaults = {
        templateNmae: "template-dialog",
        templateType: "default",
        templateUrl: "/pandora/docs/assets/js/modules/template.html",

        button: null,
        fixed: true,
        mask: true,
        drag: false,

        initialize: null, // 对话框初始化后执行的函数
        beforeunload: null, // 对话框关闭前执行的函数

        ok: null,   // 确定按钮回调函数
        cancel: null, // 取消按钮回调函数
        okValue: "确定", // 确定按钮文本
        cancelValue: "取消", // 取消按钮文本

        content: "",
        title: "消息提醒",

        width: "400px",
        height: "auto",

        skin: "",   // 皮肤
        wrapClass: "", // dialog 规格 通过className 名 控制
        maskClass: "overlay",
        zIndex: 4000
    };

    var pandora = {};

    // 扩展一些常用的静态方法
    $.alert = pandora.alert = function (content, callback) {
        return Factory({
            fixed: true,
            mask: true,
            wrapClass: "dialog-mini",
            content: content,
            ok: true,
            beforeunload: callback
        });
    }

    $.confirm = pandora.confirm = function (content, ok, cancel) {
        return Factory({
            fixed: true,
            lock: true,
            content: content,
            ok: ok ? ok : true,
            cancel: cancel ? cancel : true
        });
    };

    // 调用方式采用 $("").dialog() 和 pandora.dialog() 两种方式
    $.fn.dialog = pandora.dialog = Factory;
    global.pandora = pandora;
}(this, jQuery));