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
include("conn.php");?>
<title>查看更多</title>
<link rel="stylesheet" type="text/css" href="CSS/more.css">
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
	      			echo "<a href='login.php' target='_blank'>注册</a>";
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
		<div id="content">    
    	<?php 
			$gettype=$_GET['type'];
			$result=mysqli_query($connID,"select * from tb_php2recommend where tip='$gettype'");
			$row=mysqli_fetch_array($result);
			if($row){
				do{
		?>
		        <div class="block">
                	<div class="pic"><a href="indexsearch.php?goodsid=<?php echo $row['id'];?>&type=<?php echo $row['tip'];?>"><img src="<?php echo $row['picture'];?>" width="190px;" height="260px;" style="border-radius:5px;"></a></div>
                    <div class="word">
                    	<div class="worddiv">
                    		<div class="worddivpo wordtitle"><a href="indexsearch.php?goodsid=<?php echo $row['id'];?>&type=<?php echo $row['tip'];?>"><?php $conts=$row['title'];$cont=str_replace('-','<br>',$conts); echo $cont;?></a></div>
                            <div class="worddivpo wordname"><?php echo $row['name'];?></div>
                            <div class="worddivpo wordtime"><?php echo $row['time'];?></div>
                            <div class="worddivpo">
								<div class="div1"><?php echo $row['place'];?></div>
	                            <div class="div2"><?php echo $row['price'];?>元起</div>
                            </div>
                    	</div>
                        <div class="wordlike">
                       		 <div class="like">&#10084;</div>
                        </div>
                    </div>
                </div>
        <?php
					
					
					}while($row=mysqli_fetch_array($result));
				}
		
		
		
		?>
    	</div>
          <div class="bottom">
        	<div class="bottomblock">
            	<a href="index.php" target="_blank"><img src="images/LUYI.jpg" width="270px;" height="80px;" style="margin-top:30px;"></a>
                
            </div>
        	<div class="bottomblock">
            	<p><ww>帮助中心</ww></p>
                预售演出<br>
                关于座位<br>
                配送方式<br>
                无货赔偿<br>
                订票提示<br>
            </div>
			<div class="bottomblock">
            	<p><ww>关于我们</ww></p>
                联系我们<br>
                大事记<br>
                问题反馈<br>
                隐私协议<br>
            </div>        	
			<div class="bottomblock">
            	<p><ww>支付方式</ww></p>
                支付宝<br>
                微信<br>
            </div>        	
			<div class="bottomblock">
            	<p><ww>关注我们</ww></p>
                <a href="https://weibo.com/u/3243345820" target="_blank" style="color:#000;">微博</a><br>
            </div>        
    </div>
    <div class="last"><p>重庆师范大学 计算机与信息科学学院</p><p>计算机科学与技术 卢漪 </p><p>联系方式：15923257515</p></div>    
        
        
        
    </div>
    
<script>
        $(function () {            
            $(".like").click(function () {
                $(this).toggleClass('cs');                
            })
        })
</script>
</body>
</html>