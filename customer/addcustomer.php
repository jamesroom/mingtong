<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>客户录入</title>
</head>
<body>


<form method="post" action="add.php">
    <table border="0" align="center">
        <tr><td>意向:<input type="Text" name="want"  ></td></tr>
        <tr><td>名称:<input type="Text" name="name"></td></tr>
        <tr><td>联系方式:<input type="Text" name="phone"></td></tr>
        <tr><td>到访时间:<input type="hidden" name="v_time"></td></tr>
        <tr><td>回访人:<input type="Text" name="v_name"></td></tr>
        <tr><td>内容:<textarea style="width: 410px; height: 200px" name="comment"></textarea></td></tr>
        <tr><td> 标记:<input type="Text" name="mark"></td></tr>
        <tr><td><input type="submit" name="submit" value="客户录入"></td></tr>

    </table>
</form>

</body>
</html>