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
	
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.icheck/skins/square/blue.css" />

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
			<form class="shop-form" method="post" action="<?php echo U('batch');?>">
			    <input type="hidden" name="BatchType" value="1" />
				<div class="header">
					<h3 class="hthin"><?php echo ($meta_title); ?></h3>
				</div>
				<div class="content">
					<div class="col-sm-12 no-padding">
					    <div class="col-sm-2 no-padding">
						    <input id="check-all" type="checkbox" name="checkall" style="position: absolute;" />
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								    批量处理 <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#" batch-type="1" onclick="batch(1)">删除</a></li>
								</ul>
							</div>						
						</div>
						<label class="pull-left control-label">姓名</label>
						<div class="col-sm-3">
							<input type="text" name="keyword" class="form-control">
						</div>
						<div class="col-sm-2">
							<button type="button" id="search" url="<?php echo U('index?state='.$_GET['state']);?>" class="btn btn-success">搜素</button>
						</div>	

						<div class="pull-right">
							<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								选择状态 <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo U('index');?>">所有分类</a></li>
								<li><a href="<?php echo U('index?state=1');?>">未付款</a></li>
								<li><a href="<?php echo U('index?state=2');?>">已付款</a></li>
							  </ul>
							</div>
						</div>							
					</div>
				

					<table class="no-border blue">
						<thead class="no-border">
						<tr>
							<th style="width:5%;">选择</th>
							<th style="width:15%;">订单编号</th>
							<th style="width:8%;">姓名</th>
							<th style="width:8%;">字辈</th>
							<th style="width:8%;">性别</th>
							<th style="width:15%;">生日</th>
							<th style="width:5%;">价格</th>
							<th style="width:8%;">状态</th>
							<th style="width:8%;">手机</th>
							<th style="width:8%;">邮箱</th>
							<th style="width:10%;">下单时间</th>
							<!--<th style="width:12%;">支付时间</th>-->
							<th class="text-right">操作</th>
						</tr>
						</thead>
						<?php if(!empty($list)): ?><tbody class="no-border-y">
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td style="width:5%;"><input name="id[]" type="checkbox" value="<?php echo ($vo["id"]); ?>"></td>
							<td style="width:15%;"><a href="/order/mlist/orderno/<?php echo ($vo["order_no"]); ?>" target="_blank"><?php echo ($vo["order_no"]); ?></a></td>
							<td style="width:5%;"><?php echo ($vo["name"]); ?></td>
							<td style="width:5%;"><?php echo ($vo["zibei"]); ?></td>
							<td style="width:5%;"><?php echo (get_gender($vo["gender"])); ?></td>
							<td style="width:15%;">阳历:<?php echo ($vo["birthday"]); ?> <?php echo ($vo["birthtime"]); ?>时<?php echo ($vo["birthmin"]); ?>分 </td>
							<td style="width:5%;"><?php echo ($vo["price"]); ?></td>
							<td style="width:8%;"><?php echo (get_order_state($vo["state"])); ?></td>
							<td style="width:8%;"><?php echo ($vo["mobile"]); ?></td>
							<td style="width:8%;"><?php echo ($vo["email"]); ?></td>
							<td style="width:15%;"><?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?></td>
							<!--<td class="width:15%;">
								<?php if($vo['state'] != 0): echo (date('Y-m-d H:i:s',$info["paytime"])); endif; ?>							
							</td>-->
							<td class="text-right">
							<a data-placement="left" data-toggle="tooltip" data-original-title="删除" class="label label-danger confirm refresh ajax-get "  href="<?php echo U('del?id='.$vo['id']);?>"><i class="fa fa-times"></i></a>	
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
						<?php else: ?>
						<td colspan="3"> aOh! 暂时还没有内容! </td><?php endif; ?>
					</table>
					<div class="content col-lg-12 pull-left">
                        <div class="panel-foot text-center">
                            <div class="page"><?php echo ($_page); ?></div>
                        </div>
					</div>
					<div class="clearfix"></div>
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

<script type="text/javascript" src="/Public/Admin/js/jquery.icheck/icheck.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			highlight_subnav('<?php echo U('Store/index');?>');
		});
		function status(i){
			$('.status:eq('+(i-1)+')').toggleClass('label-default').toggleClass('label-warning');
		}
		$('.opiframe').click(function(){
			layer.open({
				type: 2,
				title: $(this).attr('data-name'),
				shadeClose: true,
				maxmin: false, //开启最大化最小化按钮
				area: ['850px', '610px'],
				content: [$(this).attr('url'), 'no']
			});
		});
		$('input').iCheck({
            checkboxClass: 'icheckbox_square-blue checkbox',
            radioClass: 'icheckbox_square-blue'
        });
	</script>

</body>
</html>