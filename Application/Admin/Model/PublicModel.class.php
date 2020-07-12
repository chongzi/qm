<?php
namespace Admin\Model;


class PublicModel  {


	public function login($username, $password){
		$map = array();
		$map['username'] = $username;
		$map['status'] = 1;
		$user = M('AdminUser')->where($map)->find();
		if(is_array($user)){
			if(think_ucenter_md5($password) === $user['password']){
				$this->autoLogin($user);
				return $user['id'];
			} else {
				return -2;
			}
		} else {
			return -1;
		}
	}
	
    private function autoLogin($user){
        $data = array(
            'id'             => $user['id'],
            'login'           => array('exp', '`login`+1'),
            'last_login_time' => time(),
            'last_login_ip'   => get_client_ip(1),
        );
        M("AdminUser")->save($data);
        $auth = array(
            'uid'             => $user['id'],
            'username'        => $user['username'],
            'last_login_time' => $user['last_login_time'],
        );
        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
    }

	public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }
	
	public function info($uid){
		$map['id'] = $uid;
		return M('Users')->where($map)->find();
	}
	
	
	/**
	 * 个推 {"PushType":"","PushTitle":"","PushContent":"","PushValue":{"LinkType":"","LinkValue":""},"PushTime":""}
	 * 1.反馈信息回复 PushType = 'ReplyMsg'  LinkType = 0   LinkValue = ''
	 * 2.会员中奖 PushType = 'PrizeMsg'  LinkType = 1   LinkValue = ''
	 * 3.会员发货 PushType = 'SendMsg'  LinkType = 2   LinkValue = ''
	 */	
	public function push($data, $userId = 0)
	{
		import("Admin.Org.Getui");  //导入个推
		$Getui = new \Getui();
		
		$msg = array(
		    'PushType' => $data['PushType'],   //推送类型
            'PushTitle' => $data['PushTitle'],  //通知标题
            'PushContent' => $data['PushContent'],//通知内容
            'LinkType' => $data['LinkType'],   //跳转类型值
            'LinkValue' => $data['LinkValue'],	//跳转值
            'PushTime' => date('Y-m-d H:i:s'), //推送时间			
		);
		$content = '{"PushType":"'.$msg['PushType'].'","PushTitle":"'.$msg['PushTitle'].'","PushContent":"'.$msg['PushContent'].'","PushValue":{"LinkType":"'.$msg['LinkType'].'","LinkValue":"'.$msg['LinkValue'].'"},"PushTime":"'.$msg['PushTime'].'"}';
		
		if(empty($userId)){
			$res = $Getui->pushMessageToApp($content);	
		}else{
			$res = $Getui->pushMessageToSingle($content, $userId);	
		}
		$data['rep'] = $res['rep'];
        if($res['code'] == true){
			$msg = array(
				'UserId' => $userId,
				'PushType' => $data['PushType'],   //推送类型
				'PushTitle' => $data['PushTitle'],  //通知标题
				'PushContent' => $data['PushContent'],//通知内容
				'LinkType' => $data['LinkType'],   //跳转类型值
				'LinkValue' => $data['LinkValue'],	//跳转值
				'PushTime' => date('Y-m-d H:i:s'), //推送时间			
			);
			$dataPush = $msg;
			$dataPush['UserId'] =  $userId;
			M('sys_push')->add($dataPush);//新增推动记录
			\think\Log::record($data);
			
		}else{
			\think\Log::record($data);
		}    		
	}
	
	/**
	 * 导出Excel
	 * @param string $expTitle 文件名称
	 * @param string $expCellName 字段名
	 * @param string $expTableData 数值
	 */
    public function exportExcel($expTitle,$expCellName,$expTableData)
	{
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
		$fileName = $xlsTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        import("Admin.Org.PHPExcel");  //导入phpexcel
       
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        //$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $expCellName[$i][1]); 
        } 

        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), ''.$expTableData[$i][$expCellName[$j][0]]);
          }             
        } 	
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
	
	/**
	 * 单文件上传
	 * @param unkown $file 上传的文件
	 * @param array $ext 允许上传的文件类型
	 */
	public function upload($file, $ext)
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     $ext;// 设置附件上传类型
		$upload->rootPath  =      './Data/'; // 设置附件上传根目录
		// 上传单个文件 
		$info   =   $upload->uploadOne($file);
		if(!$info) {// 上传错误提示错误信息
			$this->error = $upload->getError();
			print_R($this->error);
			
			return false;
		}else{// 上传成功 获取上传文件信息
			 return $info['savepath'].$info['savename'];
		}
    }
	
    /**
	 * 获取手机号码归属地
	 */
	public function get_mobile_address($mobile)
	{
		$subMobile = substr($mobile, 0, 7);
		$map['Mobile'] = $subMobile;
        $info = M('tool_mobile')->where($map)->find();
		if(!empty($info)){
			return $info['Province'].$info['City'];
		}
		
		$url = 'http://v.showji.com/Locating/showji.com2016234999234.aspx?m='.$mobile.'&output=json';
		$response = $this->getHttpResponseGET($url);
		$res = json_decode($response);

		if (!empty($res->Mobile)) {
			$data = [
			    'Mobile' => $subMobile,
				'Corp' => $res->Corp,
				'Province' => $res->Province,
				'City' => $res->City,
				'AreaCode' => $res->AreaCode,
				'PostCode' => $res->PostCode
			];
			
			M('tool_mobile')->add($data);			
			return $data['Province'].$data['City'];
		}
		return '';
	}

	/**
	 * 远程获取数据，GET模式
	 * return 远程输出的数据
	 */
	private function getHttpResponseGET($url) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		$responseText = curl_exec($curl);
		curl_close($curl);
		
		return $responseText;
	}	

	
}