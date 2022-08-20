<?php
$conn = include("../login_system/connect.php");
//127.0.0.1/Unity1257backend/Pets/getUserName.php

$usercookie=$_COOKIE["usercookie"];

if($usercookie != NULL){
        //Check connection
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $sql= "SELECT username From user where username='".$usercookie."'";
   
    $result = $conn ->query($sql);

    //取得使用者名稱
    if($result->num_rows >0){
        while($row = $result -> fetch_assoc()){
            echo $row["username"]."<br>";
        }
    }else{
        echo "No Results";
        die();
    }
}



$conn->close();


?>