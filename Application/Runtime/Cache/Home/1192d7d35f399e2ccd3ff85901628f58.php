<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link rel="stylesheet" href="/my_mall/Public/home/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="/my_mall/Public/home/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/my_mall/Public/home/css/ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">

<title>个人资料</title>
<script src="/my_mall/Public/home/js/jquery.min.js"></script>
<script src="/my_mall/Public/home/js/personal.js"></script>
<script src="/my_mall/Public/home/js/area.js"></script>

</head>
<body>
<div id="main">
      <ul class="breadcrumbs">
          <li>收货地址</li>
          <li><a href="/my_mall/home/user/user">会员中心</a></li>
      </ul>
      <div class="section section-checkout">
      	<?php if(is_array($data)): foreach($data as $key=>$vad): ?><div class="col-md-4 col-sm-4">
              <dl class="item">
                  <dt>
                      <strong class="itemConsignee"><i class="fa fa-user"></i><?php echo ($vad["name"]); ?></strong> <span class="itemTag tag">删除</span>
                  </dt>
                  <dd>
                      <p class="tel itemTel"><i class="fa fa-phone "></i><?php echo ($vad["phonenumber"]); ?></p>
                      <p class="itemRegion"><i class="fa fa-map-marker"></i><?php echo ($vad["address_province"]); ?> <?php echo ($vad["address_city"]); ?> <?php echo ($vad["address_county"]); ?></p>
                      <p class="itemStreet"><?php echo ($vad["address_info"]); ?> ( <?php echo ($vad["postcode"]); ?> ) </p>
                      <span class="edit-btn J_editAddr">编辑</span>
                      <?php if($vad["ismoren"] == '是'): ?><span class="moren">默认</span><?php endif; ?>
                      <input type="hidden" value="<?php echo ($vad["Id"]); ?>" class="_Id" />
                  </dd>
              </dl>
          </div><?php endforeach; endif; ?>
          <!--<div class="col-md-4 col-sm-4">
              <dl class="item">
                  <dt>
                      <strong class="itemConsignee"><i class="fa fa-user"></i>潘骏杰</strong> <span class="itemTag tag">删除</span>
                  </dt>
                  <dd>
                      <p class="tel itemTel"><i class="fa fa-phone "></i>15961726437</p>
                      <p class="itemRegion"><i class="fa fa-map-marker"></i>江苏 无锡市 北塘区</p>
                      <p class="itemStreet">民丰西苑82号202室(214045)</p>
                      <span class="edit-btn J_editAddr">编辑</span>
                  </dd>
                  <dd style="display:none">
                      <input name="Checkout[address]" class="addressId" value="10140916720030323" type="radio">
                  </dd>
              </dl>
          </div>-->
          <div class="col-md-4 col-sm-4">
              <div class="item use-new-addr" id="J_useNewAddr" data-state="off">
                   <span class="iconfont icon-add"><i class="ion-plus-round"></i></span>使用新地址
              </div>
          </div>
          <div class="pagination"> 
              <?php echo ($page); ?>
          </div>
      </div>
      <div class="tanc">
    	<form action="" method="post">
        	<h1>新增/编辑收货地址</h1>
            <ul>
            	<li class="sh_name">收货人：<input type="text" name="name" id="sh_name" placeholder="请输入收货人" disableautocomplete="" autocomplete="off"/></li>
                <input type="hidden" id="eq" value=""/>
                <li class="sh_address">
                	请选择地址：
                	<div class="info">
                        <div id="info_ads_chose">
                            <select id="s_province" name="address_province" disableautocomplete="" autocomplete="off"></select>&nbsp;&nbsp;
                            <!--<option selected="selected" value="0">111111</option>-->
                            <select id="s_city" name="address_city" disableautocomplete="" autocomplete="off" ></select>&nbsp;&nbsp;
                            <select id="s_county" name="address_county" disableautocomplete="" autocomplete="off"></select>
                        </div>
                        <div id="show"></div>
                    </div>
                
                <!--三级联动 start-->
                    <script type="text/javascript">
                        var Gid  = document.getElementById ;
                        var showArea = function(){
                            Gid('show').innerHTML = "<h3>省" + Gid('Marquee').value + " - 市" + 	
                            Gid('s_city').value + " - 县/区" + 
                            Gid('s_county').value + "</h3>"
                                                    }
                        Gid('s_county').setAttribute('onchange','showArea()');
                    </script>
                    <!--三级联动 end-->
                
                    <script type="text/javascript">_init_area();</script>
                </li>
                <li class="inp_address"><input type="text" id="inp_address" name="address_info" placeholder="请输入详细地址" disableautocomplete="" autocomplete="off" /></li>
                <li class="inp_pho">联系电话：<input type="text" id="inp_pho" name="phonenumber" placeholder="请输入联系电话号码" disableautocomplete="" autocomplete="off" /></li>
                <li class="inp_ads_name">邮编：<input type="text" id="inp_ads_name" name="postcode" placeholder="请输入邮编" disableautocomplete="" autocomplete="off" /></li>
                <li class="add_chose">
                    <input id="ismoren" value="是" name="ismoren" checked="" type="checkbox" disableautocomplete="" autocomplete="off" /> 
                    <label for="ismoren">设为默认</label>
                    <input type="hidden" id="myId" value="" name="Id" /></li>
                <li class="ads_sub"><input class="sure" type="submit" name="sure" value="确认"/><input class="false" id="false" type="button" name="false" value="取消"/></li>
            </ul>
        </form>
      </div> 
      <div class="ads_del">
          <form class="del_ads" method="post" action="/my_mall/home/address/delete">
              <input type="hidden" id="del_eq" value=""/>
              <input type="hidden" id="Id_del" value="" name="Id" />
              <h1>删除地址</h1>
              <p class="del_ts">你确定删除该地址吗？</p>
              <p class="del_bun"><input class="submit" type="submit" value="确定" /><input class="button" type="button" value="取消" /></p>
          </form>
      </div>
</div>
</body>
</html>