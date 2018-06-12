<?php
//配置文件
// define("DB_HOST","localhost");//服务器名
// define("DB_USER","root");//数据库用户名
// define("DB_PWD","root");//数据库密码
// define("DB_DBNAME","woaimusic");//打开的数据库
// define("DB_CHARSET","utf8");//数据库编码

//完成插入数据的操作 insert(插入到那个表,插入的数据);
function insert($table,$array){
    //l链接数据库
        $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库链接失败Error:".mysql_errno().":".mysql_error());
        mysqli_set_charset($link,DB_CHARSET);
    //解析数组作为键
        $keys=join("`,`",array_keys($array));
    //解析数组为字符串为键值
        $vals=join("','",array_values($array));
    //插入语句 
        $sql="INSERT into {$table} (`$keys`) values ('$vals')";
        mysqli_query($link,$sql);
    //返回上一步 INSERT 操作产生的 ID
        return mysqli_insert_id($link);
    //关闭数据库
        mysqli_close($link);
    }

//更新数据操作
//update table set key=value where id=1 
//update 表名   set   键=键值   where      条件
function update($table,$array,$where=null){
//l链接数据库
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or sdie("数据库链接失败Error:".mysql_errno().":".mysql_error());
    mysqli_set_charset($link,DB_CHARSET);
//定义变量
    $str="";
    $sep="";
//循环数组内容变成sql语句
    foreach($array as $key=>$val){
        if($str==null){
            $sep=" ";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."="."'".$val."'"."";
    }
//跟新语句
    $sql="update {$table} set {$str} ".($where==null?null:$where=" where {$where}");
    mysqli_query($link,$sql);
//返回修改的条数
    return mysqli_affected_rows($link);
//关闭数据库
    mysqli_close($link);
}

//删除数据操作
function delete($table,$where){
//l链接数据库
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库链接失败Error:".mysql_errno().":".mysql_error());
    mysqli_set_charset($link,DB_CHARSET);
//判断条件是否存在，不存在的话删除整个表格
    $where=$where==null?null:$where;
// $where=$where==null?null:"where".$where    
//sql语句
    $sql="DELETE FROM {$table} WHERE {$where}";
// $sql="delete form {$table}{$where}";    
    mysqli_query($link,$sql);
//返回修改的条数
    return mysqli_affected_rows($link);
//关闭数据库
    mysqli_close($link);
}


//得到查询的一条数据
function fetchOne($sql){
//l链接数据库
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库链接失败Error:".mysql_errno().":".mysql_error());
    mysqli_set_charset($link,DB_CHARSET);
//查询整个数据 
     $result=mysqli_query($link,$sql);
//显示一条数据并以数组显示
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $row;
//关闭数据库
    mysqli_close($link);
}

//得到查询所有的数据
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
//l链接数据库
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库链接失败Error:".mysql_errno().":".mysql_error());
    mysqli_set_charset($link,DB_CHARSET);
//查询整个数据
    $result=mysqli_query($link,$sql);
//数组显示
    while(@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
//关闭数据库
    mysqli_close($link);

}

//得到处理数据条数
function getResultnum($sql){
//l链接数据库
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库链接失败Error:".mysql_errno().":".mysql_error());
    mysqli_set_charset($link,DB_CHARSET);
//执行sql语句
    $result=mysqli_query($link,$sql);
//得到操作数量
    return mysqli_num_rows($result);
//关闭数据库
    mysqli_close($link);
}