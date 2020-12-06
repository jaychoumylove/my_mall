<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title><?php echo ($_SESSION['user']); ?> 个人中心</title>

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/custom.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/public.css">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">

<!--<link href="http://fonts.googleapis.com/css?family=Great+Vibes%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">-->
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
    	<div class="section">
			<div class="row">
                <div class="col-sm-12">
                    <div class="mymsg">
                        <div class="myCenter clearfix">
                            <div class="myCl">
                               <img src="/my_mall/Public/uploads/userphoto/<?php echo ($userinfo["userphoto"]); ?>" alt="<?php echo ($_SESSION['user']); ?>">
                            </div>
                            <div class="myCr">
                                <dl>
                                   <dt><img src="/my_mall/Public/home/images/my_icon01.png" alt="<?php echo ($_SESSION['user']); ?>"></dt>
                                   <dd><?php echo ($_SESSION['user']); ?></dd>
                                </dl>
                                <dl>
                                   <dt><img src="/my_mall/Public/home/images/my_icon02.png" alt="用户类型"></dt>
                                   <dd>普通会员</dd>
                                </dl>
                                <dl>
                                   <dt><img src="/my_mall/Public/home/images/my_icon03.png" alt="持有金币"></dt>
                                   <dd>5880<a href="#" target="_blank">金币兑换</a></dd>
                                </dl>
                                <dl>
                                   <dt><img src="/my_mall/Public/home/images/my_icon04.png" alt="信誉值"></dt>
                                   <dd><i><span></span></i><em>较高</em></dd>
                                </dl>
                            </div>
                        </div>
                        <ul class="order_list">
                           <li class="order_li"><a href="/my_mall/home/order/orderlist/orderment/待付款" target="iframe0"><i><?php echo ($allforpay); ?></i>待付款</a></li>
                           <li><a href="/my_mall/home/order/orderlist/orderment/待发货" target="iframe0"><i><?php echo ($allforship); ?></i>待发货</a></li>
                           <li><a href="/my_mall/home/order/orderlist/orderment/待评论" target="iframe0"><i><?php echo ($allforcomment); ?></i>待评价</a></li>
                           <li><a href="/my_mall/home/order/orderlist" target="iframe0"><i><?php echo ($allorder); ?></i>全部订单</a></li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <div class="section pt-7 pb-7">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
                    	<div id="ad-comment">
                            <div class="ad-main-comment" id="ad-iframe">
                                <iframe  name="iframe0" width="100%" height="100%" src="/my_mall/home/user/main" frameborder="0" data-id="/my_mall/home/user/main" seamless></iframe>
                            </div>
                        </div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="ad-menu" id="ad-menu">
                                <div class="ad-logo">会员中心</div>
                                <div class="ad-list">
                                    <ul>
                                        <li>
                                            <div class="li-item"><em class="scm li-ico ic1"></em>我的订单<span class="scm arrow"></span></div>
                                            <dl>
                                                <dd>
                                                    <a class="dd-item" href="/my_mall/home/order/orderlist" target="iframe0" >全部订单<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a href="/my_mall/home/order/orderlist/orderment/待发货" target="iframe0" class="dd-item">待发货<span class="scm dd-ar"></span></a>
                                                </dd>
                                                 <dd>
                                                    <a href="/my_mall/home/order/orderlist/orderment/确认收货" target="iframe0" class="dd-item">待收货<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a href="/my_mall/home/order/orderlist/orderment/完成" target="iframe0" class="dd-item">完成<span class="scm dd-ar"></span></a>
                                                </dd>
                                            </dl>
                                        </li>
                                        <li>
                                            <div class="li-item"><em class="scm li-ico ic2"></em>我的记录<span class="scm arrow"></span></div>
                                            <dl>
                                                <dd>
                                                    <a href="/my_mall/home/comment/comment" target="iframe0" class="dd-item">我的评论<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a href="/my_mall/home/farite/farite" target="iframe0" class="dd-item">我的收藏<span class="scm dd-ar"></span></a>
                                                </dd>
                                            </dl>
                                        </li>
                                        <!--<li>
                                            <div class="li-item"><em class="scm li-ico ic3"></em>账户管理<span class="scm arrow"></span></div>
                                            <dl>
                                                <dd>
                                                    <a href="#" class="dd-item">我的金品<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a href="#" class="dd-item">优惠券<span class="scm dd-ar"></span></a>
                                                </dd>
                                            </dl>
                                        </li>-->
                                        <li>
                                            <div class="li-item"><em class="scm li-ico ic4"></em>个人设置<span class="scm arrow"></span></div>
                                            <dl>
                                                <dd>
                                                    <a class="dd-item" href="/my_mall/home/user/update" target="iframe0">个人资料<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a href="/my_mall/home/user/ajaxpwd" target="iframe0" class="dd-item">修改密码<span class="scm dd-ar"></span></a>
                                                </dd>
                                                <dd>
                                                    <a  class="dd-item" href="/my_mall/home/address/address" target="iframe0">收货地址<span class="scm dd-ar"></span></a>
                                                </dd>
                                            </dl>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
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
<script src="/my_mall/Public/home/js/per.min.js"></script>
<script src="/my_mall/Public/home/js/contabs.js"></script>

<script type="text/javascript" src="/my_mall/Public/home/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>
<script src="/my_mall/Public/home/js/contabs.js"></script>
</body>
</html>