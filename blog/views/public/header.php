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
    <link rel="stylesheet" href="/public/blog/css/style.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/public/blog/css/animation.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/public/blog/css/lrtk.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/public/blog/css/view.css?v=<?php echo $last_release;?>">
    <link rel="stylesheet" href="/public/blog/css/shCoreDefault.css?v=<?php echo $last_release;?>">
    <!--[if lt IE 9]>
    <script src="/public/blog/js/modernizr.js"></script>
    <![endif]-->
</head>
<body data-module="">
<header>
  <nav id="nav">
    <ul>
      <li><a href="<?php echo site_url();?>" >Home</a></li>
      <?php foreach($cate_right as $cate):?>
      <li>
        <a href="<?php echo site_url('article/list/' . $cate['pinyin']);?>" target="_blank" title="<?php echo $cate['name'];?>">
            <?php echo $cate['name'];?>
        </a>
      </li>
      <?php endforeach;?>
    </ul>
  </nav>
</header>
<!--header end-->
