<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<title>Log in</title>
<link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>

<body>
<div id="container">
    <div id="content">
        <!--<div id="logincontent">-->
    		<a href="index.php" target="_blank"><div class="loginpic"></div></a>
            <div class="login">
                <div class="title">用户登录</div>
            <form name="login" method="post" action="chuser.php">
    			<div class="user" style="margin-top:20px;">账 号:<input type="text" name="username" class="input" />(111)</div>
        		<div class="user">密 码:<input type="password" name="pwd"  class="input" />(111)</div>	
        		<div style="margin-top:20px;"><input type="submit" name="submit" value="登录" class="sub"/></div>
        		<div class="sub"><a href="registion.php">注册</a></div>
     </form>
            
            
            
            
            </div>
    	<!--</div>-->
    
    
    
	</div>    
</div>
</body>
</html>