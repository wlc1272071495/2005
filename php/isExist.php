<?php
    @include_once("conn.php");

    // $_GET["user"]      //接收user (必须传入user) 否则报错

    // isset($_GET["user"] );    是否接收 user  

    
    // echo isExist("user","a123123");
    // 判断用户名

    if(isset($_GET["user"])){
        $user = $_GET["user"];
        $obj = array();
        if(!isExist("user",$user)){
            $obj["status"] = true;
            $obj["msg"] = "可以使用的用户名";
        }else{
            $obj["status"] = false;
            $obj["msg"] = "该用户已存在";
        }
    
        echo json_encode($obj);
    }else if(isset($_GET["phone"])){
        // 判断手机号
        $phone = $_GET["phone"];
        $obj = array();
        if(!isExist("phone",$phone)){
            $obj["status"] = true;
            $obj["msg"] = "可以使用的手机号";
        }else{
            $obj["status"] = false;
            $obj["msg"] = "该的手机号已存在";
        }
        echo json_encode($obj);

    }else if(isset($_GET["email"])){
        // 邮箱
        $email = $_GET["email"];
        $obj = array();
        if(!isExist("email",$email)){
            $obj["status"] = true;
            $obj["msg"] = "可以使用的邮箱";
        }else{
            $obj["status"] = false;
            $obj["msg"] = "该的邮箱已存在";
        }
        echo json_encode($obj);
    }else{
        echo "请传入用户名/手机号/邮箱";
    }


    // 判断某一列中是否存在  某个值
   function isExist($colName,$val){
        $search = "select * from `userinfo` where $colName = '$val'";
        
        global $conn;   //允许局部变量 访问全局变量
        $result =  mysqli_query($conn,$search);

        $item = mysqli_fetch_assoc($result);

        if($item){
            return true;  //存在
        }else{
            return false;  //不存在
        }
       
   }


?>