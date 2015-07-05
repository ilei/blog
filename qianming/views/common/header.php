<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo implode('-', array_reverse($title));?></title>
    <meta name="keywords" content="<?php echo implode(',', array_reverse($meta_keywords));?>">
    <meta name="description" content="<?php echo implode(',', array_reverse($meta_desc));?>">
    <meta name="author" content="ilei">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/static/qq/css/topic.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/qq/css/reset.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/qq/css/skin.css?v=<?php echo $last_release;?>">
    <?php if(isset($css) && $css):?>
    <?php foreach($css as $key => $v):?>
        <link rel="stylesheet" href="/static/qq/css/<?php echo $v?>.css?v=<?php echo $last_release;?>">
    <?php endforeach;?>
    <?php endif;?>
    <script type="text/javascript" src="/static/qq/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/static/qq/js/redirect.js"></script>
    <script type="text/javascript" src="/static/qq/js/base.js"></script>
    <script type="text/javascript" src="/static/qq/js/function.js"></script>
    <script type="text/javascript">
    $(function(){
        window.onerror=function(){return true;}
    });
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a91043b5616a5a1f92b614e90c6be326";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
    <div class=" g_nav_n m_nav f_mb10">
        <div class="f_cer">
            <ul class="m_nav f_lifl f_nav ">
                <li class="f_hov"><a class="n1" href="<?php echo site_url();?>" target="_blank">网站首页</a></li>
                <li class="f_hov">
                    <a class="n1" href="<?php echo site_url();?>" target="_self">QQ个性签名</a>
                </li>
            </ul>
        </div>
    </div>
    <div class=" f_cle f_cer f_mb10">
       <div class="m_divbai m_txfl">
            <a href="<?php echo site_url();?>" title="全部签名">全部签名</a>
            <span class="wzaa">
                <?php foreach($cates as $key => $cate):?>
                <?php if($cate['id'] == 101){continue;}?>
                <a title="QQ<?php echo $cate['cate_name'];?>" href="<?php echo site_url('list/' . $cate['cate_mark']);?>"><?php echo str_replace('个性', '', $cate['cate_name']);?></a>
                <!--<a title="伤感签名" href="/qm/shangganqm_1.html"><font color="#FF0000">伤感签名</font></a>-->
                <?php endforeach;?>
                <a title="QQ<?php echo '人生格言个性签名';?>" href="<?php echo site_url('list/renshenggeyan');?>"><?php echo '人生格言';?></a>
            </span>
        </div> 
    </div>
    <div class="clear"></div>
