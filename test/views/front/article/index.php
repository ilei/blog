
<!--left-->
<div class="left" id="c_left">
  <div class="s_tuijian">
    <h2>文章<span>推荐</span></h2>
  </div>
  <div class="content_text">
    <!--wz-->
    <?php foreach($list as $key => $article):?>
    <div class="wz">
    <h3><a href="<?php echo site_url('article/' . $article['id']);?>" title="<?php echo htmlspecialchars($article['name']);?>"><?php echo htmlspecialchars($article['name']);?></a></h3>
      <dl>
        <dt><img src="/static/blog/images/s.jpg" width="200"  height="123" alt=""></dt>
        <dd>
        <p class="dd_text_1"><?php echo mb_substr(strip_tags($article['content']), 0, 160, 'utf-8') . '......';?></p>
        <p class="dd_text_2">
        <span class="left author"><?php echo 'ray';//htmlspecialchars($article['author']);?></span><span class="left sj">时间:<?php echo date('Y-m-d', $article['updated_time']);?></span>
        <span class="left fl">分类:<a href="###" title="<?php echo $article['cate_name']?>"><?php echo $article['cate_name'];?></a></span><span class="left yd"><a href="<?php echo site_url('article/' . $article['id']);?>" title="阅读全文">阅读全文</a>
        </span>
        <div class="clear"></div>
        </p>
        </dd>
        <div class="clear"></div>
      </dl>
    </div>
    <?php endforeach;?>
  </div>
</div>
<!--left end-->
