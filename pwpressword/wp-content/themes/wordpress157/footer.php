<div id="footer"><div class="wrap">
	<!-- 底部菜单 -->
	<?php 
		$args = array(
			"container_id" => "nav_footer",
			"theme_location" => "nav_footer",
			"depth" => "1"
		);
		wp_nav_menu($args); 
	?>
	<!-- 版权声明 -->
	<div class="copyright">
        Copyright @ 2012 - <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> 版权所有
		<?php if(dopt('Rcloud_beian')){ echo dopt('Rcloud_beianhao'); }; ?>
		<?php if(dopt('Rcloud_track_b')){ echo dopt('Rcloud_track'); }; ?>
	</div>
</div></div>
</div>
<!-- 滚动组件 -->
<ul id="roll">
	<li class="rollTop" title="回到顶部"></li>
	<li class="rollBottom" title="滚到底部"></li>
</ul>
<div id="rollFooter"></div>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slimbox2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prettify.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/core.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/comments-ajax.js"></script>
</body>
</html>
