<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	$goodid=$_GET['id'];
	if(isset($_POST['buyprice'])){
		$postprice=$_POST['buyprice'];
		}else{
			$postprice=-1;
			}
	$seatlocation=$_GET['seat'];
	//var_dump($seatlocation);
	$result=mysqli_query($connID,"select * from tb_php2seat where goodid='$goodid' and seatid='$seatlocation'");
	$row=mysqli_fetch_array($result);
	if($row){
		//var_dump($row);
		
		if($postprice==-1){
			$goodprice=$row['seatprice'];
		}else{
			$goodprice=$postprice;
			}
		//echo $goodprice;
		$seatlocation=$row['seatid'];
		if($row['seatbool']==1){
			echo "<script>alert('此座已售出');window.location='indexsearch.php?goodsid='+$goodid;</script>";
			}else{
				echo header("location:checkbuy.php?id=$goodid&price=$goodprice&s=$seatlocation");
				
			}
	}


?>