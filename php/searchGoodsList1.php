<?php

    @include_once("conn.php");

    $search = "select * from `goodslist` where goodsName like '%%' order by id asc limit 0,5;";

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