<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_FILE_DEPR'        =>  '_', //模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符

	'TMPL_PARSE_STRING' => array(
        '__HOMESTYLE__' => __ROOT__ . '/Public/Home',
    ),
	'TMPL_ACTION_ERROR'   =>  'Public/dispatch_jump',
	'TMPL_ACTION_SUCCESS' =>  'Public/dispatch_jump',  
	'TMPL_EXCEPTION_FILE' =>  'Public/think_exception',// 异常页面的模板文件	
	
	'URL_MODEL' => 2,

    'WEIXINPAY_CONFIG'       => array(
	    'APPID'              => config_lists('wx_appid'), // 微信支付APPID
	    'MCHID'              => config_lists('wx_mchid'), // 微信支付MCHID 商户收款账号
	    'KEY'                => config_lists('wx_key'), // 微信支付KEY
	    'APPSECRET'          => config_lists('wx_appsecert'), // 公众帐号secert (公众号支付专用)
	    'NOTIFY_URL'         => config_lists('weburl').'pay/wxnotify', // 接收支付状态的连接
    ),
    'ALIPAY_CONFIG'          => array(
        'partner'            => config_lists('ali_partner'), // partner 支付宝唯一用户号。以2088开头的16位纯数字组成。
        'seller_email'       => config_lists('ali_seller_email'), // email 从支付宝商户版个人中心获取
        'key'                => config_lists('ali_key'), // key 从支付宝商户版个人中心获取
        'sign_type'          => strtoupper(trim('MD5')), // 可选md5  和 RSA 
        'input_charset'      => 'utf-8', // 编码 (固定值不用改)
        'transport'          => 'http', // 协议  (固定值不用改)
        'cacert'             => VENDOR_PATH.'Alipay/cacert.pem',  // cacert.pem存放的位置 (固定值不用改)
        'notify_url'         => config_lists('weburl').'/pay/alinotify', // 异步接收支付状态通知的链接
        'return_url'         => config_lists('weburl').'/pay/alireturn', // 页面跳转 同步通知 页面路径 支付宝处理完请求后,当前页面自 动跳转到商户网站里指定页面的 http 路径。 (扫码支付专用)
        'show_url'           => config_lists('weburl').'/order/pchistory', // 商品展示网址,收银台页面上,商品展示的超链接。 (扫码支付专用)
        'private_key_path'   => '', //移动端生成的私有key文件存放于服务器的 绝对路径 如果为MD5加密方式；此项可为空 (移动支付专用)
        'public_key_path'    => '', //移动端生成的公共key文件存放于服务器的 绝对路径 如果为MD5加密方式；此项可为空 (移动支付专用)
    ),   
	


);