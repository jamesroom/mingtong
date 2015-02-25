<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/23
 * Time: 11:01
 */

//function getHeader(){
$_GLOBAL_HEADER= array(
    1=>array(
        "name"=>"房源管理",
        "url" =>"http://localhost/mingtong/lunjiang/index.php?id=1"
    ),

    2=>array(
        "name"=>"客户管理",
        "url" =>"http://localhost/mingtong/lunjiang/index.php?id=2  "
    ),

   3=>array(


        "name"=>"合同打印",
        "url" =>"###"
    ),
    4=>array(
        "name"=>"置业工具",
        "url" =>"###"
    )
);
$HTML="";
$id= isset($_GET["id"])?$_GET["id"]:1;
foreach($_GLOBAL_HEADER as $k=>$v){
    $name=$v["name"];
    $href=$v["url"];
    $cur= $id == $k ?"class='cur'":"";
    $HTML=$HTML."<li $cur><a href=\"$href\">$name</a></li>";
}

    print <<<EOT
<style>
.header,.header li{
    list-style: none;
    margin: 0;
    padding: 0;
}
    .header li{
        font-size: 13px;
        line-height: 30px;
        padding: 0 20px;
        float: left;
        border:1px solid #000;
        border-top-left-radius: 4px;
        border-top-top-radius: 4px;
        margin-right: 5px;
        background-color: rgb(197,218,241);
    }
    .header{
        border-bottom: 1px solid #000;
        height: 31px;
        box-shadow: 0 2px 2px;
    }

.clearfix:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
    .header .cur{
        background-color: rgb(242,220,219);
        color:  rgb(192,80,77);
    }
</style>

<ul class="header clearfix">
    $HTML
</ul>
EOT;

