
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<head>
    <title>房源管理</title>
</head>

<body>
<?php
require("../main/Conn.php");
require_once("../main/Config.php");
require_once("../main/AddressInfo.php");

$address = !empty($_POST['address']) ? trim( $_POST['address'] ) : '';
$addressInfo = getAddressInfo($con,$address);


$block = !empty($_POST['block']) ?  trim( $_POST['block'] ) : '';
?>


<form action="Fang.php" method="post">
    <tr><td>
            物业地址:<select name="address" value="<?php echo $address?>">
                <?php
                echo "$addressInfo";
                ?>
            </select>
        </td>
        <td>
            <input type="text" name="block" value="<?php echo $block ?>"/>
        </td>
        <td>
            <input type="submit" value="查询"/>
        </td>
    </tr>
</form>

<?php
$condition  = " 1=1 ";
if( !empty( $address ) ){
    $condition .= " and  address = '$address'";
}
if( !empty( $block ) ){
    $condition .= " and  block = '$block'";
}

$query = "select * from fang where".$condition;
$result = mysqli_query($con, $query);
$amount = mysqli_num_rows($result);
if(isset($_GET['page'])){
    $page = intval($_GET['page']);
}
else{
    $page=1;
}
$page_size = 10;

if($amount){
    if($amount<$page_size){
        $page_count = 1;
    }
    if($amount % $page_size){
        $page_count = (int)($amount/$page_size)+1;
    }
    else{
        $page_count=$amount/$page_size;
    }
}
else{
    $page_count=0;
}

$page_string = '';
if($page == 1){
    $page_string.='第一页|上一页|';
}
else{
    $page_string.='<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>| ';
}
if(($page==$page_count)||($page_count==0)){
    $page_string.='下一页｜尾页';
}
else{
    $page_string.='<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
}



if($amount) {
    $query .= " ORDER BY id ASC limit " . ($page - 1) * $page_size . ",$page_size";
    $result = mysqli_query($con, $query);
    $AddressList = AddressInfo::getAddressInfo($con);
    echo "<P><tr><td>".$page_string."</td>";
    echo "<td>现在是第".$page."页，总共".$page_count."页</td></tr><p>";
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
    while ($data = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . Want::$WantInfo[$data['r_s']] . "</td>";
        echo "<td>" . $AddressList[$data['address']] . "</td>";
        echo "<td>" . Type::$TypeInfo[$data['type']] . "</td>";
        echo "<td>" . $data['block'] . "-" . $data['number'] . "</td>";
        echo "<td>" . $data['t_size'] . "/" . $data['j_size'] . "</td>";
        echo "<td>" . $data['layout'] . "</td>";
        echo "<td>" . $data['s_price'] . "</td>";
        echo "<td>" . $data['r_price'] . "</td>";
        echo "<td>" . $data['w_key'] . "</td>";
        echo "<td>" . Decoration::$DecorationInfo[$data['decoration']] . "</td>";
        echo "<td>" . $data['v_time'] . "</td>";
        echo "<td>" . $data['comment'] . "</td>";
        echo "<td>" . $data['visitor'] . "\n" . $data['owner'] . "</td>";
        echo "<td>" . $data['phone'] . "\n" . $data['contact'] . "</td>";
        echo "<td>" . Mark::$MarkInfo[$data['mark']] . "</td>";
        echo "<td><a href='Edit.php?id=" . $data['id'] . "' target='new'>修改</a></td>";
        echo "</tr>\n";
    }
    echo '</table>';
}else{
    echo "一条房源信息都没有！test";
}


function getAddressInfo($con,$selectedId)
{
    $listData = AddressInfo::getAddressInfo($con);
    $html = '';
    foreach ($listData as $k => $v) {
        $checked = $selectedId == $k ? "selected" : "";
        $html .= "<option $checked value='" . $k . "'>" . $v . "</option>";
    }
    return $html;
}
?>
</body>
</html>


