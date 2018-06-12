<?php
//包含文件
require_once "string.func.php";
    
     

//通过GD库做验证码 verifyImage(定义类型,验证码长度,干扰点,干扰直线)
function verifyImage($type=1, $length=4,$pixel=50,$line=3,$sess_name="verify"){
    //开启session
    if(!isset($_SESSION)){
        session_start();
    }
    //定义画布宽高
    $width=80;
    $height=30;
    //创建画布
    $image=imagecreatetruecolor($width,$height);
    //创建画布颜色
    $romDomColor=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
    $white=imagecolorallocate($image,255,255,255);
    $black=imagecolorallocate($image,0,0,0);
    //用填充矩形填充画布背景
    imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
    //随机获取验证码函数
    $chars=buildRandomString($type,$length);
    $_SESSION[$sess_name]=$chars;
    //创建数组存放字体
    $fontfiles=array("corbel.ttf","corbelb.ttf","corbeli.ttf","corbelz.ttf","framd.ttf","framdit.ttf");
    //要产生的验证码
    for($i=0;$i<$length;$i++){
    //随机字体大小
        $size=mt_rand(14,18);
    //随机字体角度
        $angle=mt_rand(-15,15);
    //随机单个验证码坐标
        $x=5+$i*$size;
        $y=20;
    //随机验证码颜色
        $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
    //随机产生字体
        $fontfile="C:\Windows\Fonts\\".$fontfiles[mt_rand(0,count($fontfiles)-1)];
    //产生随机的字符串
        $text=substr($chars,$i,1);
        imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
        //注意字体路径
    }  
    //随机干扰点
        for($i=0;$i<$pixel;$i++){
            imagesetpixel($image,mt_rand(0,$width-1),mt_rand(0,$height-1),$romDomColor);
        }
    //随机干扰直线
        for($i=0;$i<$line;$i++){
            imageline($image,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$romDomColor);
        }


    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
// verifyImage();