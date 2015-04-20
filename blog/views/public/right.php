<div id="sidebar">
    <div id="work">
        <img class="portrait" src="/static/images/ilei.jpg">
            <p>lei,80末,程序猿一枚,2012年就开始敲代码了,目前仍然很菜..... 追随自己的兴趣,时刻保持激情. 
        <a href="###" style="font-weight: 800;display:none;">About Me 更多...</a></p>
        <nav id="elsewhere">      
            <div class="clear"></div>
        </nav>
    </div>
    <?php if(isset($cates) && $cates):?>
    <div id="tags">
        <h2> 文章分类</h2>
        <ul class="tag_box">
            <?php foreach($cates as $key => $cate):?>
            <li><a href="/article/category/" . <?php echo $cate['id'];?>>
                <?php echo urlencode($cate['name']);?> <span><?php echo $cate['nums'];?></span>
            </a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
    <?php if(isset($tags) && $tags):?>
    <div id="tags">
        <h2> 文章分类</h2>
        <ul class="tag_box">
            <?php foreach($tags as $key => $tag):?>
            <li><a href="/article/tag/" . <?php echo $tag['id'];?>>
                <?php echo urlencode($tag['name']);?> <span><?php echo $tag['nums'];?></span>
            </a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
</div>
