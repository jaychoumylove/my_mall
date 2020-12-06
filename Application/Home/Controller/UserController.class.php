<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checkslogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function user(){//个人中心首页
		$user=D("user");
		$where['username']=session('user');
		$userinfo=$user->where($where)->find();
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$allorder=R('order/allorder');
		$this->assign('allorder',$allorder);
		$allforcomment=R('order/allforcomment');
		$this->assign('allforcomment',$allforcomment);
		$allforpay=R('order/allforpay');
		$this->assign('allforpay',$allforpay);
		$allforship=R('order/allforship');
		$this->assign('allforship',$allforship);
		$this->assign('userinfo',$userinfo);
		$this->display('user/user');
	}
	public function update(){//个人信息查看/修改
		$user=D('user');
		$where['username']=session('user');
		if(IS_POST){
			$rules=array(
				array('email','email','邮箱格式不正确！'),
				array('phone','checkphone','手机号码不正确！',0,'function'),
			);
			$rule=array();
			if($user->validate($rules)->auto($rule)->create()){
				if($user->userpwd==''){
					$user->userpwd=I('post.userpwdh');
				}else{
					$user->userpwd=md5($user->userpwd);
				}
				$upload_config=array(
					'maxSize' => 3145728,//文件上传最大字节
					'rootPath' => './Public/uploads/userphoto/',//文件上传根目录
					'savePath' => '',
					'saveName' => array('uniqid',''),//设置上传文件的保存规则
					'exts' => array('jpg','gif','png','jpeg'),//设置文件上传类型
					'autoSub' => true,//是否开启子目录自动保存文件
					'subName' => array('date','Ymd')//子目录创建方式
				);
				$upload = new \Think\Upload($upload_config);
				$info = $upload->upload();
				if(!$info){
					$user->userphoto=I('post.userphotoh');
				}else{
					$user->userphoto=$info['userphoto']['savepath'].$info['userphoto']['savename'];
				}
				if($user->where($where)->save()){
					$this->success('操作成功！',U('user/update'),5);
				}else{
					$Error=$user->getError();
					$this->error("操作失败了！".$Error,U('user/update'),5);
				}
			}else{
				$data=$user->where($where)->find();
				$this->assign('data',$data);
				$Error=$user->getError();
				echo "<script>alert('".$Error."');</script>";
				$this->display('user/update');
			}
		}else{
			$data=$user->where($where)->find();
			$this->assign('data',$data);
			$this->display('user/update');
		}
	}
	public function ajaxpwd(){
		$user=D('user');
		$where['username']=session('user');
		if(IS_AJAX){
			$pwd=I('get.ouserpwd');
			$tmp_password=$user->where($where)->getField('userpwd');
			if($tmp_password==md5($pwd)){
				$info='OK';
			}else{
				$info='NO';
			}
			$this->ajaxReturn($info);
		}elseif(IS_POST){
			//$this->display('user/ajaxpwd');
			$rules=array(
				array('userpwd','checkpwds','密码格式不正确！',0,'function'),
				array('ruserpwd','userpwd','确认密码不正确！',0,'confirm',1)
			);
			$rule=array();
			if($user->validate($rules)->auto($rule)->create()){
				$user->userpwd=md5($user->userpwd);
				if($user->where($where)->save()){
					$this->success('操作成功！',U('user/ajaxpwd'),2);
				}else{
					$Error=$user->getError();
					$this->error("操作失败了！".$Error,U('user/ajaxpwd'),2);
				}
			}
		}else{
			//array('userpwd','checkpwds','密码格式不正确！',0,'function')
			$this->display('user/ajaxpwd');
		}
	}
	public function main(){
		$order=D('order');
		$map['fw_orderlist.user_Name']=session('user');
		$all=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->join('fw_category ON fw_category.Id=fw_product.classId')->where($map)->field("fw_order.order_Num as O_Num,fw_order.paytime as O_ptime,fw_order.pay as O_pay,fw_order.paytime as Ptime,fw_order.payment as O_pment,fw_order.shippingment as O_spment,fw_order.orderment as O_ment,fw_product.name as Pname,fw_orderlist.pro_num as Pnum,fw_category.name as PCName")->count();
		$data=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->where($map)->field("fw_order.order_Num as O_Num,fw_order.paytime as O_ptime,fw_orderlist.pay as Ol_pay,fw_order.payment as O_pment,fw_order.orderment as O_ment,fw_product.name as Pname,fw_orderlist.pro_num as Pnum,fw_product.product_img as Pproduct_img")->order('fw_order.paytime desc')->limit('0,2')->select();
		$m=1;
		for($i=0;$i<count($data);$i++){
			for($j=$i+1;$i<count($data);$j++){
				if($data[$i]['O_Num']!=$data[$j]['O_Num']){
					$data[$i]['Num']=$m;
					$m=1;
					break;
				}else{
					$m++;
					continue;
				}
			}
		}
		if($all==0){
			$len=0;
		}else{
			$len=2;
		}
		$this->assign('len',$len);
		$this->assign('data',$data);
		$hotproduct=R('product/hotproduct',array(4,0));
		$this->assign('hotproduct',$hotproduct);
		$this->display('user/main');
	}
}