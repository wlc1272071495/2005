<?php
    @include_once("conn.php");



    $user = $_GET["user"];
    // 判断用户名是否存在
    // $user = "a1231231";


    $search = "select * from `userinfo` where user = '$user'";

    $result =  mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $obj = array();
    if(!$item){
        $obj["status"] = true;
        $obj["msg"] = "可以使用的用户名";
    }else{
        $obj["status"] = false;
        $obj["msg"] = "该用户名已存在";
    }

    echo json_encode($obj);  // php的方法

        




?>