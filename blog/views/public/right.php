<div class="right" id="c_right">
  <div class="s_about">
    <h2>关于博主</h2>
    <img src="/static/images/ilei.jpg" width="230" height="230" alt="博主"/>
    <p>博主：ray</p>
    <p>职业：程序猿</p>
    <p>简介：</p>
    <p>lei,80末,程序猿一枚,2012年就开始敲代码了,目前仍然很菜..... 追随自己的兴趣,时刻保持激情. 
    <div class="clear"></div>
    </p>
  </div>
  <!--栏目分类-->
  <div class="lanmubox">
    <div class="hd">
      <ul><li>文章分类</li><li>最新文章</li></ul>
    </div>
    <div class="bd">
      <?php if(isset($cates) && $cates):?>
      <ul class="tag_box">
        <?php foreach($cates as $key => $cate):?>
        <li><a href="/article/category/" . <?php echo $cate['id'];?>>
          <?php echo urlencode($cate['name']);?> <span><?php echo $cate['nums'];?></span>
        </a></li>
        <?php endforeach;?>
      </ul>
      <?php endif;?>
    </div>
  </div>
  <div class="link">
    <h2>友情链接</h2>
    <p><a href="http://www.smartlei.com">ilei的博客</a></p>
  </div>
</div>
<!--right end-->
