<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller 
{
  //显示登录页
  public function login()
  {
  	$this -> display();
  	
  }

  //处理登录页的表单
  public function do_login()
  {
    if (IS_POST) 
    {
      $login_info = I('post.');
      $check_result = D('User') -> check_login($login_info);
      //检查用户名密码，如果正确，就写入Session，然后转主页
      if ($check_result) 
      {
        $_SESSION['username'] = $check_result['username'];
        $_SESSION['id'] = $check_result['id'];
        $this -> redirect('Index/index');
      }
      //如果不正确，转登录页
      else
      {
        $this -> redirect('Login/login');
      }
    }
  }

  //显示注册页
  public function register()
  {
    $this -> display();
  }

  //退出登录
  public function logout()
  {
    $_SESSION = [];
    session_destroy();
    $this -> redirect('Index/index');
  }
}