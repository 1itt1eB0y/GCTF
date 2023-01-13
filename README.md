### 现已开始Python重写工作，PHP版本放弃后续维护，Python版本完成后将开源于此项目

# GCTF
最初的想法是瞎写的CTF靶场，但是后续有了新的想法。作为一个佛系的CTFer和社团的社长，综合了`一个Good的CTF靶场`和`即使没打好比赛也能很自然地打出“GG”的心态`的两个G，再带上本身就是个人随性开发的但是确实意图长期维护的`瞎写(有一定自嘲与现实的反映)`的靶场，故而最终采用`GCTF`作为名字。
### 必读
本项目为本人本科毕业设计`CTF靶场设计与开发`的实际设计内容。

毕业设计仅是一个开始的契机，更重要的是想要真正开发出一个开箱可用的、开源的、易配置的、功能齐全的面向社团训练与比赛的靶场。

目前代码均为本人单人完成，由于时间与精力有限，许多细节存在缺陷与问题，仍需长期维护实现功能可用。

### 目前已知问题/缺陷
* Docker SDK并不存在官方PHP版本，而官方文档中推荐的PHP SDK已长时间不维护且在本人测试过程中多项基础及重要功能无法正常使用，故而采用`Swagger Codegen`生成了SDK。由于生成器的问题，生成代码依然存在许多逻辑或语法错误，本人进行了部分修正。
  **目前Docker Container Inspect及Image Inspect无法正常工作，暂未修复**
* 后台管理逻辑不完善，可实现基本功能但部分操作反人类
* 容器与镜像是否有必要与数据库交互暂未确定
* 菜鸟写的菜鸟代码 ~~除了bug还是bug~~

---
## 环境
* Yii Framework2 Advanced
* Docker
* MySQL 8.0

####  配置
* 参看`apacheconf/docker.ps1`，建立Docker容器部署环境，或部署于服务器Aapache2与MySQL均可
* 数据库初始化`apacheconf/yii2.sql`
* apache2初始化`apacheconf/set_apache.sh`
* 赋予`/var/run/docker.sock`对应用户的读写权限，或开放`tcp:2375`端口进行连接。
  * 注：本框架默认采用`Unix Domain Socket`进行访问
* 框架本身配置请参考Yii2官方文档
