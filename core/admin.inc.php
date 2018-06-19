<?php
//管理员操作

//判断是否有管理员账号
    function checkAdmin($sql){
        return fetchOne($sql);
    }

//检查是否登陆
    function checkLogined(){
        if(@$_SESSION['adminId']==""&&@$_COOKIE['adminId']==""){
            alertMes("请先登陆","../admin/adminLogin.html");
        }
    }



//注销管理员
    function logout(){
        $_SESSION=array();
//检测是否存在cookie值，清除自动登陆
        if(isset($_COOKIE[session_name()])){
//清楚自动登陆
            setcookie(session_name(),"",time()-1);
        }
        if(isset($_COOKIE['adminId'])){
            setcookie("adminId","",time()-1);
        }
        if(isset($_COOKIE['adminName'])){
            setcookie("adminName","",time()-1);
        }
    session_decode();
    header("location:index.php");
    }

//添加管理员信息函数
    function addAdmin(){
//判断传入数据是否为空
        if(!$_POST['usename']==null&&!$_POST['password']==null&&!$_POST['email']==null){
//将传过来的数据存到数组
            $arr=$_POST;
            $arr['password']=md5($_POST['password']);
//判断是否添加到数据库
            if(insert("wam_admin",$arr)){ 
                $mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>&nbsp;|&nbsp;<a href='listAdmin.php'>查看管理员列表</a>";
            }else{
                $mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
            }
            return $mes;
        }else{
            alertMes("管理员信息不能为空","addAdmin.php");            
        }
    }

//得到所有的管理员
function getAllAdmin(){
//用sql语句得到所有的管理员账号
        $sql="select id,usename,email from wam_admin";
//调用fetchAll函数得到所有的管理员
        $rows=fetchAll($sql);
        return $rows;
    }

//编辑管理员
function editAdmin($id){
//editAdmin中表单数据
        $arr=$_POST;
//密码加密
        $arr['password']=md5($_POST['password']);
//判断是否修改成功
        if(update("wam_admin",$arr,"id='$id'")){
            $mes="编辑成功！<a href='listAdmin.php'>查看管理员列表</a>";
        }else{
            $mes="编辑失败！<a href='listAdmin.php'>请重新修改</a>";
        }

        return $mes;
    }

//删除管理员
function delAdmin($id){
    if(delete("wam_admin","id='$id'")){
        $mes="删除成功！<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败! <a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}