<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	session_start();
	$goodid=$_GET['id'];
	$trname=$_POST['name'];
	$usertel=$_POST['tel'];
	$useraddr=$_POST['useraddress'];
	$uname=$_SESSION['uname'];
	$createtime=date("Y-m-d H:i:m");
	$seatid=$_GET['seat'];
	//var_dump($_POST);
	$result=mysqli_query($connID,"select * from tb_php2recommend where id=$goodid");
	if (!$result) {
	echo "<script> alert('页面出错');</script>";	
	}else{
	$row=mysqli_fetch_array($result);
	//var_dump($row);
	$sql2=mysqli_query($connID,"insert into tb_php2userbuy(name,recname,tel,title,adress,datetime,pic) values('$uname','$trname','$usertel','$row[title]','$useraddr','$createtime','$row[picture]')");
	
	$num=1;
	$seatsql=mysqli_query($connID,"update tb_php2seat set seatbool='$num' where goodid='$goodid' and seatid='$seatid'");
	if($seatsql){
		}
	//var_dump($sql2);
	if($sql2){
		echo "<script>alert('下单成功！！！');</script>";
		$sql3="select * from tb_php2userbuy ";
		$result3=mysqli_query($connID,$sql3);
		if($result3){
		$row3=mysqli_fetch_array($result3);
		$usernameor=$row3['name'];
		}
		echo "<script> window.location='userorder.php?name=$usernameor&page=1';</script>";
		}
	}
	
?>