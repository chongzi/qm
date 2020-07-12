<?php
namespace Admin\Controller;


class OrderController extends WebController {

    public function index(){
        
		$map['isdelete'] = array('eq', 0);	
		$state = I('state', 0, 'intval');
        switch($state){
            case 1:
                $map['state'] = array('eq', 0);  
                break;
            case 2:
                $map['state'] = array('eq', 1);  
                break;
            default:
                break;                            
        }

        if(isset($_GET['keyword'])){
            $where['name']  = array('like', '%'.I('keyword', '', 'trim').'%');
            $where['_logic'] = 'or';
            $map['_complex'] = $where;
        }

        $list = $this->lists('order', $map, 'id desc', 0, '');

        $this->assign('list', $list);

        $this->meta_title = '订单管理';
        $this->display();
    }

	/**
     * 删除
     */
	public function del(){
		$id = I('id', 0, 'intval');
		$delete=M('order')->where('id='.$id)->delete();
		if($delete){
			//M('order')->where('id='.$id)->setField('isdelete',1);
			$this->success('成功！');
		}else{
			$this->error('失败！');
		}
		
	}	
	
	public function batch(){
		$batchType = I('post.BatchType', 0, 'intval');
		$id = I('post.id'); 

		switch($batchType){
            case 1: //删除
				foreach($id as $v){
				    M('order')->where('id='.intval($v))->delete();
				}
                break;
            default:
                break;			
		}
		$this->success('设置成功');
	}	

	

	
}
