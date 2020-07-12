<?php
namespace Admin\Model;
use Think\Model;

class AdminUserModel extends Model {

	protected $_validate = array(
		array('username', '5,30', '用户名长度必须在5-30个字符之间！', self::EXISTS_VALIDATE, 'length',self::MODEL_INSERT), //用户名长度不合法
		array('oldpassword', 'require', '请输入原密码！', self::EXISTS_VALIDATE, 'regex',self::MODEL_UPDATE),
		array('password', '6,30', '密码长度必须在6-30个字符之间！', self::EXISTS_VALIDATE, 'length'),
	);

	protected $_auto = array(
		array('password', 'think_ucenter_md5', self::MODEL_BOTH, 'function'),
		array('status', 'getStatus', self::MODEL_INSERT, 'callback')
	);

	public function info($uid){
		$map['id'] = $uid;
		$map['status']=1;
		$info=$this->where($map)->field('id,username,last_login_time')->find();
		return $info;
	}
	
	public function reg(){
		if($data=$this->create()){
			return $this->add($data);
		} else {
			return $this->getError();
		}
	}
	
	public function password($uid){
		if(!$data = $this->create()){
            return false;
        }
		$map['username'] =  ['eq', I("post.username")];
		$map['id'] =  ['neq', $uid];
		if(M('AdminUser')->where($map)->getField('id')){
			$this->error ='用户名已被占用！';
			return false;
		}		
		if(I('post.password') !== I('post.repassword')){
            $this->error = '您输入的新密码与确认密码不一致！';
			return false;
        }
		if(!$this->verifyUser($uid, I('post.oldpassword'))){
			$this->error = '验证出错：密码不正确！';
			return false;
		}
        $this->id=$uid;
        $res = $this->save();
        return $res;
    }
	
	protected function verifyUser($uid, $password_in){
		$password = $this->getFieldById($uid, 'password');
		if(think_ucenter_md5($password_in) === $password){
			return true;
		}
		return false;
	}
	
	protected function getBirthdayTime(){
		$birthday_time    =   I('post.birthday');
		return $birthday_time?strtotime($birthday_time):date('Y-m-d H:i:s');
	}
	
	protected function getStatus(){
		return true;
	}
}