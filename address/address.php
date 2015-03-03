
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<body>
<?php
$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

$query="select * from address";

$result=mysqli_query($con, $query);

echo'<table class="" cellspacing="0" cellpadding="0" width=100% align=left><tr>';
echo'<td>编号</td><td>物业地址</td><td>操作</td></tr>';
while($data=mysqli_fetch_array($result))
{
    echo'<tr>';
    echo"<td>".$data['id']."</td>";
    echo"<td>".$data['address']."</td>";
    echo"<td><a href='#' >修改</a></td>";
    echo "</tr>\n";
}
echo'</table>';

?>



</body>

</html>
