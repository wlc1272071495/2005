<?php
    @include_once("conn.php");

    $user = $_POST["user"];
    $goodsId = $_POST["goodsId"];
    $buyNum = $_POST["buyNum"];


    // 新增的功能 
    // 1. 如果该用户  未购买该商品  => 新增
    // 2. 如果该用户  已经购买该商品  => 数量更新

    // 1.  如果该用户  是否购买该商品? 查询一次
    $search = "select * from `shoppingcar` where user='$user' and goodsId='$goodsId'";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    if($item){  // 如果该用户  已经购买该商品
        // buyNum = buyNum + $buyNum  在原本数量的基础上 + 对应数值
        $update = "update `shoppingcar` set buyNum = buyNum + $buyNum where user='$user' and goodsId = '$goodsId' ";
        mysqli_query($conn,$update);
    }else{  //如果该用户  未购买该商品
        // 无脑新增 => 不准确
        $insert = "insert into `shoppingcar`(user,goodsId,buyNum)  values('$user','$goodsId',$buyNum)";
        mysqli_query($conn,$insert);
    }


    $row = mysqli_affected_rows($conn);

    $obj = array();
    if($row>0){
        $obj["status"]=true;
        $obj["msg"]="新增成功";
    }else{
        $obj["status"]=false;
        $obj["msg"]="新增失败";
        $obj["sql"]=$insert;
    }

    echo json_encode($obj);

  


?>