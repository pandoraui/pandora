
# About reset.css

综合自Ocode,html5doctor,aliceui,yahoo,normalize等

/* ------------------------------------------------------------

  - Css Reset v1.0
  - Created: 2011-04-25
  - Last Updated: 2013-03-07
  - Author: cloudYan
  - Contact: qqGroup:187260298

------------------------------------------------------------ */


/* =更新日志

 * 2013-03-04 按normalize结构调整reset样式顺序，并引入表单元素的默认效果设置
 * 2012-10-11 参考normalize.css，精良保持浏览器默认的属性或统一默认属性值而非直接去掉默认的属性（如：ul，ol等）,此方法是一种新的reset解决方案，做项目使用蛮不错。
 * 2012-05-11 html5新增语义化的标签（除figure外）不必重置样式，默认就没有样式的-陈林
 * 2012-04-04 新项目参考了alipay,yahoo,html5Doctor等结合模块化开发进行研究，html5的Doctype声明，不必写type="text/css" 但是必须要有 rel="stylesheet"，html5中单标签不再写结束标记
 * 2011-09-24 解决了IE下超链接使用绝对定位后失效的问题（使用background:url(about:blank)解决是最佳方案）
 * 2011-09-19 原项目Ocode取义Original code，参考http://www.tcreator.info/labs/projects/2011/css-reset.html
 
 * 研究规划
 * 第一步通用reset.css
 * 第二步全站公共样式—common.css
       - 包括全站统一样式定义；如：a,a:hover等
       - 基础的模块组合样式；如：.f14,.mt10,.tc等
 * 第三步css模块—c_common.css
       - 包括模块公共样式提取
       - 公共模块样式
       - 模块个性化样式（类似新模块，但多处使用的）
 * 第四步网站架构css差异化如何书写及管理css
       - 单页面/项目css（个性化css）规划

------------------------------------------------------------ */

/* 升级原则——渐进增强(Progressive Enhancement)

渐进增强(Progressive Enhancement)是为了确保没有页面特效后基本功能也是可用的。简单来讲，渐进增强是指在确保页面在禁用JavaScript后能正常运作后，再对页面添加各种特效（JavaScript动画、Ajax异步等等）。我们同样可以运用"渐进增强"原则来使用CSS3（或者一些CSS2）、HTML5以及其他IE6所不支持的web规范。

某些情况下，是无法让所有用户在任何浏览器下都完全一模一样，特别是那些使用IE6的用户。运用渐进增强策略，可以保证让那些用户至少能使用到你网站（或网络应用）的基本功能。

------------------------------------------------------------ */




## 关于HTML5中之省略标记元素的问题

html5的Doctype声明，不必写type="text/css" 但是必须要有 rel="stylesheet"

**不允许写结束标记的元素有：**

&lt;area&gt; &lt;base&gt; &lt;br&gt; &lt;col&gt; &lt;command&gt; &lt;embed&gt; &lt;hr&gt; &lt;img&gt; &lt;input&gt; &lt;keygen&gt; &lt;link&gt; &lt;meta&gt; &lt;param&gt; &lt;source&gt; &lt;track&gt; &lt;wbr&gt;

**可以省略结束标记的元素有：** 以下仅作知晓，不推荐使用

&lt;li&gt; &lt; dt&gt; &lt;dd&gt; &lt;p&gt; &lt;rt rp&gt; &lt;optgroup&gt; &lt;option&gt; &lt;colgroup&gt; &lt; thead&gt; &lt;tbody&gt; &lt;tfoot&gt; &lt;tr&gt; &lt;td&gt; &lt;th&gt;

**可以省略全部标记的元素有：**

&lt;html&gt; &lt;head&gt; &lt;body&gt; &lt;colgroup&gt; &lt;tbody&gt;


# 代码书写指南

参考摘自 [Code-guide](https://github.com/webcoding/code-guide/tree/master/cn)，有改动。

## 黄金法则

> 任何代码库中的所有代码应该看起来像是一个人书写的，不管有多少人贡献过代码。

这意味着任何时候都要严格执行这些商定的准则。对于增加或减少代码的法则，请参看 [Code-guide](https://github.com/webcoding/code-guide/tree/master/zh-cn).

## CSS 书写规范

详情请参阅 [CSS 书写规范](http://www.tcreator.info/cnBootstrap/cnDocs/standard.php#css)


# 组合样式combo.css


/* ------------------------------------------------------------

  - Css combo v1.0
  - Created: 2011-04-25
  - Last Updated: 2013-03-07
  - Author: cloudYan
  - Contact: qqGroup:187260298

------------------------------------------------------------ */

为方便开发特提供便捷的组合样式，能迅速拼写出想要的样式，秉承样式与结构相分离的原则，此样式不可滥用，否则得不偿失

### 适用范围

在网页中有部分简单的样式需要时间，此时没有方便可用的 id 或 class，则可尝试使用common.css提供的便捷类，如：

````默认12px的文本中某名词需要加粗并大一号字体

&lt;p>这是一段普通文本&lt;/p&gt;
&lt;p>这是另一端普通文本，这里需要 &lt;strong&gt;着重&lt;/strong&gt;，使用&lt;b class="f14"&gt;大一号的字体&lt;/b&gt;&lt;/p&gt;
````
如上：这里没有多余的类可用，又没有必要新建类名，使用快捷组合类是实现需求最简单的解决办法。








