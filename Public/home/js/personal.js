// JavaScript Document
$(document).ready(function () {
	$(".my_base .my_bform .tel").blur(function () {
		var tel = $(this).val();
		var reg = /^1(3\d|5[0-35-9]|8[025-9]|47)\d{8}$/;
		if (reg.test(tel)) {
			$(this).siblings("label").hide().siblings(".pt").show();
			return true;
		} else if (tel == "") {
			$(this).siblings(".pk").css("color", "#F00").show().siblings("label").hide();
			return false;
		} else {
			$(this).siblings(".px").css("color", "#F00").show().siblings("label").hide();
			return false;
		}
	});
	$(".my_base .my_bform .newpassword").blur(function () {
		var newpassword = $(this).val();
		var reg = /^\w{6,20}$/;
		if (reg.test(newpassword)) {
			$(this).siblings("label").hide().siblings(".pt").show();
			return true;
		} else if (tel == "") {
			$(this).siblings(".pk").css("color", "#F00").show().siblings("label").hide();
			return false;
		} else {
			$(this).siblings(".px").css("color", "#F00").show().siblings("label").hide();
			return false;
		}
	});
	$(".my_base .my_bform .rnewpassword").blur(function () {
		var newpassword = $(".my_base .my_bform .newpassword").val();
		var rnewpassword = $(this).val();
		if (rnewpassword != newpassword) {
			$(this).siblings(".px").css("color", "#F00").show().siblings("label").hide();
			return false;
		} else {
			$(this).siblings(".pt").show().siblings("label").hide();
			return false;
		}
	});
	$('.section-checkout .item').on('click', function () {
		$(this).addClass("onitem").parents(".col-md-4").siblings().children(".item").removeClass("onitem");
		$(this).children('dd').children('span').css("opacity", "1");
		$(this).parent().siblings().children('dl').children('dd').children("span").css("opacity", "0");
		$("#address").val($(this).children("dd").children("._Id").val());
	});
	$(".shippingtime p").eq(0).click(function () {
		$("#shippingtime").val("不限");
	});
	$(".shippingtime p").eq(1).click(function () {
		$("#shippingtime").val("工作日");
	});
	$(".shippingtime p").eq(2).click(function () {
		$("#shippingtime").val("双休日/假日");
	});
	$(".payment p").click(function () {
		$("#payment").val($(this).text());
	});
	$(".product-grid .product-thumb .delete").click(function () {
		$(".my_love .ads_del").show(500);
		$(".my_love .ads_del #Id_del").val($(".product-grid .product-thumb .delete input").val());
	});
	$(".collect_place .collect_place_name a").click(function () {
		$(".my_love .ads_del").show(500);
	});
	//添加地址弹出窗
	$(".section-checkout .use-new-addr").click(function () {
		$(".tanc").show(1000);
		//qk_address();
		if ($(".item").parent("div").prop("class") === "col-md-4 col-sm-4") {

		} else {
			for (var i = 0; i < $(".s_Id").length; i++) {
				//alert(i);
				$(".tanc").children("form").append('<input name="s_Id[]" type="hidden" value="' + $(".s_Id").eq(i).val() + '" />');
				//alert(9);
			}
		}
		$(".tanc form").attr("action", "/my_mall/home/address/add");
	});
	//获取地址信息
	$(".section-checkout .edit-btn").click(function () {
		if ($(this).parent("dd").parent(".item").parents("div").prop("class") === "col-md-4 col-sm-4") {
			$("#eq").val($(this).parent("dd").parent(".item").parents("div").index());
		} else {
			$("#eq").val($(this).parent("dd").parent(".item").parents("div").index() - 2);
		}
		$.ajax({
			type: "get",
			url: "/my_mall/home/address/ajaxjson",
			data: "Id=" + $(this).siblings("._Id").val(),
			dataType: "json",
			success: function (json) {
				$(".tanc").show(1000);
				$("#sh_name").val(json.name);
				$("#inp_address").val(json.address_info);
				$("#inp_pho").val(json.phonenumber);
				$("#inp_ads_name").val(json.postcode);
				$("#myId").val(json.Id);
				for (var pr = 0; pr < $("#s_province").children("option").length; pr++) {
					if ($("#s_province").children("option").eq(pr).val() === json.address_province) {
						$("#s_province").children("option").eq(pr).prop("selected", true);
						$("#s_province").change();
						break;
					} else {
						continue;
					}
				}
				for (var ct = 0; ct < $("#s_city").children("option").length; ct++) {
					if ($("#s_city").children("option").eq(ct).val() === json.address_city) {
						$("#s_city").children("option").eq(ct).prop("selected", true);
						$("#s_city").change();
						break;
					} else {
						continue;
					}
				}
				for (var co = 0; co < $("#s_county").children("option").length; co++) {
					if ($("#s_county").children("option").eq(co).val() === json.address_county) {
						$("#s_county").children("option").eq(co).prop("selected", true);
						break;
					} else {
						continue;
					}
				}
				/*$("#s_province").prepend("<option class='province' value="+json.address_province+">"+json.address_province+"</option>");
				$("#s_province").val(json.address_province);
				$("#s_city").prepend("<option class='city' value="+json.address_city+">"+json.address_city+"</option>");
				$("#s_city").val(json.address_city);
				$("#s_county").prepend("<option class='county' value="+json.address_county+">"+json.address_county+"</option>");
				$("#s_county").val(json.address_county);*/
				if (json.ismoren === '是') {
					$("#ismoren").attr("checked", true);
				} else {
					$("#ismoren").attr("checked", false);
				}
				$(".tanc form").attr("action", "/my_mall/home/address/update");
			}
		});
	});
	//取消修改地址
	$(".tanc .ads_sub .false").click(function () {
		$(".tanc").hide(1000);
		qk_address();
	});
	//删除地址弹出窗
	$(".section-checkout dt span").click(function () {
		//$("#act").val("del");
		$("#del_eq").val($(this).index());
		$("#Id_del").val($(this).parent().siblings().children("._Id").val());
		$(".ads_del").show(500);
	});
	//取消删除地址
	$(".button").click(function () {
		$("#Id_del").val("");
		$("#del_eq").val("");
		$(".ads_del").hide(500);
	});
	//清空地址
	function qk_address() {
		$(".sh_name").html('收货人：<input type="text" name="name" id="sh_name" placeholder="请输入收货人" disableautocomplete="" autocomplete="off"/>');
		$(".inp_address").html('<input type="text" id="inp_address" name="address_info" placeholder="请输入详细地址" disableautocomplete="" autocomplete="off" />');
		$(".inp_pho").html('联系电话：<input type="text" id="inp_pho" name="phonenumber" placeholder="请输入联系电话号码" disableautocomplete="" autocomplete="off" />');
		$(".inp_ads_name").html('邮编：<input type="text" id="inp_ads_name" name="postcode" placeholder="请输入邮编" disableautocomplete="" autocomplete="off" />');
		$("#s_province").children("option").prop("selected", false);
		$("#s_province").children("option").eq(0).prop("selected", true);
		//$("#s_province").change(0);
		$("#s_city").children("option").prop("selected", false);
		$("#s_city").children("option").eq(0).prop("selected", true);
		//$("#s_city").change();
		$("#s_county").children("option").prop("selected", false);
		$("#s_county").children("option").eq(0).prop("selected", true);
		$(".tanc form").attr("action", "");
		$("#ismoren").attr("checked", false);
		$("#myId").val("");
		$("#eq").val("");
		$(".tanc form").attr("action", "");
	}
	$(".sure").click(function () {
		var post_url = $(".tanc form").attr("action");
		if (post_url === "/my_mall/home/address/update") {
			var params = $(".tanc form").serialize();
			$.ajax({
				type: "post",
				url: post_url,
				data: params,
				dataType: "json",
				success: function (json) {
					if ($("#eq").val()) {
						if (json === "修改成功！") {
							var em = $('.section-checkout .item').eq($("#eq").val());
							em.children("dt").children(".itemConsignee").html('<i class="fa fa-user"></i>' + $("#sh_name").val() + '</strong>');
							em.children("dd").children(".itemTel").html('<i class="fa fa-phone "></i>' + $("#inp_pho").val());
							em.children("dd").children(".itemRegion").html('<i class="fa fa-map-marker"></i>' + $("#s_province").val() + ' ' + $("#s_city").val() + ' ' + $("#s_county").val() + ' ');
							em.children("dd").children(".itemStreet").html($("#inp_address").val() + ' ( ' + $("#inp_ads_name").val() + ' ) ');
							em.children("dd").children("._Id").val($("#myId").val());
							if ($("#ismoren").prop("checked") === true) {
								$('.section-checkout .item').children("dd").children(".moren").remove();
								em.children("dd").append('<span class="moren">默认</span>');
							}
							$(".tanc").hide(1000);
							qk_address();
						} else {
							alert(json);
						}
					}
					/*else{
												if(json.info==="成功"){
												  var box_s='';
												  if($(".item").parents("div").prop("class")==="col-md-4 col-sm-4"){
													  box_s='<div class="col-md-4 col-sm-4"><dl class="item">';
												  }else{
													  box_s='<div class="col-md-4"><dl class="item">';
												  }
												  var dt='<dt><strong class="itemConsignee"><i class="fa fa-user"></i>'+$("#sh_name").val()+'</strong> <span class="itemTag tag">删除</span></dt>';
												  var dd_s='<dd>';
												  var p_one='<p class="tel itemTel"><i class="fa fa-phone "></i>'+$("#inp_pho").val()+'</p>';
												  var p_two='<p class="itemRegion"><i class="fa fa-map-marker"></i>'+$("#s_province").val()+' '+$("#s_city").val()+' '+$("#s_county").val()+' </p>';
												  var p_three='<p class="itemStreet">'+$("#inp_address").val()+' ( '+$("#inp_ads_name").val()+' ) </p>';
												  var span_one='<span class="edit-btn J_editAddr">编辑</span>';
												  var span_two='';
												  if($("#ismoren").prop("checked")===true){
													  $('.section-checkout .item').children("dd").children(".moren").remove();
													  span_two='<span class="moren">默认</span>';
												  }
												  var end='</dd></dl></div>';
												  var inp='<input type="hidden" value="'+json+'" class="_Id" />';
												  if($(".item").parents("div").prop("class")==="col-md-4 col-sm-4"){
													 $(".section-checkout").prepend(box_s+dt+dd_s+p_one+p_two+p_three+span_one+span_two+inp+end);
												  }else{
													 $(".section-checkout").children("input").after(box_s+dt+dd_s+p_one+p_two+p_three+span_one+span_two+inp+end);
												  }
												}else{
													alert(json.info);
												}
											}*/
				}
			});
			return false;
		}
	});
	//修改密码
	$(".my_base .my_bform .my_bform_ipt").blur(function () {
		$.ajax({
			typr: "get",
			url: "/my_mall/home/user/ajaxpwd",
			data: "ouserpwd=" + $(this).val(),
			dataType: "json",
			success: function (json) {
				if (json === 'OK') {
					$(".my_base .my_bform .my_bform_ipt").siblings("label").hide().siblings(".ptr").css("color", "#0F0").show();
					return true;
				} else {
					$(".my_base .my_bform .my_bform_ipt").siblings(".pf").css("color", "#F00").show().siblings("label").hide();
					return false;
				}
			}
		});
	});
	//订单状态
	$("#orderment").change(function () {
		$("#orderment").parent("form").submit();
	});
});