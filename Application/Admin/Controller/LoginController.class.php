<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function login(){
		if(IS_POST){
			$admin=D('admin');
			$rules=array(
				array('captcha','require','验证码不能为空！'),
				array('captcha','checkcode','验证码不正确！',0,'function')
			);
			if($admin->validate($rules)->create()){
				//die(var_dump($admin));
				$where['adminname']=$admin->adminname;
				$tmp_password=$admin->where($where)->getField('adminpwd');
				if(md5($admin->adminpwd)==$tmp_password){//密码检测
					session('admin',$admin->adminname);
					$this->success('密码正确，欢迎登陆！',U('Index/main'),2);
					/*echo "<script>alert('密码正确，欢迎登陆！');</script>";
					$this->display('Index/main');*/
				}else{
					echo "<script>alert('密码错误，请重新登陆！');</script>";
					$this->display('login');
				}
			}else{
				$Error=$admin->getError();
				echo "<script>alert('".$Error."');</script>";
				$this->display('login');
			}
		}else{
			$this->display('login');
		}
	}
	public function captcha(){//生成验证码方法
		//下面开始配置生成验证码参数
		$config=array(
			'fontSize'=>18,//设置字体大小，默认为30
			'length'=>4,//验证码位数，默认为5
			/*'fonttf'=>'微软雅黑',//指定验证码字体，默认为自动抓取*/
			'imageH'=>46,//验证码高度，设置为0自动计算，默认为0
			'imageW'=>114,//验证码宽度，设置为0自动计算，默认为0
			'useCurve'=>true,//是否开启混淆曲线，默认为true
			'userNoise'=>true//是否开启验证码杂点，默认为true
		);
		$verify=new \Think\Verify($config);
		$verify->entry();
		//验证码生成后，会在session里面保存生成的验证信息，如：array('verify_code'=>'当前验证码的值'，verify_time'=>'验证码生成的时间戳')
	}
}