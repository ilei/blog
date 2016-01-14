<div class="row mb20">
	<div class="col-sm-12">
		<a class="btn btn-success pull-right" type="button" href="<?php echo site_url('rss');?>"><i class="fa fa-arrow-left"></i> 返回列表</a>
	</div>
</div>
<form class="form-horizontal" action="<?php echo site_url('rss/add_channel');?>" role="form" id="website" novalidate="novalidate" method="post">
	<div class="form-group">
		<label for="channel" class="col-sm-2 control-label">源地址:</label>
		<div class="col-sm-6">
			<input type="text" id="channel" name="channel" class="form-control" placeholder="输入RSS的URL[以]http://开头">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="category" class="col-sm-2 control-label">类别:</label>
			<div class="col-sm-4">
				<select class="form-control valid" name="category" id="category" aria-invalid="false">
                        <option value="1">组织</option>
                        <option value="2">企业</option>
                        <option value="3">会展提供商</option>
                </select>
			</div>	
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<label for="tag" class="col-sm-2 control-label">标签</label>
		<div class="col-sm-6">
			<input type="text" id="tag" name="tag" class="form-control" placeholder="输入标签，多个以英文,隔开">
		</div>
		<div class="col-sm-4 error-wrap"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a class="btn btn-primary" id="btn-submit" >订阅</a>
		</div>
	</div>
</form>
