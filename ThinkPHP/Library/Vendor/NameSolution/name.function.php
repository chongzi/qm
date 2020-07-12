<?php

/**
 * 姓名类
 * @author luozhuang 大师♂罗莊
 */
class NameClass {

    private  $namesky;//天格
    private  $nameearth;//地格
    private  $nameout;//外格
    private  $namepeople;//人格
    private  $total; //总格
    private  $BH;//笔画数组
    private  $wuxing;//五行数组
    private  $nameliborder;//在库顺序
    private  $name;
    private  $wuxinghz; //汉字五行数组
	/*
	天格计算法：天格是姓氏画数之和，但单复姓有区别。
		1  单姓氏：姓的文字画数+1。
		2  双姓氏或四字名：前两个字的笔画总数。
		
	人格（主运）：姓+名
    人格是姓名之中心，与人一生之命运关系最紧密。凡欲判断人的吉凶，务先着眼此部，就能看出其人之中心命运性格和体质能力，是关系天格、地格之数理，变化无穷。
	人格计算法：人格就是姓的最下一字和名的最上一字的合计数。
		1  单姓氏：姓与第二个字笔画总数。
		2  双姓氏或四字名，第二个字与第三个字的笔画总和。
		
	地格（前运）：
	地格是名字之全画数，亦称前运。主中年前的运势、与子女或下属的关系。
	地格计算法：是名字之全画数，亦称前运
		1  单姓氏：后两个字笔画总数。
		2  双姓氏或四字名：后两个字的笔画总数。
		3  单字名（即两字名）：后一字笔画数加上“1”。
		
	总格（后运）：姓与名之字画数之和称为总格。主壮年至晚年之命运。但壮年前亦颇有灵动。
	总格计算法：    姓氏连名全体笔画总数。
	
	外格（副运）：总格减去人格的剩余数。其司命运之灵力，次于“主运”，别名“副运”。此格可见家族缘之厚薄或本人对社会之关系。
	外格计算法：   姓名各字的笔画数全部相加（即总格），减去人格数。
	
	如是单字名或单姓，结果再分别加1。
	算法就是名字三个字姓氏补1，不够三个字后面补1 运算方法一样
	天格0+1 人格1+2 地格2+3 外格0+3  ——大师♂罗莊
	*/
    
    public $mynamewuxing;


    public function __construct($name) {
        $this->mynamewuxing= new Namewuxing();
        $this->name = $name;
        $this->nameliborder = $this->mynamewuxing->getnameliborder($name);
        $this->wuxing = $this->mynamewuxing->getnameWX($this->nameliborder);
        $this->wuxinghz = $this->mynamewuxing->getnameWXarray($this->wuxing);
        $this->BH = $this->mynamewuxing->getnameBH($this->nameliborder);
        $nametemp = array(1, 1, 1, 1);
        $bhcount = count($this->BH); 
        if ($bhcount == 4) {
            $nametemp = $this->BH;
            $this->total = $this->BH[0] + $this->BH[1] + $this->BH[2] + $this->BH[3];
        }
        if ($bhcount == 3) {
            $nametemp[1] = $this->BH[0];
            $nametemp[2] = $this->BH[1];
            $nametemp[3] = $this->BH[2];
            $this->total = $this->BH[0] + $this->BH[1] + $this->BH[2];
        }
        if ($bhcount == 2) {
            $nametemp[1] = $this->BH[0];
            $nametemp[2] = $this->BH[1];
            $this->total = $this->BH[0] + $this->BH[1];
        }
        $this->namesky = $nametemp[0] + $nametemp[1];
        $this->namepeople = $nametemp[1] + $nametemp[2];
        $this->nameearth = $nametemp[2] + $nametemp[3];
        $this->nameout = $nametemp[0] + $nametemp[3];

    }

    /**
     * 取笔画五行
     *
     * @return the namesky
     */
    public function getNameWX($Bihua) {
        $tempwx_idx = $mynamewuxing->myBhWxLib->get_wx_idx($Bihua);
        if ($tempwx_idx == -1) {
            throw new Exception("没有收录该汉字"); 
        }
        return $mynamewuxing->getnameWXnaying($tempwx_idx);
    }

    /**
     * @return the namesky
     */
    public function getNamesky() {
        return $this->namesky;
    }

    /**
     * @return the nameearth
     */
    public function getNameearth() {
        return $this->nameearth;
    }

    /**
     * @return the nameout
     */
    public function getNameout() {
        return $this->nameout;
    }

    /**
     * @return the namepeople
     */
    public function getNamepeople() {
        return $this->namepeople;
    }

    /**
     * @return the BH
     */
    public function getBH() {
        return $this->BH;
    }

    /**
     * @return the wuxing
     */
    public function getWuxing() {
        return $this->wuxing;
    }

    /**
     * @return the wuxing
     */
    public function getWuxinghz() {
        return $this->wuxinghz;
    }
    

    /**
     * @return the nameliborder
     */
    public function getNameliborder() {
        return $this->nameliborder;
    }

    /**
     * @return the total
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * @return the name
     */
    public function getName() {
        return $this->name;
    }
}
