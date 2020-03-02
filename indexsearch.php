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
<title>商品详情</title>
<link rel="stylesheet" type="text/css" href="CSS/indexsearch.css">
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
   	<?php 
		 if(isset($_POST['submit'])){	
			//echo $_POST['svalue'];
			$keyword=$_POST['svalue'];
			}else
				//else{
					//echo $_GET['id'];
					//}
		if(isset($_GET['goodsid'])){
				$keyword=$_GET['goodsid'];
			}
		if($keyword!=""){
			$sql=mysqli_query($connID,"select * from tb_php2recommend where title like '%".$keyword."%' or id='$keyword'");
			//var_dump($sql);
			$result=mysqli_fetch_array($sql);
			$postid=$result['id'];
			//echo $postid;
			$posttype=$result['tip'];
			
			if($posttype=="演唱会"){

	?>
    <div id="content">
    <div id="keyword">
    	<div class="ktitle"><?php $content=$result['title']; $contents=str_replace('\n','<br>',$content); echo $contents;?></div>
        <div class="kpic">
        <img src="<?php echo $result['picture'];?>" width="300px" height="400px;">
        </div>
      <div class="kmessage">
        	<div class="kmessagetitle"><?php echo $result['title'];?></div>
        	<div class="kmdiv"><?php echo $result['time'];echo "&nbsp;&nbsp;&nbsp;&nbsp;"; echo $result['place'];?></div>
   	    <div class="kmdiv">艺人：<?php echo $result['name'];?></div>
            
       <!--座位-->
        <map name="Map">
			<area shape="rect" coords="67,87,86,107" href="3.php?id=<?php echo $result['id'];?>&seat=1-1">
            <area shape="rect" coords="94,91,110,107" href="3.php?id=<?php echo $result['id'];?>&seat=1-2">
			<area shape="rect" coords="115,89,135,107" href="3.php?id=<?php echo $result['id'];?>&seat=1-3">
			<area shape="rect" coords="141,89,162,106" href="3.php?id=<?php echo $result['id'];?>&seat=1-4">
			<area shape="rect" coords="66,110,84,128" href="3.php?id=<?php echo $result['id'];?>&seat=2-1">
			<area shape="rect" coords="91,109,110,129" href="3.php?id=<?php echo $result['id'];?>&seat=2-2">
			<area shape="rect" coords="115,110,134,130" href="3.php?id=<?php echo $result['id'];?>&seat=2-3">
			<area shape="rect" coords="142,111,161,131" href="3.php?id=<?php echo $result['id'];?>&seat=2-4">
			<area shape="rect" coords="67,134,86,154" href="3.php?id=<?php echo $result['id'];?>&seat=3-1">
			<area shape="rect" coords="92,133,111,153" href="3.php?id=<?php echo $result['id'];?>&seat=3-2">
			<area shape="rect" coords="116,134,135,154" href="3.php?id=<?php echo $result['id'];?>&seat=3-3">
			<area shape="rect" coords="141,135,160,155" href="3.php?id=<?php echo $result['id'];?>&seat=3-4">
			<area shape="rect" coords="195,87,214,107" href="3.php?id=<?php echo $result['id'];?>&seat=1-5">
			<area shape="rect" coords="220,86,239,106" href="3.php?id=<?php echo $result['id'];?>&seat=1-6">
			<area shape="rect" coords="245,86,264,106" href="3.php?id=<?php echo $result['id'];?>&seat=1-7">
			<area shape="rect" coords="272,84,291,104" href="3.php?id=<?php echo $result['id'];?>&seat=1-8">
			<area shape="rect" coords="194,107,213,127" href="3.php?id=<?php echo $result['id'];?>&seat=2-5">
			<area shape="rect" coords="219,107,238,127" href="3.php?id=<?php echo $result['id'];?>&seat=2-6">
			<area shape="rect" coords="246,108,265,128" href="3.php?id=<?php echo $result['id'];?>&seat=2-7">
			<area shape="rect" coords="272,107,291,127" href="3.php?id=<?php echo $result['id'];?>&seat=2-8">
			<area shape="rect" coords="195,132,214,152" href="3.php?id=<?php echo $result['id'];?>&seat=3-5">
			<area shape="rect" coords="222,131,241,151" href="3.php?id=<?php echo $result['id'];?>&seat=3-6">
			<area shape="rect" coords="250,132,268,148" href="3.php?id=<?php echo $result['id'];?>&seat=3-5">
			<area shape="rect" coords="276,132,294,147" href="3.php?id=<?php echo $result['id'];?>&seat=3-6">
            
			<area shape="rect" coords="14,174,33,193" href="3.php?id=<?php echo $result['id'];?>&seat=4-1">
            <area shape="rect" coords="43,175,64,194" href="3.php?id=<?php echo $result['id'];?>&seat=4-2">
			<area shape="rect" coords="69,172,93,192" href="3.php?id=<?php echo $result['id'];?>&seat=4-3">
			<area shape="rect" coords="12,196,38,214" href="3.php?id=<?php echo $result['id'];?>&seat=5-1">
			<area shape="rect" coords="42,198,65,216" href="3.php?id=<?php echo $result['id'];?>&seat=5-2">
			<area shape="rect" coords="71,197,95,216" href="3.php?id=<?php echo $result['id'];?>&seat=5-3">
			<area shape="rect" coords="11,217,32,239" href="3.php?id=<?php echo $result['id'];?>&seat=6-1">
			<area shape="rect" coords="39,221,64,238" href="3.php?id=<?php echo $result['id'];?>&seat=6-2">
			<area shape="rect" coords="72,220,91,240" href="3.php?id=<?php echo $result['id'];?>&seat=6-3">
			<area shape="rect" coords="112,169,139,189" href="3.php?id=<?php echo $result['id'];?>&seat=4-4">
			<area shape="rect" coords="143,168,169,186" href="3.php?id=<?php echo $result['id'];?>&seat=4-5">
			<area shape="rect" coords="179,170,201,187" href="3.php?id=<?php echo $result['id'];?>&seat=4-6">
			<area shape="rect" coords="210,168,239,187" href="3.php?id=<?php echo $result['id'];?>&seat=4-7">
			<area shape="rect" coords="115,193,143,212" href="3.php?id=<?php echo $result['id'];?>&seat=5-4">
			<area shape="rect" coords="151,192,175,211" href="3.php?id=<?php echo $result['id'];?>&seat=5-5">
			<area shape="rect" coords="180,191,204,211" href="3.php?id=<?php echo $result['id'];?>&seat=5-6">
			<area shape="rect" coords="208,192,233,214" href="3.php?id=<?php echo $result['id'];?>&seat=5-7">
			<area shape="rect" coords="113,216,141,235" href="3.php?id=<?php echo $result['id'];?>&seat=6-4">
			<area shape="rect" coords="150,219,170,237" href="3.php?id=<?php echo $result['id'];?>&seat=6-5">
			<area shape="rect" coords="181,217,206,236" href="3.php?id=<?php echo $result['id'];?>&seat=6-6">
			<area shape="rect" coords="211,217,240,235" href="3.php?id=<?php echo $result['id'];?>&seat=6-7">
			<area shape="rect" coords="272,174,292,190" href="3.php?id=<?php echo $result['id'];?>&seat=4-8">
			<area shape="rect" coords="296,174,320,188" href="3.php?id=<?php echo $result['id'];?>&seat=4-9">
			<area shape="rect" coords="324,171,349,189" href="3.php?id=<?php echo $result['id'];?>&seat=4-10">
            <area shape="rect" coords="273,195,294,209" href="3.php?id=<?php echo $result['id'];?>&seat=5-8">
			<area shape="rect" coords="295,193,320,207" href="3.php?id=<?php echo $result['id'];?>&seat=5-9">
			<area shape="rect" coords="323,192,349,209" href="3.php?id=<?php echo $result['id'];?>&seat=5-10">
			<area shape="rect" coords="271,215,291,231" href="3.php?id=<?php echo $result['id'];?>&seat=6-8">
			<area shape="rect" coords="297,211,319,234" href="3.php?id=<?php echo $result['id'];?>&seat=6-9">
			<area shape="rect" coords="325,215,345,231" href="3.php?id=<?php echo $result['id'];?>&seat=6-10">
            
			<area shape="rect" coords="13,251,40,267" href="3.php?id=<?php echo $result['id'];?>&seat=7-1">
			<area shape="rect" coords="49,250,72,267" href="3.php?id=<?php echo $result['id'];?>&seat=7-2">
			<area shape="rect" coords="82,252,107,268" href="3.php?id=<?php echo $result['id'];?>&seat=7-3">
			<area shape="rect" coords="116,250,146,272" href="3.php?id=<?php echo $result['id'];?>&seat=7-4">
			<area shape="rect" coords="159,251,187,270" href="3.php?id=<?php echo $result['id'];?>&seat=7-5">
			<area shape="rect" coords="199,252,228,270" href="3.php?id=<?php echo $result['id'];?>&seat=7-6">
			<area shape="rect" coords="243,256,270,271" href="3.php?id=<?php echo $result['id'];?>&seat=7-7">
			<area shape="rect" coords="281,255,315,272" href="3.php?id=<?php echo $result['id'];?>&seat=7-8">
			<area shape="rect" coords="322,252,350,267" href="3.php?id=<?php echo $result['id'];?>&seat=7-9">
			<area shape="rect" coords="13,272,41,289" href="3.php?id=<?php echo $result['id'];?>&seat=8-1">
			<area shape="rect" coords="50,271,72,289" href="3.php?id=<?php echo $result['id'];?>&seat=8-2">
			<area shape="rect" coords="81,271,110,291" href="3.php?id=<?php echo $result['id'];?>&seat=8-3">
			<area shape="rect" coords="117,274,150,290" href="3.php?id=<?php echo $result['id'];?>&seat=8-4">
			<area shape="rect" coords="156,272,188,289" href="3.php?id=<?php echo $result['id'];?>&seat=8-5">
			<area shape="rect" coords="196,275,227,288" href="3.php?id=<?php echo $result['id'];?>&seat=8-6">
			<area shape="rect" coords="239,274,273,287" href="3.php?id=<?php echo $result['id'];?>&seat=8-7">
			<area shape="rect" coords="284,276,315,291" href="3.php?id=<?php echo $result['id'];?>&seat=8-8">
			<area shape="rect" coords="323,276,349,292" href="3.php?id=<?php echo $result['id'];?>&seat=8-9">

        </map>
		<div id="div">
			<img src="images/seat.png" width="460px" height="300px" usemap="#Map">
		</div>
      </div>
    
    </div>
   
    <div id="leaveword">
    	<ul id="ul">
        	<li>☃</li>
       		<li>➷</li>
        	<li>✉</li>
      	</ul>
    	<div id="change">
        <div class="tab" style="display:block;">
     		<h3 style="text-align:center;">Personal information</h3>
      		<p style="text-align:center; margin-top:40px;"><img src="<?php echo $result['photo'];?>" width="950px" height="520px;"></p>
            <p style="color:#666; padding:20px 100px;"><?php $conts=$result['person'];$cont=str_replace('\n','<br>',$conts); echo $cont;?></p>
      		</div>
        <div class="tab">
     		<h3 style="text-align:center;">Performance introduction</h3>
      		<p style="font-size:18px; text-align:center; padding:20px 100px; color:#666; margin-bottom:100px;">
      		<?php $contin=$result['information'];$conts=str_replace('\n','<br>',$contin); echo $conts;?>
      		</p>
            <p style="text-align:center;">网上订票流程</p>
            <p style="text-align:center;">
            <img src="images/pro.png" width="900" height="213">
            </p>
      	</div>
      	<div class="tab" >
      		<h3 style="text-align:center;">Leave Your Word Here</h3>
      		<p>
            <form action="checkcomment.php" method="post" name="comment">
            <p style="text-align:center;">Name</p>
            <p style="text-align:center">
            
			<label class="b">
           	<input name="p"  type="radio" value="images/1.jpg" checked>
           	<img src="images/1.jpg" width="45px" height="45px"> 
            </label>
            
       		<label class="b" >
         	<input name="p"  type="radio" value="images/2.jpg" >
          	<img src="images/2.jpg" width="45px" height="45px"> 
            </label>
            
      		<label class="b">
        	<input name="p" type="radio" value="images/3.jpg" >
          	<img src="images/3.jpg" width="45px" height="45px"> 
            </label>
     
        	<label class="b">
          	<input name="p" type="radio" value="images/4.jpg" >
          	<img src="images/4.jpg" width="45px" height="45px"> 
            </label>
          
        	<label class="b">
          	<input name="p" type="radio" value="images/5.jpg" >
          	<img src="images/5.jpg" width="45px" height="45px"> 
            </label>
            </p>  
            <p style="text-align:center;"><textarea name="coms" class="comsword"></textarea></p>
            <input type="hidden" name="hid" value="<?php echo $postid;?>">
            <input type="hidden" name="htype" value="<?php echo $posttype;?>">
            <p style="text-align:center;"><input type="submit" name="submitword" value="提交" class="sub"></p>
            </form>
            </p>
                <?php
				$typeid=$result['id'];
				$sql=mysqli_query($connID,"select * from tb_php2comment where goodid='$typeid' order by id desc limit 0,3");
		//var_dump($sql);
			  	$re=mysqli_fetch_array($sql);
				if($re==false){
				?>
                
					<p style="text-align:center; margin-top:50px;">暂无评论</p>
                <?php
					}else{
						do{
				?>
      			  <p class="showcomment">
                  <table border="1px" cellpadding="0" cellspacing="0">
                  <tr>
        			<td style="width:240px;"><img src="<?php echo $re['head'];?>" width="80px" height="80px;"></td>
                    <td style="text-align:left; "><?php echo $re['comsword'];?></td>
        		  </tr>
                  <tr>
                  <td><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "❀";}?></td>
                  <td></td>
                  </tr>
                  <tr>
                  <td style="width:200px; color:#ccc;"><?php echo $re['createtime'];?></td>
                  <td class="like" style="text-align:right;">&#10084;</td>

                  </tr>
        		  </table>
       			 </p>
        		<?php
					}while($re=mysqli_fetch_array($sql));
				}

				?>
      		</div>
		</div>
        
    </div>
    
    </div>
    <div id="likes">
    <h3 style="text-align:center; border-bottom:1px solid #ccc; margin-bottom:20px; padding-bottom:20px;">猜你喜欢</h3>
    
    <?php
		$oldtitle=$result['title'];
		$likeresult=mysqli_query($connID,"select * from tb_php2recommend where title like '%".$posttype."%' and title!='$oldtitle' order by id desc limit 0,4");
		$like=mysqli_fetch_array($likeresult);
		if($like)
			do{
    ?>
     <div class="likepic"><img src="<?php echo $like['picture'];?>" width="170px" height="240px;"></div>
    <div class="likeother">
	<p><?php echo $like['title'];?></p>
    <p><?php echo $like['time'];?> </p>
    <p style="font-size:23px; font-weight:bold; color:#c66;">￥<?php echo $like['price'];?></p>
    </div>
    <?php
	
			}while($like=mysqli_fetch_array($likeresult));
	?>
    </div>
    
    <?php
		}else if($posttype=="明星周边"){

	?>
    <div id="content">
    <div id="keyword">
   
    	<div class="ktitle"><?php $content=$result['title']; $contents=str_replace('\n','<br>',$content); echo $contents;?></div>
        <div class="kpic">
        <img src="<?php echo $result['picture'];?>" width="300px" height="400px;">
        </div>
        <div class="kmessage">
        	<div class="kmessagetitle"><?php echo $result['title'];?></div>
        	<div class="kmdiv"><?php echo $result['time'];?></div>
        	<div class="kmdiv">商品名：<?php echo $result['name'];?></div>
            <div class="kmdiv">【预售说明】本节目尚在预售中，平台卖家将在节目主办方正式开售后第一时间为用户配货寄送。</div>
        	<form name="buy" method="post" action="checkbuy.php?id=<?php echo $result['id'];?>&price=<?php echo $result['price'];?>">
            <div class="kprice">售价：
            <button name="buyprice" type="button" value="23" class="pricebutton">23</button></div>
            <input type="submit" class="sub" value="提交">
            </form>
        </div>
    
    </div>
   
    <div id="leaveword">
    	<ul id="ul" style="padding-left:350px;">
        	<li>☃</li>
        	<li>✉</li>
      	</ul>
    	<div id="change">
        <div class="tab" style="display:block;">
     		<h3 style="text-align:center;">Introduction</h3>
      		<p style="text-align:center; margin-top:40px;"><img src="<?php echo $result['photo'];?>" width="950px" height="520px;"></p>
            <p style="color:#666; padding:20px 100px; text-align:center;"><?php $c=$result['information'];$co=str_replace('\n','<br>',$c); echo $co;?></p>
      		</div>
      		<div class="tab" >
      			<h3 style="text-align:center;">Leave Your Word Here</h3>
      
      			<p>
                <form action="checkcomment.php" method="post" name="comment">
                <p style="text-align:center;">Name</p>
                <p style="text-align:center">
				<label class="b">
           		<input name="p"  type="radio" value="images/1.jpg" checked>
           		<img src="images/1.jpg" width="45px" height="45px"> </label>
          
       			<label class="b" >
         		<input name="p"  type="radio" value="images/2.jpg" >
          		<img src="images/2.jpg" width="45px" height="45px"> </label>
          
        		<label class="b">
         		<input name="p" type="radio" value="images/3.jpg" >
          		<img src="images/3.jpg" width="45px" height="45px"> </label>
          
        		<label class="b">
          		<input name="p" type="radio" value="images/4.jpg" >
          		<img src="images/4.jpg" width="45px" height="45px"> </label>
          
        		<label class="b">
          		<input name="p" type="radio" value="images/5.jpg" >
          		<img src="images/5.jpg" width="45px" height="45px"> </label>
                </p>
                
                <p style="text-align:center;"><textarea name="coms" class="comsword"></textarea></p>
                <input type="hidden" name="hid" value="<?php echo $postid;?>">
                <input type="hidden" name="htype" value="<?php echo $posttype;?>">
                
                <p style="text-align:center;"><input type="submit" name="submitword" value="提交" class="sub"></p>
                </form>
                </p>
                <?php
				$typeid=$result['id'];
				$sql=mysqli_query($connID,"select * from tb_php2comment where goodid='$typeid' order by id desc limit 0,4");
		//var_dump($sql);
			  	$re=mysqli_fetch_array($sql);
				if($re==false){
				?>
                
					<p style="text-align:center; margin-top:50px;">暂无评论</p>
                <?php
					}else{
						do{
				?>
      			  <p class="showcomment">
                  <table border="1px" cellpadding="0" cellspacing="0">
                  <tr>
        			<td style="width:240px;"><img src="<?php echo $re['head'];?>" width="80px" height="80px;"></td>
                    <td style="text-align:left; "><?php echo $re['comsword'];?></td>
        		  </tr>
                  <tr>
                  <td><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "❀";}?></td>
                  <td></td>
                  </tr>
                  <tr>
                  <td style="width:200px; color:#ccc;"><?php echo $re['createtime'];?></td>
                  <td class="like" style="text-align:right;">&#10084;</td>

                  </tr>
        		  </table>
       			 </p>
        		<?php
					}while($re=mysqli_fetch_array($sql));
				}

				?>
      		</div>
		</div>
        
    </div>
    
    </div>
    <div id="likes">
    <h3 style="text-align:center; border-bottom:1px solid #ccc; margin-bottom:20px; padding-bottom:20px;">猜你喜欢</h3>
    
    <?php
		$oldtype=$result['tip'];
		$oldtitle=$result['title'];
		$likeresult=mysqli_query($connID,"select * from tb_php2recommend where tip like '%".$posttype."%' and title!='$oldtitle' order by id desc limit 0,4");
		$like=mysqli_fetch_array($likeresult);
		if($like)
			do{
    ?>
     <div class="likepic"><a href="indexsearch.php?goodsid=<?php echo $like['id'];?>&type=<?php echo $like['tip'];?>"><img src="<?php echo $like['picture'];?>" width="170px" height="240px;"></a></div>
    <div class="likeother">
	<p><a href="indexsearch.php?goodsid=<?php echo $like['id'];?>&type=<?php echo $like['tip'];?>" style="color:#000; text-decoration:none;"><?php echo $like['title'];?></a></p>
    <p><?php echo $like['time'];?> </p>
    <p style="font-size:23px; font-weight:bold; color:#c66;">￥<?php echo $like['price'];?></p>
    </div>
    <?php
	
			}while($like=mysqli_fetch_array($likeresult));
	?>
    </div>
    <?
		}
		}else{
				echo "搜索内容为空";
				}
	?>
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
    <div class="last"><p>重庆师范大学 计算机与信息科学学院</p><p>计算机科学与技术 卢漪 </p><p>联系方式：15923257515</p></div>
</div>
<script type="text/javascript">
    var lis = document.getElementById("ul").getElementsByTagName("li");
    var divs = document.getElementById("change").getElementsByTagName("div");
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
<script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js">					</script> 
<script>
        $(function () {            
            $(".like").click(function () {
                $(this).toggleClass('cs');                
            })
        })
</script>
  
</body>
</html>