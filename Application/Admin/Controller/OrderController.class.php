<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:(</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function orderlist(){
		$order=D('order');
		$user_Name=I('param.user_Name');
		if($user_Name!=''){
			$where['user_Name'] = array('like','%'.$user_Name.'%');
			$where_n['user_Name']=$user_Name;
		}
		$order_Num=I('param.order_Num');
		if($order_Num!=''){
			$where['order_Num'] = array('EQ',$order_Num);
			$where_n['order_Num']=$order_Num;
		}
		$orderment=I('param.orderment');
		if($orderment!=''){
			$where['orderment'] = array('EQ',$orderment);
			$where_n['orderment']=$orderment;
		}
		if($order_Num!='' || $user_Name!='' || $orderment!=''){
			$all=$order->where($where)->count();
		}else{
			$all=$order->count();
		}
		$page=new \Think\Page($all,10);
		if($order_Num!='' || $user_Name!='' || $orderment!=''){
			foreach($where_n as $key=>$v){
				$page->parameter[$key]=$v;
			}
		}
		$show=$page->show();
		if($order_Num!='' || $user_Name!='' || $orderment!=''){
			$list=$order->where($where)->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}else{
			$list=$order->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}
		//$list=$model->where($where)->page($_GET['p'].',5')->select();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		//$this->assign('parameter',print_r($page->parameter));
		$this->assign('user_Name',$user_Name);
		$this->assign('order_Num',$order_Num);
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('order/orderlist');
	}
	public function orderinfo(){//个人某订单详情
		$order=D('order');
		$orderlist=D('orderlist');
		$order_Num=I('get.order_Num');
		$where['fw_orderlist.order_Num']=array('EQ',$order_Num);
		$map['fw_order.order_Num']=array('EQ',$order_Num);
		$data=$order->join('fw_address ON fw_address.Id=fw_order.address')->where($map)->find();
		$list=$orderlist->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->where($where)->field('fw_product.product_img as Pproduct_img,fw_product.here_price as Phere_price,fw_product.name as Pname,fw_orderlist.pay as Opay,fw_orderlist.pro_num as Opro_num')->select();
		$this->assign('list',$list);
		$this->assign('data',$data);
		$this->display('order/orderinfo');
	}
	public function send(){//发货
		$order=D('order');
		$where['order_Num']=I('get.order_Num');
		//$where['order_Num']=$order_Num;
		$orderment=$order->where($where)->getField('orderment');
		if($orderment=='待发货'){
			$order->orderment='确认收货';
			if($order->where($where)->save()){
				$this->success('发货成功！',U('order/orderlist'),3);
			}else{
				$Error.=$order->getError();
				$this->error('发货失败了:'.$Error);
			}
		}else{
			$Error=$order->getError();
			$this->error($orderment.'发货失败了:'.$Error);
		}
	}
}