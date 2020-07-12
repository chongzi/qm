<?php
namespace Admin\Controller;

class WxController extends WebController {
    public function index(){
    	$today_time = strtotime(date('Y-m-d 00:00:00'));
    	
    	$order=M('order')->count("Id"); //订单总数
    	$today_order = M('order')->where("createtime > '%s'", array($today_time))->count(); //今日订单
    	$today_order_end = M('order')->where("state = 1 and createtime >= '%s'", array($today_time))->count(); //今日已付款订单


    	$pricetotal=M('order')->where("state = 1 ")->count("price"); //收入总数
    	$today_price_total = M('order')->where("state = 1 and paytime >= '%s'", array($today_time))->count("price"); //今日收入总数

		$this->assign('count',array('order'=>$order,'today_order'=>$today_order,'today_order_end'=>$today_order_end,'pricetotal'=>$pricetotal,'today_price_total'=>$today_price_total));
		
		$this->display();
    }
}