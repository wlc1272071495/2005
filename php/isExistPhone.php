<?php
    @include_once("conn.php");



    $phone = $_GET["phone"];
    // 判断用户名是否存在
    // $phone = "a1231231";


    $search = "select * from `userinfo` where phone = '$phone'";

    $result =  mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $obj = array();
    if(!$item){
        $obj["status"] = true;
        $obj["msg"] = "可以使用的手机号";
    }else{
        $obj["status"] = false;
        $obj["msg"] = "该手机号已存在";
    }

    echo json_encode($obj);  // php的方法

        




?>