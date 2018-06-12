$(document).ready(function () {

//轮播图
// var SowingMapImg=new Array("image/SowingMap/SowingIMG1.jpg","image/SowingMap/SowingIMG2.jpg","image/SowingMap/SowingIMG3.jpg");
// for(var i=0;i<SowingMapImg.length;i++) {
// 	setTimeout(alert(i),5000);

// }

//轮播图结束
	
//登录注册隐藏显示
    $(".login_btn").click(function(){
        $(".login_popup").toggle("fast");
    })
    $(".popup_close").click(function(){
        $(".login_popup").toggle("fast");
    })
//登录注册隐藏显示结束
   
})