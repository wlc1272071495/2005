<?php
    @include_once("conn.php");

    // 账号  => 用户名 /手机号/邮箱
    $account = $_POST["account"];
    $pwd = $_POST["pwd"];

    // 假设 前端传入的账号 和密码  
    // $account = "a123123";
    // $pwd = 123123123;

    // 1. 前端用户输入的 账号,密码  和  数据库的账号和密码做对比
    // a.  前端用户输入的 账号,密码  已经有了
    // b.  数据库的账号和密码做对比  => 没有 => 查找  (根据前端传入的账号 找到该用户的数据)


    // 2. 根据前端传入的账号 找到该用户的数据 (账号唯一 => 单条数据查找)

    $search = "select * from `userinfo` where user = '$account' or phone='$account' or email = '$account'";

    $result =  mysqli_query($conn,$search);  // 得到结果对象

    $item = mysqli_fetch_assoc($result); // 每次只解析一条  如果存在返回关联数据  不存在返回false
    // print_r($item);

    $obj = array();
    if($item){  // 如果存在 =>  对比密码(真正的密码  和用户输入的密码)
        $realPwd = $item["pwd"];
        if($realPwd == $pwd){
            $obj["status"] = true; 
            $obj["user"] = $item["user"];   // 账号登录  返回当前登录的用户名
            $obj["msg"] = "登录成功"; 
        }else{
            $obj["status"] = false; 
            $obj["msg"] = "用户名或密码有误"; 
        }
    }else{  //不存在    
        $obj["status"] = false; 
        $obj["msg"] = "该用户不存在"; 
    }

    echo json_encode($obj);






?>