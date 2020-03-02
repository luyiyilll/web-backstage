<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
include("conn.php");
session_start();
$temp=$_SESSION['uname'];
if (isset($_POST['modifysubmit'])) {
	$name=$_POST['username'];
	$tel=$_POST['tel'];
	$pwd=$_POST['pwd'];
	$address=$_POST['address'];
	$sql="update tb_php2user set name='$name',pwd='$pwd',tel='$tel',address ='$address' where name='$temp'";
	$info=mysqli_query($connID,$sql);
	if($info){
		echo "<script>alert('修改成功！！！'); window.location='login.php';</script>";
	}else{
		echo "<script>alert('修改失败！！！'); window.location='modify.php';</script>";
	}
}
?>