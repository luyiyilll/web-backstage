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
include("conn.php");
//error_reporting(0);?>
<title>填写订单</title>
<link rel="stylesheet" type="text/css" href="CSS/checkbuy.css">

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
			<?php
        		if(!isset($_SESSION['uname'])){
        		echo "<script>alert('请先登录');window.location='index.php';</script>";
				}else{
			?>
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
   		<?php
		$na=$_SESSION['uname'];
		$info=mysqli_query($connID,"select * from tb_php2user where name='$na'");
		$resultinfo=mysqli_fetch_array($info);
		$tel=$resultinfo['tel'];
		$addr=$resultinfo['address'];
		$gid=$_GET['id'];
		if(isset($_GET['s'])){
			$s=$_GET['s'];}
		?>
		
       		<div class="usertitle">电子票</div>
       		<div class="usertitleblank"></div>
    	<form name="infomation" action="producebuy.php?id=<?php echo $gid?>&seat=<?php echo $s;?>" method="post">
    	<div class="user"><span>收货人:</span>
    		<input type="text" name="name" class="userinput" required>
    	</div>
    	<div class="user"><span>手<w>手</w>机:</span>
    		<input type="text" name="tel" value="<?php echo $tel;?>" class="userinput"  required>
   		</div>
 		<div class="user"><span>地<w>第</w>址</span>
        	<input type="text" name="useraddress" value="<?php echo $addr;?>" class="userinput" required>
        
        </div>
    	<div class="goods"><span style="padding-left:30px;">取货说明</span>
    		<div class="good" style="background:#FFF;">
    			<table cellpadding="0" cellspacing="0">
        			<tr>
            			<td style="font-weight:bold;">演唱会门票</td>
              		  <td style="font-weight:bold;">明星周边/书籍</td>
          			</tr>
    				<tr>
            			<td class="td1">
                			<p>取票时间：演出开场前1小时</p>
                  		  <p>取票地点：演出场馆（详细地址以接受短信为准）</p>
                 		   <p>取票说明：凭手机短信取票码取票</p>
                 			<p>客服热线：400-333-2222</p>   
                		 </td>    
            			 <td class="td1">
                			<p>取货时间：以快递到达指定地点短信收到的时间为准</p>
                		    <p>取票地点：详细地址以接受短信为准</p>
                		    <p>取票说明：凭手机短信取票码取票</p>
               			  	<p>客服热线：400-333-2222</p>   
              			 </td>    
            
        			</tr>
             </table>
    		 </div>
    	</div>
    	<div class="checkb">
    		<input type="checkbox" name="ch" required>我同意《第三方商品平台交易协议》
   		</div>
  		  	<input type="submit" name="submitbuy" value="立即支付(￥<?php echo $_GET['price'];?>)" class="pay">
   		 	<input type="hidden" name="id" value="<?php echo $id;?>">
   		</form>
   		</div>
    
    
   		<?php			
		$id=$_GET['id'];
		$sql="select * from tb_php2recommend where id=$id";
		$result=mysqli_query($connID,$sql);
		$row=mysqli_fetch_array($result);
		if($row){
			do{
		?>
		
        <div id="right">
    		<div class="rpic"><img src="<?php echo $row['picture'];?>" width="200px" height="280px"></div>
            <div class="rpictitle"><?php echo $row['title'];?></div>
            <div class="rpictitle" style="font-size:16px; color:#CCC;">本商品由L‘s购票商城提供</div>		
            <?php 
				if($row['tip']=="演唱会"){
			?>
            	<div class="rcon">
            		<div class="rcondiv" ><span style="font-size:18px;">票面：</span><?php echo $_GET['price'];?></div>
            		<div class="rcondiv" ><span style="font-size:18px;">时间：</span><?php echo $row['time'];?></div>
                    <div class="rcondiv" ><span style="font-size:18px;">地点：</span><?php echo $row['place'];?></div>
               	 	<div class="rcondiv" ><span style="font-size:18px;">支付方式：</span>网上支付</div>
           	 	</div>
    		<?php
				}else{
			?>
           		 <div class="rcon">
            		<div class="rcondiv"><span>售价：</span><?php echo $_GET['price'];?></div>
            		<div class="rcondiv"><span>发货时间：<?php echo $row['time'];?></span></div>
                    <div class="rcondiv"><span>温馨提示：</span>节假日期间，快递拥堵，请多谅解。</div>
              	  	<div class="rcondiv"><span>支付方式：</span>网上支付</div>
          		 </div>
            
    		<?php
			
				}
			?>
    
  	 	</div>
        <?php 
			}while($row=mysqli_fetch_array($result));
        }
		?>
      	
        <div class="tips">
        <p>购物须知：</p>
       	<p>根据商品的火爆情况，可能会将您所选的物品快递上门，上门自取方式调整为相应的取货方式（已支付的快递费会根据相应情况退还），敬请谅解</p>
        </div>
        <div class="bottom">
        	<div class="block">
            	<a href="index.php" target="_blank"><img src="images/LUYI.jpg" width="270px;" height="80px;" style="margin-top:30px;"></a>
                
            </div>
        	<div class="block">
            	<p><span style="font-weight:bold;">帮助中心</span></p>
                预售演出<br>
                关于座位<br>
                配送方式<br>
                无货赔偿<br>
                订票提示<br>
            </div>
			<div class="block">
            	<p><span style="font-weight:bold;">关于我们</span></p>
                联系我们<br>
                大事记<br>
                问题反馈<br>
                隐私协议<br>
            </div>        	
			<div class="block">
            	<p><span style="font-weight:bold;">支付方式</span></p>
                支付宝<br>
                微信<br>
            </div>        	
			<div class="block">
            	<p><span style="font-weight:bold;">关注我们</span></p>
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