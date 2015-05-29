<?php
/**
 *	2.0更新:支持中文验证码
 **/
class Captcha{

	//图片资源
	private $image=null;	

	//生成的验证码字的个数
	public $codeNum;	

	//验证码高度
	public $height;	

	//验证码宽度
	public $width;	

	//干扰元素数量
	private $disturbColorNum;	


	//生成的code
	public $code='';

	//是否生成中文验证码
	private $chinese;


	/*
	 *	架构函数 
	 *	验证码宽度 默认120
	 *	验证码高度 默认 35 
	 *	验证码数量 默认4
	 *
	 */
	public function __construct($width=100,$height=30,$codeNum=4){
		//判断服务器环境是否安装了GD库
		if (!extension_loaded('gd')) {
			if (!dl('gd.so')) {
				exit("未加载GD扩展");
			}
		}
		//初始化
		$this->width=$width;
		$this->height=$height;
		$this->codeNum=$codeNum;
		//设置干扰元素数量 
		$number=floor($width*$height/15);
		if($number > 240-$codeNum){
			$this->disturbColorNum=	240-$codeNum;
		}else{
			$this->disturbColorNum=$number;
		}
	}

	//显示验证码图片
	public function showImage($fontFace='',$chinese=false){
		$this->chinese=$chinese;
		//创建图片资源
		$this->createImage();
		//设置干扰颜色
		$this->setDisturbColor();
		//生成code
		$this->createCode();
		//往图片上添加文本
		$this->outputText($fontFace);
		//输出图像
		$this->ouputImage();
	}

	//创建图片 无边框
	private function createImage(){
		//生成图片资源
		$this->image=imagecreatetruecolor($this->width,$this->height);
		//画出图片背景
		$backColor=imagecolorallocate($this->image,mt_rand(255,255),mt_rand(255,255),mt_rand(255,255));
		imagefill($this->image,0,0,$backColor);
	}

	//设置干扰颜色
	private function setDisturbColor(){
		//画出点干扰
		for($i=0;$i<=$this->disturbColorNum;$i++){
			$pixelColor=imagecolorallocate($this->image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($this->image,mt_rand(0,$this->width),mt_rand(0,$this->height),$pixelColor);
		}
		//画出干扰线 待续

	}

	//往图片上添加文本
	private function outputText($fontFace=''){
		//画出code
		for($i=0;$i<$this->codeNum;$i++){
			$fontColor=imagecolorallocate($this->image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			//设置了fontFace 则使用imagettftext
			if($fontFace){
				$fontSize=mt_rand($this->width/$this->codeNum-8,$this->width/$this->codeNum-7);
				$x=floor(($this->width-4)/$this->codeNum)*$i+5;
				$y=mt_rand($fontSize, $this->height-2);
				imagettftext($this->image,$fontSize,mt_rand(-30, 30),$x,$y ,$fontColor, $fontFace,self::msubstr($this->code,$i));
			}else{
				//没有设置 fontFace 则使用 imagechar
				$fontSize=mt_rand(3,5);
				$x=floor($this->width/$this->codeNum)*$i+3;
				$y=mt_rand(0,$this->height-20);
				imagechar($this->image,$fontSize,$x,$y,$this->code{$i},$fontColor);
			}
		}	
	}

	//生成code
	private function createCode(){
		if(!$this->chinese){
			$string='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}else{
			$string = '';
		}	
		$code='';
		for($i=0;$i<$this->codeNum;$i++){
			$char=self::msubstr($string,mt_rand(0,mb_strlen($string,'utf-8')-1));
			$this->code.=$char;
		}
	}

	//输出图像
	private function ouputImage(){
		ob_clean();	//防止出现'图像因其本身有错无法显示'的问题
		if(imagetypes() & IMG_GIF){
			header("Content-Type:image/gif");
			imagepng($this->image);
		}else if(imagetypes() & IMG_JPG){
			header("Content-Type:image/jpeg");
			imagepng($this->image);
		}else if(imagetypes() & IMG_PNG){
			header("Content-Type:image/png");
			imagepng($this->image);
		}else if(imagetypes() & IMG_WBMP){
			header("Content-Type:image/vnd.wap.wbmp");
			imagepng($this->image);
		}else{
			die("PHP不支持图像创建");
		}	
	}
	/*
	 * msubstr() 截取字符串
	 *
	 */
	static private function msubstr($str, $start=0, $length=1, $charset="utf-8")
	{
		if(function_exists("mb_substr"))
			$slice = mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			$slice = iconv_substr($str,$start,$length,$charset);
		}else{
			$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all($re[$charset], $str, $match);
			$slice = join("",array_slice($match[0], $start, $length));
		}
		return $slice;
	}

	// 摧毁资源
	public function __destruct(){
		imagedestroy($this->image);
	}	
}
?>
