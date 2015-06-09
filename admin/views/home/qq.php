<div class="row mb20">
	<div class="col-sm-12">
		<a class="btn btn-success pull-right" type="button" href="<?php echo site_url('home/index');?>"><i class="fa fa-arrow-left"></i> 返回列表</a>
	</div>
</div>
<form class="form-horizontal">
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">客服QQ</label>
		<div class="col-sm-6">
		<input type="text" id="name" name="name" disabled value="<?php echo htmlspecialchars($qq['qq']);?>" class="form-control" placeholder="输入网站名称">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">客服简介</label>
		<div class="col-sm-6">
		<input type="text" id="url" name="url" class="form-control" disabled value="<?php echo htmlspecialchars($qq['desc'];?>" >
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
</form>
