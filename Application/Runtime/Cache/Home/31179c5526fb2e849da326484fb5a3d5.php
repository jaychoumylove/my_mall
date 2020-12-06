<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.theme.css" type="text/css" media="all">
<link rel='stylesheet' href='/my_mall/Public/home/css/slick.css' type='text/css' media='all'>
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/media.css">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">
<title>个人中心</title>
<script type="text/javascript" src="/my_mall/Public/home/js/jquery.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/owl.carousel.min.js"></script>
<script type='text/javascript' src='/my_mall/Public/home/js/slick.min.js'></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>

</head>
<body>
<div class="main">
    <ul class="breadcrumbs">
        <li>我的果蔬城</li>
        <li><a href="#">会员中心</a></li>
    </ul>
	<div class="comment_list">
      <div class="n_kql_dd">
          <h2>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="none">
              <tr>
                <td width="12%"></td>
                <td width="20%" align="center";>商品</td>
                <td width="16%" align="center"> 订单金额</td>
                <td width="11%" align="center">数量</td>
                <td width="12%" align="center">
                <!--<select name=""> <option>所有订单</option></select>-->
                </td>
                <td width="11%" align="center">状态</td>
                <td width="15%" align="center">操作 </td>
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
                            <?php case "待评论": ?><i class="buy03"><a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["PId"]); ?>" target="_blank">去评论</a></i>
                            <i class="buy04"><a href="/my_mall/home/order/del/order_Num/<?php echo ($vo["O_Num"]); ?>">删除订单</a></i><?php break;?>
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
  <!--<div class="pagination"> 
    <a class="prev page-numbers" href="#">上一页</a>
    <a class="page-numbers current" href="#">1</a>
    <a class="page-numbers" href="#">2</a> 
    <a class="page-numbers" href="#">3</a> 
    <a class="next page-numbers" href="#">下一页</a>
  </div>-->
  <div class="related">
      <div class="related-title">
          <div class="text-center mb-1 section-pretitle fz-34">Related</div>
          <h2 class="text-center section-title mtn-2 fz-24">最近浏览</h2>
      </div>
      <div class="product-carousel p-0" data-auto-play="true" data-desktop="3" data-laptop="2" data-tablet="2" data-mobile="1">
      <?php if(is_array($hotproduct)): foreach($hotproduct as $key=>$vph): ?><div class="product-item text-center">
                  <div class="product-thumb">
                      <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vph["PId"]); ?>">
                          <div class="badges">
                          <?php if($vph["Pishot"] == '是'): ?><span class="hot">热</span><?php endif; ?>
                          <?php if($vph["Pstock"] == '0'): ?><span class="outofstock">空</span><?php endif; ?>
                          <?php if($vph["Psale"] == '0'): ?><span class="onsale">安全</span><?php endif; ?>
                          </div>
                          <img src="/my_mall/Public/uploads/product_img/<?php echo ($vph["Pproduct_img"]); ?>" alt="<?php echo ($vo["name"]); ?>" />
                      </a>
                      <div class="product-action">
                          <?php if($vph["Pstock"] != '0'): ?><span class="add-to-cart">
                              <a href="/my_mall/home/shopcar/add/pro_Id/<?php echo ($vph["PId"]); ?>/pro_num/1" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span><?php endif; ?>
                          <span class="wishlist">
                              <a href="/my_mall/home/farite/add/pro_Id/<?php echo ($vph["PId"]); ?>" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                          </span>
                          <span class="quickview">
                              <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vph["PId"]); ?>" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vph["PId"]); ?>">
                          <h2 class="title"><?php echo ($vph["Pname"]); ?></h2>
                          <span class="price">
                          <?php if($vph["PMprice"] != ''): ?><del>￥<?php echo ($vph["PMprice"]); ?></del><?php endif; ?>
                              <ins>￥<?php echo ($vph["PHprice"]); ?></ins>
                          </span>
                      </a>
                  </div>
              </div><?php endforeach; endif; ?>
          <!--<div class="product-item text-center">
              <div class="product-thumb">
                  <a href="shop-detail.html">
                      <div class="badges"> <span class="hot">热</span> </div>
                      <img src="/my_mall/Public/home/images/shop/shop_5.jpg" alt="" />
                  </a>
                  <div class="product-action">
                      <span class="add-to-cart">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                      </span>
                      <span class="wishlist">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                      </span>
                      <span class="quickview">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                      </span>
                  </div>
              </div>
              <div class="product-info">
                  <a href="shop-detail.html">
                      <h2 class="title">胡萝卜</h2> <span class="price">$12.00</span>
                  </a>
              </div>
          </div>
          <div class="product-item text-center">
              <div class="product-thumb">
                  <a href="shop-detail.html">
                      <span class="outofstock">空</span>
                      <img src="/my_mall/Public/home/images/shop/shop_6.jpg" alt="" />
                  </a>
                  <div class="product-action">
                      <span class="add-to-cart">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                      </span>
                      <span class="wishlist">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                      </span>
                      <span class="quickview">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                      </span>
                  </div>
              </div>
              <div class="product-info">
                  <a href="shop-detail.html">
                      <h2 class="title">西兰花 </h2> <span class="price">$6.00</span>
                  </a>
              </div>
          </div>
          <div class="product-item text-center">
              <div class="product-thumb">
                  <a href="shop-detail.html"> <img src="/my_mall/Public/home/images/shop/shop_7.jpg" alt="" /> </a>
                  <div class="product-action">
                      <span class="add-to-cart">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                      </span>
                      <span class="wishlist">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                      </span>
                      <span class="quickview">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                      </span>
                  </div>
              </div>
              <div class="product-info">
                  <a href="shop-detail.html">
                      <h2 class="title">大白菜</h2> <span class="price">$9.00</span>
                  </a>
              </div>
          </div>
          <div class="product-item text-center">
              <div class="product-thumb">
                  <a href="shop-detail.html">
                      <div class="badges"> <span class="hot">热</span> </div>
                      <img src="/my_mall/Public/home/images/shop/shop_8.jpg" alt="" />
                  </a>
                  <div class="product-action">
                      <span class="add-to-cart">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                      </span>
                      <span class="wishlist">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                      </span>
                      <span class="quickview">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                      </span>
                  </div>
              </div>
              <div class="product-info">
                  <a href="shop-detail.html">
                      <h2 class="title">樱桃 </h2> <span class="price">$19.00</span>
                  </a>
              </div>
          </div>-->
      </div>
  </div>
</div>
</body>
</html>