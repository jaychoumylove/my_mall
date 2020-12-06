<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}/**/
	public function product(){
		$product=D('product');
		$name=I('param.name');
		if($name!=''){
			$where['fw_product.name'] = array('like','%'.$name.'%');
			$where_n['name']=$name;
		}
		$classId=I('param.classId');
		if($classId!=''){
			$where['fw_product.classId'] = array('EQ',$classId);
			$where_n['classId']=$classId;
		}
		if($classId!='' || $name!=''){
			$all=$product->join('fw_category ON fw_category.id = fw_product.classId')->where($where)->count();
		}else{
			$all=$product->join('fw_category ON fw_category.id = fw_product.classId')->count();
		}
		$page=new \Think\Page($all,5);
		if($classId!='' || $name!=''){
			foreach($where_n as $key=>$v){
				$page->parameter[$key]=$v;
			}
		}
		/*$page->lastSuffix=false;
		$page->setConfig('header','共%TOTAL_PAGE%页，当前是第%NOW_PAGE%页<br/>');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %DOWN_PAGE% %END%');*/
		$show=$page->show();
		if($classId!='' || $name!=''){
			$list=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->order('aId desc')->limit($page->firstRow.','.$page->listRows)->select();
		}else{
			$list=$product->join('fw_category ON fw_category.Id = fw_product.classId')->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->order('aId desc')->limit($page->firstRow.','.$page->listRows)->select();
		}
		//$list=$model->where($where)->page($_GET['p'].',5')->select();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$category=D('category');
		$map['parentId']=array('EQ',0);
		$procl=$category->where($map)->order('Id desc,parentId desc')->select();
		$this->assign('procl',$procl);
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('product/product');
	}
	public function add(){
		$product=D('product');
		$rules=array(
			//array('stock','checkstock','库存必须是数字！','function'),
			//array('machete_price','checkprice','市场价允许小数点后两位！','function'),
			//array('here_price','checkprice','本店价允许小数点后两位！','function')
		);
		$rule=array(
			//array('addtime','gettime',3,'function')
		);
		//$data=$product->create();
		if($product->validate($rules)->auto($rule)->create()){
			$product->description=I('post.description','',false);
			$upload_config=array(
				'maxSize' => 3145728,//文件上传最大字节
				'rootPath' => './Public/uploads/product_img/',//文件上传根目录
				'savePath' => '',
				'saveName' => array('uniqid',''),//设置上传文件的保存规则
				'exts' => array('jpg','gif','png','jpeg'),//设置文件上传类型
				'autoSub' => true,//是否开启子目录自动保存文件
				'subName' => array('date','Ymd')//子目录创建方式
			);
			$upload = new \Think\Upload($upload_config);
			$info = $upload->upload();
			if(!$info){
				$this->error($upload->getError(),U('product/product'),5);
				die;
			}else{
				$product->show_img='';
				/*
				*	IMAGE_WATER_NORTHWEST =   1 ; //左上角水印
				*	IMAGE_WATER_NORTH     =   2 ; //上居中水印
				*	IMAGE_WATER_NORTHEAST =   3 ; //右上角水印
				*	IMAGE_WATER_WEST      =   4 ; //左居中水印
				*	IMAGE_WATER_CENTER    =   5 ; //居中水印
				*	IMAGE_WATER_EAST      =   6 ; //右居中水印
				*	IMAGE_WATER_SOUTHWEST =   7 ; //左下角水印
				*	IMAGE_WATER_SOUTH     =   8 ; //下居中水印
				*	IMAGE_WATER_SOUTHEAST =   9 ; //右下角水印
				*/
				foreach($info as $info_show){
					$product_path='./Public/uploads/product_img/'.$info_show['savepath'].$info_show['savename'];//原图片地址
					$product_name=$info_show['savepath'].date('His').$info_show['savename'];//加水印文件重命名
					$product_img='./Public/uploads/product_img/'.$product_name;//加水印保存地址
					$image=new \Think\Image();
					$image->open($product_path)->water('./ThinkPHP/logo.png',\Think\Image::IMAGE_WATER_NORTHWEST,50)->save($product_img); 
					unlink($product_path);//删除多余的图片
					$product->show_img.=$product_name.',';
				}
				//$product->XXX.=$info[0]['savepath'].$info[0]['savename'];
				$product->show_img=substr($product->show_img,0,(strlen($product->show_img)-1));//去掉最后的‘,’
				$show_arr=explode(',',$product->show_img);
				$show_file=$show_arr[0];//获得第一张图片地址
				$show_arr_n=explode('/',$show_file);
				$show_arr_filename=$show_arr_n[1];//获得图片名称+后缀
				$show_arr_t=explode('.',$show_arr_filename);
				$show_arr_name='_'.$show_arr_t[0];//缩略图名称
				$product->product_img=$show_arr_n[0].'/'.$show_arr_name.'.'.$show_arr_t[1];//缩略图地址
				//下面开始生成第一张产品展示图的缩略图
				$img=new \Think\Image();
				$product_img_path='./Public/uploads/product_img/'.$show_file;//原图片地址
				$img->open($product_img_path);//打开原图片
				$img_width=224;//设置缩略图宽度
				$img_height=224;//设置缩略图宽度
				$img_savepath='./Public/uploads/product_img/'.$product->product_img;//缩略图保存路径
				$img->thumb($img_width,$img_height,2)->save($img_savepath);//缩放后填充
			}
			$product->addtime=gettime();
			if($product->add()){
				$this->success('操作成功！',U('product/product'),5);
 			}else{
				$Error=$product->getError();
				$this->error('操作失败了:'.$Error,U('product/product'),5);
			}
		}else{
			$Error=$product->getError();
			$this->error($Error,U('product/product'),1005);
		}
	}
	public function update(){
		$product=D('product');
		$Id=I('get.Id');
		$where['fw_product.Id']=$Id;
		if(IS_POST){
			$rules=array();
			$rule=array();
			if($product->validate($rules)->auto($rule)->create()){
				$product->description=I('post.description','',false);
				$upload_config=array(
					'maxSize' => 3145728,//文件上传最大字节
					'rootPath' => './Public/uploads/product_img/',//文件上传根目录
					'savePath' => '',
					'saveName' => array('uniqid',''),//设置上传文件的保存规则
					'exts' => array('jpg','gif','png','jpeg'),//设置文件上传类型
					'autoSub' => true,//是否开启子目录自动保存文件
					'subName' => array('date','Ymd')//子目录创建方式
				);
				$upload = new \Think\Upload($upload_config);
				$info = $upload->upload();
				$product->show_img='';
				$show_imgh=I('post.show_imgh');
				for($i=0;$i<count($show_imgh);$i++){
					if($info[$i]==''){
						$product->show_img.=$show_imgh[$i].',';
					}else{
						$product_path='./Public/uploads/product_img/'.$info[$i]['savepath'].$info[$i]['savename'];//原图片地址
						$product_name=$info[$i]['savepath'].date('His').$info[$i]['savename'];//加水印文件重命名
						$product_img='./Public/uploads/product_img/'.$product_name;//加水印保存地址
						$image=new \Think\Image();
						$image->open($product_path)->water('./ThinkPHP/logo.png',\Think\Image::IMAGE_WATER_NORTHWEST,50)->save($product_img);
						$del='./Public/uploads/product_img/'.$show_imgh[$i];
						unlink($del);//删除之前的图片
						unlink($product_path);//删除多余的图片
						$product->show_img.=$product_name.',';
					}
				}
				if($info[0]!=''){
					$product->show_img=substr($product->show_img,0,(strlen($product->show_img)-1));//去掉最后的‘,’
					$show_arr=explode(',',$product->show_img);
					$show_file=$show_arr[0];//获得第一张图片地址
					$show_arr_n=explode('/',$show_file);
					$show_arr_filename=$show_arr_n[1];//获得图片名称+后缀
					$show_arr_t=explode('.',$show_arr_filename);
					$show_arr_name='_'.$show_arr_t[0];//缩略图名称
					$product->product_img=$show_arr_n[0].'/'.$show_arr_name.'.'.$show_arr_t[1];//缩略图地址
					//下面开始生成第一张产品展示图的缩略图
					$img=new \Think\Image();
					$product_img_path='./Public/uploads/product_img/'.$show_file;//原图片地址
					$img->open($product_img_path);//打开原图片
					$img_width=224;//设置缩略图宽度
					$img_height=224;//设置缩略图宽度
					$img_savepath='./Public/uploads/product_img/'.$product->product_img;//缩略图保存路径
					$img->thumb($img_width,$img_height,2)->save($img_savepath);//缩放后填充
					$del_first=I('post.product_imgh');
					unlink('./Public/uploads/product_img/'.$del_first);//删除之前的缩略图
				}
				if($product->where($where)->save()){
					$this->success('操作成功',U('product/product'),5);
				}else{
					$Error=$product->getError();
					$this->error('操作失败了:'.$Error,U('product/product'),5);
				}
			}else{
				//$category=D('category');
				//$map['parentId']=array('NEQ',0);
				//$procl=$category->where($map)->order('Id desc,parentId desc')->select();
				$data=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->find();
				$show_img=explode(',',$data['show_img']);
				//$this->assign('procl',$procl);
				$this->assign('data',$data);
				$this->assign('show_img',$show_img);
				$Error=$product->getError();
				echo "<script>alert('".$Error."');</script>";
				$this->display('product/update');
			}
		}else{
			$category=D('category');
			$map['parentId']=array('NEQ',0);
			$procl=$category->where($map)->order('Id desc,parentId desc')->select();
			$data=$product->join('fw_category ON fw_category.Id = fw_product.classId')->where($where)->field("fw_product.*,fw_product.Id as aId,fw_category.name as bName")->find();
			$show_img=explode(',',$data['show_img']);
			//$data['description']=htmlspecialchars_decode($data['description']);
			$this->assign('procl',$procl);
			$this->assign('show_img',$show_img);
			$this->assign('data',$data);
			$this->display('product/update');
		}
	}
	public function del(){
		$product=D('product');
		$Id=I('get.Id');
		$where['Id']=$Id;
		if($product->where($where)->delete()){
			$this->success('操作成功',U('product/product'),5);
		}else{
			$Error=$product->getError();
			$this->error('操作失败了:'.$Error,U('product/product'),5);
		}
	}
	public function delAll(){
		$product=D('product');
		$Id=I('post.checkbox_Id');
		$del_Id=implode(',',$Id);
		//$where['Id']=$Id;
		if($product->delete($del_Id)){
			$this->success('操作成功',U('product/product'),5);
		}else{
			$Error=$product->getError();
			$this->error('操作失败了:'.$Error,U('product/product'),5);
		}
	}
}