<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo site_url('/static/admin/css/login.css');?>">
	<title>后台登陆</title>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			<?php echo C('base.title');?>
		</div>
		<div id="back">
			<a href="<?php echo site_url();?>">返回首页</a>&nbsp;&nbsp; | &nbsp;&nbsp;
			<a href="###">帮助</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
			<form action="<?php echo site_url('login');?>" method="post">
					<div id="login_tip">
						用户登录&nbsp;&nbsp;UserLogin
					</div>
					<div><input type="text" class="username" name="username"></div>
					<div><input type="password" class="pwd" name="password"></div>
					<div id="btn_area">
						<input type="submit" name="submit" id="sub_btn" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" class="verify">
							<img src="<?php echo site_url('captchas'); ?>" alt="" width="80" height="40" onclick="javascript:this.src=this.src + '?tm='+Math.random();">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		<?php echo C('base.copyright');?>
	</div>
<script src="<?php echo site_url('/static/js/core/require.js');?>" data-main="<?php echo site_url('/static/js/core/admin-main');?>"></script>
</body>
</html>
