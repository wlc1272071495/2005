<?php

    @include_once("conn.php");

    $gid=$_GET["gid"];

    //1   [0,5]      0,5
    //2   [5,10]     5,5
    //3   [10,15]    10,5
    
    $search = "select * from `goodslist` where goodsId = $gid";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);
    $str = $item["goodsImgList"];
    $item["goodsImgList"] = explode(",",$str);
   
    echo json_encode($item);

?>