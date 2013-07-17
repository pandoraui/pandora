<?php $page = "rule" ?>
<?php $title="代码规范"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
	<div class="sidebar">
		<ul class="nav none">
			<li><a href="#overview">概述</a></li>
			<li><a href="#document">文档结构</a></li>
			<li><a href="#naming">命名规范</a></li>
			<li><a href="#html">HTML书写规范</a></li>
			<li><a href="#css">CSS编码规范</a></li>
			<li><a href="#javascript">JavaScript 编码风格</a></li>
			<li><a href="#json">JSON格式规范</a></li>
			<li><a href="#readme">说明文档书写规范</a></li>
			<li><a href="#edm">EDM制作规范</a></li>
		</ul>
	</div> <!-- // div.sidebar -->
	<div class="main">
        <section id="overview">
            <h1>规范说明 <small></small></h1>
            <blockquote>
                <p>写在规则前面的话——项目的可维护性第一。</p>
                <small>阿当</small>
            </blockquote>
            <p><p>此规范为参考规范，不全是硬性要求，部分硬性约定见 <a href="rule.php#document">文档结构</a> &amp; <a href="rule#">书写规范</a>,统一团队编码规范和风格。</p>
            <p>目标是让所有代码都是有规可循的，并且能够得到沉淀，减少重复劳动。</p>
            <div class="tips"><strong>大家一起完善。 </strong> 也可以参考引自：<a href="https://github.com/aralejs/aralejs.org/wiki">开发规范</a>来完善。</div>
        </section>
        
        
        
        <section id="document">
		<h1>文档结构</h1>
<pre class="prettyprint linenums">

</pre>

        <h2>目录、文档结构</h2>
        <ol>
            <li>文件和目录名只能包含 [a-z\d-]，并以英文字母开头</li>
            <li>首选合适的英文单词 </li>
            <li>data api 命名为小写并用连字符，如 data-trigger-type</li>
            <li>事件名为驼峰，如 .trigger('itemSelected')</li>
            <li>符合规范
                <ul>
                    <li>常量全大写 UPPERCASE_WORD</li>
                    <li>变量驼峰 camelName</li>
                    <li>类名驼峰，并且首字母要大写 CamelName</li>
                </ul>
            </li>
        </ol>
        </section>
        
        
        
        <section id="naming">
            <h1>命名规范</h1>
            <ol>
                <li>文件和目录名只能包含 [a-z\d-]，并以英文字母开头</li>
                <li>首选合适的英文单词 </li>
                <li>data api 命名为小写并用连字符，如 data-trigger-type</li>
                <li>事件名为驼峰，如 .trigger('itemSelected')</li>
                <li>符合规范
                    <ul>
                        <li>常量全大写 UPPERCASE_WORD</li>
                        <li>变量驼峰 camelName</li>
                        <li>类名驼峰，并且首字母要大写 CamelName</li>
                    </ul>
                </li>
            </ol>
            <h3>常用词命名统一表</h3>
            <h5>规则：</h5>
            
            
        </section>
        
        
        
        <section id="html">
            <h1>HTML书写规范</h1>
            
            <h4>* 第一行统一使用HTML5标准：&lt;!DOCTYPE html&gt;</h4>
            <p>HTML5 头部声明简单有效，故在每个HTML页面强制执行此标准模式。</p>
<pre class="prettyprint linenums">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;meta charset="utf-8" /&gt;
&lt;title&gt;your title&lt;/title&gt;
&lt;link rel="stylesheet" href="css_example_url" /&gt;
&lt;script src="http://code.jquery.com/jquery-latest.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
...
&lt;/body&gt;
&lt;/html&gt;
</pre>
            
            <h4>Meta 的使用：（需根据具体项目选择）参考 <a href="https://github.com/webcoding/cool-head">cool-head</a> </h4>
            <ul>
                <li> <code>&lt;img&gt;</code> 标签默认缺省格式：<code>&lt;img src="xxx.png" alt="缺省时文字" /&gt;</code> 避免出现 <a href="http://js8.in/555.html" title="src=&quot;&quot; 问题"> src="" 问题</a> </li>
                <li> <code>&lt;a&gt;</code> 标签缺省格式：<code>&lt;a href="###" title="链接名称"&gt;xxx&lt;/&gt;</code> 注：<code>target="_blank"</code> 根据需求决定 </li>
                <li><a>标签预留链接占位符使用 <code>###</code>，参见：</a> <a href="http://www.v2ex.com/t/48511/" title="a标签占位符问题">a标签占位符问题</a></li>
                <li>所有标签需要符合XHTML标准闭合</li>
                <li>一律统一标签结尾斜杠的书写形式：<code>&lt;br /&gt;</code> <code>&lt;hr /&gt;</code> 注意之间空格</li>
                <li>避免使用已过时标签，如：<code>&lt;b&gt;</code> <code>&lt;u&gt;</code> <code>&lt;i&gt;</code> 而用 <code>&lt;strong&gt;</code> <code>&lt;em&gt;</code> 等代替</li>
                <li>使用 <code>data-xxx</code> 来添加自定义数据，如：<code>&lt;input data-xxx="yyy"/&gt;</code> </li>
                <li>避免使用 <code>style="xxx:xxx;"</code> 的内联样式表</li>
                <li>特殊符号使用参考 <a href="http://www.w3school.com.cn/html/html_entities.asp">HTML 符号实体</a> </li>
			</ul>
            <h3>HTML 书写规范</h3>
            <ul>
                <li>无特殊说明，编码统一为utf-8；</li>
            </ul>
            <h4>HTML 细化规范</h4>
            <ul>
                <li>HTML <code>head</code> 部分的结构参看：<a href="https://github.com/webcoding/cool-head">cool-head</a> (摘取必要内容即可)</li>
                <li> <code>css</code> 文件置于都 <strong>头部</strong> </li>
                <li> <code>jQuery</code> 及 <code>Google Analytics</code> 引用置于 <strong>头部</strong> </li>
                <li>其他效果 <code>js</code> 及 <code>统计代码</code> 文件置于 <strong>尾部</strong> </li>
                <li>HTML 代码尽量过一遍 <a href="http://html5.validator.nu/">HTML5 验证</a> </li>
                <li>HTML 占位图片使用 <a href="http://temp.im/">temp.im</a> &amp; <a href="http://placehold.us/">placehold.us</a> 图片服务</li>
			</ul>
            
            <h4>书写规范</h4>
            <ul>
                <li>使用四个空格的 soft-tabs 缩进</li>
                <li> <code>body</code> 里应每层嵌套元素缩进一次（4个空格）</li>
                <li>请务必实用双引号，而非单引号</li>
                <li>不要自闭元素包括一个斜线</li>
            </ul>
            
            <h3>实用大于语义</h3>
            <p>努力保持HTML的标准和语义，但不要牺牲实用性。用最少的复杂度尽可能少的标签实现需求。</p>
            
            <h3>属性顺序</h3>
            <p>HTML 属性应该遵循特定的顺序，以便能更易阅读代码。</p>
            <ul>
                <li>class</li>
                <li>id</li>
                <li>data-*</li>
                <li>for|type|href</li>
            </ul>
            <p>比如你的代码看起来应该像这样:</p>
<pre class="prettyprint linenums">
&lt;a class="" id="" data-modal="" href=""&gt;链接示例&lt;/a&gt;
</pre>
        </section>
        
        
        
        <section id="css">
            <h2>CSS 书写规范</h2>
            <p>外部CSS引用，必须使用如下格式( rel 在前，href 在后，无 type="text/css" 及 charset )：</p>
            <pre class="prettyprint linenums">&lt;link rel="stylesheet" href="http://pic.lvmama.com/styles/v3/combo.css" &gt;</pre>
            <h3>CSS 注意事项</h3>
            <ul>
                <li>无特殊说明，编码统一为utf-8；</li>
                <li>防止文件合并及编码转换时造成问题，请将样式中文字体名字改成对应的英文名字（unicode码），如：宋体（ \5b8b\4f53）微软雅黑（”Microsoft YaHei”,”\5FAE\8F6F\96C5\9ED1″）；</li>
                <li>书写代码前，考虑并提高样式重复使用率；</li>
                <li>禁止使用 <code>expression</code> 表达式；</li>
                <li>禁止滥用 <code>!important</code>；</li>
                <li>能缩写的尽量缩写，如 <code>padding:5px 0 0 5px;</code>；</li>
                <li>层级(z-index)必须清晰明确，适当划分组件层级范围，禁止层级间盲目攀比；</li>
                <li>为方便组件模块化和提高弹性，正常情况下，为避免外边界冲突，组件不应设置外边界，外边界用组合css方式实现，如：m10{margin:10px}mt10{margin-top:10px}等；</li>
                <li>必须为大区块&amp;重要模块的样式添加注释，小区块适量注释；</li>
                <li>正式发布前应进行压缩，压缩后文件的命名应添加”.min”后缀；</li>
                <li>代码缩进与格式：请参照以下 CSS 书写规范；</li>
            </ul>
        
            <h3>CSS 书写规范</h3>
            <p>以下书写规范针对组件开发使用，非组件书写格式建议使用单行式排版。</p>
            <ul>
                <li>使用四个空格的 soft-tabs 缩进</li>
                <li>写组选择器时，保持选择器各占一行</li>
                <li>在属性块的左 “{” 前应该有一个空格</li>
                <li>关闭属性块的右 “}” 要新起一行</li>
                <li>每个属性的 “:” 后包含一个空格</li>
                <li>每个属性应该自己独占一行</li>
                <li>分割选择器的 “,” 后应该包含一个空格</li>
                <li>Don't include spaces after commas in RGB or RGBa colors, and don't preface values with a leading zero</li>
                <li>小写所有16进制值, 例如, <code>#fff</code> 而非 <code>#FFF</code></li>
                <li>使用简写16进制值, 例如, <code>#fff</code> 而非 <code>#ffffff</code></li>
                <li>选择器中引用属性值, 例如, <code>input[type="text"]</code>
                </li>
                <li>避免0值设置单位, 例如, <code>margin: 0;</code> 而非 <code>margin: 0px;</code></li>
            </ul>
            <h4>为方便调试，css底部必须书写此css名称以及功能描述，如下：</h4>
<pre class="prettyprint linenums">
/* 
 @名称: channel.css
 @功能: 各大频道页样式 //注意适当的隔行划分
 */

/* 频道全局样式 */
.col-w { width: 780px; float: right;}
.aside { width: 200px; float: left;}


/* 频道侧边栏 */
.side-box { margin-bottom: 15px;}


/* 频道主内容区域 */
.ctitle { }


/* 特色酒店 */
.pro-search { }


/* 火车票 */
.ticket-search { }
</pre>

            <h4>错误示例：</h4>
<pre class="prettyprint linenums">
.selector, .selector-secondary, .selector[type=text] {
    padding:15px;
    margin:0px 0px 15px;
    background-color:rgba(0, 0, 0, 0.5);
    box-shadow:0 1px 2px #CCC,inset 0 1px 0 #FFFFFF
}
</pre>

            <h4>正确示例：</h4>
<pre class="prettyprint linenums">
.selector,
.selector-secondary,
.selector[type="text"] {
    padding: 15px;
    margin: 0 0 15px;
    background-color: rgba(0,0,0,.5);
    box-shadow: 0 1px 2px #ccc, inset 0 1px 0 #fff;
}
</pre>


            <p>常见的CSS术语，请参见 <a href="http://en.wikipedia.org/wiki/Cascading_Style_Sheets#Syntax">syntax section of the Cascading Style Sheets article</a> on Wikipedia.</p>
            
            <h3>属性顺序</h3>
<pre class="prettyprint linenums">
.declaration-order {
    /* Positioning 定位 */
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 100;
    
    /* Box-model 盒模型 */
    display: block;
    float: right;
    width: 100px;
    height: 100px;
    
    /* Typography 排版 */
    font: normal 13px "Helvetica Neue", sans-serif;
    line-height: 1.5
    color: #333;
    text-align: center;
    
    /* Visual 视觉 */
    background-color: #f5f5f5;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    
    /* Misc 其他 */
    opacity: 1;
}
</pre>

            <p>相关属性应放在一起，将定位与盒模型属性写在最前面，其次是排版和视觉效果的属性。</p>
            <p>关于属性顺序的完整列表，请参考 <a href="http://twitter.github.com/recess">Recess</a>.</p>
            
            <h3>格式化例外</h3>
            <p>某些情况下，这是有道理的，稍微偏离默认的 <a href="#css-syntax">语法</a>.</p>
            
            <h4>前缀属性</h4>
            <p>当使用供应商前缀的属性时，每个属性缩进到vlaue值垂直对齐的位置，方便多行编辑。</p>

<pre class="prettyprint linenums">
/* Corner radius-圆角 */
.selector {
  -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
          border-radius: 3px;
}
</pre>

            <p>注：<code>-khtml-border-radius: 3px;</code> 是苹果的那个浏览器的，现在使用 <code>-webkit-</code></p>
            <p>在 Textmate、Sublime Text 2 以及 notepad++等工具中, 都支持多行编辑。</p>
            
            <h4>单一属性的书写规则</h4>
            <p>在有些情况下，每个样式只有一个属性，考虑到可读性及更快地编辑删除等，保持同一行书写。</p>

<pre class="prettyprint linenums">
.span1 { width: 60px; }
.span2 { width: 140px; }
.span3 { width: 220px; }

.sprite {
    display: inline-block;
    width: 16px;
    height: 15px;
    background-image: url(../img/sprite.png);
}
.icon           { background-position: 0 0; }
.icon-home      { background-position: 0 -20px; }
.icon-account   { background-position: 0 -40px; }
</pre>

            <h3>可读性</h3>
            <p>代码是由人来书写和维护的。确保你的代码有很好的注释描述，以便他人使用。</p>
            
            <h4>注释</h4>
            <p>好的代码都有一个良好的代码注释而不仅仅是一个类名</p>

<h4>Bad example:</h4>
<pre class="prettyprint linenums">
/* Modal header */
.modal-header {
  ...
}
</pre>

<h4>Good example:</h4>
<pre class="prettyprint linenums">
/* Wrapping element for .modal-title and .modal-close */
.modal-header {
  ...
}
</pre>

            <h4>类名与命名</h4>
            <ul>
                <li>保持类名使用小写字母或连接符 (不要使用下划线或驼峰命名法)</li>
                <li>避免使用随意的首字符命名法</li>
                <li>保持命名尽可能短并简洁</li>
                <li>使用有意义的命名；使用结构化或目的性的意义名称</li>
                <li>根据最近的父组件基类作为命名前缀</li>
                <li>为JavaScript预留钩子的命名，请以 JS_ 起始，比如：JS_ui-tab, JS_slidebox；或者使用 data-* 挂钩JS功能</li>
            </ul>

<h4>Bad example:</h4>
<pre class="prettyprint linenums">
.t { ... }
.red { ... }
.header { ... }
</pre>

<h4>Good example:</h4>
<pre class="prettyprint linenums">
.tweet { ... }
.important { ... }
.tweet-header { ... }
</pre>

            <h4>选择器</h4>
            <ul>
                <li>在通用的元素标签中使用类</li>
                <li>要保持尽量简短，并限制每个选择器最多三个class</li>
                <li>必要时使用最近的父类 (如，在不使用前缀类时)</li>
            </ul>

<h4>Bad example:</h4>
<pre class="prettyprint linenums">
span { ... }
.page-container #stream .stream-item .tweet .tweet-header .username { ... }
.avatar { ... }
</pre>

<h4>Good example:</h4>
<pre class="prettyprint linenums">
.avatar { ... }
.tweet-header .username { ... }
.tweet .avatar { ... }
</pre>

            <h3>组织</h3>
            <ul>
                <li>组织代码段的组成部分</li>
                <li>指定一个一致的注释层次结构</li>
                <li>如果使用多个css文件，则按组件进行划分</li>
            </ul> 
            
            
            <p>更多详情常见：CSS目录下 readme.md 文件</p>
        </section>
        
        
        
        <section id="javascript">
            <h1>JavaScript 编码风格</h1>
        </section>
        
        
        
        <section id="json">
            <h1>JSON格式规范</h1>
            <p>参考<a href="https://github.com/webcoding/google-styleguide/blob/master/JSONStyleGuide.md">JSON Style Guide翻译</a>，原版：<a href="http://google-styleguide.googlecode.com/svn/trunk/jsoncstyleguide.xml">Google JSON Style Guide</a></p>
        </section>
        
        
        
        <section id="readme">
            <h1>说明文档书写规范</h1>
            
        </section>
        
        
        
        <section id="edm">
            <h1>EDM 制作规范</h1>
            <ul>
                <li> <code>CSS</code> 只可使用 <strong>内联样式表</strong> ，如：<code>style="margin:0;"</code> </li>
                <li>设计之初遵循： <strong>图上无文本，文本后无底纹</strong> 的规则</li>
                <li>使用 <code>MailChimp HTML Email CSS Fix</code> 参看下文链接</li>
                <li>引入 <code>CSS Reset for HTML Email</code> 参看下文链接</li>
                <li>使用 <code>Table</code> 布局而非 <code>DIV</code> </li>
                <li>所有图片使用 <code>IMG</code> 标签，如：<code>&lt;img style="style="display:block" "src="" /&gt;</code> </li>
                <li>可以适当使用占位符 <code>spacer.gif</code> </li>
                <li>多用 <code>&lt;br /&gt;</code> 换行而非 <code>&lt;p&gt;</code> </li>
                <li>整体最佳宽度为：<code>550-600px</code> </li>
                <li>不使用 <code>Javascript</code> </li>
                <li>正式发送给用户之前，多次测试</li>
			</ul>
            <p>更多细节参考下面链接：<br><a href="http://www.web-ed.com.au/2011/05/coding-html-newsletters-edms-quick-guide/">12 Killer Tips and Tricks for Building HTML Email</a></p>
        </section>
        
        
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->
</div>

<?php include("common/footer.html");?>
</body>
</html>