<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo implode('-', array_reverse($title));?></title>
    <meta name="keywords" content="<?php echo implode(',', $meta_keywords);?>">
    <meta name="description" content="<?php echo $meta_desc;?>">
    <meta name="author" content="ilei">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/static/qq/css/topic.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/qq/css/reset.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/qq/css/skin.css?v=<?php echo $last_release;?>">
    <script type="text/javascript" src="/static/qq/js/jquery1.7.2.min.js"></script>
    <script type="text/javascript" src="/static/qq/js/redirect.js"></script>
    <script type="text/javascript" src="/static/qq/js/base.js"></script>
    <script type="text/javascript" src="/static/qq/js/function.js"></script>
    <script type="text/javascript">
    $(function(){
        window.onerror=function(){return true;}
    });
</script>
</head>
<body>
    <div class=" g_nav_n m_nav f_mb10">
        <div class="f_cer">
            <ul class="m_nav f_lifl f_nav ">
                <li class="f_hov"><a class="n1" href="<?php echo site_url();?>" target="_blank">网站首页</a></li>
                <li class="f_hov">
                    <a class="n1" href="<?php echo site_url('qq');?>" target="_self">QQ个性签名</a>
                </li>
            </ul>
        </div>
    </div>
    <div class=" f_cle f_cer f_mb10">
       <div class="m_divbai m_txfl">
            <a href="<?php echo site_url('qq');?>" title="全部签名">全部签名</a>
            <span class="wzaa">
                <?php foreach($cates as $key => $cate):?>
                <a title="qq<?php echo $cate['cate_name'];?>" href="<?php echo site_url('qq/' . $cate['cate_mark']);?>"><?php echo $cate['cate_name'];?></a>
                <!--<a title="伤感签名" href="/qm/shangganqm_1.html"><font color="#FF0000">伤感签名</font></a>-->
                <?php endforeach;?>
            </span>
        </div> 
    </div>
    <div class="clear"></div>
