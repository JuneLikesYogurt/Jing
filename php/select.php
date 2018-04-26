<?php
include("connect.php");
$conn=@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");
session_start();
$sql="use wxjingjing";
// $sql1="select uid from user where username like '$_SESSION[username]'";
$sql2="insert into data(time,type,uid)".
        "values('$_POST[howLong]','$_POST[selectModel]',(select uid from user where username like '$_SESSION[username]'))";
if(isset($_POST["submit"]))
{
	$username=$_SESSION['username'];
	$time=$_POST["howLong"];
	$type=$_POST["selectModel"];
	$query=mysql_query($sql);
	//$query1=mysql_query($sql1);
	// $row=mysql_fetch_array($query1);
	// $uid=$row['uid'];
    $query2=mysql_query($sql2);
    if($_POST["selectModel"]=='sit')
    {
        header("Location:sitting.php");
    }else if($_POST["selectModel"]=='grow')
    {
        header("Location:tree.php");
    }else if($_POST["selectModel"]=='breed')
    {
        header("Location:live.php");
    }
    
    // var_dump($sql2);
    // var_dump($uid);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>select</title>
    <link rel="stylesheet" type="text/css" href="../css/jingtop.css">
    <link rel="stylesheet" type="text/css" href="../css/select.css">
</head>
<body>
    <div id="header">
        <div id="control">
            <a href="account.php">account</a>
        </div>
    </div>
    <div class="slogan">
        <span>Be happy for this moment. This moment is your life.</span>
    </div>
    <div class="center">
        <form action="select.php" method="post" name="myform">
            <div class="modelSelect">
                <label>CHOOSE：</label>
                <select name="selectModel">
                    <option value="sit" selected="selected" name="sit">SITTING</option>
                    <option value="breed" name="breed">LIVE</option>
                    <option value="grow" name="grow">TREE</option>
                </select>
            </div>
            <div class="modelSelect">
                <label>LASTING：</label>
                <input type="number" name="howLong" min="10" max="120" value="25">    
            </div>
            <div class="modelSelect">
                <input type="submit" name="submit" value="CONFIRM" id="confirm">                
            </div>
        </form>
        
    </div>
    
</body>
</html>