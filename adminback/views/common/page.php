<?php $this->view('common/header');?>
<?php $this->view('common/left');?>
<div id="content">
<div id="content-head"><?php echo isset($htitle) ? $htitle : '系统管理';?></div>
<div id="breadcrumb"><?php //echo //$this->breadcrumb->create(); ?></div>
<div class="content-border">
<div class="container-fluid">
<?php $this->view($page);?>
<div id="content-footer">
  © 2012 <a target="_blank" href="http://www.smartlei.com">小蝌蚪</a>
</div>
</div>
</div>
</div>
<?php $this->view('common/footer');?>
