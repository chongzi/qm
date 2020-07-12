<?php if (!defined('THINK_PATH')) exit();?><script>

    var orderno = '<?php echo $result['order_no'];?>'

    var webUrl = '<?php echo C('weburl');?>';

    function onBridgeReady(){
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest', {
                "appId":'<?php echo $result['appid'];?>',     //公众号名称，由商户传入
                "timeStamp":'<?php echo $result['time'];?>',         //时间戳，自1970年以来的秒数
                "nonceStr":"test", //随机串
                "package":"prepay_id=<?php echo $result['prepay_id'];?>",
                "signType":"MD5",//微信签名方式：
                "paySign":'<?php echo $result['paySign'];?>'//微信签名
            },
            function(res){
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    console.log(res)
                    // 使用以上方式判断前端返回,微信团队郑重提示：
                    //res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
                     window.location.href = webUrl+"order/mlist?orderno="+orderno
                }
            });
    }
    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }
    }else{
        onBridgeReady();
    }
</script>