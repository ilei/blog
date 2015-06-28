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
    <link rel="stylesheet" href="/static/blog/css/style.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/blog/css/index.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/static/blog/css/shCoreDefault.css?v=<?php echo $last_release;?>">
    <script type="text/javascript" src="/static/blog/js/jquery1.42.min.js"></script>
    <script type="text/javascript" src="/static/blog/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/static/blog/js/shCore.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
         $(function(){
             SyntaxHighlighter.highlight();
         });
    </script>
</head>
<body>
    <!--header start-->
    <div id="header">
      <h1>享受编程，创造艺术。</h1>
      <p>追随自己的兴趣，时刻保持激情，Following your interests，keeping passions to yourself。</p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <ul>
         <li><a href="<?php echo site_url();?>">首页</a></li>
         <li><a target="_blank" href="<?php echo site_url('out');?>">外包</a></li>
        <!-- <li><a href="about.html">关于我</a></li>
         <li><a href="shuo.html">碎言碎语</a></li>
         <li><a href="riji.html">个人日记</a></li>
         <li><a href="xc.html">相册展示</a></li>
         <li><a href="learn.html">学无止境</a></li>
         <li><a href="guestbook.html">留言板</a></li>
        -->
         <div class="clear"></div>
        </ul>
      </div>
       <!--nav end-->
