<?php
/**
 * 用户配置文件
 */
return array(
    

    /* 数据缓存设置 */
    'DATA_CACHE_PREFIX'    => 'web_', // 缓存前缀
    'DATA_CACHE_TYPE'      => 'File', // 数据缓存类型
	
	'LOG_RECORD' => true, // 开启日志记录
	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误	

	
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/Static',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
		'__FONTS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/fonts',
    ),

    /* SESSION 和 COOKIE 配置 */
    'SESSION_PREFIX' => 'web', //session前缀
    'COOKIE_PREFIX'  => 'web_', // Cookie前缀 避免冲突
    'VAR_SESSION_ID' => 'session_id',	//修复uploadify插件无法传递session_id的bug
	'TMPL_ACTION_ERROR'   =>  'Public/dispatch_jump',
	'TMPL_ACTION_SUCCESS'   =>  'Public/dispatch_jump',
	
	//表单令牌配置
	'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
	
);