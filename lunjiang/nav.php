<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/23
 * Time: 11:01
 */
$_GLOBAL_NAV=array(
    1=>array(
        "售房信息"=>"http://localhost/mingtong/lunjiang/index.php?id=1000",
        "售房信息1"=>"http://www.baidu.com",
        "售房信息2"=>"http://www.baidu.com",
        "售房信息3"=>"http://www.baidu.com"
    ),
    2=>array(
        "售房信息"=>"http://www.baidu.com",
        "1售房信息"=>"http://www.baidu.com",
        "售1房信息"=>"http://www.baidu.com",
        "售房2信息"=>"http://www.baidu.com"
    )
);
$key = isset($_GET["id"])?$_GET["id"]:1;
$nav_left= $_GLOBAL_NAV[$key];
$html= "";
foreach($nav_left as $k => $v){
    $html=$html."<li><a href=\"$v\">$k</a></li>";
}
print "<ul class='nav-left'>$html</ul>";
