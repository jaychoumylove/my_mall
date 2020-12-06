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
    <li><a href="#">修改产品信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>产品信息</span></div>
	<ul class="forminfo">
 	<form action="" method="post" enctype="multipart/form-data">
    <li><label>修改产品名称<b>*</b></label><input name="name" type="text" class="dfinput" value="<?php echo ($data["name"]); ?>"  /><input name="Id" type="hidden"  value="<?php echo ($data["aId"]); ?>"  /></li> 
    <li>
    <label>修改产品分类<b>*</b></label>
    <div class='vocation'>
    <select name='classId' class='select1'>
    	<option value="<?php echo ($data["classId"]); ?>"><?php echo ($data["bName"]); ?></option>
        <?php if(is_array($procl)): foreach($procl as $key=>$vl): ?><option value="<?php echo ($vl["Id"]); ?>"><?php echo ($vl["name"]); ?></option><?php endforeach; endif; ?>
    </select>
    </div>
    </li>
    <?php $__FOR_START_14869__=0;$__FOR_END_14869__=3;for($i=$__FOR_START_14869__;$i < $__FOR_END_14869__;$i+=1){ ?><!-- comparison=""-->
    <li><img src="/my_mall/Public/uploads/product_img/<?php echo ($show_img["$i"]); ?>" style="width:80px; height:80px; vertical-align:middle;"/></li>
    <li>
    <label>产品展示图<b>*</b></label>
    <input name="show_img[]" type="file" class="dfinput" />
    <input type="hidden" value="<?php echo ($show_img["$i"]); ?>" name="show_imgh[]" />
    </li><?php } ?>
    <li>
    <input type="hidden" value="<?php echo ($data["product_img"]); ?>" name="product_imgh" />
    <label>市场价<b>*</b></label><input name="machete_price" type="text" class="dfinput" value="<?php echo ($data["machete_price"]); ?>" placeholder="请输入产品市场价"/></li>
    <li><label>本店价<b>*</b></label><input name="here_price" type="text" class="dfinput" value="<?php echo ($data["here_price"]); ?>" placeholder="请输入你的产品优购价"/></li>
    <li><label>库存<b>*</b></label><input name="stock" type="text" class="dfinput" value="<?php echo ($data["stock"]); ?>" placeholder="请输入你的产品库存"/></li>
    <li><label>是否热销<b>*</b></label>
    <?php if($data["ishot"] == '是'): ?><input name="ishot" type="radio" value="是"  checked="checked"/> 是
    <input name="ishot" type="radio"  value="否"  /> 否
    <?php else: ?> 
    <input name="ishot" type="radio" value="是" /> 是
    <input name="ishot" type="radio"  value="否"   checked="checked"/> 否<?php endif; ?>
    </li> 
    <li><label>是否上架<b>*</b></label>
    <?php if($data["isput_on"] == '是'): ?><input name="isput_on" type="radio" value="是"  checked="checked"/> 是
    <input name="isput_on" type="radio"  value="否"  /> 否
    <?php else: ?> 
    <input name="isput_on" type="radio" value="是" /> 是
    <input name="isput_on" type="radio"  value="否"  checked="checked"/> 否<?php endif; ?>
    </li>
   <li><label>产品详情描述<b>*</b></label><textarea id="content7" name="description" style="width:700px;height:250px;visibility:hidden;"><?php echo ($data["description"]); ?></textarea></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    </ul>    

 
</div>
</body>

</html>