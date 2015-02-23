

<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/21
 * Time: 18:46
 */

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

$id =  $_POST['id'];
$name = $_POST['name'];

$edit_sql="update   customer set c_name='" . $name . "' where c_id=" . $id;

echo $edit_sql;

echo mysqli_error($con);

mysqli_query($con, $edit_sql);



?>
