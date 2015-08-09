# project_admin
Built in 2014.11,make it open source in 2015.8.  

## description

- 比较简单的php网站，博客管理系统，通过php实现对mysql的curd;
- 前端加入时参考后台读取数据库代码;

---

## folder

>-project_admin  

>>–.git 通过git管理项目会生成这个文件夹  
>>–admin.sql 数据库结构转储文件  
>>–administrator 后台文件夹   
  >>>–plugins 存放插件  
  >>>–data 配置文件和基本数据存储文件  
  >>>–include 部分重复读取文件存放目录  
  >>>–admin_index.php 入口  

>>–README.md 说明文件  


---

## configuration

### 添加到工程

- 将project_admin/里边的administrator文件夹整个放到网站根目录里;
- 访问方式：http://host:port/{网站根目录}/administrator/admin_index.php;

### 数据库连接

- 导入数据库admin.sql文件;
- ![image](https://github.com/willworks/project_admin/raw/master/administrator/data/config.png);
- 修改上述配置;

---
