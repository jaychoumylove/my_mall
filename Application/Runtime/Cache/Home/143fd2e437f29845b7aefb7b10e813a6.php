<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>购物车</title>

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.theme.css" type="text/css" media="all">
<link rel='stylesheet' href='/my_mall/Public/home/css/prettyPhoto.css' type='text/css' media='all'>
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/custom.css" type="text/css" media="all">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
 
<div id="menu-slideout" class="slideout-menu hidden-md-up">
	<div class="mobile-menu">
		<ul id="mobile-menu" class="menu">
			<li><a href="/my_mall">首页</a></li>
			<li><a href="/my_mall/home/product/product">购物中心</a></li>
			<li><a href="/my_mall/home/index/aboutus">关于我们</a></li>
			<li><a href="/my_mall/home/index/contactus">联系我们</a></li>
		</ul>
	</div>
</div>
<div class="site">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="topbar-text">
						<span>营业时间: 8:00-21:00</span> 
					</div>
				</div>
				<div class="col-md-6">
					<div class="topbar-menu">
						<ul class="topbar-menu">
							<li><a href="/my_mall/home/user/user">个人中心</a></li>
                            <?php if($_SESSION['user'] == ''): ?><li><a href="/my_mall/home/login/login">登录</a></li>
							<li><a href="/my_mall/home/login/register">注册</a></li>
                            <?php else: ?> 
                            <li><a href="/my_mall/home/login/cancellation">切换</a></li>
							<li><a href="/my_mall/home/login/quit">退出</a></li><?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header id="header" class="header header-desktop header-2">
		<div class="top-search">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form action="/my_mall/home/product/product" method="post">
							<input type="search" class="top-search-input" name="name" placeholder="您的想法" /><button type="submit">搜索</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="/my_mall" id="logo"> <img class="logo-image" src="/my_mall/Public/home/images/logo.png" alt="Organik Logo" /> </a>
				</div>
				<div class="col-md-9">
					<div class="header-right">
						<nav class="menu">
							<ul class="main-menu">
                                <li><a href="/my_mall/home/index/index">首页</a></li>
                                <li><a href="/my_mall/home/product/product">购物中心</a></li>
                                <li><a href="/my_mall/home/index/aboutus">关于我们</a></li>
                                <li><a href="/my_mall/home/index/contactus">联系我们</a></li>
							</ul>
						</nav>
						<div class="btn-wrap">
							<div class="mini-cart-wrap">
								<div class="mini-cart">
									<div class="mini-cart-icon" data-count="<?php echo ($allshopcar); ?>">
										<i class="ion-bag"></i>
									</div>
								</div>
								<div class="widget-shopping-cart-content">
									<ul class="cart-list">
                                    <?php if(is_array($minishopcar)): foreach($minishopcar as $key=>$vmns): ?><li>
											<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vmns["pro_Id"]); ?>">
												<img src="/my_mall/Public/uploads/product_img/<?php echo ($vmns["Pimg"]); ?>" alt="" /> <?php echo ($vmns["Pname"]); ?>&nbsp;
											</a>
											<span class="quantity"><?php echo ($vmns["pro_num"]); ?> × ￥<?php echo ($vmns["PHprice"]); ?></span>
										</li><?php endforeach; endif; ?>
									</ul>
									<p class="buttons"> <a href="/my_mall/home/shopcar/shopcar" class="view-cart">进入购物车查看更多</a> </p>
								</div>
							</div>
							<div class="top-search-btn-wrap">
								<div class="top-search-btn">
									<a href="javascript:void(0);"> <i class="ion-search"></i> </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<header class="header header-mobile">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div class="header-left">
						<div id="open-left"><i class="ion-navicon"></i></div>
					</div>
				</div>
				<div class="col-xs-8">
					<div class="header-center"> 
                    	<a href="/my_mall" id="logo-2"> <img class="logo-image" src="/my_mall/Public/home/images/logo.png" alt="garden stuff Logo" /> </a> 
                    </div>
				</div>
				<div class="col-xs-2">
					<div class="header-right">
						<div class="mini-cart-wrap">
							<a href="/my_mall/home/shopcar/shopcar">
								<div class="mini-cart">
									<div class="mini-cart-icon" data-count="2"> <i class="ion-bag"></i> </div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="main">
		<div class="section section-bg-10 pt-11 pb-17">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="page-title text-center">购物车</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="section border-bottom pt-2 pb-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="breadcrumbs">
							<li><a href="/my_mall">首页</a></li>
							<li><a href="/my_mall/home/product/product">购物中心</a></li>
							<li>购物车</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="section pt-7 pb-7">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
                    <form action="/my_mall/home/shopcar/delAll" method="post">
						<table class="table shop-cart">
							<tbody>
                                <?php if($data == ''): ?><tr>
                                	<td colspan="6" class="actions" style="text-align:center">
										 购物车还是空的，去<a href="/my_mall/home/product/product">购物中心</a>逛逛吧！
									</td>
                                </tr><?php endif; ?>
                           		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr class="cart_item">
                                	<td class="checkId"><input type="checkbox" checked="" value="<?php echo ($vo["sId"]); ?>" name="Id[]" /></td>
									<td class="product-thumbnail">
                                    	
										<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["pro_Id"]); ?>"> <img src="/my_mall/Public/uploads/product_img/<?php echo ($vo["pimg"]); ?>" alt=""></a>
									</td>
									<td class="product-info">
										<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["pro_Id"]); ?>"><?php echo ($vo["pname"]); ?></a><!--<span class="sub-title">Faucibus Tincidunt</span>--><!--shop/thumb/shop_1.jpg--><span class="amount">￥<?php echo ($vo["phere_price"]); ?></span>
									</td>
									<td class="product-quantity">
										<div class="quantity">
											<input type="number" min="0" name="pro_num" value="<?php echo ($vo["pro_num"]); ?>" class="input-text qty text" size="4">
										</div>
									</td>
									<td class="product-subtotal">
										<span class="amount">￥<?php echo ($vo["xiaoji"]); ?></span>
									</td>
									<td class="product-remove">
										<a href="/my_mall/home/shopcar/del/Id/<?php echo ($vo["sId"]); ?>" class="remove">×</a>
									</td>
								</tr><?php endforeach; endif; ?>
								<!--<tr class="cart_item">
                                <td></td>
									<td class="product-remove">
										<a href="#" class="remove">×</a>
									</td>
									<td class="product-thumbnail">
										<a href="shop-detail.html"> <img src="/my_mall/Public/home/images/shop/thumb/shop_2.jpg" alt=""> </a>
									</td>
									<td class="product-info">
										<a href="shop-detail.html">葡萄</a><span class="sub-title">Consequat Quismassa</span><span class="amount">$35.00</span>
									</td>
									<td class="product-quantity">
										<div class="quantity">
											<input id="qty-2" type="number" min="0" name="number" value="1" class="input-text qty text" size="4">
										</div>
									</td>
									<td class="product-subtotal">
										<span class="amount">$35.00</span>
									</td>
								</tr>-->
								<tr>
									<td colspan="6" class="actions">
										<a class="continue-shopping" href="/my_mall/home/product/product"> 继续购物</a>
                                        <a class="continue-shopping" href="/my_mall/home/shopcar/clear"> 清空购物车</a>
										<input type="submit" class="update-cart" name="update_cart" value="清空所选商品" />
									</td>
								</tr>
							</tbody>
						</table>
                    </form> 
					</div>
                    
					<div class="col-md-4">
						<div class="cart-totals">
                        <form action="/my_mall/home/shopcar/checkout" method="post">
                        	<?php if(is_array($data)): foreach($data as $key=>$vo): ?><input type="hidden" value="null" class="delId" name="Id[]" /><?php endforeach; endif; ?>
							<table>
								<tbody>
									<tr class="cart-subtotal">
										<th>商品金额</th> <td>￥0.00</td>
									</tr>
									<tr class="shipping">
										<th>快递</th> <td>￥0.00</td>
									</tr>
                                    <tr class="shipping">
										<th>优惠券</th> <td>5</td>
									</tr>
									<tr class="order-total">
										<th>总计</th> <td><strong>￥0.00</strong></td>
									</tr>
								</tbody>
							</table>
							<div class="proceed-to-checkout"><input type="submit" value="结算" /> <!--<a href="/my_mall/home/order/add">结算</a> --></div>
                        </form>
						</div>
						<!--<div class="coupon-shipping">
							<div class="coupon">
								<form>
									<input type="text" name="coupon_code" class="coupon-code" id="coupon_code" value="" readonly="readonly" placeholder="优惠券" />
									<input type="submit" class="apply-coupon" name="apply_coupon" value="使用优惠券" />
								</form>
							</div>
						</div>-->
					</div>
                    <div class="pagination"> 
                        <?php echo ($page); ?>
                    </div>
				</div>
                
			</div>
            
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<img src="/my_mall/Public/home/images/footer_logo.png" class="footer-logo" alt="" />
					<p>欢迎来到果蔬城。我们的产品是新收获，洗盒准备好，终于从我们的家庭农场送到你家门口。</p>
					<div class="footer-social">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="微信"><i class="fa fa-weixin"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="微博"><i class="fa fa-weibo"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="相片分享"><i class="fa fa-pinterest"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="相片墙"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-md-2">
					<div class="widget">
						<h3 class="widget-title">信息</h3>
						<ul>
							<li><a href="#">新产品</a></li>
							<li><a href="#">畅销</a></li>
							<li><a href="#">关于我们的店</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="widget">
						<h3 class="widget-title">友情链接</h3>
						<ul>
							<li><a href="#">我们的团队</a></li>
							<li><a href="#">关于我们</a></li>
							<li><a href="#">安全购物</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">订阅</h3>
						<p>输入您的邮件地址为我们的邮件列表，以保持自己更新。</p>
						<form class="newsletter">
							<input type="email" name="EMAIL" placeholder="您的邮箱" required />
							<button><i class="fa fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-8"> Copyright &copy; 2017.Company name All rights reserved. </div>
				<div class="col-md-4"> <img src="/my_mall/Public/home/images/footer_payment.png" alt="" /> </div>
			</div>
		</div>
		<div class="backtotop" id="backtotop"></div>
	</div>
</div>

<script type="text/javascript" src="/my_mall/Public/home/js/jquery.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/modernizr-2.7.1.min.js"></script>-->
<script type="text/javascript" src="/my_mall/Public/home/js/owl.carousel.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/jquery.countdown.min.js"></script>-->
<script type="text/javascript" src="/my_mall/Public/home/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/jquery.prettyPhoto.init.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".checkId input").prop("checked",false);
        $(".cart_item").each(function(e) {
            $(".cart_item .product-quantity .quantity input").eq(e).change(function(){
				var pro_num=$(".cart_item .product-quantity .quantity input").eq(e).val();
				var pro_Id=$(".cart_item .checkId input").eq(e).val();
				//alert(pro_Id+pro_num);
				$.ajax({
					type:"post",
					url:"/my_mall/home/shopcar/update",
					data:"pro_num="+pro_num+"&Id="+pro_Id,
					dataType:"json",
					success: function(json){
						/*//alert(json.pro_num+"/"+json.pro_Id+"/"+json.info);
						$(".cart_item .product-quantity .quantity input").eq(e).val(json.pro_num);
						$(".cart_item .checkId input").eq(e).val(json.pro_Id);
						var danjia=$(".cart_item .product-info .amount").html().substring(1);
						var xiaoji=danjia*json.pro_num;
						$(".cart_item .product-subtotal .amount").eq(e).html("￥"+xiaoji);
						alert(danjia+"/"+xiaoji);*/
						check_price()
					}
				})
			})
        });
		$(".checkId input").click(function(){
			check_price();
		})
		function check_price(){
			var goods_price=0;//商品金额
			var all_price=0;//总计
			for(var i=0;i<$(".cart_item").length;i++){
				var danjia=$(".cart_item .product-info .amount").eq(i).text().substring(1)*1;
				var pro_num=$(".cart_item .product-quantity .quantity input").eq(i).val();
				var xiaoji=danjia*pro_num;
				$(".cart_item .product-subtotal .amount").eq(i).html("￥"+xiaoji);
				if($(".checkId input").eq(i).prop("checked")==true){
					//var addinput='<input type="hidden" value="'+$(".checkId input").eq(i).val()+'" class="checkoutId" name="pro_Id[]" />';
					//$(".cart-totals form").append(addinput);
					//$("#s_county").append("<option class='county' value="+address_county+">"+address_county+"</option>");
					$(".delId").eq(i).val($(".checkId input").eq(i).val());
					goods_price=goods_price+xiaoji;
					//alert(danjia+"/"+pro_num+"/"+xiaoji+"/"+goods_price);
				}else{
					//$(".checkoutId").remove();
					$(".delId").eq(i).val("null");
				}
			}
			var yunfei=$(".shipping td").eq(0).text().substring(1)*1;
			all_price=goods_price+yunfei;
			$(".cart-subtotal td").html("￥"+goods_price);
			$(".order-total td").html("￥"+all_price);
		}
		//下面是用ajax+json的测试——失败
		/*$(".remove").click(function(){
			$.ajax({
				type:"get",
				url:"/my_mall/home/shopcar/del",
				data:"Id="+$(this).next("input").val(),
				dataType:"json",
				success:function(json){
					//alert(json[0]['info']);
					if(json[0]['sp_count']=='0'){
						var li='<li><a style="text-align:center">空旷旷的！</a></li>';
						$(".cart-list").html(li);
					}else{
						var li='';
						var a_remove='<a href="javascript:;" class="remove">×</a>';
						for(var i=0;i<count(json);i++){
							var inp_hid='<input type="hidden" value="'+json[i]["sId"]+'"/>';
							var a_pros='<a href="/my_mall/home/product/product/Id/'+json[i]["sId"]+'">';
							var img='<img src="/my_mall/Public/uploads/product_img/'+json[i]["product_img"]+'" alt="" />';
							var a_proe='</a>';
							var span='<span class="quantity">'+json[i]["pro_num"]+' × ￥'+json[i]["Phere_price"]+'</span>';
							li=li+"<li>"+a_remove+inp_hid+a_pros+img+a_proe+span+"</li>";
						}
						$(".cart-list").html(li);
					}
					$(".total .amount").html("￥"+json[0]['allprice']);
					$(".btn-wrap .mini-cart-wrap .mini-cart .mini-cart-icon").attr("data-count",json[0]['sp_count']);
				}
			})
			return false;
		})*/
    });
</script>
</body>
</html>