<?php
namespace Home\Controller;
use Think\Controller;
class ShopcarController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checkslogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function shopcar(){//个人购物车
		$shopcar=D('shopcar');
		$where['fw_shopcar.user_Name']=session('user');
		$all=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->count();
		$page=new \Think\Pages($all,5);
		$data=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.name as pname,fw_product.here_price as phere_price,fw_product.machete_price as pmachete_price,fw_product.product_img as pimg,fw_product.sales_vol as psales_vol,fw_category.name as pcName")->order('fw_shopcar.addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
		$allpay='0.00';
		for($m=0;$m<count($data);$m++){
			$data[$m]['xiaoji']=$data[$m]['phere_price']*$data[$m]['pro_num'];
			$allpay=$allpay+$data[$m]['xiaoji'];
		}
		$show=$page->show();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('page',$show);
		$this->assign('allpay',$allpay);
		$this->assign('data',$data);
		$this->display('shopcar/shopcar');
	}
	public function add(){
		/*if(IS_AJAX){
			$shopcar=D('shopcar');
			$where['pro_Id']=I('param.pro_Id');
			$where['user_Name']=session('user');
			$where['_logic']='and';
			if($shopcar->where($where)->find()){
				$shopcarsing[0]['info']='该商品已经在你的购物车里面了！';
				$this->ajaxReturn($shopcarsing);
			}else{
				$shopcar->user_Name=session('user');
				$shopcar->pro_Id=I('param.pro_Id');
				$shopcar->pro_num=I('param.pro_num');
				$shopcar->addtime=gettime();
				if($shopcar->add()){
					$where_sp['user_Name']=session('user');
					$sp_count=$shopcar->where($where_sp)->count();
					$shopcarsing=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.name as Pname,fw_product.product_img as product_img,fw_product.here_price as Phere_price,fw_product.machete_price as Pmachete_price,fw_product.sales_vol as Psales_vol,fw_category.name as PCName")->order('fw_shopcar.addtime desc')->limit('0,3')->select();
					$allprice='0.00';
					for($s=0;$s<count($shopcarsing);$s++){
						$price=$shopcarsing[$s]['Phere_price']*$shopcarsing[$s]['pro_num'];
						$allprice=$allprice+$price;
					}
					$this->assign('allproduct',$sp_count);
					$this->assign('shopcarsing',$shopcarsing);
					$this->assign('allprice',$allprice);
					$shopcarsing[0]['info']='添加购物车成功！';
					$this->ajaxReturn($shopcarsing);
				}else{
					$Error=$shopcar->getError();
					$shopcarsing[0]['info']='添加购物车失败:'.$Error;
					$this->ajaxReturn($shopcarsing);
				}
			}
		}else{*/
			$shopcar=D('shopcar');
			$where['pro_Id']=I('param.pro_Id');
			$where['user_Name']=session('user');
			$where['_logic']='and';
			if($shopcar->where($where)->find()){
				$shopcarsing[0]['info']='该商品已经在你的购物车里面了！';
				$this->error($shopcarsing[0]['info']);
			}else{
				$shopcar->user_Name=session('user');
				$shopcar->pro_Id=I('param.pro_Id');
				$shopcar->pro_num=I('param.pro_num');
				$shopcar->addtime=gettime();
				if($shopcar->add()){
					$shopcarsing[0]['info']='添加购物车成功！';
					$this->error($shopcarsing[0]['info']);
				}else{
					$Error=$shopcar->getError();
					$shopcarsing[0]['info']='添加购物车失败:'.$Error;
					$this->error($shopcarsing[0]['info']);
				}
			}
		/*}*/
	}
	public function update(){
		if(IS_AJAX){
			$shopcar=D('shopcar');
			$where['user_Name']=session('user');
			$where['Id']=I('param.Id');
			$shopcar->pro_num=I('param.pro_num');
			/*$shopcar->addtime=gettime();*/
			$data=I('post.');
			if($shopcar->where($where)->save()){
				$where_sp['user_Name']=session('user');
				$sp_count=$shopcar->where($where_sp)->count();
				$shopcarsing=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.name as Pname,fw_product.product_img as product_img,fw_product.here_price as Phere_price,fw_product.machete_price as Pmachete_price,fw_product.sales_vol as Psales_vol,fw_category.name as PCName")->order('fw_shopcar.addtime desc')->limit('0,2')->select();
				$allprice='0.00';
				for($s=0;$s<count($shopcarsing);$s++){
					$price=$shopcarsing[$s]['Phere_price']*$shopcarsing[$s]['pro_num'];
					$allprice=$allprice+$price;
				}
				$this->assign('allproduct',$sp_count);
				$this->assign('shopcarsing',$shopcarsing);
				$this->assign('allprice',$allprice);
				$shopcarsing[0]['info']='修改购物车成功！';
				$this->ajaxReturn($shopcarsing);
			}else{
				$shopcarsing[0]['info']='修改购物车失败！'.$Error;
				$this->ajaxReturn($shopcarsing);
			}
		}
	}
	public function del(){
		if(IS_AJAX){
			$shopcar=D('shopcar');
			$where['Id']=I('get.Id');
			if($shopcar->where($where)->delete()){
				$where_sp['user_Name']=session('user');
				$sp_count=$shopcar->where($where_sp)->count();
				$shopcarsing=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.name as Pname,fw_product.product_img as product_img,fw_product.here_price as Phere_price,fw_product.machete_price as Pmachete_price,fw_product.sales_vol as Psales_vol,fw_category.name as PCName")->order('fw_shopcar.addtime desc')->limit('0,2')->select();
				$allprice='0.00';
				for($s=0;$s<count($shopcarsing);$s++){
					$price=$shopcarsing[$s]['Phere_price']*$shopcarsing[$s]['pro_num'];
					$allprice=$allprice+$price;
				}
				$shopcarsing[0]['info']='删除购物车成功！';
				$shopcarsing[0]['allprice']=$allprice;
				$shopcarsing[0]['sp_count']=$sp_count;
				$this->ajaxReturn($shopcarsing);
				//$this->success('删除购物车成功！',U('shopcar/shopcar'),5);
				echo $this->ajaxReturn($shopcarsing);
			}else{
				$Error=$shopcar->getError();
				$shopcarsing[0]['info']='删除购物车失败！'.$Error;
				$this->ajaxReturn($shopcarsing);
				echo $this->ajaxReturn($shopcarsing);
			}
		}else{
			$shopcar=D('shopcar');
			$where['Id']=I('get.Id');
			if($shopcar->where($where)->delete()){
				$this->success('删除购物车成功！',U('shopcar/shopcar'),5);
			}else{
				$Error=$shopcar->getError();
				$this->error('删除购物车失败了:'.$Error);
			}
		}
	}
	public function delAll(){
		$shopcar=D('shopcar');
		$Id=I('post.Id');
		$del_Id=implode(',',$Id);
		if($shopcar->delete($del_Id)){
			$this->success('删除购物车成功！',U('shopcar/shopcar'),5);
		}else{
			$Error=$shopcar->getError();
			$this->error('删除购物车失败了:'.$Error);
		}
	}
	public function clear(){
		$shopcar=D('shopcar');
		$where['user_Name']=session('user');
		if($shopcar->where($where)->delete()){
			$this->success('清空购物车成功！',U('shopcar/shopcar'),5);
		}else{
			$Error=$shopcar->getError();
			$this->error('清空购物车失败了:'.$Error);
		}
	}
	public function checkout(){
		$shopcar=D('shopcar');
		$Id=I('post.Id');
		if($Id!=''){
			session(session('user'),$Id);
		}else{
			$Id=session(session('user'));
		}
		for($i=0;$i<count($Id);$i++){
			if($Id[$i]=='null'){
				continue;
			}else{
				$where['fw_shopcar.Id']=$Id[$i];
				$data[]=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.product_img as product_img,fw_product.name as pname,fw_product.here_price as phere_price,fw_product.machete_price as pmachete_price,fw_product.sales_vol as psales_vol,fw_category.name as pcName")->order('fw_shopcar.addtime desc')->find();
			}
		}
		$allprice=0.00;
		for($s=0;$s<count($data);$s++){
			$data[$s]['xiaoji']=$data[$s]['phere_price']*$data[$s]['pro_num'];
			$allprice=$allprice+$data[$s]['xiaoji'];
		}
		$address=D('address');
		$map['user_Name']=session('user');
		$ads_list=$address->where($map)->order('addtime desc')->select();
		$hotproduct=R('product/hotproduct',array(8,0));
		$this->assign('hotproduct',$hotproduct);
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$this->assign('address',$ads_list);
		$this->assign('allprice',$allprice);
		$this->assign('data',$data);
		$this->display('shopcar/checkout');
	}
	/*public function singgerlist(){//购物车小窗口
		$shopcar=D('shopcar');
		$where['user_Name']=session('user');
		$data=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_product.name as Pname,fw_product.here_price as Phere_price,fw_product.machete_price as Pmachete_price,fw_product.sales_vol as Psales_vol,fw_category.name as PCName")->order('fw_shopcar.addtime desc')->limit('0,2')->select();
		return $data;
	}*/
}