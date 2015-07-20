<ul class="bloglist">
  <?php foreach($list as $key => $article):?>
  <li>
    <div class="arrow_box">
      <div class="ti"></div>
      <!--三角形-->
      <div class="ci"></div>
      <!--圆形-->
      <h2 class="title"><a href="<?php echo site_url('article/' . $article['id']);?>" title="<?php echo htmlspecialchars($article['name']);?>"><?php echo htmlspecialchars($article['name']);?></a></h2>
      <ul class="textinfo">
        <a href="<?php echo site_url('article/' . $article['id']);?>"><img src="/static/blog/images/s.jpg" alt="<?php echo htmlspecialchars($article['name']);?>"></a>
        <p><?php echo mb_substr(str_replace('&nbsp;', '', strip_tags($article['content'])), 0, 160, 'utf-8') . '......';?></p>
      </ul>
      <ul class="details">
        <li class="likes"><a href="###"><?php echo rand(20, 50);?></a></li>
        <li class="comments"><a href="###">0</a></li>
        <li class="icon-time"><a href="###"><?php echo date('Y-m-d', $article['updated_time']);?></a></li>
      </ul>
    </div>
    <!--arrow_box end--> 
  </li>
  <?php endforeach;?>
  <li>
    <div class="page"><a title="Total record"><b><?php echo $total;?></b></a>
        <?php echo $pager;?>
    </div>
    </li>
</ul>
