<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller 
{
	//显示购物车页
  public function show_cart()
  {
    // dump($_SESSION); exit;
    $user_id = $_SESSION['id'];
    $list = D('Cart') -> get_user_cart_items($user_id);

    $this -> assign('list', $list);
		$this -> display();
  }

  public function delete_item()
  {
    
  }

  public function cart_submit()
  {
    $this -> display();
  }

  public function cart_submit_post()
  {
    $this -> redirect('Cart/pay');
  }

  public function pay()
  {
    $this -> display();
  }

  public function pay_submit()
  {
    $this -> redirect('Index/index', [], 5, '已经交款，重定向到首页');
  }
}