<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
//error_reporting(0);
include("conn.php");?>
<title>Registion</title>
<link rel="stylesheet" type="text/css" href="CSS/registion.css">

</head>
<script src="js/ajax.js"></script>
<script>
	
				//检测密码
	function inputpwd(form){
		if(form.pwd.value.length<6){
	 		document.getElementById("webpage2").innerHTML="注册密码大于等于6!";
	 		/*alert("注册密码长度应大于等于6!");*/
	 		form.pwd.select();
	 		return(false);
	 	}else{
	 		document.getElementById("webpage2").innerHTML="*";
		}
	}
	function checkpwdbool(form){
  			//确认密码
		if(form.pwd.value!=form.checkpwd.value){
			 document.getElementById("webpage3").innerHTML="密码与重复密码不同!";
	 		/*alert("密码与重复密码不同!");*/
	 		form.checkpwd.select();
	 		return(false);
	 	}else{
	 		document.getElementById("webpage3").innerHTML="*";
		}
	}

</script>
<body>
<div id="container">
	<div id="content">
		<a href="index.php" target="_blank" ><div class="loginpic"></div></a>
            <div class="login">
                <div class="title">用户注册</div>   
					<form name="regis" method="post" action="registionch.php">
    				<div class="user"><span>用户昵称:</span>
       				<input type="text" name="username" class="input" onBlur="checkName(regis)" autocomplete="off" required>
       				<div id="webpage1">*</div>
        			</div>
      				<div class="user"><span>密<word>密码</word>码:</span>
    				<input type="password" name="pwd" class="input" onBlur="inputpwd(regis)" autocomplete="off" required>
            		<div id="webpage2">*</div>
	    			</div>
   					<div class="user backg">确认密码:
    				<input type="password" name="checkpwd" class="input" onBlur="checkpwdbool(regis)"  autocomplete="off" required>
             		<div id="webpage3">*</div>

    	</div>
        <div class="user backg">联系电话:
    		<input type="text" name="tel" class="input" onBlur="checkTel(regis)" required>
            <div id="webpage4">*</div>

   	 	</div>
        <div class="user">用户地址:
    		<input type="text" name="address" class="input" required>
		</div>
    <div>
        	<input type="submit" name="usersubmit" value="提交"  class="sub" onClick="chkinput(regis)">
    </div>
	</form>
		</div>
 
    </div>
    <div class="last"><p>重庆师范大学 计算机与信息科学学院</p><p>计算机科学与技术 卢漪 </p><p>联系方式：15923257515</p></div>



</div>
</body>
</html>