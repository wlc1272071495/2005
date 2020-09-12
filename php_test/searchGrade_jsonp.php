<?php
   
    @include_once("conn.php");

    // 此处必须要接收参数
    $key = $_GET["key"]; //搜索的关键词
    $orderCol = $_GET["orderCol"]; // 排序列名 (学号(id)  语文  数学  英语  总分)
    $orderType = $_GET["orderType"]; //  排序方式(升序和降序)

    $pageIndex =  $_GET["pageIndex"];
    $showNum =  $_GET["showNum"];

   

    // 接收一个页码
    // 第1页  [0,5]     => limit 0,5     
    // 第2页  [5,10]    => limit 5,5   
    // 第3页  [10,15]   => limit 10,5  
    // 第4页  [15,20]   => limit 15,5
    // pageIndex 页码   => limit (pageIndex-1)*5,5

    // 显示页码范围    最小值  0  最大值 maxPage = 总数量/showNum =>向上取整

    // 如何找总数量 ?  按照搜索条件 查找一遍  
    $searchAll = "select id,user,class,chinese,math,english,chinese+math+english as total from `grade` where user like '%$key%' order by $orderCol $orderType";
    $resultAll = mysqli_query($conn,$searchAll);
    // print_r($resultAll);
    $count = $resultAll->num_rows;  // 总数量

    // 最大页码
    $maxPage = ceil($count/$showNum);  // ceil()  php中的向上取整
    // echo $maxPage;

    if($pageIndex<1){   // pageIndex<=1  =>  1  至少是1
        $pageIndex=1;
    }

    if($pageIndex>=$maxPage){  // 最多是pageIndex
        $pageIndex = $maxPage; 
    }

    // 跳过多少条
    $skipNum = ($pageIndex-1)*$showNum;


    $search = "select id,user,class,chinese,math,english,chinese+math+english as total from `grade` where user like '%$key%' order by $orderCol $orderType limit $skipNum,$showNum";

    $result = mysqli_query($conn,$search);

    $all = array();
    while($item = mysqli_fetch_assoc($result)){
        array_push($all,$item);
    };


    
     // 除了此数组 还希望输出 count / maxPage  / currentPage
    // => 将数据组合成一个新的对象输出

    $obj = array();
    $obj["count"] = $count;  //总数量
    $obj["maxPage"] = $maxPage;  // maxPage 最大页码
    $obj["currentPage"] = $pageIndex; // currentPage  记录当前页 (如果超出最大值 = maxPage)
    $obj["list"] = $all;

    // echo json_encode($obj);

    echo "var data=".json_encode($obj);


    /*  
    // 原本的
    [{},{},{},{},{}]

    // 组合数据
    {
        count:84,    //查询符合条件的总数据
        maxPage:17,  // 最大页码
        currentPage:1, // 当前页
        list:[{},{},{},{},{}]    //分页数据
    }
    
    
    
    */


?>