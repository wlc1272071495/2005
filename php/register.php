<?php
    @include_once("conn.php");

    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // 完成注册功能
    // 插入  用户名 密码 手机号 邮箱

    $insert = "insert into `userinfo`(user,pwd,phone,email) values('$user','$pwd','$phone','$email')";

    mysqli_query($conn,$insert);

    $rows = mysqli_affected_rows($conn);

    $obj = array();
    if($rows>0){
        $obj["status"] = true;
        $obj["msg"] = "注册成功";
    }else{
        $obj["status"] = false;
        $obj["msg"] = "注册失败";
        $obj["sql"] = $insert;
    }
    echo json_encode($obj);



?>