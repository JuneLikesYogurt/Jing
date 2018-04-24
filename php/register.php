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
      echo "<script>alert('请输入用户名或密码'); exit();</script>";
  }
  else if($password !=$repassword){
      echo "<script>alert('密码不一致'); exit();</script>";
  }
  else{
    mysql_query($sql1);
    $query=mysql_query($sql); 
    $rows = mysql_num_rows($query);
    var_dump($rows); 
    if($rows > 0){ 
      echo "<script type='text/javascript'>alert('用户名已存在');location='javascript:history.back()';</script>"; 
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
<!-- <SCRIPT language=JavaScript>
   function Checklogin()
   {
    if (myform.username.value=="")
    {
     alert("请填写用户名");
     myform.username.focus();
     return false;
    }
     if (myform.password.value=="")
    {
     alert("密码不能为空");
     myform.password.focus();
     return false;
    }
    if (myform.password.value!=myform.repassword.value)
    {
     alert("密码不一致");
    myform.repassword.focus();
     return false;
   }
}
</SCRIPT> -->
<head>
  <meta charset="UTF-8">
  <title>register</title>
  <link rel="stylesheet" type="text/css" href="../css/jingtop.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <style type="text/css">
    .input{
      height: 80px;
    }
    .input input.blank{
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div id="header">
    <div id="control">
      <a href="achieve.html">account</a>
      <a href="#">setting</a>
    </div>
  </div>
  <div class="center">
  
  <form action="register.php" method="post" name="myform">
    <div class="input">
    <img src="../picture/zhanghu.png">
        <input type="text" class="blank" name="username" />
    </div>

    <div class="input">
    <img src="../picture/mima.png">
        <input type="password" class="blank" name="password"/>
    </div>
    <div class="input">
    <img src="../picture/again.png">
        <input type="password" class="blank" name="repassword"/>
    </div>
    <div id="logSub" style="margin-top: 100px;">
      <input type="submit" value="Register" class="submit" name="submit"> 
    </div>
    </form>
  
  </div>
</body>
</html>