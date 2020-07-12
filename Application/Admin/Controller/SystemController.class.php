<?php
namespace Admin\Controller;


class SystemController extends WebController {

    //系统设置
    public function index()
	{
 
		$info=M('sys_config')->getField('keys,content');
	
		$this->assign('info',$info);
		$this->meta_title = '系统设置';
		$this->display();
        
    }

	//设置
	public function set()
	{
	    if(IS_POST){
          $data = I('post.');
          foreach($data as $k=>$v){
		      $id = M('sys_config')->where("`keys` = '%s'", array($k))->getField('id');
              if(empty($id)){
			      $datas['keys'] = $k;
				  $datas['content'] = $v;
			      M('sys_config')->add($datas);
			  }		
              M('sys_config')->where("id = %d", array($id))->save(array('content'=>$v));			  
		  }  		
		  del_dir_file(RUNTIME_PATH, true);//清除缓存
		}  
        $this->success('设置成功', U('index'));		
	}

	
}
