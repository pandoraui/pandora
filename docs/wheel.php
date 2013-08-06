<?php $page = "tool" ?>
<?php $title="造好的轮子"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
    <div class="sidebar">
        <ul class="nav none">
            <li><a href="#devtools">开发工具</a></li>
            <li><a href="#solutions">兼容解决方案</a></li>
            <li><a href="#markdown">Markdown</a></li>
            <li><a href="#minify">Minify</a></li>
            <li><a href="#less">Less</a></li>
            <li><a href="#git">Git</a></li>
            <li><a href="#nodejs">Nodejs</a></li>
            <li><a href="#csslint">CSS Lint</a></li>
            <li><a href="#modernizr">Modernizr</a></li>
            <li><a href="#htmlchar">HTML特殊符号对照表</a></li>
            <li><a href="#bugs">常见Bugs列表</a></li>
        </ul>
    </div> <!-- // div.sidebar -->
    <div class="main">
        <section id="overview">
            <h1>造好的轮子</h1>
            <p>这里收集<strong>那些造好的轮子</strong>，具备良好的设计与实现，并方便我们进行快速开发使用的工具</p>
            <p><strong>注：</strong>如果你也知道一些好的轮子，不妨拿出来和大家分享一下!</p>
            <p><strong>TODO：</strong> 可想而知好轮子很多，所以左侧导航要按分类来整理，每个轮子的介绍中附加一些参考网址效果更好。</p>
        </section>
        
        
        
        <section id="devtools">
            <h1>开发工具</h1>
            <p>这里收集那些<strong>优良的前端开发工具</strong>，具备良好使用便捷。</p>
            <ul>
                <li><a href="http://notepad-plus-plus.org/">Notepad++</a></li>
                <li><a href="http://www.sublimetext.com/2">Sublime Text2</a></li>
                <li><a href="https://code.google.com/p/zen-coding/">Zen-Coding 插件</a></li>
            </ul>
            <p><strong>注：</strong>如果你也知道一些好的开发工具，也可以给大家推荐一下!</p>
        </section>
        
        
        
        <section id="solutions">
            <h1>兼容解决方案 <small>头痛的问题，我们提前搞定</small></h1>
            <p class="lead">认真思考，认真总结，不但要知其然，更要知其所以然。</p>
            <p>solutions 界面及缩略图设计参考：<a href="http://ued.taobao.com/blog/2011/12/%E7%95%8C%E9%9D%A2%E8%AE%BE%E8%AE%A1%E9%80%9F%E6%88%90/">界面设计速成</a></p>
            <p><strong>详情请参看：</strong><a href="/cnbootstrap/cndocs/solution.php">兼容解决方案</a>列表</p>
        </section>
        
        
        
        <section id="markdown">
            <h1>Markdown</h1>
            <p>详情请参考：<a href="modules/markdown.html">Markdown 语法说明</a></p>
            <p>Markdown 语法的目标是：成为一种适用于网络的<em>书写</em>语言。</p>
            <p>可读性，无论如何，都是最重要的。一份使用 Markdown 格式撰写的文件应该可以直接以纯文本发布，并且看起来不会像是由许多标签或是格式指令所构成。Markdown 语法受到一些既有 text-to-HTML 格式的影响，包括 <a href="http://docutils.sourceforge.net/mirror/setext.html">Setext</a>、<a href="http://www.aaronsw.com/2002/atx/">atx</a>、<a href="http://textism.com/tools/textile/">Textile</a>、<a href="http://docutils.sourceforge.net/rst.html">reStructuredText</a>、<a href="http://www.triptico.com/software/grutatxt.html">Grutatext</a> 和 <a href="http://ettext.taint.org/doc/">EtText</a>，而最大灵感来源其实是纯文本电子邮件的格式。</p>
            <p>Markdown 最适合来书写使用说明、介绍或规范等，通常用于书写 Readme.md</p>
            <p>更多详情常见 <a href="modules/markdown.html">Markdown 语法说明</a>，这里还提供 <a href="modules/markdown.html#editor">Mrakdown 免费编辑器</a>。</p>
        </section>
        
        
        
        <section id="minify">
            <h1>Minify</h1>
            <p>Minify: 在服务端合并和压缩JavaScript和CSS文件</p>
            <p>详情请参考：<a href="https://code.google.com/p/minify/">Minify</a></p>
        </section>
        
        
        
        <section id="less">
            <h1>Less</h1>
            <p>Less: 一种动态样式语言 </p>
            <p>详情请参考：<a href="http://www.lesscss.net/">Less</a></p>
        </section>
        
        
        
        <section id="git">
            <h1>Git</h1>
            <p>详情请参考：<a href="https://github.com/webcoding/useGit">useGit项目</a></p>
        </section>
        
        
        
        <section id="nodejs">
            <h1>Nodejs</h1>
            <p>更多请参考：</p>
            <ul>
                <li><a href="https://github.com/webcoding/nodejs">nodejs 入门学习</a></li>
            </ul>
        </section>
        
        
        
        <section id="csslint">
            <h1>CSS Lint</h1>
            <p>CSSLint 是一个用来帮你找出 CSS 代码中问题的工具，它可做基本的语法检查以及使用一套预设的规则来检查代码中的问题，规则是可以扩展的。</p>
            <p>详情请参考：<a href="http://csslint.net/">CSS Lint</a></p>
        </section>
        
        
        
        <section id="jshint">
            <h1>JSHint</h1>
            <p>JSHint跟JSLint非常像，都是Javascript代码验证工具，这种工具可以检查你的代码并提供相关的代码改进意见。</p>
            <p>详情请参考：<a href="http://jshint.com/">JSHint</a></p>
        </section>
        
        
        
        <section id="modernizr">
            <h1>Modernizr</h1>
            <p>Modernizr: the feature detection library for HTML5/CSS3</p>
            <p>详情请参考：<a href="http://modernizr.com/">Modernizr</a></p>
        </section>
        
        
        
        <section id="htmlchar">
            <h1>HTML特殊符号对照表</h1>
            <p>HTML特殊字符编码大全，建议将最常用的记住！</p>
            <p>详情请参考：<a href="modules/htmlchar.html">HTML特殊符号对照表</a></p>
        </section>
        
        
        
        <section id="bugs">
            <h1>常见Bugs列表</h1>
            <p>一直想系统的整理下关于浏览器兼容性的各种Bug及解决方法，但一直都很忙没有完成，没有成片的时间，于是我决定每天整理一点，毕竟网上也不少整理的了，虽然不全，但是参考着再补充我和朋友们所遇到的，那么一份齐全的浏览器兼容性bug列表及解决方案也就指日可待了！</p>
            <p>整理Bugs方案，自然首先要处理更底层的东西，考虑到不同的结构也可能产生影响，所以优先研究css reset以及html结构基础方案，这之后在解决Bugs问题就会减少N多种的情形，如此就能保证更好更统一的解决问题！</p>
            <p>关于浏览器的Bug解决方案(包含hack技术)，下面列举了一般常见的样式Bug，布局Bug，以及需要设计时需要规避的Bug(目前81个)</p>
            <p>详情请参考：<a href="/cnbootstrap/cndocs/bugs-and-fixed.php">常见Bugs列表</a></p>
        </section>
        
        <?php include("common/comment.html");?>
    </div> <!-- // div.main -->
</div>

<?php include("common/footer.html");?>
</body>
</html>