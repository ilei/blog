<div class="admin-sidebar">
    <ul class="am-list admin-sidebar-list">
      <?php foreach($menu as $key => $value):?>
      <?php if(!isset($value['children'])):?> 
      <li>
        <a href="<?php echo $value['href'];?>">
            <span class="am-icon-home"></span><?php echo $value['name'];?>
        </a>
      </li>
      <?php else:?>
      <li class="admin-parent">
        <a class="am-cf" href="###" data-am-collapse="{target: '#collapse-nav-<?php echo $key;?>'}">
            <span class="am-icon-file"></span><?php echo $value['name'];?>
            <span class="am-icon-angle-right am-fr am-margin-right"></span>
        </a>
        <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-<?php echo $key;?>">
          <?php foreach($value['children'] as $k => $child):?> 
          <li>
            <a href="<?php echo $child['href'];?>" class="am-cf">
                <span class="am-icon-check"></span><?php echo $child['name'];?>
                <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </li>
      <?php endif;?>
     <?php endforeach;?>
    </ul>
    <div class="am-panel am-panel-default admin-sidebar-panel">
      <div class="am-panel-bd">
        <p><span class="am-icon-bookmark"></span> </p>
        <p>好好学习，天天向上。—— ILEI</p>
      </div>
    </div>

    <div class="am-panel am-panel-default admin-sidebar-panel" style="display:none;">
      <div class="am-panel-bd">
        <p><span class="am-icon-tag"></span> wiki</p>
        <p>Welcome to the Amaze UI wiki!</p>
      </div>
    </div>
  </div>
