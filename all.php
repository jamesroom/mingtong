
<!Doctype html>
<html xmlns=http://www.w3.org/1999/xhtml>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<link href="jquery-ui.css" rel="stylesheet">
<script src="jquery.js"></script>
<script src="jquery-ui.js"></script>

<style type="text/css">

    .aaa{ border:1px solid yellow  }
    .aaa td{border-top:1px solid red}

</style>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/21
 * Time: 18:46
 */

$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");

if( !empty($_GET['del_id']) ){  //删除记录
    $del_id = $_GET['del_id'];
  //  var_dump($del_id);
    $del_sql="delete from  customer where c_id=" . $del_id;
    mysqli_query($con, $del_sql);//删除记录，先删后查，刷新页面。
}


$query="select * from customer";
//  var_dump($query);
$result=mysqli_query($con, $query);
//var_dump($result);
// $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
// var_dump($data);

echo'<table class="aaa" cellspacing="0" cellpadding="0" width=90% align=center><tr>';
echo'<td>c_id</td><td>c_want</td><td>c_name</td><td>c_contact</td><td>c_replyertime</td><td>c_replyer</td><td>c_comment</td><td>c_mark</td><td>操作</td></tr>';
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
    echo"<td><a href='#' onclick=\"return begin_edit("  . $data['c_id'] .")\">修改</a><a href='all.php?del_id="  . $data['c_id'] ."'>删除</a></td>";
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
            url: "/mingtong/open_edit.php?id=" + id,
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
        width: 400,
        buttons: [
            {
                text: "保存",
                click: function() {

                    var params = {
                        id: $("#edit_id").val(),
                        name: $("#edit_name").val()
                    };

                    console.dir(params);

                    $.ajax({
                        url: "/mingtong/save_edit.php",
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
