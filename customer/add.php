<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>客户录入</title>
</head>
<body>


<form method="post" action="">
    <table border="0" align="center">
        <tr><td>意向:<input type="Text" name="want"  value="<?php echo isset($_POST["want"])?$_POST["want"]:""; ?>" ></td></tr>
        <tr><td>名称:<input type="Text" name="name" value="<?php echo isset($_POST["name"])?$_POST["name"]:""; ?>" ></td></tr>
        <tr><td>联系方式:<input type="Text" name="phone" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" ></td></tr>
        <tr><td>到访时间:<input type="text" readonly name="v_time" style="border: none" value="<?php echo date('Y-m-d',time());?>"/></td></tr>
        <tr><td>回访人:<input type="Text" name="v_name" value="<?php echo isset($_POST["v_name"])?$_POST["v_name"]:""; ?>" ></td></tr>
        <tr><td>内容:<textarea style="width: 410px; height: 200px" name="comment"  ><?php echo isset($_POST["comment"])?$_POST["comment"]:""; ?></textarea></td></tr>
        <tr><td> 标记:<input type="Text" name="mark" value="<?php echo isset($_POST["mark"])?$_POST["mark"]:""; ?>" ></td></tr>
        <tr><td><input type="submit" name="submit" value="客户录入"></td></tr>

    </table>
</form>

<?php


$con = mysqli_connect("localhost", "root", "", "mingtong");
mysqli_query($con, "set names utf8");

if(isset($_POST["submit"])&& $_POST["submit"]=="客户录入") {


    if(!isset($_POST["want"])||empty($_POST["want"])){  //!empty不为空
        echo "<script language=javascript>alert('意向不能为空')</script>";
        exit;
    }
    $want = $_POST['want'];

    if(!isset($_POST["name"])||empty($_POST["name"])){  //!empty不为空
        echo "<script language=javascript>alert('客户名称不能为空')</script>";
        exit;
    }
    $name = $_POST['name'];

    if(!isset($_POST["phone"])||empty($_POST["phone"])){  //!empty不为空
        echo "<script language=javascript>alert('联系方式不能为空')</script>";
        exit;
    }
    $phone = $_POST['phone'];

    if(!isset($_POST["v_time"])||empty($_POST["v_time"])){  //!empty不为空
        echo "<script language=javascript>alert('意向不能为空')</script>";
        exit;
    }
    $v_time = $_POST['v_time'];

    if(!isset($_POST["v_name"])||empty($_POST["v_name"])){  //!empty不为空
        echo "<script language=javascript>alert('回访人不能为空')</script>";
        exit;
    }
    $v_name = $_POST['v_name'];

    if(!isset($_POST["comment"])||empty($_POST["comment"])){  //!empty不为空
        echo "<script language=javascript>alert('回访内容不能为空')</script>";
        exit;
    }
    $comment = $_POST['comment'];

    if(!isset($_POST["mark"])||empty($_POST["mark"])){  //!empty不为空
        echo "<script language=javascript>alert('标记不能为空')</script>";
        exit;
    }
    $mark = $_POST['mark'];

//if(isset($_POST["mark"])&&!empty($_POST["mark"])){


    $query_insert = "insert into customer (want,name,phone,v_time,v_name,comment,mark) values('$want','$name','$phone','$v_time','$v_name','$comment','$mark')";
//    echo $query_insert;
    $result_insert = mysqli_query($con, $query_insert);


    if ($result_insert) {
        $id = mysqli_insert_id($con);
        echo "<script language=javascript>alert('添加成功')</script>";
//    $query="select * from customer where c_id=$id";
//    $result=mysqli_query($con, $query);
//
//    echo'<table border=1 width=90% align=center><tr>';
//    echo'<td>c_id</td><td>c_want</td><td>c_name</td><td>c_contact</td><td>c_replyertime</td><td>c_replyer</td><td>c_comment</td><td>c_mark</td></tr>';
//    while($data=mysqli_fetch_array($result))
//    {
//        echo'<tr>';
//        echo"<td>".$data['c_id']."</td>";
//        echo"<td>".$data['c_want']."</td>";
//        echo"<td>".$data['c_name']."</td>";
//        echo"<td>".$data['c_contact']."</td>";
//        echo"<td>".$data['c_replytime']."</td>";
//        echo"<td>".$data['c_replyer']."</td>";
//        echo"<td>".$data['c_comment']."</td>";
//        echo"<td>".$data['c_contact']."</td>";
//    }
//    echo'</table>';
    } else {
        $error = mysqli_error($con);
        echo "<script language=javascript>alert('添加不成功' . $error. '\')</script>";
    }
}
?>
</body>
</html>