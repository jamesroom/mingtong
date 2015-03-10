<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<head>
    <title>房源编辑</title>
    <script language="javascript">
        function confirmDel(str){
            return confirm(str);
        }
    </script>
</head>
<body>

<form action="Save.php" method="post">

<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

require_once("../main/AddressInfo.php");
require_once("../main/Config.php");

if( !empty($_GET['id']) ){
    $id = $_GET['id'];
    $edit_sql="select * from  fang where id=" . $id;
    $result = mysqli_query($con, $edit_sql);
    $data=mysqli_fetch_array($result);

    $addressInfo = getAddressInfo($con,$data["address"]);

    $data['comment']=$data['comment']."【".date('Y-m-d',time()).'】';

    echo'<table><tr>';
    echo"<td>编号: ".$data['id']."<input name='edit_id' value='".$data['id']."' type='hidden'/></td></tr>";

    echo"<tr><td>租售:<select name='edit_r_s'>";
    foreach(Want::$WantInfo as $id => $value)
    {
        echo '<option value="'.$id.'"'.($id == $data['r_s']?'selected="true"':'').">".$value."</option>";
    }
    echo '</select>';
    echo "</td></tr>";

    echo"<tr><td>类型:<select name='edit_type'>";
    foreach(Type::$TypeInfo as $id => $value)
    {
        echo '<option value="'.$id.'"'.($id == $data['type']?'selected="true"':'').">".$value."</option>";
    }
    echo '</select>';
    echo "</td></tr>";

    echo"<tr><td>物业地址: <select name='edit_address' type=\"text\" value=\"".$data['address']."\">$addressInfo</select></td></tr>";

    echo"<tr><td>幢:<input name ='edit_block' type=\"text\" value=\"".$data['block']."\"/>
                  房号:<input name ='edit_number' type=\"text\" value=\"".$data['number']."\"></td></tr>";
    echo"<tr><td>套内面积:<input name ='edit_t_size' type=\"text\" value=\"".$data['t_size']."\"/>
                  建筑面积:<input name ='edit_j_size' type=\"text\" value=\"".$data['j_size']."\"/></td>";
    echo"<tr><td>户型:<input name ='edit_layout' type=\"text\" value=\"".$data['layout']."\"/></td></tr>";
    echo"<tr><td>售价:<input name ='edit_s_price' type=\"text\" value=\"".$data['s_price']."\"/></td></tr>";
    echo"<tr><td>租价:<input name='edit_r_price' type=\"text\" value=\"".$data['r_price']."\"/></td></tr>";
    echo"<tr><td>钥匙:<input name ='edit_w_key' type=\"text\" value=\"".$data['w_key']."\"/></td></tr>";

    echo"<tr><td>装修:<select name='edit_decoration'>";
    foreach(Decoration::$DecorationInfo as $id => $value)
        {
            echo '<option value="'.$id.'"'.($id == $data['decoration']?'selected="true"':'').">".$value."</option>";
        }
    echo '</select>';
    echo "</td></tr>";

    echo"<tr><td>回访时间:<input name ='edit_v_time' type=\"text\" value=\"".$data['v_time']."\"/></td></tr>";
    echo"<tr><td>内容:<textarea style='width:500px; height:200px ' name='edit_comment'>".$data['comment']."</textarea></td></tr>";
    echo"<tr><td>报房人:<input name ='edit_visitor' type=\"text\" value=\"".$data['visitor']."\"/>
                联系电话:<input name ='edit_phone' type=\"text\" value=\"".$data['phone']."\"/></td></tr>";

    echo"<tr><td>业主:<input name ='edit_owner' type=\"text\" value=\"".$data['owner']."\"/>
                   联系方式:<input name ='edit_contact' type=\"text\" value=\"".$data['contact']."\"/></td></tr>";

    echo"<tr><td>标记:<select name='edit_mark'>";
         foreach( Mark::$MarkInfo as $id => $value )
        {
        echo '<option value="'.$id .'"'.( $id == $data['mark']?' selected="true"':'') .">". $value ."</option>";
        }
    echo '</select>';
    echo "</td></tr>";
    echo "<a href='Del.php?del_id=". $data['id'] ."' onclick='return confirmDel(\"确定要删除吗\")'>删除</a>";
    echo "<tr><td><input type='submit' value='保存'/></td></tr>";
    echo "</table>";
}

function getAddressInfo($con,$selectedId){
    $listData = AddressInfo::getAddressInfo($con);
    $html='';
    foreach($listData as $k=>$v){
        $checked = $selectedId==$k?"selected":"";
        $html.="<option $checked value='".$k."'>".$v."</option>";
    }
    return $html;
}
?>
</form>

</body>

</html>