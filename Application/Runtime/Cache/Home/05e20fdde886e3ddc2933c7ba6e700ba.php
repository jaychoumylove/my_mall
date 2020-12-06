<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>联系我们</title>

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<!--<link rel="stylesheet" href="/my_mall/Public/home/css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/owl.theme.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/prettyPhoto.css" type="text/css" media="all">-->
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
					<div class="col-sm-12"> <h2 class="page-title text-center">联系我们</h2> </div>
				</div>
			</div>
		</div>
		<div class="section border-bottom pt-2 pb-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="breadcrumbs">
							<li><a href="index.html">首页</a></li> <li>联系我们</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="section pt-10 pb-10">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center mb-1 section-pretitle">Get in touch</div>
						<h2 class="text-center section-title mtn-2">健康的有机农场</h2>
						<div class="organik-seperator mb-6 center">
							<span class="sep-holder"><span class="sep-line"></span></span>
							<div class="sep-icon"><i class="organik-flower"></i></div>
							<span class="sep-holder"><span class="sep-line"></span></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
                    	<main class="contact">
                            <iframe class="concact-iframe" src="/my_mall/home/index/map"  frameborder="0" scrolling="no"></iframe>
                        </main>
						<!--<div id="googleMap" class="mb-6" data-icon="/my_mall/Public/home/images/icon_location.png" data-lat="37.789133" data-lon="-122.402158"></div>-->
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="contact-info">
							<div class="contact-icon"> <i class="fa fa-map-marker"></i> </div>
							<div class="contact-inner">
								<h6 class="contact-title"> 地址</h6>
								<div class="contact-content"> 望城区青山路 果蔬城 </div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="contact-info">
							<div class="contact-icon"> <i class="fa fa-phone"></i> </div>
							<div class="contact-inner">
								<h6 class="contact-title"> 热线 </h6>
								<div class="contact-content"> 7311 333 8889 </div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="contact-info">
							<div class="contact-icon"> <i class="fa fa-envelope"></i> </div>
							<div class="contact-inner">
								<h6 class="contact-title"> 电子邮件联系</h6>
								<div class="contact-content"> 73113338889@gmail.com </div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="contact-info">
							<div class="contact-icon"> <i class="fa fa-globe"></i> </div>
							<div class="contact-inner">
								<h6 class="contact-title"> 网站</h6>
								<div class="contact-content"> www.Fruit&vegetable.com </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<hr class="mt-4 mb-7" />
						<div class="text-center mb-1 section-pretitle">Leave us a message!</div>
						<div class="organik-seperator mb-6 center">
							<span class="sep-holder"><span class="sep-line"></span></span>
							<div class="sep-icon"><i class="organik-flower"></i></div>
							<span class="sep-holder"><span class="sep-line"></span></span>
						</div>
						<div class="contact-form-wrapper">
							<form class="contact-form">
								<div class="row">
									<div class="col-md-6">
										<label>您的名字 <span class="required">*</span></label>
										<div class="form-wrap">
											<input type="text" name="your-name" value="" size="40" />
										</div>
									</div>
									<div class="col-md-6">
										<label>您的邮箱<span class="required">*</span></label>
										<div class="form-wrap">
											<input type="email" name="your-email" value="" size="40" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>主题</label>
										<div class="form-wrap">
											<input type="text" name="your-subject" value="" size="40" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>意见</label>
										<div class="form-wrap">
                                        	<textarea name="your-message" cols="40" rows="10"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-wrap text-center"> <input type="submit" value="提交" /> </div>
									</div>
								</div>
							</form>
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-migrate.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="js/modernizr-2.7.1.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.countdown.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.init.min.js"></script>-->
<script type="text/javascript" src="js/script.js"></script>

</html>