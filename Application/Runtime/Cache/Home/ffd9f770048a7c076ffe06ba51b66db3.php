<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>登录</title>

<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/bootstrap.min.css">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/gloab.css">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/index.css">
<link rel="stylesheet" href="/my_mall/Public/home/css/custom.css" type="text/css" media="all">


<script src="/my_mall/Public/home/js/jquery-1.11.1.min.js"></script>
<script src="/my_mall/Public/home/js/register.js"></script>
<script type="text/javascript" src="/my_mall/Public/home/js/script.js"></script>
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
			<div class="container">
				<div class="row">
					<div class="login-box">
                    	<img  class="loginbg1" src="/my_mall/Public/home/images/login1.png"> 
                    	<img  class="loginbg" src="/my_mall/Public/home/images/login1.png"> 
                        <div class="main">
                            <div class="reg-box-pan display-inline"> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center mb-1 section-pretitle">login</div>
                                        <h2 class="text-center section-title mtn-2">登录</h2>
                                        <div class="organik-seperator center">
                                            <span class="sep-holder"><span class="sep-line"></span></span>
                                            <div class="sep-icon"><i class="organik-flower"></i></div>
                                            <span class="sep-holder"><span class="sep-line"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="login-box f-mt10">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <form action="/my_mall/home/login/login" method="post">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input class="form-control" placeholder="用户名" name="username" type="text"><i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
  
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input class="form-control" placeholder="密码" name="userpwd" type="password"><i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input class="ace" type="checkbox"><span class="lbl"> 记住密码</span>
                                                    </label>
                                                    <button type="submit" class="width-35 btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i><span class="bigger-110">登录</span>
                                                    </button>
                                                </div>
                                                <div class="space-4"></div>
                                            </form>
      
                                            <div class="social-or-login center">
                                                <span class="bigger-110">第三方登录</span>
                                            </div>
                                            <div class="space-6"></div>
                                            <div class="social-login center">
                                                <a class="btn btn-primary"><i class="ace-icon fa fa-facebook"></i></a>
      
                                                <a class="btn btn-info"> <i class="ace-icon fa fa-weibo"></i> </a>
      
                                                <a class="btn btn-danger"><i class="ace-icon fa fa-weixin"></i></a>
                                            </div>
                                        </div>
                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                    <!--<i class="ace-icon fa fa-arrow-left"></i>--> 忘记密码
                                                </a>
                                            </div>
                                            <div>
                                                <a href="/my_mall/home/login/register" data-target="#signup-box" class="user-signup-link">
                                                    注册<!--<i class="ace-icon fa fa-arrow-right"></i>-->
                                                </a>
                                            </div>
                                        </div>
                                     </div>
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

<script type="text/javascript">
$(function(){	
	//第一页的确定按钮
	$("#btn_part1").click(function(){						
		if(!verifyCheck._click()) return;
		$(".part1").hide();
		$(".part2").show();
		$(".step li").eq(1).addClass("on");
	});
	//第二页的确定按钮
	$("#btn_part2").click(function(){			
		if(!verifyCheck._click()) return;
		$(".part2").hide();
		$(".part3").show();	
	});	
	//第三页的确定按钮
	$("#btn_part3").click(function(){			
		if(!verifyCheck._click()) return;
		$(".part3").hide();
		$(".part4").show();
		$(".step li").eq(2).addClass("on");
		countdown({
			maxTime:10,
			ing:function(c){
				$("#times").text(c);
			},
			after:function(){
				window.location.href="my.html";		
			}
		});		
	});	
});
function showoutc(){$(".m-sPopBg,.m-sPopCon").show();}
function closeClause(){
	$(".m-sPopBg,.m-sPopCon").hide();		
}
</script>
</body>
</html>