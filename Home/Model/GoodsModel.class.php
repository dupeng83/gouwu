<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model 
{
	public function getAllGoods()
	{
		return $this -> select();
	}

	public function get_goods_item($id)
	{
		return $this -> find($id);
	}



}