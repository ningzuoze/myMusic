<?php
require_once("../include.php");
checkLogined();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link rel="stylesheet" href="style/backstage.css">
<script src="js/jquery.min.js"></script>
</head>

<body>
    <div class="head">
            <div class="logo fl"></div>
            <h3 class="head_text fr">我爱音乐网后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">后台管理</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
        <div class="link fr">
            <b>欢迎您:<?php
            if(isset($_SESSION["adminName"])){
                echo $_SESSION["adminName"];
            }elseif(isset($_COOKIE['adminName'])){
                echo $_COOKIE['adminName'];
            }
              ?><b><span><span>
            <a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="500px"></iframe>
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span>+</span>商品管理</h3>
                    </li>
                    <li>
                        <h3><span>+</span>订单管理</h3>
                    </li>
                    <li>
                        <h3 id="change3"><span>+</span>歌曲类别管理</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>+</span>用户管理</h3>
                    </li>
                    <li>
                        <h3 id="change5"><span>+</span>管理员管理</h3>
                        <dl id="menu5" style="display:none;">
                            <dd><a href="addadmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        
        $(function(){
            //开关
            var key1=true;

            //列表收缩加减变化
            $("#change5").click(function(){
                if(key1){
                    $('#change5 span').text("-");
                    $('#menu5').toggle();
                    key1=false; 
                }else{
                    $('#change5 span').text("+");
                    $('#menu5').toggle();
                    key1=true;       
                }
            })
            $("#change3").click(function(){
                if(key1){
                    $('#change3 span').text("-");
                    $('#menu3').toggle();
                    key1=false; 
                }else{
                    $('#change3 span').text("+");
                    $('#menu3').toggle();
                    key1=true;       
                }
            })
        })
    </script>
</body>
</html>