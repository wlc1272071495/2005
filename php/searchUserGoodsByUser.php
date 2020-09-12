<?php

    @include_once("conn.php");

    $user = $_POST["user"];

    $search = "select s.id,s.`user`,s.goodsId,s.buyNum,s.`status`,g.goodsName,g.goodsPrice,g.goodsImgList from `shoppingcar` as s,`goodslist` as g where s.goodsId = g.goodsId and user='$user' order by id asc";

    $result = mysqli_query($conn,$search);

    $all = array();
    while($item = mysqli_fetch_assoc($result)){

        $str = $item["goodsImgList"];
       
        $arr  = explode(",",$str);
        $item["goodsImgList"] = $arr[0];
        $item["subTotal"]  =  $item["buyNum"] * $item["goodsPrice"];

        array_push($all,$item);

    }

    echo json_encode($all);



?>