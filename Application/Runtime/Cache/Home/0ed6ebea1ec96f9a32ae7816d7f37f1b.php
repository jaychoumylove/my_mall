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
<title>我的评论</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>
<script src="/my_mall/Public/home/js/area.js"></script>

</head>
<body>
<div class="main">
    <ul class="breadcrumbs">
        <li>我的评论</li>
        <li><a href="/my_mall/home/user/main">会员中心</a></li>
    </ul>
	<div class="zx_cont">
    <?php if(is_array($data)): foreach($data as $key=>$vuc): ?><div class="zx_cdiv clearfix">
            <div class="zx_cdL">
              <img src="/my_mall/Public/uploads/userphoto/<?php echo ($vuc["Uuserphoto"]); ?>" alt="<?php echo ($vuc["user_Name"]); ?>">
               <p><?php echo ($vuc["user_Name"]); ?><span>消费会员</span></p>
            </div>
            <div class="zx_cdR zx_cdRdiv">
               <div class="zx_cdR01">
                  <ul class="clearfix">
                  <?php $__FOR_START_14032__=0;$__FOR_END_14032__=$vuc["com_class"];for($i=$__FOR_START_14032__;$i < $__FOR_END_14032__;$i+=1){ ?><li><i class="fa fa-star" style="color:rgb(255, 153, 0)"></i></li><?php } ?>
                  <?php $__FOR_START_24009__=$vuc["com_class"];$__FOR_END_24009__=5;for($i=$__FOR_START_24009__;$i < $__FOR_END_24009__;$i+=1){ ?><li><i class="fa fa-star"></i></li><?php } ?>
                     <!--<li></li>
                     <li><img src="/my_mall/Public/home/images/start.png"/></li>
                     <li><img src="/my_mall/Public/home/images/start.png"/></li>
                     <li><img src="/my_mall/Public/home/images/start.png"/></li>
                     <li><img src="/my_mall/Public/home/images/start.png"/></li>-->
                  </ul>
                  <p>发布于：<?php echo ($vuc["Caddtime"]); ?></p>
               </div>
               <div class="zx_cdR02">
                   <p class="clearfix"><span>评论：</span><i><?php echo ($vuc["comment"]); ?></i></p>
                </div>
                <!--<div class="zx_cdR03">
                   <span>用户晒单：</span>
                      <ul class="clearfix">
                         <li><img src="/my_mall/Public/home/images/shop/shop_1.jpg" alt="晒单01"/></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="晒单02"/></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_1.jpg" alt="晒单03"/></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="晒单04"/></li>
                      </ul>
                </div>-->
               <!-- <div class="zx_cdR02 zx_cdR04">
                   <p class="clearfix"><span>客服回复：</span><i>谢谢亲的好评！欢迎下次光临！</i></p>
                </div>-->
               <img class="rjiao" src="/my_mall/Public/home/images/zx_contsj.png" alt="评价">
            </div>
        </div><?php endforeach; endif; ?>
        <!--<div class="zx_cdiv clearfix">
            <div class="zx_cdL">
              <img src="/my_mall/Public/home/images/my.jpg" alt="帕丁丁">
               <p>帕丁丁18874042302<span>消费会员</span></p>
            </div>
            <div class="zx_cdR zx_cdRdiv">
               <div class="zx_cdR01">
                  <ul class="clearfix">
                     <li><img src="/my_mall/Public/home/images/start.png"></li>
                     <li><img src="/my_mall/Public/home/images/start.png"></li>
                     <li><img src="/my_mall/Public/home/images/start.png"></li>
                     <li><img src="/my_mall/Public/home/images/start.png"></li>
                     <li><img src="/my_mall/Public/home/images/start.png"></li>
                  </ul>
                  <p>发布于：2017-12-14 12:53:21</p>
               </div>
               <div class="zx_cdR02">
                   <p class="clearfix"><span>评论：</span><i>很新鲜，很美味，健康的选择，真心推荐；很新鲜，很美味，健康的选择，真心推荐；很新鲜，很美味，健康的选择，真心推荐重要的事多说几遍</i></p>
                </div>
                <div class="zx_cdR03">
                   <span>用户晒单：</span>
                      <ul class="clearfix">
                         <li><img src="/my_mall/Public/home/images/shop/shop_1.jpg" alt="晒单01"></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="晒单02"></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_1.jpg" alt="晒单03"></li>
                         <li><img src="/my_mall/Public/home/images/shop/shop_2.jpg" alt="晒单04"></li>
                      </ul>
                </div>
               <div class="zx_cdR02 zx_cdR04">
                   <p class="clearfix"><span>客服回复：</span><i>谢谢亲的好评！欢迎下次光临！</i></p>
                </div>
               <img class="rjiao" src="/my_mall/Public/home/images/zx_contsj.png" alt="评价">
            </div>
        </div>-->
     </div>
     <div class="pagination"> 
        <?php echo ($page); ?>
    </div>           
</div>
</body>
</html>