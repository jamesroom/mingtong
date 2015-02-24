

<?php


$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['id']) ){
    $id = $_GET['id'];
    $edit_sql="select * from  customer where id=" . $id;
    $result = mysqli_query($con, $edit_sql);

    $data=mysqli_fetch_array($result);

    $userInfo = getUserInfo($con,$data["v_name"]);
    //var_dump( $data );


    echo'<table><tr>';
    echo"<td>编号: ".$data['id']."<input id='edit_id' value='".$data['id']."' type='hidden'/></td></tr>";
    echo"<tr><td>意向:<input id='edit_want' type=\"text\" value=\"" .$data['want']."\"/></td></tr>";
    echo"<tr><td>名称: <input id='edit_name' type=\"text\" value=\"".$data['name']."\"/></td></tr>";
    echo"<tr><td>联系方式:<input id ='edit_phone' type=\"text\" value=\"".$data['phone']."\"/></td></tr>";
    echo"<tr><td>回访时间:<input id ='edit_v_time' type=\"text\" value=\"".$data['v_time']."\"/></td></tr>";
    //echo"<tr><td>回访人:<input id =edit_v_name' type=\"text\" value=\"".$data['v_name']."\"/></td></tr>";
    echo"<tr><td>回访人:<select id ='edit_v_name' type=\"text\" value=\"".$data['v_name']."\">$userInfo</select></td></tr>";


    echo"<tr><td>内容:<textarea style='width: 410px; height: 200px' id ='edit_comment'>".$data['comment']."</textarea></td></tr>";
    //echo"<tr><td>标记:<input id =edit_mark' type=\"text\" value=\"".$data['mark']."\"/></td></tr>";


    echo "<tr><td>标记:<input name='mark' checked type=\"radio\" value='1'/>有效<input name='mark' type=\"radio\" value='2' />无效<input name='mark' type=\"radio\" value=\"3\"/>过期</td></tr>";
    echo "<script>$(\"input[name='mark'][value='".$data['mark']."']\").attr(\"checked\",true);  </script>";

    echo "</table>";
}

function getUserInfo($con,$selectedId){
    $sql ="select id,nickname from  user";
    $result = mysqli_query($con, $sql);
    $html='';
    while($data=mysqli_fetch_array($result))
    {
        $checked = $selectedId==$data["id"]?"selected":"";
       $html.="<option $checked value='".$data["id"]."'>".$data["nickname"]."</option>";
    }
    return $html;
}


?>
