<?php
$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
// some code
?>
