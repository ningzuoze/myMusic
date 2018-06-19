<?php
//管理员页面的操作
    require_once '../include.php';
    $act=$_REQUEST["act"];
    @$id=$_REQUEST['id'];
//管理员账户退出操作
    if($act=="logout"){
        logout();
//添加管理员操作
    }elseif ($act=="addAdmin")  {
        $mes=addAdmin();    
//编辑管理员操作
    }elseif($act=="editAdmin"){
        $mes=editAdmin($id);
//删除管理员操作
    }elseif($act=="delAdmin"){
        $mes=delAdmin($id);
//添加个歌曲分类        
    }elseif($act=="addCate"){
        $mes=addCate();
//编辑分类信息操作
    }elseif($act=="editCate"){
        $mes=editCate($id);        
//删除分类信息        
    }elseif($act=="delCate"){
        $mes=delCate($id);
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
</head>
<body>
    <?php
    if(@$mes){
        echo $mes;
    }
    ?>
</body>
</html>