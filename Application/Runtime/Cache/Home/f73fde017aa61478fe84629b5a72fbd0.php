<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>产品详情</title>

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.theme.css" type="text/css" media="all">
<link rel='stylesheet' href='/my_mall/Public/home/css/prettyPhoto.css' type='text/css' media='all'>
<link rel='stylesheet' href='/my_mall/Public/home/css/slick.css' type='text/css' media='all'>
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
						<h2 class="page-title text-center">产品详情</h2>
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
							<li>产品详情</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="section pt-7 pb-7">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="single-product">
							<div class="col-md-6">
								<div class="image-gallery">
									<div class="image-gallery-inner">
                                    	<?php $__FOR_START_22073__=0;$__FOR_END_22073__=3;for($i=$__FOR_START_22073__;$i < $__FOR_END_22073__;$i+=1){ ?><div>
											<div class="image-thumb">
												<a href="/my_mall/Public/uploads/product_img/<?php echo ($show_img["$i"]); ?>" data-rel="prettyPhoto[gallery]"> <img src="/my_mall/Public/uploads/product_img/<?php echo ($show_img["$i"]); ?>" alt="" /> </a>
											</div>
										</div><?php } ?>
										<!--<div>
											<div class="image-thumb">
												<a href="/my_mall/Public/home/images/shop/large/shop_2.jpg" data-rel="prettyPhoto[gallery]"> <img src="/my_mall/Public/home/images/shop/shop_3.jpg" alt="" /> </a>
											</div>
										</div>
										<div>
											<div class="image-thumb">
												<a href="/my_mall/Public/home/images/shop/large/shop_3.jpg" data-rel="prettyPhoto[gallery]"> <img src="/my_mall/Public/home/images/shop/shop_4.jpg" alt="" /> </a>
											</div>
										</div>-->
									</div>
								</div>
								<div class="image-gallery-nav">
                                	<?php $__FOR_START_17534__=0;$__FOR_END_17534__=3;for($i=$__FOR_START_17534__;$i < $__FOR_END_17534__;$i+=1){ ?><div class="image-nav-item">
										<div class="image-thumb"> <img src="/my_mall/Public/uploads/product_img/<?php echo ($show_img["$i"]); ?>" alt="" /> </div>
									</div><?php } ?>
									<!--<div class="image-nav-item">
										<div class="image-thumb"> <img src="/my_mall/Public/home/images/shop/thumb/shop_1.jpg" alt="" /> </div>
									</div>
									<div class="image-nav-item">
										<div class="image-thumb"> <img src="/my_mall/Public/home/images/shop/thumb/shop_3.jpg" alt="" /> </div>
									</div>
									<div class="image-nav-item">
										<div class="image-thumb"> <img src="/my_mall/Public/home/images/shop/thumb/shop_4.jpg" alt="" /> </div>
									</div>-->
								</div>
							</div>
							<div class="col-md-6">
								<div class="summary">
									<h1 class="product-title"><?php echo ($data["name"]); ?></h1>
									<div class="product-rating">
										<div class="star-rating"> <span style="width:100%"></span> </div>
										<i>(<?php echo ($allcomment); ?> 顾客评论)</i>
									</div>
									<div class="product-price">
										<del>￥<?php echo ($data["machete_price"]); ?></del> <ins>￥<?php echo ($data["here_price"]); ?></ins>
									</div>
									<div class="mb-3">
										<p><?php echo ($data["intro"]); ?></p>
                                        <!--<p>品味最好的果园采摘的橙子的美味。用橙子的好处培养健康的生活方式。100%个桔子汁，不加糖，有益健康。 </p>-->
									</div>
									<form class="cart" id="addform" method="post" action="/my_mall/home/shopcar/add">
										<div class="quantity-chooser">
											<div class="quantity">
												<span class="qty-minus" data-min="1"><i class="ion-ios-minus-outline"></i></span>
												<input type="text" name="pro_num" value="1" title="Qty" class="input-text qty text" size="4">
												<span class="qty-plus" data-max=""><i class="ion-ios-plus-outline"></i></span>
                                                <input type="hidden" name="pro_Id" value="<?php echo ($data["Id"]); ?>"/>
											</div>
										</div>
										<button type="submit" class="single-add-to-cart">加入购物车</button>
									</form>
									<div class="product-tool">
										<a href="/my_mall/home/farite/add/pro_Id/<?php echo ($data["Id"]); ?>" data-toggle="tooltip" data-placement="top" title="加入收藏"> 收藏 </a>
										<!--<a class="compare" href="#" data-toggle="tooltip" data-placement="top" title="Add to compare"> Compare </a>-->
									</div>
									<div class="product-meta">
										<table>
											<tbody>
												<tr> <td class="label">类别</td> <td><a href="/my_mall/home/product/product/classId/<?php echo ($data["classId"]); ?>"><?php echo ($data["bName"]); ?></a></td> </tr>
												<tr>
													<td class="label">分享</td>
													<td class="share">
														<a href="#" data-toggle="tooltip" data-placement="top" title="微信"><i class="fa fa-weixin"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="微博"><i class="fa fa-weibo"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="相片分享"><i class="fa fa-pinterest"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="commerce-tabs tabs classic">
									<ul class="nav nav-tabs tabs">
										<li class="active"> <a data-toggle="tab" href="#tab-description" aria-expanded="true">产品描述</a> </li>
										<li class=""> <a data-toggle="tab" href="#tab-reviews" aria-expanded="false">评论</a> </li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active in" id="tab-description">
											<!--<p> 鲜榨橙汁是以鲜橙子为原料经过榨汁机压榨得到的果汁饮料，比较新鲜，是一款含有丰富维生素C的营养饮品，可经过冷冻的方法饮用或直接饮用。 </p>-->
                                            <p><?php echo ($data["description"]); ?></p>
										</div>
										<div id="tab-reviews" class="tab-pane fade">
											<div class="single-comments-list mt-0">
												<div class="mb-2"> <h2 class="comment-title">评论</h2> </div>
												<ul class="comment-list">
                                                <?php if(is_array($list)): foreach($list as $key=>$vcom): ?><li>
														<div class="comment-container">
															<div class="comment-author-vcard"> <img alt="<?php echo ($vcom["user_Name"]); ?>" src="/my_mall/Public/uploads/userphoto/<?php echo ($vcom["Uuserphoto"]); ?>" /> </div>
															<div class="comment-author-info">
																<span class="comment-author-name"><?php echo ($vcom["user_Name"]); ?></span>
                                                                <?php $__FOR_START_23683__=0;$__FOR_END_23683__=$vcom["com_class"];for($i=$__FOR_START_23683__;$i < $__FOR_END_23683__;$i+=1){ ?><i class="fa fa-star" style="color:rgb(255, 153, 0)"></i><?php } ?>
                                                                <?php $__FOR_START_32256__=$vcom["com_class"];$__FOR_END_32256__=5;for($i=$__FOR_START_32256__;$i < $__FOR_END_32256__;$i+=1){ ?><i class="fa fa-star"></i><?php } ?>
																<p><?php echo ($vcom["comment"]); ?></p>
															</div>
															<div class="reply"> <?php echo ($vcom["Caddtime"]); ?> </div><!--<a class="comment-reply-link" href="#">回复</a>-->
														</div>
                                                    </li><?php endforeach; endif; ?>
												</ul>
											</div>
                                            <?php if($comment == 'yes'): ?><div class="single-comment-form mt-0">
												<div class="mb-2">
													<h2 class="comment-title">留下回复</h2>
												</div>
                                                <form class="comment-form" method="post" action="/my_mall/home/comment/add">
													<div class="row">
														<div class="col-md-12">
															<textarea name="comment" rows="5" placeholder="写下您的感想 *"></textarea>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<p><?php echo ($_SESSION['user']); ?></p>
														</div>
														<div class="col-md-4">
                                                             <div class="zx_cdR01">
                                                                <ul class="clearfix">
                                                                   <li>综合评价：</li>
                                                                   <li><i class="fa fa-star"></i></li>
                                                                   <li><i class="fa fa-star"></i></li>
                                                                   <li><i class="fa fa-star"></i></li>
                                                                   <li><i class="fa fa-star"></i></li>
                                                                   <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                             </div>
                                                             <input value="<?php echo ($data["Id"]); ?>" name="pro_Id" type="hidden"/>
                                                             <input value="" name="com_class" id="pl" type="hidden"/>
														</div>
                                                        <div class="col-md-4">
                                                             <input name="submit" type="submit" id="submit" class="btn btn-alt btn-border" value="提交">
														</div>
													</div>
												</form>
											</div><?php endif; ?>
										</div>
									</div>
								</div>
								<div class="related">
									<div class="related-title">
										<div class="text-center mb-1 section-pretitle fz-34">Related</div>
										<h2 class="text-center section-title mtn-2 fz-24">产品</h2>
									</div>
									<div class="product-carousel p-0" data-auto-play="true" data-desktop="3" data-laptop="2" data-tablet="2" data-mobile="1">
                                    <?php if(is_array($hotproduct)): foreach($hotproduct as $key=>$vphs): ?><div class="product-item text-center">
                                        <div class="product-thumb">
                                            <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vphs["PId"]); ?>">
                                                <div class="badges">
                                                <?php if($vphs["ishot"] == '是'): ?><span class="hot">热</span><?php endif; ?>
                                                </div>
                                                <?php if($vphs["stock"] == '0'): ?><span class="outofstock">空</span><?php endif; ?>
                                                <?php if($vphs["sale"] == '0'): ?><span class="onsale">安全</span><?php endif; ?>
                                                <img src="/my_mall/Public/uploads/product_img/<?php echo ($vphs["Pproduct_img"]); ?>" alt="<?php echo ($vphs["Pname"]); ?>" />
                                            </a>
                                            <div class="product-action">
                                                <span class="add-to-cart">
                                                <?php if($vphs["stock"] != '0'): ?><a href="/my_mall/home/shopcar/add/pro_Id/<?php echo ($vphs["PId"]); ?>/pro_num/1" data-toggle="tooltip" data-placement="top" title="加入购物车"></a><?php endif; ?>
                                                </span>
                                                <span class="wishlist">
                                                    <a href="/my_mall/home/farite/add/pro_Id/<?php echo ($vphs["PId"]); ?>" data-toggle="tooltip" data-placement="top" title="收藏"></a>
                                                </span>
                                                <span class="quickview">
                                                    <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vphs["PId"]); ?>" data-toggle="tooltip" data-placement="top" title="详情"></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="/my_mall/home/product/productinfo/Id/<?php echo ($vphs["PId"]); ?>">
                                                <h2 class="title"><?php echo ($vphs["Pname"]); ?></h2>
                                                <span class="price">￥<?php echo ($vphs["PHprice"]); ?></span>
                                            </a>
                                        </div>
                                    </div><?php endforeach; endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="widget widget-product-search">
								<form class="form-search" method="post" action="/my_mall/home/product/product">
									<input type="text" class="search-field" placeholder="商品搜索···" value="" name="name" />
									<input type="submit" value="Search" />
								</form>
							</div>
							<!--<div class="widget widget-product-categories">
								<h3 class="widget-title">产品分类</h3>
								<ul class="product-categories">
                                <?php if(is_array($procl)): foreach($procl as $key=>$vo): ?><li><a href="/my_mall/home/product/product/classId/<?php echo ($vo["Id"]); ?>"><?php echo ($vo["name"]); ?></a> <span class="count"><?php echo ($vo["pnums"]); ?></span></li><?php endforeach; endif; ?>
									<li><a href="#">果干</a> <span class="count">6</span></li>
									<li><a href="#">水果</a> <span class="count">5</span></li>
									<li><a href="#">果汁</a> <span class="count">6</span></li>
									<li><a href="#">蔬菜</a> <span class="count">6</span></li>
								</ul>
							</div>-->
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
<script type="text/javascript" src="/my_mall/Public/home/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/modernizr-2.7.1.min.js"></script>-->
<script type="text/javascript" src="/my_mall/Public/home/js/owl.carousel.min.js"></script>
<!--<script type="text/javascript" src="/my_mall/Public/home/js/jquery.countdown.min.js"></script>-->
<script type='text/javascript' src='/my_mall/Public/home/js/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='/my_mall/Public/home/js/jquery.prettyPhoto.init.min.js'></script>
<script type='text/javascript' src='/my_mall/Public/home/js/slick.min.js'></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $(".zx_cdR01 ul li i").each(function(e) {
            var len=$(".zx_cdR01 ul li i").length;
			$(".zx_cdR01 ul li i").eq(e).click(function(){
				if($(".zx_cdR01 ul li i").eq(e).css("color")=="rgb(255, 153, 0)"){
					for(var j=e+1;j<len;j++){
						$(".zx_cdR01 ul li i").eq(j).css("color","rgb(153,153,153)");
					}
					for(var k=0;k<=e;k++){
						$(".zx_cdR01 ul li i").eq(k).css("color","rgb(255, 153, 0)");
					}
				}else{
					for(var j=e;j<len;j++){
						$(".zx_cdR01 ul li i").eq(j).css("color","rgb(153,153,153)");
					}
					for(var k=0;k<=e;k++){
						$(".zx_cdR01 ul li i").eq(k).css("color","rgb(255, 153, 0)");
					}
				}
				var plnum=0;
				for(var i=0;i<len;i++){
					if($(".zx_cdR01 ul li i").eq(i).css("color")=="rgb(255, 153, 0)"){
						plnum++
						continue;
					}else{
						break;
					}
				}
				$("#pl").val(plnum);
			})
        });
    });
</script>
</body>
</html>