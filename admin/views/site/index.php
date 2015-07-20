<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>产品名称</th>
					<th>站点域名</th>
					<th>客服管理</th>
					<th>订单数量</th>
					<th>银行管理</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr data-guid="{$v.guid}">
					<td>{$v.name}</td>
					<th>{$v.mail}</th>
					<th><!--?php if($v['is_verify'] == 0):?-->
						<a href="&lt;?php echo U('Org/verify', array('org_guid'=&gt;$v['guid']))?&gt;">审核</a>
						<!--?php elseif($v['is_verify'] == 1):?-->
						已通过
						<!--?php elseif($v['is_verify'] == 2):?-->
						未通过
						<!--?php endif;?--></th>
					<td class="lock"><eq name="v.is_lock" value="0"><span class="text-success">未锁定</span>（<a href="javascript:void(0);" class="js-lock">锁定</a>）<else><span class="text-danger">已锁定</span> （<a href="javascript:void(0);" class="js-unlock">解锁</a>）</else></eq></td>
					<td>
						<switch name="v.status">
							<case value="0"><span class="text-warning">未认证</span></case>
							<case value="2"><span class="text-danger">待认证</span>（<a href="&lt;?php echo U('auth', array('guid'=&gt;$v['guid']))?&gt;">查看</a>）</case>
							<case value="3"><span class="text-success">已认证</span>（<a href="&lt;?php echo U('auth', array('guid'=&gt;$v['guid']))?&gt;">查看</a>）</case>
							<case value="4"><span class="text-danger">认证失败</span></case>
						</switch>
					</td>
					<td><a href="javascript:void(0)"><i class="fa fa-trash-o"></i></a>　
						<!--?php if($v['is_verify'] == 1):?-->
						<a href="&lt;?php echo U('view', array('guid'=&gt;$v['guid']))?&gt;"><i class="fa fa-search"></i></a>
						<!--?php elseif($v['is_verify'] == 2):?-->
						<a href="&lt;?php echo U('Org/content_verify', array('org_guid'=&gt;$v['guid']))?&gt;"><i class="fa fa-search"></i></a>
						<!--?php endif;?-->
					</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>
