<?php
/* *
 * 功能：姓名全解
 */
require_once("bhwxlib.function.php");
require_once("name.function.php");
require_once("namejx.function.php");
require_once("namewuxing.function.php");
require_once("pinyin.function.php");
require_once("trans.function.php");

class NameSolution {
    public $nameFT = array(); //繁体集合
	public $namePY = array(); //拼音集合
	public $nameBH; //康熙笔画集合
	public $namewuxing; //字意五行集合
	public $namewuxinghz; //五行汉字集合
	
	public $namesky; //天格
	public $nameearth; //地格
	public $nameout; //外格
	public $namepeople; //人格
	public $total; //总格
	public $nameskywh; //天格五行
	public $nameearthwh; //地格五行
	public $nameoutwh; //外格五行
	public $namepeoplewh; //人格五行
	public $totalwh; //总格五行
	
	public $nameskyjx; //天格吉凶
	public $nameskysl; //天格数理
    public $nameskysldesc; //天格数理描述	
	public $nameearthjx; //地格吉凶
	public $nameearthsl; //地格数理
    public $nameearthsldesc; //地格数理描述	
	public $nameoutjx; //外格吉凶
	public $nameoutsl; //外格数理
    public $nameoutsldesc; //外格数理描述	
	public $namepeoplejx; //人格吉凶
	public $namepeoplesl; //人格数理
    public $namepeoplesldesc; //人格数理描述	

    public $scarr; //三才描述集合

    public $score; //名字评分
	public $scoreDesc; //名字评分描述
	

    public function __construct($name){
	    $trans = new Trans;
		$pinyin = new CUtf8_PY;
		$namenum = count($name);
		for ($i=0; $i < $namenum ; $i++) {
			array_push($this->nameFT, $trans->c2t($name[$i]));
			array_push($this->namePY, $pinyin->encode($name[$i], 'all'));
		}
		
		$nameClass = new NameClass($name);
		$this->nameBH = $nameClass->getBH(); //康熙笔画
		$this->namewuxing = $nameClass->getWuxing(); //字意五行
		$this->namewuxinghz = $nameClass->getWuxinghz(); //五行汉字


		$this->namesky = $nameClass->getNamesky(); //天格
		$this->nameearth = $nameClass->getNameearth();//地格
		$this->nameout = $nameClass->getNameout();//外格
		$this->namepeople = $nameClass->getNamepeople();//人格
		$this->total = $nameClass->getTotal(); //总格
		
		$namejxClass = new NamejxClass();
		$this->nameskywh = $namejxClass->getFiveWH($this->namesky); //天格五行
		$this->nameearthwh = $namejxClass->getFiveWH($this->nameearth); //地格五行
		$this->nameoutwh = $namejxClass->getFiveWH($this->nameout); //外格五行
		$this->namepeoplewh = $namejxClass->getFiveWH($this->namepeople); //人格五行
		$this->totalwh = $namejxClass->getFiveWH($this->total); //总格五行

		$this->nameskyjx = $namejxClass->getfiveJX($this->namesky); //天格吉凶
		$this->nameskysl = $namejxClass->getfiveSL($this->namesky); //天格数理
		$this->nameskysldesc = $namejxClass->getfiveSLDesc($this->namesky); //天格数理描述

		$this->nameearthjx = $namejxClass->getfiveJX($this->nameearth); //地格吉凶
		$this->nameearthsl = $namejxClass->getfiveSL($this->nameearth); //地格数理
		$this->nameearthsldesc = $namejxClass->getfiveSLDesc($this->nameearth); //地格数理描述

		$this->nameoutjx = $namejxClass->getfiveJX($this->nameout); //外格吉凶
		$this->nameoutsl = $namejxClass->getfiveSL($this->nameout); //外格数理
		$this->nameoutsldesc = $namejxClass->getfiveSLDesc($this->nameout); //外格数理描述

		$this->namepeoplejx = $namejxClass->getfiveJX($this->namepeople); //人格吉凶
		$this->namepeoplesl = $namejxClass->getfiveSL($this->namepeople); //人格数理
		$this->namepeoplesldesc = $namejxClass->getfiveSLDesc($this->namepeople); //人格数理描述
		
		$this->totaljx = $namejxClass->getfiveJX($this->namepeople); //总格吉凶
		
		$scwh = $this->nameskywh.$this->namepeoplewh.$this->nameearthwh; //三才五行 天，人，地五行属性
		$scpos = $namejxClass->getscposorder($scwh); //三才位置
		$this->scarr = $namejxClass->getnameSc($scpos); //三才数组  

        $this->score = 	$namejxClass->getScore(array($this->nameskyjx,$this->nameearthjx,$this->nameoutjx,$this->namepeoplejx,$this->totaljx),$this->scarr[1]); //名字评分
        $this->scoreDesc = $namejxClass->getScoreDesc($this->score); //名字评分		
	
	}     	
	

}