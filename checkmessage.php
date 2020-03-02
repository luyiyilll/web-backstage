<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
if(isset($_SESSION['uname'])){
	$name=$_POST['name'];
	$pic=$_POST['p'];
	$sig=$_POST['signiture'];
	if(isset($_POST['sss'])){
		$sbool=$_POST['sss'];
	}else{
		$sbool=0;
	}
	$message=$_POST['word'];
	$now=date('Y-m-d H:i:s');
	$uname=$_SESSION['uname'];
	$sql=mysqli_query($connID,"insert into tb_php2message(name,picture,time,word,signiture,signiturebool,uname) values('$name','$pic','$now','$message','$sig','$sbool','$uname')");
	if($sql){
		echo "<script>window.location='messsage.php?page=1';</script>";
	}else{
		echo "插入失败";
		}
}else{
	echo "<script>alert('请先登录');window.location='index.php';</script>";
	}
?>