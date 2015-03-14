   </div>
   <div class="clear"></div>
    <footer>
    <div class="logo"><h1>ILEI'S BLOG&nbsp;</h1>
      </div>
      <nav>
        <ul>
          <li><a href="/">首页</a></li>
          <?php if(isset($cates) && $cates):?>
          <?php foreach($cates as $key => $cate):?>
          <li><a href="<?php echo '/article/category/' . $cate['id'];?>"><?php echo htmlspecialchars($cate['name']);?></a></li>
          <?php endforeach;?>
          <?php endif;?>
        </ul>
      </nav>
      <p id="fine-print">Copyright © 2012 - smartlei.com</p>
      <div class="clear"></div>
    </footer>
    </div>
<div class="clear"></div>
</body>
</html> 
