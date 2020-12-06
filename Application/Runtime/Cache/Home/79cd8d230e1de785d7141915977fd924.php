<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">
<title>我的订单</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>
<script src="/my_mall/Public/home/js/area.js"></script>

</head>
<body>
<div class="main">
    <ul class="breadcrumbs">
        <li>我的订单</li>
        <li><a href="/my_mall/hoem/user/user">会员中心</a></li>
    </ul>
	<div class="comment_list">
      <div class="n_kql_dd">
              <h2>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="none">
                  <tr>
                    <td width="12%"><!--<input name="" type="checkbox" value="" />--></td>
                    <td width="25%" align="center">商品</td>
                    <td width="11%" align="center">数量</td>
                    <td width="16%" align="center"> 订单金额</td>
                    <td width="12%" align="center">
                    <form action="/my_mall/home/order/orderlist" method="post">
                    <select id="orderment" name="orderment">
                    <option value="" <?php if($orderment == ''): ?>selected<?php endif; ?>>所有订单</option>
                    <option value="待付款" <?php if($orderment == '待付款'): ?>selected<?php endif; ?>>待付款</option>
                    <option value="待发货" <?php if($orderment == '待发货'): ?>selected<?php endif; ?>>待发货</option>
                    <option value="确认收货" <?php if($orderment == '确认收货'): ?>selected<?php endif; ?>>待收货</option>
                    <option value="完成" <?php if($orderment == '完成'): ?>selected<?php endif; ?>>完成</option>
                    <option value="关闭" <?php if($orderment == '关闭'): ?>selected<?php endif; ?>>关闭</option>
                    </select>
                    </form>
                    </td>
                    <td width="10%" align="center">状态</td>
                    <td width="11%" align="center">操作</td>
                  </tr>
                </table>
              </h2>
              <ul>
              <?php if($len == 0): ?><li>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="n_kql_dd_h3">
                      <td height="40" colspan="7" bgcolor="#fbfaf8" style="text-align:center"> &nbsp;
                       <!-- <input name="" type="checkbox" value="" />-->
                       找不到订单哦！快去<a href="/my_mall/home/product/product" target="_blank">购物中心</a>选购吧！
                      </td>
                    </tr>
                </table>
             </li><?php endif; ?>
              <?php $i=0;$m=1;?>
              <?php if(is_array($data)): foreach($data as $key=>$vo): if($data[$i]['O_Num'] == $data[$i-1]['O_Num']): elseif($data[$i]['O_Num'] != $data[$i-1]['O_Num']): ?>
                  <li>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr class="n_kql_dd_h3">
                      <td height="40" colspan="7" bgcolor="dcd9d9"> &nbsp;
                      订单号：<i class="t_v_zhanghu_cor1"><?php echo ($vo["O_Num"]); ?></i></td>
                    </tr><?php endif; ?>
                    <tr>
                      <td width="12%" height="98" style="position:relative;"><div class="n_kql_dd_img">
                      <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["PId"]); ?>" target="_blank"><img src="/my_mall/Public/uploads/product_img/<?php echo ($vo["Pproduct_img"]); ?>" alt="" /></a>
                      </div></td>
                      <td width="25%" class="my_ordtit" valign="middle"><?php echo ($vo["Pname"]); ?></td>
                      <td width="11%" align="center" valign="middle" ><?php echo ($vo["Pnum"]); ?></td>
                      <td width="16%" align="center" valign="middle" class="t_n_xy_wz_cor">￥<?php echo ($vo["Ol_pay"]); ?></td>
                      <?php if(($data[$i]['Num'] == '1') AND ($data[$i]['O_Num'] == $data[$i-1]['O_Num'])): else: ?>
                      <td width="12%" align="center" valign="middle" rowspan="<?php echo ($vo["Num"]); ?>"><?php echo ($vo["O_ptime"]); ?></td>
                      <td width="10%" align="center" valign="middle" rowspan="<?php echo ($vo["Num"]); ?>"><?php echo ($vo["O_ment"]); ?></td>
                      <td width="11%" align="center" valign="middle" rowspan="<?php echo ($vo["Num"]); ?>"><div class="n_kql_dd_btn">
                        <i><a href="/my_mall/home/order/orderinfo/order_Num/<?php echo ($vo["O_Num"]); ?>" class="n_kql_dd_btna1">查看</a></i>
                        <?php switch($vo["O_ment"]): case "待付款": ?><i class="buy03"><a href="/my_mall/home/order/pay/order_Num/<?php echo ($vo["O_Num"]); ?>">立即支付</a></i>
                            <i class="buy04"><a href="/my_mall/home/order/close/order_Num/<?php echo ($vo["O_Num"]); ?>" class="kql_dd_btn_hov">取消订单</a></i><?php break;?>
                            <?php case "待发货": break;?>
                            <?php case "确认收货": ?><i class="buy03"><a href="/my_mall/home/order/getgoods/order_Num/<?php echo ($vo["O_Num"]); ?>">确认收货</a></i><?php break;?>
                            <?php case "完成": ?><!--<i class="buy03"><a href="/my_mall/home/order/close/order_Num/<?php echo ($vo["O_Num"]); ?>">再次购买</a></i>-->
                            <i class="buy04"><a href="/my_mall/home/order/del/order_Num/<?php echo ($vo["O_Num"]); ?>">删除订单</a></i><?php break;?>
                            <?php case "关闭": ?><!--<i class="buy03"><a href="/my_mall/home/order/close/order_Num/<?php echo ($vo["O_Num"]); ?>">再次购买</a></i>-->
                            <i class="buy04"><a href="/my_mall/home/order/del/order_Num/<?php echo ($vo["O_Num"]); ?>">删除订单</a></i><?php break;?>
                            <?php default: endswitch;?>
                      </div>
                      </td><?php endif; ?>
                    </tr>
                    <?php if($data[$i]['O_Num'] == $data[$i+1]['O_Num']): elseif($data[$i]['O_Num'] != $data[$i+1]['O_Num']): ?>
                    </table>
                </li><?php endif; ?>
                <?php $i++; endforeach; endif; ?>
              </ul>
      </div>
      
  </div>
  <div class="pagination"> 
    <?php echo ($page); ?>
  </div>
</div>
</body>
</html>