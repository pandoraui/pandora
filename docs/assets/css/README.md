
## 新的文件模块划分

所有比较成熟的模块，全部添加pa-前缀并在此列出，如下：

    稳定版（引用顺序：越大/越独立的模块越靠前引用，并且要全在页面样式之前）
    dialog.css
    table.css
    arrow.css
    button.css
    selectbox.css
    step.css
    tags.css
    tip.css
    
    开发版
    form-dev.css
    typo-dev.css
    table-dev.css
    
关于pa-modules.dev.css通过@import引用样式，仅用于测试，且不提交上线

线上使用怎么办? 
    
    引用/styles/v4/pa-modules.css
    对应：http://pic.lvmama.com/min/index.php?f=/styles/v4/base/reset.css,/styles/v4/base/combo.css
    
    引用/styles/v4/pa-modules.css
    对应：http://pic.lvmama.com/min/index.php?f=/styles/v4/modules/arrow.css,/styles/v4/modules/button.css,/styles/v4/modules/selectbox.css,/styles/v4/modules/step.css,/styles/v4/modules/tags.css,/styles/v4/modules/tip.css,/styles/v4/modules/dialog.css,/styles/v4/modules/forms.css





