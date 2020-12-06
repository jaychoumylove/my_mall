<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	/*protected $_validate = array(//数据自动验证
		//格式：array('name名','调用的函数、匹配的值(规则)','提示信息',['验证条件','验证规则','验证时机'])
		//array('captcha','require','验证码不能为空！'),
		array('username','','账户名已经存在！',0,'unique',1),
		array('email','email','邮箱格式不正确！'),
		array('username','checkname','用户名格式不正确！',0,'function'),
		array('phone','checkphone','手机号码不正确！',0,'function'),
		array('userpwd','checkpwd','密码格式不正确！',0,'function'),
		array('ruserpwd','userpwd','确认密码不正确！',0,'confirm'),
		//array('captcha','checkcode','验证码不正确！',0,'function')
	);
	protected $_auto = array(//数据自动完成
		//格式：array('name名','调用的函数、匹配的值(规则)',['完成时机'，'完成规则'])
		//array('username','checkname',3,'function'),
		array('userpwd','md5',3,'function'),
		//array('phone','checkphone',3,'function'),
		//array('addtime','gettime',1,'function'),
		//array('email','email',3,'function'),
		array('userpwd','',2,'ignore')
	);*/
	protected $insertFields = array('username','userpwd','userphoto','email','phone','addtime','sex','realname','addAdminname');//新增时允许操作的字段
    protected $updateFields = array('userpwd','email','userphoto','phone','sex','realname');//更新时允许操作的字段
}