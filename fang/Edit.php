
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<body>
<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

require_once("WantInfo.php");

$wantInfo = getWantInfo($con,$data["want"]);
var_dump($wantInfo);


if( !empty($_GET['id']) ){
    $id = $_GET['id'];
    $edit_sql="select * from  fang where id=" . $id;
    $result = mysqli_query($con, $edit_sql);

    $data=mysqli_fetch_array($result);

    $data['comment']=$data['comment']."【".date('Y-m-d',time()).'】';

    echo'<table><tr>';
    echo"<td>编号: ".$data['id']."<input id='edit_id' value='".$data['id']."' type='hidden'/></td></tr>";
    echo"<tr><td>租售:<select id='edit_r_s' type=\"text\" value=\"" .$data['r_s']."\">$wantInfo</select></td></tr>";
    echo"<tr><td>物业地址: <input id='edit_address' type=\"text\" value=\"".$data['address']."\"/></td></tr>";
    echo"<tr><td>类型:<input id ='edit_type' type=\"text\" value=\"".$data['type']."\"/></td></tr>";
    echo"<tr><td>幢:<input id ='edit_block' type=\"text\" value=\"".$data['block']."\"/></td></tr>";
//    echo"<tr><td>幢: ".$data['v_time']."<input id='edit_v_time' value='".$data['v_time']."' type='hidden'/></td></tr>";
    echo"<tr><td>房号:<input id ='edit_number' type=\"text\" value=\"".$data['number']."\"></td></tr>";
    echo"<tr><td>套内面积:<input id ='edit_t_size' type=\"text\" value=\"".$data['t_size']."\"/></td></tr>";
    echo"<tr><td>建筑面积:<input id ='edit_j_size' type=\"text\" value=\"".$data['j_size']."\"/></td></tr>";
    echo"<tr><td>户型:<input id ='edit_layout' type=\"text\" value=\"".$data['layout']."\"/></td></tr>";
    echo"<tr><td>售价:<input id ='edit_s_price' type=\"text\" value=\"".$data['s_price']."\"/></td></tr>";
    echo"<tr><td>租价:<input id ='edit_r_price' type=\"text\" value=\"".$data['r_price']."\"/></td></tr>";
    echo"<tr><td>钥匙:<input id ='edit_key' type=\"text\" value=\"".$data['key']."\"/></td></tr>";
    echo"<tr><td>装修:<input id ='edit_decoration' type=\"text\" value=\"".$data['decoration']."\"/></td></tr>";
    echo"<tr><td>回访时间:<input id ='edit_v_time' type=\"text\" value=\"".$data['v_time']."\"/></td></tr>";
    echo"<tr><td>内容:<textarea style='width: 410px; height: 200px' id ='edit_comment'>".$data['comment']."</textarea></td></tr>";
    echo"<tr><td>报房人:<input id ='edit_visitor' type=\"text\" value=\"".$data['visitor']."\"/></td></tr>";
    echo"<tr><td>联系电话:<input id ='edit_phone' type=\"text\" value=\"".$data['phone']."\"/></td></tr>";
    echo"<tr><td>业主:<input id ='edit_owner' type=\"text\" value=\"".$data['owner']."\"/></td></tr>";
    echo"<tr><td>联系方式:<input id ='edit_contact' type=\"text\" value=\"".$data['contact']."\"/></td></tr>";
    echo"<tr><td>标记:<input id ='edit_mark' type=\"text\" value=\"".$data['mark']."\"/></td></tr>";

    //echo"<tr><td>标记:<input id =edit_mark' type=\"text\" value=\"".$data['mark']."\"/></td></tr>";

//
//    echo "<tr><td>标记:<input name='mark' checked type=\"radio\" value='1'/>有效<input name='mark' type=\"radio\" value='2' />无效<input name='mark' type=\"radio\" value=\"3\"/>过期</td></tr>";
//    echo "<script>$(\"input[name='mark'][value='".$data['mark']."']\").attr(\"checked\",true);  </script>";//radio的用法
//    echo "<a onclick=\"javascript:delData(this.href);return false;\" href='delete.php?del_id="  . $data['id'] ."'>删除</a>";
    echo "</table>";
}



function getWantInfo($con,$selectedId){
    $listData = WantInfo::getWantInfo($con);
    $html='';
    foreach($listData as $k=>$v){
        $checked = $selectedId==$k?"selected":"";
        $html.="<option $checked value='".$k."'>".$v."</option>";
    }
    return $html;
}

?>
</body>

</html>
