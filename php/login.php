<?php
SESSION_start();
$con =@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");
if(isset($_POST['submit'])){
	$_SESSION['username']=$_POST['username'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	 //判断用户名密码不为空
	 if($username==''||$password==''){
	 	echo "<script>alert('用户名或密码不能为空');history.go(-1);</script>";
	 }
     
     else{
		$sql="select * from user where username='$username' and password='$password'";
		 //mysql_query() 函数执行一条 MySQL 查询
		$query=mysqli_query($con,$sql);
		$array=mysqli_fetch_array($query);//这一句里不能加$con
	   
		if(!empty($array)){
			if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
				echo "<script>alert('登录成功');location.href='Jing.php'</script>";
			}
		}
		else{
			echo"<script>alert('用户名或密码不正确');history.go(-1);</script>";
		}
     }
     
}
?>
<!-- <SCRIPT language=JavaScript>
function Checklogin()
{
 if (myform.user.value=="")
 {
  alert("请填写登录名");
  myform.user.focus();
  return false;
 }
  if (myform.password.value=="")
 {
  alert("密码不能为空");
  myform.password.focus();
  return false;
 }
}
</SCRIPT> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="../css/jingtop.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div id="header">
		<div id="control">
			<a href="achieve.php">account</a>
		</div>
	</div>
	<div class="slogan">
		<span>Be happy for this moment. This moment is your life.</span>
	</div>
	<div class="center">
		<form action="login.php" method="post" name="myform">
		<div class="input">
		<img src="../picture/zhanghu.png">
		    <input type="text" class="blank" name="username" value=""/>
		</div>
		<div class="input">
		<img src="../picture/mima.png">
		    <input type="password" class="blank" name="password"/>
		</div>
		
		<div id="logSub">
			<input type="submit" value="LOGIN" class="submit" name="submit">
			<input type="button" value="REGISTER" class="submit" onclick="window.location.href='register.php'">
		</div>
		</form>
	</div>	
</body>
</html>