<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CartModel extends RelationModel 
{
  protected $_link = [ 'Goods' => self::BELONGS_TO, ];

  //将购买的商品的信息存入cart表
	public function goods_into_cart($user_id, $goods_info)
  {
    $condition['user_id'] = $user_id;
    $condition['goods_id'] = $goods_info['goods_id'];

    $already_in_cart_result = $this -> where($condition) -> select();
    // dump($already_in_cart_result); exit;

    //如果购物车里已经有了这种商品，用户又买了一次
    if ($already_in_cart_result) 
    {
      //如果购物车里有重复项，直接退出...(正常情况下这个不会发生)
      if( count($already_in_cart_result) != 1 )
      {
        exit('duplicate items in cart!');
      };

      // dump($already_in_cart_result);
      
      //将又买一次的商品数量和原有的数量相加
      $data['id'] = $already_in_cart_result[0]['id'];
      $data['goods_amount'] = $already_in_cart_result[0]['goods_amount'] + $goods_info['buy_amount'];
      // dump($data); exit;

      return $this -> save($data);
    }
    //否则用户就是第一次购买这种商品，购物车里没有
    else
    {
      $data['user_id'] = $user_id;
      $data['goods_id'] = $goods_info['goods_id'];
      $data['goods_amount'] = $goods_info['buy_amount'];

      return $this -> add($data);
    }
  }

  //获取该用户cart表中所有的购物信息
  public function get_user_cart_items($user_id)
  {
    $condition['user_id'] = $user_id;
    $user_cart_result = $this -> relation('Goods') -> where($condition) -> select();
    // dump($user_cart_result); exit;
    return $user_cart_result;
  }



}