<?php $page = "labs" ?>
<?php $title="前端实验室"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
	<div class="sidebar">
		<ul class="nav none">
			<li><a href="#solution">兼容解决方案</a></li>
			<li><a href="#jscode">JS代码段</a></li>
			<li><a href="#html5">HTML5探索</a></li>
			<li><a href="#css3">CSS3研究</a></li>
		</ul>
	</div> <!-- // div.sidebar -->
	<div class="main">
		<section id="solution">
            <h1>兼容解决方案</h1>
            <p class="lead">头痛的问题，我们提前搞定</p>
            <p>详情参看： <a href="../cndocs/solution.php">兼容解决方案</a></p>
        </section>
        
        
        
		<section id="jscode">
            <h1>JS代码段</h1>
            <p>常用的JS代码段，很有用处，值得收集！</p>
            
            <h3>瀑布广告 <small><a href="demo/waterfall.html">查看demo</a></small></h3>
<pre class="prettyprint linenums">
&lt;script&gt;
$(function(){
    // html代码
    var _activebox = '&lt;div id="indexSilde" style="width:980px;margin:0 auto;position:relative;overflow:hidden;height:0;"&gt;'
            + '&lt;div id="xslide1" style="position:absolute;z-index:11;top:0;display:none;"&gt;'
            + '&lt;a target="_blank" href="http://zhounianqing.lvmama.com/?losc=019677"&gt;'
            + '&lt;img src="http://pic.lvmama.com/img/v3/coupon.jpg" width="980" height="80"&gt;'
            + '&lt;/a&gt;&lt;/div&gt;'
            + '&lt;div id="xslide2" style="position:relative;top:0;z-index:10;"&gt;'
            + '&lt;a target="_blank"  href="http://zhounianqing.lvmama.com/?losc=019677"&gt;'
            + '&lt;img src="http://pic.lvmama.com/img/v3/couponbig.jpg" width="980" height="500"&gt;'
            + '&lt;/a&gt;&lt;/div&gt;'
            + '&lt;/div&gt;';
    
    $('.hh_shortcut_box').after(_activebox);
    
    // 瀑布广告
    var _indexSilde = $('#indexSilde');
	var _xslide1 = $('#xslide1');
	function _shouqi(){ 
		_indexSilde.animate({'height':80},1000,function(){
			_xslide1.fadeIn(500).siblings().fadeOut(500,function(){
				if($.browser.msie && parseInt($.browser.version)&lt;=8){ 
					// 开启低版本浏览器的动画效果
                    // $.fx.off = true;  
				}
			});
		});
	};
	
	function _showslide(){
		_indexSilde.animate({'height':500},1000,function(){
			setTimeout(_shouqi,4000);
		});
	}
	//$.fx.off = false;
	setTimeout(_showslide,1000);
})
&lt;/script&gt;
</pre>
            <h3>跟随滚动 <small><a href="demo/smartfloat.html">查看demo</a></small></h3>
            <p>实现滚动后一定位置后，某内容悬浮在特定位置</p>
            <p>注意事项：实现此浮动的标签需要默认具备定位属性，如position:absolute;</p>
<pre class="prettyprint linenums">
&lt;script&gt;
$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: 0
                    });    
                } else {
                    element.css({
                        top: scrolls
                    });    
                }
            }else {
                element.css({
                    position: "absolute",
                    top: top
                });    
            }
        });
    };
    return $(this).each(function() {
        position($(this));                         
    });
};

//绑定
$("#float").smartFloat();
&lt;/script&gt;
</pre>
            
            
            
        </section>
        
        
        
		<section id="html5">
            <h1>HTML5探索</h1>
            <p>关注HTML5文档，可参看：<a href="http://www.w3.org/html/ig/zh/wiki/HTML5">HTML5</a></p>
        </section>
        
        
        
		<section id="css3">
            <h1>CSS3研究</h1>
            <p>CSS3实现的功能越发强悍了，这个必须关注！</p>
        </section>
        
        
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->
</div>


<?php include("common/footer.html");?>
</body>
</html>