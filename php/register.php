<?php
include("connect.php");
$conn=@mysqli_connect("localhost","root","123456","wxjingjing")or die("连接错误");
$sql="select * from user where username like '$_POST[username]'";
$sql1="use wxjingjing";
$sql2="insert into user (username,password)".
        "values('$_POST[username]','$_POST[password]')";
if (isset($_POST["submit"]))
{
    $username=empty($_POST['username'])?'':$_POST['username'];
    $password=empty($_POST['password'])?'':$_POST['password'];
    $repassword=empty($_POST['repassword'])?'':$_POST['repassword'];
  if($username == "" || $password == ""){
      echo "<script>alert('请输入用户名或密码'); location.href='register.php'</script>";
  }
  else if($password !=$repassword){
      echo "<script>alert('密码不一致'); location.href='register.php'</script>";
  }
  else{
    mysql_query($sql1);
    $query=mysql_query($sql); 
    $rows = mysql_num_rows($query);
    var_dump($rows); 
    if($rows > 0){ 
      echo "<script type='text/javascript'>alert('用户名已存在');location=location.href='register.php';</script>"; 
     }
    else{
      $array=mysql_query($sql2) /*or die(mysql_error())*/;
      if(!empty($array)){
        SESSION_start();
        $_SESSION['username']=$username;
       echo "<script>alert('注册成功');location.href='register.php'</script>";
        }
    }
    
  }

}

?>
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="../css/jingtop.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <!--  <script type="text/javascript">
    function submitRegister () {
      if(document.register.username.value.length == 0) {
        alert("请输入用户名!");
        return false;
      }
      if(document.register.password.value.length == 0) {
        alert("请输入密码!");
        return false;
      }
      String ps1 = document.getElementById('ps').value;
      String ps2 = document.getElementById('checkPassword').value;
      if(pd1 != pd2) {
        alert("两次密码不一致!");
        return false;
      }
      // return true;
      document.getElementById("register").submit();
    }
  </script> -->
<html lang="en">
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
        <form name="register" action="register.php" method="post">
            <div class="input">
                <img src="../picture/zhanghu.png">
                <input type="text" class="blank" name="username" value="" />
            </div>
            <div class="input">
                <img src="../picture/mima.png">
                <input type="password" class="blank" name="password" id="ps" />
            </div>
            <div class="input">
                <img src="../picture/again.png">
                <input type="password" class="blank" name="repassword" id="checkPS" />
            </div>

            <div id="regSub">
                <!-- <input type="button" value="提交" onclick="submitRegister()"> -->
                <input type="submit" value="REGISTER" class="submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>