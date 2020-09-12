<?php
    @include_once("conn.php");

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