﻿<?php
class bihua
{
  var $data;
  var $dataIndex;
  var $dataSpecial;
  var $tone;
  var $head;
  var $format;
  var $foot;
  function setTone($tone)
  {
    $this->tone=$tone;
  }
  function setFormat($head, $format, $foot)
  {
    $this->head=$head;
    $this->format=$format;
    $this->foot=$foot;
  }
  function find($str, $isFirst=true)
  {

    for ($i=0;$i<36;$i++)
    {
      for ($j=0;$j<5;$j++)
      {
	    if(isset($this->data[$i][$j])){
          $index=strstr($this->data[$i][$j], $str);
          if (!($index===false)&&($index%2==0))
             return ($i+1);//($i+1).($isFirst?$this->dataIndex[$j]:"")
		}
      }
    }
    return " ";
  }
  function render($str, $ascii=false)
  {
    if ($ascii)
      return str_replace("%1", $str, str_replace("%2", $str, $this->format));
    $bihua=strstr($this->dataSpecial, $str." ")?$str:$this->find($str." ", $this->tone);
    return str_replace("%1", $str, str_replace("%2", $bihua, $this->format));
  }
  function parse($str)
  {
    $output="";
    $length=strlen($str);
    $output.=$this->head;
    for ($i=0;$i<$length;++$i)
    {
      if ($i==$length-1)
      {
        $output.=$this->render($str[$i], true);
        break;
      }
      $code1=ord($str[$i]);
      $code2=ord($str[$i+1]);
      if ($code1==0x0D&&$code2==0x0A)
      {
        $output.=$this->foot;
        $output.=$this->head;
        ++$i;
      }
      else if ($code1>=0x81&&$code1<=0xFE&&$code2>=0x40&&$code2<=0xFE&&$code2!=0x7F)
      {
        $output.=$this->render($str[$i].$str[$i+1]);
        ++$i;
      }
      else
        $output.=$this->render($str[$i], true);
    }
    $output.=$this->foot;
    return $output;
  }
  function bihua()
  {
    $this->tone=true;
    $this->head="";
    $this->format="";
    $this->foot="
%2
%1
";
    $this->dataIndex=array("一", "丨", "丿", "丶", "乛");
    $this->dataSpecial="！ ＂ ＃ ￥ ％ ＆ ＇ （ ） ＊ ＋ ， － ． ／ ０ １ ２ ３ ４ ５ ６ ７ ８ ９ ： ； ＜ ＝ ＞ ？ ＠ Ａ Ｂ Ｃ Ｄ Ｅ Ｆ Ｇ Ｈ Ｉ Ｊ Ｋ Ｌ Ｍ Ｎ Ｏ Ｐ Ｑ Ｒ Ｓ Ｔ Ｕ Ｖ Ｗ Ｘ Ｙ Ｚ ［ ＼ ］ ＾ ＿ ｀ ａ ｂ ｃ ｄ ｅ ｆ ｇ ｈ ｉ ｊ ｋ ｌ ｍ ｎ ｏ ｐ ｑ ｒ ｓ ｔ ｕ ｖ ｗ ｘ ｙ ｚ ｛ ｜ ｝ ￣ 、 。 · ˉ ˇ ¨ 〃 々 — ～ ‖ … ‘ ' “ ” 〔 〕 〈 〉 《 》 「 」 『 』 〖 〗 【 】 ± × ÷ ∶ ∧ ∨ ∑ ∏ ∪ ∩ ∈ ∷ √ ⊥ ∥ ∠ ⌒ ⊙ ∫ ∮ ≡ ≌ ≈ ∽ ∝ ≠ ≮ ≯ ≤ ≥ ∞ ∵ ∴ ♂ ♀ ° ′ ″ ℃ ＄ ¤ ￠ ￡ ‰ § № ☆ ★ ○ ● ◎ ◇ ◆ □ ■ △ ▲ ※ → ← ↑ ↓ 〓 〡 〢 〣 〤 〥 〦 〧 〨 〩 ㊣ ㎎ ㎏ ㎜ ㎝ ㎞ ㎡ ㏄ ㏎ ㏑ ㏒ ㏕ ︰ ￢ ￤ ℡ ㈱ ‐ ー ゛ ゜ ヽ ヾ 〆 ゝ ゞ ﹉ ﹊ ﹋ ﹌ ﹍ ﹎ ﹏ ﹐ ﹑ ﹒ ﹔ ﹕ ﹖ ﹗ ﹙ ﹚ ﹛ ﹜ ﹝ ﹞ ﹟ ﹠ ﹡ ﹢ ﹣ ﹤ ﹥ ﹦ ﹨ ﹩ ﹪ ﹫              〇 ─ ━ │ ┃ ┄ ┅ ┆ ┇ ┈ ┉ ┊ ┋ ┌ ┍ ┎ ┏ ┐ ┑ ┒ ┓ └ ┕ ┖ ┗ ┘ ┙ ┚ ┛ ├ ┝ ┞ ┟ ┠ ┡ ┢ ┣ ┤ ┥ ┦ ┧ ┨ ┩ ┪ ┫ ┬ ┭ ┮ ┯ ┰ ┱ ┲ ┳ ┴ ┵ ┶ ┷ ┸ ┹ ┺ ┻ ┼ ┽ ┾ ┿ ╀ ╁ ╂ ╃ ╄ ╅ ╆ ╇ ╈ ╉ ╊ ╋ ";
    $this->data[0][0]="一 ";
    $this->data[0][4]="乙 ";
    $this->data[1][0]="二 十 丁 厂 七 ";
    $this->data[1][1]="卜 ";
    $this->data[1][2]="八 人 入 乂 儿 九 匕 几 ";
    $this->data[1][4]="刁 了 乃 刀 力 又 乜 ";
    $this->data[2][0]="三 干 亍 于 亏 士 土 工 才 下 寸 丈 大 兀 与 万 弋 ";
    $this->data[2][1]="上 小 口 山 巾 ";
    $this->data[2][2]="千 乞 川 亿 彳 个 么 久 勺 丸 夕 凡 及 ";
    $this->data[2][3]="广 亡 门 丫 义 之 ";
    $this->data[2][4]="尸 已 巳 弓 己 卫 孑 子 孓 也 女 飞 刃 习 叉 马 乡 幺 ";
    $this->data[3][0]="丰 王 井 开 亓 夫 天 元 无 韦 云 专 丐 扎 廿 艺 木 五 支 厅 卅 不 仄 太 犬 区 历 友 歹 尤 匹 厄 车 巨 牙 屯 戈 比 互 切 瓦 ";
    $this->data[3][1]="止 少 曰 日 中 贝 内 水 冈 见 ";
    $this->data[3][2]="手 午 牛 毛 气 壬 升 夭 长 仁 仃 什 片 仆 仉 化 仇 币 仂 仍 仅 斤 爪 反 兮 刈 介 父 爻 从 仑 今 凶 分 乏 公 仓 月 氏 勿 风 欠 丹 匀 乌 勾 殳 凤 ";
    $this->data[3][3]="卞 六 文 亢 方 闩 火 为 斗 忆 计 订 户 讣 认 讥 冗 心 ";
    $this->data[3][4]="尹 尺 夬 引 丑 爿 巴 孔 队 办 以 允 邓 予 劝 双 书 毋 幻 ";
    $this->data[4][0]="玉 刊 末 未 示 击 邗 戋 打 巧 正 扑 卉 扒 邛 功 扔 去 甘 世 艾 艽 古 节 艿 本 术 札 可 叵 匝 丙 左 厉 丕 石 右 布 夯 龙 戊 平 灭 轧 东 匜 劢 ";
    $this->data[4][1]="卡 北 占 凸 卢 业 旧 帅 归 目 旦 且 叮 叶 甲 申 号 电 田 由 卟 叭 只 央 史 叱 叽 兄 叼 叩 叫 叻 叨 另 叹 冉 皿 凹 囚 四 ";
    $this->data[4][2]="生 失 矢 氕 乍 禾 仨 仕 丘 付 仗 代 仙 仟 仡 仫 伋 们 仪 白 仔 他 仞 斥 卮 瓜 乎 丛 令 用 甩 印 氐 乐 尔 句 匆 犰 册 卯 犯 外 处 冬 鸟 务 刍 包 饥 ";
    $this->data[4][3]="主 市 庀 邝 立 冯 邙 玄 闪 兰 半 汀 汁 汇 头 汈 汉 忉 宁 穴 宄 它 讦 讧 讨 写 让 礼 讪 讫 训 必 议 讯 记 永 ";
    $this->data[4][4]="司 尻 尼 民 弗 弘 阢 出 阡 辽 奶 奴 尕 加 召 皮 边 孕 发 圣 对 弁 台 矛 纠 驭 母 幼 丝 ";
    $this->data[5][0]="匡 耒 邦 玎 玑 式 迂 刑 邢 戎 动 圩 圬 圭 扛 寺 吉 扣 扦 圪 考 托 圳 老 圾 巩 执 扩 圹 扪 扫 圯 圮 地 扬 场 耳 芋 芏 共 芊 芍 芨 芄 芒 亚 芝 芎 芑 芗 朽 朴 机 权 过 亘 臣 吏 再 协 西 压 厌 厍 戌 在 百 有 存 而 页 匠 夸 夺 夼 灰 达 戍 尥 列 死 成 夹 夷 轨 邪 尧 划 迈 毕 至 ";
    $this->data[5][1]="此 乩 贞 师 尘 尖 劣 光 当 吁 早 吐 吓 旯 曳 虫 曲 团 同 吕 吊 吃 因 吸 吗 吆 屿 屹 岌 帆 岁 回 岂 屺 则 刚 网 肉 凼 囝 囡 ";
    $this->data[5][2]="钆 钇 年 朱 缶 氘 氖 牝 先 丢 廷 舌 竹 迁 乔 迄 伟 传 乒 乓 休 伍 伎 伏 伛 优 臼 伢 伐 仳 延 佤 仲 仵 件 任 伤 伥 价 伦 份 伧 华 仰 伉 仿 伙 伪 伫 自 伊 血 向 囟 似 后 行 甪 舟 全 会 杀 合 兆 企 汆 氽 众 爷 伞 创 刖 肌 肋 朵 杂 夙 危 旬 旭 旮 旨 负 犴 刎 犷 匈 犸 舛 各 名 多 凫 争 邬 色 饧 ";
    $this->data[5][3]="冱 壮 冲 妆 冰 庄 庆 亦 刘 齐 交 次 衣 产 决 亥 邡 充 妄 闭 问 闯 羊 并 关 米 灯 州 汗 污 江 汕 汔 汲 汐 汛 汜 池 汝 汤 汊 忖 忏 忙 兴 宇 守 宅 字 安 讲 讳 讴 军 讵 讶 祁 讷 许 讹 论 讼 农 讽 设 访 诀 ";
    $this->data[5][4]="聿 寻 那 艮 厾 迅 尽 导 异 弛 阱 阮 孙 阵 阳 收 阪 阶 阴 防 丞 奸 如 妁 妇 妃 好 她 妈 戏 羽 观 牟 欢 买 纡 红 纣 驮 纤 纥 驯 纨 约 级 纩 纪 驰 纫 巡 ";
    $this->data[6][0]="寿 玕 弄 玙 麦 玖 玚 玛 形 进 戒 吞 远 违 韧 运 扶 抚 坛 抟 技 坏 抔 抠 坜 扰 扼 拒 找 批 扯 址 走 抄 汞 坝 贡 攻 赤 圻 折 抓 扳 坂 抡 扮 抢 扺 孝 坎 坍 均 坞 抑 抛 投 抃 坟 坑 抗 坊 抖 护 壳 志 扭 块 抉 声 把 报 拟 抒 却 劫 毐 芙 芫 芜 苇 邯 芸 芾 芰 苈 苊 苣 芽 芷 芮 苋 芼 苌 花 芹 芥 苁 芩 芬 苍 芪 芴 芡 芟 苄 芳 严 苎 芦 芯 劳 克 芭 苏 苡 杆 杜 杠 材 村 杖 杌 杏 杉 巫 杓 极 杧 杞 李 杨 杈 求 忑 孛 甫 匣 更 束 吾 豆 两 邴 酉 丽 医 辰 励 邳 否 还 矶 奁 豕 尬 歼 来 忒 连 欤 轩 轪 轫 迓 ";
    $this->data[6][1]="邶 忐 芈 步 卤 卣 邺 坚 肖 旰 旱 盯 呈 时 吴 呋 助 县 里 呓 呆 吱 吠 呔 呕 园 呖 呃 旷 围 呀 吨 旸 吡 町 足 虬 邮 男 困 吵 串 呙 呐 呗 员 听 吟 吩 呛 吻 吹 呜 吭 吣 吲 吼 邑 吧 囤 别 吮 岍 帏 岐 岖 岈 岗 岘 帐 岑 岚 兕 财 囵 囫 ";
    $this->data[6][2]="钉 针 钊 钋 钌 迕 氙 氚 牡 告 我 乱 利 秃 秀 私 岙 每 佞 兵 邱 估 体 何 佐 伾 佑 攸 但 伸 佃 佚 作 伯 伶 佣 低 你 佝 佟 住 位 伴 佗 身 皂 伺 佛 伽 囱 近 彻 役 彷 返 佘 余 希 佥 坐 谷 孚 妥 豸 含 邻 坌 岔 肝 肟 肛 肚 肘 肠 邸 龟 甸 奂 免 劬 狂 犹 狈 狄 角 删 狃 狁 鸠 条 彤 卵 灸 岛 邹 刨 饨 迎 饩 饪 饫 饬 饭 饮 系 ";
    $this->data[6][3]="言 冻 状 亩 况 亨 庑 床 庋 库 庇 疔 疖 疗 吝 应 冷 这 庐 序 辛 肓 弃 冶 忘 闰 闱 闲 闳 间 闵 闶 闷 羌 判 兑 灶 灿 灼 炀 弟 沣 汪 沅 沄 沐 沛 沔 汰 沤 沥 沌 沘 沏 沚 沙 汩 汨 汭 汽 沃 沂 沦 汹 汾 泛 沧 沨 沟 没 汴 汶 沆 沩 沪 沈 沉 沁 泐 怃 忮 怀 怄 忧 忡 忤 忾 怅 忻 忪 怆 忭 忱 快 忸 完 宋 宏 牢 究 穷 灾 良 证 诂 诃 启 评 补 初 社 祀 祃 诅 识 诈 诉 罕 诊 诋 诌 词 诎 诏 诐 译 诒 ";
    $this->data[6][4]="君 灵 即 层 屁 屃 尿 尾 迟 局 改 张 忌 际 陆 阿 孜 陇 陈 阽 阻 阼 附 坠 陀 陂 陉 妍 妩 妓 妪 妣 妙 妊 妖 妗 姊 妨 妫 妒 妞 姒 妤 努 邵 劭 忍 刭 劲 甬 邰 矣 鸡 纬 纭 驱 纯 纰 纱 纲 纳 纴 纵 驳 纶 纷 纸 纹 纺 纻 驴 纽 纾 ";
    $this->data[7][0]="奉 玩 玮 环 玡 武 青 责 现 玫 玠 玢 玥 表 玦 甙 盂 忝 规 匦 抹 卦 邽 坩 坷 坯 拓 垅 拢 拔 抨 坪 拣 拤 拈 坫 垆 坦 担 坤 押 抻 抽 拐 拃 拖 拊 者 拍 顶 坼 拆 拎 拥 抵 坻 拘 势 抱 拄 垃 拉 拦 幸 拌 拧 坨 坭 抿 拂 拙 招 坡 披 拨 择 拚 抬 拇 坳 拗 耵 其 耶 取 茉 苷 苦 苯 昔 苛 苤 若 茂 茏 苹 苫 苴 苜 苗 英 苒 苘 茌 苻 苓 茚 苟 茆 茑 苑 苞 范 茓 茔 茕 直 苠 茀 茁 茄 苕 茎 苔 茅 枉 林 枝 杯 枢 枥 柜 枇 杪 杳 枘 枧 杵 枚 枨 析 板 枞 松 枪 枫 构 杭 枋 杰 述 枕 杻 杷 杼 丧 或 画 卧 事 刺 枣 雨 卖 矸 郁 矻 矾 矽 矿 砀 码 厕 奈 刳 奔 奇 奄 奋 态 瓯 欧 殴 垄 殁 郏 妻 轰 顷 转 轭 斩 轮 软 到 郅 鸢 ";
    $this->data[7][1]="非 叔 歧 肯 齿 些 卓 虎 虏 肾 贤 尚 盱 旺 具 昊 昙 果 味 杲 昃 昆 国 哎 咕 昌 呵 咂 畅 呸 昕 明 易 咙 昀 昂 旻 昉 炅 咔 畀 虮 迪 典 固 忠 咀 呷 呻 黾 咒 咋 咐 呱 呼 呤 咚 鸣 咆 咛 咏 呢 咄 呶 咖 呦 咝 岵 岢 岸 岩 帖 罗 岿 岬 岫 帜 帙 帕 岭 岣 峁 刿 峂 迥 岷 剀 凯 帔 峄 沓 败 账 贩 贬 购 贮 囹 图 罔 ";
    $this->data[7][2]="钍 钎 钏 钐 钓 钒 钔 钕 钗 邾 制 知 迭 氛 迮 垂 牦 牧 物 乖 刮 秆 和 季 委 竺 秉 迤 佳 侍 佶 岳 佬 佴 供 使 侑 佰 侉 例 侠 臾 侥 版 侄 岱 侦 侣 侗 侃 侧 侏 凭 侨 侩 佻 佾 佩 货 侈 侪 佼 依 佯 侬 帛 卑 的 迫 阜 侔 质 欣 郈 征 徂 往 爬 彼 径 所 舍 金 刽 郐 刹 命 肴 郄 斧 怂 爸 采 籴 觅 受 乳 贪 念 贫 忿 瓮 戗 肼 肤 朊 肺 肢 肽 肱 肫 肿 肭 胀 朋 肷 股 肮 肪 肥 服 胁 周 剁 昏 迩 郇 鱼 兔 狉 狙 狎 狐 忽 狝 狗 狍 狞 狒 咎 备 炙 枭 饯 饰 饱 饲 饳 饴 ";
    $this->data[7][3]="冽 变 京 享 冼 庞 店 夜 庙 府 底 庖 疟 疠 疝 疙 疚 疡 剂 卒 郊 兖 庚 废 净 妾 盲 放 於 刻 劾 育 氓 闸 闹 郑 券 卷 单 炜 炬 炖 炒 炝 炊 炕 炎 炉 炔 沫 浅 法 泔 泄 沽 沭 河 泷 沾 泸 沮 泪 油 泱 泅 泗 泊 泠 泜 泺 泃 沿 泖 泡 注 泣 泫 泮 泞 沱 泻 泌 泳 泥 泯 沸 泓 沼 波 泼 泽 泾 治 怔 怯 怙 怵 怖 怦 怛 怏 性 怍 怕 怜 怩 怫 怊 怿 怪 怡 学 宝 宗 定 宕 宠 宜 审 宙 官 空 帘 穸 穹 宛 实 宓 诓 诔 试 郎 诖 诗 诘 戾 肩 房 诙 戽 诚 郓 衬 衫 衩 祆 祎 祉 视 祈 诛 诜 话 诞 诟 诠 诡 询 诣 诤 该 详 诧 诨 诩 ";
    $this->data[7][4]="建 肃 隶 录 帚 屉 居 届 刷 鸤 屈 弧 弥 弦 承 孟 陋 戕 陌 孤 孢 陕 亟 降 函 陔 限 卺 妹 姑 姐 妲 妯 姓 姗 妮 始 帑 弩 孥 驽 姆 虱 迦 迢 驾 叁 参 迨 艰 线 绀 绁 绂 练 驵 组 绅 细 驶 织 驷 驸 驹 终 绉 驺 驻 绊 驼 绋 绌 绍 驿 绎 经 骀 贯 甾 ";
    $this->data[8][0]="砉 耔 契 贰 奏 春 帮 珏 珐 珂 珑 玷 玳 珀 顸 珍 玲 珊 珉 珈 玻 毒 型 韨 拭 挂 封 持 拮 拷 拱 垭 挝 垣 项 垮 挎 垯 挞 城 挟 挠 垤 政 赴 赵 赳 贲 垱 挡 拽 垌 哉 垲 挺 括 挢 埏 郝 垍 垧 垢 拴 拾 挑 垛 指 垫 挣 挤 垓 垟 拼 垞 挖 按 挥 挦 挪 垠 拯 拶 某 甚 荆 茸 革 茜 茬 荐 荙 巷 荚 荑 贳 荛 荜 茈 带 草 茧 茼 莒 茵 茴 茱 莛 荞 茯 荏 荇 荃 荟 茶 荀 茗 荠 茭 茨 荒 垩 茳 茫 荡 荣 荤 荥 荦 荧 荨 茛 故 荩 胡 荪 荫 茹 荔 南 荬 荭 药 柰 标 栈 柑 枯 栉 柯 柄 柘 栊 柩 枰 栋 栌 相 查 柙 枵 柚 枳 柞 柏 柝 栀 柃 柢 栎 枸 栅 柳 柱 柿 栏 柈 柠 柁 枷 柽 树 勃 剌 郚 剅 要 酊 郦 柬 咸 威 歪 甭 研 砖 厘 砗 厚 砑 砘 砒 砌 砂 泵 砚 斫 砭 砜 砍 面 耐 耍 奎 耷 牵 鸥 虺 残 殂 殃 殇 殄 殆 轱 轲 轳 轴 轵 轶 轷 轸 轹 轺 轻 鸦 虿 皆 毖 ";
    $this->data[8][1]="韭 背 战 觇 点 虐 临 览 竖 尜 省 削 尝 哐 昧 眄 眍 盹 是 郢 眇 眊 盼 眨 昽 眈 哇 咭 哄 哑 显 冒 映 禺 哂 星 昨 咴 曷 昴 咧 昱 昵 咦 哓 昭 哔 畎 畏 毗 趴 呲 胄 胃 贵 畋 畈 界 虹 虾 虼 虻 蚁 思 蚂 盅 咣 虽 品 咽 骂 哕 剐 郧 勋 咻 哗 囿 咱 咿 响 哌 哙 哈 哚 咯 哆 咬 咳 咩 咪 咤 哝 哪 哏 哞 哟 峙 炭 峡 峣 罘 帧 罚 峒 峤 峋 峥 峧 帡 贱 贴 贶 贻 骨 幽 ";
    $this->data[8][2]="钘 钙 钚 钛 钝 钞 钟 钡 钠 钢 钣 钤 钥 钦 钧 钨 钩 钪 钫 钬 钭 钮 钯 卸 缸 拜 看 矩 矧 毡 氡 氟 氢 牯 怎 郜 牲 选 适 秕 秒 香 种 秭 秋 科 重 复 竽 竿 笈 笃 俦 段 俨 俅 便 俩 俪 叟 垡 贷 牮 顺 修 俏 俣 俚 保 俜 促 俄 俐 侮 俭 俗 俘 信 皇 泉 皈 鬼 侵 禹 侯 追 俑 俟 俊 盾 逅 待 徊 徇 徉 衍 律 很 须 舢 舣 叙 俞 弇 郗 剑 逃 俎 卻 爰 郛 食 瓴 盆 胚 胧 胨 胩 胪 胆 胛 胂 胜 胙 胍 胗 胝 朐 胞 胖 脉 胫 胎 鸨 匍 勉 狨 狭 狮 独 狯 狰 狡 飐 飑 狩 狱 狠 狲 訇 訄 逄 昝 贸 怨 急 饵 饶 蚀 饷 饸 饹 饺 饻 胤 饼 ";
    $this->data[8][3]="峦 弯 孪 娈 将 奖 哀 亭 亮 庤 度 弈 奕 迹 庭 庥 疬 疣 疥 疭 疮 疯 疫 疢 疤 庠 咨 姿 亲 竑 音 彦 飒 帝 施 闺 闻 闼 闽 闾 闿 阀 阁 阂 差 养 美 羑 姜 迸 叛 送 类 籼 迷 籽 娄 前 酋 首 逆 兹 总 炳 炻 炼 炟 炽 炯 炸 烀 烁 炮 炷 炫 烂 烃 剃 洼 洁 洱 洪 洹 洒 洧 洌 浃 柒 浇 泚 浈 浉 浊 洞 洇 洄 测 洙 洗 活 洑 涎 洎 洫 派 浍 洽 洮 染 洵 洚 洺 洛 浏 济 洨 浐 洋 洴 洣 洲 浑 浒 浓 津 浔 浕 洳 恸 恃 恒 恹 恢 恍 恫 恺 恻 恬 恤 恰 恂 恪 恼 恽 恨 举 觉 宣 宦 宥 宬 室 宫 宪 突 穿 窀 窃 客 诫 冠 诬 语 扁 扃 袆 衲 衽 袄 衿 袂 祛 祜 祓 祖 神 祝 祚 诮 祗 祢 祠 误 诰 诱 诲 诳 鸩 说 昶 诵 ";
    $this->data[8][4]="郡 垦 退 既 屋 昼 咫 屏 屎 弭 费 陡 逊 牁 眉 胥 孩 陛 陟 陧 陨 除 险 院 娃 姞 姥 娅 姨 娆 姻 姝 娇 姚 姽 姣 姘 姹 娜 怒 架 贺 盈 怼 羿 勇 炱 怠 癸 蚤 柔 矜 垒 绑 绒 结 绔 骁 绕 骄 骅 绗 绘 给 绚 彖 绛 络 骆 绝 绞 骇 统 骈 ";
    $this->data[9][0]="耕 耘 耖 耗 耙 艳 挈 恝 泰 秦 珥 珙 顼 珰 珠 珽 珩 珧 珣 珞 琤 班 珲 敖 素 匿 蚕 顽 盏 匪 恚 捞 栽 捕 埔 埂 捂 振 载 赶 起 盐 捎 捍 埕 捏 埘 埋 捉 捆 捐 埚 埙 损 袁 挹 捌 都 哲 逝 耆 耄 捡 挫 捋 埒 换 挽 贽 挚 热 恐 捣 垸 壶 捃 捅 盍 埃 挨 耻 耿 耽 聂 莰 茝 荸 莆 恭 莽 莱 莲 莳 莫 莴 莪 莉 莠 莓 荷 莜 莅 荼 莶 莩 荽 获 莸 荻 莘 晋 恶 莎 莞 莹 莨 莺 真 莙 鸪 莼 框 梆 桂 桔 栲 栳 郴 桓 栖 桡 桎 桢 桄 档 桐 桤 株 梃 栝 桥 桕 桦 桁 栓 桧 桃 桅 栒 格 桩 校 核 样 栟 桉 根 栩 逑 索 逋 彧 哥 速 鬲 豇 逗 栗 贾 酐 酎 酌 配 酏 逦 翅 辱 唇 厝 孬 夏 砝 砹 砸 砺 砰 砧 砷 砟 砼 砥 砾 砣 础 破 硁 恧 原 套 剞 逐 砻 烈 殊 殉 顾 轼 轾 轿 辀 辁 辂 较 鸫 顿 趸 毙 致 ";
    $this->data[9][1]="剕 龀 柴 桌 鸬 虔 虑 监 紧 逍 党 眬 唛 逞 晒 晟 眩 眠 晓 眙 唝 哧 哳 哮 唠 鸭 晃 哺 哽 唔 晔 晌 晁 剔 晏 晖 晕 鸮 趵 趿 畛 蚌 蚨 蚜 蚍 蚋 蚬 畔 蚝 蚧 蚣 蚊 蚪 蚓 哨 唢 哩 圃 哭 圄 哦 唣 唏 恩 盎 唑 鸯 唤 唁 哼 唧 啊 唉 唆 帱 崂 崃 罡 罢 罟 峭 峨 峪 峰 圆 觊 峻 贼 贿 赂 赃 赅 赆 ";
    $this->data[9][2]="钰 钱 钲 钳 钴 钵 钷 钹 钺 钻 钼 钽 钾 钿 铀 铁 铂 铃 铄 铅 铆 铈 铉 铊 铋 铌 铍 铎 眚 缺 氩 氤 氦 氧 氨 毪 特 牺 造 乘 敌 舐 秣 秫 秤 租 秧 积 盉 秩 称 秘 透 笄 笕 笔 笑 笊 笫 笏 笋 笆 俸 倩 债 俵 倻 借 偌 值 倚 俺 倾 倒 俳 俶 倬 倏 倘 俱 倡 候 赁 恁 倭 倪 俾 倜 隼 隽 倞 俯 倍 倦 倓 倌 倥 臬 健 臭 射 皋 躬 息 郫 倨 倔 衄 颀 徒 徕 徐 殷 舰 舨 舱 般 航 舫 瓞 途 拿 釜 耸 爹 舀 爱 豺 豹 奚 鬯 衾 鸰 颁 颂 翁 胯 胰 胱 胴 胭 脍 脎 脆 脂 胸 胳 脏 脐 胶 脑 胲 胼 朕 脒 胺 脓 鸱 玺 鱽 鸲 逛 狴 狸 狷 猁 狳 猃 狺 逖 狼 卿 狻 逢 桀 鸵 留 袅 眢 鸳 皱 饽 饿 馀 馁 ";
    $this->data[9][3]="凌 凇 凄 栾 挛 恋 桨 浆 衰 勍 衷 高 亳 郭 席 准 座 脊 症 疳 疴 病 疽 疸 疾 痄 斋 疹 痈 疼 疱 疰 痃 痂 疲 痉 脊 效 离 衮 紊 唐 凋 颃 瓷 资 恣 凉 站 剖 竞 部 旁 旆 旄 旅 旃 畜 阃 阄 阅 阆 羞 羔 恙 瓶 桊 拳 敉 粉 料 粑 益 兼 朔 郸 烤 烘 烜 烦 烧 烛 烟 烨 烩 烙 烊 剡 郯 烬 递 涛 浙 涝 浡 浦 涑 浯 酒 涞 涟 涉 娑 消 涅 涠 浞 涓 涢 涡 浥 涔 浩 海 浜 涂 浠 浴 浮 涣 浼 涤 流 润 涧 涕 浣 浪 浸 涨 烫 涩 涌 涘 浚 悖 悚 悟 悭 悄 悍 悝 悃 悒 悔 悯 悦 悌 悢 悛 害 宽 宸 家 宵 宴 宾 窍 窅 窄 容 窈 剜 宰 案 请 朗 诸 诹 诺 读 扅 诼 冢 扇 诽 袜 袪 袒 袖 袗 袍 袢 被 袯 祯 祧 祥 课 冥 诿 谀 谁 谂 调 冤 谄 谅 谆 谇 谈 谊 ";
    $this->data[9][4]="剥 恳 展 剧 屑 屐 屙 弱 陵 陬 勐 奘 疍 牂 蚩 祟 陲 陴 陶 陷 陪 烝 姬 娠 娱 娌 娉 娟 娲 恕 娥 娩 娴 娣 娘 娓 婀 砮 哿 畚 通 能 难 逡 预 桑 剟 绠 骊 绡 骋 绢 绣 验 绤 绥 绦 骍 继 绨 骎 骏 邕 烝 鸶 ";
    $this->data[10][0]="彗 耜 焘 舂 琎 球 琏 琐 理 琇 麸 琉 琅 捧 掭 堵 揶 措 描 埴 域 捺 掎 埼 掩 埯 捷 捯 排 焉 掉 掳 掴 埸 堌 捶 赦 赧 推 堆 捭 埠 晳 掀 逵 授 捻 埝 堋 教 堍 掏 掐 掬 鸷 掠 掂 掖 培 掊 接 堉 掷 掸 控 捩 掮 探 悫 埭 埽 据 掘 掺 掇 掼 职 聃 基 聆 勘 聊 聍 娶 菁 菝 著 菱 萁 菥 菘 堇 勒 黄 萘 萋 勩 菽 菖 萌 萜 萝 菌 萎 萸 萑 菂 菜 棻 菔 菟 萄 萏 菊 萃 菩 菼 菏 萍 菹 菠 菪 菅 菀 萤 营 萦 乾 萧 菰 菡 萨 菇 械 梽 彬 梵 梦 婪 梗 梧 梾 梢 梏 梅 觋 检 桴 桷 梓 梳 棁 梯 桫 棂 桶 梭 救 啬 郾 匮 曹 敕 副 豉 票 鄄 酝 酞 酗 酚 厢 厣 戚 戛 硎 硅 硭 硒 硕 硖 硗 硐 硚 硇 硌 鸸 瓠 匏 奢 盔 爽 厩 聋 龚 袭 殒 殓 殍 盛 赉 匾 雩 雪 辄 辅 辆 堑 ";
    $this->data[10][1]="龁 颅 虚 彪 雀 堂 常 眶 眭 唪 眦 啧 匙 晡 晤 晨 眺 眵 睁 眯 眼 眸 悬 野 圊 啪 啦 喏 喵 啉 勖 曼 晦 晞 晗 晚 冕 啄 啭 啡 畦 趼 趺 距 趾 啃 跃 啮 跄 略 蚶 蛄 蛎 蛆 蚰 蚺 蛊 圉 蚱 蚯 蛉 蛀 蛇 蛏 蚴 唬 累 鄂 唱 患 啰 唾 唯 啤 啥 啁 啕 唿 啐 唼 唷 啴 啖 啵 啶 啷 唳 啸 啜 帻 崖 崎 崦 崭 逻 帼 崮 崔 帷 崟 崤 崩 崞 崇 崆 崛 赇 赈 婴 赊 圈 ";
    $this->data[10][2]="铐 铑 铒 铕 铗 铘 铙 銍 铛 铜 铝 铞 铟 铠 铡 铢 铣 铤 铥 铧 铨 铩 铪 铫 铭 铬 铮 铯 铰 铱 铲 铳 铴 铵 银 铷 矫 氪 牾 甜 鸹 秸 梨 犁 稆 秽 移 秾 逶 笺 筇 笨 笸 笼 笪 笛 笙 笮 符 笱 笠 笥 第 笳 笤 笾 笞 敏 偾 做 鸺 偃 偕 袋 悠 偿 偶 偈 偎 偲 傀 偷 您 偬 售 停 偻 偏 躯 皑 兜 皎 假 衅 鸻 徘 徙 徜 得 衔 舸 舻 舳 盘 舴 舶 船 鸼 舷 舵 斜 龛 盒 鸽 瓻 敛 悉 欲 彩 领 翎 脚 脖 脯 豚 脶 脸 脞 脬 脱 脘 脲 脧 匐 鱾 象 够 逸 猜 猪 猎 猫 猗 凰 猖 猡 猊 猞 猄 猝 斛 觖 猕 猛 馗 祭 馃 馄 馅 馆 ";
    $this->data[10][3]="凑 减 鸾 毫 孰 烹 庶 庹 麻 庵 庼 庾 庳 痔 痍 疵 痊 痒 痕 廊 康 庸 鹿 盗 章 竟 翊 商 旌 族 旎 旋 望 袤 率 阇 阈 阉 阊 阋 阌 阍 阎 阏 阐 着 羚 羝 羟 盖 眷 粝 粘 粗 粕 粒 断 剪 兽 焐 焊 烯 焓 焕 烽 焖 烷 烺 焌 清 渍 添 渚 鸿 淇 淋 淅 淞 渎 涯 淹 涿 渠 渐 淑 淖 挲 淌 淏 混 淠 涸 渑 淮 淦 淆 渊 淫 淝 渔 淘 淳 液 淬 涪 淤 淡 淙 淀 涫 深 渌 涮 涵 婆 梁 渗 淄 情 惬 悻 惜 惭 悱 悼 惝 惧 惕 惘 悸 惟 惆 惚 惊 惇 惦 悴 惮 惋 惨 惯 寇 寅 寄 寂 逭 宿 窒 窑 窕 密 谋 谌 谍 谎 谏 扈 皲 谐 谑 裆 袱 袼 裈 裉 祷 祸 祲 谒 谓 谔 谕 谖 谗 谙 谚 谛 谜 谝 敝 ";
    $this->data[10][4]="逮 逯 敢 尉 屠 艴 弹 隋 堕 郿 随 蛋 隅 隈 粜 隍 隗 隆 隐 婧 婊 婞 婳 婕 娼 婢 婚 婵 婶 婉 胬 袈 颇 颈 翌 恿 欸 绩 绪 绫 骐 续 骑 绮 绯 绰 骒 绲 绳 骓 维 绵 绶 绷 绸 绹 绺 绻 综 绽 绾 绿 骖 缀 缁 巢 ";
    $this->data[11][0]="耠 琫 琵 琴 琶 琪 瑛 琳 琦 琢 琥 琨 靓 琼 斑 琰 琮 琯 琬 琛 琚 辇 替 鼋 揳 揍 款 堪 堞 搽 塔 搭 塃 揸 堰 揠 堙 揩 越 趄 趁 趋 超 揽 提 堤 揖 博 揾 颉 揭 喜 彭 揣 塄 揿 插 揪 搜 煮 堠 耋 揄 援 搀 蛰 蛩 絷 塆 裁 揞 搁 搓 搂 搅 揎 壹 握 摒 揆 搔 揉 掾 葜 聒 斯 期 欺 联 葑 葚 葫 靰 靸 散 葳 惹 蒇 葬 蒈 募 葺 葛 蒉 葸 萼 蓇 萩 董 葆 葩 葡 敬 葱 蒋 葶 蒂 蒌 篊 蒎 落 萱 葖 韩 戟 朝 葭 辜 葵 棒 楮 棱 棋 椰 植 森 棼 焚 椟 椅 椒 棹 棵 棍 椤 棰 椎 棉 椑 鹀 赍 棚 椋 椁 棬 棕 棺 榔 楗 棣 椐 椭 鹁 惠 惑 逼 覃 粟 棘 酣 酤 酢 酥 酡 酦 鹂 觌 厨 厦 硬 硝 硪 硷 确 硫 雁 厥 殖 裂 雄 殚 殛 颊 雳 雯 辊 辋 椠 暂 辌 辍 辎 雅 翘 ";
    $this->data[11][1]="辈 斐 悲 紫 凿 黹 辉 敞 棠 牚 赏 掌 晴 睐 暑 最 晰 量 睑 睇 鼎 睃 喷 戢 喋 嗒 喃 喳 晶 喇 遇 喊 喱 喹 遏 晷 晾 景 喈 畴 践 跖 跋 跌 跗 跞 跚 跑 跎 跏 跛 跆 遗 蛙 蛱 蛲 蛭 蛳 蛐 蛔 蛛 蜓 蛞 蜒 蛤 蛴 蛟 蛘 蛑 畯 喁 喝 鹃 喂 喟 斝 喘 啾 嗖 喤 喉 喻 喑 啼 嗟 喽 嗞 喧 喀 喔 喙 嵌 嵘 嵖 幅 崴 遄 詈 帽 嵎 崽 嵚 嵬 嵛 翙 嵯 嵝 嵫 幄 嵋 赋 赌 赎 赐 赑 赔 黑 ";
    $this->data[11][2]="铸 铹 铺 铻 铼 铽 链 铿 销 锁 锃 锄 锂 锅 锆 锇 锈 锉 锊 锋 锌 锎 锏 锐 锑 锒 锓 锔 锕 甥 掣 掰 短 智 矬 氰 毳 毯 氮 毽 氯 犊 犄 犋 鹄 犍 鹅 颋 剩 嵇 稍 程 稀 黍 稃 税 稂 筐 等 筘 筑 策 筚 筛 筜 筒 筅 筏 筵 筌 答 筋 筝 傣 傲 傅 傈 舄 牍 牌 傥 堡 集 焦 傍 傧 储 遑 皓 皖 粤 奥 傩 遁 街 惩 御 徨 循 舾 艇 舒 畲 弑 逾 颌 翕 釉 番 释 鹆 禽 舜 貂 腈 腊 腌 腓 腆 腴 脾 腋 腑 腙 腚 腔 腕 腱 腒 鱿 鲀 鲁 鲂 鲃 颍 猢 猹 猩 猥 猬 猾 猴 飓 觞 觚 猸 猱 惫 飧 然 馇 馈 馉 馊 馋 ";
    $this->data[11][3]="亵 装 蛮 脔 就 敦 裒 廋 斌 痣 痨 痦 痘 痞 痢 痤 痪 痫 痧 痛 鄌 赓 竦 童 瓿 竣 啻 颏 鹇 阑 阒 阔 阕 善 翔 羡 普 粪 粞 尊 奠 遒 道 遂 孳 曾 焯 焜 焰 焙 焱 鹈 湛 港 渫 滞 湖 湘 渣 渤 湮 湎 湝 湨 湜 渺 湿 温 渴 渭 溃 湍 溅 滑 湃 湫 溲 湟 溆 渝 湲 湾 渡 游 溠 溇 湔 滋 湉 渲 溉 渥 湄 滁 愤 慌 惰 愠 惺 愦 愕 惴 愣 愀 愎 惶 愧 愉 愔 慨 喾 割 寒 富 寓 窜 窝 窖 窗 窘 寐 谟 扉 遍 棨 雇 扊 裢 裎 裣 裕 裤 裥 裙 祾 祺 祼 谠 禅 禄 幂 谡 谢 谣 谤 谥 谦 谧 ";
    $this->data[11][4]="堲 遐 犀 属 屡 孱 弼 强 粥 巽 疏 隔 骘 隙 隘 媒 媪 絮 嫂 媛 婷 媚 婿 巯 毵 翚 登 皴 婺 骛 缂 缃 缄 缅 彘 缆 缇 缈 缉 缌 缎 缏 缑 缒 缓 缔 缕 骗 编 缗 骙 骚 缘 飨 ";
    $this->data[12][0]="耢 瑟 瑚 鹉 瑁 瑞 瑰 瑀 瑜 瑗 瑄 瑕 遨 骜 瑙 遘 韫 魂 髡 肆 摄 摸 填 搏 塥 塬 鄢 趔 趑 摅 塌 摁 鼓 摆 赪 携 塮 蜇 搋 搬 摇 搞 搪 塘 搒 搐 搛 搠 摈 彀 毂 搌 搦 摊 搡 聘 蓁 戡 斟 蒜 蓍 鄞 勤 靴 靳 靶 鹊 蓐 蓝 墓 幕 蓦 鹋 蒽 蓓 蓖 蓊 蒯 蓟 蓬 蓑 蒿 蒺 蓠 蒟 蒡 蓄 蒹 蒴 蒲 蒗 蓉 蒙 蓂 蓥 颐 蒸 献 蓣 楔 椿 楠 禁 楂 楚 楝 楷 榄 想 楫 榀 楞 楸 椴 槐 槌 楯 榆 榇 榈 槎 楼 榉 楦 概 楣 楹 椽 裘 赖 剽 甄 酮 酰 酯 酪 酩 酬 蜃 感 碛 碍 碘 碓 碑 硼 碉 碎 碚 碰 碇 碗 碌 碜 鹌 尴 雷 零 雾 雹 辏 辐 辑 辒 输 ";
    $this->data[12][1]="督 频 龃 龄 龅 龆 觜 訾 粲 虞 鉴 睛 睹 睦 瞄 睚 嗪 睫 韪 嗷 嗉 睡 睨 睢 雎 睥 睬 嘟 嗜 嗑 嗫 嗬 嗔 鄙 嗦 嗝 愚 戥 嗄 暖 盟 煦 歇 暗 暅 暄 暇 照 遢 暌 畸 跬 跨 跶 跷 跸 跐 跣 跹 跳 跺 跪 路 跻 跤 跟 遣 蛸 蜈 蜎 蜗 蛾 蜊 蜍 蜉 蜂 蜣 蜕 畹 蛹 嗣 嗯 嗅 嗥 嗲 嗳 嗡 嗌 嗍 嗨 嗤 嗵 嗓 署 置 罨 罪 罩 蜀 幌 嵊 嵩 嵴 骰 ";
    $this->data[12][2]="锖 锗 错 锘 锚 锛 锜 锝 锞 锟 锡 锢 锣 锤 锥 锦 锧 锨 锪 锫 锩 锬 锭 键 锯 锰 锱 矮 雉 氲 犏 辞 歃 稞 稚 稗 稔 稠 颓 愁 筹 筠 筢 筮 筻 筲 筼 筱 签 简 筷 毁 舅 鼠 牒 煲 催 傻 像 躲 鹎 魁 敫 僇 衙 微 徭 愆 艄 觎 毹 愈 遥 貊 貅 貉 颔 腻 腠 腩 腰 腼 腽 腥 腮 腭 腹 腺 腧 鹏 塍 媵 腾 腿 詹 鲅 鲆 鲇 鲈 鲉 鲊 稣 鲋 鲌 鲍 鲏 鲐 肄 猿 颖 鹐 飔 飕 觥 触 解 遛 煞 雏 馌 馍 馏 馐 ";
    $this->data[12][3]="珺 酱 鹑 禀 亶 廒 瘃 痱 痹 痼 廓 痴 痿 瘐 瘁 瘅 痰 瘆 廉 鄘 麂 裔 靖 新 鄣 歆 韵 意 旒 雍 阖 阗 阘 阙 羧 豢 誊 粳 粮 数 煎 猷 塑 慈 煤 煳 煜 煨 煅 煌 煊 煸 煺 滟 溱 溘 滠 满 漭 漠 滢 滇 溥 溧 溽 源 滤 滥 裟 溻 溷 溦 滗 滫 溴 滏 滔 溪 滃 溜 滦 漓 滚 溏 滂 溢 溯 滨 溶 滓 溟 滘 溺 滍 粱 滩 滪 愫 慑 慎 慥 慊 誉 鲎 塞 骞 寞 窥 窦 窠 窣 窟 寝 谨 裱 褂 褚 裸 裼 裨 裾 裰 禊 福 谩 谪 谫 谬 ";
    $this->data[12][4]="群 殿 辟 障 媾 嫫 媳 媲 嫒 嫉 嫌 嫁 嫔 媸 叠 缙 缜 缚 缛 辔 缝 骝 缟 缠 缡 缢 缣 缤 骟 剿 ";
    $this->data[13][0]="耥 璈 静 碧 瑶 璃 瑭 瑢 獒 赘 熬 觏 慝 嫠 韬 髦 墈 墙 摽 墟 撇 墁 撂 摞 嘉 摧 撄 赫 截 翥 踅 誓 銎 摭 墉 境 摘 墒 摔 穀 撖 摺 綦 聚 蔫 蔷 靺 靼 鞅 靽 鞁 靿 蔌 蔽 慕 暮 摹 蔓 蔑 甍 蔸 蓰 蔹 蔡 蔗 蔟 蔺 戬 蔽 蕖 蔻 蓿 蔼 斡 熙 蔚 鹕 兢 嘏 蓼 榛 榧 模 槚 槛 榻 榫 槜 榭 槔 榴 槁 榜 槟 榨 榕 槠 榷 榍 歌 遭 僰 酵 酽 酾 酲 酷 酶 酴 酹 酿 酸 厮 碶 碡 碟 碴 碱 碣 碳 碲 磋 磁 碹 碥 愿 劂 臧 豨 殡 需 霆 霁 辕 辖 辗 ";
    $this->data[13][1]="蜚 裴 翡 雌 龇 龈 睿 弊 裳 颗 夥 瞅 瞍 睽 墅 嘞 嘈 嗽 嘌 嘁 嘎 暧 暝 踌 踉 跽 踊 蜻 蜞 蜡 蜥 蜮 蜾 蝈 蜴 蝇 蜘 蜱 蜩 蜷 蝉 蜿 螂 蜢 嘘 嘡 鹗 嘣 嘤 嘚 嘛 嘀 嗾 嘧 罴 罱 幔 嶂 幛 赙 罂 赚 骷 骶 鹘 ";
    $this->data[13][2]="锲 锴 锶 锷 锸 锹 锻 鍠 锾 锵 锿 镀 镁 镂 镃 镄 镅 舞 犒 舔 稳 熏 箐 箦 箧 箍 箸 箨 箕 箬 算 箅 箩 箪 箔 管 箜 箢 箫 箓 毓 舆 僖 儆 僳 僚 僭 僬 劁 僦 僮 僧 鼻 魄 魅 魃 魆 睾 艋 鄱 貌 膜 膊 膈 膀 膑 鲑 鲔 鲙 鲚 鲛 鲜 鲟 疑 獐 獍 飗 觫 雒 孵 夤 馑 馒 ";
    $this->data[13][3]="銮 裹 敲 豪 膏 塾 遮 麽 廙 腐 瘩 瘌 瘗 瘟 瘦 瘊 瘥 瘘 瘙 廖 辣 彰 竭 韶 端 旗 旖 膂 阚 鄯 鲞 精 粼 粹 粽 糁 歉 槊 鹚 弊 熄 熘 熔 煽 熥 潢 潆 潇 漤 漆 漕 漱 漂 滹 漫 漯 漶 潋 潴 漪 漉 漳 滴 漩 漾 演 澉 漏 潍 慢 慷 慵 寨 赛 搴 寡 窬 窨 窭 察 蜜 寤 寥 谭 肇 綮 谮 褡 褙 褐 褓 褛 褊 褪 禚 谯 谰 谱 谲 ";
    $this->data[13][4]="暨 屣 鹛 隧 嫣 嫱 嫩 嫖 嫦 嫚 嫘 嫜 嫡 嫪 鼐 翟 翠 熊 凳 瞀 鹜 骠 缥 缦 缧 骡 缨 骢 缩 缪 缫 ";
    $this->data[14][0]="菲 慧 耦 耧 瑾 璜 璀 璎 璁 璋 璇 璆 奭 撵 髯 髫 撷 撕 撒 撅 撩 趣 趟 撑 撮 撬 赭 播 墦 擒 撸 鋆 墩 撞 撤 撙 增 撺 墀 撰 聩 聪 觐 鞋 鞑 蕙 鞒 鞍 蕈 蕨 蕤 蕞 蕺 瞢 蕉 劐 蕃 蕲 蕰 蕊 赜 蔬 蕴 鼒 槿 横 樯 槽 槭 樗 樘 樱 樊 橡 槲 樟 橄 敷 鹝 豌 飘 醋 醌 醇 醉 醅 靥 魇 餍 磕 磊 磔 磙 磅 碾 磉 殣 憖 震 霄 霉 霈 辘 ";
    $this->data[14][1]="龉 龊 觑 憋 瞌 瞒 题 暴 瞎 瞑 嘻 嘭 噎 嘶 噶 嘲 颙 暹 嘹 影 踔 踝 踢 踏 踟 踬 踩 踮 踣 踯 踪 踺 踞 蝽 蝶 蝾 蝴 蝻 蝠 蝰 蝎 蝌 蝮 螋 蝗 蝓 蝣 蝼 蝤 蝙 噗 嘬 颚 嘿 噍 噢 噙 噜 噌 嘱 噀 噔 颛 幞 幡 嶓 幢 嶙 嶝 墨 骺 骼 骸 ";
    $this->data[14][2]="镊 镆 镇 镈 镉 镋 镌 镍 镎 镏 镐 镑 镒 镓 镔 靠 稽 稷 稻 黎 稿 稼 箱 箴 篑 篁 篌 篓 箭 篇 篆 僵 牖 儇 儋 躺 僻 德 徵 艘 磐 虢 鹞 鹟 膝 膘 膛 滕 鲠 鲡 鲢 鲣 鲥 鲤 鲦 鲧 鲩 鲪 鲫 鲬 橥 獗 獠 觯 鹠 馓 馔 ";
    $this->data[14][3]="熟 摩 麾 褒 廛 鹡 瘛 瘼 瘪 瘢 瘤 瘠 瘫 齑 鹡 凛 颜 毅 羯 羰 糊 糇 遴 糌 糍 糈 糅 翦 遵 鹣 憋 熜 熵 熠 潜 澍 澎 澌 潵 潮 潸 潭 潦 鲨 潲 鋈 潟 澳 潘 潼 澈 澜 潽 潺 澄 潏 懂 憬 憔 懊 憧 憎 寮 窳 额 谳 翩 褥 褴 褫 禤 谴 鹤 谵 ";
    $this->data[14][4]="憨 熨 慰 劈 履 屦 嬉 勰 戮 蝥 豫 缬 缭 缮 缯 骣 畿 ";
    $this->data[15][0]="耩 耨 耪 璞 璟 靛 璠 璘 聱 螯 髻 髭 髹 擀 撼 擂 操 熹 甏 擐 擅 擞 磬 鄹 颞 蕻 鞘 燕 黇 颟 薤 蕾 薯 薨 薛 薇 檠 擎 薪 薏 蕹 薮 薄 颠 翰 噩 薜 薅 樾 橱 橛 橇 樵 檎 橹 橦 樽 樨 橙 橘 橼 墼 整 橐 融 翮 瓢 醛 醐 醍 醒 醚 醑 觱 磺 磲 赝 飙 殪 霖 霏 霓 霍 霎 錾 辙 辚 臻 ";
    $this->data[15][1]="冀 餐 遽 氅 瞥 瞟 瞠 瞰 嚄 嚆 噤 暾 曈 蹀 蹅 踶 踹 踵 踽 嘴 踱 蹄 蹉 蹁 蹂 螨 蟒 蟆 螈 螅 螭 螗 螃 螠 螟 噱 器 噪 噬 噫 噻 噼 幪 罹 圜 鹦 赠 默 黔 ";
    $this->data[15][2]="镖 镗 镘 镚 镛 镜 镝 镞 镠 氇 氆 赞 憩 穑 穆 穄 篝 篚 篥 篮 篡 簉 篦 篪 篷 篙 篱 盥 儒 劓 翱 魉 魈 邀 徼 衡 歙 盫 膨 膪 膳 螣 膦 膙 雕 鲭 鲮 鲯 鲰 鲱 鲲 鲳 鲴 鲵 鲷 鲸 鲺 鲹 鲻 獴 獭 獬 邂 ";
    $this->data[15][3]="憝 亸 鹧 磨 廨 赟 癀 瘭 瘰 廪 瘿 瘵 瘴 癃 瘾 瘸 瘳 斓 麇 麈 凝 辨 辩 嬴 壅 羲 糙 糗 糖 糕 瞥 甑 燎 燠 燔 燃 燧 燊 燏 濑 濒 濉 潞 澧 澡 澴 激 澹 澥 澶 濂 澼 憷 懒 憾 懈 黉 褰 寰 窸 窿 褶 禧 ";
    $this->data[15][4]="壁 避 嬖 犟 隰 嬗 鹨 翯 颡 缰 缱 缲 缳 缴 ";
    $this->data[16][0]="璨 璩 璐 璪 戴 螫 擤 壕 擦 觳 罄 擢 藉 薹 鞡 鞠 藏 薷 薰 藐 藓 藁 檬 檑 檄 檐 檩 檀 懋 醢 翳 繄 礁 礅 磷 磴 鹩 霜 霞 ";
    $this->data[16][1]="龋 龌 豳 壑 黻 瞭 瞧 瞬 瞳 瞵 瞩 瞪 嚏 曙 嚅 蹑 蹒 蹋 蹈 蹊 蹓 蹐 蟥 螬 螵 疃 螳 螺 蟋 蟑 蟀 嚎 嚓 羁 罽 罾 嶷 赡 黜 黝 髁 髀 ";
    $this->data[16][2]="镡 镢 镣 镤 镥 镦 镧 镨 镩 镪 镫 罅 穗 黏 魏 簧 簌 篾 簃 篼 簏 簇 簖 簋 繁 鼢 黛 儡 鹪 鼾 皤 魍 徽 艚 龠 爵 繇 貘 邈 貔 臌 朦 臊 膻 臁 臆 臃 鲼 鲽 鲾 鳀 鳁 鳂 鳃 鳄 鳅 鳆 鳇 鳈 鳉 鳊 獯 螽 ";
    $this->data[16][3]="燮 鹫 襄 糜 縻 膺 癍 癌 麋 辫 赢 糟 糠 馘 燥 懑 濡 濮 濞 濠 濯 懦 豁 蹇 謇 邃 襕 襁 ";
    $this->data[16][4]="臀 檗 甓 臂 擘 孺 隳 嬷 翼 蟊 鹬 鍪 骤 ";
    $this->data[17][0]="鏊 鳌 鬹 鬈 鬃 瞽 藕 鞯 鞨 鞭 鞫 鞧 鞣 藜 藠 藤 藩 鹲 檫 檵 覆 醪 蹙 礞 礓 礌 燹 餮 ";
    $this->data[17][1]="蹩 瞿 瞻 曛 颢 曜 躇 蹦 鹭 蹢 蹜 蟛 蟪 蟠 蟮 嚚 嚣 鹮 黠 黟 髅 髂 ";
    $this->data[17][2]="镬 镭 镯 镰 镱 馥 簠 簟 簪 簦 鼫 鼬 鼩 雠 艟 翻 臑 鳍 鳎 鳏 鳐 鳐 鳑 鹱 ";
    $this->data[17][3]="鹰 癞 癔 癜 癖 糨 冁 瀑 瀍 瀌 鎏 懵 襟 ";
    $this->data[17][4]="璧 戳 彝 邋 ";
    $this->data[18][0]="鬏 攉 攒 鞲 鞴 藿 蘧 孽 蘅 警 蘑 藻 麓 攀 醭 醮 醯 礤 酃 霪 霭 ";
    $this->data[18][1]="黼 鳖 曝 嚯 蹰 蹶 蹽 蹼 蹯 蹴 蹾 蹲 蹭 蹿 蹬 蠖 蠓 蠋 蟾 蠊 巅 黢 髋 髌 ";
    $this->data[18][2]="镲 籀 簸 籁 簿 鳘 齁 魑 艨 鼗 鳓 鳔 鳕 鳗 鳙 鳚 蟹 ";
    $this->data[18][3]="颤 靡 癣 麒 鏖 瓣 蠃 羸 羹 爆 瀚 瀣 瀛 襦 谶 ";
    $this->data[18][4]="襞 疆 骥 缵 ";
    $this->data[19][0]="瓒 鬓 壤 攘 馨 蘩 蘖 蘘 醵 醴 霰 颥 ";
    $this->data[19][1]="酆 耀 矍 曦 躁 躅 蠕 鼍 嚼 嚷 巍 巉 黩 黥 ";
    $this->data[19][2]="镳 镴 黧 籍 纂 鼯 犨 臜 鳜 鳝 鳞 鳟 獾 ";
    $this->data[19][3]="魔 糯 灌 瀹 瀵 ";
    $this->data[19][4]="譬 孀 骧 ";
    $this->data[20][0]="耰 蠢 瓘 鼙 醺 礴 礳 霸 露 霹 ";
    $this->data[20][1]="颦 曩 躏 黯 髓 ";
    $this->data[20][2]="鼱 鳡 鳢 ";
    $this->data[20][3]="癫 麝 赣 夔 爝 灏 禳 ";
    $this->data[20][4]="鐾 羼 蠡 ";
    $this->data[21][0]="耲 耱 懿 韂 蘸 鹳 糵 蘼 囊 霾 ";
    $this->data[21][1]="氍 饕 躔 躐 髑 ";
    $this->data[21][2]="镵 镶 穰 鳤 ";
    $this->data[21][3]="瓤 饔 ";
    $this->data[21][4]="鬻 ";
    $this->data[22][0]="鬟 趱 攫 攥 颧 ";
    $this->data[22][1]="躜 ";
    $this->data[22][2]="罐 鼹 鼷 ";
    $this->data[22][3]="癯 麟 蠲 ";
    $this->data[23][0]="矗 蠹 醾 ";
    $this->data[23][1]="躞 ";
    $this->data[23][2]="衢 鑫 ";
    $this->data[23][3]="灞 襻 ";
    $this->data[24][0]="纛 鬣 攮 ";
    $this->data[24][1]="囔 ";
    $this->data[24][2]="馕 ";
    $this->data[24][3]="戆 ";
    $this->data[25][1]="蠼 ";
    $this->data[29][2]="爨 ";
    $this->data[35][2]="齉 ";
  }
}

?>
