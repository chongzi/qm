<?php
//error_reporting(0);
ini_set("display_errors","On");
function nayin($gz){
	$contents = file_get_contents(getcwd()."/txt/nayin.txt");
	$contents = iconv("gbk","utf-8",$contents);
	$arr = explode("\r\n",$contents);
	foreach($arr as $ar){
		//echo $gz."|".$ar."<br>";
		if(strstr($ar,$gz)){
			return mb_substr($ar,16);
		}
	}
}

function getRsgr($tgdz){
	switch ($tgdz){
		case "甲":
		  $wh="贵人生肖：牛、羊（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "戊":
		  $wh="贵人生肖：牛、羊（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "庚":
		  $wh="贵人生肖：牛、羊（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "乙":
		  $wh="贵人生肖：鼠、猴（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "己":
		  $wh="贵人生肖：鼠、猴（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "丙":
		  $wh="贵人生肖：猪、鸡（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "丁":
		  $wh="贵人生肖：猪、鸡（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "壬":
		  $wh="贵人生肖：兔、蛇（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "癸":
		  $wh="贵人生肖：兔、蛇（身上佩戴有生肖图案的物品，会对您的运势有积极的促进！）";
		  break;
		case "辛":
		  $wh="贵人生肖：马、虎（身上佩戴有生肖图案的玉佩，会对您的运势有积极的促进！）";
		  break;
	}
	return $wh;
}

function getWcw($tgdz){
	switch ($tgdz){
		case "甲":
		  $wh="东南方 （摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "乙":
		  $wh="南方 （摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "丙":
		  $wh="西南方（摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "丁":
		  $wh="西方 （摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "戊":
		  $wh="西南方 （摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "己":
		  $wh="西方（摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "庚":
		  $wh="西北方（摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "辛":
		  $wh="北方 （摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "壬":
		  $wh="东北方（摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
		case "癸":
		  $wh="东方（摆放文昌塔或身上佩戴文昌塔配饰，会对学业运势有积极的促进！）";
		  break;
	}
	return $wh;
}

function ytgdzwh($tgdz){
	switch ($tgdz){
		case "子":
		  $wh="水\"水\"水";
		  break;
		case "亥":
		  $wh="水\"水\"水\"木";
		  break;
		case "寅":
		  $wh="木\"木\"木\"火\"土";
		  break;
		case "卯":
		  $wh="木\"木\"木";
		  break;
		case "巳":
		  $wh="火\"火\"火\"金\"土";
		  break;
		case "午":
		  $wh="火\"火\"火\"土";
		  break;
		case "申":
		  $wh="金\"金\"金\"水\"土";
		  break;
		case "酉":
		  $wh="金\"金\"金";
		  break;
		case "辰":
		  $wh="木\"土\"土\"土\"水";
		  break;
		case "戌":
		  $wh="金\"火\"土\"土\"土";
		  break;
		case "丑":
		  $wh="土\"土\"水\"\"金土";
		  break;
		case "未":
		  $wh="土\"土\"木\"火\"土";
		  break;
		case "甲":
		  $wh="木";
		  break;
		case "乙":
		  $wh="木";
		  break;
		case "丙":
		  $wh="火";
		  break;
		case "丁":
		  $wh="火";
		  break;
		case "戊":
		  $wh="土";
		  break;
		case "己":
		  $wh="土";
		  break;
		case "庚":
		  $wh="金";
		case "辛":
		  $wh="金";
		  break;
		case "壬":
		  $wh="水";
		  break;
		case "癸":
		  $wh="水";
		  break;
	}
	return $wh;
}

function tgdzwh($tgdz){
	switch($tgdz){
	  case "子":
	  	$wh="水";
		break;
	  case "亥":
	  	$wh="水木";
		break;
	  case "寅":
	  	$wh="木\"火\"土";
		break;
	  case "卯":
	  	$wh="木";
		break;
	  case "巳":
	  	$wh="火\"金\"土";
		break;
	  case "午":
	  	$wh="火土";
		break;
	  case "申":
	  	$wh="金\"水\"土";
		break;
	  case "酉":
	  	$wh="金";
		break;
	  case "辰":
	  	$wh="木\"土\"水";
		break;
	  case "戌":
	  	$wh="金\"火\"土";
		break;
	  case "丑":
	  	$wh="土\"水\"金";
		break;
	  case "未":
	  	$wh="土\"木\"火";
		break;
	  case "甲":
	  	$wh="木";
		break;
	  case "乙":
	  	$wh="木";
		break;
	  case "丙":
	  	$wh="火";
		break;
	  case "丁":
		$wh="火";
		break;
	  case "戊":
	  	$wh="土";
		break;
	  case "己":
	  	$wh="土";
		break;
	  case "庚":
	  	$wh="金";
		break;
	  case "辛":
	  	$wh="金";
		break;
	  case "壬":
	  	$wh="水";
		break;
	  case "癸":
	  	$wh="水";
		break;
	}
	return $wh;
}

function sshen($tgans,$ritgs){
	$content = file_get_contents(getcwd()."/txt/shishen.txt");
	$tgx=$tgans;
	$tgy=$ritgs;
	$Youb=$tgy*10*3+$tgx*3;
	//ssf.skip(Youb)
	//$str=ssf.read(3);
	return "<font color=663300>".(trim($str))."</font>";
}

function wuxing($sel){
	$arr = array(
		"甲"=>"木",
		"乙"=>"木",
		"丙"=>"火",
		"丁"=>"火",
		"戊"=>"土",
		"己"=>"土",
		"庚"=>"金",
		"辛"=>"金",
		"壬"=>"水",
		"癸"=>"水",
		"子"=>"水",
		"丑"=>"土",
		"寅"=>"木",
		"卯"=>"木",
		"辰"=>"土",
		"巳"=>"火",
		"午"=>"火",
		"未"=>"土",
		"申"=>"金",
		"酉"=>"金",
		"戌"=>"土",
		"亥"=>"水"
	);
	return $arr[$sel];
}

function datediff($start,$end){
	$date1=date_create($start);
	$date2=date_create($end);
	$diff=date_diff($date1,$date2);
	return $diff->format("%R%a");
}

function yzhy($riqi){
	$arr = explode("-",$riqi);
	$Skipls=((int)$arr[0]-1921)*360;
	$contents = file_get_contents(getcwd()."/txt/yinyang1.0.txt");
	$ra = explode("\r\n",$contents);
	$total = count($ra);
	for($i=($Skipls-1);$i<count($ra);$i++){
	  $rqStr=str_replace("--","-",$ra[$i]);
	  $fqArr=explode("*",$rqStr);
	  if($fqArr[0]==$riqi){
		break;
	  }
	}
  	return trim($fqArr[1]);
}


$jd1=$_REQUEST["jd1"] ? $_REQUEST['jd1'] : 120;
$jd2=$_REQUEST["jd2"] ? $_REQUEST['jd1'] : 0;
$yea=$_REQUEST["birthday"];
$mon=$_REQUEST["birthm"];
$dat= $_REQUEST["birthd"];
$hou=$_REQUEST["birthtime"];
$minut=$_REQUEST["birthmin"];
$sex=$_REQUEST['gender'];
//$quanpai=$_REQUEST["quanpai"];
$datetype=$_REQUEST['b_input'];
if ($datetype==1){
	$yangli=yzhy($yea."-".$mon."-".$dat);
	$tmp = explode("-",$yangli);
	$yea = $tmp[0];
	$mon = $tmp[1];
	$dat = $tmp[2];
}


$borntime=$yea."年".$mon."月".$dat."日".$hou."时".$minut."分";
$subtime=($jd1-120+$jd2/60)*4;
$subhour=intval($subtime/60);
$subminute=$subtime%60;
$subdate=$subhour*60+$subminute;
$dates=$yea."-".$mon."-".$dat." ".$hou.":".$minut.":00";
$dates0=$dates;

$timestamp = strtotime($dates)+($subdate*60);
$dates = date("Y-m-d H:i:s",$timestamp);

$yeas=date("Y",$timestamp);
$mons=(int)date("m",$timestamp);
$dats=(int)date("d",$timestamp);
$hous=(int)date("H",$timestamp);
$minutes=(int)date("i",$timestamp);
$Ptime=$dates;


$zdate=$mons.$dats;
$txt = file_get_contents(getcwd()."/txt/stime.txt");
$txtArr = explode("\r\n",$txt);
foreach($txtArr as $str){
	$b=explode(":",$str);
	if(count($b)>0){
		$comdate=$b[0].$b[1];
		if($comdate==$zdate){
			break;
		}
	}
	else
	{
		break;
	}
}
$truesubminute=(int)$b[2];
$trusubsecond=(int)$b[3];
if($truesubminute<0){
	$truesubt=$truesubminute*60-$truesubsecond;
}
else
{
	$truesubt=$truesubminute*60+$truesubsecond;
}
$timestamp = strtotime($dates)+$truesubt;
$Truedate = date("Y-m-d H:i:s",$timestamp);

$yea=date("Y",$timestamp);
$mon=date("m",$timestamp);
$dat=date("d",$timestamp);
$hou=date("H",$timestamp);
$minut=date("i",$timestamp);
if($hou==23){
	$timestamp = strtotime($Truedate)+86400;
	$tdate = date("Y-m-d H:i:s",$timestamp);
	//$tdate=dateadd("d",1,truedate);
	$yea=date("Y",$timestamp);
	$mon=(int)date("m",$timestamp);
	$dat=(int)date("d",$timestamp);
	$hou=(int)date("H",$timestamp);
	$minut=(int)date("i",$timestamp);
}

if($taiyang=="0"){
	$Ptime=$dates0;
	$Truedate=$dates0;
	$taiyangmess="没有考虑";
}
else
{
	$taiyangmess=$jd1."度".$jd2."分";
}


$txt = file_get_contents(getcwd()."/txt/jq.txt");
$txtArr = explode("\r\n",$txt);
$yuetag=false;
$tag=true;
$ny=$yea."-02";
$riqi=$ny."-".$dat;
if($mon==2){
	foreach($txtArr as $str){
		//echo substr($str,0,7)."|".$ny."<br>";
		$strs=substr($str,0,7);
		if($strs==$ny){
			break;
		}
	}
	$str=substr($str,0,15);
	$str=$str.":01";
	$timestamp = strtotime($str);
	$strd=intval(date("d",$timestamp));
	$strh=intval(date("H",$timestamp));
	$strm=intval(date("m",$timestamp));
	$dat=intval($dat);
	$hou=intval($hou);
	$minut=intval($minut);
	
	if($strd<$dat){
	   $gzyear=$yea;
	}
	if($strd>$dat){
	   $gzyear=$yea-1;
	   $yuetag=true;
	}
	if($strd==$dat){
	   if($strh<$hou){
		   $gzyear=$yea;
	   }
	   if($strh>$hou){
		   $gzyear=$yea-1;
		   $yuetag=true;
	   }
	   if($strh==$hou){
		   if($strm<$minut){
			   $gzyear=$yea;
		   }
		   if($strm>=$minut){
			   $gzyear=$yea-1;
			   $yuetag=true;
		   } 
	   } 
	}
}
else
{
	if($mon==1){
		 $gzyear=$yea-1;
		 $yuetag=true;
	}else{
		$gzyear=$yea;
	}
}

if($mon<=9 && strlen($mon)==1){
	$mon="0".$mon;
}
if($dat<=9 && strlen($dat)==1){
	$dat="0".$dat;
}

if ($minut<=9 && strlen($dat)==1){
	$minut="0".$minut;
}

if ($hou<=9 && strlen($hou)==1){
	$hou="0".$hou;
}

$ystr=$yea."-".$mon."-".$dat." ".$hou.":".$minut;
foreach($txtArr as $str){
	if($str>$ystr){
		break;
	}
}

$timestamp = strtotime($str);
$gzmonth = date("m",$timestamp)-1;
if($gzmonth==0){
	$gzmonth=12;
}

$ddate=$yea."-".$mon."-".$dat;
$gzdate=datediff("1900-2-20",$ddate);

$tg = array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
$dz = array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
$dc = array("癸","癸辛己","甲丙戊","乙","乙戊癸","庚丙戊","己丁","乙己丁","戊庚壬","辛","辛丁戊","壬甲");

$dy=($gzyear-1924)%12;
$dy=($dy+12)%12;
$ty=($gzyear-1924)%10;
$ty=($ty+10)%10;
$ygz=$tg[$ty].$dz[$dy];

$dm=($gzmonth)%12;
if($yuetag==true){
	$gzyear=$gzyear+1;
}
$tm=intval((($gzyear%5)-2)*2-1);
if($tm<0){
	$tm=$tm+10;
}
$minggongx=$tm;

$tm=($tm+$gzmonth+7)%10;
if($dm==1){
//	$tm=1
}
if ($dm==0 and $mon==1){
	$tm=($tm-2+10) % 10;
}

$mgz=$tg[$tm].$dz[$dm];
$dtg=(($gzdate % 10)+10)% 10;
$ddz=(($gzdate % 12)+12)% 12;
$dgz=$tg[$dtg].$dz[$ddz];
//获得干支纪日
if($dtg>4){
	$ttg=($dtg-4)*2-2;
}
else
{
	$ttg=($dtg+1)*2-2;
}

$t=$hou+0.6;
$tdz=round($t/2) % 12;

$ttg=($ttg+$tdz)%10;
$tgz=$tg[$ttg].$dz[$tdz];

$flag=0;
if(($ty % 2)==0){
	$flag=1; //阳年
}
if($sex==1 and $flag==1 or $sex==0 and $flag==0){
	$sx=1;
}
else
{
	$sx=0;
}

foreach($txtArr as $str){
	if(strtotime($str)>strtotime($ystr)){
		break;
	}
	$str2=$str;
}

if($sx){
	$qydate=datediff($ystr,$str);
	$jg = strtotime($str) - strtotime($Truedate);
	$qyjs = intval($jg/60)+60;//时间算法待修正
}
else
{
	$qydate=datediff($ystr,$str2);
	$jg = strtotime($Truedate) - strtotime($str2);
	$qyjs = intval($jg/60);
}
$qyday=abs(intval($qydate/3));
$ppchk="<font style='COLOR: #ffffff; font-size: 1px;'>//by &#104;&#116;&#116;p&#58;&#47;&#47;&#67;idu.&#78;et</font>";

$qyjs=$qyjs/60/24;			//换算单位：天	24.37916667
$qyjs1=intval($qyjs/3)	;	//整天/3=年	8.126388889
$qyjs9=$qyjs-$qyjs1*3;		//余天		0.379166667
$qyjs2=intval($qyjs9*4);		//余天*4=月	1.516666666
$qyjs9=($qyjs9-$qyjs2/4)*24;	//余小时		3.099999998
$qyjs3=intval(qyjs9*5);		//余小时*5=天	15.49999999
$qyjs4=intval(($qyjs9*5-$qyjs3)*24+0.5);	//余小时
if($qyjs1<>0){
  $qysj = " <b>".$qyjs1."</b> 年 <b>".$qyjs2."</b> 个月 <b>".$qyjs3."</b> 天 <b>".$qyjs4."</b> 小时";
}
else
{
  $qysj = " <b>".$qyjs2."</b> 个月 <b>".$qyjs3."</b> 天 <b>".$qyjs4."</b> 小时";
}
#转运时间
$timestamp = strtotime("+".$qyjs1." year",strtotime($Truedate));
$timestamp = strtotime("+".$qyjs2." month",$timestamp);
$timestamp +=$qyjs3*86400;
$timestamp +=$qyjs4*3600;

$zysj = date("Y-m-d H:i:s",$timestamp);
$zysj = " <b>".date("Y",$timestamp)."</b> 年 <b>".date("m",$timestamp)."</b> 月 <b>".date("d",$timestamp)."</b> 日 <b>".date("H",$timestamp)."</b> 时";
//获得起运岁数
$qyday=$qyday+1;
$nayin = array(nayin($ygz),nayin($mgz),nayin($dgz),nayin($tgz));
$wuxing = array(wuxing($dz[$dy]),wuxing($dz[$dm]),wuxing($dz[$ddz]),wuxing($dz[$tdz]));
$bazi = array($tg[$ty].$dz[$dy],$tg[$tm].$dz[$dm],$tg[$dtg]. $dz[$ddz],$tg[$ttg].$dz[$tdz]);

$bzwh=tgdzwh($tg[$ty]).tgdzwh($dz[$dy]).tgdzwh($tg[$tm]).tgdzwh($dz[$dm]).tgdzwh($tg[$dtg]).tgdzwh($dz[$ddz]).tgdzwh($tg[$ttg]).tgdzwh($dz[$tdz]);
$wnum1 = mb_strlen(str_replace("金", str_repeat(" ",mb_strlen("金") + 1,"utf-8"),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum1>=3 and tgdzwh($tg[$dtg])=="金"){
	$ssmainw=$ssmainw."比劫旺";
}
if($wnum1>=3 and tgdzwh($tg[$dtg])=="木"){
	$ssmainw=$ssmainw."官杀旺";
}
if($wnum1>=3 and tgdzwh($tg[$dtg])=="水"){
	$ssmainw=$ssmainw."印星旺";
}
if($wnum1>=3 and tgdzwh($tg[$dtg])=="火"){
	$ssmainw=$ssmainw&"财星旺";
}
if($wnum1>=3 and tgdzwh($tg[$dtg])=="土"){
	$ssmainw=$ssmainw&"食伤旺";
}
$wnum2 = mb_strlen(str_replace("木", str_repeat(" ",mb_strlen("木","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");

if($wnum2>=3 and tgdzwh($tg[$dtg])=="金"){
	$ssmainw=$ssmainw."财星旺";
}
if($wnum2>=3 and tgdzwh($tg[$dtg])=="木"){
	$ssmainw=$ssmainw."比劫旺";
}
if ($wnum2>=3 and tgdzwh($tg[$dtg])=="水"){
	$ssmainw=$ssmainw."食伤旺";
}
if($wnum2>=3 and tgdzwh($tg[$dtg])=="火"){
	$ssmainw=$ssmainw."印星旺";
}
if($wnum2>=3 and tgdzwh($tg[$dtg])=="土"){
	$ssmainw=$ssmainw."官杀旺";
}
$wnum3 = mb_strlen(str_replace("水", str_repeat(" ",mb_strlen("水","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum3>=3 and tgdzwh($tg[$dtg])=="金"){
	$ssmainw=$ssmainw."食伤旺";
}
if($wnum3>=3 and tgdzwh($tg[$dtg])=="木"){
	$ssmainw=$ssmainw."印星旺";
}
if($wnum3>=3 and tgdzwh($tg[$dtg])=="水"){
	$ssmainw=$ssmainw."比劫旺";
}
if($wnum3>=3 and tgdzwh($tg[$dtg])=="火"){
	$ssmainw=$ssmainw."官杀旺";
}
if($wnum3>=3 and tgdzwh($tg[$dtg])=="土"){
	$ssmainw=$ssmainw."财星旺";
}

$wnum4 = mb_strlen(str_replace("火", str_repeat(" ",mb_strlen("火","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum4>=3 and tgdzwh($tg[$dtg])=="金"){
	$ssmainw=$ssmainw."官杀旺";
}
if($wnum4>=3 and tgdzwh($tg[$dtg])=="木"){
	$ssmainw=$ssmainw."食伤旺";
}
if($wnum4>=3 and tgdzwh($tg[$dtg])=="水"){
	$ssmainw=$ssmainw."财星旺";
}
if($wnum4>=3 and tgdzwh($tg[$dtg])=="火"){
	$ssmainw=$ssmainw."比劫旺";
}
if($wnum4>=3 and tgdzwh($tg[$dtg])=="土"){
	$ssmainw=$ssmainw."印星旺";
}
$wnum5 = mb_strlen(str_replace("土", str_repeat(" ",mb_strlen("土","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum5>=3 and tgdzwh($tg[$dtg])=="金"){
	$ssmainw=$ssmainw."印星旺";
}
if($wnum5>=3 and tgdzwh($tg[$dtg])=="木"){
	$ssmainw=$ssmainw."财星旺";
}
if($wnum5>=3 and tgdzwh($tg[$dtg])=="水"){
	$ssmainw=$ssmainw."官杀旺";
}
if($wnum5>=3 and tgdzwh($tg[$dtg])=="火"){
	$ssmainw=$ssmainw."食伤旺";
}
if($wnum5>=3 and tgdzwh($tg[$dtg])=="土"){
	$ssmainw=$ssmainw."比劫旺";
}


$bzwh=tgdzwh($tg[$ty]).tgdzwh($dz[$dy]).tgdzwh($tg[$tm]).tgdzwh($dz[$dm]).tgdzwh($tg[$dtg]).tgdzwh($dz[$ddz]).tgdzwh($tg[$ttg]).tgdzwh($dz[$tdz]);
$wnum1 = mb_strlen(str_replace("金", str_repeat(" ",mb_strlen("金","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum1>=3){
	$mainw=$mainw."<strong>金</strong>旺";
}
if($wnum1==0){
	$mainq=$mainq."缺<strong>金</strong>";
}
$wnum2 = mb_strlen(str_replace("木", str_repeat(" ",mb_strlen("木","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum2>=3){
	$mainw=$mainw."<strong>木</strong>旺";
}
if($wnum2==0){
	$mainq=$mainq."缺<strong>木</strong>";
}
$wnum3 = mb_strlen(str_replace("水", str_repeat(" ",mb_strlen("水","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum3>=3){
	$mainw=$mainw."<strong>水</strong>旺";
}
if($wnum3==0){
	$mainq=$mainq."缺<strong>水</strong>";
}
$wnum4 = mb_strlen(str_replace("火", str_repeat(" ",mb_strlen("火","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum4>=3){
	$mainw=$mainw."<strong>火</strong>旺";
}
if($wnum4==0){
	$mainq=$mainq."缺<strong>火</strong>";
}
$wnum5 = mb_strlen(str_replace("土", str_repeat(" ",mb_strlen("土","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($wnum5>=3){
	$mainw=$mainw."<strong>土</strong>旺";
}
if(wnum5==0){
	$mainq=$mainq."缺<strong>土</strong>";
}

if ($dz[$dm]=="寅" or $dz[$dm]=="卯"){
	$ywq1=$wnum1;
	$ywq2=$wnum2*1.6;
	$ywq3=$wnum3;
	$ywq4=$wnum4*1.5;
	$ywq5=$wnum5*0.8;
}

if($dz[$dm]=="巳" or $dz[$dm]=="午"){
	$ywq1=$wnum1*0.8;
	$ywq2=$wnum2;
	$ywq3=$wnum3;
	$ywq4=$wnum4*1.6;
	$ywq5=$wnum5*1.5;
}

if ($dz[$dm]=="申" or $dz[$dm]=="酉"){
	$ywq1=$wnum1*1.6;
	$ywq2=$wnum2*0.8;
	$ywq3=$wnum3*1.5;
	$ywq4=$wnum4;
	$ywq5=$wnum5;
} 

if ($dz[$dm]=="亥" or $dz[$dm]=="子"){
	$ywq1=$wnum1;
	$ywq2=$wnum2*1.5;
	$ywq3=$wnum3*1.6;
	$ywq4=$wnum4*0.8;
	$ywq5=$wnum5;
} 

if($dz[$dm]=="辰" or $dz[$dm]=="戌" or $dz[$dm]=="丑" or $dz[$dm]=="未"){
	$ywq1 = $wnum1*1.5;
	$ywq2 = $wnum2;
	$ywq3 = $wnum3*0.8;
	$ywq4 = $wnum4;
	$ywq5 = $wnum5*1.6;
}

$ywqzh=$ywq1+$ywq2+$ywq3+$ywq4+$ywq5;
$yw1=$ywq1/$ywqzh;
$yw2=$ywq2/$ywqzh;
$yw3=$ywq3/$ywqzh;
$yw4=$ywq4/$ywqzh;
$yw5=$ywq5/$ywqzh;

$bzwh=ytgdzwh($dz[$dm]);
$ywnum1 = mb_strlen(str_replace("金", str_repeat(" ",mb_strlen("金","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($ywnum1>=3){
	$ymainw=$ymainw."<strong>金</strong>旺";
}
if($ywnum1==0){
	$ymainq=$ymainq."缺<strong>金</strong>";
}
$ywnum2 = mb_strlen(str_replace("木", str_repeat(" ",mb_strlen("木","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($ywnum2>=3){
	$ymainw=$ymainw."<strong>木</strong>旺";
}
if($ywnum2==0){
	$ymainq=$ymainq."缺<strong>木</strong>";
}

$ywnum3 = mb_strlen(str_replace("水", str_repeat(" ",mb_strlen("水","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($ywnum3>=3){
	$ymainw=ymainw."<strong>水</strong>旺";
}
if($ywnum3==0){
	$ymainq=$ymainq."缺<strong>水</strong>";
}

$ywnum4 = mb_strlen(str_replace("火", str_repeat(" ",mb_strlen("火") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");

if($ywnum4>=3){
	$ymainw=$ymainw."<strong>火</strong>旺";
}
if($ywnum4==0){
	$ymainq=$ymainq."缺<strong>火</strong>";
}
$ywnum5 = mb_strlen(str_replace("土", str_repeat(" ",mb_strlen("土","utf-8") + 1),$bzwh),"utf-8") - mb_strlen($bzwh,"utf-8");
if($ywnum5>=3){
	$ymainw = $ymainw."<strong>土</strong>旺";
}
if($ywnum5==0){
	$ymainq = $ymainq."缺<strong>土</strong>";
}


$a[11] = "男士们虽然一生中难免有些桃花运，这些不正常的桃花运，幸而大多数都有克制的能力，到了某个阶段时会自动自觉，走回正轨，当然有些人沉迷不醒，弄到家变，这似全皆有数的。 女性方面同样有上述情况出现，以不迷信角度言，主要在于个人能够克制，克制的能力除了先天个性外，后天的教养关系很大，不过女性多柔弱，对性爱两字比男人看法多少有别，于是一般性，女人对感情变化多于男士的，同时男性的刚强，对于感情的变化忍耐能力也较强。<br>但以命理论，不管男女，从八字中是可见及，八字中有所谓“墙内桃花”与“墙外桃花”，墙外桃花乃指不正常的男女关系，男女是一样的。储有命例不少，有些是名家手笔，有些是自己多年来的记录，算得是研究的小成绩。<br> 纪录了不少命理例证，遇上某些困扰时，找出来参阅常常获得启示，想到女命富有而婚姻不利，其本人见桃花而受冲，引出一夫又一夫的命运来，早在八字中有所显示，有八字是辛×年，巳亥月，丁丑日，庚戌时的女士。<Br> 女命但看夫，丁火坐丑夫绝地，乃风流出自本性，夫宫自是不佳，丁以壬水为夫，局中月上归符酉金生之本美，然食伤在干，又时戌日丑，食伤太旺，难免克夫，夫妻似浮云，同床异梦。正宫高照得以良配成婚，癸卯乃杀之高照。正夫下台，偏夫上台，女命婚姻一无好处，癸卯桃花见卯合，是酉又冲，冲动桃花，便是一枝红杏出场了﹗四处偷期密约，女命淫荡不仑。<br> 惟命中正财在时上，晚年见大富，奈何岁月烦覆，不耐寂寞，命理已尽见。对于女命淫荡的看法，其命若带偏桃花，不论命与运，都主有偷期男女不正常关系存在，唯健旺与否得看轻重耳";
/*内桃花*/
$a[12] = "其人风流多情,难守贞操,多有外遇.";
/*外桃花*/
$a[13] = "能得贵人,朋友的帮忙,使自己受益不浅.";
/*天乙*/
$a[14] = "一生吉利,荣华富贵.";
/*天月二德*/
$a[15] = "一生劳碌奔波";
/*岁禄*/
$a[16] = "衣食丰足,享受国家奉禄,得妻子相助";
/*坐禄*/
$a[17] = "晚年生活富态,坐享儿孙之福";
/*归禄*/
$a[18] = "诗书满腹,少年勤奋有功名之格";
/*学堂*/
$a[19] = "太平吉祥,处事少忧,即使犯了大错也会得到宽恕";
/*天赫吉星*/

$a[43] = "生平之中，收入虽多，开销亦大，较易财来财去而不易聚财。";
/*从财格*/
$a[44] = "你的头脑灵活，谋财手腕高明，最易致富。";
/*伤官逢财*/
$a[45] = "你可以从事投机性行业赚得偏财。";
/*偏财得用*/
$a[46] = "你的钱财都是一分耕耘，一分收获的得来的。";
/*正财得用*/
$a[47] = "你与异性之关系密切，异性缘佳，受异性之影响力大。";
$a[50] = "你与异性之关系较不密切，受异性影响较小。";
/*正偏财*/
$a[51] = "得祖先之福荫，继承父亲之产业。";
/*年正官*/
$a[52] = "必受父母之所爱，一生少劳苦。";
/*月正官*/
$a[53] = "上有兄姊，有独立分家的倾向。";
/*年比肩*/
$a[54] = "有兄弟姊妹是养子之倾向，有独立性的事业，争财，理财之特性。";
/*月比肩*/
$a[55] = "子孙得力，老运得安乐荣华。子女相貌敦厚，性情和顺，孝顺父母。";
/*时正官*/
$a[56] = "自己为继承人，或为养子与过房。";
/*时比肩*/
$a[57] = "为人重义气，善理财。";
/*年劫财*/
$a[58] = "资财难聚，喜欢投机性的财源，自尊心强，较重视外表穿著。";
/*月劫财*/
$a[59] = "与儿子的缘份薄。";
/*时劫财*/
$a[60] = "受祖上福荫，事业可发展，平安福禄。";
/*年食神*/
$a[61] = "受双亲之恩惠得幸福。好饮食，中年发胖。";
/*月食神*/
$a[62] = "得贤慧之内助协力成家。";
/*时食神*/
$a[63] = "得不到祖业，福份减少。";
/*年伤官*/
$a[64] = "兄弟缘薄，感情不和，较不尊重父母。";
/*月伤官*/
$a[65] = "与儿子的缘份较薄，女多子少，晚运较不幸。";
/*时伤官*/
$a[66] = "继承祖业，但比较迟。";
/*年偏财*/
$a[67] = "家中主权在父，或幼年为养子。";
/*月偏财*/
$a[68] = "祖上富贵之人。";
/*年正财*/
$a[69] = "勤俭之家，双亲富贵，得父母之福荫。";
/*月正财*/
$a[70] = "晚年幸福，子孙富贵，且孝顺。";
/*时正财*/
$a[71] = "性情刚直而不屈服之特性。";
/*时七杀*/
$a[72] = "较守不住祖业，失去家庭教育。";
/*年偏印*/
$a[73] = "适合艺术家、医生、明星、星相命理学家、理发业。";
/*月偏印*/
$a[74] = "对子女较不利。";
/*时偏印*/
$a[75] = "生在富贵之家，祖先富裕。";
/*年正印*/
$a[76] = "有智慧、有慈悲心。";
/*月正印*/
$a[77] = "得子之幸福，孝养。";
/*时正印*/
$a[181] = "亲生子女不愿继承自己的产业，多半各自朝其他方向发展。";
/*时补运=胎*/
$a[182] = "有组织领导能力,精明能干,能办大事,享有声誉.";
/*将星*/
$a[183] = "擅长艺术---绘画,音乐,而且勤学苦练,做事勤恳.";
/*华盖*/
$a[184] = "一生奔波,但有旅行,转移或出国的喜事.";
/*驿马*/
//经验集合
$a[245] = "自小聪明过人,很有异性缘,颇受单身异性的喜欢,家门多有喜庆。";
$a[247] = "聪明伶俐有心计,颇俱军事才能。";
$a[249] = "博学多才,早年多灾,晚年运到自然富态。";
$a[240] = "有胆识,有才略,成功多出人意料之外。";
$a[259] = "此为绝处逢生之象,主晚年富足。";
$a[257] = "此人聪明,但多性暴好斗,有英雄气概且常能见义勇为,为民除害。";
$a[258] = "聪明伶俐,少年勤奋有功名之格。";
$a[237] = "杀星有制化为权,从文主富,从武主贵。";
$a[230] = "食神见印,钱财年年进,主富。";
$a[235] = "食神见财,不做自来,主富足。";
$a[238] = "聪明秀气,人缘好,做事易成功。";
$a[270] = "聪明绝顶,少年勤奋自有功名。";
$a[280] = "领悟能力强,受传统约束少,多能有所作为。";

//论生时各人命运 nlsc
//生辰适合职业 scsy，生辰注意年龄 sczy


$scsy[1] = "适合的职业：艺术、政治、建筑、电气、属金水事业可忌土类。 ";
$sczy[1] = "应该注意年限：十一岁，十八岁，三十六岁，四十九岁，五十八岁，八十八岁。 ";



$scsy[2] = "适合的职业：商业、技师、官吏、学者、饮食、加工。忌木类。";
$sczy[2] = "应该注意年限：十八岁，廿三岁，卅一岁，四六岁，七二岁。 ";

$scsy[3] = "适合的职业：医师、音乐家、美术家、艺人、流浪职业。忌金类。";
$sczy[3] = "应该注意年限：廿六岁，廿九岁，卅三岁，卅九岁，四九岁，六六岁。 ";

$scsy[4] = "适合的职业：机械、演戏、文学、美术、宗教家、奉职。忌火类。";
$sczy[4] = "应该注意年限：十六岁，廿岁，五十五岁，七二岁。 ";

$scsy[5] = "适合的职业：实业家、政治家、中介人、教员、矿业。忌木类。 ";
$sczy[5] = "应该注意年限：十九岁，廿七岁，卅六岁，卅九岁，六六岁。 ";

$scsy[6] = "适合的职业：评论家、刺绣、请负业、矿业、加工业。忌水类。 ";
$sczy[6] = "应该注意年限：卅一岁，卅六岁，卅九岁，四七岁，四九岁，八九岁。 ";

$scsy[7] = "适合的职业：医师、护士、政治、明星、技艺、料理店、油业。忌金类。 ";
$sczy[7] = "应该注意年限：六岁，十二岁，廿四岁，卅三岁，四五岁，五四岁，八五岁。 ";


$scsy[8] = "适合的职业：土木业、电气商、建筑业、木器商、酒类商。忌水类。 ";
$sczy[8] = "应该注意年限：十九岁，廿六岁，五六岁，七十岁。 ";


$scsy[9] = "适合的职业：仲买人、料理、金融界、五金商、钟表、银楼。忌木类。";
$sczy[9] = "应该注意年限：十九岁，廿二岁，廿八岁，卅岁，四二岁，五四岁，七二岁。 ";


$scsy[10] = "适合的职业：化学、采访、教员、文艺、新兴事业、加工业。忌土类。";
$sczy[10] = "应该注意年限：十九岁，廿五岁，卅二岁，四九岁，七十八岁。 ";


$scsy[11] = "适合的职业：诗人、作家、投机、五金、农林、米谷商、机械。忌火类。  ";
$sczy[11] = "应该注意年限：十六岁，廿六岁，卅五岁，四四岁，四九岁，五七岁，七八岁。 ";


$scsy[12] = "适合的职业：外科医、僧侣、旅馆、支配人、艺术、古董、五金。忌火类。";
$sczy[12] = "应该注意年限：十一岁，廿六岁，卅六岁，卅九岁，四九岁，五六岁，七八岁。 ";
?>