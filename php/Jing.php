<?php
include("connect.php");
$conn=@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");

  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jing</title>
	<link rel="stylesheet" type="text/css" href="../css/jingtop.css">
	<link rel="stylesheet" type="text/css" href="../css/Jing.css">
	<script type="text/javascript">
		window.onload = function () {
			setInterval(function () {
				//创建Date对象
			    var today = new Date();
			    var hours = today.getHours();
			    var minutes = today.getMinutes();
			    var seconds = today.getSeconds();
			    //如果是单个数，则前面补0
			    hours = hours < 10 ? "0" + hours : hours;
			    minutes = minutes < 10 ? "0" + minutes : minutes;
			    seconds = seconds < 10 ? "0" + seconds : seconds;

			    //构建要输出的字符串
			    var str = hours + " : " + minutes + " : " + seconds;

			    //获取id=result的对象
			    var obj = document.getElementById("now");
			    //将str的内容写入到id=result的<div>中去
			    obj.innerHTML = str;
			})
		}
	</script>
</head>
<body>
	<div id="header">
		<div id="control">
			<a href="achieve.html">account</a>
		</div>
	</div>
	<div class="slogan">
		<span>Be happy for this moment. This moment is your life.</span>
	</div>
	<div id="now"></div>
	<div id="start">
		<a href="select.html">START</a>
	</div>
</body>
</html>