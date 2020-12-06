<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/media.css">
<title>订单详情</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>
<script src="/my_mall/Public/home/js/area.js"></script>

</head>
<body>
<div class="main">
    <ul class="breadcrumbs">
    	<li>订单详情</li>
        <li><a href="/my_mall/home/order/orderlist">我的订单</a></li>
        <li><a href="/my_mall/home/user/main">会员中心</a></li>
    </ul>
    <div class="order-info">
        <div class="my_base my_base03">
            <div class="comment_list">
                <div class="my_ord01">
                   <div class="order-detail_01">
                      <span>订单号：<?php echo ($data["order_Num"]); ?></span>
                      <?php switch($$data["orderment"]): case "待付款": ?><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i>
                          <span class="pay"><a href="/my_mall/home/order/pay/order_Num/<?php echo ($data["order_Num"]); ?>">立即支付</a></span></span>
                      	  <font class="right"><span><a href="/my_mall/home/order/close/order_Num/<?php echo ($data["order_Num"]); ?>">取消订单</a></span></font><?php break;?>
                          <?php case "待发货": ?><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i></span><?php break;?>
                          <?php case "确认收货": ?><span class="pay"><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i><a href="/my_mall/home/order/getgoods/order_Num/<?php echo ($data["order_Num"]); ?>">确认收货</a></span></span><?php break;?>
                          <?php case "完成": ?><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i></span>
                          <font class="right"><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i></span><span><a href="/my_mall/home/order/del/order_Num/<?php echo ($data["order_Num"]); ?>">删除订单</a></span></font><?php break;?>
                          <?php case "关闭": ?><span> 状态：<i> <?php echo ($data["orderment"]); ?> </i></span>
                          <font class="right"><span><a href="/my_mall/home/order/del/order_Num/<?php echo ($data["order_Num"]); ?>">删除订单</a></span></font><?php break;?>
                          <?php default: endswitch;?>
                    </div>
                   <div class="order-detail_02"> <p> 尊敬的客户，我们的快递默认发中通或邮政，如果您需要发其他物流请在留言里说明。</p></div>
                </div>  
                <div class="order-detail_04">
                       <h5>订单信息</h5>
                       <ul class="my_order_message">
                        <li>
                          <strong>收货人信息</strong><br />收 货 人：<?php echo ($data["user_Name"]); ?><br />地    址：<?php echo ($data["address_province"]); ?>-<?php echo ($data["address_city"]); ?>-<?php echo ($data["address_county"]); ?>-<?php echo ($data["address_info"]); ?><br />手机号码：<?php echo ($data["phonenumber"]); ?>
                        </li>
                        <li>
                          <strong>支付及配送方式</strong><br /> 支付方式：<?php echo ($data["payment"]); ?><br /> 配送方式：<?php echo ($data["shippingment"]); ?><br />
                        </li>
                      </ul>
                      <div class="car_top1">商品清单</div> 
                      <div class="box-bd">
                            <dl class="checkout-goods-list">
                                <dt class="clearfix">
                                    <span class="col col-1">商品名称</span>
                                    <span class="col col-2">购买价格</span>
                                    <span class="col col-3">购买数量</span>
                                    <span class="col col-4">小计（元）</span>
                                </dt>
                      			<?php if(is_array($list)): foreach($list as $key=>$vl): ?><dd class="item clearfix">
                                    <div class="item-row">
                                        <div class="col col-1">
                                            <div class="g-pic"> <img src="/my_mall/Public/uploads/product_img/<?php echo ($vl["Pproduct_img"]); ?>" width="80" height="80" alt=""> </div>
                                            <div class="g-info"> <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vl["PId"]); ?>" target="_blank"> <?php echo ($vl["Pname"]); ?> </a> </div>
                                        </div>
                                        <div class="col col-2">￥<?php echo ($vl["Phere_price"]); ?></div>
                                        <div class="col col-3"><?php echo ($vl["Opro_num"]); ?></div>
                                        <div class="col col-4">￥<?php echo ($vl["Opay"]); ?></div>
                                    </div>
                                </dd><?php endforeach; endif; ?>
                            </dl>
                            <div class="checkout-count clearfix">
                                <div class="checkout-count-extend xm-add-buy">
                                    <h3 class="title">会员留言</h3><br>
                                    <p><?php echo ($data["comment"]); ?></p>
                                </div>
                                <div class="checkout-price">
                                    <ul>
                                        <li> 订单总额：<span>￥<?php echo ($data["pay"]); ?></span> </li>
                                        <li> 活动优惠：<span>￥-0</span> </li>
                                        <li> 优惠券抵扣：<span id="couponDesc">￥-0</span></li>
                                        <li> 运费：<span id="postageDesc">￥0</span></li>
                                    </ul>
                                    <p class="checkout-total">应付总额：<span><strong id="totalPrice">￥<?php echo ($data["pay"]); ?></strong></span></p>
                                </div>
                            </div>
                        </div> 
               </div>
          </div>
         </div>
    </div>
</div>
</body>
</html>