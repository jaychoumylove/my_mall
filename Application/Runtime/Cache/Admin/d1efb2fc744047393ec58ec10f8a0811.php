<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/my_mall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/my_mall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/my_mall/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/my_mall/Public/admin/js/jquery.min.js"></script> 
<script type="text/javascript" src="/my_mall/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>
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
<script type="text/javascript">
$(document).ready(function() {

	$("#checkAll").click(function(){
		
		if(this.checked){
			$(".checkbox_Id").prop("checked",true);
		}else{
			$(".checkbox_Id").prop("checked",false);
		}
		
	});	
	
	
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">用户管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1">添加用户</a></li> 
    <li><a href="#tab2" class="selected">用户管理</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">    
    <ul class="forminfo">
 	<form action="/my_mall/Admin/User/add" method="post" enctype="multipart/form-data">
    <li><label>用户名<b>*</b></label><input name="username" type="text" class="dfinput" /></li> 
    <li><label>密码<b>*</b></label>
    <input name="userpwd" type="password" class="dfinput" />
    </li>
    <li><label>重复密码<b>*</b></label>
    <input name="ruserpwd" type="password" class="dfinput" />
    </li>      
    <li><label>性别<b>*</b></label>
    <input name="sex" type="radio" value="男"  checked="checked"/> 男 
    <input name="sex" type="radio"  value="女"  /> 女
    </li>
    <li><label>昵称<b>*</b></label><input name="realname" type="text" class="dfinput"  /></li>
     <li><label>手机号码<b>*</b></label><input name="phone" type="text" class="dfinput"  /></li>
    <li><label>邮箱<b>*</b></label><input name="email" type="text" class="dfinput"  /></li>
    <li><label>头像<b>*</b></label><input name="userphoto" type="file" class="dfinput"  /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </form>
    </ul>  
    
    </div> 
    
    
  	<div id="tab2" class="tabson">
    
    <form action="/my_mall/Admin/User/userlist" method="post">
    <ul class="seachform">
    <li><label>性别</label>  
    <div class="vocation">
    <select class="select3" name="sex">
        <option value="">全部</option>
        <option value="男">男</option>
        <option value="女">女</option>
    </select>
    </div>
    </li>   
  
	<li><label>昵称/用户名</label><input name="name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form>
  <form action="/my_mall/Admin/User/delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="7%"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="14%">用户名<i class="sort"><img src="/my_mall/Public/admin/images/px.gif" /></i></th>
        <th width="14%">昵称</th>
        <th width="5%">性别</th>
        <th width="20%">电子邮箱</th>
        <th width="15%">手机号码</th>
        <th width="15%">新增时间</th>
        <th width="10%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><input name="checkbox_Id[]" type="checkbox" value="<?php echo ($vo["Id"]); ?>"  class="checkbox_Id"/><img src="/my_mall/Public/uploads/userphoto/<?php echo ($vo["userphoto"]); ?>" style="height:35px; width:35px;vertical-align:middle; border-radius:17px; overflow:hidden;" alt="<?php echo ($vo["username"]); ?>"/>  </td>
        <td><?php echo ($vo["username"]); ?></td>
        <td><?php echo ($vo["realname"]); ?></td>
        <td><?php echo ($vo["sex"]); ?></td>
        <td><?php echo ($vo["email"]); ?></td>
        <td><?php echo ($vo["phone"]); ?></td>
        <td><?php echo ($vo["addtime"]); ?></td>
		<td><a href="/my_mall/Admin/User/update/Id/<?php echo ($vo["Id"]); ?>" class="tablelink"> 查看/修改</a>    <a href="/my_mall/Admin/User/del/Id/<?php echo ($vo["Id"]); ?>" class="tablelink"> 删除</a></td>
        </tr><?php endforeach; endif; ?>
       
       <tr>
        <td colspan="2"><a class="tablelink click">删除全部<?php echo ($sex); echo ($username); ?></a></td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        <td>&nbsp;</td>
        </tr> 
        </tbody>
    </table>
    
   <div class="pagin">
    	<div class="message">共<i class="blue"><?php echo ($rows_num); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($page_now); ?>&nbsp;</i>页，总共&nbsp;<i class="blue"><?php echo ($page_all); ?>&nbsp;</i>页
       </div>
       <ul class="paginList">
       <?php echo ($page); ?>
       </ul>
    </div>
  	<div class="tip">
     <div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/my_mall/Public/admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的删除？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="submit"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div> 
    
	</form>
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

    </div>


</body>

</html>