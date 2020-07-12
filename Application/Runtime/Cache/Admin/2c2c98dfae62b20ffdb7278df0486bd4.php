<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="<?php echo C('webkeywords');?>" name="keywords">
	<meta name="description" content="<?php echo C('webdescription');?>">
	<link rel="shortcut icon" href="/Public/Admin/images/favicon.png">
	<title><?php echo C('webtitle');?></title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/fonts/font-awesome-4/css/font-awesome.min.css" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv-printshiv.js"></script>
		<![endif]-->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.nanoscroller/nanoscroller.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/bootstrap.slider/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/pygments.css" />
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />
	
</head>
<body>
<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="fa fa-gear"></span> </button>
			<a class="navbar-brand" href="#"><span>综合管理后台</span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right user-nav">
				<li class="dropdown profile_menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-2x"></i> <span><?php echo session('user_auth.username');?></span> <b class="caret"></b></a>
					<ul class="dropdown-menu">
					    <!--
						<li><a href="<?php echo U('AdminUser/password');?>">清除缓存</a></li>
						<li class="divider"></li>
						-->
						<li><a href="<?php echo U('public/logout');?>">退出</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="cl-wrapper" class="fixed-menu">
	<div class="cl-sidebar">
		<div class="cl-toggle"><i class="fa fa-bars"></i></div>
		<div class="cl-navblock">
			<div class="menu-space">
				<div class="content">
					<!-- 子导航 -->
					
						<ul class="cl-vnavigation">
						<?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i; if(!empty($sub_menu)): if((count($sub_menu)) > "1"): ?><li><a href="#"><i class="<?php echo ($sub_menu[0]['icon']); ?>"></i><span><?php echo ($key); ?></span></a>
										<ul class="sub-menu"><?php endif; ?>
								<?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (U($menu["url"])); ?>"><?php if((count($sub_menu)) == "1"): ?><i class="<?php echo ($menu["icon"]); ?>"></i><span><?php endif; echo ($menu["title"]); if((count($sub_menu)) == "1"): ?></span><?php endif; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								<?php if((count($sub_menu)) > "1"): ?></ul>
									</li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					
					<!-- /子导航 -->
				</div>
			</div>
			<div class="text-right collapse-button" style="padding:7px 9px;">
				<button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
			</div>
		</div>
	</div>
	
<div>
<div class="cl-mcont">
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3 class="hthin"><?php echo ($meta_title); ?></h3>
				</div>
				<div class="content">
					<form action="<?php echo U('set');?>" class="form-horizontal"  method="post">
						<div class="tab-pane active" id="basics">
							<div class="form-group">
								<label class="col-sm-2 control-label">网站网址</label>
								<div class="col-sm-6">
									<input type="text" name="weburl" class="form-control" value="<?php echo ($info["weburl"]); ?>" placeholder="网站网址"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">网站标题</label>
								<div class="col-sm-6">
									<input type="text" name="webtitle" class="form-control" value="<?php echo ($info["webtitle"]); ?>" placeholder="标题"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">关键字</label>
								<div class="col-sm-6">
									<textarea name="webkeywords" class="form-control"><?php echo ($info["webkeywords"]); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">描述</label>
								<div class="col-sm-6">
									<textarea name="webdescription" class="form-control"><?php echo ($info["webdescription"]); ?></textarea>
								</div>
							</div>														
							<div class="form-group">
								<label class="col-sm-2 control-label">联系方式</label>
								<div class="col-sm-6">
									<input type="text" name="webphone" class="form-control" value="<?php echo ($info["webphone"]); ?>" placeholder="联系方式"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">联系QQ</label>
								<div class="col-sm-6">
									<input type="text" name="webqq" class="form-control" value="<?php echo ($info["webqq"]); ?>" placeholder="联系QQ"/>
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-2 control-label">网站底部信息</label>
								<div class="col-sm-6">
									<textarea name="webpccopy" class="form-control"><?php echo ($info["webpccopy"]); ?></textarea>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">优惠价格</label>
								<div class="col-sm-6">
									<input type="text" name="price" class="form-control" value="<?php echo ((isset($info["price"]) && ($info["price"] !== ""))?($info["price"]):0); ?>" placeholder="原价格"/>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">原价格</label>
								<div class="col-sm-6">
									<input type="text" name="old_price" class="form-control" value="<?php echo ((isset($info["old_price"]) && ($info["old_price"] !== ""))?($info["old_price"]):0); ?>" placeholder="出售价格"/>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">微信支付APPID</label>
								<div class="col-sm-6">
									<input type="text" name="wx_appid" class="form-control" value="<?php echo ($info["wx_appid"]); ?>" placeholder="微信支付APPID"/>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">微信支付MCHID 商户收款账号</label>
								<div class="col-sm-6">
									<input type="text" name="wx_mchid" class="form-control" value="<?php echo ($info["wx_mchid"]); ?>" placeholder="微信支付MCHID"/>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">微信支付KEY</label>
								<div class="col-sm-6">
									<input type="text" name="wx_key" class="form-control" value="<?php echo ($info["wx_key"]); ?>" placeholder="微信支付KEY"/>
								</div>
							</div>	
						    <div class="form-group">
								<label class="col-sm-2 control-label">公众帐号secert</label>
								<div class="col-sm-6">
									<input type="text" name="wx_appsecert" class="form-control" value="<?php echo ($info["wx_appsecert"]); ?>" placeholder="公众帐号secert"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">支付宝partner以2088开头的16位纯数字组成</label>
								<div class="col-sm-6">
									<input type="text" name="ali_partner" class="form-control" value="<?php echo ($info["ali_partner"]); ?>" placeholder="支付宝partner"/>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-2 control-label">支付宝email</label>
								<div class="col-sm-6">
									<input type="text" name="ali_seller_email" class="form-control" value="<?php echo ($info["ali_seller_email"]); ?>" placeholder="支付宝email"/>
								</div>
							</div>	
						    <div class="form-group">
								<label class="col-sm-2 control-label">支付宝key</label>
								<div class="col-sm-6">
									<input type="text" name="ali_key" class="form-control" value="<?php echo ($info["ali_key"]); ?>" placeholder="支付宝key"/>
								</div>
							</div>																
							
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button class="btn btn-primary ajax-post" type="submit" target-form="form-horizontal">提 交</button>
								<button class="btn btn-info" type="button" onclick="javascript:history.go(-1);"><i class="fa fa-reply"></i>返回</button>
							</div>
						</div>
					</form>
				</div>
			</div>			
		</div>
	</div>
</div>

</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.ui/jquery-ui.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="/Public/Static/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/behaviour/web.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/myAjax.js"></script>

</body>
</html>