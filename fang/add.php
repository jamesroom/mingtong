<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>房源录入</title>
    <script type="text/javascript">
        function validate_required(field,alerttxt)
        {
            with (field)
            {
                if (value==null||value=="")
                {alert(alerttxt);return false}
                else {return true}
            }
        }
        function validate_form(thisform)
        {
            with (thisform)
            {
                if (validate_required(block,"幢号不能为空！")==false)
                {block.focus();return false}
            }
            with (thisform)
            {
                if (validate_required(number,"房号不能为空！")==false)
                {number.focus();return false}
            }
        }
    </script>
</head>
<body>
<?php
$con  = mysqli_connect("localhost","root", "", "mingtong");
mysqli_query($con, "set names utf8");
require_once("../main/Config.php");
require_once("../main/AddressInfo.php");
$AddressList = AddressInfo::getAddressInfo($con);
?>

<form  action="Insert.php" onsubmit="return validate_form(this);" method="post">
    <table valign="left" border="0">
        <tr><td>
                租售:<select name="r_s" value="">
                    <?php
                    foreach(Want::$WantInfo as $id => $value){
                        echo "<option value='$id'".">".$value."</option>";
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td>
        <tr><td>
                物业地址:<select name="address" value="">
                    <?php
                    foreach($AddressList as $id => $value){
                        echo "<option value='$id'".">".$value."</option>";
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td>
        <tr><td>
                类型:<select name="type" value="">
                    <?php
                    foreach(Type::$TypeInfo as $id => $value){
                        echo "<option value='$id'".">".$value."</option>";
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td>
                幢:<input type="text" name="block"/>
                房号:<input type="Text" name="number"/>
            </td></tr>
        <tr><td>
                套内面积:<input type="text" name="t_size"/>
                建筑面积:<input type="Text" name="j_size"/>
            </td></tr>
        <tr><td>
                户型:<input type="text" name="layout"/>
            </td></tr>
        <tr><td>
                售价:<input type="text" name="s_price"/>
                租价:<input type="text" name="r_price"/>
            </td></tr>
        <tr><td>
                钥匙:<input type="text" name="w_key"/>
            </td></tr>
        <tr><td>
                装修:<select name="decoration" value="">
                    <?php
                    foreach(Decoration::$DecorationInfo as $id => $value){
                        echo "<option value='$id'".">".$value."</option>";
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td>
                到访时间:<input type="text" readonly name="v_time" style="border: none" value="
                <?php
                echo date('Y-m-d',time());
                ?>"
                    />
            </td></tr>
        <tr><td>内容:
                <textarea style="width: 410px; height: 200px" name="comment"  >
                    <?php
                    $data['comment']="【".date('Y-m-d',time()).'】';
                    echo $data['comment'];
                    ?>
                </textarea>
            </td></tr>
        <tr><td>
                报房人:<input type="text" name="visitor"/>
                联系电话:<input type="text" name="phone"/>
            </td></tr>
        <tr><td>
                业主:<input type="text" name="owner"/>
                联系方式:<input type="text" name="contact"/>
            </td></tr>
        <tr><td>
                标记:<select name="mark" value="1">
                    <?php
                    foreach(Mark::$MarkInfo as $id => $value){
                        echo "<option value='$id'".">".$value."</option>";
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td>
                <input type="submit" name="submit" value="房源录入"></td></tr>
    </table>
</form>
</body>
</html>