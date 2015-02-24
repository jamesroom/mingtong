
<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");

$want = $_POST['want'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$v_time = $_POST['v_time'];
$v_name = $_POST['v_name'];
$comment = $_POST['comment'];
$mark = $_POST['mark'];

$query_insert="insert into customer (want,name,phone,v_time,v_name,comment,mark) values('$want','$name','$phone','$v_time','$v_name','$comment','$mark')";

$result_insert=mysqli_query($con, $query_insert);


if($result_insert){
    $id = mysqli_insert_id($con);
    echo "<script language=javascript>alert('添加成功')
</script>";
//    $query="select * from customer where c_id=$id";
//    $result=mysqli_query($con, $query);
//
//    echo'<table border=1 width=90% align=center><tr>';
//    echo'<td>c_id</td><td>c_want</td><td>c_name</td><td>c_contact</td><td>c_replyertime</td><td>c_replyer</td><td>c_comment</td><td>c_mark</td></tr>';
//    while($data=mysqli_fetch_array($result))
//    {
//        echo'<tr>';
//        echo"<td>".$data['c_id']."</td>";
//        echo"<td>".$data['c_want']."</td>";
//        echo"<td>".$data['c_name']."</td>";
//        echo"<td>".$data['c_contact']."</td>";
//        echo"<td>".$data['c_replytime']."</td>";
//        echo"<td>".$data['c_replyer']."</td>";
//        echo"<td>".$data['c_comment']."</td>";
//        echo"<td>".$data['c_contact']."</td>";
//    }
//    echo'</table>';
}
else{
    $error = mysqli_error($con);
    echo "<script language=javascript>alert('添加不成功' . $error. '\')</script>";
}
?>


</body>

</html>
