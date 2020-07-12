<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends BaseController {

    //下订单
    public function add()
    {
        $name = I('name'); //姓
        $cszt = I('cszt'); //姓
        $gender = I('gender', 0, 'intval'); //性别 0女 1男  -1未知
        //$birthday = I('birthday'); //生日阳历
        $birthtime = I('birthtime'); //出生时
        $birthmin = I('birthmin'); //出生分
        $phone = I('phone'); //参数一
        $ver = I('ver'); //参数二
        $data=I('');
        //dump($data);die;
         $birthday = $data['birthday'].'-'.$data['birthm'].'-'.$data['birthd'];

        if(empty($name)){
            $this->error('请填写姓名', U('index/index'));
        }
        if(empty($birthday)){
            $this->error('请选择生日', U('index/index'));
        }
		if( $cszt == 0){
			$birthtime = 0;
			$birthmin = 0;
		}
        if($birthtime===''){
            $this->error('请选择出生时', U('index/index'));
        }
        if($birthmin===''){
            $this->error('请选择出生分', U('index/index'));
        }
       if(empty($phone)){
            $this->error('参数错误', U('index/index'));
        }
        $orderext = M('order')->where("phone = '%s'", array($phone))->field('order_no,price,oldprice')->find(); //查找是否存在该订单
        if(empty($orderext)){

            $orderNo = getorderno(); //订单号
            $price = config_lists('price'); //价格
            $oldprice = config_lists('old_price'); //原价格
            $arr = array(
                'order_no' => $orderNo,
                'name' => $name,
                'gender' => $gender,
                'birthday' => $birthday,
                'birthtime' => $birthtime,
                'birthmin' => $birthmin,
                'phone' => $phone,
                'ver' => $ver,
                'state' => 0,
                'price' => $price,
                'zibei' => I("zibei"),
                'mobile' => I("mobile"),
                'email' => I("email"),
                'oldprice' => $oldprice,
                'createtime' => time(),
				'datatype'=>(int)$_REQUEST['b_input']
            );
            $res = M('order')->add($arr); //新增订单
        }else{
            $orderNo = $orderext['order_no']; //订单号
            $price = $orderext['price']; //价格
            $oldprice = $orderext['oldprice']; //原价格
        }


        $birthdayarr = explode('-', $birthday);
		$xingbie = "";
		if($gender == -1){
			$xingbie = '未知';
		}else if($gender == 1){
			$xingbie = '男';
		}else if($gender == 0){
			$xingbie = '女';
		}

        $info = array(
            'name' => $name,
            'gender' => $xingbie,
            'birthdayy' =>$birthdayarr[0],
            'birthdaym' =>$birthdayarr[1],
            'birthdayd' =>$birthdayarr[2],
            'birthdayh' =>$birthtime,
            'birthdayi' =>$birthmin,
            'orderNo' =>$orderNo,
            'price' =>$price,
            'oldprice' =>$oldprice,
        );


        require getcwd()."/asp.php";
        require getcwd()."/ys.php";
        require getcwd()."/cy.php";
        $fit  = array(
            array("金"=>"比劫（金）","木"=>"官杀（金）","水"=>"印星（金）","火"=>"财星（金）","土"=>"食伤（金）"),
            array("金"=>"财星（木）","木"=>"比劫（木）","水"=>"食伤（木）","火"=>"印星（木）","土"=>"官杀（木）"),
            array("金"=>"食伤（水）","木"=>"印星（水）","水"=>"比劫（水）","火"=>"官杀（水）","土"=>"财星（水）"),
            array("金"=>"官杀（火）","木"=>"食伤（火）","水"=>"财星（火）","火"=>"比劫（火）","土"=>"印星（火）"),
            array("金"=>"印星（土）","木"=>"财星（土）","水"=>"官杀（土）","火"=>"食伤（土）","土"=>"比劫（土）"),
        );
        $fact = tgdzwh($tg[$dtg]);
        $pic = array("j","m","s","h","t");
        foreach($fit as $k=>$v){
            $tname = $v[$fact];
            $bl = "w".($k+1);
            $percent = round($$bl,2);
            $img = "<img src=\"/images/".$pic[$k]."1.gif\">";
            for($j=1;$j<=$$bl;$j++){
                $img .="<img src=\"/images/".$pic[$k]."1.gif\">";
            }
            $qr[] = array($tname,$percent,$img);
        }
        $bzwxgs = "金".$wnum1."个，木".$wnum2."个，水".$wnum3."个，火".$wnum4."个，土".$wnum5."个";
        $wqcfzs = "金".$ywq1."，  木".$ywq2."，  水".$ywq3."，  火".$ywq4."，  土".$ywq5;
        $qrzh = "";

        for($z=-100;$z<$zh;$z++){
            $qrzh.= "<img src=/images/x.gif width=2 height=11>";
        }
        for($z=100;$z<$zh;$z++){
            $qrzh.= "<img src=/images/z.gif width=2 height=11>";
        }

        if($zh>1 and $zh<=15){
            $ygod = "日主中和偏<strong>旺</strong>，宜取食伤财星为用，官杀次之，印比为忌。";
        }
        elseif($zh>16){
            $ygod .= "日主<strong>旺</strong>，宜取官杀克泄，食伤财星次之，印比为忌。";
        }elseif($zh<1 and $zh>-10){
            $ygod .= "日主中和偏<strong>弱</strong>，宜取印缓比劫生扶，食伤财星次之，官杀为忌。";
        }
        else
        {
            $ygod .= "日主<strong>弱</strong>，宜取印缓比劫生扶，食伤次之，财星官杀为忌。";
        }
        $ygod ="命局用神首选<b>".$ys."</b>，<b>".$ys."</b>为人生有利的五行，名字宜用<b>".$ys."</b>属性的字，会比较有利健康、学业、事业、财运、婚姻，旺益家庭。岁运逢<b>".$ys."</b>旺的运程会比较顺利，主中晚年家庭和睦，事业能有所成，财源广进，名利双收，富贵可求。";
        $ylys = "家居装饰以及穿着方面可选择对八字有利的颜色以及材质".$jxs;
        $gmfg = $szyc.$szwc.$ctc.$cyc.$swcw.$cdsr.$scyw.$cqtmh.$cgsm.$ystg.$sedb.$kg;


		require getcwd()."/lunar.php";
		$lunar = new \Lunar();
		if($_REQUEST['b_input']==1){
			$exc = $lunar->convertLunarToSolar($birthdayarr[0],$birthdayarr[1],$birthdayarr[2]);
            $info['birthdayy'] = $exc[0];
            $info['birthdaym'] = $exc[1];
            $info['birthdayd'] = $exc[2];
		}
		$nongli = $lunar->convertSolarToLunar($info['birthdayy'],$info['birthdaym'],$info['birthdayd']);

        $this->assign('nongli', $nongli);
        $this->assign("rsgr",getRsgr($tg[$dtg]));
        $this->assign("wcw",getWcw($tg[$dtg]));
        $this->assign('ygod',$ygod);
        $this->assign('ylys',$ylys);
        $this->assign('gmfg',$gmfg);
        $this->assign('location',$location);
        $this->assign('lucknum',$lucknum);
        $this->assign('jxs',$jxs);
        $this->assign('hy',$hy);

        $this->assign('nongli', $nongli);
        $this->assign('qrzh', $qrzh);
        $this->assign('qr', $qr);
        $this->assign('zh', $zh);
        $this->assign('bzwxgs', $bzwxgs);
        $this->assign('wqcfzs', $wqcfzs);
        $this->assign('wuxing', $wuxing);
        $this->assign('bazi', $bazi);
        $this->assign('nayin', $nayin);
        $this->assign('info', $info);
    	$this->display();
    }

    //订单详情[从订单详情进入]
    public function readx()
    {
        $num = I('orderno'); //订单编号
        $info = getorderbyno($num); //订单详情
        if($info['state'] == 0){
            $info['statestr'] = '订单状态确认中...';
        }else if($info['state'] == 1){
            $info['statestr'] = '订单状态已支付...';
        }else{
            $info['statestr'] = '订单状态未知...';
        }

        $this->assign('info', $info);
        $this->display();
    }

    //订单详情[从订单列表进入]
    public function reado()
    {
        $num = I('orderno'); //订单编号
        $info = getorderbyno($num); //订单详情
        if($info['state'] == 0){
            $info['statestr'] = '您查询的订单还未被支付';
        }else if($info['state'] == 1){
            $info['statestr'] = '您查询的订单已被支付';
        }else{
            $info['statestr'] = '您查询的订单未知';
        }
        $ymd = explode("-",$info['birthday']);
        $this->assign('ymd', $ymd);
        $this->assign('info', $info);
        $this->display();
    }


    //订单详情[从订单列表进入]
    public function check()
    {
        $num = I('orderno'); //订单编号
        $info = getorderbyno($num); //订单详情
        if(empty($info)){
            echo "fail";
        }
        else
        {
            echo "ok";
        }
    }

    //美名列表
    public function mlist()
    {
        $orderno = I('orderno'); //订单号

        if(!empty($orderno)){
            $info =M('order')->where("order_no = '%s'", array($orderno))
                             ->field("name,gender,birthday,birthtime,birthmin,phone,ver,state,datatype")
                             ->find();
        }
        if($info['state'] !=1){
            $this->redirect('order/add', array('name'=>$info['name'], 'gender'=>$info['gender'],'birthday'=>$info['birthday'], 'birthtime'=>$info['birthtime'], 'birthmin'=>$info['birthmin'], 'xing'=>$info['name'],'phone'=>$info['phone'], 'ver'=>$info['ver']));
        }

		$tempxb = 0;
		if($info['gender'] == -1){
			$tempxb = 1;
		}else if($info['gender'] == 1){
			$tempxb = 1;
		}if($info['gender'] == 0){
			$tempxb = 0;
		}

        $fullnamearr = getlist($info['name'],$tempxb); //获取名字列表

        $name = $info['name'];
		$info['birthday2'] = explode("-",$info['birthday']);
		$_REQUEST["birthday"] = $info['birthday2'][0];
		$_REQUEST["birthm"]= $info['birthday2'][1];
		$_REQUEST["birthd"]= $info['birthday2'][2];
		$_REQUEST["birthtime"]= $info['birthtime'];
		$_REQUEST["birthmin"]= $info['birthmin'];
		$_REQUEST['gender'] = $info['gender'];
		//$quanpai=$_REQUEST["quanpai"];
		$_REQUEST['b_input'] = $info['datatype'];
		$xingbie = "";
		if($info['gender'] == -1){
			$xingbie = '未知';
		}else if($info['gender'] == 1){
			$xingbie = '男';
		}else if($info['gender'] == 0){
			$xingbie = '女';
		}


		$info['gender'] = $xingbie;

		require getcwd()."/asp.php";
		require getcwd()."/ys.php";
		require getcwd()."/cy.php";
		$fit  = array(
			array("金"=>"比劫（金）","木"=>"官杀（金）","水"=>"印星（金）","火"=>"财星（金）","土"=>"食伤（金）"),
			array("金"=>"财星（木）","木"=>"比劫（木）","水"=>"食伤（木）","火"=>"印星（木）","土"=>"官杀（木）"),
			array("金"=>"食伤（水）","木"=>"印星（水）","水"=>"比劫（水）","火"=>"官杀（水）","土"=>"财星（水）"),
			array("金"=>"官杀（火）","木"=>"食伤（火）","水"=>"财星（火）","火"=>"比劫（火）","土"=>"印星（火）"),
			array("金"=>"印星（土）","木"=>"财星（土）","水"=>"官杀（土）","火"=>"食伤（土）","土"=>"比劫（土）"),
		);
		$fact = tgdzwh($tg[$dtg]);
		$pic = array("j","m","s","h","t");
		foreach($fit as $k=>$v){
			$tname = $v[$fact];
			$bl = "w".($k+1);
			$percent = round($$bl,2);
			$img = "<img src=\"/images/".$pic[$k]."1.gif\">";
			for($j=1;$j<=$$bl;$j++){
				$img .="<img src=\"/images/".$pic[$k]."1.gif\">";
			}
			$qr[] = array($tname,$percent,$img);
		}
		$bzwxgs = "金".$wnum1."个，木".$wnum2."个，水".$wnum3."个，火".$wnum4."个，土".$wnum5."个";
		$wqcfzs = "金".$ywq1."，  木".$ywq2."，  水".$ywq3."，  火".$ywq4."，  土".$ywq5;
		$qrzh = "";

		for($z=-100;$z<$zh;$z++){
			$qrzh.= "<img src=/images/x.gif width=2 height=11>";
		}
		for($z=100;$z<$zh;$z++){
			$qrzh.= "<img src=/images/z.gif width=2 height=11>";
		}

		if($zh>1 and $zh<=15){
			$ygod = "日主中和偏<strong>旺</strong>，宜取食伤财星为用，官杀次之，印比为忌。";
		}
		elseif($zh>16){
			$ygod .= "日主<strong>旺</strong>，宜取官杀克泄，食伤财星次之，印比为忌。";
		}elseif($zh<1 and $zh>-10){
			$ygod .= "日主中和偏<strong>弱</strong>，宜取印缓比劫生扶，食伤财星次之，官杀为忌。";
		}
		else
		{
			$ygod .= "日主<strong>弱</strong>，宜取印缓比劫生扶，食伤次之，财星官杀为忌。";
		}
		$ygod ="命局用神首选<b>".$ys."</b>，<b>".$ys."</b>为人生有利的五行，名字宜用<b>".$ys."</b>属性的字，会比较有利健康、学业、事业、财运、婚姻，旺益家庭。岁运逢<b>".$ys."</b>旺的运程会比较顺利，主中晚年家庭和睦，事业能有所成，财源广进，名利双收，富贵可求。";
		$ylys = "家居装饰以及穿着方面可选择对八字有利的颜色以及材质".$jxs;
		$gmfg = $szyc.$szwc.$ctc.$cyc.$swcw.$cdsr.$scyw.$cqtmh.$cgsm.$ystg.$sedb.$kg;


		require getcwd()."/lunar.php";
		$lunar = new \Lunar();
		if($_REQUEST['b_input']==1){
			$exc = $lunar->convertLunarToSolar($info['birthday2'][0],$info['birthday2'][1],$info['birthday2'][2]);
            $info['birthday2'][0] = $exc[0];
            $info['birthday2'][1] = $exc[1];
            $info['birthday2'][2] = $exc[2];
		}
		$nongli = $lunar->convertSolarToLunar($info['birthday2'][0],$info['birthday2'][1],$info['birthday2'][2]);
        $this->assign('nongli', $nongli);
		$this->assign("rsgr",getRsgr($tg[$dtg]));
		$this->assign("wcw",getWcw($tg[$dtg]));
        $this->assign('qrzh', $qrzh);
        $this->assign('qr', $qr);
        $this->assign('zh', $zh);
        $this->assign('bzwxgs', $bzwxgs);
        $this->assign('wqcfzs', $wqcfzs);
        $this->assign('wuxing', $wuxing);
        $this->assign('bazi', $bazi);
        $this->assign('info', $info);
        $this->assign('nayin', $nayin);
        $this->assign('ygod',$ygod);
        $this->assign('ylys',$ylys);
        $this->assign('gmfg',$gmfg);
        $this->assign('location',$location);
        $this->assign('lucknum',$lucknum);
        $this->assign('jxs',$jxs);
        $this->assign('hy',$hy);
        $this->assign('fullname',$fullnamearr);
        $this->assign('name',$name);
		$this->assign('orderno', $orderno);
    	$this->display();
    }

    //ajax获取名字列表
    public function getmlist()
    {
        $orderno = I('orderno'); //订单号
        $page = I('page', 1, 'intval');
        $gender = I('gender', 1, 'intval');
        if(!empty($orderno)){
            $info =M('order')->where("order_no = '%s'", array($orderno))
                             ->field("name,gender,birthday,birthtime,birthmin,phone,ver,state")
                             ->find();
        }
        if($info['state'] ==1){
            $fullnamearr = getlist($info['name'],$info['gender'], $page); //获取名字列表
            if(!empty($fullnamearr)){
                $fullnamearr[0]['xing'] =  $info['name'];
            }
            echo json_encode($fullnamearr);
            die();
        }
        echo json_encode(array());
        die();

    }

    //美名详情
    public function minfo()
    {
        $xing = !empty($_GET['xing'])?$_GET['xing']:'';
        $ming = !empty($_GET['ming'])?$_GET['ming']:'';
		$score = !empty($_GET['score'])?intval($_GET['score']):0;
		if(empty($xing) || empty($ming)){
            $this->error("姓名详细解说未收录", U('index/index'));
		}
		//$xing = iconv('GBK', 'UTF-8', $xing);
		//$ming = iconv('GBK', 'UTF-8', $ming);

        if(!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$xing.$ming)){
            $this->error("姓名详细解说未收录", U('index/index'));
        }

        $name = mbStrSplit($xing.$ming);
        $namecount = count($name);
        if($namecount <2 || $namecount >4){
            $this->error("姓名详细解说未收录", U('index/index'));
        }

        Vendor('NameSolution.NameSolution');

        $info=new \NameSolution($name);
        $info = (array)$info;
        if($score >=90 && $score <=100){
            $info['score'] =  $score;
            $info['scoreDesc'] = '你的名字取得非常棒，若名字五行与八字喜用一致，会对您的运势有积极的促进！';
        }

        $this->assign('info',$info);
        $this->assign('name',$name);
        $this->assign('xing',$xing);
        $this->assign('ming',$ming);

    	$this->display();
    }

    //历史订单
    public function pchistory()
	{

	    $this->display();
	}

    //返回订单状态
    public function orderstate()
    {
        $orderno = I('orderno');
        $info = getorderbyno($orderno);
        echo json_encode(['code'=>$info['state']]);

    }
    public function weixin()
    {
         $this->display('Index_weixin');
    }




}