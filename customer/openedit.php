

<?php
require_once("UserInfo.php");

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['id']) ){
    $id = $_GET['id'];
    $edit_sql="select * from  customer where id=" . $id;
    $result = mysqli_query($con, $edit_sql);

    $data=mysqli_fetch_array($result);

    $userInfo = getUserInfo($con,$data["v_name"]);//列表框的用法1/3
    $wantInfo = getWantInfo($con,$data["want"]);

    $data['comment']=$data['comment']."【".date('Y-m-d',time()).'】';//备注里加了时间
    //var_dump( $data );


    echo'<table><tr>';
    echo"<td>编号: ".$data['id']."<input id='edit_id' value='".$data['id']."' type='hidden'/></td></tr>";
    echo"<tr><td>意向:<select id='edit_want' type=\"text\" value=\"" .$data['want']."\">$wantInfo</select></td></tr>";
    echo"<tr><td>名称: <input id='edit_name' type=\"text\" value=\"".$data['name']."\"/></td></tr>";
    echo"<tr><td>联系方式:<input id ='edit_phone' type=\"text\" value=\"".$data['phone']."\"/></td></tr>";
    echo"<tr><td>回访时间: ".$data['v_time']."<input id='edit_v_time' value='".$data['v_time']."' type='hidden'/></td></tr>";
    //echo"<tr><td>回访人:<input id =edit_v_name' type=\"text\" value=\"".$data['v_name']."\"/></td></tr>";
    echo"<tr><td>回访人:<select id ='edit_v_name' type=\"text\" value=\"".$data['v_name']."\">$userInfo</select></td></tr>";//列表框的用法2/3


    echo"<tr><td>内容:<textarea style='width: 410px; height: 200px' id ='edit_comment'>".$data['comment']."</textarea></td></tr>";  //长文本的用法
    //echo"<tr><td>标记:<input id =edit_mark' type=\"text\" value=\"".$data['mark']."\"/></td></tr>";


    echo "<tr><td>标记:<input name='mark' checked type=\"radio\" value='1'/>有效<input name='mark' type=\"radio\" value='2' />无效<input name='mark' type=\"radio\" value=\"3\"/>过期</td></tr>";
    echo "<script>$(\"input[name='mark'][value='".$data['mark']."']\").attr(\"checked\",true);  </script>";//radio的用法

    echo "</table>";
}

function getUserInfo($con,$selectedId){       //列表框的用法3/3
    $listData = UserInfo::getUserInfo($con);
    $html='';
    foreach($listData as $k=>$v){
        $checked = $selectedId==$k?"selected":"";
        $html.="<option $checked value='".$k."'>".$v."</option>";
    }
    return $html;
}

function getWantInfo($con,$selectedId){
    $sql = "select id,r_b from r_b";
    $result = mysqli_query($con, $sql);
    $html='';
    while($data=mysqli_fetch_array($result))
    {
        $checked = $selectedId==$data["id"]?"selected":"";
        $html.="<option $checked value='".$data["id"]."'>".$data["r_b"]."</option>";
    }
    return $html;
}

?>
