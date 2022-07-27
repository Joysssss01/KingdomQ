<?php
 
include("config.php");
 
if(isset($_POST["newAccountUsername"])){
    $username = mysqli_real_escape_string($connection, $_POST["newAccountUsername"]);
    $password = mysqli_real_escape_string($connection, $_POST["newAccountPassword"]);
    //Check are they empty?
    if($username != "" && $password != ""){
        //Check is the username has not taken
        if(mysqli_num_rows(mysqli_query($connection, "SELECT * FROM unity_users WHERE username = '$username'")) == 0){
            mysqli_query($connection, "INSERT INTO unity_users (username, password) VALUES ('$username', '$password')");
            echo "註冊新帳號 : 使用者名稱" . $username . " 和密碼 : " . $password;
        }else{
            echo "名稱已被使用，請使用別的";
        }       
    }else{
        echo "請填入完整的名稱與密碼";
    }
}else if(isset($_POST["loginUsername"])){
    $username = mysqli_real_escape_string($connection, $_POST["loginUsername"]);
    $password = mysqli_real_escape_string($connection, $_POST["loginPassword"]);
    if($username != "" && $password != ""){
        //Check are entered username and password matched
        $sql = "SELECT * FROM unity_users WHERE username = '$username' AND password = '$password'";
        if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0){
            echo "登入成功!";
        }else{
            echo "登入失敗，使用者名稱或密碼有誤";
        }
    }else{
        echo "請填入完整的名稱與密碼";
    }
}else{
    echo "Unity Login Logout and Register";
}
 
?>