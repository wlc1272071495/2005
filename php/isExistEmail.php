<?php
    @include_once("conn.php");



    $email = $_GET["email"];
    // 判断用户名是否存在
    // $email = "a1231231";

    $search = "select * from `userinfo` where email = '$email'";

    $result =  mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $obj = array();
    if(!$item){
        $obj["status"] = true;
        $obj["msg"] = "可以使用的邮箱";
    }else{
        $obj["status"] = false;
        $obj["msg"] = "该邮箱已存在";
    }

    echo json_encode($obj);  // php的方法

        




?>