<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>房源录入</title>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "mingtong");
mysqli_query($con, "set names utf8");
if(isset($_POST["submit"])&& $_POST["submit"]=="房源录入") {
    $r_s = $_POST['r_s'];
    $address = $_POST['address'];
    $block = $_POST['block'];
    $number = $_POST['number'];
    $t_size = $_POST['t_size'];
    $j_size = $_POST['j_size'];
    $layout = $_POST['layout'];
    $s_price = $_POST['s_price'];
    $r_price = $_POST['r_price'];
    $w_key = $_POST['w_key'];
    $decoration = $_POST['decoration'];
    $v_time = $_POST['v_time'];
    $comment = $_POST['comment'];
    $visitor = $_POST['visitor'];
    $phone = $_POST['phone'];
    $owner = $_POST['owner'];
    $contact = $_POST['contact'];
    $mark = $_POST['mark'];

    $query_insert = "insert into fang (r_s,address,block,number,t_size,j_size,layout,s_price,r_price,w_key,decoration,v_time,comment,visitor,phone,owner,contact,mark)values('$r_s','$address','$block','$number','$t_size','$j_size','$layout','$s_price','$r_price','$w_key','$decoration','$v_time','$comment','$visitor','$phone','$owner','$contact','$mark')";
//    echo $query_insert;
    $result_insert = mysqli_query($con, $query_insert);
    if ($result_insert) {
        $id = mysqli_insert_id($con);
        echo "<script language=javascript>alert('添加成功');window.location='http://localhost/mingtong/fang/Edit.php?id=$id'</script>";
    } else {
        $error = mysqli_error($con);
        echo "<script language=javascript>alert('添加不成功' . $error);history.back()</script>";
    }
}
echo "非法访问！"
?>
</body>
</html>