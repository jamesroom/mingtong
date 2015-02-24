

<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

$id =  $_POST['id'];
$want = $_POST['want'];
$name = $_POST['name'];
$phone = $_POST['phone'];
//$v_time = $_POST['v_time'];
$v_time = date('Y-m-d',time());  //保存为当前时间
$v_name = $_POST['v_name'];
$comment = $_POST['comment'];
$mark = $_POST['mark'];

$edit_sql="update customer set want='" . $want . "',name='".$name."', phone='".$phone."', v_time='".$v_time."', v_name='".$v_name."', comment='".$comment."', mark='".$mark."' where id=" . $id;

echo $edit_sql;

echo mysqli_error($con);

mysqli_query($con, $edit_sql);



?>
