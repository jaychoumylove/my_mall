<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function admin(){
		$admin=D('admin');
		$adminname=I('param.name');
		if($adminname!=''){
			$where['adminname|realname'] = array('like','%'.$adminname.'%');
			$where_n['name']=$adminname;
		}
		$sex=I('param.sex');
		if($sex!=''){
			$where['sex'] = array('EQ',$sex);
			$where_n['sex']=$sex;
		}
		$all=$admin->where($where)->count();
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
		if($sex!='' || $adminname!=''){
			$list=$admin->where($where)->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}else{
			$list=$admin->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}
		//$list=$model->where($where)->page($_GET['p'].',5')->select();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('admin/admin');
	}
	public function add(){
		$admin=D('admin');
		$rules=array(
			array('adminname','','账户名已经存在！',0,'unique',1),
			array('email','email','邮箱格式不正确！'),
		 	array('phone','checkphone','手机号码不正确！',0,'function'),
			array('adminname','checkname','用户名格式不正确！',0,'function'),
		 	array('adminpwd','checkpwd','密码格式不正确！',0,'function',1),
			array('radminpwd','adminpwd','确认密码不正确！',0,'confirm',1)
		);
		$rule=array(
			//array('adminpwd','md5',1,'function'),
			//array('addtime','gettime',1,'callback')
			//上述自动完成失效
		);
		if($admin->validate($rules)->auto($rule)->create()){
			$admin->addtime=gettime();
			$admin->addAdminname=$_SESSION['admin'];
			$admin->adminpwd=md5($admin->adminpwd);
			if($admin->add()){
				$this->success('操作成功！',U('admin/admin'),5);
 			}else{
				$Error=$admin->getError();
				$this->error($Error,U('admin/admin'),5);
			}
		}else{
			$Error=$admin->getError();
			$this->error($Error,U('admin/admin'),5);
		}
	}
	public function update(){
		$admin=D('admin');
		$Id=I('get.Id');
		$where['Id']=$Id;
		$tmp_name=$admin->where($where)->getField('adminname');
		if($tmp_name=='admin' && session('admin')!='admin'){
			$Error='你不可以修改admin信息';
			$this->error($Error,U('admin/admin'),5);
		}else{
			if(IS_POST){
				$rules=array(
					array('email','email','邮箱格式不正确！'),
					array('phone','checkphone','手机号码不正确！',0,'function'),
					array('adminpwd','checkpwds','密码格式不正确！',0,'function')
				);
				$rule=array(
					//array('adminpwd','',2,'ignore'),
					//array('adminpwd','getpwd',0,'callback'),
					//array('adminpwd','md5',2,'function')
					//为什么不用上面的自动完成？原因：单子段无法实现的多次完成
				);
				if($admin->validate($rules)->auto($rule)->create()){
					//$admin->adminpwd=md5($admin->adminpwd);
					if($admin->adminpwd==''){
						$admin->adminpwd=I('post.adminpwdh');
					}else{
						$admin->adminpwd=md5($admin->adminpwd);
					}
					if($admin->where($where)->save()){
						$this->success('操作成功',U('admin/admin'),5);
					}else{
						$Error=$admin->getError();
						$this->error($Error,U('admin/admin'),5);
					}
				}else{
					$data=$admin->where($where)->find();
					$this->assign('data',$data);
					$Error=$admin->getError();
					echo "<script>alert('".$Error."');</script>";
					$this->display('admin/update');
				}
			}else{
				$data=$admin->where($where)->find();
				$this->assign('data',$data);
				$this->display('admin/update');
			}
		}
	}
	public function del(){
		$admin=D('admin');
		$Id=I('get.Id');
		$where['Id']=$Id;
		$tmp_name=$admin->where($where)->getField('adminname');
		if($tmp_name=='admin' || $tmp_name==session('admin')){
			$Error='不可以删除admin和你自己！';
			$this->error($Error,U('admin/admin'),5);
		}else{
			if($admin->where($where)->delete()){
				$this->success('操作成功',U('admin/admin'),5);
			}else{
				$Error=$admin->getError();
				$this->error($Error,U('admin/admin'),5);
			}
		}
	}
	public function delAll(){
		$admin=D('admin');
		$Id=I('post.checkbox_Id');
		$del_Id=implode(',',$Id);
		//$where['Id']=$Id;
		$m=0;
		for($i=0;$i<count($Id);$i++){
			$where['Id']=$Id[$i];
			$tmp_name=$admin->where($where)->getField('adminname');
			if($tmp_name=='admin' || $tmp_name==session('admin')){
				$Error='不可以删除admin和你自己！';
				$this->error($Error,U('admin/admin'),5);
				break;
			}else{
				$m++;
				continue;
			}
		}
		if($m==count($Id)){
			if($admin->delete($del_Id)){
				$this->success('操作成功',U('admin/admin'),5);
			}else{
				$Error=$admin->getError();
				$this->error($Error,U('admin/admin'),5);
			}	
		}else{
			$Error='不可以删除admin和你自己！';
			$this->error($Error,U('admin/admin'),5);
		}
	}
}