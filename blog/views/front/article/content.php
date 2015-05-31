<!--left-->
<div class="left" id="news">
  <div class="weizi">
    <!--  <div class="wz_text">当前位置：<a href="#">首页</a>><a href="#">学无止境</a>><span>文章内容</span></div>-->
  </div>
  <div class="news_content">
    <div class="news_top">
      <h1><?php echo htmlspecialchars($article['name']);?></h1>
      <p>
      <span class="left sj">时间:<?php echo date('Y-m-d', $article['updated_time']);?></span><span class="left fl">分类:<?php echo $article['cate_name'];?></span>
      <span class="left author"><?php echo 'ray'; //htmlspecialchars($article['author']);?></span>
      </p>
      <div class="clear"></div>
    </div>
    <div class="news_text">
        <?php echo $article['content'];?>
    </div>
  </div>

</div>
<!--end left -->
