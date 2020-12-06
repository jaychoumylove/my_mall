<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">

<title>修改密码</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>

</head>
<body>
<div id="main">
      <ul class="breadcrumbs">
          <li>修改密码</li>
          <li><a href="personal-main.html">会员中心</a></li>
      </ul>
      <div class="my_base my_pass" >
          <form method="post" action="/my_mall/home/user/ajaxpwd">
              <div class="my_bform clearfix">
                  <i><span>*</span>原密码：</i>
                  <input type="password" name="ouserpwd" class="my_bform_ipt password" value=""  />
                  <label>请填写原密码</label><label class="pf">原密码不正确</label>
                  <label class="ptr"><i class="fa fa-check-circle"></i></label> 
              </div>
              <div class="my_bform clearfix">
                  <i><span>*</span>新密码：</i>
                  <input type="password" name="userpwd" class="my_bform_ipt newpassword" value="" />
                  <label>请填写长度位6-20位有效的密码</label><label class="px">密码格式不正确</label><label class="pk">密码不能为空</label>
                  <label class="pt pt1"><i class="fa fa-check-circle"></i></label> 
              </div>
              <div class="my_bform clearfix">
                  <i><span>*</span>确认密码：</i>
                  <input type="password" name="ruserpwd" class="my_bform_ipt rnewpassword" value=""  /><label class="px">二次密码不相同</label><label class="pt"><i class="fa fa-check-circle"></i></label> 
              </div>
              <input type="submit" name="" class="suer_bn" value="修改"/>
        </form>
	</div>
</div>
</body>
</html>