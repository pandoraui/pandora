<?php $page = "home" ?>
<?php $title="前端框架"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
	<div class="sidebar">
		<ul class="nav none">
			<li><a href="#overview">概述</a></li>
            <li><a href="#todo">项目规划</a></li>
			<li><a href="#example">一个简单的例子</a></li>
			<li><a href="#start">开始使用</a></li>
			<li><a href="#about">关于 Pandora</a></li>
		</ul>
	</div> <!-- // div.sidebar -->
	<div class="main">
        <section id="overview">
            <h1>Pandora 项目</h1>
            <blockquote>
                <p>无论你身在何方处在何时，请记住要永存希望。<em>「 晓寒 」 </em></p>
            </blockquote>
            
            <h3>初期制作计划</h3>
            <ul>
                <li>修正reset样式的实现，首先是无差异化重设 normalize.css，之后是传统意义上的reset.css效果</li>
                <li>首先确定排版样式 typo.css，内置大量（如 <code>.pd10</code> <code>.mt10</code>） 排版组合样式及固定用法 combo.css，</li>
                <li>之后是模块组件，专一的模块实现，如button、表单等 module</li>
                <li>javascript 插件工具类，如tooltip，dialog等</li>
                <li>基础样式及扩展前缀，如btn 外嵌套 metro_style(metro风格) 或 google_style(Google风格)实现不同的风格系统</li>
                <li>自定义字体图标jackey的使用</li>
                <li>应用自动化打包管理工具等</li>
            </ul>
            
            <h3>计划修正</h3>
            <ul>
                <li>排版呈现使之更贴近生产环境效果</li>
                <li>每天可以完成一两个简单的模块，但一周至少要完成一个稳定版的模块</li>
                <li>推进 NodeJS，完成项目在 NodeJS 环境下的开发、测试、部署发布等</li>
            </ul>
        </section>
        
        
        
        <section id="todo">
            <h1>项目规划 <small><span class="label todo" title="计划模块">todo</span><span class="label doing" title="调试中...">doing</span><span class="label done" title="已完成，可用于生产线">done</span></small></h1>
            
            <p><b>注意：</b> 开发模块组件之前请严格按照 <a class="B" href="rule.php">代码开发规范</a> 执行。</p>
            
            <h3>基础</h3>
            <div class="modules">
                <a class="done" href="xOne/less/normalize.css">normalize.css <small>无差异化</small></a>
                <a class="done" href="xOne/less/reset.css">reset.css <small>重设样式</small></a>
                <a class="doing" href="xOne/typo.html">typo.css <small>排版样式</small></a>
                <a class="doing" href="xOne/less/combo.css">combo.css <small>组合样式</small></a>
                <a class="doing" href="framework.php#iconfont">icon/iconfont <small>图标/字体集</small></a>
                <a class="todo" href="###">grid <small>栅格系统</small></a>
            </div>
            
            <h3>CSS 组件</h3>
            <div class="modules">
                <a class="doing" href="module.php#box">box <small>区块盒子</small></a>
                <a class="todo" href="module.php#list">list <small>列表</small></a>
                <a class="todo" href="module.php#imglist">imglist <small>图片列表</small></a>
                <a class="todo" href="module.php#imgtext">imgtext <small>图文混排</small></a>
                
                <a class="done" href="module.php#label">label/tags <small>标签标记</small></a>
                <a class="todo" href="###">filter <small>类目过滤</small></a>
                <a class="todo" href="###">icons <small>小图标</small></a>
                <a class="doing" href="module.php#poptip">poptip <small>提示层</small></a>
                <a class="doing" href="module.php#tiptext">tiptext <small>提示文本</small></a>
                <a class="doing" href="module.php#tipbox">tipbox <small>提示框</small></a>
                
                <a class="doing" href="xOne/tables.html">table <small>表格</small></a>
                <a class="done" href="xOne/nav.html">nav <small>导航</small></a>
                <a class="doing" href="xOne/topbar.html">topbar <small>顶部导航</small></a>
                <a class="doing" href="module.php#breadcrumb">breadcrumb <small>面包屑</small></a>
                <a class="done" href="xOne/paging.html">paging <small>分页</small></a>
                
                <a class="todo" href="###">dropdown <small>下拉菜单</small></a>
                <a class="done" href="xOne/buttons.html">btn <small>按钮/按钮组</small></a>
                <a class="doing" href="xOne/forms.html">form <small>表单</small></a>
                <a class="todo" href="###">search <small>搜索框</small></a>
                
                <a class="todo" href="###">modal <small>弹出对话框</small></a>
                <a class="todo" href="###">progress <small>进度条</small></a>
                <a class="todo" href="###">media <small>媒体对象</small></a>
                <a class="todo" href="###">step <small>步骤/流程</small></a>
                <a class="todo" href="###">misc <small>杂项</small></a>
                <a class="todo" href="###">unit <small>组件单元</small></a>
            </div>
            
            <h3>JavaScript 组件</h3>
            <div class="modules">
                <a class="doing" href="###">slides <small>图片轮播</small></a>
                <a class="todo" href="###">imgscoll <small>图片滚动</small></a>
                <a class="doing" href="###">lazyload <small>延迟加载</small></a>
                <a class="done" href="xOne/countdown.html">countdown <small>倒计时</small></a>
                <a class="done" href="xOne/tooltip.html">tooltip <small>工具提醒</small></a>
                <a class="todo" href="###">tips <small>浮层提示</small></a>
                <a class="todo" href="###">calendar <small>日历</small></a>
                <a class="todo" href="###">selectbox <small>下拉选项</small></a>
                <a class="todo" href="###">dropdown <small>下拉菜单</small></a>
                <a class="doing" href="###">tab <small>标签切换</small></a>
                <a class="doing" href="###">sort <small>多维排序</small></a>
                <a class="todo" href="###">pading <small>分页</small></a>
                <a class="todo" href="###">modal <small>弹出对话框</small></a>
                <a class="todo" href="###">stars <small>星星打分</small></a>
                <a class="todo" href="###">wordcount <small>字数检测</small></a>
                <a class="todo" href="###">validator <small>表单验证</small></a>
                <a class="todo" href="###">scrollspy <small>滚动侦听</small></a>
                <a class="todo" href="###">lightbox <small>图片浏览浮层</small></a>
                <a class="todo" href="###">linkage <small>联动操作</small></a>
                <a class="todo" href="###">autocomplete <small>自动补全</small></a>
            </div>
            
            <h3>常用 JS 代码段</h3>
            <div class="modules">
                <a class="done" href="demo/waterfall.html">waterfall <small>瀑布广告</small></a>
                <a class="done" href="demo/smartfloat.html">smartfloat <small>滚动浮动</small></a>
            </div>
            <h3>主要项目案例 DEMO <small>内网访问</small></h3>
            <div class="demolist">
                <dl class="dl-hor">
                	<dt>驴妈妈</dt>
                    <dd>
                        <a target="_blank" href="http://10.3.1.41/v3/index.php">index</a>
                    </dd>
                	<dt>定制游</dt>
                    <dd>
                        <a target="_blank" href="http://10.3.1.41/v3/custom.php">custom</a>
                        <a target="_blank" href="http://10.3.1.41/v3/custom-page.php">custom-page</a>
                    </dd>
                    <dt>积分商城</dt>
                    <dd>
                        <a target="_blank" href="http://10.3.1.41/v3/points.php">points</a>
                        <a target="_blank" href="http://10.3.1.41/v3/points-list.php">points-list</a>
                        <a target="_blank" href="http://10.3.1.41/v3/points-details.php">points-details</a>
                    </dd>
                    <dt>频道页面</dt>
                    <dd>
                        <a target="_blank" href="http://10.3.1.41/v3/ticket.php">景点门票</a>
                        <a target="_blank" href="http://10.3.1.41/v3/freetour.php">周边游</a>
                        <a target="_blank" href="http://10.3.1.41/v3/destroute.php">国内游</a>
                        <a target="_blank" href="http://10.3.1.41/v3/abroad.php">出境游</a>
                        <a target="_blank" href="http://10.3.1.41/v3/hotel.php">特色酒店</a>
                    </dd>
                </dl>
            </div>
            
            
            <h2>工具准备</h2>
            
            <ul>
                <li><a href="http://msysgit.github.io/">Git - 版本控制</a></li>
                <li><a href="xOne/markdown.html">Markdown - 书写文档</a></li>
                <li><a href="http://nodejs.org/">Nodejs</a> - 二期使用的平台</li>
            	<!-- 二期开发
                <li>Spm - 包管理 <small>[二期]</small></li>
            	<li>Nico - 调试&文档 <small>[二期]</small></li>
                <li>Peaches - 雪碧图 <small>[二期]</small></li>
                <li>Stylus - 预编译 <small>[二期]</small></li>
                <li>Stylib - 样式库搭建工具 <small>[二期]</small></li>
                -->
            </ul>
            
            <p><b>注意：</b>确保样式的安全使用，尽量把样式定义在相应的容器中，而不是作为全局使用</p>
<pre class="prettyprint linenums">
/* 全局样式：
 * 除非非常通用，不允许新建全局样式，如果你要建，请先问一下晓寒，不然可能随时被干掉（^_^）
 */
.red{color:red!imporant;}

/* 作用域：限定在一定的容器中
 * 像 .hover 这样的选择器是非常普通的，如何使用？
 * 这样两个容器的 .hover 就不相互影响了，记得限定作用域
 */
.module-1 .hover{ ... }
.module-2 .hover{ ... }
</pre>
        </section>
        
        
        
        <section id="example">
            <h1>一个简单的例子</h1>
            <p>实现一个metro风格的橙色按钮居中显示，仅仅使用预设样式组合即可：</p>
            <div class="docs-example">
                <p class="tc metro_style">
                    <button class="btn btn-orange">居中按钮</button>
                </p>
            </div>
<pre class="prettyprint linenums">
&lt;p class="tc metro_style"&gt;
    &lt;button class="btn btn-orange"&gt;居中按钮&lt;/button&gt;
&lt;/p&gt;
</pre>
        </section>
        
        
        
        <section id="start">
            <h2>开始使用</h2>
            
            <p>本项目已经开始在生产线测试使用，样式文件为 core.css 如下:</p>
<pre class="prettyprint linenums">
reset.css   |-- core.css
combo.css   |
buttons.css |
</pre>
            <p>此项目中具备新版线上项目的静态版页面，供调试研究使用。</p>
            <h4>延迟加载的图片或内容使用的 loading 图标：<small>两种尺寸</small></h4>
            <p><b>28px：</b> <img src="http://pic.lvmama.com/img/new_v/ui_scrollLoading/loading.gif" alt="" /> <a target="_blank" href="http://pic.lvmama.com/img/new_v/ui_scrollLoading/loading.gif">http://pic.lvmama.com/img/new_v/ui_scrollLoading/loading.gif</a></p>
            <p><b>46px：</b> <img src="http://pic.lvmama.com/img/new_v/ui_scrollLoading/loadingGIF46px.gif" alt="" /> <a target="_blank" href="http://pic.lvmama.com/img/new_v/ui_scrollLoading/loadingGIF46px.gif">http://pic.lvmama.com/img/new_v/ui_scrollLoading/loadingGIF46px.gif</a></p>
            
        </section>
        
        
        
        <section id="about">
            <h2>关于 Pandora</h2>
            <p> 这项目一路艰辛，借鉴Bootstrap的思想并结合自己的工作想整合一个适合自己当前工作的前端框架，到底被什么绊住了呢，看着日子一天天过，真是揪心啊，AliceUI 还是比较给力，这么快新版就出来了，还好之前已经整理过部分 <a href="../cnDocs/solution.php">前端解决方案</a>，这里可以直接使用了，曾经的努力虽然少，但还是有些许价值。</p>
            
            <p>看到人家的项目都有卡通形象，着实比较可爱，我也用一个，咱的就叫做 潘多拉 - Pandora 吧</p>

            <p><b>潘多拉（Pandora，也作潘朵拉）</b>，古希腊神话人物。在古希腊语中，潘是所有的意思，多拉则是礼物，意为“被授予一切优点的人”。</p>
            
            <p>根据神话，潘多拉出于好奇打开一个「魔盒」（应作坛子，希腊文原作πίθος，πίθοι，英语：pandora's box）释放出人世间的所有邪恶——贪婪、虚无、诽谤、嫉妒、痛苦等等，当她再盖上盒子时，<b>只剩下希望在里面</b>。Pandora 放出了邪恶，却把最大的希望留在了盒子里，如今她为我们所承受的困苦要做一个解决方案，把希望带给大家，并取名 Pandora 项目。</p>
            
            </p>Pandora 项目第一站——<b>前端解决方案</b>，接下来就让我们看看 <strong>Pandora</strong> 的表现吧！</p>
            
        </section>
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->
</div>


<?php include("common/footer.html");?>
</body>
</html>