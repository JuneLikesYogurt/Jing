<?php
//error_reporting(E_ALL&~E_NOTICE); 
$conn=@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");
mysqli_select_db($conn,"wxjingjing");
mysqli_query($conn,"set names'utf8'");

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}
error_reporting(0);
?>