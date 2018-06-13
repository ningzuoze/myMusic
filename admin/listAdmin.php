<?php
    require_once '../include.php';
//获取所有的管理员账号
//$rows=getAllAdmin();


//得到所有的表单查询
$sql="select * from wam_admin";

//得到查询的条数
    $totalRows=getResultnum($sql);

//定义一页显示的页码数
    $pageSize=2;

//得到一共需要几页  ceil:取得最大的整数
    $totalPage=ceil($totalRows/$pageSize);

//得到page值
    @$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }

//对传过来的page进行限制不能大于$totalRows
    if($page>=@$totalPage)$page=@$totalPage;

//跳转页面显示的个数 （2-1）*2=2
    $offset=($page-1)*$pageSize;

//limit:从那条开始 ，显示几条
    $sql="SELECT id,usename,email FROM `wam_admin` limit {$offset},{$pageSize}";

    @$rows=fetchAll($sql);


//判断是否有管理员
    if(!$rows){
        alertMes("暂无管理员，请添加！","addAdmin.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="style/backstage.css">
</head>

    <body>
    <div class="cont">
        <div class="details">
            <div class="details_operation clearfix">
                <div class="bui_select">
                    <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="window.location='addAdmin.php'">
                </div>
            </div>
            <!--表格-->
            <table class="table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="15%">编号</th>
                        <th width="25%">管理员名称</th>
                        <th width="35%">管理员邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <!-- 利用foreach对数据库的参数进行赋值 -->
                <?php foreach($rows as $row){;?>
                    <tr>
                        <!--这里的id和for里面的c1 需要循环出来-->
                        <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row["id"]; ?></label></td>
                        <td><?php echo $row['usename'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td align="center">
                        <!-- 修改数据库管理员 -->
                            <input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row["id"];?>)">
                            <input type="button" value="删除" class="btn" onclick="delAdmin(<?php echo $row["id"];?>)">
                        </td>
                    </tr>
                <?php ;};?>
                <?php if($rows>$pageSize):?>
                    <tr>
                        <td colspan="4"><?php echo showPage($page,$totalPage);?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        // 修改管理员操作函数
        function editAdmin(id){
            window.location="editAdmin.php?id="+id;
        } 
        function delAdmin(id){
            if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                window.location="doAdminAction.php?act=delAdmin&id="+id;
            }
                     
        }
    </script>
</html>