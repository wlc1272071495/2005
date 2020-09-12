<?php
    @header("Content-Type:text/html;charset=utf-8");
    // @header("Access-Control-Allow-Origin:*");   //允许所有人访问
    // @header("Access-Control-Allow-Origin:http://127.0.0.1:5500");   //允许http://127.0.0.1:5500访问
    @header("Access-Control-Allow-Origin:*");    // 配置CORS(跨域资源共享)  允许所有人访问
    
    // 3. 
    // $conn = mysqli_connect("localhost:3306","root","root","2005");
    $conn = mysqli_connect("127.0.0.1:3306","root","root","2005");

    // $ip = $_SERVER["REMOTE_ADDR"];  // remote  address
    // if($ip!="192.168.59.157"&&$ip!="::1"){
    //     die("System Error");  // 禁止继续先后执行脚本
    // }

    // 4. 转码设置  (编码格式)
    mysqli_query($conn,"set names utf8");         // 从数据库取数据时  将编码转为utf-8;
    mysqli_query($conn,"set character set utf-8");// 向数据库存数据时  将编码转为utf-8

