<?php
header("content-type:text/html;charset=utf-8");

//包含所有PHP文件用时引用就行
if(!isset($_SESSION)){
    session_start();
}
//定义常量 dirname(__FILE__)当前文件路径 根路径
define("ROOT",dirname(__FILE__));
//包含路径
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/config".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT.get_include_path());

require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'cate.inc.php';


