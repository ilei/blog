<div id="index_view">
    <?php echo $this->breadcrumb->output();?>	
    <h1 class="c_titile"><?php echo $article['title'];?></h1>
	<p class="box">发布时间：<?php echo date('Y-m-d', $article['updated_time']);?><span>作者：ThinkLei</span>阅读（<?php echo !$article['hits'] ? rand(10,200) : $article['hits'];?>）</p>
	<ul>
        <?php echo $article['content'];?>
	</ul>
	<div class="share"> 
		<!-- Baidu Button BEGIN -->
		<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <a class="shareCount"></a> </div>
		<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
		<script type="text/javascript" id="bdshell_js"></script> 
		<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
		</script> 
		<!-- Baidu Button END --> 
	</div>
	<div class="otherlink">
		<h2>相关文章</h2>
		<ul>
			<li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情</a></li>
			<li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情</a></li>
			<li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
			<li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
			<li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
		</ul>
	</div>
</div>
