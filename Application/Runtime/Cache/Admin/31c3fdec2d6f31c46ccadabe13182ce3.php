<?php if (!defined('THINK_PATH')) exit(); echo '<?'; ?>

	require("Include/mysql_open.php");
	require("Include/ck_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <li><a href="#">产品管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1">添加产品</a></li> 
    <li><a href="#tab2" class="selected">产品管理</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">    
    <ul class="forminfo">
 	<form action="/my_mall/Admin/Product/add" method="post"  enctype="multipart/form-data">
    <li><label>产品名称<b>*</b></label><input name="name" type="text" class="dfinput" placeholder="请输入你要添加的产品名称。" /></li>
    <li>
    <label>所属分类：<b>*</b></label>
    <div class="vocation">
    <select name="classId" class="select1">
    	<option value="">请选择：</option>
    	<?php if(is_array($procl)): foreach($procl as $key=>$vl): ?><option value="<?php echo ($vl["Id"]); ?>"><?php echo ($vl["name"]); ?></option><?php endforeach; endif; ?>
    </select>
    </div>
    </li>
    <?php $__FOR_START_22476__=0;$__FOR_END_22476__=3;for($i=$__FOR_START_22476__;$i < $__FOR_END_22476__;$i+=1){ ?><li><label>产品展示图<b>*</b></label><input name="show_img[]" type="file" class="dfinput"/></li><?php } ?>
    <li><label>库存<b>*</b></label><input name="stock" type="text" class="dfinput" placeholder="请输入产品库存"/></li>
    <li><label>市场价<b>*</b></label><input name="machete_price" type="text" class="dfinput" placeholder="请输入产品市场价"/></li>
    <li><label>本店价<b>*</b></label><input name="here_price" type="text" class="dfinput" placeholder="请输入产品本店价"/></li>
    <li><label>是否热销<b>*</b></label>
    <input name="ishot" type="radio" value="是" /> 是
    <input name="ishot" type="radio"  value="否" checked="checked"  /> 否
    </li> 
    <li><label>是否上架<b>*</b></label>
    <input name="isput_on" type="radio" value="是"  checked="checked"/> 是
    <input name="isput_on" type="radio"  value="否"  /> 否
    </li>
    <li><label>产品详情描述<b>*</b></label><textarea id="content7" name="description" style="width:700px;height:250px;visibility:hidden;"></textarea></li>
    
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
    </form>
    </ul>  
    
    </div> 
    
    
  	<div id="tab2" class="tabson">
    <form action="/my_mall/Admin/Product/product" method="post">
    <ul class="seachform">
    <li><label>产品类别</label>  
    <div class="vocation">
    <select class="select3" name="classId">
        <option value="">全部</option>
        <?php if(is_array($procl)): foreach($procl as $key=>$vl): ?><option value="<?php echo ($vl["Id"]); ?>"><?php echo ($vl["name"]); ?></option><?php endforeach; endif; ?>
    </select>
    </div>
    </li>   
  
	<li><label>产品名称</label><input name="name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form>

  <form action="/my_mall/Admin/Product/delAll" method="post">  
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="14%" height="77"><input name="checkAll" id="checkAll" type="checkbox" value=""/></th>
        <th width="26%">产品名称<i class="sort"><img src="/my_mall/Public/admin/images/px.gif" /></i></th>
        <th width="9%">本店(市场)价</th>
        <th width="9%">是否热销</th>
        <th width="9%">是否上架</th>
        <th width="11%">销量</th>
        <th width="11%">库存</th>
        <th width="9%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td width="14%" style="text-align:center;"><input style="margin-right:10px;" name="checkbox_Id[]" type="checkbox" value="<?php echo ($vo["aId"]); ?>"  class="checkbox_Id"/>
          <img src="/my_mall/Public/uploads/product_img/<?php echo ($vo["product_img"]); ?>" style="height:80px; width:80px; vertical-align:middle; margin:10px;"/></td>
        <td width="26%"><?php echo ($vo["name"]); ?><br/><br/>
        	<?php echo ($vo["bName"]); ?>
        </td>
        <td width="9%"><i style="text-decoration:line-through"><?php echo ($vo["machete_price"]); ?></i><br/><?php echo ($vo["here_price"]); ?></td>
        <td width="9%"><?php echo ($vo["ishot"]); ?></td>
        <td width="9%"><?php echo ($vo["isput_on"]); ?></td>
        <td width="11%"><?php echo ($vo["sales_vol"]); ?></td>
        <td width="11%"><?php echo ($vo["stock"]); ?></td>
        <td width="9%"><a href="/my_mall/Admin/Product/update/Id/<?php echo ($vo["aId"]); ?>" class="tablelink">查看/修改</a><a href="/my_mall/Admin/Product/del/Id/<?php echo ($vo["aId"]); ?>" class="tablelink">删除</a></td>
        </tr><?php endforeach; endif; ?>
       
       <tr>
        <td colspan="8"><a class="tablelink click">删除全部</a></td>
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