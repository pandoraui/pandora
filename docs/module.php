<?php $page = "module" ?>
<?php $title="组件模块化"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
    <div class="sidebar">
        <ul class="nav none">
            <li class="hide"><a href="#tpl">tpl <small>布局模板</small></a></li>
            <li><a href="#box">box <small>区块盒子</small></a></li>
            <li><a href="#list">list <small>[图/文混排]列表</small></a></li>
            <li><a href="#dropdown">dropdown <small>下拉菜单</small></a></li>
            
            <li><a href="#table">table <small>表格</small></a></li>
            <li><a href="#btn">btn <small>按钮[组/菜单]</small></a></li>
            <li><a href="#form">form <small>表单</small></a></li>
            
            <li><a href="#nav">nav <small>导航</small></a></li>
            <li><a href="#breadcrumb">breadcrumb <small>面包屑</small></a></li>
            <li><a href="#paging">paging <small>分页</small></a></li>
            <li><a href="#tags">tags <small>标签标记</small></a></li>
            <li><a href="#tip">tip <small>提示层/框</small></a></li>
            <li><a href="#progress">progress <small>进度条</small></a></li>
            <li><a href="#media">media <small>媒体对象</small></a></li>
            <li><a href="#step">step <small>步骤</small></a></li>
            <li><a href="#misc">misc <small>杂项</small></a></li>
        </ul>
    </div> <!-- // div.sidebar -->
    <div class="main">
        <section id="tpl">
            <h1>布局模板</h1>
            <p>最常用的布局结构堪称经典，可以作为布局模板使用——内容盒子，列表，图文混排，图片滚动，下拉菜单等</p>
            <p>经典布局不是指单一的某一种布局，针对不同的风格设计，都有优良的布局经典，敏捷开发无处不在，这里仅就某一类设计浅谈布局实现(@此处实例多是修改BT项目实例或引用lvmama的项目或针对未来需求的预设实现)。</p>
            <p><strong>注：</strong> 针对公共模块提取调整，立足实际应用，除此外其他的不做规划。</p>
            
            
            
            <h2 id="box">区块 box</h2>
            <p>实现布局块，保证良好的扩展性</p>
            
            <div class="docs-example notypo">
                <div class="pbox border">
                    <div class="pbox-head">
                        <a class="link-more fr" href="#">更多 &raquo;</a>
                        <h4>标题 <small>一些说明</small></h4>
                    </div>
                    <div class="pbox-content">
                        <p>box-content 上设置内边距等</p>
                    </div>
                </div>
            </div>
            
            
            <h2 id="list">列表实现 list</h2>
            <p>实现常见的布局列表，具备良好的扩展性</p>
            
            
            <h2 id="imglist">图片列表 imglist</h2>
            <p></p>
            
            
            <h2 id="imgtext">图文混排 imgtext</h2>
            <p></p>
            
            
        </section>
        
        
        
        <section id="table">
            <h1>表格</h1>
            <p>页面中常用的表格，信息展示，布局表格，产品列表，特定功能类。</p>
            <p>详情参看： <a href="modules/tables.html">tables</a></p>
        </section>
        
        
        
        <section id="btn">
            <h1>按钮</h1>
            <p>关于按钮，BT项目中已经做了大量的研究，也比较完美了，唯一的缺憾是不支持IE6以及在Firefox及IE7中表现的并不一致。</p>
            <p>这里专门针对网页中的按钮做了进一步的测试研究与实践，提供了兼容的解决方案能完全满足你的需求，并能与网站的其他组件友好的组合使用。(由于之前已经做过一部分<a href="/cnbootstrap/cnDocs/solutions/button.html" title="主要侧重外形大小的控制">CSS通用按钮</a>测试，此处继续前面的测试进行组件开发，这里主要侧重于应用级。)</p>
            <p>集合五种尺寸的按钮，3中类型，四种标签，N*4种风格(默认+metro_style+google_stylr+lv_style)，更可以与图标/字体集组合，能满足大部分的按钮需求。</p>
            <p>详情参看：<a href="modules/buttons.html">buttons</a></p>
        </section>
        
        
        <section id="form">
            <h1>表单</h1>
            <p>处理表单最头疼的事情莫过于N中不同的排版杂糅在一起，以致于对齐甚至都要单独个性化处理。</p>
            <p>这里总结了两种尺寸下的四种常见form布局方式，支持混合使用，几乎统一了表单的各类布局实现。</p>
            <p>详情参看： <a href="modules/forms.html">forms</a></p>
        </section>
        
        
        
        <section id="nav">
            <h1>导航</h1>
            <p>顶部导航，侧栏导航等</p>
            <p>详情参看： <a href="modules/nav.html">Nav</a></p>
        </section>
        
        
        
        <section id="breadcrumb">
            <h1>面包屑</h1>
            <p>此处实现了最常用的三种面包屑导航</p>
            
            <div class="docs-example">
                <div class="crumbs">
                    <p>
                        <span>您当前所处的位置：</span>
                        <a href="../">首页</a> &gt; 
                        <a href="../module.php">组件</a> &gt; 
                        面包屑
                    </p>
                </div>
                
            </div>
<pre class="prettyprint linenums">
&lt;div class="crumbs"&gt;
    &lt;p&gt;
        &lt;span&gt;您当前所处的位置：&lt;/span&gt;
        &lt;a href="../"&gt;首页&lt;/a&gt; &amp;gt; 
        &lt;a href="../module.php"&gt;组件&lt;/a&gt; &amp;gt; 
        面包屑
    &lt;/p&gt;
&lt;/div&gt;
</pre>
            <h4>面包屑的作用</h4>
            <ul>
                <li>让用户了解当前所处位置，以及当前页面在整个网站中的位置。</li>
                <li>提供返回各个层级的快速入口，方便用户操作。</li>
                <li>降低跳出率，面包屑路径会是一个诱惑首次访问者在进入一个页面后去浏览这个网站的非常好的方法。</li>
                <li>面包屑有利于网站内链的建设，用面包屑大大增加了网站的内部连接，提高用户体验。</li>
            </ul>
            
        </section>
        
        
        
        <section id="paging">
            <h1>分页</h1>
            <p>实现功能完备的分页组件，扩展辅助js时可实现前端分页。</p>
            <p>事实上一个网站也许只有一两种风格的分页模块，下面列举两种尺寸，两种风格的分页布局供大家参考</p>
            <p>详见：<a href="modules/paging.html">paging</a></p>
        </section>
        
        
        
        <section id="tags">
            
            <h1>标签标记</h1>
            <h3>标签 <small>标签和注释文字</small></h3>
            <p>用来显示指示信息或标识某某数量(未完成任务、未读信息等)的简洁小组件。在CRM中往往用在任务处理列表或消息提醒上。</p>
            
            <h3>tags标签 <small>详情参见 <a href="modules/tags.html">tags标签</a></small></h3>
            
            <p>统一 lvmama 标签（促销、返现、提示），依赖<a  href="assets/less/tags.css">tags.css</a></p>
            
            
            
            <h3>轻松实现折叠效果</h3>
            <p>当没有任何内容时，可以很方便的将标签和徽章折叠起来（通过CSS的 <code>:empty</code>  选择器）。<small>针对低版本浏览器需要js修复支持</small></p>
            
        </section>
        
        
        
        <section id="tip">
            <h1>提示层/提示文本/提示框</h1>
            
            <p><strong>提醒：</strong> 字体图标集虽已全兼容，但字体加载仍有延迟（特别是老旧浏览器），有时会出现闪动，另外针对信息提示框的显示，表示字体图标不够精致，可设置两个方案，精致版的图标集 VS 简单且方便扩展的文字图标集。</p>
            
            
            
            <h3>精致图标集 PK 文字图标集</h3>
            
            <p>已转移，详情参见：<a href="modules/tags.html#plan2">tip 提醒框</a></p>
            
            <p>带各类图标的提示文案，可带有提示箭头。文字图标集方案 摘自 AliceUI。</p>
            
            <p>老版本 ICON 使用的图片，请参考 <a href="/cnbootstrap/cndocs/solutions/alerts.html">信息提示框</a></p>
            
        </section>
        
        
        
        <section id="progress">
            <h1>进度条</h1>
            <p>显示某操作进程进度</p>
        </section>
        
        
        
        <section id="media">
            <h1>媒体对象</h1>
            <p>图文混排等</p>
        </section>
        
        
        
        <section id="step">
            <h1>步骤</h1>
            <p>操作步骤的常用布局实现</p>
            <p>详情参考：<a href="modules/step.html">step</a></p>
        </section>
        
        
        
        <section id="misc">
            <h1>杂项</h1>
            <p>消息墙等组件</p>
        </section>
        
        
        
        <?php include("common/comment.html");?>
    </div> <!-- // div.main -->
</div>

<?php include("common/footer.html");?>
</body>
</html>