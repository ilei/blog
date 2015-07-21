<aside>
  <div class="tuijian">
    <h2>推荐文章</h2>
    <ol>
	  <?php $articles = recommend_article(array(11,18, 15,16,19,17,14,20,21)); foreach($articles as $key  => $article):?>
      <li><span><strong><?php echo $key+1;?></strong></span><a href="<?php echo site_url('article/' . $article['id']);?>"><?php echo $article['name'];?></a></li>
	  <?php endforeach;?>
    </ol>
  </div>
  <div class="tuijian">
    <h2>最新发布</h2>
    <ol>
	  <?php $articles = new_article(); foreach($articles as $key  => $article):?>
      <li><span><strong><?php echo $key+1;?></strong></span><a href="<?php echo site_url('article/' . $article['id']);?>"><?php echo $article['name'];?></a></li>
	  <?php endforeach;?>
    </ol>
  </div>
  <div class="clicks">
    <h2>热门点击</h2>
    <ol>
	  <?php $articles = hots_article(); foreach($articles as $key  => $article):?>
	  		<li><span><a href="<?php echo site_url('article/list/' . $article['cate_pinyin']);?>"><?php echo $article['cate_name'];?></a></span>
			<a href="<?php echo site_url('article/' . $article['id']);?>"><?php echo $article['name'];?></a></li>
	  <?php endforeach;?>
    </ol>
  </div>
  <div class="search">
    <form class="searchform" method="get" action="#">
      <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
    </form>
  </div>
  <div class="viny">
    <dl>
      <dt class="art"><img src="/public/blog/images/artwork.png" alt="专辑"></dt>
      <dd class="icon-song"><span></span>南方姑娘</dd>
      <dd class="icon-artist"><span></span>歌手：赵雷</dd>
      <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
      <dd class="icon-like"><span></span><a href="###">喜欢</a></dd>
      <dd class="music">
        <audio src="/public/blog/images/nf.mp3" controls></audio>
      </dd>
      <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
    </dl>
  </div>
</aside>
