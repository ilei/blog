<?php $this->view('public/header');?>
<!--content start-->
<div id="content">
    <?php $this->view($page);?>
    <?php $this->view('public/right');?>
  <div class="clear"></div>
</div>
 <!--content end-->
<?php $this->view('public/footer');?>
