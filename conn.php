<?php
error_reporting(E_ALL ^ E_DEPRECATED);//�رվ��棬�رձ���


	
	  function getConn(){
		//���ӵ���ݿ������

$conn = mysql_connect("localhost","root",""); 
mysql_select_db("mingtong", $conn); 
mysql_query("SET NAMES utf8");//��������ʺ�
		return $conn;
	}
	
	function getRows($tableName){
        $conn = getConn();
        $result = mysql_query("SELECT * FROM $tableName");

        while($row = mysql_fetch_array($result))
        {
            echo $row['c_id'] .",". $row['c_want']."," . $row['c_name']."," . $row['c_contact']."," . $row['c_replytime']."," . $row['c_replyer'] . $row['c_mark'];
        echo "<br />";
    }

        mysql_close($conn);
    }

		


	
	
	

