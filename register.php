<!doctype html> 
<html> 
<head> 
 <meta charset="UTF-8"> 
 <title>register</title> 
</head> 
<body> 
 <?php 
 session_start();//登录系统开启一个session内容 
 $username=$_REQUEST["username"];//获取html中的用户名（通过post请求） 
 $password=$_REQUEST["password"];//获取html中的密码（通过post请求） 
 
 $con=new mysqli("localhost","root","0418","user_info");//连接mysql 数据库，账户名root ，密码root 
 if ($con->connect_error) { 
 die('数据库连接失败'.$mysqli_error); 
 } 
 //mysqli_select_db("user_info",$con);//use user_info数据库； 
 $dbusername=""; 
 $dbpassword=""; 
 $sql="select*from user_info where username='$username';";
 $sq="insert into user_info(username,password,isdelete) values('$username','$password',0)";
 //$result=mysqli_query("select * from user_info where username ='$username';");//查出对应用户名的信息 
 $result=$con->query($sql);
 if($result->num_rows>0){
    ?>
    <script type="text/javascript"> 
 alert("user has exists"); 
 window.location.href="index.html"; 
 <?php
    
 }else{
   $result=$con->query($sq);
 }
 $con->close();
 ?>
 
 <script type="text/javascript"> 
 alert("注册成功"); 
 window.location.href="index.html"; 
 </script> 
 
</body> 
</html> 