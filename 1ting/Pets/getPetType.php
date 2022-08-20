<?php
$conn = include("../login_system/connect.php");
//127.0.0.1/Unity1257backend/Pets/GetPetType.php

$usercookie=$_COOKIE["usercookie"];

//寵物種類json格式
$petType = array(
    "type"=>array(
        array(
            "petId" => 1,
            "petOriName" => "pink",
        ),
        array(
            "petId" => 2,
            "petOriName" => "yellow",
        ),
        array(
            "petId" => 5,
            "petOriName" => "blue",
        ),
        array(
            "petId" => 7,
            "petOriName" => "purple",
        )
    )
);
$jsonString =  json_encode( $petType );

if($usercookie != NULL){
        //Check connection
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $sql= "SELECT petId from userspets where username='".$usercookie."'";

    $result = $conn ->query($sql);


    //取得寵物種類
    if($result->num_rows >0){
        while($row = $result -> fetch_assoc()){
            if ($row["petId"]==1){
                $petType = json_decode( $jsonString );
                echo $petType->type[0]->petOriName. "<br />";
            }
            elseif ($row["petId"]==2){
                $petType = json_decode( $jsonString );
                echo $petType->type[1]->petOriName. "<br />";
            }
            elseif ($row["petId"]==5){
                $petType = json_decode( $jsonString );
                echo $petType->type[2]->petOriName. "<br />";
            }
            elseif ($row["petId"]==7){
                $petType = json_decode( $jsonString );
                echo $petType->type[3]->petOriName. "<br />";
            }
        }
    }else{
        echo "No Results";
        die();
    }

}

$conn->close();

?>