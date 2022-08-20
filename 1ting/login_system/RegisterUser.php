<?php

$conn = include("connect.php");

//接收使用者輸入的帳號密碼
$registerUser = $_REQUEST["registerUser"];
$registerPass = $_REQUEST["registerPass"];


$check="SELECT * FROM user WHERE username='".$registerUser."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO user (username, password)
            VALUES('".$registerUser."','".$registerPass."')";
        
        if(mysqli_query($conn, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";//跳回首頁
        exit;
    }


$conn->close();

?>