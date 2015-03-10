
<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['del_id']) ){
    $del_id = $_GET['del_id'];
    $del_sql="delete from  fang where id=" . $del_id;
    mysqli_query($con, $del_sql);
    header("location:http://localhost/mingtong/fang/fang.php");
}

?>
