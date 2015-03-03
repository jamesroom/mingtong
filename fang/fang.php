
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<body>
<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

require_once("../main/Config.php");
require_once("../main/AddressInfo.php");
$AddressList = AddressInfo::getAddressInfo($con);

$query="select * from fang where 1";
$result=mysqli_query($con, $query);

echo'<table class="" cellspacing="1" cellpadding="1" width=100% align=center><tr>';
echo'<td>编号</td>
　　<td>租售</td>
　　<td>物业地址</td>
　　<td>类型</td>
　　<td>房号</td>
　　<td>面积</td>
　　<td>户型</td>
　　<td>售价</td>
　　<td>租价</td>
　　<td>钥匙</td>
　　<td>装修</td>
　　<td>回访时间</td>
　　<td>回访内容</td>
　　<td>业主</td>
　　<td>联系方式</td>
　　<td>标记</td></tr>';
while($data=mysqli_fetch_array($result))
{

    echo'<tr>';
    echo"<td>".$data['id']."</td>";
    echo"<td>".Want::$WantInfo[$data['r_s']]."</td>";
    echo"<td>".$AddressList[$data['address']]."</td>";
    echo"<td>".$data['type']."</td>";
    echo"<td>".$data['block']."-".$data['number']."</td>";
    echo "<td>".$data['t_size']."/".$data['j_size']."</td>";
    echo"<td>".$data['layout']."</td>";
    echo"<td>".$data['s_price']."</td>";
    echo"<td>".$data['r_price']."</td>";
    echo"<td>".$data['key']."</td>";
    echo"<td>".Decoration::$DecorationInfo[$data['decoration']]."</td>";
    echo"<td>".$data['v_time']."</td>";
    echo"<td>".$data['comment']."</td>";
    echo"<td>".$data['visitor']."\n".$data['owner']."</td>";
    echo"<td>".$data['phone']."\n".$data['contact']."</td>";
    echo"<td>".Mark::$MarkInfo[$data['mark']]."</td>";
    echo"<td><a href='Edit.php?id=".$data['id']."'>修改</a></td>";
    echo "</tr>\n";
}
echo'</table>';

?>

</body>

</html>
