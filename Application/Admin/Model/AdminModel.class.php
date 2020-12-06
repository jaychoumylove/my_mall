<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
	/*protected $_validate = array(//数据自动验证
		//格式：array('name名','调用的函数、匹配的值(规则)','提示信息',['验证条件','验证规则','验证时机'])
		array('captcha','require','验证码不能为空！'),
		//array('adminname','','账户名已经存在！',0,'unique',1),
		array('email','email','邮箱格式不正确！'),
		array('adminname','checkname','用户名格式不正确！',0,'function'),
		array('phone','checkphone','手机号码不正确！',0,'function'),
		array('adminpwd','checkpwd','密码格式不正确！',0,'function',1),
		array('adminpwd','checkpwd','密码格式不正02确！',2,'function',2),
		array('radminpwd','adminpwd','确认密码不正确！',0,'confirm',1),
		array('captcha','checkcode','验证码不正确！',0,'function')
	);
	protected $_auto = array(//数据自动完成
		//格式：array('name名','调用的函数、匹配的值(规则)',['完成时机'，'完成规则'])
		//array('adminname','checkname',3,'function'),
		array('adminpwd','',2,'ignore'),
		//array('phone','checkphone',3,'function'),
		//array('addtime','gettime',1,'function'),
		//array('email','email',3,'function'),
		array('adminpwd','md5',3,'function')
	);*/
	protected $insertFields = array('adminname','adminpwd','email','phone','addtime','sex','realname');//新增时允许操作的字段
    protected $updateFields = array('adminpwd','email','phone','sex','realname');//更新时允许操作的字段
}