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
    KE.show({
        id : 'content7',
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
	
	
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">订单管理</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab2" class="selected">订单管理</a></li> 
  	</ul>
    </div> 
    
  	<div id="tab2" class="tabson">
    <form action="/my_mall/Admin/Order/orderlist" method="post">
    <ul class="seachform">
    <li><label>订单状态</label>  
    <div class="vocation">
    <select class="select3" name="orderment">
        <option value="">全部</option>
        <option value="待付款">待付款</option>
        <option value="待发货">待发货</option>
        <option value="待收货">待收货</option>
        <option value="完成">完成</option>
        <option value="关闭">关闭</option>
    </select>
    </div>
    </li> 
    <li><label>订单号</label><input name="order_Num" type="text" class="scinput" /></li>
	<li><label>用户名</label><input name="user_Name" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
  
    </ul>
    </form> 
    <table class="tablelist">
    	<thead>
    	<tr>
        <th width="18%">订单号<i class="sort"><img src="/my_mall/Public/admin/images/px.gif" /></i></th>
        <th width="14%">用户名</th>
        <th width="6%">实付款</th>
        <th width="13%">下单时间</th>
        <th width="14%">订单状态</th>
        <th width="8%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <td><?php echo ($vo["order_Num"]); ?></td>
        <td><?php echo ($vo["user_Name"]); ?></td>
        <td><?php echo ($vo["pay"]); ?></td>
        <td><?php echo ($vo["paytime"]); ?></td>
		<td><?php echo ($vo["orderment"]); ?></td>
        <td><a href="/my_mall/Admin/Order/orderinfo/order_Num/<?php echo ($vo["order_Num"]); ?>" class="tablelink"> 查看 </a> 
        <?php if($vo["orderment"] == '待发货'): ?><a href="/my_mall/Admin/Order/send/order_Num/<?php echo ($vo["order_Num"]); ?>" class="tablelink"> 发货</a><?php endif; ?>
        </td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    
   <div class="pagin">
    	<div class="message">共<i class="blue"><?php echo ($rows_num); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($page_now); ?>&nbsp;</i>页，总共&nbsp;<i class="blue"><?php echo ($page_all); ?>&nbsp;</i>页
       </div>
       <ul class="paginList">
       <?php echo ($page); ?>
       </ul>
    </div>
    
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