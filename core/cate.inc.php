<?php

//添加歌曲分类
    function addCate(){
//接收传过来的信息
        if(!$_POST['cName']==null){
            $arr=$_POST;
            if(insert("wam_cate",$arr)){
                $mes="分类添加成功！<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看列表</a>";
            }else {
                $mes="分类添加失败！<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看列表</a>";
            }
            return $mes;
        }else{
            alertMes("分类信息不能为空","addCate.php");
        }
//判断是否传输成功
    }

//编辑管理员
    function editCate($id){
//editCate中表单数据
        if(!$_POST['cName']==null){
            $arr=$_POST;            
//判断是否修改成功
            if(update("wam_cate",$arr,"id='$id'")){
                $mes="编辑成功！<a href='listCate.php'>查看歌曲分类列表</a>";
            }else{
                $mes="编辑失败！<a href='listCate.php'>请重新修改</a>";
            }
            return $mes;
        }else{
            alertMes("分类信息不能为空","addCate.php");            
        }
    }

//删除管理员
    function delCate($id){
        if(delete("wam_cate","id='$id'")){
            $mes="删除成功！<a href='listCate.php'>查看歌曲分类列表</a>";
        }else{
            $mes="删除失败! <a href='listCate.php'>请重新删除</a>";
        }
        return $mes;
    }
