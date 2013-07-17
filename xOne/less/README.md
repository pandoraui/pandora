Pandora 样式组
=============

Pandora样式组规划结构参照Bootstrap项目，其对页面组件功能实现具备非常良好的划分，值得广而用之。

底层样式改动较大，整合normalize.css,BT,typo.css，针对新的结构指定了其功能实现，如下：

- normalize.css 实现浏览器无差异化的标签默认属性
- reset.css     传统的重置样式，生产线使用
- typo-dev.css  实现统一的标签默认样式(非生产线)
- typo.css      扩展实现统一的标签样式(可用于生产线)
- combo.css     内置的便捷组合样式

一些说明：
		
	same.css 
	包含small,strong,em,del,b,i,a,p,blockquote,q,code,pre,sub,sup
		
	typo-dev.css
	包含ul/ol/dl/h1~h6,p
	
	typo.css 在typo样式下起效
	包含ul/ol/dl/h1~h6,p

效果可通过排版测试页面 typo.html 浏览测试。

**注：**实际开发使用core样式，具备code/ul/ol/dl等统一属性，且良好一致的排版效果及大量的内置组合样式可以提高开发效率且使用灵活。

	Pandora CSS架构
	
	normalize.css    |- core-dev.css
	typo-dev.css     |
	combo.css        |

	normalize.css    |- core.css
	reset.css        |
	typo.css         |
	combo.css        |
	 
	module.css
	plugin.css

此处系Pandora项目保留字：

> .btn

    以下为Bootstrap中的样式组结构（暂未做修改仅供参考）
	/* Core variables and mixins */
    /* Modify this for custom colors, font-sizes, etc */
    @import "variables.css"; 
    @import "mixins.css";
    
    /* CSS Reset
    @import "normalize.css";
    @import "reset.css";
    @import "combo.css";
    @import "module.css";
    */
    /* Grid system and page structure */
    @import "scaffolding.css";
    @import "grid.css";
    @import "layouts.css";
    
    /* Base CSS */
    @import "type.css";
    @import "code.css";
    @import "forms.css";
    @import "tables.css";
    
    /* Components: common */
    @import "sprites.css";
    @import "dropdowns.css";
    @import "wells.css";
    @import "component-animations.css";
    @import "close.css";
    
    /* Components: Buttons & Alerts */
    @import "buttons.css";
    @import "button-groups.css";
    @import "alerts.css"; /* Note: alerts share common CSS with buttons and thus have styles in buttons.css */
    
    /* Components: Nav */
    @import "navs.css";
    @import "navbar.css";
    @import "breadcrumbs.css";
    @import "pagination.css";
    @import "pager.css";
    
    /* Components: Popovers */
    @import "modals.css";
    @import "tooltip.css";
    @import "popovers.css";
    
    /* Components: Misc */
    @import "thumbnails.css";
    @import "media.css";
    @import "labels-badges.css";
    @import "progress-bars.css";
    @import "accordion.css";
    @import "carousel.css";
    @import "hero-unit.css";
    
    /* Utility classes */
    @import "utilities.css"; /* Has to be last to override when necessary */
    
    /* Plugin classes */
    @import "plugin.css";

