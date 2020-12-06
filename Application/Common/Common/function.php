<?php
//该项目下的公共自定义函数
function checklogin(){
	if(!session('admin')){
		return false;
	}else{
		return true;
	}
}
function checkslogin(){
	if(!session('user')){
		return false;
	}else{
		return true;
	}
}
function checkphone($phone){
	$reg='/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/';
	if(!preg_match($reg,$phone)){
		return false;
	}else{
		return true;
	}
}
function checkname($name){
	$reg='/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/';//字母开头，允许5-16字节，允许字母数字下划线
	if(!preg_match($reg,$name)){
		return false;
	}else{
		return true;
	}
}
function checkpwd($pwd){
	$reg='/^\w{6,16}$/';
	//$reg='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}$/';//强密码验证——必须包含大小写字母和数字的组合，不能使用特殊字符，长度在8-10之间
	if(!preg_match($reg,$pwd)){
		return false;
	}else{
		return true;
	}
}
function checkcode($code){
	$verify=new \Think\Verify();
	if(!$verify->check($code)){//验证码检测
		return false;
	}else{
		return true;
	}
}
function checkpwds($pwd){
	if($pwd!=''){
		$reg='/^\w{6,16}$/';
		if(!preg_match($reg,$pwd)){
			return false;
		}else{
			return true;
		}
	}else{
		return true;
	}
}
function checkstock($stock){
	$reg='/^\d{1,5}$/';//库存区间10-999999
	if(!preg_match($reg,$stock)){
		return false;
	}else{
		return true;
	}
}
function checkprice($price){
	$reg='/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/';//价格允许小数点后两位
	if(!preg_match($reg,$price)){
		return false;
	}else{
		return true;
	}
}
function getpwd(){
	$pwd=I('post.adminpwd');
	if($pwd==""){
		$pwd=I('post.adminpwdh');
	}
	return md5($pwd);
}
function gettime(){
	$date=date("Y-m-d H:i:s",time());
	return $date;
}
