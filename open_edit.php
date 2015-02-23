

<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/21
 * Time: 18:46
 */

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['id']) ){  //删除记录
    $id = $_GET['id'];
    $edit_sql="select * from  customer where c_id=" . $id;
    $result = mysqli_query($con, $edit_sql);

    $data=mysqli_fetch_array($result);
    //var_dump( $data );


    echo'<table><tr>';
    echo"<td>id: ".$data['c_id']."<input id='edit_id' value='".$data['c_id']."' type='hidden'/></td></tr>";
    echo"<tr><td>意向:".$data['c_want']."</td></tr>";
    echo"<tr><td>姓名: <input id='edit_name' type=\"text\" value=\"".$data['c_name']."\"/></td></tr>";
    echo"<tr><td>".$data['c_contact']."</td></tr>";
    echo"<tr><td>".$data['c_replytime']."</td></tr>";
    echo"<tr><td>".$data['c_replyer']."</td></tr>";
    echo"<tr><td>".$data['c_comment']."</td></tr>";
    echo"<tr><td>".$data['c_mark']."</td></tr>";
    echo "</table>";
}


?>
