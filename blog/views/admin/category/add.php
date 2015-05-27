<div class="admin-content">
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加类别</strong> 
    </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs="">
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">基本信息</a></li>
    </ul>

    <div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
      <div class="am-tab-panel am-fade am-active am-in" id="tab2">
     <?php echo form_open('', array('autocomplete' => 'off', 'class' => 'am-form'));?>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
                名称
            </div>
            <div class="am-u-sm-4">
              <input type="text" class="am-input-sm" name="cname">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
               拼音 
            </div>
            <div class="am-u-sm-4">
              <input type="text" class="am-input-sm" name="cpinyin">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">父级目录</div>
            <div class="am-u-sm-4">
                <select name="cup">
                <option value="0">请选择</option>
                 <?php foreach($cates as $key => $value):?>
                  <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php endforeach;?>
                </select>
             </div>
            <div class="am-u-sm-6"></div>
          </div>
            <?php form_close();?>
      </div>
    </div>
  </div>
  <div class="am-margin">
    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
</div>
