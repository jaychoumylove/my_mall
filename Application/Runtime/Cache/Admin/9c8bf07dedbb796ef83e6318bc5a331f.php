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
<link rel="stylesheet" href="/my_mall/Public/admin/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/my_mall/Public/admin/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/my_mall/Public/admin/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#content7', {
			allowFileManager : true
		});
	});
</script>
<script type="text/javascript">
    KE.show({
        id : 'content6',
        cssPath : './index.css'
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
	$("#chkbox").blur(function(){
		$.ajax({
			type:"get",
			url:"ajax_chk.php",
			data:"name="+$("#chkbox").val(),
			success: function(d){
				$("#chk_box").html(d);
			}
		})
	})
	
});
</script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">产品类别管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1">添加产品类别</a></li> 
    <li><a href="#tab2" class="selected">类别管理</a></li> 
  	</ul>
    </div> 
   
  	<div id="tab1" class="tabson">    
    <ul class="forminfo">
 	<form action="/my_mall/Admin/Category/add" method="post" enctype="multipart/form-data">
    <!--<li>
    <label>选择产品分类<b>*</b></label>
    <div class="vocation">
    <select name="parentId" class="select1">
 	<option value="0">一级分类</option>
    <?php if(is_array($procl)): foreach($procl as $key=>$vl): ?><option value="<?php echo ($vl["Id"]); ?>"><?php echo ($vl["name"]); ?></option><?php endforeach; endif; ?>
    </select>
    </div> </li>-->
    <li><label>产品类别名称<b>*</b></label><input type="text" name="name" border="1px" class="dfinput"/></li>
    <li><label>产品类别图<b>*</b></label><input name="CG_img" type="file" class="dfinput"/></li>
    <li><label>产品类别描述<b>*</b></label><textarea id="content7" name="description" style="width:700px;height:200px;visibility:hidden;"></textarea></li>
    
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </form>
    </ul>  
    
    </div> 
    
    
  	<div id="tab2" class="tabson">
     
  <form action="/my_mall/Admin/Category/delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="10%"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="23%">类别名称<i class="sort"><img src="/my_mall/Public/admin/images/px.gif" /></i></th>
        <th width="12%">添加时间</th>
        <th width="40%">描述</th>
        <th width="15%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td width="12%"><input name="checkbox_Id[]" type="checkbox" value="<?php echo ($vo["Id"]); ?>"  class="checkbox_Id"/><img src="/my_mall/Public/uploads/Pclass/<?php echo ($vo["CG_img"]); ?>" style="height:80px; width:80px; vertical-align:middle; margin:10px;"/>  </td>
        <td width="23%"><?php echo ($vo["name"]); ?></td>
        <td width="12%"><?php echo ($vo["addtime"]); ?></td>
        <td width="40%"><?php echo ($vo["description"]); ?></td>
        <td width="15%"><a href="/my_mall/Admin/Category/update/Id/<?php echo ($vo["Id"]); ?>" class="tablelink">查看/修改</a><a href="/my_mall/Admin/Category/del/Id/<?php echo ($vo["Id"]); ?>" class="tablelink">删除</a></td>
        </tr><?php endforeach; endif; ?>	
       <tr>
        <td colspan="2"><a class="tablelink click">删除全部</a></td>
        <td></td>
        <td>&nbsp;</td>
        <td width="15%">&nbsp;</td>
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