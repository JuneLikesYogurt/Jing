<?php
include("connect.php");
$conn=@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");
session_start();
mysql_select_db("wxjingjing");
$sql="use wxjingjing";
$sql1="select sum(time) from data where uid=(select uid from user where username like '$_SESSION[username]' and flag!=0)";
$query=mysql_query($sql);
$query1=mysql_query($sql1);
$row=mysql_fetch_array($query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>account</title>
	<link rel="stylesheet" type="text/css" href="../css/jingtop.css">
	<link rel="stylesheet" type="text/css" href="../css/account.css">
</head>
<body>
	<div id="header">
		<div id="control">
			<a href="start.php">start</a>
		</div>
	</div>
	<div class="slogan">
		<span>Be happy for this moment. This moment is your life.</span>
	</div>
	<div class="Account">
		<p class="name">Hello<strong> <?php echo $_SESSION['username']?> </strong>,</p>
		<p class="name">How is everything goning on?</p>
		<p id="totalTime">You are in silence <strong> <?php if(!empty($row['sum(time)']))
		echo $row['sum(time)']; else echo 0; ?> </strong>.</p>
		<p id="sentence">Persistence will enable us to succeed, and perseverance of the source is to do not waver in the least, we should take to achieve the necessary means to success.</p>
	</div>
	
</body>
</html>