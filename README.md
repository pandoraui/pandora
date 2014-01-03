Pandora 
========

## 关于Pandora

潘多拉（Pandora，也译作潘朵拉），希腊神话中火神赫淮斯托斯用粘土做成的地上的第一个女人，作为对普罗米修斯盗火的惩罚送给人类的第一个女人。众神亦加入使她拥有更诱人的魅力。

根据神话，潘多拉出于好奇打开一个「魔盒」（应作坛子，希腊文原作πίθος，πίθοι，英语：pandora's box）释放出人世间的所有邪恶——贪婪、虚无、诽谤、嫉妒、痛苦等等，当她再盖上盒子时，**只剩下希望在里面**。Pandora 放出了邪恶，却把最大的希望留在了盒子里，如今她为我们所承受的困苦要做一个解决方案，把希望带给大家，并取名 Pandora 项目。
            
Pandora 第一站——**前端解决方案**，接下来就让我们看看 **Pandora** 的表现吧！


## 前言

> 经验告诉我们，不要重复发明轮子

Pandora 前端框架（以下简称 Pandora）是基于 [cnBootstrap](https://github.com/webcoding/cnBootstrap) 制作的前端开发框架。考究借鉴 twitter Bootstrap 的设计思想，并结合中文排版布局(参照sofish的typo.css)的特点进行设计。

其中 cnBootstrap 集成了 旧版的AliceUI 兼容解决方案（包括但不限于AliceUI），通过整合各类兼容性解决方案，cnBootstrap已经具备大量的解决方案实例。现转移到pandora中进一步完善...


## 开发规划

#### 仓库目录结构：

    pandora
    |- docs/                Pandora 项目文档
    |   |- *.php (现放在根目录下)
    |   |- assets/      css/img/js/less 静态资源
    |   |- modules/     模块组件
    |   |- examples/    开发示例
    |   |- templates/   模板
    |   |- demos/
    |   |- test/        测试目录
    | 
    |- solutions/           浏览器兼容解决方案（支持 Less CSS)
    |- release/             稳定版本（css/js/icon/modules等）
    |- labs/                前端实验室，用于pandora项目实践，如v3/v4
    |- w3c/                 HTML5/CSS3 标准文档 (详见原AliceUI)
    |- plugins/             Pandora 快捷开发对应的编辑器插件 (规划中)
    |- README.md

#### 文档结构

使用HTML5布局标签及CSS3效果，并普及精简模式(如：http://缩写为// 省略type="text/css" type="text/javascript"等)

#### 阅读 HTML5/CSS3 标准文档

标准化文档项（Standard Specs），目前主要是对 HTML5/CSS3 这些较新的标准技术进行的标准文档研究。使用于标准布道。让更多不熟悉相关技术的人可以阅读更易懂的文档、了解需要注意的点和知悉相关的解决方案。后续计划是产出网站应用新技术的渐进增强方案和实践解决方案。

## Git管理工具指南 

本项目使用Git管理，如果您对Git的使用不甚熟悉，可以参考[useGit使用指南](https://github.com/pandoraui/useGit)项目，包含详细的Git教程讲解以及Git常用命令。

## 版权和许可 

基于 [MIT License](http://en.wikipedia.org/wiki/MIT_License "WikiPedia 中关于 MIT License 的描述") 开源。
