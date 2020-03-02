<?php
	session_start();
	unset($_SESSION['uname']);
	//$_SESSION['uname']='';
	header("location:index.php")
?>