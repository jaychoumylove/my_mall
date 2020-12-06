<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checkslogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
	public function comment(){
		$comment=D('comment');
		$where['fw_comment.user_Name']=session('user');
		$all=$comment->where($where)->count();
		$page=new \Think\Pages($all,5);
		$show=$page->show();
		$data=$comment->join('fw_user ON fw_user.username = fw_comment.user_Name')->where($where)->field("fw_comment.*,fw_user.userphoto as Uuserphoto,fw_comment.addtime as Caddtime")->order('Caddtime desc')->limit($page->firstRow.','.$page->listRows)->select();
		$page_now=($page->firstRow/$page->listRows)+1;//当前页
		$page_all=ceil($all/$page->listRows);//所有页
		$this->assign('rows_num',$all);
		$this->assign('page_all',$page_all);
		$this->assign('page_now',$page_now);
		$this->assign('data',$data);
		$this->assign('page',$show);
		$this->display('comment/comment');
	}
	public function add(){
		if(IS_POST){
			$comment=D('comment');
			$rules=array(
				//array('phonenumber','checkphone','手机号码不正确！',0,'function')
				//array('stock','checkstock','库存必须是数字！','function'),
				//array('machete_price','checkprice','市场价允许小数点后两位！','function'),
				//array('here_price','checkprice','本店价允许小数点后两位！','function')
			);
			$rule=array(
				//array('addtime','gettime',3,'function')
			);
			if($comment->validate($rules)->auto($rule)->create()){
				$checkcomment=R('product/checkcomment',array($comment->pro_Id));
				if($comment->com_class==0){
					$this->error('请选择感受程度！');
				}elseif($checkcomment=='no'){
					$this->error('您已经评论过了！');
				}else{
					//$comment->pro_Id=I('get.pro_Id');
					$comment->addtime=gettime();
					$comment->user_Name=session('user');
					if($comment->add()){
						$this->error('评论成功！');
					}else{
						$Error=$comment->getError();
						$this->error('评论失败了:'.$Error);
					}
				}
			}else{
				$Error=$comment->getError();
				$this->error('评论失败了:'.$Error);
			}
		}else{
			$this->error('非法入侵',U('index/index'));
		}
	}
	public function del(){
		$comment=D('comment');
		$where['Id']=I('get.Id');
		if($comment->where($where)->delete()){
			$this->success('删除评论成功！',U('comment/comment'),5);
		}else{
			$Error=$comment->getError();
			$this->error('删除评论失败了:'.$Error);
		}
	}
	public function delAll(){
		$comment=D('comment');
		$Id=I('post.Id');
		$del_Id=implode(',',$Id);
		if($comment->delete($del_Id)){
			$this->success('删除评论成功！',U('comment/comment'),5);
		}else{
			$Error=$comment->getError();
			$this->error('删除评论失败了:'.$Error);
		}
	}
}