<?php
    @include_once("conn.php");

    $id = $_GET["id"];
    $search = "select id,user,class,chinese,math,english from `grade` where id = $id";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    if($item){
        echo json_encode($item);
    }else{
        echo json_encode(array("msg"=>"该用户不存在"));
    }

    // echo "1111";
?>