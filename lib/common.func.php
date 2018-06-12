<?php 
//公共函数

//弹出并跳转
    function alertMes($mes,$url){
        echo "<script>alert('{$mes}');</script>";
        echo "<script>window.location='{$url}';</script>";
    }