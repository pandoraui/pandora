这些学习 Zepto 的方法

并且扩展自己使用的方法，而且尝试按自己的想法组织。


结构划分

pandora
|-- HISTORY.md
|-- LICENSE
|-- README.md
|-- package.json
|-- dist        # 构建目录
|-- docs        # 文档
|-- fonts       # Icon font，目前使用了 http://staticfile.org/
|-- gulpfile.js # 构建配置文件
|-- js          # JS 文件
|   |-- core
|   |-- dom
|   |-- ui
|-- less        # LESS 文件
|-- tools       # 相关工具
|-- vendor      # 外部依赖
`-- widget      # Web 组件

核心类
    $/$.DOM   如Zepto，jQuery

UI类
    UI/$.UI   各种UI组件

组件类
    Widget

外部依赖
    vendor

less
