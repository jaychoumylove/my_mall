<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _empty(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p><b>系统繁忙</b>！</p><br/>[ 空操作 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function _initialize(){
		$result=checklogin();
		if(!$result){
			$this->error('您未登录，请登录！',U('login/login'),5);
		}
	}
    public function main(){
		$this->display("index/main");
    }
	public function left(){
		$this->display("index/left");
	}
	public function top(){
		$this->display("index/top");
	}
	public function footer(){
		$this->display("index/footer");
	}
	public function index(){
		$this->display("index/index");
	}
	public function quit(){
		session('admin',null);
		$this->success('退出成功！',U('login/login'),5);
	}
}