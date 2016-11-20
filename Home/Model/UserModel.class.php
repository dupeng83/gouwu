<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model 
{
	public function check_login($info)
	{
		// dump($info); exit;
		$condition['username'] = $info['username'];
		$condition['password'] = md5( $info['password'] );
		$result = $this -> where($condition) -> find();
		// dump($result); exit;
		return $result;
	}



}