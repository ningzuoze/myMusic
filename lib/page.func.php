<?php
//分页
require_once "../include.php";

// //得到所有的表单查询
// $sql="select * from wam_admin";

// //得到查询的条数
// $totalRows=getResultnum($sql);

// //定义一页显示的页码数
// $pageSize=2;

// //得到一共需要几页  ceil:取得最大的整数
// $totalPage=ceil($totalRows/$pageSize);

// //得到传过来的页码值如果没有的话默认为1
// @$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;

// //对page进行判断 不小于1 不为空 是数字
// if($page<1||$page==null||!is_numeric($page)){
//     $page=1;
// }

// //对传过来的page进行限制不能大于$totalRows
// if($page>=$totalPage)$page=$totalPage;


// //跳转页面显示的个数 （2-1）*2=2
// $offset=($page-1)*$pageSize;

// //limit:从那条开始 ，显示几条
// $sql="SELECT * FROM `wam_admin` limit {$offset},{$pageSize}";

// $rows=fetchAll($sql);
// // print_r($rows);

// //得到用户
// foreach($rows as $row){
//     echo "编号：".$row['id'],"<br/>";
//     echo "管理员的名称：".$row['usename'],"<hr/>";    
// }

// echo showPage($page,$totalPage,"id=act");


//分页函数showPage($当前页码,$可分为几页,传入的条件进行判断)
function showPage($page,$totalPage,$where=null){
    //对条件进行处理
    $where=($where==null)?null:"&".$where;

    //得到当前的路径 $_SERVER['PHP_SELF']
    $url=$_SERVER['PHP_SELF'];

    //创建首页 判断是否为首页（第一页）
    $index=($page==1)?"<input type='button' class='page' value='首页'>":"<a href='{$url}?page=1{$where}'><input type='button' class='pageA' value='首页'></a>";
    $last=($page==$totalPage)?"<input type='button' class='page' value='尾页'>":"<a href='{$url}?page={$totalPage}{$where}'><input type='button' class='pageA' value='尾页'></a>";
    $prev=($page==1)?"<input type='button' class='page' value='上一页'>":"<a href='{$url}?page=".($page-1)."{$where}'><input type='button' class='pageA' value='上一页'></a>";
    $next=($page==$totalPage)?"<input type='button' class='page' value='下一页'>":"<a href='{$url}?page=".($page+1)."{$where}'><input type='button' class='pageA' value='下一页'></a>";
    $str="总共{$totalPage}页/当前是第{$page}页";

    //循环出所有的页码
    for($i=1;$i<=$totalPage;$i++){
        
        //当前页无连接
        if($page==$i){
            @$p.="<input type='button' class='pageH' value='{$i}'>";
        }else{
            @$p.="<a href='{$url}?page={$i}{$where}'><input type='button' class='pageA' value='{$i}'></a>";
        }
    }
    $pageStr=$str."&nbsp;".$index."&nbsp;".$prev."&nbsp;".$p."&nbsp;".$next."&nbsp;".$last;    
    return @$pageStr;
}