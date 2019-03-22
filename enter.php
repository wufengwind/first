<!doctype html> 
<html> 
<head> 
 <meta charset="UTF-8"> 
 <title>log in</title> 
</head> 
<body> 
 <?php 
 session_start();//登录系统开启一个session内容 
 $username=$_REQUEST["username"];//获取html中的用户名（通过post请求） 
 $password=$_REQUEST["password"];//获取html中的密码（通过post请求） 
 
 $con=new mysqli("localhost","root","0418","user_info");//连接mysql 数据库，账户名root ，密码root 
 if ($con->connect_error) { 
 die('Connect database failed'.$mysqli_error); 
 } 
 //mysqli_select_db("user_info",$con);//use user_info数据库； 
 $dbusername=""; 
 $dbpassword=""; 
 $sql="select*from user_info where username='$username';";
 //$result=mysqli_query("select * from user_info where username ='$username';");//查出对应用户名的信息 
 $result=$con->query($sql);
 if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $dbusername=$row["username"];
        $dbpassword=$row["password"];
    }
 }else{
   ?>  
   <script type="text/javascript"> 
 alert("The username doesn't exist"); 
 window.location.href="index.html"; 
 </script> 
 <?php
 }
 if($password==$dbpassword){
   ?>
   <script type="text/javascript"> 
 window.location.href="welcome.php"; 
 </script> 
 <?php

 }else{
     ?>
     <script type="text/javascript"> 
 alert("password error!"); 
 window.location.href="index.html"; 
 </script> 
 <?php
 }
$con->close(); 
 ?>
 

</body> 
</html> 