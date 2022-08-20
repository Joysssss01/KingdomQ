<?php
$conn = include("connect.php");
//127.0.0.1/Unity1257backend/login_system/Login.php?loginUser=Joysss&loginPass=joysssss95

//接收使用者輸入的帳號密碼
$loginUser = $_REQUEST["loginUser"];
$loginPass = $_REQUEST["loginPass"];

//檢查連線
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}//檢查 如果沒有連線就知道連線錯誤
echo "Connect Successfully<br><br>";

$sql = "SELECT password FROM user WHERE username = '" . $loginUser."'"; 

$result = $conn->query($sql); 
 
if($result->num_rows > 0){
  //output data of each row
  while($row = $result->fetch_assoc()){
   if($row["password"] == $loginPass){
     echo"Login Successfully";

     //儲存cookie
     setcookie("usercookie", $loginUser, time()+7200 ,'/', NULL);

   }
   else{
     echo "Error";
   }
  }
}else{
  echo "No Results";
}
$conn->close();

?>