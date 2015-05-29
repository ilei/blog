<?php
/**
 * 图片类，生成图片
 */
class Img {

    public function save($file, $factor=NULL, $dir="upload",$duplicate=True) {
        $filename = $this->upload_filename($factor);
        $ext = substr($file['name'], strrpos($file['name'], "."));
        $imgsize = getimagesize($file['tmp_name']);
        if(! in_array($imgsize[2], array(1, 2, 3, 6))) {
            return false;
        }
        $filename .= $ext;
        @mkdir(STATICPATH . $dir);
        $fullname = STATICPATH . $dir . '/' . $filename;

        if (! file_exists($file['tmp_name'])) {
            return false;
            //return "file not exists";
        }
        else{
            if(file_exists($fullname)){
                $filename = $this->upload_filename($factor);
                $fullname = sprintf("%s%s/%s",STATICPATH,$dir,$filename);
            }

            if(! move_uploaded_file($file['tmp_name'], $fullname)) {
                return false;
                //return "move file error";
            }
        }

        if($duplicate){
            //new destination
            $new_dest = sprintf("%suploads/%s/%s/%s",
                    STATICPATH,
                    substr($filename,0,2),
                    substr($filename,2,2),
                    substr($filename,4,2));

            @mkdir($new_dest,0777,true);
            $new_fullname = sprintf("%s/%s",$new_dest,$filename);
            if($new_fullname !== $fullname){
                copy($fullname,$new_fullname);
            }
        }

        return $filename;
    }

    public function news_thumb($src, $newpath, $width, $height) {
        $data = getimagesize($src);
        $im = FALSE;
        switch ($data[2]) {
            case 1:
                if(function_exists("imagecreatefromgif")) {
                    $im = imagecreatefromgif($src);
                }
                break;
            case 2:
                if(function_exists("imagecreatefromjpeg")) {
                    $im = imagecreatefromjpeg($src);
                }
                break;
            case 3:
                $im = imagecreatefrompng($src);
                break;
        }
        if(!$im) {
            die($newpath);
            return FALSE;
        }
        $src_width = imagesx($im);
        $src_height = imagesy($im);
        $wh = $src_width / $src_height;
        $wh_new = $width / $height;
        if($wh_new <= $wh) {
            $src_width = $src_height * $wh_new;
        } else {
            $src_height = $src_width / $wh_new;
        }
        $new = imagecreatetruecolor($width, $height);
        imagecopyresampled($new, $im, 0, 0, 0, 0, $width, $height, $src_width, $src_height);
        imagejpeg($new, $newpath);
        imagedestroy($new);
        imagedestroy($im);
        return TRUE;
    }

    public function thumb($srcName, $newWidth, $newHeight) {
        $nameArr = explode('.', $srcName);
        $expName = array_pop($nameArr);
        $expName = 'thumb.'.$expName;
        array_push($nameArr,$expName);
        $filename = implode('.',$nameArr);
        $newName = STATICPATH . 'upload/' . $filename;
        $srcName = STATICPATH . 'upload/' . $srcName;

        $info = "";
        $data = getimagesize($srcName, $info);
        switch ($data[2]) {
            case 1:
                if(!function_exists("imagecreatefromgif")) {
                    echo "你的GD库不能使用GIF格式的图片，请使用Jpeg或PNG格式！返回";
                    exit();
                }
                $im = ImageCreateFromGIF($srcName);
                break;
            case 2:
                if(!function_exists("imagecreatefromjpeg")) {
                    echo "你的GD库不能使用jpeg格式的图片，请使用其它格式的图片！返回";
                    exit();
                }
                $im = ImageCreateFromJpeg($srcName);
                break;
            case 3:
                $im = ImageCreateFromPNG($srcName);
                break;
            default:
                return false;
        }
        $srcW = ImageSX($im);
        $srcH = ImageSY($im);
        $newWidthH = $newWidth / $newHeight;
        $srcWH = $srcW / $srcH;
        if($newWidthH <= $srcWH) {
            $ftoW = $newWidth;
            $ftoH = $ftoW * ($srcH / $srcW);
        }
        else {
            $ftoH = $newHeight;
            $ftoW = $ftoH * ($srcW / $srcH);
        }
        if($srcW > $newWidth || $srcH > $newHeight) {
            if(function_exists("imagecreatetruecolor")) {
                @$ni = ImageCreateTrueColor($ftoW, $ftoH);
                if($ni) ImageCopyResampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
                else {
                    $ni = ImageCreate($ftoW, $ftoH);
                    ImageCopyResized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
                }
            }
            else {
                $ni=ImageCreate($ftoW, $ftoH);
                ImageCopyResized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
            }
            if(function_exists('imagejpeg')) {
                ImageJpeg($ni,$newName);
            }
            else {
                ImagePNG($ni, $newName);
            }
            ImageDestroy($ni);
        }
        else {
            copy($srcName, $newName);
        }
        ImageDestroy($im);
        return $filename;
    }

    public function upload_filename($factor) {
        $str = time();
        if($factor) {
            if(is_array($factor)) {
                $str .= implode("", $factor);
            }
            else {
                $str .= $factor;
            }
        }
        return md5($str);
    }

}
