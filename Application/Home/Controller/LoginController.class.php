<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function captcha(){//生成验证码方法
		//下面开始配置生成验证码参数
		$config=array(
			'fontSize'=>15,//设置字体大小，默认为30
			'length'=>3,//验证码位数，默认为5
			/*'fonttf'=>'微软雅黑',//指定验证码字体，默认为自动抓取*/
			'imageH'=>40,//验证码高度，设置为0自动计算，默认为0
			'imageW'=>80,//验证码宽度，设置为0自动计算，默认为0
			'useCurve'=>false,//是否开启混淆曲线，默认为true
			'userNoise'=>false//是否开启验证码杂点，默认为true
		);
		$verify=new \Think\Verify($config);
		$verify->entry();
		//验证码生成后，会在session里面保存生成的验证信息，如：array('verify_code'=>'当前验证码的值'，verify_time'=>'验证码生成的时间戳')
	}
	public function login(){
		if(IS_POST){
			$user=D('user');
			$rules=array(
				array('captcha','require','验证码不能为空！'),
				array('captcha','checkcode','验证码不正确！',0,'function')
			);
			if($user->validate($rules)->create()){
				$where['username']=$user->username;
				$tmp_password=$user->where($where)->getField('userpwd');
				if(md5($user->userpwd)==$tmp_password){//密码检测
					session('user',$user->username);
					$this->success('密码正确，欢迎登陆！',U('Index/index'),3);
				}else{
					$this->error('密码错误，请重新登陆！',U('login/login'),1);
				}
			}else{
				$Error=$user->getError();
				$this->error('错误！'.$Error,U('login/login'),1);
			}
		}else{
			$allshopcar=self::allofshopcar();
			$this->assign('allshopcar',$allshopcar);
			$minishopcar=self::minishopcar();
			$this->assign('minishopcar',$minishopcar);
			$this->display('login/login');
		}
	}
	public function register(){
		if(IS_POST){
			$user=D('user');
			$rules=array(
				array('captcha','require','验证码不能为空！'),
				array('captcha','checkcode','验证码不正确！',0,'function'),
				array('username','','账户名已经存在！',0,'unique',1),
				//array('email','email','邮箱格式不正确！'),
				array('username','checkname','用户名格式不正确！',0,'function'),
				array('phone','checkphone','手机号码不正确！',0,'function'),
				array('userpwd','checkpwd','密码格式不正确！',0,'function'),
				array('ruserpwd','userpwd','确认密码不正确！',0,'confirm')
			);
			if($user->validate($rules)->create()){
				$user->userpwd = md5($user->userpwd);
				$user->userphoto = '';
				$user->addtime = gettime();
				//$user->userpwd = I('post.userpwd','','md5');
				//I方法：获取post传值pwd，默认值，过滤方法
				if($user->add()){
					session('user',$user->username);
					$this->success('注册成功！',U('index/index'),3);
				}else{
					$Error=$user->getError();
					$this->error('注册失败：'.$Error,U('login/register'),3);
				}
			}else{
				$Error=$user->getError();
				$this->error('注册失败：'.$Error,U('login/register'),3);
			}
		}else{
			$allshopcar=self::allofshopcar();
			$this->assign('allshopcar',$allshopcar);
			$minishopcar=self::minishopcar();
			$this->assign('minishopcar',$minishopcar);
			$this->display('login/register');
		}
	}
	public function quit(){
		session('user',null);
		$this->success('退出成功！',U('index/index'),3);
	}
	public function cancellation(){
		session('user',null);
		$this->success('退出成功！正在跳转...',U('login/login'),1);
	}
	public function minishopcar(){
		$shopcar=D('shopcar');
		$where['fw_shopcar.user_Name']=session('user');
		$list=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_shopcar.*,fw_shopcar.Id as sId,fw_product.name as Pname,fw_product.product_img as Pimg,fw_product.here_price as PHprice,fw_product.machete_price as PMprice,fw_product.sales_vol as Psales_vol,fw_category.name as PCName")->order('fw_shopcar.addtime desc')->limit('0,3')->select();
		return $list;
	}
	public function allofshopcar(){
		$shopcar=D('shopcar');
		$where['fw_shopcar.user_Name']=session('user');
		$all=$shopcar->join('fw_product ON fw_shopcar.pro_Id = fw_product.Id')->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->count();
		return $all;
	}
}