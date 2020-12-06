<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/custom.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">
<title>我的收藏</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>
<script src="/my_mall/Public/home/js/area.js"></script>

</head>
<body>
<div class="main">
<ul class="breadcrumbs">
    <li>我的收藏</li>
    <li><a href="/my_mall/home/user/user">会员中心</a></li>
</ul>
<div class="my_love">
    <div class="my_list_detail">
       <!--<div class="collect_place">
          <h1 class="font_wryh"> <span class="big left">水果</span><span class="small left"></span></h1>
          <a href="#">全部取消</a>
          <span class="icon"><i class="fa fa-heart"></i></span><p>03</p>
       </div>-->
       <div class="detail_box">      
          <div class="product-grid">
          <?php if(is_array($list)): foreach($list as $key=>$vf): ?><div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vf["PId"]); ?>" target="_blank"> <img src="/my_mall/Public/uploads/product_img/<?php echo ($vf["Pproduct_imgl"]); ?>" alt="<?php echo ($vf["Pname"]); ?>" /> </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="/my_mall/home/shopcar/add/pro_Id/<?php echo ($vf["PId"]); ?>/pro_num/1" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vf["PId"]); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                          	  <input type="hidden" value="<?php echo ($vf["Id"]); ?>" />
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vf["PId"]); ?>" target="_blank">
                          <h2 class="title"><?php echo ($vf["Pname"]); ?></h2>
                          <span class="price">￥<?php echo ($vf["Phere_price"]); ?></span>
                      </a>
                  </div>
              </div><?php endforeach; endif; ?>
              <!--<div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">奥罗葡萄</h2>
                          <span class="price">$9.00</span>
                      </a>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_8.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="cart.html" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">樱桃</h2>
                          <span class="price">$19.00</span>
                      </a>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html"> <img src="/my_mall/Public/home/images/shop/shop_4.jpg" alt="" /> </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">百香果</h2>
                          <span class="price">$35.00</span>
                      </a>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">奥罗葡萄</h2>
                          <span class="price">$9.00</span>
                      </a>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_8.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="cart.html" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">樱桃</h2>
                          <span class="price">$19.00</span>
                      </a>
                  </div>
              </div>-->
        </div>
      </div>
    </div>
    <!--<div class="my_list_detail">
       <!--<div class="collect_place">
          <h1 class="font_wryh"> <span class="big left">蔬菜</span><span class="small left"></span></h1>
          <a href="#">全部取消</a>
          <span class="icon"><i class="fa fa-heart"></i></span><p>02</p>
       </div>-->
       <!--<div class="detail_box">      
          <div class="product-grid">
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <span class="outofstock">空</span>
                          <img src="/my_mall/Public/home/images/shop/shop_6.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                           <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">花椰菜</h2>
                          <span class="price">$16.00</span>
                      </a>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_5.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="cart.html" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                          <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">. 胡萝卜 </h2>
                          <span class="price">$12.00</span>
                      </a>
                  </div>
              </div>
        </div>
      </div>-->
    <!--</div>-->
    <!--<div class="my_list_detail">-->
       <!--<div class="collect_place">
          <h1 class="font_wryh"> <span class="big left">果汁</span><span class="small left"></span></h1>
          <a href="#">全部取消</a>
          <span class="icon"><i class="fa fa-heart"></i></span><p>01</p>
       </div>-->
       <!--<div class="detail_box">      
          <div class="product-grid">
              <div class="col-md-4 col-sm-4 product-item text-center mb-3">
                  <div class="product-thumb">
                      <a href="shop-detail.html">
                          <div class="badges"> <span class="hot">热</span> <span class="onsale">安全</span> </div>
                          <img src="/my_mall/Public/home/images/shop/shop_1.jpg" alt="" />
                      </a>
                      <div class="product-action">
                          <span class="add-to-cart">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="加入购物车"></a>
                          </span>
                           <span class="quickview">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="详情"></a>
                          </span>
                          <span class="delete">
                              <i class="fa fa-times-circle"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-info">
                      <a href="shop-detail.html">
                          <h2 class="title">橙汁</h2>
                          <span class="price">
                              <del>$15.00</del> 
                              <ins>$12.00</ins>
                          </span>
                      </a>
                  </div>
              </div>
        </div>
      </div>-->
    <!--</div>-->
    <div class="ads_del">
        <form class="del_ads" method="post" action="/my_mall/home/farite/del">
            <input type="hidden" id="Id_del" value="" name="Id" />
            <h1>删除收藏</h1>
            <p class="del_ts">你确定删除该收藏吗？</p>
            <p class="del_bun"><input class="submit" type="submit" value="确定" /><input class="button" type="button" value="取消" /></p>
        </form>
    </div>
    </div>
<div class="pagination"> 
    <?php echo ($page); ?>
</div>
</div>
</body>
</html>