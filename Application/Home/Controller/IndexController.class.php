<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function index(){
		$hotproduct=R('product/hotproduct',array(8,0));
		$this->assign('hotproduct',$hotproduct);
		$tenproduct=R('product/hotproduct',array(8,10));
		$this->assign('tenproduct',$tenproduct);
		$nineproduct=R('product/hotproduct',array(8,9));
		$this->assign('nineproduct',$nineproduct);
		$eightproduct=R('product/hotproduct',array(8,8));
		$this->assign('eightproduct',$eightproduct);
		$sevenproduct=R('product/hotproduct',array(8,7));
		$this->assign('sevenproduct',$sevenproduct);
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$this->display('index/index');
    }
	public function aboutus(){
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$this->display('index/aboutus');
	}
	public function contactus(){
		$allshopcar=R('login/allofshopcar');
		$this->assign('allshopcar',$allshopcar);
		$minishopcar=R('login/minishopcar');
		$this->assign('minishopcar',$minishopcar);
		$this->display('index/contactus');
	}
	public function map(){
		$this->display('index/map');
	}
	/*public function checkLogin(){
		if(IS_POST){
			$user=D('user');
			if($user->create()){
				$where['name']=$user->name;
				$tmp_password=$user->where($where)->getField('pwd');
				if($pwd==$tmp_password){//密码检测
					echo '密码正确，欢迎登陆！';
				}else{
					echo '密码错误，请重新登陆！';
				}
			}else{
				die($user->getError());
			}
		}else{
			$this->display('login');
		}
	}*/
	/*public function captcha(){//生成验证码方法
		//下面开始配置生成验证码参数
		$config=array(
			'fontSize'=>24,//设置字体大小，默认为30
			'length'=>4,//验证码位数，默认为5
			//'fonttf'=>'微软雅黑',//指定验证码字体，默认为自动抓取
			'imageH'=>0,//验证码高度，设置为0自动计算，默认为0
			'imageW'=>0,//验证码宽度，设置为0自动计算，默认为0
			'useCurve'=>true,//是否开启混淆曲线，默认为true
			'userNoise'=>true//是否开启验证码杂点，默认为true
		);
		$verify=new \Think\Verify($config);
		$verify->entry();
		//验证码生成后，会在session里面保存生成的验证信息，如：array('verify_code'=>'当前验证码的值'，verify_time'=>'验证码生成的时间戳')
	}*/
	/*public function checkLogin(){//此方法为测试输出数据方法
		if(IS_POST){
			$userObj=D('user');
			$data=$userObj->create();
			$this->assign('data',$data);
			//$this->redirect('ddie/ddie',array(),5, '页面跳转中...');
			//$this->display('ddie/ddie');array('id'=>1),
			$this->display('ddie/ddie');
			die;
		}
		$this->display('login');
	}*/
	/*public function checkregister(){
		if(IS_POST){
			$user=D('user');
			if($user->create()){
				$user->pwd = I('post.pwd','','md5');//给密码加密
				//I方法：获取post传值pwd，默认值，过滤方法
				$user->add();
			}else{
				die($user->getError());
			}
		}else{
			$this->display('register');
		}
	}*/
	/*public function dis_other(){//测试跨模块跳转
		$this->display('Admin@test/uploads');
	}*/
	/*public function dis(){//测试跨模块调用控制器及其方法
		//R方法
		R("Admin/index/index");
		//A方法
		//$test=A("Admin/index");
		//$test->index();
	}*/
}