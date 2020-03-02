  <?php 
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
  	//error_reporting(0);//禁用错误报告 
	session_start();
	 if(isset($_POST['submit'])){
		$username=$_POST['username'];
	 	$password=md5($_POST['pwd']);
	 
	 	//var_dump($_POST);
	 	$sql=mysqli_query($connID,"select * from tb_php2user where name='$username'");
	 	$result=mysqli_fetch_array($sql);
	 	if($result){
				  $_SESSION['uname']=$result['name'];

			echo "<script> alert('登录成功');window.location='index.php'</script>";
		}
	 	else{
			echo "<script> alert('登录失败');window.location='login.php';</script>";
		}
	 }else if(isset($_POST['submit1'])){
		 echo "<script>window.location='registion.php';</script>";
		 
		 } 
	 ?>
	