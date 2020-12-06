<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function product(){
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$product=D('product');
		$name=I('param.name');
		if($name!=''){
			$where['fw_product.name'] = array('like','%'.$name.'%');
			$where_n['name']=$name;
		}
		$classId=I('param.classId');
		if($classId!=''){
			$where['fw_product.classId'] = array('EQ',$classId);
			$where_n['classId']=$classId;
		}
		$where['fw_product.isput_on'] = array('EQ','是');
		$orderby=I('param.orderby');
		if($orderby!=''){
			$where_n['order']=$orderby;
		}
		$all=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->count();
		$pages=new \Think\Pages($all,9);
		if($classId!='' || $name!=''){
			foreach($where_n as $key=>$v){
				$pages->parameter[$key]=$v;
			}
		}
		$show=$pages->show();
		if($orderby!=''){
			$orderby=$orderby;
		}else{
			$orderby='aId desc';
		}
		$list=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->order($orderby)->limit($pages->firstRow.','.$pages->listRows)->select();
		$page_now=($pages->firstRow/$pages->listRows)+1;//当前页
		$page_all=ceil($all/$pageS->listRows);//所有页
		$category=D('category');
		$hotproduct=self::hotproduct(4,0);
		$this->assign('hotproduct',$hotproduct);
		$procl=self::ProductClass();
		$this->assign('classId',$classId);
		$this->assign('pname',$name);
		$this->assign('procl',$procl);
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('pages',$show);
		$this->display('product/product');
	}
	public function productinfo(){
		$product=D('product');
		$Id=I('get.Id');
		//$comment=I('get.comment');
		/*if($comment==''){
			$comment='1';
		}*/
		$where['fw_product.Id']=$Id;
		$data=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->find();
		if($data){
			$show_img=explode(',',$data['show_img']);
			$comment=D('comment');
			$map['fw_comment.pro_Id']=$Id;
			$list=$comment->join('fw_user ON fw_user.username = fw_comment.user_Name')->where($map)->field("fw_comment.*,fw_user.userphoto as Uuserphoto,fw_comment.addtime as Caddtime")->order('Caddtime desc')->select();
			$procl=self::ProductClass();
			$allshopcar=R('login/allofshopcar');
			$this->assign('allshopcar',$allshopcar);
			$minishopcar=R('login/minishopcar');
			$this->assign('minishopcar',$minishopcar);
			$coment=self::checkcomment($Id);
			$this->assign('comment',$coment);
			$allcomment=self::allcomment($Id);
			$this->assign('allcomment',$allcomment);
			$hotproduct=self::hotproduct(4,0);
			$this->assign('hotproduct',$hotproduct);
			$this->assign('procl',$procl);
			$this->assign('show_img',$show_img);
			$this->assign('data',$data);
			$this->assign('list',$list);
			$this->display('product/productinfo');
		}else{
			$this->error('没有该商品，去购物中心逛逛吧',U('product/product'),3);
		}
	}
	public function hotproduct($listrows=5,$classId){
		$product=D('product');
		if($classId!='0'){
			$where['fw_product.classId']=array("EQ",$classId);
		}
		$where['fw_product.stock']=array("NEQ",0);
		$where['fw_product.isput_on']=array("NEQ","否");
		//$where['fw_product.ishot']=array("NEQ","否");
		$data=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field('fw_category.name as Cname,fw_product.name as Pname,fw_product.Id as PId,fw_product.here_price as PHprice,fw_product.machete_price as PMprice,fw_product.ishot as Pishot,fw_product.product_img as Pproduct_img,fw_product.classId as PCId')->order('fw_product.addtime desc')->limit('0,'.$listrows)->select();
		return $data;
	}
	public function ProductClass(){
		$product=D('product');
		$category=D('category');
		$map['parentId']=array('EQ',0);
		$procl=$category->where($map)->order('Id desc')->select();
		for($m=0;$m<count($procl);$m++){
			$pwhere['fw_product.classId']=$procl[$m]['Id'];
			$pwhere['fw_product.isput_on']='是';
			$procl[$m]['pnums']=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($pwhere)->count();
		}
		return $procl;
	}
	public function checkcomment($PId){
		$order=D('order');
		$where['fw_orderlist.pro_Id']=array('EQ',$PId);
		$where['fw_orderlist.user_Name']=array('EQ',session('user'));
		$where['fw_order.orderment']=array('EQ','完成');
		$allorder=$order->join('fw_orderlist ON fw_order.order_Num=fw_orderlist.order_Num')->join('fw_product ON fw_product.Id=fw_orderlist.pro_Id')->join('fw_category ON fw_category.Id=fw_product.classId')->where($where)->count();
		$comment=D('comment');
		$map['pro_Id']=array('EQ',$PId);
		$map['user_Name']=array('EQ',session('user'));
		$allcomment=$comment->where($map)->count();
		$coment=$allorder-$allcomment;
		if($coment>0){
			$coment='yes';
		}else{
			$coment='no';
		}
		return $coment;
	}
	public function allcomment($PId){
		$comment=D('comment');
		$map['pro_Id']=array('EQ',$PId);
		$map['user_Name']=array('EQ',session('user'));
		$allcomment=$comment->where($map)->count();
		return $allcomment;
	}
}