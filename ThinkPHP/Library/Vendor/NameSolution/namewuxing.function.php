<?php

/**取汉字五行笔画演示
 *
 * @author luozhuang 大师♂罗莊
 */
class Namewuxing {

    private $myBhWxLib; //汉字五行笔画库

    public function __construct()
    {
        $this->myBhWxLib= new Bhwxlib();

    }
    /**
     * 取出名字每个字在库中位置
     *
     * @param $name
     * @return
     */
    public function getnameliborder($name) {
        $namechararray = $name;

        $returnarray = array();
        for ($i = 0; $i < count($namechararray); $i++) {

            $order = $this->getnameliborderone($namechararray[$i]);
            $returnarray[$i] = $order;
        }
        return $returnarray;
    }

    /**
     * 取出字在库中位置
     *
     * @param name
     * @return
     */
    public function getnameliborderone($name) {
        $libs = $this->myBhWxLib->getLibs();

        $returnorder = -1;

        $returnorder = $this->myBhWxLib->getStringLibs($name);

        return $returnorder;

    }

    /**
     * 取出名字笔画
     *
     * @param name
     * @return
     */
    public function getnameBHone($name) {
        $libs = $this->myBhWxLib->getLibs();

        $returnorder = -1;

        $returnorder = $libs[$name][0];

        return $returnorder;

    }

    /**
     * 取出名字五行
     *
     * @param name
     * @return
     */
    public function getnameWXone($name) {
        $libs = $this->myBhWxLib->getLibs();

        $returnorder = -1;

        $returnorder = $libs[$name][1];

        return $returnorder;

    }

    /**
     * 取出名字笔画
     *
     * @param name
     * @return
     */
    public function getnameBH($name) {
        $returnarray = array();
        for ($i = 0; $i < count($name); $i++) {
            $returnarray[$i] = $this->getnameBHone($name[$i]);
        }
        return $returnarray;
    }

    /**
     * 取出名字五行
     *
     * @param name
     * @return
     */
    public function getnameWX($name) {
        $returnarray = array();
        for ($i = 0; $i < count($name); $i++) {
            $returnarray[$i] = $this->getnameWXone($name[$i]);
        }
        return $returnarray;

    }

    /**
     * 取出名字五行汉字
     *
     * @param name
     * @return
     */
    public function getnameWXarray($name) {
        $returnarray = array();
        $count = count($name);
        for ($i = 0; $i < $count; $i++) {
            $returnarray[$i] = $this->getnameWXnaying($name[$i]);
        }
        return $returnarray;

    }

    /**
     * 取出名字五行汉字
     *
     * @param name
     * @return
     */
    public function getnameWXnaying($name) {
        switch ($name) {
            default:
                return "无";
            case 0:

                return "木";

            case 1:
                return "火";

            case 2:
                return "土";

            case 3:
                return "金";

            case 4:
                return "水";
        }

    }

    public function pringst($res) {
        $result = '';
        for ($i = 0; $i < count($res); $i++) {

       
            $result .= $res[$i];
            $result .= "   ";
        }

        $result .= "\n";
        return $result;
    }




}
