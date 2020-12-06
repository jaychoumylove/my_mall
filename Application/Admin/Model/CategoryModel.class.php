<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
	protected $_validate = array(//数据自动验证
		//格式：array('name名','调用的函数、匹配的值(规则)','提示信息',['验证条件','验证规则','验证时机'])
		//array('name','','该分类已经存在！',0,'unique',1)
	);
	protected $_auto = array(//数据自动完成
		//格式：array('name名','调用的函数、匹配的值(规则)',['完成时机'，'完成规则'])
	);
	protected $insertFields = array('name','parentId','description','addtime');//新增时允许操作的字段
    protected $updateFields = array('name','parentId','description');//更新时允许操作的字段
}