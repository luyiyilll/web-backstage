<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
if(isset($_GET['username'])){
	$usname=$_GET['username'];
	$info="select * from tb_php2user where name='$usname'";
	$result=mysqli_query($connID,$info);
	$result1=mysqli_fetch_object($result);
	if($result1)
	echo "该昵称已被占用";
else{
	echo "✔";
	}
}
if(isset($_GET['usertel'])){
	$ustel=$_GET['usertel'];
	$info="select * from tb_php2user where tel=$ustel";
	$result=mysqli_query($connID,$info);
	$result1=mysqli_fetch_object($result);
	if($result1)
	echo "该号码已被占用";
else{
	echo "✔";
	}

}


?>