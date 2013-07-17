<?php $page = "tpl" ?>
<?php $title="前端布局模板"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
    <div class="sidebar">
        <ul class="nav none">
            <li><a href="#tpl">tpl <small class="iconfont">布局模板</small></a></li>
            <li><a href="#box">box <small class="iconfont">区块</small></a></li>
            <li><a href="#list">list <small class="iconfont">列表</small></a></li>
            <li><a href="#imglist">imglist <small class="iconfont">图片列表</small></a></li>
            <li><a href="#imgtext">imgtext <small class="iconfont">图文混排</small></a></li>
        </ul>
	</div> <!-- // div.sidebar -->
	
    <div class="main">
        <section id="tpl">
            <h1>前端布局模板</h1>
            <p>以下实例多是引用lvmama项目中的布局实现</p>
        </section>
        
        
        
        <section id="box">
            <h2>区块 box</h2>
            <p>实现布局块，保证良好的扩展性</p>
            <div class="docs-example">
                <div class="pro-box pro_custom border">
                    <div class="title">
                        <h4>标题 <small>一些说明</small></h4>
                        <a class="link-more" href="">更多 &raquo;</a>
                    </div>
                    <div class="content" style="height:100px;">
                        <p>这是列表或其它内容</p>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        <section id="list">
            <h2>列表实现 list</h2>
            <p>实现常见的布局列表，具备良好的扩展性</p>
        </section>
        
        
        
        <section id="imglist">
            <h2>图片列表 list</h2>
            <p></p>
        </section>
        
        
        
        <section id="imgtext">
            <h2>图文混排 list</h2>
            <p></p>
        </section>
        
        
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->

</div>

<?php include("common/footer.html");?>
</body>
</html>