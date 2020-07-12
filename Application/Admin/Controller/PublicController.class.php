<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 用户首页控制器
 */
class PublicController extends Controller {
      
	 protected function _initialize(){
        config_lists();

		$this->webpath=__ROOT__."/";
        $this->webtitle = S('DB_CONFIG_DATA')['webtitle'];
        $this->webcopy = 2017;

	}
	
	public function login($username = null, $password = null, $code = null){
        if(IS_POST){
            if(!$this->check_verify($code)){
				$this->error('验证码错误');
			} 
            $uid = D('Public')->login($username, $password);
            if(0 < $uid){
                $this->success('登录成功！', U('Index/index'));
            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break;
                }
                $this->error($error);
            }
        } else {
            if(is_login()){
                $this->redirect('Index/index');
            }else{
                $this->display();
            }
        }
    }
	
	/* 退出登录 */
    public function logout(){
        if(is_login()){
            D('Public')->logout();
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }
	
    public function getpass(){
        if(IS_POST){
            D('Public')->logout();
            $this->success('退出成功！', U('login'));
        } else {
            $this->display();
        }
    }
	
	/**
	 * 验证码
	 */
	public function verify(){
		$config =    array(
			'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify =     new \Think\Verify();
		$Verify->entry();
	}
	
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    private function check_verify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }
	
}
