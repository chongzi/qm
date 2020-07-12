<?php

//获取订单状态
function get_order_state($state)
{
    $arr = [
       '0'=>'未付款',
       '1'=>'已付款', 
    ];
    if(array_key_exists($state,$arr)){
        return $arr[$state];
    }else{
    	return '';
    }
}

//获取性别
function get_gender($num)
{
    $arr = [
       '0'=>'女',
       '1'=>'男', 
    ];
    if(array_key_exists($num,$arr)){
        return $arr[$num];
    }else{
    	return '';
    }
}
?>