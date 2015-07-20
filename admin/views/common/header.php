<!doctype html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo implode('-', array_reverse($title));?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<meta name="apple-mobile-web-app-title" content="ilei" />
		<link rel="stylesheet" href="/static/admin/css/bootstrap.css"/>
		<link rel="stylesheet" href="/static/admin/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/static/admin/css/manage-base.css">
	</head>
	<body data-module="<?php echo implode(' ', $modules);?>">
		<nav class="navbar navbar-admin">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="http://www.smartlei.com">小蝌蚪</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="###"><i class="fa fa-twitch"></i> 反馈<span class="label prompt-mail">12</span></a></li>
			  <li><a href="###"><i class="fa fa-envelope-o"></i> 邮件<span class="label prompt-mail">5</span></a></li>
			  <li class="dropdown">
				<a href="###" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Admin <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
				  <!-- <li class="divider"></li> -->
				  <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			  </li>
			</ul>
		  </div>
		</nav>
