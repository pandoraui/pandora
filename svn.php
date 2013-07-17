<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SVN 维护常用项目地址</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 让IE系列浏览器识别html5标签 -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<![endif]-->
<link rel="stylesheet" href="xOne/less/pandora.css">
<link rel="stylesheet" href="xOne/less/docs.css">
<style>

</style>
</head>
<body>
<div class="wrap">
    <h1>SVN 常用的维护项目地址</h1>
	<p>SVN 最常用的维护地址，你可以在评论处添加最常用的地址连接，我会统一整理：</p>
    <p><strong>TODO：</strong></p>
	
    <div class="docs-example">
        <h4>super中常用项目文件夹：</h4>
        <dl class="dl-horizontal">
        	<dt>首页及频道：</dt>
        	<dd>E:\SVN_work\super-chanpinbu\Super_front\WebContent\WEB-INF\pages\www</dd>
        	<dt>我的驴妈妈后台：</dt>
        	<dd>E:\SVN_work\super-chanpinbu\Super_front\WebContent\WEB-INF\pages\myspace</dd>
            <dt>点评项目：</dt>
        	<dd>E:\SVN_work\super-chanpinbu\Super_front\WebContent\WEB-INF\pages\comment</dd>
            <dt>积分商城：</dt>
        	<dd>E:\SVN_work\super-chanpinbu\Super_front\WebContent\WEB-INF\pages\shop</dd>
            
            <dt>境外酒店：</dt>
        	<dd>E:\SVN_work\super-chanpinbu\Super_globalhotel\WebContent\WEB-INF\pages\abroadhotel</dd>
            
        </dl>
        <h4>focus中常用项目文件夹：</h4>
        <dl class="dl-horizontal">
        	<dt>搜索结果页：</dt>
        	<dd>E:\SVN_work\focus\pet\pet_search\src\main\webapp\WEB-INF\ftl</dd>
        	<dt>登陆注册</dt>
        	<dd>E:\SVN_work\focus\pet\pet_sso\src\main\webapp\login.jsp</dd>
            <dt></dt>
        	<dd></dd>
        </dl>
        
        <h4>头部文件修改：<small>包含以下文件夹路径</small></h4>
        <dl class="dl-horizontal">
        	<dt>super</dt>
        	<dd>super 分支、定制游的静态html文件</dd>
        	<dt>focus</dt>
        	<dd>focus 分支</dd>
            <dt>攻略 guide</dt>
        	<dd>guide 分支</dd>
            <dt>资讯 info</dt>
        	<dd>资讯频道</dd>
            <dt>诚聘英才</dt>
        	<dd>php文件：yingcai</dd>
        </dl>
        
        <h4>底部文件footer修改：<small>统一为一个 copyright.js</small></h4>
        <dl class="dl-horizontal">
        	<dt>super</dt>
        	<dd>super 分支、定制游的静态html文件</dd>
        	<dt>focus</dt>
        	<dd>focus 分支</dd>
            <dt>攻略 guide</dt>
        	<dd>guide 分支</dd>
            <dt>资讯 info</dt>
        	<dd>资讯频道</dd>
            <dt>诚聘英才</dt>
        	<dd>php文件：http://www.lvmama.com/public/jobs</dd>
        </dl>
    
        <h4>SVN 产品部分支</h4>
        <dl class="dl-horizontal">
        	<dt>PIC：</dt>
        	<dd>http://192.168.0.7/svn/pics/branches/develop</dd>
        	<dt>产品部分支-super：</dt>
        	<dd>http://192.168.0.7/svn/super/branches/chanpinbu</dd>
            <dt>产品部分支-focus：</dt>
        	<dd>http://192.168.0.7/svn/focus/branches/chanpinbu</dd>
        </dl>
        <h4>SVN 主干</h4>
        <dl class="dl-horizontal">
        	<dt>PIC：</dt>
        	<dd>http://192.168.0.7/svn/pics/trunk</dd>
        	<dt>super：</dt>
        	<dd>http://192.168.0.7/svn/super/trunk</dd>
            <dt>focus：</dt>
        	<dd>http://192.168.0.7/svn/focus</dd>
            <dt>资讯 info：</dt>
        	<dd>http://192.168.0.7/svn/others/projects/info/trunk</dd>
            <dt>攻略 guide：</dt>
        	<dd>http://192.168.0.7/svn/others/projects/guide/trunk</dd>
        </dl>
        <h4>常用测试地址：<small>可以使用SwitchHosts!管理工具切换host</small></h4>
        <h5>仿真243-245：</h5>
<pre>
# 仿真测试环境，通常称 243-245 环境
192.168.0.243 www.lvmama.com
192.168.0.243 cmt.lvmama.com
192.168.0.243 dest.lvmama.com
192.168.0.243 search.lvmama.com
192.168.0.243 cc.lvmama.com
192.168.0.243 login.lvmama.com
192.168.0.243 pcadmin.lvmama.com
192.168.0.243 super.lvmama.com
192.168.0.243 pay.lvmama.com

192.168.0.245 pic.lvmama.com
</pre>
            <h5>临时测试：</h5>
<pre>
# 配合最新项目的测试地址
10.3.1.43 pic.lvmama.com
10.3.1.43 s1.lvjs.com.cn
10.3.1.43 s2.lvjs.com.cn
10.3.1.43 s3.lvjs.com.cn
</pre>
            
        
    </div>
<pre class="prettyprint linenums">

</pre>


<h3>这里收集和汇总各项目对应的文件：</h3>
<div id="uyan_frame"></div>


</div>

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<!-- UY BEGIN -->
<script type="text/javascript">
$(function(){
    // make code pretty
    window.prettyPrint && prettyPrint()
})


var uyan_config = {
    'title':'前端开发框架 #pandora#', 
    'du':'pandoraui.com'
};
</script>
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=0" async=""></script>
<!-- UY END -->
</body>
</html>