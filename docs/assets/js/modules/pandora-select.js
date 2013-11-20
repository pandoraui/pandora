/**
 * Created with JetBrains WebStorm.
 * User: chenyanling
 * Date: 13-10-21
 * Time: 下午2:48
 * To change this template use File | Settings | File Templates.
 */

(function (global, $, pandora, undefined) {
    "use strict" // 严格模式

    var count = 1;
    
    if (pandora.selectModel) {
        return;
    }

    function Factory(options) {
        var _options = $.extend({}, Factory.defaults, options);
        _options.selectElement.each(function () {
            if (!$.data(this, 'selectModel')) {
                $.data(this, 'selectModel' , new Select(this, _options));
            }
        })
    }

    function Select(self, options) {
        this.instance;
        this.txtIndex = 0;
        this._init(self, options);
    }

    Select.prototype = {
        _init: function (self, options) {
            this.instance = this._createInstance();
            this.element = self;
            this.options = options;
            this._createElements();
            this._hideSelect();
            this._setEvents();
        },
        /*
         * 产生ID，及是否展开的状态
         */
       _createInstance: function () {
            console.log(count++);
            return {
                selectId: parseInt(+new Date())+ count++,
                state: false
            };
        },

        /*
         * 隐藏原有select
         */
        _hideSelect: function () {
            $(this.element).hide();
        },

        /*
         * 设置点击事件
         */
        _setEvents: function () {

            var self = this;
            $(document).on("click", "html", function (e) {
                e.stopPropagation();
                self._closeSelectBox(true);
            });
        },

        /*
         * 模拟select的html结构
         */
        _createElements: function () {
            var self = this;
            var selectModelEl = $('<div/>', {
                id: 'selectbox_' + self.instance.selectId,
                'class': 'selectbox ' + $(self.element).attr('data-class'),
                data: {'sourceElement': self.element}
            });

            //如果自适应宽度，设置select的宽度为自适应宽度
            if (self.options.autoWidth) {
                selectModelEl.css('width', 'auto');
            }

            var selectValueWrap = $('<p/>', {
                    'class': 'select-info like-input'
                }),
                selectBoxEl = self._createSelectOptionWrap(),
                isSelectBoxEmpty = selectBoxEl == null ? true : false,
                selectValueEl = self._createSelectValueWrap(isSelectBoxEmpty),
                selectModelArrowWrap = $('<span/>', {
                    'class': 'select-arrow'
                }),
                selectModelArrow = $('<i/>', {
                    'class': 'ui-arrow-bottom dark-ui-arrow-bottom'
                });

            selectModelArrowWrap.append(selectModelArrow);
            selectValueWrap.append(selectModelArrowWrap).append(selectValueEl);
            selectModelEl.append(selectValueWrap).append(selectBoxEl);
            $(self.element).before(selectModelEl);

            //如果自适应宽度，设置select的宽度，select的值为第一项的值
            if (self.options.autoWidth) {
                var maxW = selectModelEl.outerWidth() + self.options.selectAddWidth,
                    selectVal = isSelectBoxEmpty ? self.options.emptyMessage : $(self.element).children("option:selected").text();
                selectModelEl.css('width', maxW + 'px');
                selectValueEl.text(selectVal)
            }

            self._setSelectBoxEvents(isSelectBoxEmpty);
        },

        /*
         * 点击select头部的事件
         */
        _setSelectBoxEvents: function (isSelectBoxEmpty) {

            var self = this;
            var selectModelEl = $("div#selectbox_" + this.instance.selectId);

            if (!isSelectBoxEmpty) {
                selectModelEl.find(".select-info").click(function (e) {
                    e.stopPropagation();
                    self._clickSelectOption();
                });
            }
        },

        /*
         * 模拟select的option内容
         */
        _createSelectOptionWrap: function () {

            var self = this;
            var selectBoxEl = $('<div/>', {
                'class': 'selectbox-drop'
            });

            var selectBoxOptionsEl = $('<ul/>', {
                'class': 'select-results'
            });

            var maxWidth = 0;
            $(self.element).children().each(function (index) {
                var liClass = index == 0 ? self.options.activeLi : '';
                var selectModelLiEl = $('<li/>', {
                    rel: $(this).val(),
                    text: $(this).text(),
                    'class': liClass,
                    click: function (e) {
                        e.stopPropagation();
                        self._changeSelectValue(self, this);
                    }
                });
                selectBoxOptionsEl.append(selectModelLiEl);

                //如果自适应宽度，获得option中字符数最多的索引值
                if (self.options.autoWidth) {
                    var txt = $(this).text();
                    var txtLen = txt.length;
                    var txtLength = 0;
                    for (var i = 0; i < txtLen; i++) {
                        var charCode = txt.charCodeAt(i);
                        if (charCode > 0 && charCode < 255) {
                            txtLength += 1;
                        } else {
                            txtLength += 2;
                        }
                    }
                    if (txtLength > maxWidth) {
                        maxWidth = txtLength;
                        self.txtIndex = index;
                    }
                }
            });

            selectBoxEl.append(selectBoxOptionsEl);
            return $(this.element).children().length == 0 ? null : selectBoxEl;
        },

        _createSelectValueWrap: function (isSelectBoxEmpty) {
            var selectValueEl = $('<span/>', {
                'class': 'select-value',
                text: isSelectBoxEmpty ? this.options.emptyMessage : $(this.element).children().eq(this.txtIndex).text()
            });
            return selectValueEl;
        },

        /*
         * 模拟select内容的展开与否
         */
        _clickSelectOption: function (stageReady) {

            if (this.instance.state) {
                this._closeSelectBox();
            } else {
                if (!stageReady) {
                    this._closeOthers();
                } else {
                    this._openSelectBox();
                }
            }
        },

        /*
         * 点击模拟select中的option内容
         */
        _changeSelectValue: function (self, clickedEl) {

            var selectValueEl = $("#selectbox_" + this.instance.selectId).find(".select-value");
            selectValueEl.text($(clickedEl).text());
            selectValueEl.attr("rel", $(clickedEl).attr("rel"));
            this._closeSelectBox(true);

            $(clickedEl).addClass(this.options.activeLi).siblings().removeClass(this.options.activeLi);
            $(this.element).val($(clickedEl).attr('rel'));
            $(this.element).change();
        },

        /*
         * 关闭模拟select
         */
        _closeSelectBox: function (internal) {

            $("#selectbox_" + this.instance.selectId).removeClass('selectbox-active active');
            var selectBoxEl = $("#selectbox_" + this.instance.selectId).find(".selectbox-drop");
            if (selectBoxEl.is(":animated") && !internal) {
                return false;
            }
            this.instance.state = false;

            switch (this.options.effect.type) {

                case "fade":
                    selectBoxEl.fadeOut(this.options.effect.speed);
                    break;
                case "slide":
                    selectBoxEl.slideUp(this.options.effect.speed);
                    break;
                case "standard":
                    selectBoxEl.hide();
                    break;
                default:
                    selectBoxEl.slideUp(this.options.effect.speed);
                    break;
            }
        },

        /*
         * 展开模拟select
         */
        _openSelectBox: function () {

            $("#selectbox_" + this.instance.selectId).addClass('selectbox-active active');
            var selectBoxEl = $("#selectbox_" + this.instance.selectId).find(".selectbox-drop");
            if (selectBoxEl.is(":animated")) {
                return false;
            }
            this.instance.state = true;

            switch (this.options.effect.type) {

                case "fade":
                    selectBoxEl.fadeIn(this.options.effect.speed);
                    break;
                case "slide":
                    selectBoxEl.slideDown(this.options.effect.speed);
                    break;
                case "standard":
                    selectBoxEl.show();
                    break;
                default:
                    selectBoxEl.slideDown(this.options.effect.speed);
                    break;
            }
        },

        /*
         * 关闭其他select
         */
        _closeOthers: function () {

            var self = this;

            $('div[id^=selectbox_]').each(function () {
                var el = $("div#" + $(this).attr("id"));

                if (el.data("sourceElement")) {
                    var sourceEl = $.data(this, "sourceElement");
                    var selectModelInst = $.data(sourceEl, "selectModel");
                    if (self.instance.selectId != selectModelInst.instance.selectId) {
                        if (selectModelInst.instance.state) {
                            selectModelInst._closeSelectBox(true);
                        }
                    }
                }
            });
            self._clickSelectOption(true);
        }
    }

    Factory.defaults = {
        effect: {                          //select展开收起的动画效果
            "type": "standard",
            "speed": "fast"
        },
        emptyMessage: 'Empty',             //select框无数据时，显示文字Empty
        activeLi: 'liActive',
        autoWidth: false,
        selectAddWidth: 20,
        selectElement:$('.selectModel')
    }

    pandora.selectModel = Factory;
    global.pandora = pandora;

}(this, jQuery, this.pandora || {}))
