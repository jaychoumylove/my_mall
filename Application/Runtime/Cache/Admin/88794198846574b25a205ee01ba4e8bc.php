<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/my_mall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/my_mall/Public/admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		
		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}
			
			
		}
	});
	
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#fff3e1;">
	<div class="lefttop"><span></span>功能列表</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/my_mall/Public/admin/images/leftico01.png" /></span>管理信息
    </div>
    	<ul class="menuson">
        <!--<li><div class="header"><cite></cite><a href="zhandian.html" target="rightFrame">站点管理</a><i></i></div></li>
        <li><div class="header"><cite></cite><a href="zhuanye.html" target="rightFrame">专业管理</a><i></i></div></li>
        <li><div class="header"><cite></cite><a href="kecheng.html" target="rightFrame">课程管理</a><i></i></div></li>-->   
        <li><div class="header"><cite></cite><a href="/my_mall/admin/user/userlist/" target="rightFrame">用户管理</a><i></i></div></li>      
        <li>
            <div class="header">
            <cite></cite>
            <a target="rightFrame">产品管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="/my_mall/admin/category/category/" target="rightFrame">产品分类</a></li>
            <li><a href="/my_mall/admin/product/product/" target="rightFrame">产品列表</a></li>
            </ul>
        </li>
        <li><div class="header"><cite></cite><a href="/my_mall/admin/order/orderlist/" target="rightFrame">订单管理</a><i></i></div></li>
        <!--<li><cite></cite><a href="error.html" target="rightFrame">404页面</a><i></i></li>-->
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="/my_mall/Public/admin/images/leftico02.png" /></span>其他设置
    </div>
    <ul class="menuson">
  		<li><cite></cite><a href="/my_mall/admin/admin/admin/" target="rightFrame">管理员管理</a><i></i></li>
        <!--<li><cite></cite><a href="juese.html" target="rightFrame">角色管理管理</a><i></i></li>
        <li><cite></cite><a href="tech.html" target="rightFrame">技术支持</a><i></i></li>-->
        </ul>     
    </dd> 
    
    
    <!--<dd><div class="title"><span><img src="/my_mall/Public/admin/images/leftico03.png" /></span>编辑器</div>
    <ul class="menuson">
        <li><cite></cite><a href="#">自定义</a><i></i></li>
        <li><cite></cite><a href="#">常用资料</a><i></i></li>
        <li><cite></cite><a href="#">信息列表</a><i></i></li>
        <li><cite></cite><a href="#">其他</a><i></i></li>
    </ul>    
    </dd>-->  
    
    
    <!--<dd><div class="title"><span><img src="/my_mall/Public/admin/images/leftico04.png" /></span>日期管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="#">自定义</a><i></i></li>
        <li><cite></cite><a href="#">常用资料</a><i></i></li>
        <li><cite></cite><a href="#">信息列表</a><i></i></li>
        <li><cite></cite><a href="#">其他</a><i></i></li>
    </ul>
    
    </dd>-->   
    
    </dl>
    
</body>
</html>