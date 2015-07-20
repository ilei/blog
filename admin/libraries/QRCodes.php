<?php 
require_once APPPATH . 'third_party/qrcode/phpqrcode.php';

class QRCodes{ 

   //图片保存地址 
    protected static $_img_dir = '/tmp/qrcode/png/';

   //纠错级别，纠错信息同样存储在二维码中，级别越高，纠错信息占用的空间越大 
    protected static $_error_correction_level = 'L';

    protected static $_error_correction_level_arr = array('L', 'M', 'Q', 'H');

    protected static $_matrix_point_size = 10;

    protected static $_in_img_path = '';

    public static function png_code($data, $filename = '', $error_correction_level = 'L', $matrix_point_size = 10){
        
        if(!in_array(trim($error_correction_level), self::$_error_correction_level_arr)){
           $error_correction_level = self::$_error_correction_level; 
        }

        $matrix_point_size = intval($matrix_point_size) > 0 ? intval($matrix_point_size) : self::$_matrix_point_size;

        if(empty($filename)){
            $filename = self::$_img_dir . md5($data . '|' . $error_correction_level . '|' . $matrix_point_size) . '.png';  
        }
        QRcode::png($data, $filename, $error_correction_level, $matrix_point_size, 2);    
        return basename($filename);
    }

    public function png_code_logo($data, $logo, $filename = '', $error_correction_level = 'L', $matrix_point_size = 10){

         //已经生成的原始二维码图   
        $QR_IMG = self::$_img_dir . $this->png_code($data, $filename, $error_correction_level, $matrix_point_size);
        if(!file_exists($logo)){
            return '请输入logo图片地址'; 
        }
        $QR             = imagecreatefromstring(file_get_contents($QR_IMG));   
        $logo           = imagecreatefromstring(file_get_contents($logo));   
        $QR_width       = imagesx($QR);//二维码图片宽度   
        $QR_height      = imagesy($QR);//二维码图片高度   
        $logo_width     = imagesx($logo);//logo图片宽度   
        $logo_height    = imagesy($logo);//logo图片高度   
        $logo_qr_width  = $QR_width / 5;   
        $scale          = $logo_width / $logo_qr_width;   
        $logo_qr_height = $logo_height / $scale;   
        $from_width     = ($QR_width - $logo_qr_width) / 2;   
        //重新组合图片并调整大小   
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);   
        imagepng($QR, $QR_IMG);
        return basename($QR_IMG);
    } 
}


