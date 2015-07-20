<div class="row mb20">
	<div class="col-sm-12">
		<a class="btn btn-success pull-right" type="button" href="<?php echo site_url('home/index');?>"><i class="fa fa-arrow-left"></i> 返回列表</a>
	</div>
</div>
<form class="form-horizontal" action="<?php echo site_url('home/crawl');?>" role="form" id="website" novalidate="novalidate" method="post">
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">网站名称</label>
		<div class="col-sm-6">
			<input type="text" id="name" name="name" class="form-control" placeholder="输入网站名称">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">网站登录地址</label>
		<div class="col-sm-6">
			<input type="text" id="url" name="url" class="form-control" placeholder="输入网站登录地址">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">登陆用户</label>
		<div class="col-sm-6">
			<input type="text" id="username" name="username" class="form-control" placeholder="输入登录用户">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">登陆密码</label>
		<div class="col-sm-6">
			<input type="password" id="passwd" name="password" class="form-control" placeholder="输入用户密码">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a class="btn btn-primary" id="btn-submit" >抓取</a>
		</div>
	</div>
</form>
