<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checkslogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function orderlist(){//个人订单列表
		$order=D('order');
		$orderment=I('param.orderment');
		if($orderment!=''){
			$map['fw_order.orderment'] = array('EQ', $orderment);
			$where_n['orderment']=$orderment;
		}
		$map['fw_order.user_Name']  = array('EQ',session('user'));
		$all=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->join('fw_category ON fw_category.Id=fw_product.classId')->where($map)->field("fw_order.order_Num as O_Num,fw_order.paytime as O_ptime,fw_order.pay as O_pay,fw_order.paytime as Ptime,fw_order.payment as O_pment,fw_order.shippingment as O_spment,fw_order.orderment as O_ment,fw_product.name as Pname,fw_orderlist.pro_num as Pnum,fw_category.name as PCName")->count();
		$page=new \Think\Pages($all,4);
		if($orderment!=''){
			foreach($where_n as $key=>$v){
				$page->parameter[$key]=$v;
			}
		}
		$data=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->where($map)->field("fw_order.order_Num as O_Num,fw_order.paytime as O_ptime,fw_orderlist.pay as Ol_pay,fw_order.payment as O_pment,fw_order.orderment as O_ment,fw_product.name as Pname,fw_product.Id as PId,fw_orderlist.pro_num as Pnum,fw_product.product_img as Pproduct_img")->order('fw_order.paytime desc')->limit($page->firstRow.','.$page->listRows)->select();
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
			$len=$page->listRows;
		}
		$show=$page->show();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$this->assign('orderment',$orderment);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('len',$len);
		$this->assign('data',$data);
		$this->assign('page',$show);
		/*dump($order);
		echo $data;
		print_r($data);
		dump($data);*/
		$this->display('order/orderlist');
	}
	public function orderinfo(){//个人某订单详情
		$order=D('order');
		$orderlist=D('orderlist');
		$order_Num=I('get.order_Num');
		$where['fw_orderlist.order_Num']=array('EQ',$order_Num);
		$map['fw_order.order_Num']=array('EQ',$order_Num);
		$data=$order->join('fw_address ON fw_address.Id=fw_order.address')->where($map)->find();
		$list=$orderlist->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->where($where)->field('fw_product.product_img as Pproduct_img,fw_orderlist.pro_Id as PId,fw_product.here_price as Phere_price,fw_product.name as Pname,fw_orderlist.pay as Opay,fw_orderlist.pro_num as Opro_num')->select();
		$this->assign('list',$list);
		$this->assign('data',$data);
		$this->display('order/orderinfo');
	}
	public function add(){//下订单
		if(IS_POST){
			$order=D('order');
			$rules=array();
			$rule=array();
			if($order->validate($rules)->auto($rule)->create()){
				$order->user_Name=session('user');
				$ordernum=date("YmdHis").mt_rand(100000,999999);
				$order->order_Num=$ordernum;
				$order->paytime=gettime();
				//$Id=I('post.Id');//获取购物车Id
				$shopcar=D('shopcar');
				$Id=I('post.sId');
				$orderlist=D('orderlist');
				$n=0;
				$m=0;
				$Error='';
				$product=D('product');
				$h=0;
				for($i=0;$i<count($Id);$i++){
					$where['Id']=$Id[$i];
					$data[$i]=$shopcar->where($where)->find();
					$orderlist->order_Num=$ordernum;
					$orderlist->user_Name=session('user');
					$orderlist->pro_Id=$data[$i]['pro_Id'];
					$orderlist->pro_num=$data[$i]['pro_num'];
					$orderlist->addtime=gettime();
					$pwhere['Id']=array('EQ',$data[$i]['pro_Id']);
					$pdata[$i]=$product->where($pwhere)->find();
					$product->stock=$pdata[$i]['stock']-$data[$i]['pro_num'];
					$product->sales_vol=$pdata[$i]['sales_vol']+$data[$i]['pro_num'];
					if($orderlist->add()){
						$n++;
					}else{
						$Error.=$orderlist->getError();
					}
					if($shopcar->delete($Id[$i])){
						$m++;
					}else{
						$Error.=$shopcar->getError();
					}
					if($product->stock<0){
						$Error.='没有库存了！';
					}else{
						if($product->where($pwhere)->save()){
							$h++;
						}else{
							$Error.=$product->getError();
						}
					}
				}
				/*dump($data);
				dump($product);
				die($Error);*/
				if(!$order->add() || $n!=count($Id) || $m!=count($Id) || $h!=count($Id)){
					$Error.=$order->getError();
					$this->error('下单失败了:'.$Error);
				}else{
					session(session('user'),null);
					$this->success('下单完成\(^o^)/~',U('user/user'),5);
				}
			}else{
				$Error=$order->getError();
				$this->error('下单失败了:'.$Error);
			}
		}else{
			
		}
	}
	public function del(){//删除订单
		$order=D('order');
		$orderlist=D('orderlist');
		$where['order_Num']=I('get.order_Num');
		$Error='';
		if($order->where($where)->delete() || $orderlist->where($where)->delete()){
			$this->success('删除成功！',U('order/orderlist'),5);
		}else{
			$Error.=$order->getError();
			$Error.=$orderlist->getError();
			$this->error('删除失败了:'.$Error);
		}
	}
	public function delAll(){//删除多个订单
		$order=D('order');
		$orderlist=D('orderlist');
		$order_Num=I('post.order_Num');
		$Error='';
		$n=0;
		for($m=0;$m<count($pro_Id);$m++){
			$where['order_Num']=$order_Num[$m];
			if($order->where($where)->delete() && $orderlist->where($where)->delete()){
				$n++;
			}else{
				$Error.=$order->getError();
				$Error.=$orderlist->getError();
			}
		}
		if($n==count($pro_Id)){
			$this->success('删除成功！',U('order/order'),3);
		}else{
			$this->error('删除失败了:'.$Error);
		}
	}
	public function clear(){//清空订单
		$order=D('order');
		$orderlist=D('orderlist');
		$where['user_Name']=session('user');
		if($order->where($where)->delete() && $orderlist->where($where)->delete()){
			$this->success('清空成功！',U('order/orderlist'),3);
		}else{
			$Error=$order->getError();
			$Error.=$orderlist->getError();
			$this->error('清空失败了:'.$Error);
		}
	}
	public function pay(){//付款
		$order=D('order');
		$order_Num=I('get.order_Num');
		$here['order_Num']=$order_Num;
		$orderment=$order->where($here)->getField('orderment');
		if($orderment=='待付款'){
			$orderlist=D('orderlist');
			$where['fw_orderlist.order_Num']=array('EQ',$order_Num);
			$data=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->join('fw_category ON fw_category.Id=fw_product.classId')->where($where)->field("fw_order.order_Num as O_Num,fw_order.paytime as O_ptime,fw_order.pay as O_pay,fw_order.paytime as Ptime,fw_order.payment as O_pment,fw_order.shippingment as O_spment,fw_order.orderment as O_ment,fw_product.name as Pname,fw_product.here_price as Pprice,fw_orderlist.pro_num as Pnum,fw_orderlist.Id as OlId,fw_category.name as PCName")->select();
			$order->pay=0.00;
			$n=0;
			$Error='';
			for($i=0;$i<count($data);$i++){
				$map['Id']=$data[$i]['OlId'];
				$list['pay']=$data[$i]['Pprice']*$data[$i]['Pnum'];
				if($orderlist->where($map)->save($list)){
					$n++;
				}else{
					$Error.=$orderlist->getError();
				}
				$order->pay=$order->pay+$list['pay'];
			}
			$order->orderment='待发货';
			if($order->where($here)->save() && $n==count($data)){
				$this->success('付款成功！',U('order/orderlist'),3);
			}else{
				$Error.=$order->getError();
				$this->error('付款失败了:'.$Error);
			}
		}else{
			$Error=$order->getError();
			$this->error('已经付款过了:'.$Error);
		}
	}
	public function getgoods(){//收货
		$order=D('order');
		$where['order_Num']=I('get.order_Num');
		//$where['order_Num']=$order_Num;
		$orderment=$order->where($where)->getField('orderment');
		if($orderment=='确认收货'){
			$list['orderment']='完成';
			if($order->where($where)->save($list)){
				$this->success('收货成功！',U('order/orderlist'),3);
			}else{
				$Error.=$order->getError();
				$this->error('收货失败了:'.$Error);
			}
		}else{
			$Error=$order->getError();
			$this->error('已经收货了:'.$Error);
		}
	}
	public function close(){//取消订单
		$order=D('order');
		$where['order_Num']=I('get.order_Num');
		//$where['order_Num']=$order_Num;
		$orderment=$order->where($where)->getField('orderment');
		if($orderment=='待付款'){
			$order->orderment='关闭';
			if($order->where($where)->save()){
				$this->success('取消订单成功！',U('order/orderlist'),3);
			}else{
				$Error.=$order->getError();
				$this->error('取消订单失败了:'.$Error);
			}
		}else{
			$Error=$order->getError();
			$this->error($orderment.':'.$Error);
		}
	}
	public function allorder(){
		$order=D('order');
		$where['user_Name']=session('user');
		$all=$order->where($where)->count();
		return $all;
	}
	public function allforcomment(){
		$order=D('order');
		$where['user_Name']=session('user');
		$where['orderment']='待评论';
		$all=$order->where($where)->count();
		return $all;
	}
	public function allforpay(){
		$order=D('order');
		$where['user_Name']=session('user');
		$where['orderment']='待付款';
		$all=$order->where($where)->count();
		return $all;
	}
	public function allforship(){
		$order=D('order');
		$where['user_Name']=session('user');
		$where['orderment']='待发货';
		$all=$order->where($where)->count();
		return $all;
	}
}