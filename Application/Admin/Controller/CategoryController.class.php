<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}/**/
	public function category(){
		$category=D('category');
		$name=I('param.name');
		if($name!=''){
			$where['name'] = array('like','%'.$name.'%');
			$where_n['name']=$name;
		}
		$all=$category->where($where)->count();
		$page=new \Think\Page($all,6);
		foreach($where_n as $key=>$v){
			$page->parameter[$key]=$v;
		}
		/*$page->lastSuffix=false;
		$page->setConfig('header','共%TOTAL_PAGE%页，当前是第%NOW_PAGE%页<br/>');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %DOWN_PAGE% %END%');*/
		$show=$page->show();
		if($name!=''){
			$list=$category->where($where)->order('Id desc,parentId desc')->limit($page->firstRow.','.$page->listRows)->select();
		}else{
			$list=$category->order('Id desc,parentId desc')->limit($page->firstRow.','.$page->listRows)->select();
		}
		//$list=$model->where($where)->page($_GET['p'].',5')->select();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$map['parentId']=0;
		$procl=$category->where($map['parentId'])->order('Id desc,parentId desc')->select();
		$this->assign('procl',$procl);
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('category/category');
	}
	public function add(){
		$category=D('category');
		$rules=array(
			array('name','','该分类已经存在！',0,'unique',1)
		);
		if($category->validate($rules)->create()){
			$upload_config=array(
				'maxSize' => 3145728,//文件上传最大字节
				'rootPath' => './Public/uploads/Pclass/',//文件上传根目录
				'savePath' => '',
				'saveName' => array('uniqid',''),//设置上传文件的保存规则
				'exts' => array('jpg','gif','png','jpeg'),//设置文件上传类型
				'autoSub' => true,//是否开启子目录自动保存文件
				'subName' => array('date','Ymd')//子目录创建方式
			);
			$upload = new \Think\Upload($upload_config);
			$info = $upload->upload();
			if(!$info){
				$this->error($upload->getError(),U('category/category'),5);
				die;
			}else{
				/*dump($info);
				die;*/
				$category->CG_img=$info['CG_img']['savepath'].$info['CG_img']['savename'];
				$category->description=I('post.description','',false);
				$category->addtime=gettime();
				if($category->add()){
					$this->success('操作成功',U('category/category'),5);
				}else{
					$this->error('操作失败',U('category/category'),5);
				}
			}
		}else{
			$Error=$category->getError();
			echo "<script>alert('".$Error."');</script>";
			$this->display('category/category');
		}
	}
	public function update(){
		$category=D('category');
		$Id=I('get.Id');
		$where['Id']=$Id;
		$map['parentId']=0;
		$procl=$category->where($map['parentId'])->order('Id desc,parentId desc')->select();
		$this->assign('procl',$procl);
		if(IS_POST){
			if($category->create()){
				$upload_config=array(
					'maxSize' => 3145728,//文件上传最大字节
					'rootPath' => './Public/uploads/Pclass/',//文件上传根目录
					'savePath' => '',
					'saveName' => array('uniqid',''),//设置上传文件的保存规则
					'exts' => array('jpg','gif','png','jpeg'),//设置文件上传类型
					'autoSub' => true,//是否开启子目录自动保存文件
					'subName' => array('date','Ymd')//子目录创建方式
				);
				$upload = new \Think\Upload($upload_config);
				$info = $upload->upload();
				if(!$info){
					$category->CG_img=I('post.CG_imgh');
				}else{
					$del='./Public/uploads/product_img/'.I('post.CG_imgh');
					unlink($del);
					$category->CG_img=$info['CG_img']['savepath'].$info['CG_img']['savename'];
				}
				$category->description=I('post.description','',false);
				if($category->where($where)->save()){
					$this->success('操作成功',U('category/category'),5);
				}else{
					$Error=$category->getError();
					$this->error($Error,U('category/category'),5);
				}
			}else{
				$data=$category->where($where)->find();
				$this->assign('data',$data);
				$Error=$category->getError();
				echo "<script>alert('".$Error."');</script>";
				$this->display('category/update');
			}
		}else{
			$data=$category->where($where)->find();
			$this->assign('data',$data);
			$this->display('category/update');
		}
	}
	public function del(){
		$category=D('category');
		$Id=I('get.Id');
		$where['Id']=$Id;
		if($category->where($where)->delete()){
			$this->success('操作成功',U('category/category'),5);
		}else{
			$Error=$category->getError();
			$this->error($Error,U('category/category'),5);
		}
	}
	public function delAll(){
		$category=D('category');
		$Id=I('post.checkbox_Id');
		$del_Id=implode(',',$Id);
		//$where['Id']=$Id;
		if($category->delete($del_Id)){
			$this->success('操作成功',U('category/category'),5);
		}else{
			$$Error=$category->getError();
			$this->error($Error,U('category/category'),5);
		}
	}
}