<?php
require_once "../include.php";

//得到通过js传过来的id
$id=$_REQUEST['id'];
//查询与id一致的管理员信息
$sql="SELECT `id`, `usename`, `password`, `email` FROM `wam_admin` WHERE id='{$id}'";
$row=fetchOne($sql);
// print_r($row);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>addAdmin</title>
</head>
<body>
    <h3>编辑管理员</h3>
    <!-- 修改管理员  -->
    <form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
        <table width="70%" border="1" cellspacing="0"  bgcolor="#ccc">
            <tr>
                <td align="right" style="padding:5px">管理员名称</td>
                <td style="padding:5px"><input type="text" name="usename" placeholder="<?php echo $row['usename']; ?>"></td>               
            </tr>
            <tr>
                <td align="right" style="padding:5px">管理员密码</td>
                <td style="padding:5px"><input type="password" name="password" value="<?php echo $row['password']; ?>"></td>               
            </tr>
            <tr>
                <td align="right" style="padding:5px">管理员邮箱</td>
                <td style="padding:5px"><input type="text" name="email" placeholder="<?php echo $row['email']; ?>"></td>               
            </tr>
            <tr>
                <td colspan="2" style="padding:5px"><input type="submit" value="修改管理员"></td>               
            </tr>
        </table>
    </form>
</body>
</html>