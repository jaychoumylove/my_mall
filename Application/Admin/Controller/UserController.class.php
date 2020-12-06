<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:(</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function userlist(){
		$user=D('user');
		$username=I('param.name');
		if($username!=''){
			$where['username|realname'] = array('like','%'.$username.'%');
			$where_n['name']=$username;
		}
		$sex=I('param.sex');
		if($sex!=''){
			$where['sex'] = array('EQ',$sex);
			$where_n['sex']=$sex;
		}
		$all=$user->where($where)->count();
		$page=new \Think\Page($all,6);
		if($sex!='' || $username!=''){
			foreach($where_n as $key=>$v){
				$page->parameter[$key]=$v;
			}
		}
		$show=$page->show();
		if($sex!='' || $username!=''){
			$list=$user->where($where)->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}else{
			$list=$user->order('Id desc')->limit($page->firstRow.','.$page->listRows)->select();
		}	
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		//$this->assign('parameter',print_r($page->parameter));
		$this->assign('username',$username);
		$this->assign('sex',$sex);
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('user/userlist');
	}
	public function add(){
		$user=D('user');
		$rules=array(
			array('username','','账户名已经存在！',0,'unique',1),
			array('email','email','邮箱格式不正确！'),
			array('username','checkname','用户名格式不正确！',0,'function'),
			array('phone','checkphone','手机号码不正确！',0,'function'),
			array('userpwd','checkpwd','密码格式不正确！',0,'function'),
			array('ruserpwd','userpwd','确认密码不正确！',0,'confirm')
		);
		if($user->validate($rules)->create()){
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
				$this->error($upload->getError(),U('user/userlist'),5);
				die;
			}else{
				$user->userphoto=$info['userphoto']['savepath'].$info['userphoto']['savename'];
			}
			$user->userpwd=md5($user->userpwd);
			$user->addtime=gettime();
			if($user->add()){
				$this->success('操作成功',U('user/userlist'),5);
 			}else{
				$Error=$user->getError();
				$this->error($Error,U('user/userlist'),5);
			}
		}else{
			$Error=$user->getError();
			echo "<script>alert('".$Error."');</script>";
			$this->display('user/userlist');
		}
	}
	public function update(){
		$user=D('user');
		$Id=I('get.Id');
		$where['Id']=$Id;
		if(IS_POST){
			$rules=array(
				array('email','email','邮箱格式不正确！'),
				array('phone','checkphone','手机号码不正确！',0,'function'),
				array('userpwd','checkpwds','密码格式不正确！',0,'function')
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
					$this->success('操作成功！',U('user/userlist'),5);
				}else{
					$Error=$user->getError();
					$this->error("操作失败了！".$Error,U('user/userlist'),5);
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
	public function del(){
		$user=D('user');
		$Id=I('get.Id');
		$where['Id']=$Id;
		if($user->where($where)->delete()){
			$this->success('操作成功',U('user/userlist'),5);
		}else{
			$this->error('操作失败',U('user/userlist'),5);
		}
	}
	public function delAll(){
		$user=D('user');
		$Id=I('post.checkbox_Id');
		$del_Id=implode(',',$Id);
		//$where['Id']=$Id;
		if($user->delete($del_Id)){
			$this->success('操作成功',U('user/userlist'),5);
		}else{
			$this->error('操作失败',U('user/userlist'),5);
		}
	}
}