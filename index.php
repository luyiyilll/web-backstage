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
<title>L's购票商城</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<style>
.box{
	margin-top:30px;
	width: 1600px;
	height: 480px;
	border-bottom:1px solid #CCC;
}

.list{
	width: 1400px;
	height: 380px;
	overflow: hidden;
	position:relative;
	top:20px;
	left:50px;
}
li{
	position: absolute;
	top: 3px;
	left: 66px;
	list-style: none;
	opacity: 0;
	transition: all 0.3s ease-out;
}
.img{
	width: 860px;
	height: 380px;
	border:none;
	float: left;
}
.p1{
	transform:translate3d(-224px,0,0) scale(0.81);
}
.p2{
	transform:translate3d(0px,0,0) scale(0.81);
	transform-origin:0 50%;
	opacity: 0.8;
	z-index: 2;
}
.p3{
	transform:translate3d(224px,0,0) scale(1);
	z-index: 3;
	opacity: 1;
}
.p4{
	transform:translate3d(449px,0,0) scale(0.81);
	transform-origin:100% 50%;
	opacity: 0.8;
	z-index: 2;
}
.p5{
	transform:translate3d(672px,0,0) scale(0.81);
}
.p6{
	transform:translate3d(896px,0,0) scale(0.81);
}
.p7{
	transform:translate3d(1120px,0,0) scale(0.81);
}

.buttons{
	position: absolute;
	width: 1200px;
	height: 30px;
	top:650px;
	left: 47%;
	margin-left: -600px;
	text-align: center;
	padding-top: 10px;
}
.buttons a{
	display: inline-block;
	width: 35px;
	height: 5px;
	padding-top: 4px;
	cursor: pointer;
}
span{
	display: block;
	width: 35px;
	height: 1px;
	background: red;
}
.blue{
	background: blue;
}
</style>
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
    <!--导航-->
    <div class="navigation">
		<div class="but"><a href="#" style="font-weight:bold; font-size:23px;">&nbsp;首页&nbsp;</a></div>
		<div class="but"><a href="#sss">&nbsp;演唱会&nbsp;</a></div>
		<div class="but"><a href="#bbb">&nbsp;明星周边&nbsp;</a></div>
	</div>
    <!--图片轮番-->
    <div class="box">
		<div class="list">
			<ul>
				<li class="p7"><a href="#"><img src="img/1.jpg" alt="" class="img" /></a></li>
				<li class="p6"><a href="#"><img src="img/2.png" alt="" class="img" /></a></li>
				<li class="p5"><a href="#"><img src="img/3.png" alt="" class="img"/></a></li>
				<li class="p4"><a href="#"><img src="img/44.jpg" alt="" class="img"/></a></li>
				<li class="p3"><a href="#"><img src="img/55.jpg" alt="" class="img"/></a></li>
				<li class="p2"><a href="#"><img src="img/66.jpg" alt="" class="img"/></a></li>
				<li class="p1"><a href="#"><img src="img/77.jpg" alt="" class="img"/></a></li>
			</ul>
		</div>
		<!--<a href="javascript:;" class="prev btn"></a>-->
		<!--<a href="javascript:;" class="next btn"></a>-->
		<div class="buttons">
			<a href="javascript:;"><span class="blue"></span></a>
			<a href="javascript:;"><span></span></a>
			<a href="javascript:;"><span></span></a>
			<a href="javascript:;"><span></span></a>
			<a href="javascript:;"><span></span></a>
			<a href="javascript:;"><span></span></a>
			<a href="javascript:;"><span></span></a>
		</div>
	</div>
    
<!--<div id="#recomdation">-->
	<div class="retitle">本周推荐</div>
    <div id="ta1">
    	<?php
		$sql=mysqli_query($connID,"select * from tb_php2recommend order by time desc limit 0,3");
		//var_dump($sql);
			  $result=mysqli_fetch_array($sql);
			  if($result==false){
			   echo "暂无推荐商品!";
			  }
					  else{
						  do{
		?>
  			<div id="repic">
            <div class="reword"><a href="indexsearch.php?goodsid=<?php echo $result['id'];?>&type=<?php echo $result['tip'];?>" style="color:#000; text-decoration:none;" target="_blank"><?php $content=$result['title']; $contents=str_replace('\n','<br>',$content); echo $contents;?></a></div>
        		<div class="repic"><a href="indexsearch.php?goodsid=<?php echo $result['id'];?>&type=<?php echo $result['tip'];?>" target="_blank"><img src="<?php echo $result['picture'];?>" width="220px" height="320px" style="border-radius:5px;"></a></div>
                
               	<div class="price"><word>❀ </word>￥<?php echo $result['price']; ?></div>

        	</div>
        <?php
						  }while($result=mysqli_fetch_array($sql));
					  }
				
		?>
      
    
	</div>
    <div id="top">
    	<div id="toptitle">人气TOP 5</div>
        <div class="order">
        <?php
			$sql=mysqli_query($connID,"select * from tb_php2recommend order by id limit 0,5");
		$result=mysqli_fetch_array($sql);
		if($result){
			do{
				?>
        	<div id="toporder"><word>♫<?php echo $result['id'];?></word></div>
            <?php
			}while($result=mysqli_fetch_array($sql));
		}
		?>
        </div>
        <?php
		$sql=mysqli_query($connID,"select * from tb_php2recommend order by toplikes desc limit 0,5");
		$result=mysqli_fetch_array($sql);
		if($result){
			do{
				?>
         <div id="topcontent"><content><a href="indexsearch.php?goodsid=<?php echo $result['id'];?>" target="_blank"><?php echo $result['title'];echo "<br>";?></a></content><?php echo $result['time']?></div>
			<?php
            }while($result=mysqli_fetch_array($sql));
			}
			?>
    
    </div>
    <div id="sss" class="retitle2">
    	<div class="div1">演唱会</div>
        <div class="div2"><a href="more.php?type=演唱会">查看更多</a></div>
    </div>
    <div id="ta">
    	<?php
		$sing="演唱会";
		$sql=mysqli_query($connID,"select * from tb_php2recommend where title like '%".trim($sing)."%' limit 0,5");
		//var_dump($sql);
			  $result=mysqli_fetch_array($sql);
			  if($result==false){
			   echo "暂无演唱会...";
			  }
					  else{
						  do{
		?>
  			<div id="repic">
            	<div class="reword"><a href="indexsearch.php?goodsid=<?php echo $result['id'];?>&type=<?php echo $result['tip'];?>" style="color:#000; text-decoration:none;" target="_blank"><?php $content=$result['title']; $contents=str_replace('\n','<br>',$content); echo $contents;?></a></div>
        		<div class="repic"><a href="indexsearch.php?goodsid=<?php echo $result['title'];?>&type=<?php echo $result['tip'];?>" target="_blank"><img src="<?php echo $result['picture'];?>" width="240px" height="330px" style="border-radius:5px;"></a></div>
               	<div class="price"><word>➷ </word>￥<?php echo $result['price']; ?></div>

        	</div>
        <?php
						  }while($result=mysqli_fetch_array($sql));
					  }
				
		?>
	</div>
    <div id="bbb" class="retitle2">
    <div class="div1">明星周边</div>
    <div class="div2"><a href="more.php?type=明星周边">查看更多</a></div>
    </div>
    <div id="ta">
    	<?php
		
		$sql=mysqli_query($connID,"select * from tb_php2recommend where tip='明星周边' order by id desc limit 0,5");
		//var_dump($sql);
			  $result=mysqli_fetch_array($sql);
			  if($result==false){
			   echo "暂无周边!";
			  }
					  else{
						  do{
		?>
  			<div id="repic">
          	    <div class="reword"><a href="indexsearch.php?goodsid=<?php echo $result['title'];?>&type=<?php echo $result['tip'];?>" style="color:#000; text-decoration:none;" target="_blank"><?php $conts=$result['title'];$cont=str_replace('\n','<br>',$conts); echo $cont;?></a></div>
        		<div class="repic"><a href="indexsearch.php?goodsid=<?php echo $result['title'];?>&type=<?php echo $result['tip'];?>" target="_blank"><img src="<?php echo $result['picture'];?>" width="240px" height="360px" style="border-radius:5px;"></a></div>
                
               	<div class="price"><word>✿ </word>￥<?php echo $result['price']; ?></div>

        	</div>
        <?php
						  }while($result=mysqli_fetch_array($sql));
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
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
var $a=$(".buttons a");
var $s=$(".buttons span");
var cArr=["p7","p6","p5","p4","p3","p2","p1"];
var index=0;
/*$(".next").click(
	function(){
	nextimg();
	}
)
$(".prev").click(
	function(){
	previmg();
	}
)*/
//上一张
function previmg(){
	cArr.unshift(cArr[6]);
	cArr.pop();
	//i是元素的索引，从0开始
	//e为当前处理的元素
	//each循环，当前处理的元素移除所有的class，然后添加数组索引i的class
	$("li").each(function(i,e){
		$(e).removeClass().addClass(cArr[i]);
	})
	index--;
	if (index<0) {
		index=6;
	}
	show();
}

//下一张
function nextimg(){
	cArr.push(cArr[0]);
	cArr.shift();
	$("li").each(function(i,e){
		$(e).removeClass().addClass(cArr[i]);
	})
	index++;
	if (index>6) {
		index=0;
	}
	show();
}

//通过底下按钮点击切换
$a.each(function(){
	$(this).click(function(){
		var myindex=$(this).index();
		var b=myindex-index;
		if(b==0){
			return;
		}
		else if(b>0) {
			/*
			 * splice(0,b)的意思是从索引0开始,取出数量为b的数组
			 * 因为每次点击之后数组都被改变了,所以当前显示的这个照片的索引才是0
			 * 所以取出从索引0到b的数组,就是从原本的这个照片到需要点击的照片的数组
			 * 这时候原本的数组也将这部分数组进行移除了
			 * 再把移除的数组添加的原本的数组的后面
			 */
			var newarr=cArr.splice(0,b);
			cArr=$.merge(cArr,newarr);
			$("li").each(function(i,e){
			$(e).removeClass().addClass(cArr[i]);
			})
			index=myindex;
			show();
		}
		else if(b<0){
			/*
			 * 因为b<0,所以取数组的时候是倒序来取的,也就是说我们可以先把数组的顺序颠倒一下
			 * 而b现在是负值,所以取出索引0到-b即为需要取出的数组
			 * 也就是从原本的照片到需要点击的照片的数组
			 * 然后将原本的数组跟取出的数组进行拼接
			 * 再次倒序,使原本的倒序变为正序
			 */
			cArr.reverse();
			var oldarr=cArr.splice(0,-b)
			cArr=$.merge(cArr,oldarr);
			cArr.reverse();
			$("li").each(function(i,e){
			$(e).removeClass().addClass(cArr[i]);
			})
			index=myindex;
			show();
		}
	})
})

//改变底下按钮的背景色
function show(){
		$($s).eq(index).addClass("blue").parent().siblings().children().removeClass("blue");
}

//点击class为p2的元素触发上一张照片的函数
$(document).on("click",".p2",function(){
	previmg();
	return false;//返回一个false值，让a标签不跳转
});

//点击class为p4的元素触发下一张照片的函数
$(document).on("click",".p4",function(){
	nextimg();
	return false;
});

//			鼠标移入box时清除定时器
$(".box").mouseover(function(){
	clearInterval(timer);
})

//			鼠标移出box时开始定时器
$(".box").mouseleave(function(){
	timer=setInterval(nextimg,4000);
})

//			进入页面自动开始定时器
timer=setInterval(nextimg,4000);
</script>

<div style="text-align:center;clear:both">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>


</body>
</html>