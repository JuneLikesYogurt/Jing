#silent
我想静静（silent）是一个自定义计时网页应用，用户登录后可以选择三种模式进行计时，计时完成后生成成功记录，可以在展示页面查看所坚持的总时长，如果中途退出则生成失败记录。

##页面说明：
1. silence.html：页面的入口页面，点击任意位置跳转到登录页面（login.php）；  
2. login.php：登录页面，用于用户登录操作，新用户可以跳转到注册页面（register.php），登录成功跳转到主页（time.php）；  
3. register.php：注册页面，用于注册操作，注册完成后跳转到登录页面（用户不允许重名，若重名会有弹窗提醒）；  
4. start.php：主页，显示当前时间，点击start跳转到选择页面（select.php）；  
5. select.php：选择页面，用于选择计时模式和时间长度，提交后跳转到计时页面（time.php）；  
5. time.php：计时页面，倒计时结束后跳转到主页，完成一次计时后台增加一条成功记录，中途退出则增加一条失败记录；  
6. account.php：展示个人信息和目前成功坚持的时长，可以从各个页面右上角的account按钮进入； 
7. connect.php：用于数据库的链接。

##数据库说明：
数据库采用MySQL-5.7.21版本；  

数据库名：wxjingjing  

用户名：root  

数据表：
1. 用户表（user）:  
    + id（uid）【key】 int（10）  
    + 用户名（username） char（20）
    + 密码（password） char（20）
    + 注册时间（rtime）timestamp
2. 数据表（data）：
    + id（did）【key】int(10)
    + 用户id（uid）【foreign key】int(10)
    + 本次坚持时长（time）int（10）
    + 模式（type）char(20)
    + 本次是否成功（flag）tinyint（1）

##其他文件说明：
css和js文件夹中为各个页面的样式和渲染文件，wxjingjing.sql为wxjingjing数据库导出的sql文件。
