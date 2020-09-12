<?php
    @include_once("conn.php");

    $user = $_GET["user"];
    $goodsId = $_GET["goodsId"];
    $buyNum = $_GET["buyNum"];


    // 无脑新增 => 不准确
    $insert = "insert into `shoppingcar`(user,goodsId,buyNum)  values('$user','$goodsId',$buyNum)";

    mysqli_query($conn,$insert);

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