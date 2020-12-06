<?php
namespace Home\Controller;
use Think\Controller;
class FariteController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checkslogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function farite(){//个人收藏
		$farite=D('farite');
		$where['fw_farite.user_Name']=session('user');
		$all=$farite->join('fw_product ON fw_farite.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->count();
		$page=new \Think\Pages($all,6);
		$data=$farite->join('fw_product ON fw_farite.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_farite.*,fw_product.name as Pname,fw_product.Id as PId,fw_product.here_price as Phere_price,fw_product.machete_price as Pmachete_price,fw_product.product_img as Pproduct_imgl,fw_category.name as PCName")->order('fw_farite.addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
		$show=$page->show();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$data);
		$this->assign('page',$show);
		$this->display('farite/farite');
	}
	public function add(){
		$farite=D('farite');
		$farite->user_Name=session('user');
		$map['user_Name']=session('user');
		$map['pro_Id']=I('get.pro_Id');
		$farite->pro_Id=I('get.pro_Id');
		$farite->addtime=gettime();
		$yon=$farite->where($map)->count();
		if($yon==1){
			$this->error('它已经在你的收藏里面了！');
		}else{
			if($farite->add()){
				$this->error('收藏成功！');
			}else{
				$Error=$farite->getError();
				$this->error('收藏失败了:'.$Error);
			}
		}
	}
	public function del(){
		$farite=D('farite');
		$where['Id']=I('post.Id');
		if($farite->where($where)->delete()){
			$this->error('取消收藏成功！');
		}else{
			$Error=$farite->getError();
			$this->error('取消收藏失败了:'.$Error);
		}
	}
	public function addAll(){
		$farite=D('farite');
		$farite->user_Name=session('user');
		$pro_Id=I('post.pro_Id');
		$farite->addtime=gettime();
		$Error='';
		$n=0;
		for($m=0;$m<count($pro_Id);$m++){
			$farite->pro_Id=$pro_Id[$m];
			if(!$farite->add()){
				$Error.=$farite->getError();
			}else{
				$n++;
			}
		}
		if($n==count($pro_Id)){
			$this->error('收藏成功！');
		}else{
			$this->error('收藏失败了:'.$Error);
		}
		//3.2版本addAll方法
		/*$farite=D('farite');
		$pro_Id=I('post.pro_Id');
		for($m=0;$m<count($pro_Id);$m++){
			$data[]=array('user_Name'=>session('user'),'addtime'=>gettime(),'pro_Id'=>$pro_Id[$i]);
		}
		if($farite->addAll($data)){
			$this->success('取消收藏成功！',U('farite/farite'),3);
		}else{
			$Error.=$farite->getError();
			$this->error('收藏失败了:'.$Error);
		}*/
	}
	public function delAll(){
		$farite=D('farite');
		$Id=I('post.Id');
		$del_Id=implode(',',$Id);
		if($farite->delete($del_Id)){
			$this->error('取消收藏成功！');
		}else{
			$Error=$farite->getError();
			$this->error('取消收藏失败了:'.$Error);
		}
	}
}