<?php
    @include_once("conn.php");

    $id = $_GET["id"];
    $ch = $_GET["ch"];
    $math = $_GET["math"];
    $eng = $_GET["eng"];

    $update = "update `grade` set chinese=$ch,math=$math,english=$eng where id = $id";

    mysqli_query($conn,$update);

    $rows = mysqli_affected_rows($conn);

    $obj = array(); 

    if($rows>0){
        $obj["status"] = true;
        $obj["msg"] = "更新成功";
    }else if($rows ==0 ){
        $obj["status"] = true;
        $obj["msg"] = "更新成功,数据未做修改";
    }else{
        $obj["status"] = false;
        $obj["msg"] = "更新失败";
        $obj["sql"] = $update;
    }

    echo json_encode($obj);

?>