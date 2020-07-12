<?php
namespace Admin\Controller;
use Think\Storage;

class AdminUserController extends WebController {

	 /**
     * 管理员管理首页
     */
    public function index(){
        $list   = $this->lists('admin_user');
        $this->assign('_list', $list);
        $this->meta_title = '管理员列表';
        $this->display();
    }

    /**
     * 修改密码
     */
    public function password(){
		 if(IS_POST){ //提交表单
		 	//获取参数
			$uid = I('id',0, 'intval');
			$res   =  D('AdminUser')->password($uid);
			if($res  !== false){
				$this->success('修改密码成功！',U('index'));
			}else{
				$this->error(D('AdminUser')->getError());
			}
		 }else{
		 	$username = M('AdminUser')->getFieldById(I('id',0, 'intval'), 'username');
			$this->assign('username', $username);
			$this->meta_title = '修改密码';
			$this->display();
		 }
    }
	
	public function add(){
		if(IS_POST){
			if(I("password") != I("repassword")){
                $this->error('密码和重复密码不一致！');
            }
			if(M('AdminUser')->where(array('username'=>I("username")))->getField('id')){
				$this->error('用户名已被占用！');
			}
			$uid = D('AdminUser')->reg();
			if(is_numeric($uid)){
                $this->success('用户添加成功！',U('index'));
            } else {
                $this->error(D('AdminUser')->getError());
            }
		}else{
			$this->display();
		}
	}
	
	
	/**
     * 更改管理员状态
     */
	public function status($id){
		if($id <= 1){
				$this->error('暂不能修改');
		}
		$status=M('AdminUser')->where('id='.$id)->getField('status');
		if($status==0){
			M('AdminUser')->where('id='.$id)->setField('status',1);
			$this->success('解禁！');
		}else{
			M('AdminUser')->where('id='.$id)->setField('status',0);
			$this->error('禁用！');
		}
		
	}	
}