<?php
require_once "../include.php";

//得到通过js传过来的id
$id=$_REQUEST['id'];
//查询与id一致的管理员信息
$sql="SELECT `id`, `cName` FROM `wam_cate` WHERE id='{$id}'";
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
    <form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
        <table width="70%" border="1" cellspacing="0"  bgcolor="#ccc">
            <tr>
                <td align="right" style="padding:5px">分类名</td>
                <td style="padding:5px"><input type="text" name="cName" placeholder="<?php echo $row['cName']; ?>"></td>               
            </tr>
            <tr>
                <td colspan="2" style="padding:5px"><input type="submit" value="修改分类"></td>               
            </tr>
        </table>
    </form>
</body>
</html>