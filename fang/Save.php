

<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

$id =  $_POST['edit_id'];
$r_s = $_POST['edit_r_s'];
$type = $_POST['edit_type'];
$address = $_POST['edit_address'];
$block =  $_POST['edit_block'];
$number =  $_POST['edit_number'];
$t_size =  $_POST['edit_t_size'];
$j_size =  $_POST['edit_j_size'];
$layout =  $_POST['edit_layout'];
$s_price =  $_POST['edit_s_price'];
$r_price =  $_POST['edit_r_price'];
$w_key =  $_POST['edit_w_key'];
$decoration =  $_POST['edit_decoration'];
$v_time =  date('y-m-d',time());
$comment = $_POST['edit_comment'];
$visitor =  $_POST['edit_visitor'];
$phone =  $_POST['edit_phone'];
$owner =  $_POST['edit_owner'];
$contact =  $_POST['edit_contact'];
$mark =  $_POST['edit_mark'];

$save_sql="update fang set
r_s='" . $r_s ."',
type='".$type."',
address='".$address."',
block='".$block."',
number='".$number."',
t_size='".$t_size."',
j_size='".$j_size."',
layout='".$layout."',
s_price='".$s_price."',
r_price='".$r_price."',
w_key='".$w_key."' ,
decoration='".$decoration."',
v_time='".$v_time."',
comment='".$comment."',
visitor='".$visitor."',
phone='".$phone."',
owner='".$owner."',
contact='".$contact."',
mark='".$mark."'
where id=" . $id;

echo mysqli_error($con);
mysqli_query($con, $save_sql);
header("location:http://localhost/mingtong/fang/Edit.php?id=$id");
?>