// (function(window, undefined){
//     // 构造 jQuery 对象
//     var jQuery ＝ (function(){
//         var jQuery = function( selector, context ){
//             return new jQuery.fn.init( selector, context, rootjQuery );
//         }
//         return jQuery;
//     })();

//     window.jQuery = window.$ = jQuery;
// }(window);


// (function( window, undefined ){

//     window.Zepto = Zepto
//     window.$ === undefined && (window.$ = Zepto)
// })(window);


var Dom = {
    addClass: function (className) {
        if (typeof className === 'undefined') {
            return this;
        }
        var classes = className.split(' ');
        for (var i = 0; i < classes.length; i++) {
            for (var j = 0; j < this.length; j++) {
                if (typeof this[j].classList !== 'undefined') this[j].classList.add(classes[i]);
            }
        }
        return this;
    },
    removeClass: function (className) {
        var classes = className.split(' ');
        for (var i = 0; i < classes.length; i++) {
            for (var j = 0; j < this.length; j++) {
                if (typeof this[j].classList !== 'undefined') this[j].classList.remove(classes[i]);
            }
        }
        return this;
    },
    hasClass: function (className) {
        if (!this[0]) return false;
        else return this[0].classList.contains(className);
    },
    toggleClass: function (className) {
        var classes = className.split(' ');
        for (var i = 0; i < classes.length; i++) {
            for (var j = 0; j < this.length; j++) {
                if (typeof this[j].classList !== 'undefined') this[j].classList.toggle(classes[i]);
            }
        }
        return this;
    },
    test: function(){}
}

var box = document.querySelectorAll('.test')
Dom.addClass.call(box,'active')
Dom.removeClass.call(box,'active')
Dom.hasClass.call(box,'active')
Dom.toggleClass.call(box,'active')

