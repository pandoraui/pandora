//     Zepto.js
//     (c) 2010-2015 Thomas Fuchs
//     Zepto.js may be freely distributed under the MIT license.

;(function($){
  var jsonpID = 0,
      document = window.document,
      key,
      name,
      rscript = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
      scriptTypeRE = /^(?:text|application)\/javascript/i,
      xmlTypeRE = /^(?:text|application)\/xml/i,
      jsonType = 'application/json',  //各种响应的contentType类型
      htmlType = 'text/html',
      blankRE = /^\s*$/,
      originAnchor = document.createElement('a')

  originAnchor.href = window.location.href

  // trigger a custom event and return false if it was cancelled
  // 触发自定义事件
  function triggerAndReturn(context, eventName, data) {
    var event = $.Event(eventName)      //创建Event对象
    $(context).trigger(event, data)     //触发
    return !event.isDefaultPrevented()  //TODO:返回event.isDefaultPrevented？
  }

  // trigger an Ajax "global" event
  // 触发ajax的全局事件
  function triggerGlobal(settings, context, eventName, data) {
    //是否触发ajax的全局事件
    if (settings.global) return triggerAndReturn(context || document, eventName, data)
  }

  // Number of active Ajax requests
  // 统计ajax request数量，用于相关全局事件 ajaxStart ajaxStop 的计数
  $.active = 0

  // 触发全局 'ajaxStart' 事件
  function ajaxStart(settings) {
    //settings.global   传递进来的是否触发全局事件参数
    //$.active++ === 0  $.active = 0，此判断才会true
    if (settings.global && $.active++ === 0) triggerGlobal(settings, null, 'ajaxStart')
  }
  // 尝试抛出所有请求停止事件,写法和ajaxStart相同
  function ajaxStop(settings) {
    if (settings.global && !(--$.active)) triggerGlobal(settings, null, 'ajaxStop')
  }

  // triggers an extra global event "ajaxBeforeSend" that's like "ajaxSend" but cancelable
  // 触发全局ajaxBeforeSend事件，如果返回false,则取消此次请求

  // 请求前置器，beforeSend，返回 false，取消此次请求
  // 或抛出 ajaxBeforeSend 全局事件抛出 ajaxSend 事件
  function ajaxBeforeSend(xhr, settings) {
    var context = settings.context
    if (settings.beforeSend.call(context, xhr, settings) === false ||
        triggerGlobal(settings, context, 'ajaxBeforeSend', [xhr, settings]) === false)
      return false

    triggerGlobal(settings, context, 'ajaxSend', [xhr, settings])
  }
  // 请求成功调用函数
  function ajaxSuccess(data, xhr, settings, deferred) {
    var context = settings.context, status = 'success'
    // 调用success函数
    settings.success.call(context, data, status, xhr)
    // 调用所有成功回调函数
    if (deferred) deferred.resolveWith(context, [data, status, xhr])
    // 抛出全局事件  'ajaxSuccess'
    triggerGlobal(settings, context, 'ajaxSuccess', [xhr, settings, data])
    // 请求完成
    ajaxComplete(status, xhr, settings)
  }
  // type: "timeout", "error", "abort", "parsererror"
  // 请求失败调用函数
  function ajaxError(error, type, xhr, settings, deferred) {
    var context = settings.context
    settings.error.call(context, xhr, type, error)
    if (deferred) deferred.rejectWith(context, [xhr, type, error])
    triggerGlobal(settings, context, 'ajaxError', [xhr, settings, error || type])
    ajaxComplete(type, xhr, settings)
  }
  // status: "success", "notmodified", "error", "timeout", "abort", "parsererror"
  // 请求完成调用函数
  function ajaxComplete(status, xhr, settings) {
    var context = settings.context
    // 执行complete
    settings.complete.call(context, xhr, status)
    triggerGlobal(settings, context, 'ajaxComplete', [xhr, settings])
    // 尝试抛出所有请求停止事件
    ajaxStop(settings)
  }

  // Empty function, used as default callback
  function empty() {}

  // jsonp请求
  $.ajaxJSONP = function(options, deferred){
    //未设置type，就走 ajax 让参数初始化
    if (!('type' in options)) return $.ajax(options)

    var _callbackName = options.jsonpCallback,      // 回调函数名
      callbackName = ($.isFunction(_callbackName) ?
        _callbackName() : _callbackName) || ('jsonp' + (++jsonpID)),  // 没有回调，赋默认回调
      script = document.createElement('script'),
      originalCallback = window[callbackName],  // 回调函数
      responseData,

      // 中断请求，抛出error事件
      // 这里不一定能中断script的加载，但在下面阻止回调函数的执行
      abort = function(errorType) {
        $(script).triggerHandler('error', errorType || 'abort')
      },
      xhr = { abort: abort }, abortTimeout

    // xhr为只读deferred 
    if (deferred) deferred.promise(xhr)

    // 监听加载完，加载出错事件
    $(script).on('load error', function(e, errorType){
      // 清除超时设置timeout
      clearTimeout(abortTimeout)
      // 删除加载用的script。因为已加载完了
      $(script).off().remove()

      if (e.type == 'error' || !responseData) {
        //错误调用error
        ajaxError(null, errorType || 'error', xhr, options, deferred)
      } else {
        //成功调用success
        ajaxSuccess(responseData[0], xhr, options, deferred)
      }

      // 回调函数
      window[callbackName] = originalCallback
      if (responseData && $.isFunction(originalCallback))
        originalCallback(responseData[0])

      // 清空闭包引用的变量值，不清空，需闭包释放，父函数才能释放；清空，父函数可以直接释放
      originalCallback = responseData = undefined
    })

    if (ajaxBeforeSend(xhr, options) === false) {
      abort('abort')
      return xhr
    }

    // 回调函数设置，给后台执行此全局函数，数据塞入
    window[callbackName] = function(){
      responseData = arguments
    }

    // 回调函数追加到请求地址
    script.src = options.url.replace(/\?(.+)=\?/, '?$1=' + callbackName)
    document.head.appendChild(script)

    // 超时处理，通过setTimeout延时处理
    if (options.timeout > 0) abortTimeout = setTimeout(function(){
      abort('timeout')
    }, options.timeout)

    return xhr
  }

  // ajax 必传的默认值
  $.ajaxSettings = {
    // Default type of request
    type: 'GET',
    // Callback that is executed before request
    beforeSend: empty,
    // Callback that is executed if the request succeeds
    success: empty,
    // Callback that is executed the the server drops error
    error: empty,
    // Callback that is executed on request complete (both: error and success)
    complete: empty,
    // The context for the callbacks
    context: null,
    // Whether to trigger "global" Ajax events
    global: true,
    // Transport
    xhr: function () {
      return new window.XMLHttpRequest()
    },
    // MIME types mapping
    // IIS returns Javascript as "application/x-javascript"
    // 媒体数据源，简写对应实际写法
    accepts: {
      script: 'text/javascript, application/javascript, application/x-javascript',
      json:   jsonType,
      xml:    'application/xml, text/xml',
      html:   htmlType,
      text:   'text/plain'
    },
    // Whether the request is to another domain
    crossDomain: false,
    // Default timeout
    timeout: 0,
    // Whether data should be serialized to string
    processData: true,
    // Whether the browser should be allowed to cache GET responses
    cache: true
  }

  // 根据响应回来的媒体类型，转换成易读的类型 html,json,scirpt,xml,text 等
  function mimeToDataType(mime) {
    if (mime) mime = mime.split(';', 2)[0]
    return mime && ( mime == htmlType ? 'html' :
      mime == jsonType ? 'json' :
      scriptTypeRE.test(mime) ? 'script' :
      xmlTypeRE.test(mime) && 'xml' ) || 'text'
  }

  // 将查询参数追加到URL后面
  function appendQuery(url, query) {
    if (query == '') return url

    // replace(/[&?]{1,2}/, '?') 匹配到的第一个[&?]{1,2} 替换成 ?
    return (url + '&' + query).replace(/[&?]{1,2}/, '?')
  }

  // serialize payload and append it to the URL for GET requests
  // 序列化 针对options.data 转换成 a=b&c=1
  function serializeData(options) {
    // options.processData：对于非get请求，是否将请求参数 options.data 转换为字符串
    if (options.processData && options.data && $.type(options.data) != "string")
      // 将data数据序列化为字符串, 转换成 a=b&c=1 
      options.data = $.param(options.data, options.traditional)
    // get请求，将序列化的数据追加到url后面
    if (options.data && (!options.type || options.type.toUpperCase() == 'GET'))
      options.url = appendQuery(options.url, options.data), options.data = undefined
  }

  // ajax 请求
  $.ajax = function(options){
    var settings = $.extend({}, options || {}),   // 创建新的options对象，不影响options的值
        deferred = $.Deferred && $.Deferred(),    // 设置异步队列
        urlAnchor, hashIndex
    // 未传 $.ajaxSettings里的值，复制$.ajaxSettings的值
    for (key in $.ajaxSettings) if (settings[key] === undefined) settings[key] = $.ajaxSettings[key]

    // 触发全局事件 'ajaxStart'
    ajaxStart(settings)

    // 是否设置了跨域，未设置，需通过ip 协议 端口一致来判断跨域
    if (!settings.crossDomain) {
      urlAnchor = document.createElement('a')

      // 如果没有设置请求地址，则取当前页面地址
      urlAnchor.href = settings.url

      // cleans up URL for .href (IE only), see https://github.com/madrobby/zepto/pull/1049
      urlAnchor.href = urlAnchor.href

      // 通过ip 协议 端口来判断跨域  location.host = host:port
      settings.crossDomain = (originAnchor.protocol + '//' + originAnchor.host) !== (urlAnchor.protocol + '//' + urlAnchor.host)
    }

    // 未设置url，取当前地址栏
    if (!settings.url) settings.url = window.location.toString()

    // 如果有hash，截掉hash，因为hash ajax不会传递到后台
    if ((hashIndex = settings.url.indexOf('#')) > -1) settings.url = settings.url.slice(0, hashIndex)
    // 将data进行转换
    serializeData(settings)

    // TODO: /\?.+=\?/.test(settings.url)  有xxx.html?a=1?=cccc类似形式，为jsonp
    var dataType = settings.dataType, hasPlaceholder = /\?.+=\?/.test(settings.url)
    if (hasPlaceholder) dataType = 'jsonp'

    // 不设置缓存，加时间戳 '_=' + Date.now()
    if (settings.cache === false || (
         (!options || options.cache !== true) &&
         ('script' == dataType || 'jsonp' == dataType)
        ))
      settings.url = appendQuery(settings.url, '_=' + Date.now())

    // 如果是jsonp,调用$.ajaxJSONP,不走XHR，走script
    if ('jsonp' == dataType) {
      if (!hasPlaceholder)
        settings.url = appendQuery(settings.url,
          settings.jsonp ? (settings.jsonp + '=?') : settings.jsonp === false ? '' : 'callback=?')
      return $.ajaxJSONP(settings, deferred)
    }

    var mime = settings.accepts[dataType],  // 媒体类型
        headers = { },
        setHeader = function(name, value) { headers[name.toLowerCase()] = [name, value] },

        // 如果URL没协议，读取本地URL的协议
        protocol = /^([\w-]+:)\/\//.test(settings.url) ? RegExp.$1 : window.location.protocol,
        xhr = settings.xhr(),
        nativeSetHeader = xhr.setRequestHeader,
        abortTimeout
    // 将xhr设为只读Deferred对象，不能更改状态
    if (deferred) deferred.promise(xhr)

    //如果没有跨域
    // x-requested-with XMLHttpRequest  //表明是AJax异步
    //x-requested-with  null    //表明同步,浏览器工具栏未显示，在后台request可以获取到
    if (!settings.crossDomain) setHeader('X-Requested-With', 'XMLHttpRequest')
    setHeader('Accept', mime || '*/*') ////默认接受任何类型
    if (mime = settings.mimeType || mime) {
      // 媒体数据源里对应多个，
      // 如 script: 'text/javascript, application/javascript, application/x-javascript',
      // 设置为最新的写法， text/javascript等都是老浏览废弃的写法
      if (mime.indexOf(',') > -1) mime = mime.split(',', 2)[0]

      // 对Mozilla的修正
      // 来自服务器的响应没有 XML mime-type 头部(header)，则一些版本的 Mozilla浏览器不能正常运行。
      // 对于这种情况，xhr.overrideMimeType(mime); 语句将覆盖发送给服务器的头部，
      // 强制mime 作为 mime-type。
      xhr.overrideMimeType && xhr.overrideMimeType(mime)
    }

    //如果不是Get请求，设置Content-Type
    //Content-Type: 内容类型  指定响应的 HTTP内容类型。决定浏览器将以什么形式、什么编码读取这个文件.  如果未指定 ContentType，默认为TEXT/HTML。
    /**
    application/x-www-form-urlencoded：是一种编码格式，窗体数据被编码为名称/值对，是标准的编码格式。
    当action为get时候，浏览器用x-www-form-urlencoded的编码方式把form数据转换成
    一个字串（name1=value1&name2=value2...），然后把这个字串append到url后面，用?分割，加载这个新的url。
    当action为post时候，浏览器把form数据封装到http body中，然后发送到server
    **/
    /**
    如果有 type=file的话，需要设为multipart/form-data了。
    浏览器会把整个表单以控件为单位分割，并为每个部分加上 Content-Disposition(form-data或者file),
    Content-Type(默认为text/plain),name(控件 name)等信息，并加上分割符(boundary)。
    **/
    if (settings.contentType || (settings.contentType !== false && settings.data && settings.type.toUpperCase() != 'GET'))
      setHeader('Content-Type', settings.contentType || 'application/x-www-form-urlencoded')

    // 设置请求头
    if (settings.headers) for (name in settings.headers) setHeader(name, settings.headers[name])
    xhr.setRequestHeader = setHeader

    xhr.onreadystatechange = function(){
      /**
       * 0：请求未初始化（还没有调用 open()）。
         1：请求已经建立，但是还没有发送（还没有调用 send()）。
         2：请求已发送，正在处理中（通常现在可以从响应中获取内容头）。
         3：请求在处理中；通常响应中已有部分数据可用了，但是服务器还没有完成响应的生成。
         4：响应已完成；您可以获取并使用服务器的响应了。
      **/
      if (xhr.readyState == 4) {
        xhr.onreadystatechange = empty
        clearTimeout(abortTimeout)  // 清除超时
        var result, error = false
        // 根据状态来判断请求是否成功
        // >=200 && < 300 表示成功
        // 304 文件未修改 成功
        // xhr.status == 0 && protocol == 'file:' 未请求，打开的本地文件，非localhost ip形式
        if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304 || (xhr.status == 0 && protocol == 'file:')) {
          // 获取媒体类型
          dataType = dataType || mimeToDataType(settings.mimeType || xhr.getResponseHeader('content-type'))
          // 响应值
          result = xhr.responseText

          // 对响应值，根据媒体类型，做数据转换
          try {
            // http://perfectionkills.com/global-eval-what-are-the-options/
            // (1,eval)(result)  (1,eval)这是一个典型的逗号操作符，返回最右边的值
            // (1,eval) eval 的区别是: 前者是一个值，不可以再覆盖。
            //                        后者是变量,如var a = 1; (1,a) = 1; 会报错；
            // (1,eval)(result)  eval(result) 的区别是:
            //      前者变成值后，只能读取window域下的变量。
            //      而后者，遵循作用域链，从局部变量上溯到window域
            // 显然 (1,eval)(result)  避免了作用域链的上溯操作，性能稍好
            if (dataType == 'script')    (1,eval)(result)
            else if (dataType == 'xml')  result = xhr.responseXML
            else if (dataType == 'json') result = blankRE.test(result) ? null : $.parseJSON(result)
          } catch (e) { error = e }

          // 解析出错，抛出 'parsererror' 事件
          if (error) ajaxError(error, 'parsererror', xhr, settings, deferred)
          // 执行success
          else ajaxSuccess(result, xhr, settings, deferred)
        } else {
          // 如果请求出错
          // xhr.status = 0 / null 执行abort, 其他 执行error
          ajaxError(xhr.statusText || null, xhr.status ? 'error' : 'abort', xhr, settings, deferred)
        }
      }
    }

    // 执行请求前置器
    if (ajaxBeforeSend(xhr, settings) === false) {
      xhr.abort()
      ajaxError(null, 'abort', xhr, settings, deferred)
      return xhr
    }

    // xhrFields 设置 如设置跨域凭证 withCredentials
    if (settings.xhrFields) for (name in settings.xhrFields) xhr[name] = settings.xhrFields[name]

    // 'async' in settings  ajaxSetting未设置过async为false，设置过，包括null，都为true
    var async = 'async' in settings ? settings.async : true
    // 准备xhr请求
    xhr.open(settings.type, settings.url, async, settings.username, settings.password)

    // 设置请求头
    for (name in headers) nativeSetHeader.apply(xhr, headers[name])

    // 超时处理：设置了settings.timeout，超时后调用xhr.abort()中断请求
    if (settings.timeout > 0) abortTimeout = setTimeout(function(){
        xhr.onreadystatechange = empty
        xhr.abort()
        ajaxError(null, 'timeout', xhr, settings, deferred)
      }, settings.timeout)

    // avoid sending empty string (#319)
    // 一般来说 post 是 settings.data  get为null 因为get的查询参数和url一起
    xhr.send(settings.data ? settings.data : null)
    return xhr
  }

  // handle optional data/success arguments
  // 参数转换成ajax格式
  function parseArguments(url, data, success, dataType) {
    if ($.isFunction(data)) dataType = success, success = data, data = undefined
    if (!$.isFunction(success)) dataType = success, success = undefined
    return {
      url: url
    , data: data  // 如果data不是function实例
    , success: success
    , dataType: dataType
    }
  }

  // 便捷方法 get 请求
  $.get = function(/* url, data, success, dataType */){
    return $.ajax(parseArguments.apply(null, arguments))
  }

  // 便捷方法 post 请求
  $.post = function(/* url, data, success, dataType */){
    var options = parseArguments.apply(null, arguments)
    options.type = 'POST'
    return $.ajax(options)
  }

  // 便捷方法 响应数据类型为JSON
  // content-type: 'application/json'
  $.getJSON = function(/* url, data, success */){
    var options = parseArguments.apply(null, arguments)
    options.dataType = 'json'
    return $.ajax(options)
  }

  /**
   * 载入远程 HTML 文件代码并插入至 DOM 中
   * @param url HTML 网页网址 可以指定选择符，来筛选载入的 HTML 文档，
                DOM 中将仅插入筛选出的 HTML 代码。语法形如 "url #some > selector"。
   * @param data    发送至服务器的 key/value 数据
   * @param success 载入成功时回调函数
   * @returns {*}
   */
  $.fn.load = function(url, data, success){
    if (!this.length) return this
    var self = this, parts = url.split(/\s/), selector,
        options = parseArguments(url, data, success),
        callback = options.success

    // parts.length > 1 代表url后面有选择符selector
    if (parts.length > 1) options.url = parts[0], selector = parts[1]
    options.success = function(response){
      // response.replace(rscript, "") 过滤出script标签
      // $('<div>').html(response.replace(rscript, ""))  innerHTML方式转换成DOM
      self.html(selector ?
        $('<div>').html(response.replace(rscript, "")).find(selector)
        : response)
      // 执行回调
      callback && callback.apply(self, arguments)
    }
    $.ajax(options)
    return this
  }

  // URI编码方法。原生的escape/unescape已被废弃。使用encodeURIComponent/decodeURIComponent
  var escape = encodeURIComponent

  /**
   * 序列化
   * @param params   结果数组
   * @param obj      数组会按照name/value对进行序列化，普通对象按照key/value对进行序列化
   * @param traditional  是否使用传统的方式浅层序列化
   * @param scope    和traditional=true一起使用。递归时，标记原始key。仅本身递归使用参数
   */
  function serialize(params, obj, traditional, scope){
    var type, array = $.isArray(obj), hash = $.isPlainObject(obj)
    $.each(obj, function(key, value) {
      type = $.type(value)
      if (scope) key = traditional ? scope :
        scope + '[' + (hash || type == 'object' || type == 'array' ? key : '') + ']'
      // handle data in serializeArray() format
      // 如果是递归，scope有原始key值。key值修正

      // 如果是表单
      if (!scope && array) params.add(value.name, value.value)
      // recurse into nested objects
      // value是数组或对象，traditional为false，需要深层序列化，继续递归序列化。
      // 在这里标记scope值
      else if (type == "array" || (!traditional && type == "object"))
        serialize(params, value, traditional, key)
      // 默认 obj属性赋值到params
      else params.add(key, value)
    })
  }

  /**
   * 将表单元素数组或者对象序列化
   * @param obj         数组会按照name/value对进行序列化，普通对象按照key/value对进行序列化
   * @param traditional 是否使用传统的方式浅层序列化
   * @returns {string}
   */
  $.param = function(obj, traditional){
    var params = []

    // URI编码后添加到数组里
    params.add = function(key, value) {
      if ($.isFunction(value)) value = value()
      if (value == null) value = ""

      // encodeURIComponent 编码
      this.push(escape(key) + '=' + escape(value))
    }
    serialize(params, obj, traditional)
    return params.join('&').replace(/%20/g, '+')
  }
})(Zepto)
