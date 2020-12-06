<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="stylesheet" type="text/css" href="/my_mall/Public/home/css/personal.css">
<title>个人资料</title>
<script src="__PBULIC__/home/js/jquery.min.js"></script>
<script src="__PBULIC__/home/js/personal.js"></script>
<script src="__PBULIC__/home/js/area.js"></script>

</head>
<body>
<div class="main">
<ul class="breadcrumbs">
    <li>个人资料</li>
    <li><a href="personal-main.html">会员中心</a></li>
</ul>
<div class="my_base" >
   <form method="post" action="/my_mall/home/user/update" enctype="multipart/form-data">
      <div class="my_tx">
      	<?php if($data["userphoto"] == ''): ?><p><img src="/my_mall/Public/home/images/my.jpg" alt="<?php echo ($data["username"]); ?>" /> </p>
           <?php else: ?> 
           <p><img src="/my_mall/Public/uploads/userphoto/<?php echo ($data["userphoto"]); ?>" alt="<?php echo ($data["username"]); ?>" /> </p>
           <input type="hidden" name="userphotoh" value="<?php echo ($data["userphoto"]); ?>" /><?php endif; ?>
           <span><input type="file" name="userphoto">上传头像</span>
      </div>
      <div class="my_bform clearfix">
          <i><span>*</span>用户名：</i>
          <input type="text" name="username" class="my_bform_ipt username" value="<?php echo ($data["username"]); ?>"  />
      </div>
      <div class="my_bform clearfix">
          <i><span>*</span>姓名：</i>
          <input type="text" name="realname" class="my_bform_ipt" value="<?php echo ($data["realname"]); ?>" />
      </div>
      <div class="my_bform clearfix">
          <i><span>*</span>手机号：</i>
           <input type="text" name="tel" class="my_bform_ipt tel" value="<?php echo ($data["phone"]); ?>"  />
            <label>请填写11位有效的手机号码</label><label class="px">手机号码格式不正确</label><label class="pk">手机号码不能为空</label><label class="fa fa-check-circle blank hide"></label> 
      </div>
      <div class="my_bform clearfix">
          <i><span>*</span>性别：</i>
          <div class="my_bfbox">
         		<?php if($data["sex"] == '女'): ?><b><span></span><input name="sex" type="radio" value="女" checked="checked" /></b> 女
                <b><span style="display:none;"></span><input name="sex" type="radio" value="男"  /></b> 男
                <?php else: ?>
                <b><span></span><input name="sex" type="radio" value="女" /></b> 女
                <b><span style="display:none;"></span><input name="sex" type="radio" value="男" checked="checked"  /></b> 男<?php endif; ?>
          </div>
      </div>
      <div class="my_bform clearfix">
          <i>邮箱：</i>
           <input type="text" name="email" class="my_bform_ipt" value="<?php echo ($data["email"]); ?>"  />
      </div>
      <!--<div class="my_bform clearfix">
          <i><span>*</span>常住地：</i>
          <ul class="my_bformul">
              <li><select type="text" name="s_province" id="s_province" class="province">
                <option value=""></option>
                </select>&nbsp;&nbsp;省&nbsp;&nbsp; </li>
              <li><select name="s_city" id="s_city">
                   <option value=""></option>
               </select>&nbsp;&nbsp;市&nbsp;&nbsp; </li>
              <li><select name="s_county" id="s_county">
                   <option value=""></option>
               </select>&nbsp;&nbsp;区&nbsp;&nbsp; </li>
                <div id="show"></div>
          </ul>
      </div>
                         
        <script type="text/javascript">
            var Gid  = document.getElementById ;
            var showArea = function(){
                Gid('show').innerHTML = "<h3>省" + Gid('Marquee').value + " - 市" + 	
                Gid('s_city').value + " - 县/区" + 
                Gid('s_county').value + "</h3>"
                                        }
            Gid('s_county').setAttribute('onchange','showArea()');
        </script>
       
        <script type="text/javascript">_init_area();</script>
             <script type="text/javascript">
            $(function(){
                  $("#s_province").val('<?php echo '<?'; ?>
 echo $result_arr["s_province"];?>');
                  $("#s_city").append('<option value="<?php echo '<?'; ?>
 echo $result_arr["s_city"];?>"><?php echo '<?'; ?>
 echo $result_arr["s_city"];?></option>');
                  $("#s_city").val('<?php echo '<?'; ?>
 echo $result_arr["s_city"];?>');
                  $("#s_county").append('<option value="<?php echo '<?'; ?>
 echo $result_arr["s_county"];?>"><?php echo '<?'; ?>
 echo $result_arr["s_county"];?></option>');
                  $("#s_county").val('<?php echo '<?'; ?>
 echo $result_arr["s_county"];?>');
            });
        
        </script>
        
      <div class="my_bform clearfix">
         <input type="text" name="address" class="my_bform_ipt my_bform_ipt02" value="">
      </div>-->
           <input type="submit" name="" class="suer_bn" value="修改"/>
     </form>
</div>
</div>
</body>
</html>