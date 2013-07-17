<div class="google_style">
<!-- Navbar
================================================== -->
<div class="topbar hide" role="navigation">
    <div class="wrap">
        公告：示例
    </div>
</div> <!-- //.topbar -->

<!-- 头部\\ -->
<div class="header" role="banner">
    <div class="wrap">
        <a rel="home" class="brand" href="#">
            <h1>Pandora <small>前端框架</small></h1>
        </a>
        
        <div class="search-util">
            <form action="" class="search-form form-inline">
                <input type="text" name="query" placeholder="Pandora 搜索" autocomplete="off">
                <button class="btn btn-primary"> <span class="search-icon icon-white icon-search"></span> </button>
            </form>
        </div>
    </div>
</div>

<div class="nav navbar" role="navbar">
    <div class="navbar-inner">
        <div class="wrap">
            <h2 class="hide-clip">主导航</h2>
            <a rel="home" class="brand hide-clip" href="/">Pandora</a>
            <ul class="nav nav-pills main-nav" role="navigation">
                <li <?php if(isset($page) && $page == 'home') echo 'class="active"' ?>><a href="index.php">首页</a></li>
                <li <?php if(isset($page) && $page == 'framework') echo 'class="active"' ?>><a href="framework.php">基础框架</a></li>
                <li <?php if(isset($page) && $page == 'module') echo 'class="active"' ?>><a href="module.php">组件模块化</a></li>
                <li <?php if(isset($page) && $page == 'javascript') echo 'class="active"' ?>><a href="javascript.php">JavaScript插件</a></li>
                <li <?php if(isset($page) && $page == 'rule') echo 'class="active"' ?>><a href="rule.php">代码规范</a></li>
                <li class="divider-vertical"></li>
                <li <?php if(isset($page) && $page == 'build') echo 'class="active"' ?>><a href="build.php">管理发布</a></li>
                <li <?php if(isset($page) && $page == 'tool') echo 'class="active"' ?>><a href="wheel.php">造好的轮子</a></li>
                <li <?php if(isset($page) && $page == 'labs') echo 'class="active"' ?>><a href="labs.php">前端实验室</a></li>
            </ul>
        </div>
    </div>
</div> <!-- //.navbar -->
</div><!-- //.google_style -->

<!--[if lt IE 8 ]>
<div class="warning-bar">
    IE6/7 您的浏览器不受支持。详情请访问<a href="https://support.google.com/accounts/answer/1151309?hl=zh-CN">受支持的浏览器</a>。
</div>
<![endif]-->