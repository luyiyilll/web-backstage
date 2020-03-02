<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<title>Leave Message</title>
<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	session_start();
	include("conn.php");
?>
<link rel="stylesheet" type="text/css" href="CSS/messsage.css">

</head>

<body>
<div id="container">
	<div class="banner">
    	<div id="searh">
        	<a href="index.php"><img src="images/LUYI.jpg" width="200" height="50"></a>
   			<div class="input">
			<form method="post" action="indexsearch.php" name="indexsearch">
			<input type="text"  name="svalue" for="reservation" class="inputa" placeholder="请输入关键字"/>
        	<input type="submit" name="submit" value="搜索" class="inputsearch"> 
        <!--<a href="indexsearch.php">搜索</a>-->
        </form>
			</div>	
		</div>
        <div id="nav">
            <div class="li">
			<?php
        		if(!isset($_SESSION['uname'])){ 
        		echo "<a href='messsage.php?page=1' target='_blank'>查看评论</a>";
			?>
            </div>
            <div class="li">
            <?php
	      		echo "<a href='login.php'  target='_blank'>注册</a>";
			?>
            </div>
            <div class="li">
            <?php
				echo "<a href='login.php' target='_blank'>登录</a>";
				}else{
			?>
            </div>
            <div class="li">
            <?php
			echo "<a href='messsage.php?page=1' target='_blank'>查看评论</a>";
			?>
            </div>
            <div class="li">
            <?php
				echo "<a href='unset.php'>退出</a>";
			?>
            </div>
            <div class="li">
            <?php	
			echo "<a href='modify.php'>".$_SESSION['uname']."</a>";

			}
			?>
			</div>        
    	</div>
	</div>
  	<div id="title">评论区</div>
 	 <div id="leavetitle">本站寄语 | <span>☁</span></div>
 	 <div id="myword"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;摩天轮演出票务网（moretickets.com）是中国知名的现场娱乐票务平台，致力于为用户提供“海量折扣票”。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;为解决用户在购买演出票时遇到的价格不透明、买票难、买票贵等痛点，摩天轮打造了交易高效、服务完善的新一代票务交易平台，实现平台上超过90%演出票都有折扣，让更多人以更低代价走进现场。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们诚信，坚持，追求极致的服务，所以用力的吐槽我们吧！！！<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1、客服热线：400-636-2266<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、服务时间：09：00-21：00(周一至周日)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、媒体联系：pr@moretickets.com<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、公司注册地址：上海市杨浦区伟德路6号1003-22室

</div>
 	 <div id="leavetitle">发表评论 | <span>✉</span></div>
 	 <form name="message" action="checkmessage.php" method="post" >
  	 <div id="leaveword">
     	 <div class="name">
      		Your Name<br><br>
         <input name="name" type="text" class="inputname">
       	 <br>
         <br>
        	Your Signiture<br><br>
         <input name="signiture" type="text" class="inputname">
         <br><br>
       		Picture<br><br>
         <label class="b">
           <input name="p"  type="radio" value="images/tutu.png" checked>
           <img src="images/tutu.png" width="45px" height="45px"> </label>
          
        <label class="b" >
          <input name="p"  type="radio" value="images/xinxin.png" >
          <img src="images/xinxin.png" width="45px" height="45px"> </label>
          
        <label class="b">
          <input name="p" type="radio" value="images/key.png" >
          <img src="images/key.png" width="45px" height="45px"> </label>
          
        <label class="b">
          <input name="p" type="radio" value="images/mail.png" >
          <img src="images/mail.png" width="45px" height="45px"> </label>
          
        <label class="b">
          <input name="p" type="radio" value="images/hudie.png" >
          <img src="images/hudie.png" width="45px" height="45px"> </label>
      </div>
      <textarea name="word" class="wordinput"></textarea>
      <div class="mysigniture" ><input name="sss" type="checkbox" value="1" />使用签名档</div>
      <div class="divsubmit"><input type="submit" name="submit" value="发表" class="submit"></div>
  </div>
  </form>
  <div id="pic"><img src="images/picmessage.jpg" width="420px" height="600px;"></div>
 
  <div id="content">
  	<div class="ctitle">Leave Your Contents</div>
    <div class="ctip">
    <?php
	$nowpage=(int)$_GET['page'];
	if(is_numeric($nowpage)){
		$result=mysqli_query($connID,"select * from tb_php2message");
		$counts=mysqli_num_rows($result);

		$page_size=5;
		//var_dump($nowpage);

		$page_count=ceil($counts/$page_size);
		//var_dump($page_count);
		$offset=((int)$nowpage-1)*$page_size;
		//var_dump($page_size);
		
	?>
    <div class="ccount">Comments(<?php echo $counts?>)</div>
   
    <div class="cpagetop">
	<?php 
		if($nowpage==1){
		echo "<a href='messsage.php?page=1'>首页</a>";	
			}else{
				echo "<a href='messsage.php?page=".($nowpage-1)."' class='a'>上一页</a>";	
	}
	?>
    </div>
    <div class="cpagebottom">
    <?php
		if($nowpage==$page_count){
			echo "<a href='messsage.php?page=$page_count'>尾页</a>";	
			}else{
				echo "<a href='messsage.php?page=".($nowpage+1)."'>下一页</a>";	
			}
    ?>
    </div>
    
    
    </div>
    <?php
	$sql=mysqli_query($connID,"select * from tb_php2message order by id desc limit $offset,$page_size");
		$info=mysqli_fetch_array($sql);
  	if($info){
		do{
	?>
    
  	<div class="cmessage">
    	<div class="cmessagecont">
    		<img src="<?php echo $info['picture'];?>" width="100px" height="100px;" class="cpic">
    		<div class="cname"><?php echo $info['name'];?></div>
       		<div class="floor">第<?php echo $info['id'];?>楼 ✈</div>
       		<div class="ctime"><?php echo $info['time'];?></div>
   	    </div>
        <div class="cword"><?php echo $info['word'];?>
        
        
        <div class="csnav">---<?php if($info['signiturebool']) echo $info['signiture'];?>---</div>
        </div>
    
    </div>
  	<?php
	
		}while($info=mysqli_fetch_array($sql));
	}else{
		echo "暂无留言";
		}
	}
	?>
  
  
  </div>
      <div class="bottom">
        	<div class="block">
            	<a href="index.php" target="_blank"><img src="images/LUYI.jpg" width="270px;" height="80px;" style="margin-top:30px;"></a>
                
            </div>
        	<div class="block">
            	<p><ww>帮助中心</ww></p>
                预售演出<br>
                关于座位<br>
                配送方式<br>
                无货赔偿<br>
                订票提示<br>
            </div>
			<div class="block">
            	<p><ww>关于我们</ww></p>
                联系我们<br>
                大事记<br>
                问题反馈<br>
                隐私协议<br>
            </div>        	
			<div class="block">
            	<p><ww>支付方式</ww></p>
                支付宝<br>
                微信<br>
            </div>        	
			<div class="block">
            	<p><ww>关注我们</ww></p>
                <a href="https://weibo.com/u/3243345820" target="_blank" style="color:#000;">微博</a><br>
            </div>        
    </div>
    <div class="last">
    	<p>重庆师范大学 计算机与信息科学学院</p>
        <p>计算机科学与技术 卢漪 </p>
        <p>联系方式：15923257515</p>
    </div>

  
  
</div>
</body>
</html>