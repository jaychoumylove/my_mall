<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/my_mall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/my_mall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/my_mall/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/my_mall/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">修改用户信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>用户信息</span></div>
    
    
	<ul class="forminfo">
 	<form action="" method="post" enctype="multipart/form-data">
    <li><label>用户名<b>*</b></label><img src="/my_mall/Public/admin/uploads/userphoto/<?php echo ($data["userphoto"]); ?>" style="height:35px; width:35px;vertical-align:middle; border-radius:17px; overflow:hidden;" alt="<?php echo ($data["username"]); ?>"/><?php echo ($data["username"]); ?><input name="Id" type="hidden"  value="<?php echo ($data["Id"]); ?>"  /><input name="userphotoh" type="hidden"  value="<?php echo ($data["userphoto"]); ?>"  /></li> 
    <li><label>密码<b>*</b></label>
    <input name="userpwd" type="password" class="dfinput" />
    <input name="userpwdh" type="hidden" class="dfinput" value="<?php echo ($data["userpwd"]); ?>"  />
    </li> 
    <li><label>性别<b>*</b></label>
    <?php if($data["sex"] == '男'): ?><input name="sex" type="radio" value="男"  checked="checked"/> 男 
    <input name="sex" type="radio"  value="女"  /> 女
    <?php else: ?> 
    <input name="sex" type="radio" value="男"  /> 男 
    <input name="sex" type="radio"  value="女" checked="checked" /> 女<?php endif; ?>
    </li> 
    <li><label>昵称<b>*</b></label><input name="realname" type="text" class="dfinput" value="<?php echo ($data["realname"]); ?>"  /></li> 
    <li><label>邮箱<b>*</b></label><input name="email" type="text" class="dfinput" value="<?php echo ($data["email"]); ?>"  /></li>
    <li><label>手机号码<b>*</b></label><input name="phone" type="text" class="dfinput" value="<?php echo ($data["phone"]); ?>"  /></li>
	<li><label>修改头像<b>*</b></label><input name="userphoto" type="file" class="dfinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    </ul>    

 
</div>
</body>

</html>