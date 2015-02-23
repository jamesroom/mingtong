
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">


<body>
<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/21
 * Time: 18:46
 */

$con  = mysqli_connect("localhost","root", "", "mingtong");


$c_want = $_POST['c_want'];
$c_name = $_POST['c_name'];
$c_contact = $_POST['c_contact'];
$c_replytime = $_POST['c_replytime'];
$c_replyer = $_POST['c_replyer'];
$c_comment = $_POST['c_comment'];
$c_mark = $_POST['c_mark'];
//$db_selected = mysqli_select_db("customer", $con);

$query_insert="insert into customer (c_want,c_name,c_contact,c_replytime,c_replyer,c_comment,c_mark) values('$c_want','$c_name','$c_contact','$c_replytime','$c_replyer','$c_comment','$c_mark')";

$result_insert=mysqli_query($con, $query_insert);


if($result_insert){
    $id = mysqli_insert_id($con);
    echo "<script language=javascript>alert('添加成功')
</script>";
    $query="select * from customer where c_id=$id";

  //  var_dump($query);


    $result=mysqli_query($con, $query);

  //  var_dump($result);
   // $data=mysqli_fetch_array($result,MYSQLI_ASSOC);

   // var_dump($data);


    echo'<table border=1 width=90% align=center><tr>';
    echo'<td>c_id</td><td>c_want</td><td>c_name</td><td>c_contact</td><td>c_replyertime</td><td>c_replyer</td><td>c_comment</td><td>c_mark</td></tr>';
    while($data=mysqli_fetch_array($result))
    {
        echo'<tr>';
        echo"<td>".$data['c_id']."</td>";
        echo"<td>".$data['c_want']."</td>";
        echo"<td>".$data['c_name']."</td>";
        echo"<td>".$data['c_contact']."</td>";
        echo"<td>".$data['c_replytime']."</td>";
        echo"<td>".$data['c_replyer']."</td>";
        echo"<td>".$data['c_comment']."</td>";
        echo"<td>".$data['c_contact']."</td>";
    }
    echo'</table>';
}
else{
    $error = mysqli_error($con);
    echo "<script language=javascript>alert('添加不成功' . $error. '\')</script>";
}
?>

<a href='addcustomer.html'>返回</a>
</body>

</html>
