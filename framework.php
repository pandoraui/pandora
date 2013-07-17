<?php $page = "framework" ?>
<?php $title="基础框架"?>
<?php $description = "本项目基于cnBootstrap开源项目创建，致力于前端快捷开发！" ?>
<?php include("./common/meta.php"); ?>
</head>
<body>
<?php include("./common/header.php"); ?>

<div class="wrap">
	<div class="sidebar">
		<ul class="nav none">
			<li><a href="#typo">排版</a></li>
			<li><a href="#iconfont">图标/字体集</a></li>
			<li><a href="#grid">栅格系统</a></li>
			<li><a href="#fluid">流动栅格</a></li>
			<li><a href="#layout">布局</a></li>
			<li><a href="#responsive">响应式设计</a></li>
			<li><a href="#animate">CSS3 Animate</a></li>
		</ul>
	</div> <!-- // div.sidebar -->
	<div class="main">
        <section id="typo">
            <h1>排版 <small>详细参见 <a href="xOne/typo.html">typo.css</a></small></h1>
            <p>首先应用 Reset 重设，对常用标签进行使用规划，使其应用达到恰到好处的效果。</p>

            <h2><a href="xOne/less/normalize.css" title="标签无差异化">normalize</a> 与 <a href="xOne/less/reset.css" title="传统样式重设">reset</a> 重设</h2>
            <p>reset.css 是 Pandora 的浏览器重设样式，消除浏览器布局标签的默认属性，使用前可引用无差异化样式 normalize.css 效果更佳。</p>
            <p>Pandora 的 reset.css 是极精简的重置样式，并综合AliceUI 及 bootstrap等修改 <a href="http://necolas.github.com/normalize.css/">normalize.css</a> 形成无差异化的浏览器基础样式，统一浏览器的默认标签属性。</p>

            <p>除 <code>reset.css</code> 以及 Pandora 适合中文排版的 <code>typo.css</code> 样式(修改自 <abbr title="typo.css by @sofish">typo</abbr> 与 <abbr title="bootstrap by @mdo and @fat">bootstrap</abbr>)外，Pandora 还内置了大量可组合的便捷实用的样式，需要注意这类样式，如：<code>.btn</code>，详情参看<a heft="#keyword">Pandora项目保留字</a>。</p>
            <p><span class="label label-info">注意!</span> 当前国内布局通常要使用reset，但现在也有越来越多的攻城师开始注意 normalize的作用了，充分发挥浏览器默认属性的优势。</p>

            <h3>常用功能类</h3>

<pre class="prettyprint linenums">
normalize.css 无差异样式及清除浮动
reset.css 传统重设样式
combo.css 便捷组合样式表
</pre>

            <ul>
                <li><p><code>clearfix</code> 清除浮动</p></li>
                <li><p><code>hide</code> 隐藏元素</p></li>
                <li><p><code>.fl</code> <code>.fr</code> 左右浮动</p></li>
                <li><p><code>center-box</code> <code>center-item</code> 浮动居中</p></li>
                <li><p><code>ellipsis</code> 文字单行溢出省略号</p>
                    <div class="ellipsis" style="width:100px;">单行文本，这里文字太多了太多了</div>
                </li>
                <li><p><code>text-justify</code> 文本两端对齐</p></li>
            </ul>
		</section>
        
        
        
		<section id="iconfont">
            <h1>图标/字体集</h1>
            <p>针对使用图标字体集的需求，不论市场还是技术，都已经非常成熟，推广使用大势所趋。Pandora项目暂时使用支付宝图标字体集 rei，如果不能满足您的需求，你可以使用 <a href="http://fontello.com/">fontello</a> 项目来扩展字体集或者使用ICON图标。</p>
            <p>如此，便能对最常用图标使用字体集来表示，如 <a href="module.php#tiptext">通知提醒</a>，下面是关于 rei 的介绍：</p>
            <p>Rei（读音为“丽”）是支付宝的 iconfont 集，是一种把图标放入自定义字体中，然后使用字体图标来替代普通图标的技术。同时，Rei 也是动漫女神。</p>
            <p><img style="border-radius:8px;" src="https://i.alipayobjects.com/e/201303/2P2JVsHeCC.jpg" alt=""></p>
            <p>字体图标具有良好的兼容性，矢量，规范，减少图片请求，适应性强等特点，大量先进的网站（包括 github 等）正在使用这种技术。 Alice 全面使用了 iconfont 技术，使得所有的通用样式模块都不会产生图片请求，并且也获得了良好的兼容性和通用性。</p>
            <p>Rei 目前涵盖了网站常用各类图标约 70 多个，兼容包括 <code>ie6/7/8</code> 在内的各主流浏览器，你可以自由的在页面中使用它。</p>
<style>
.iconset {
    padding: 15px 10px 15px 15px;
    background: #FBFBFB;
    border: 1px solid #eee;
    border-radius: 4px;
    *zoom:1;
}
.icon {
    display: inline-block;
    *display: inline;
    *zoom: 1;
    height: 22px;
    width: 156px;
    color: #888;
    font-size: 14px;
    line-height: 22px;
    margin-bottom: 5px;
}
.icon .iconfont {
    margin-right: 10px;
    font-size: 18px;
    width: 20px;
    display: inline-block;
    *display: inline;
    *zoom: 1;
    /* 使用position:relative修正垂直对齐，在IE6下回闪动，vertical-align效果也不好，
    最好就是默认不设置就是对齐的，避免干扰（很容易被其他的垂直设置影响） */
}
</style>
<!-- 这段代码用来获取下面的字体 HTML 集合 （由此可见支付宝的管理很有一套，值得学习）
<script src="http://site.alipay.im/rei/js/data.js"></script>
<script>
var array = [],
    html = '';
array = array.concat(iconData['产品/功能ICON']);
array = array.concat(iconData['通用ICON']);
array.forEach(function(item) {
    html += '<div class="icon"><i class="iconfont" title="' + item[0] +
               '">' + item[1] + '</i> ' + item[0] + '</div>\n';
});
console.log(html);
</script>
-->
<pre class="prettyprint linenums">
&lt;i class="iconfont" title="灯泡"&gt;&amp;#x00E3;&lt;/i&gt;
</pre>
            
            <div class="docs-example">
<div class="iconset clearfix">
<span class="icon"><i class="iconfont" title="盾牌-阳">&#xF000;</i> 盾牌-阳</span>
<span class="icon"><i class="iconfont" title="代付">&#xF004;</i> 代付</span>
<span class="icon"><i class="iconfont" title="预付卡">&#xF005;</i> 预付卡</span>
<span class="icon"><i class="iconfont" title="信用支付">&#xF006;</i> 信用支付</span>
<span class="icon"><i class="iconfont" title="集分宝">&#xF007;</i> 集分宝</span>
<span class="icon"><i class="iconfont" title="集分宝反色">&#xF008;</i> 集分宝反色</span>
<span class="icon"><i class="iconfont" title="基金">&#xF009;</i> 基金</span>
<span class="icon"><i class="iconfont" title="账户通">&#xF00A;</i> 账户通</span>
<span class="icon"><i class="iconfont" title="红包">&#xF00B;</i> 红包</span>
<span class="icon"><i class="iconfont" title="银行卡">&#xF00C;</i> 银行卡</span>
<span class="icon"><i class="iconfont" title="更多">&#xF00D;</i> 更多</span>
<span class="icon"><i class="iconfont" title="常见问题">&#xF00E;</i> 常见问题</span>
<span class="icon"><i class="iconfont" title="自助服务">&#xF010;</i> 自助服务</span>
<span class="icon"><i class="iconfont" title="回收站">&#xF011;</i> 回收站</span>
<span class="icon"><i class="iconfont" title="日历/日期">&#xF01C;</i> 日历/日期</span>
<span class="icon"><i class="iconfont" title="喜欢">&#xF01D;</i> 喜欢</span>
<span class="icon"><i class="iconfont" title="收藏">&#xF01E;</i> 收藏</span>
<span class="icon"><i class="iconfont" title="设置">&#xF021;</i> 设置</span>
<span class="icon"><i class="iconfont" title="播放">&#xF022;</i> 播放</span>
<span class="icon"><i class="iconfont" title="添加-圆">&#xF023;</i> 添加-圆</span>
<span class="icon"><i class="iconfont" title="添加-方">&#xF024;</i> 添加-方</span>
<span class="icon"><i class="iconfont" title="添加-无框">&#xF025;</i> 添加-无框</span>
<span class="icon"><i class="iconfont" title="声音">&#xF026;</i> 声音</span>
<span class="icon"><i class="iconfont" title="右向">&#xF027;</i> 右向</span>
<span class="icon"><i class="iconfont" title="关闭/错误">&#xF028;</i> 关闭/错误</span>
<span class="icon"><i class="iconfont" title="选择/对勾">&#xF029;</i> 选择/对勾</span>
<span class="icon"><i class="iconfont" title="查询/搜索">&#xF02A;</i> 查询/搜索</span>
<span class="icon"><i class="iconfont" title="安卓系统">&#xF02B;</i> 安卓系统</span>
<span class="icon"><i class="iconfont" title="苹果系统">&#xF02C;</i> 苹果系统</span>
<span class="icon"><i class="iconfont" title="windows Phone">&#xF02D;</i> windows Phone</span>
<span class="icon"><i class="iconfont" title="显示器">&#xF02E;</i> 显示器</span>
<span class="icon"><i class="iconfont" title="菱形">&#xF02F;</i> 菱形</span>
<span class="icon"><i class="iconfont" title="视频">&#xF030;</i> 视频</span>
<span class="icon"><i class="iconfont" title="建议/对话">&#xF031;</i> 建议/对话</span>
<span class="icon"><i class="iconfont" title="联系邮箱">&#xF032;</i> 联系邮箱</span>
<span class="icon"><i class="iconfont" title="手机">&#xF033;</i> 手机</span>
<span class="icon"><i class="iconfont" title="首页">&#xF034;</i> 首页</span>
<span class="icon"><i class="iconfont" title="单箭头左">&#xF035;</i> 单箭头左</span>
<span class="icon"><i class="iconfont" title="单箭头右">&#xF036;</i> 单箭头右</span>
<span class="icon"><i class="iconfont" title="双箭头左">&#xF037;</i> 双箭头左</span>
<span class="icon"><i class="iconfont" title="双箭头右">&#xF038;</i> 双箭头右</span>
<span class="icon"><i class="iconfont" title="左三角形">&#xF039;</i> 左三角形</span>
<span class="icon"><i class="iconfont" title="右三角形">&#xF03A;</i> 右三角形</span>
<span class="icon"><i class="iconfont" title="上三角形">&#xF03B;</i> 上三角形</span>
<span class="icon"><i class="iconfont" title="下三角形">&#xF03C;</i> 下三角形</span>
<span class="icon"><i class="iconfont" title="旺旺">&#xF03D;</i> 旺旺</span>
<span class="icon"><i class="iconfont" title="用户">&#xF03E;</i> 用户</span>
<span class="icon"><i class="iconfont" title="返回">&#xF040;</i> 返回</span>
<span class="icon"><i class="iconfont" title="图片">&#xF041;</i> 图片</span>
<span class="icon"><i class="iconfont" title="正方形">&#xF042;</i> 正方形</span>
<span class="icon"><i class="iconfont" title="账单">&#xF043;</i> 账单</span>
<span class="icon"><i class="iconfont" title="全部账单">&#xF044;</i> 全部账单</span>
<span class="icon"><i class="iconfont" title="出错">&#xF045;</i> 出错</span>
<span class="icon"><i class="iconfont" title="提示">&#xF046;</i> 提示</span>
<span class="icon"><i class="iconfont" title="警告">&#xF047;</i> 警告</span>
<span class="icon"><i class="iconfont" title="阻止">&#xF048;</i> 阻止</span>
<span class="icon"><i class="iconfont" title="成功">&#xF049;</i> 成功</span>
<span class="icon"><i class="iconfont" title="疑问">&#xF04A;</i> 疑问</span>
<span class="icon"><i class="iconfont" title="等待">&#xF04B;</i> 等待</span>
<span class="icon"><i class="iconfont" title="详情">&#xF04C;</i> 详情</span>
<span class="icon"><i class="iconfont" title="切换">&#xF04D;</i> 切换</span>
<span class="icon"><i class="iconfont" title="统计">&#xF04E;</i> 统计</span>
<span class="icon"><i class="iconfont" title="下载">&#xF04F;</i> 下载</span>
<span class="icon"><i class="iconfont" title="礼盒">&#xF050;</i> 礼盒</span>
<span class="icon"><i class="iconfont" title="备注">&#xF051;</i> 备注</span>
<span class="icon"><i class="iconfont" title="添加联系人">&#xF052;</i> 添加联系人</span>
<span class="icon"><i class="iconfont" title="申请还款">&#xF053;</i> 申请还款</span>
<span class="icon"><i class="iconfont" title="信用卡管理">&#xF054;</i> 信用卡管理</span>
<span class="icon"><i class="iconfont" title="记录">&#xF055;</i> 记录</span>
<span class="icon"><i class="iconfont" title="优惠劵">&#xF013;</i> 优惠劵</span>
<span class="icon"><i class="iconfont" title="购物袋">&#xF018;</i> 购物袋</span>
</div>
            
            <p>你可以右键查看源代码或访问 rei 来获取字体代码。</p>
            </div>
            
            <p><strong>注：</strong> 虽然可通过图表字体集实现ICON等，但需求总是千变万化的，需要使用图标ICON 的时候，可用CSS Sprites分类保存在对应的图标集上，随后会推荐一款自动化处理工具。</p>
        </section>
        
        
        
		<section id="grid">
            <h1>栅格系统</h1>
            <p>目前栅格系统很难满足国内的紧凑布局方式，在多变的电商网站中就更显得不足，综合各种情况的对比，不使用栅格就是最好的解决方案。</p>
            <p>但能够实现提高用户体验的响应式布局，虽然无法完美应用栅格系统布局紧凑页面，但并不是不能用响应式，仅考虑宽屏布局，在窄屏下隐藏掉部分内容是最具优势的响应式布局解决方案。</p>
            <p>在较小宽度或移动设备布局情况下，Bootstrap的12列栅格效果不错，虽在实现小尺寸元素上表现不够精细，但不影响其强悍的适应能力，在前端项目中具备</p>
            
            <p><strong>注：</strong> 生产线仍然无法使用，难以精准布局</p>
        </section>
        
        
        
		<section id="fluid">
            <h1>流动栅格</h1>
            <p>在后台页面使用广泛，流动栅格可以不考虑，但是流动布局应用广泛，最经典的布局方式大概三四种。但最经得起考验的布局，也许只有下面一种。</p>
        </section>
        
        
        
		<section id="layout">
            <h1>布局模板</h1>
            <p>尽管网页布局千变万化，但针对实现总有经典的布局方式不断地被重复使用，这部分可以作为布局模板提取出来。</p>
        </section>
        
        
        
		<section id="responsive">
            <h1>响应式设计</h1>
            <p>如果考虑响应式则暂时只考虑两种分辨率，1200px和980/990px，并以大分辨率为基准，小分辨率适当隐藏一部分内容，而针对移动设备可以另加考虑480px和760px。</p>
            <p><strong>注：</strong> 以上结论适用于电商的复杂布局，简单布局可以使用响应式的栅格系统实现。</p>
        </section>
        
        
        
		<section id="animate">
            <h1>CSS3 Animate</h1>
            <p>随着css3的大量普及使用，更多的动画效果展示在页面上，渐进式地提升用户体验。</p>
        </section>
        
        
        
        <?php include("common/comment.html");?>
	</div> <!-- // div.main -->
</div>


<?php include("common/footer.html");?>
</body>
</html>