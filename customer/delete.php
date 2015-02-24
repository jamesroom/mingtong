<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['del_id']) ){  //删除记录
    $del_id = $_GET['del_id'];
    //  var_dump($del_id);
    $del_sql="delete from  customer where id=" . $del_id;
    mysqli_query($con, $del_sql);//删除记录，先删后查，刷新页面。
}
?>