<?php

    @include_once("conn.php");

    $key = $_GET["key"];
    $orderCol = $_GET["orderCol"];
    $orderType = $_GET["orderType"];

    $pageIndex = $_GET["pageIndex"];
    $showNum = $_GET["showNum"];


    //1   [0,5]      0,5
    //2   [5,10]     5,5
    //3   [10,15]    10,5
    $skipNum = ($pageIndex-1)*$showNum;




    // $search = "select * from `goodslist` where goodsName like '%$key%' order by id asc limit 0,5;";
    $search = "select * from `goodslist` where goodsName like '%$key%' order by $orderCol $orderType limit $skipNum,$showNum;";

    $result = mysqli_query($conn,$search);

    $all = array();
    while($item = mysqli_fetch_assoc($result)){

        $str = $item["goodsImgList"];
        // $item["list"] = explode(",",$str);
        $item["goodsImgList"] = explode(",",$str);

        array_push($all,$item);
    }

    echo json_encode($all);

?>