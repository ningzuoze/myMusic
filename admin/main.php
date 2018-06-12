<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
</head>
<body>
    <center>
        <h3>系统信息</h3>
        <table width="70%" border="1" cellpadding="5" bgcolor="#ccc">
            <tr>
                <th>操作系统</th>
                <!-- windows版本信息 -->
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <!-- Apache版本信息 -->                
                <th>Apache版本</th>
                <td><?php echo apache_get_version();?></td>
            </tr>
            <tr>
                <!-- PHP版本信息 -->                
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <!-- 运行方式 -->                
                <th>运行方式</th>
                <td><?php echo PHP_SAPI;?></td>
            </tr>
        </table>
        <h3>网站信息</h3>  
        <table width="70%" border="1" cellpadding="5" bgcolor="#ccc">
            <tr>
                <th>网站名称</th>
                <td>我爱音乐网</td>
            </tr>
            <tr>
                <th>开发团队</th>
                <td>ningzuoze</td>
            </tr>
            <tr>
                <th>版权所有</th>
                <td>ningzuoze</td>
            </tr>
        </table>              
    </center>
</body>
</html>