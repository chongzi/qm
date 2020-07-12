<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index()
	{
		$years = array();
			$currentYear = date('Y');

			for ($i=0; $i<50; $i++)
			{
			    $years[$currentYear -$i] = $currentYear - $i;
			}
			for ($i=0; $i<20; $i++)
			{
			    $years[$currentYear +$i] = $currentYear +$i;
			}
			ksort($years);

			$this->assign('years',$years);
			if(is_mobile()){
				$tpl = 'Index_index-4';
			}else{
				$tpl = 'Index_index';
			}
	    $this->display($tpl);
	}

	public function weixin()
	{
		 $this->display('Index_weixin');
	}




}