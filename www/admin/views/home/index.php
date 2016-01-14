<div class="row mb20">
	<div class="col-sm-12">
		<div class="group-search">
			<input type="text" class="form-control search-list" id="" placeholder="searching...">
			<i class="fa fa-search search-list-i"></i>
			<button class="btn btn-primary" type="submit">重置</button><!--  style="display: none;" -->
		</div>
		<a class="btn btn-success pull-right" type="button" href="<?php echo site_url('home/crawl');?>"><i class="fa fa-plus"></i> 抓取网站</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>网站名称</th>
					<th>网站url</th>
					<th>管理员</th>
					<th>更新时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($website as $value):?>
				<tr>
					<td><?php echo htmlspecialchars($value['name']);?></td>
					<td><a target="_blank" href="<?php echo $value['url'];?>"><?php echo $value['url'];?></a></td>
					<td><?php echo htmlspecialchars($value['users']);?></td>
					<td><?php echo date('Y-m-d H:i:s', $value['updated_time']);?></td>
					<td>
						<a href="<?php echo site_url('home/info/' . $value['id']);?>">基本信息</a> | 
						<a href="<?php echo site_url('home/info/' . $value['id']);?>">订单信息</a> | 
						<a href="<?php echo site_url('home/bank/' . $value['id']);?>">银行管理</a> | 
						<a href="<?php echo site_url('home/qq/' . $value['id']);?>">客服管理</a> | 
						<a href="<?php echo site_url('home/refresh/' . $value['id']);?>">更新</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
