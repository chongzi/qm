<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head v="12">
    <meta charset="UTF-8" />
    <title><?php echo C('webtitle');?></title>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/css/swiper.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, user-scalable=yes" />
<meta name="renderer" content="webkit">
    <script type="text/javascript" src="/Public/Home/js/jquery-1.11.1.min.js" ></script>
   <!--  <script type="text/javascript" src="/Public/Home/js/calendar.min.js" ></script> -->
    <script type="text/javascript" src="/Public/Home/js/swiper-3.4.2.jquery.min.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/main.js" ></script>
    <script src="/Public/Home/js/ntog.js"></script>
  </head>
  <body>
    <!-- 头部 -->
    <div id="header">
      <div class="min-width">
        <div class="logo"> <a href="#"><img src="/Public/Home/picture/logo-m.png" /></a> </div>
        <div class="text"> <img src="/Public/Home/picture/index_01.png"  /> </div>
        <div class="phone"> </div>
      </div>
    </div>
    <div id="nav">
      <div class="min-width">
        <ul>
            <li><a href="<?php echo C('weburl');?>">首页</a></li>
            <li><a href="<?php echo C('weburl');?>#why-select">起名优势</a></li>
            <li><a href="<?php echo C('weburl');?>#place-order">马上起名</a></li>
            <li><a href="<?php echo C('weburl');?>#problem">常见问答</a></li>
            <li><a href="<?php echo C('weburl');?>#evaluate">客户评价</a></li>
            <li><a  href="<?php echo U('order/pchistory');?>">历史订单</a></li>
        </ul>
      </div>
    </div>

    
<script>
 function removeQcode(i){
	setTimeout(function(){$('.qcode').remove();},2000);
  var imgs = i.contentWindow.document.getElementsByTagName('img');
  var body = i.contentWindow.document.getElementsByTagName('body');
  body[0].style.margin = 0;
  body[0].style.padding = 0;
  for(var i=0;i<imgs.length;i++){
     imgs[i].style.margin = '17px';
     
  }

}

 </script> 
<script src="/Public/Home/js/scroll.js" ></script>
<!--<style type="text/css">
  .min-width {
    width: 1000px !important;
    margin: 0 auto !important;
    text-align: center;
    display: inherit;
    
}
.STYLE1 {font-weight: bold}
</style>-->
  <div class="bannernew" style=" text-align:center;margin-top:20px;"></div> 
  <!-- 支付 -->
  <div class="index-section pay-wrap">
    <div class="min-width">
      <div class="pay-title">付款后查看全部取名方案</div>
      <div class="pay-info">
        <p class="pay-price"> <span class="old-price">原价：<?php echo ($info['oldprice']); ?>元</span> <span class="new-price">优惠价：<strong><?php echo ($info['price']); ?></strong>元</span> </p>
        <p class="spay-order">(根据生辰八字提供100多个吉祥美名)</p>
        <p class="spay-order">支付单号：<span> <font id='ordernumber' types='易经起名'><?php echo ($info['orderNo']); ?></font></span></p>
        <p class="spay-user"> <span>姓氏：<font id='fullname'><?php echo ($info['name']); ?></font></span> <i>/</i> <span>性别：<?php echo ($info['gender']); ?></span> <i>/</i> <span class="span1">  生辰：（公历）<?php echo ($info['birthdayy']); ?>年<?php echo ($info['birthdaym']); ?>月<?php echo ($info['birthdayd']); ?>日  <?php echo ($info['birthdayh']); ?>时<?php echo ($info['birthdayi']); ?>分<br/>
          （农历）<?php echo ($nongli[0]); ?>年<?php echo ($nongli[1]); echo ($nongli[2]); ?>  <?php echo ($info['birthdayh']); ?>时<?php echo ($info['birthdayi']); ?>分</span> 
<span class="span1" style="color:red;font-weight:bold;font-size:18px;">当您付款成功后,请回到这里查看起名结果</span></p>
</p>
      </div>
      <style>
      .payList{ margin-top:0.3611rem; margin-bottom: 50px;}
.payList li{ width: 100%; height: 40px; margin-bottom: 0.3889rem;}
.payList li a{ display: block; width: 100%; height: 100%; background-image: url("../../images/default_1.0/pay.png"); background-repeat: no-repeat;    background-size: 100% 155px;    text-indent:-99999em;}
.payList li:nth-child(2) a{ background-position: 0 -81px;  }
.payList li:nth-child(1) a{ background-position: 0 -0px; }
 
 
      </style>
	  
      <?php if (Mobile_Detect()->isMobile()) { ?>
      <ul class="payList">
        <?php if (Mobile_Detect()->isWeixin()) { ?>
        <li id="wxByPay" class="wxpay"><a class="purl" href="javascript:"> 别的支付</a>
        </li>
        <?php }else{ ?>
        <li id="wxpaytab" class="wxpay"><a class="purl" href="javascript:" onclick="updatOrder(0)">微信1支付</a>
        </li>
        <?php }?>
        <li id="alipaytab" class="alipay"><a class="purl" href="javascript:" onclick="updatOrder(1)">支付宝支付</a></li>
      </ul>
      <?php }else{ ?>
      <ul class="pay-btn">
        <li id="wxpaytab" class="active" data-img="/pstyle/paystyle21/img/wx1.png"><i></i></li>
        <li id="alipaytab" class="" data-img="/pstyle/paystyle21/img/wx1.png"><i></i></li>
      </ul>
      <?php }?>
      <?php if (!Mobile_Detect()->isMobile()) { ?>
      <div class="pay-qrcode">
        <div class="left"> 
          <!-- 微信二维码 -->
          <div class="qrcode" style='background:#fff;'>
            <div style='width:201px;height:201px;' id='wx'  url="<?php echo U('pay/wxpay',array('orderno'=>$info['orderNo']));?>">
              <div class='qcode' style='position: absolute;'> <img src='/Public/Home/picture/wx-sys.gif' style='width: 200px;height: 201px;'> </div>
              
              <iframe src="" class='getqr' onload="removeQcode(this)" style='width:100%;height:100%' frameborder="0"></iframe>
            
            </div>
          </div>
          <dl>
            <dt></dt>
            <dd class="first">请用<span>微信</span>扫一扫</dd>
            <dd>扫描二维码支付</dd>
          </dl>
        </div>
        <div class="right"> <img src="/Public/Home/picture/wx1.png"/> </div>
      </div>
      <?php }?>
      <div class="lvsetu" style=" float:none; color:#FF0000;margin-top:-35px;margin-bottom:10px; text-align:center"><img src="/Public/Home/picture/998.png" align="middle"></div>
      <div class="wxzf" style=''>
        <p style='' >支付后请耐心等待10秒钟出结果</p>
       <!--  <div id='showdetail' style=''>查看订单详情</div> -->
      </div>
      <div class="bottom-btn" id='payend' style='display:none'>
        <div class="pay-result payresult">我已支付成功</div>
        <div class="pay-result payresult">支付失败</div>
      </div>
    </div>
  </div>
  <!-- 支付结束 -->
 
	
<script type="text/javascript" src="/Public/Home/js/scroll_s.js" ></script> 
<script type="text/javascript">
       		$(function () {
	            $("#demoxj").myScroll({
	            speed: 40, //数值越大，速度越慢
	            rowHeight: 30 //li的高度
	            });
	             $("#nxt").myScroll({
	            speed: 40, //数值越大，速度越慢
	            rowHeight: 30 //li的高度
	            });
	        });	     
</script>
<script>
			$(function(){	
      
				$('.comment-wrap .item-wrap').Scroll({
			        speed: 40, 
			        direction: 'y'
		    	});
		    	
		    	$(".case-wrap").click(function(){
		    		$("html,body").animate({
		    			scrollTop: $(".pay-wrap").offset().top
		    		},1500);
				});
				
				$('#showdetail').click(function(){
					//location.href='./read?ordernum=CS171212110335222';
          location.href="<?php echo U('order/readx', array('orderno'=>$info['orderNo']));?>";
				})
		    	
			});
		</script> 
<script src="/Public/Home/js/ntog.js"></script> 
<script src="/Public/Home/js/localdata.js"></script> 
<script type="text/javascript">
	$('.spayBtn li').each(function(){
    	$(this).click(function(){
    		$(this).addClass('active').siblings().removeClass('active');
            payType = $(this).attr('paytype');
            $('.spayerC').hide();
            $('.spayerC[data-pay|="'+payType+'"]').show();
    	});
    });
	if($('#sPay').length){	
    	$('.bins_btn,#btns li').click(function(){
            $('html, body').animate({  
                scrollTop:  $('#sPay').offset().top
            }, 1000);  
    	});
    }

    var webUrl = '<?php echo C('weburl');?>';
	$("#wxByPay").click(function () {
	  const url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx825f4f0f8e040261&redirect_uri="+webUrl+"/pay/wei&response_type=code&scope=snsapi_base&state=<?php echo ($info['orderNo']); ?>"
      location.href = url
        //location.href="<?php echo U('pay/wei', array('orderno'=>$info['orderNo']));?>";
    });
	 
	

	function showqrcode( ){
		//var wx=$('#wx').attr('url')+"&device="+getdevtype()+"&time="+(getrnd());
    var wx=$('#wx').attr('url');
		$('#wx').find('iframe').attr('src',wx); 
		
	}


	function getdevtype(){
		if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
			return 'ios';
		} else if (/(Android)/i.test(navigator.userAgent)) {
			return 'android';
		} else {
			return 'pc';
		};
	}
	function getrnd(){
		return (+new Date())+Math.random();
	}
	
 
	function setLtime(){
		var _s = calendar.solar2lunar(<?php echo ($info['birthdayy']); ?>,<?php echo ($info['birthdaym']); ?>,<?php echo ($info['birthdayd']); ?>);
		$('.l1').html(_s.gzYear+'年');
		$('.l2').html(_s.IMonthCn);
		$('.l3').html(_s.IDayCn);
		$('.l4').html(Hcovert("<?php echo ($info['birthdayh']); ?>"));
	}
	$(function(){

		setLtime();
		 
		showqrcode();
		setTimeout(function() {
			checkorder();
			//$('#payend').show();
		}, 10000);
		 

		$('.payresult').click(function(){
			location.reload();
		})
		$(".pays").click(function(){
			$("html,body").animate({scrollTop: $("#pays").offset().top}, 500);
		})

    $("#alipaytab").click(function(){
      <?php if (Mobile_Detect()->isMobile()) { ?>
      window.location.href = "<?php echo U('pay/alipay',array('orderno'=>$info['orderNo']));?>";
      <?php }else{ ?>
      window.open("<?php echo U('pay/alipay',array('orderno'=>$info['orderNo']));?>");
      <?php } ?>
    })
    <?php if (Mobile_Detect()->isMobile()) { ?>
    $("#wxpaytab").click(function(){
      window.location.href = "<?php echo U('pay/wxpay');?>?orderno=<?php echo ($info["orderNo"]); ?>";
      //array('orderno'=>$info['orderNo'])
    })
    <?php } ?>
		
	})


	function checkorder(){
		
		$.get('<?php echo U("order/orderstate", array("orderno"=>$info["orderNo"]));?>',function(d){
			if(d.code==1){
				setTimeout(function() {
					location.href='<?php echo U("order/mlist", array("orderno"=>$info["orderNo"]));?>';
				}, 3000);
			}
			setTimeout(function() {
				checkorder();
			}, 4000);
		},'json');
	}


	
</script>

<div id="container" class="container"> 
  <!-- 基本信息 -->
  <div class="index-section basic-info case-wrap index-section1" style="margin:0">
    <div class="sj_margin"></div>
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <img src="/Public/Home/picture/index_30.png" /> </div>
      </div>
      <div class="section section">

        <table border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td width="25%"><label><strong>起名姓氏</strong></label></td>
            <td colspan="2"><span><?php echo ($info['name']); ?></span></td>
            <td><label>性别</label></td>
            <td><span><?php echo ($info['gender']); ?></span></td>
          </tr>
          <tr>
            <td><label><strong>出生日期</strong></label></td>
            <td colspan="4"><span><?php echo ($info['birthdayy']); ?>年<?php echo ($info['birthdaym']); ?>月<?php echo ($info['birthdayd']); ?>日  <?php echo ($info['birthdayh']); ?>时<?php echo ($info['birthdayi']); ?>分</span></td>
          </tr>
          <tr>
            <td><label><strong>出生公历</strong></label></td>
            <td><span><?php echo ($info['birthdayy']); ?>年</span></td>
            <td><span><?php echo ($info['birthdaym']); ?>月</span></td>
            <td><span><?php echo ($info['birthdayd']); ?>日</span></td>
            <td><span><?php echo ($info['birthdayh']); ?>点</span></td>
          </tr>
          <tr>
            <td><label><strong>出生农历</strong></label></td>
            <td><span><?php echo ($nongli[3]); ?>年</span></td>
            <td><span><?php echo ($nongli[1]); ?></span></td>
            <td><span><?php echo ($nongli[2]); ?></span></td>
            <td><span class="l4"></span></td>
          </tr>
          <tr>
            <td><label><strong>生辰八字</strong></label></td>
            <td><span><?php echo ($bazi[0]); ?></span></td>
            <td><span><?php echo ($bazi[1]); ?></span></td>
            <td><span><?php echo ($bazi[2]); ?></span></td>
            <td><span><?php echo ($bazi[3]); ?></span></td>
          </tr>
          <tr>
            <td><label><strong>纳音五行</strong></label></td>
            <td><span><?php echo ($nayin[0]); ?></span></td>
            <td><span><?php echo ($nayin[1]); ?></span></td>
            <td><span><?php echo ($nayin[2]); ?></span></td>
            <td><span><?php echo ($nayin[3]); ?></span></td>
          </tr>
          <tr>
            <td><label><strong>八字五行个数</strong></label></td>
            <td colspan="4"><span><?php echo ($bzwxgs); ?></span></td>
          </tr>
          <tr>
            <td><label><strong>五气成分指数</strong></label></td>
            <td colspan="4"><span><?php echo ($wqcfzs); ?></span></td>
          </tr>
		  <?php if(is_array($qr)): $i = 0; $__LIST__ = $qr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$q): $mod = ($i % 2 );++$i;?><tr>
            <td><span class="STYLE1">
              <label><?php echo ($q[0]); ?></label>
            </span></td>
            <td><span><?php echo ($q[1]); ?> %</span></td>
            <td colspan="3" align="left"><span><?php echo ($q[2]); ?></span></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>

          <tr>
            <td><label><strong>强弱总比值</strong></label></td>
            <td><span><?php echo round($zh,2) ?> %</span></td>
            <td colspan="3" align="left"><span><?php echo ($qrzh); ?></span></td>
          </tr>
          <tr>
            <td width="25%"><label><strong>喜用分析</strong></label></td>
            <td colspan="4" rowspan="8" style="background:url('/Public/Home/images/pay_01.png') repeat-y top center;position:relative;" align="center">
			<a class="payBtn" href="javascript:;" > <i></i> <span style="color:#fff; background-size:auto;">立即解锁美名</span> </a></td>
          </tr>
          <tr>
            <td><label><strong>格局分析</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>适合事业</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>天乙贵人</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>文昌位</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>吉祥色彩</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>吉祥数字</strong></label></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td><label><strong>吉祥方位</strong></label></td>
            <td colspan="4"></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="bottom-wrap"></div></a>
  </div>

  <!-- 方案 -->
  
  <div class="index-section case-wrap index-section1">
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <span><font><?php echo ($info['name']); ?></font>·姓名方案一</span> </div>
      </div>
      <div class="section">
        <div class="content-wrap">
          <ul>
            <li>
              <label>名字吉祥度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生辰八字五行吉祥度打分</div>
            </li>
            <li>
              <label>内涵流行度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于好听，好写，内涵，流行度打分</div>
            </li>
            <li>
              <label>生肖开运度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生肖宜忌开运助运打分</div>
            </li>
            <li>
              <label>三才五格分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字三才五格和理吉凶打分</div>
            </li>
            <li class="first">
              <label>财运卦象分：</label>
              <div class="progress-wrap">
                <div style="width:100%;"></div>
              </div>
              <div class="fraction">100分</div>
              <div class="text">基于名字财运事业卦象易数打分</div>
            </li>
          </ul>
          <div class="right"> <span>财运极佳</span> </div>
        </div>
        <div class="unlock-wrap">
          <div class="text">精准取名结果</div>
          <div class="img-box"> <a class="unlock" href="javascript:;"> <i></i> <span>立即解锁美名</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="index-section case-wrap index-section1">
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <span><font><?php echo ($info['name']); ?></font>·姓名方案二</span> </div>
      </div>
      <div class="section">
        <div class="content-wrap">
          <ul>
            <li  class="first">
              <label>名字吉祥度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生辰八字五行吉祥度打分</div>
            </li>
            <li>
              <label>内涵流行度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于好听，好写，内涵，流行度打分</div>
            </li>
            <li>
              <label>生肖开运度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生肖宜忌开运助运打分</div>
            </li>
            <li>
              <label>三才五格分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字三才五格和理吉凶打分</div>
            </li>
            <li>
              <label>财运卦象分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字财运事业卦象易数打分</div>
            </li>
          </ul>
          <div class="right"> <span>吉祥极佳</span> </div>
        </div>
        <div class="unlock-wrap">
          <div class="text">精准取名结果</div>
          <div class="img-box"> <a class="unlock" href="javascript:;"> <i></i> <span>立即解锁美名</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="index-section case-wrap index-section1">
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <span><font><?php echo ($info['name']); ?></font>·姓名方案三</span> </div>
      </div>
      <div class="section">
        <div class="content-wrap">
          <ul>
            <li>
              <label>名字吉祥度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生辰八字五行吉祥度打分</div>
            </li>
            <li  class="first">
              <label>内涵流行度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于好听，好写，内涵，流行度打分</div>
            </li>
            <li>
              <label>生肖开运度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生肖宜忌开运助运打分</div>
            </li>
            <li>
              <label>三才五格分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字三才五格和理吉凶打分</div>
            </li>
            <li>
              <label>财运卦象分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字财运事业卦象易数打分</div>
            </li>
          </ul>
          <div class="right"> <span>内涵极佳</span> </div>
        </div>
        <div class="unlock-wrap">
          <div class="text">精准取名结果</div>
          <div class="img-box"> <a class="unlock" href="javascript:;"> <i></i> <span>立即解锁美名</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="index-section case-wrap index-section1">
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <span><font><?php echo ($info['name']); ?></font>·姓名方案四</span> </div>
      </div>
      <div class="section">
        <div class="content-wrap">
          <ul>
            <li>
              <label>名字吉祥度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生辰八字五行吉祥度打分</div>
            </li>
            <li>
              <label>内涵流行度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于好听，好写，内涵，流行度打分</div>
            </li>
            <li  class="first">
              <label>生肖开运度：</label>
              <div class="progress-wrap">
                <div style="width:98%;"></div>
              </div>
              <div class="fraction">98分</div>
              <div class="text">基于名字与生肖宜忌开运助运打分</div>
            </li>
            <li>
              <label>三才五格分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字三才五格和理吉凶打分</div>
            </li>
            <li>
              <label>财运卦象分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字财运事业卦象易数打分</div>
            </li>
          </ul>
          <div class="right"> <span>开运极佳</span> </div>
        </div>
        <div class="unlock-wrap">
          <div class="text">精准取名结果</div>
          <div class="img-box"> <a class="unlock" href="javascript:;"> <i></i> <span>立即解锁美名</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="index-section case-wrap index-section1">
    <div class="min-width">
      <div class="top tp">
        <div class="top-title"> <span><font><?php echo ($info['name']); ?></font>·姓名方案五</span> </div>
      </div>
      <div class="section">
        <div class="content-wrap">
          <ul>
            <li>
              <label>名字吉祥度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生辰八字五行吉祥度打分</div>
            </li>
            <li>
              <label>内涵流行度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于好听，好写，内涵，流行度打分</div>
            </li>
            <li>
              <label>生肖开运度：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字与生肖宜忌开运助运打分</div>
            </li>
            <li class="first">
              <label>三才五格分：</label>
              <div class="progress-wrap">
                <div style="width:98%;"></div>
              </div>
              <div class="fraction">98分</div>
              <div class="text">基于名字三才五格和理吉凶打分</div>
            </li>
            <li>
              <label>财运卦象分：</label>
              <div class="progress-wrap">
                <div style="width:99%;"></div>
              </div>
              <div class="fraction">99分</div>
              <div class="text">基于名字财运事业卦象易数打分</div>
            </li>
          </ul>
          <div class="right"> <span>三才极佳</span> </div>
        </div>
        <div class="unlock-wrap">
          <div class="text">精准取名结果</div>
          <div class="img-box"> <a class="unlock" href="javascript:;"> <i></i> <span>立即解锁美名</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 方案结束 --> 
  


    <div style="display:none"> <script src="/Public/Home/js/z_stat.js" language="JavaScript"></script> </div>
    <div id="footer">
      <div class="min-width">
        <p> <?php echo C('webpccopy');?> </p>
      </div>
    </div>
    <script type="text/javascript" src="/Public/Home/js/my.js"></script>

  </body>
</html>