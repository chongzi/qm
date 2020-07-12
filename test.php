<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<?php
if(isset($_POST["ming"]))
{
header("Content-type:text/html;charset=utf-8");
$link  =  mysqli_connect('localhost','fufeiqiming','djRTZr5esfaYwAxG','fufeiqiming') or die ('Connect Error:'.mysqli_connect_error());
mysqli_set_charset($link,'UTF8');

$vas=$_POST["ming"];
$xing=$_POST["xing"];
$sex=$_POST["sex"];
$score=$_POST["score"];
$active=$_POST["active"];
$pieces = explode(",", $vas);
for ($x=0; $x<count($pieces); $x++) {
 $query="INSERT INTO name(`xing`,`ming`,`sex`,`score`,`active`) VALUE ('".$xing."','".$pieces[$x]."',".$sex.",".$score.",".$active.")";
 $res = mysqli_query($link,$query);//插入成功返回真，插入失败返回假
 if($res){
    //插入成功则输出自增主键的id
    echo "添加成功:".mysqli_insert_id($link);
    echo "<hr/>";
    echo "ID号为:".mysqli_affected_rows($link);
}else{
    //插入失败则输出错误编号和错误信息
    echo "Error:";
    echo mysqli_errno($link).":".mysqli_error($link);
	
}
} 
}


?>
</head>
<body>
<form action="" method="post">
<div>姓<input name="xing" type="text" id="xing">  
<input name="sex" type="radio" value="1">男<input name="sex" type="radio" value="2">女   
分数<input name="score" type="text" id="score">  
<input name="active" type="radio" value="1">显示</div>
<br />
</div>
<div>名字：格式（钢蹦,小蛋,小猫）注意逗号是英文逗号</div><textarea name="ming" cols="100" rows="20" id="ming"></textarea></div>
<br />
<input name="" type="submit" value="提交">
</form>
</body>
</html>