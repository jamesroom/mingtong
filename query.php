
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<?php
$name = !empty($_POST['name']) ? trim( $_POST['name'] ) : '';
$replyer = !empty($_POST['replyer']) ?  trim( $_POST['replyer'] ) : '';

?>


<body>

<form method="post">

    name: <input type="text" name="name" value="<?php echo $name  ?>"/>
    replyer: <input type="text" name="replyer"  value="<?php echo $replyer  ?>"/>
    <input type="submit" value="查询"/>
</form>



<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");


$condition  = " 1=1 ";

if( !empty( $name ) ){
    $condition .= " and  c_name like '%" . $name . "%'";
}

if( !empty( $replyer ) ){
    $condition .= " and  c_replyer like '%" . $replyer . "%'";
}
$query="select * from customer where "  . $condition;

//var_dump($query);
//  var_dump($query);
$result=mysqli_query($con, $query);
//var_dump($result);
// $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
// var_dump($data);


?>


<?php
echo'<table class="aaa" cellspacing="0" cellpadding="0" width=90% align=center><tr>';
        echo'<td>c_id</td><td>c_want</td><td>c_name</td><td>c_contact</td><td>c_replyertime</td><td>c_replyer</td><td>c_comment</td><td>c_mark</td><!--<td>操作</td>--></tr>';
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
        echo"<td>".$data['c_mark']."</td>";
       // echo"<td><a href='#' onclick=\"return begin_edit("  . $data['c_id'] .")\">修改</a><a href='all.php?del_id="  . $data['c_id'] ."'>删除</a></td>";
        echo "</tr>\n";
    }
    echo'</table>';


?>



</body>

</html>
