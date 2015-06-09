<div class="row mb20">
	<div class="col-sm-12">
		<a class="btn btn-success pull-right" type="button" href="<?php echo site_url('home/index');?>"><i class="fa fa-arrow-left"></i> 返回列表</a>
	</div>
</div>
<form class="form-horizontal">
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">网站标题</label>
		<div class="col-sm-6">
		<input type="text" id="name" name="name" disabled value="<?php echo htmlspecialchars($info['title']);?>" class="form-control" placeholder="输入网站名称">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">网站关键字</label>
		<div class="col-sm-6">
		<input type="text" id="url" name="url" class="form-control" disabled value="<?php echo htmlspecialchars($info['keywords'];?>" >
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">网站描述</label>
		<div class="col-sm-6">
		<textarea class="form-control" disabled ><?php echo htmlspecialchars($info['desc']);?></textarea>
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">免费电话</label>
		<div class="col-sm-6">
		<input type="text" id="passwd" name="password" class="form-control" disabled value="<?php echo htmlspecialchars($info['free_phone']);?>">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">固定电话</label>
		<div class="col-sm-6">
		<input type="text" id="passwd" name="password" class="form-control" disabled value="<?php echo htmlspecialchars($info['fix_phone']);?>">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">移动电话</label>
		<div class="col-sm-6">
		<input type="text" id="passwd" name="password" class="form-control" disabled value="<?php echo htmlspecialchars($info['mobile']);?>">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">自定义meta</label>
		<div class="col-sm-6">
		<textarea class="form-control" disabled ><?php echo htmlspecialchars($info['meta']);?></textarea>
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="passwd" class="col-sm-2 control-label">底部代码</label>
		<div class="col-sm-6">
		<textarea class="form-control" disabled ><?php echo htmlspecialchars($info['bcode']);?></textarea>
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
</form>
