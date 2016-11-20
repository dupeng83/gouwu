<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
	//首页，显示所有商品
  public function index()
  {
  	$list = D('Goods') -> getAllGoods();
  	// dump($list);exit;
  	$this -> assign('list', $list);
    $this -> display();
  }
}