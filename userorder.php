<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
//error_reporting(0);?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<title>我的订单</title>
<link rel="stylesheet" type="text/css" href="CSS/userorder.css">
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
        		echo "<a href='messsage.php?page=1'>查看评论</a>";
			?>
     	   </div>
       	   <div class="li">
            <?php
	      		echo "<a href='login.php'>注册</a>";
			?>
        	</div>
       		<div class="li">
            <?php
				echo "<a href='login.php'>登录</a>";
				}else{
			?>
       		</div>
       		<div class="li">
            <?php
				echo "<a href='messsage.php?page=1'>查看评论</a>";
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
	<div id="content">
        <div id="right">
        	<div class="righttop">全部订单</div>
        		<div class="rightdiv">
       			 <?php
				$na=$_SESSION['uname'];
				$query="select count(*) as total from tb_php2userbuy where name=$na";
				$result1=mysqli_query($connID,$query);
				$arr=mysqli_fetch_assoc($result1);
				$message_count=$arr['total'];
				$sql="select * from tb_php2userbuy where name=$na";
				$result=mysqli_query($connID,$sql);		
				if (!$result) {
					printf("Error: %s\n", mysqli_error($connID));
					exit();
				}
				$row=mysqli_fetch_object($result);

				if($row){
				?>
				<table cellpadding="0" cellspacing="0" style="margin-top:30px; margin-left:150px;">
    				<tr>
  	       		 		<td class="td1"></td>
      	 	   			<td class="td1">收货人姓名</td>
      	    			<td class="td1">联系电话</td>
       	    			<td class="td1">商品名称</td>
            			<td class="td1">收货人地址</td>
            			<td class="td1">下单时间</td>
        			</tr>
       			 <?php
				do{
				?>
     		  <tr>
        			<td class="td2"><img src="<?php  echo $row->pic;?>" width="60px" height="100px"></td>
        			<td class="td2"><?php echo $row->recname;?></td>
         		  	<td class="td2"><?php echo $row->tel;?></td>
       			 	<td class="td2"><?php echo $row->title;?></td>
        			<td class="td2"><?php echo $row->adress;?></td>
       			    <td class="td2"><?php echo $row->datetime;?></td>

      		  </tr>
     		   <?php
		
      		  }while($row=mysqli_fetch_object($result));
				?>
     		   <tr>        
      		  <td></td>
      		  <td></td>
     		   <td></td>
      		  <td></td>
      		  <td></td>
      		  <td>&nbsp;&nbsp;&nbsp;&nbsp;共<span><?php echo $message_count;?></span>条记录</td>

       		 </tr>
		    </table>
				<?php
				}else{
				?>
					<div class="rightpic"><img src="admin/img/order.jpg"></div>
			<?php 
			}
			?>  
            
            </div>
        </div>
   
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
<script type="text/javascript">
    var lis = document.getElementById("letft").getElementsByTagName("div");
    var divs = document.getElementById("1").getElementsByTagName("div");
    for(var i=0; i<lis.length; i++){
        lis[i].index = i;
        lis[i].onclick = function(){
        	for(var j=0; j<lis.length; j++){
            	lis[j].className = "";
        	}
        	this.className ="hover";
        	for(var i=0; i<divs.length; i++){
            	divs[i].style.display="none";
        	}
        	divs[this.index].style.display = "block";
      	}
    }
  </script>    
</body>
</html>