
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<link href="../jquery/jquery-ui.css" rel="stylesheet">
<script src="../jquery/jquery.js"></script>
<script src="../jquery/jquery-ui.js"></script>

<style type="text/css">

    .aaa{ border:1px solid yellow  }
    .aaa td{border-top:1px solid red}

</style>

<body>
<?php

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

require_once("UserInfo.php");//列表框的用法1-5
require_once("Config.php");//引用配置文件1-3
$userList = UserInfo::getUserInfo($con);//列表框的用法2-5
//$wantList = UserInfo::getWantInfo($con);

if( !empty($_GET['del_id']) ){  //删除记录
    $del_id = $_GET['del_id'];
    //  var_dump($del_id);
    $del_sql="delete from  customer where id=" . $del_id;
    mysqli_query($con, $del_sql);//删除记录，先删后查，刷新页面。
}


$query="select * from customer";
//  var_dump($query);
$result=mysqli_query($con, $query);

//var_dump($result);
// $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
// var_dump($data);

echo'<table class="aaa" cellspacing="0" cellpadding="0" width=90% align=center><tr>';
echo'<td>编号</td><td>意向</td><td>名称</td><td>联系方式</td><td>回访时间</td><td>回访人</td><td>内容</td><td>标记</td><td>操作</td></tr>';
while($data=mysqli_fetch_array($result))
{

    //print_r($data);
    echo'<tr>';
    echo"<td>".$data['id']."</td>";
//    echo"<td>".$wantList[$data['want']]."</td>";
    echo"<td>".$data['name']."</td>";
    echo"<td>".$data['phone']."</td>";
    echo"<td>".$data['v_time']."</td>";
    echo"<td>".$userList[$data['v_name']]."</td>";//列表框的用法3-5
    echo"<td>".$data['comment']."</td>";
    echo"<td>".Mark::$MarkInfo[$data['mark']]."</td>";//引用配置文件2-3
    echo"<td><a href='#' onclick=\"begin_edit("  . $data['id'] .")\">修改</a><a href='customer.php?del_id="  . $data['id'] ."'>删除</a></td>";
    echo "</tr>\n";
}
echo'</table>';


//$aa = "hell\"  world";//转义
//$nnn = 1111;//转义



?>

<a href='stu.htm'>返回</a>


<div  id="dialog_container">

</div>

<!--<iframe src="http://www.baidu.com"/> -->

</body>

<script>
    function begin_edit(id){

        $.ajax({
            url: "openedit.php?id=" + id,
            type: "get",
            success: function(table){
                //alert(html);
                $("#dialog_container").html(  table ); //id为dialog_html的容器内容设置为html,

                $( "#dialog_container" ).dialog( "open" );

            }
        });

        return false;

    }


    $( "#dialog_container" ).dialog({
        autoOpen: false,
        width: 500,
        buttons: [
            {
                text: "保存",
                click: function() {

                    var params = {
                        id: $("#edit_id").val(),
                        want: $("#edit_want").val(),
                        name: $("#edit_name").val(),
                        phone: $("#edit_phone").val(),
                        "v_time": $("#edit_v_time").val(),
                        "v_name": $("#edit_v_name").val(),
                        "comment": $("#edit_comment").val(),
                     //   "mark": $("#edit_mark").val()
                        "mark":$("input[name='mark']:checked").val()//radio

                    };
                    //var a=2123;
                    //console.dir(params);

                    $.ajax({
                        url: "saveedit.php",
                        data: params,
                        type: "post",
                        success: function(){
                            // alert('保存完成了');
                            location.reload();
                        }
                    });


                    //  alert('你点了保存按键哦');
                    //  $( this ).dialog( "close" );
                }
            },
            {
                text: "取消",
                click: function() {
                    $( this ).dialog( "close" );
                }
            }
        ]
    });

</script>

</html>
