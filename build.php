<?php $page = "build" ?>
<?php $title="管理发布"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
	<div class="sidebar">
		<ul class="nav none">
			<li><a href="#">管理发布</a></li>
		</ul>
	</div> <!-- // div.sidebar -->
    
	<div class="main">
        <section id="">
            <h1>管理发布</h1>
            <p>项目要管理发布，就要有一套良好的流程，只有这样才能确保项目的高效管理</p>
            
            <h2>计划</h2>
            <ul>
            	<li>使用 Nodejs 平台管理</li>
            	<li>支持语法等错误检查</li>
            	<li>自动打包、测试、发布等</li>
            </ul>
        </section>
        
        
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->
    
</div>

<?php include("common/footer.html");?>
</body>
</html>