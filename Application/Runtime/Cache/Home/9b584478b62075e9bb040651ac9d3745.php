<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>购物中心</title>

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.theme.css" type="text/css" media="all">
<link rel='stylesheet' href='/my_mall/Public/home/css/prettyPhoto.css' type='text/css' media='all'>
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/media.css">
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
						<h2 class="page-title text-center">购物中心</h2>
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
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="section pt-7 pb-7">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="shop-filter">
							<div class="col-md-6 col-sm-6" >
								<p class="result-count"> 欢迎挑选</p>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="shop-filter-right">
                                    <form class="commerce-ordering" method="post" action="/my_mall/home/product/product">
                                    	<input type="hidden" value="<?php echo ($pname); ?>" name="name" />
                                        <input type="hidden" value="<?php echo ($classId); ?>" name="classId" />
										<select name="orderby" class="orderby">
											<option value="ms_product.sales_vol desc ms_product.score desc">人气排序</option>
											<option value="ms_product.addtime desc">新产品</option>
											<option value="ms_product.here_price asc">按价格排序：从低到高 </option>
											<option value="ms_product.here_price desc">按价格排序：从高到低 </option>
										</select>
									</form>
								</div>
							</div>
						</div>
						<div class="category-carousel-2 mb-3" data-auto-play="true" data-desktop="3" data-laptop="3" data-tablet="2" data-mobile="1">
                        	<?php if(is_array($procl)): foreach($procl as $key=>$vpc): ?><div class="cat-item">
								<div class="cats-wrap">
									<a href="/my_mall/home/product/product/classId/<?php echo ($vpc["Id"]); ?>">
										<img src="/my_mall/Public/uploads/Pclass/<?php echo ($vpc["CG_img"]); ?>" alt="<?php echo ($vpc["name"]); ?>" />
										<h2 class="category-title"> <?php echo ($vpc["name"]); ?> <mark class="count">(<?php echo ($vpc["pnums"]); ?>)</mark> </h2>
									</a>
								</div>
							</div><?php endforeach; endif; ?>
						</div>
						<div class="product-grid">
                            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="col-md-4 col-sm-6 product-item text-center mb-3">
								<div class="product-thumb">
                                	<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["Id"]); ?>">
										<div class="badges">
                                        <?php if($vo["ishot"] == '是'): ?><span class="hot">热</span><?php endif; ?>
                                        </div>
                                        <?php if($vo["stock"] == '0'): ?><span class="outofstock">空</span><?php endif; ?>
                                        <?php if($vo["sale"] == '0'): ?><span class="onsale">安全</span><?php endif; ?>
										<img src="/my_mall/Public/uploads/product_img/<?php echo ($vo["product_img"]); ?>" alt="<?php echo ($vo["name"]); ?>" />
									</a>
                                    
									<div class="product-action">
                                        <span class="add-to-cart">
                                        <?php if($vo["stock"] != '0'): ?><a href="/my_mall/home/shopcar/add/pro_Id/<?php echo ($vo["Id"]); ?>/pro_num/1" data-toggle="tooltip" data-placement="top" title="加入购物车"></a><?php endif; ?>
                                        </span>
                                        <span class="wishlist">
                                            <a href="/my_mall/home/farite/add/pro_Id/<?php echo ($vo["Id"]); ?>" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                                        </span>
                                        <span class="quickview">
                                            <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["Id"]); ?>" data-toggle="tooltip" data-placement="top" title="详情"></a>
                                        </span>
									</div>
								</div>
								<div class="product-info">
									<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vo["Id"]); ?>">
										<h2 class="title"><?php echo ($vo["name"]); ?></h2>
										<span class="price">￥<?php echo ($vo["here_price"]); ?></span>
									</a>
								</div>
							</div><?php endforeach; endif; ?>
						</div>
						<div class="pagination"> 
							<?php echo ($pages); ?>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="widget widget-product-search">
                                <form class="form-search" method="post" action="/my_mall/home/product/product">
									<input type="text" class="search-field" placeholder="商品搜索···" value="<?php echo ($pname); ?>" name="name" />
									<input type="submit" value="Search" />
								</form>
							</div>
							<div class="widget widget-products">
								<h3 class="widget-title">产品</h3>
								<ul class="product-list-widget">
                                    <?php if(is_array($hotproduct)): foreach($hotproduct as $key=>$vph): ?><li>
										<a href="/my_mall/home/product/productinfo/Id/<?php echo ($vph["PId"]); ?>">
											<img src="/my_mall/Public/uploads/product_img/<?php echo ($vph["Pproduct_img"]); ?>" alt="<?php echo ($vph["Pname"]); ?>" />
											<span class="product-title"><?php echo ($vph["Pname"]); ?></span>
										</a>
                                        <?php if($vph["PMprice"] != ''): ?><del>￥<?php echo ($vph["PMprice"]); ?></del><?php endif; ?>
										<ins>￥<?php echo ($vph["PHprice"]); ?></ins>
									</li><?php endforeach; endif; ?>
								</ul>
							</div>
							<!--<div class="widget widget-tags">
								<h3 class="widget-title">产品标签</h3>
								<div class="tagcloud">
									<a href="#">面包</a> <a href="#">食物</a> <a href="#">水果</a> <a href="#">绿色的</a> <a href="#">健康的</a> <a href="#">天然的</a> <a href="#">有机商店</a> <a href="#">蔬菜</a>
								</div>
							</div>-->
						</div>
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
<!--<script type="text/javascript" src="/my_mall/Public/home/js/jquery-migrate.min.js"></script>-->
<script type="text/javascript" src="/my_mall/Public/home/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/modernizr-2.7.1.min.js"></script>-->
<script type="text/javascript" src="/my_mall/Public/home/js/owl.carousel.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/jquery.countdown.min.js"></script>-->
<script type='text/javascript' src='/my_mall/Public/home/js/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='/my_mall/Public/home/js/jquery.prettyPhoto.init.min.js'></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $(".orderby").change(function(){
			$(".commerce-ordering").submit();
		})
    });
</script>
</body>
</html>