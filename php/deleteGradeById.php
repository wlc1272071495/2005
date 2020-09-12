<?php
    @include_once("conn.php");

    $id = $_GET["id"];
    $del = "delete from `grade` where id = $id";

    mysqli_query($conn,$del); 

    $rows = mysqli_affected_rows($conn);

    $obj = array();
    if($rows>0){
        $obj["status"] = true;
        $obj["msg"] = "删除成功";
    }else if($rows == 0){  //sql正确  不存在对应id的数据
        $obj["status"] = false;
        $obj["msg"] = "删除已被删除";
    }else {  //sql错误 
        $obj["status"] = false;
        $obj["msg"] = "删除失败";
        $obj["sql"] = $del;
    }
    echo json_encode($obj);






?>