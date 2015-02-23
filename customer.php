<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>
<body>

<div>
    <?php
    /*
    error_reporting(E_ALL ^ E_DEPRECATED);//�رվ��棬�رձ���
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("mingtong", $conn);
    mysql_query("SET NAMES utf8");//��������ʺ�
    */
    require('./conn.php');
    getRows('customer');
//    getConn();
//    $result = mysql_query("SELECT * FROM customer");
//
//    while($row = mysql_fetch_array($result))
//    {
//        echo $row['c_id'] . " " . $row['c_name'];
//        echo "<br />";
//    }
//
//    mysql_close($conn);
//echo "��ѯ��¼";
    ?>
</div>

<div>
    <?php
    //	getNav();
    ?>
</div>
</body>
</html>