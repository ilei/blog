<?php $this->view('public/header');?>
<!--content start-->
<div id="mainbody">
    <?php $this->view('public/top');?>
    <div class="blogs">
    <?php $this->view($page);?>
    <?php $this->view('public/right');?>
    </div>
</div>
 <!--content end-->
<?php $this->view('public/footer');?>
