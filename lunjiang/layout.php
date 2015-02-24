
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="../jquery/jquery-ui.css" rel="stylesheet">
    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery-ui.js"></script>

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
        position: relative;

        height: 100%;


    }

    .container .main-c{
        position: absolute;
        padding-top: 31px;
        height: 100%;
        top: 0;
        box-sizing: border-box;
        padding-left: 100px;
    }



    html,body{
        height: 100%;
        margin: 0;
    }
    .main-c .main{
        height: 100%;
        overflow-y: scroll;
    }
    .nav-left-container{
        position: absolute;
        left: 0;
        top: 32px;
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
                require_once("../customer/customer.php");
            ?>
        </div>
    </div>

</div>
</body>
</html>