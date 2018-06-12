<?php

//产生字符串
function buildRandomString($type,$length){//验证类型,验证码长度
    //产生纯数字字符串
    if($type==1){
    //join()将数组内容转换为字符串用空格链接range()产生制定范围的数组
        $chars=join("",range(0,9));
    //产生纯字母字符串
    }elseif($type==2){
    //array_merge()合并数组
        $chars=join("",array_merge(range("a","z"),range("A","Z")));
    //产生字母加数字字符串
    }elseif($type==3){
        $chars=join("",array_merge(range(0,9),range("a","z"),range("A","Z")));
    }
    if($length>strlen($chars)){
        exit("字符串长度不够");
    }
    //str_shuffle()打乱字符串
    $chars=str_shuffle($chars);
    //substr()截取字符串
    return substr($chars,0,$length);    
}
