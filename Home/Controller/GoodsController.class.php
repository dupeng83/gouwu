<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller 
{
	//显示商品详情页
  public function goods_detail()
  {
  	$id = I('get.id');
  	$goods_item = D('Goods') -> get_goods_item($id);
  	// dump($goods_item);
  	$this -> assign('item', $goods_item);
  	$this -> display();
  }

  //处理商品详情页“加入购物车”表单
  public function goods_detail_post()
  {
		if (IS_POST) 
		{
			if ( isset($_SESSION['username']) ) 
			{
				$buy_goods_info = I('post.');
				// dump($buy_goods_info);
				
				// dump($_SESSION); exit;

				//将购买的商品的信息存入cart表
				D('Cart') -> goods_into_cart($_SESSION['id'], $buy_goods_info);
				$this -> redirect('Cart/show_cart');
			}
			else
			{
				$this -> redirect('Login/login');
			}
		}	
  }


}