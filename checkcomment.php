<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	session_start();
	if(isset($_SESSION['uname'])){
	if(isset($_POST['submitword'])){
		$username=$_SESSION['uname'];
		$head1=$_POST['p'];
		$content=$_POST['coms'];
		$time=date('Y-m-d H:i:s');
		$goodid=$_POST['hid'];
		$type=$_POST['htype'];
		$sql=mysqli_query($connID,"insert into tb_php2comment(head,createtime,goodid,comsword,uname) values('$head1','$time','$goodid','$content','$username')");
			//	var_dump($sql);
				if($sql){
					//echo "<script>alert('评论成功');window.location='indexsearch.php?goodsid=$goodid&type=$type';</script>";
					}else{
					echo "<script>alert('评论失败');window.location='indexsearch.php?goodsid=$goodid&type=$type'</script>";
						}
	}		
	}else{
		echo "<script>alert('请先登录');window.location='index.php';</script>";
		}

?>