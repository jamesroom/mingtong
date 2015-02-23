<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<style>


    .nav-left{
        width: 94px;
    }
    .main,.nav-left-container{
        float: left;
    }
    .nav-left li,.nav-left{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .nav-left li{
        text-align: center;
        padding: 15px 0;
        font-size: 13px;
        background-color: rgb(79,129,189);
        color: #fff;
        border: 1px solid #000;
        margin-bottom: 1px;
    }
    .header-container{
        padding-left: 95px;
    }
    .container{
        width: 1024px;
        margin: 0 auto;
    }

</style>





<div class="container">
    <div class="header-container">
        <?php
            require('header.php');
        ?>
    </div>
    <div class="main-c clearfix">
        <div class="nav-left-container">
            <?php
                require("nav.php");
            ?>
        </div>
        <div class="main">
            <?php
              //  $id= isset($_GET["id"])?$_GET["id"]:1;
              //      require($_GET)
            ?>
        </div>
    </div>

</div>
</body>
</html>