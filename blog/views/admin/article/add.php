<div class="admin-content">
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加文章</strong> 
    </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs="">
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">基本信息</a></li>
    </ul>

    <div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);overflow:auto;">
      <div class="am-tab-panel am-fade am-active am-in" id="tab2">
     <?php echo form_open('', array('autocomplete' => 'off', 'class' => 'am-form'));?>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
               标题 
            </div>
            <div class="am-u-sm-4">
                <input type="hidden" name="aid" value="<?php echo isset($article) ? $article['id'] : 0;?>">
                <input type="text" class="am-input-sm" name="atitle" value="<?php echo isset($article) ? $article['name'] : '';?>">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              链接 
            </div>
            <div class="am-u-sm-4">
                <input type="text" class="am-input-sm" name="aurl" value="<?php isset($article) ? $article['url'] : '';?>">
            </div>
            <div class="am-u-sm-6"></div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">所属类别</div>
            <div class="am-u-sm-4">
                <select name="acate">
                <option value="0">请选择</option>
                 <?php foreach($cates as $key => $value):?>
                  <option <?php echo isset($article) && ($article['cate_id'] == $value['id']) ? 'selected' : '';?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php endforeach;?>
                </select>
             </div>
            <div class="am-u-sm-6"></div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              内容 
            </div>
            <div class="am-u-sm-10" style="height:500px;">
                <script id="container" name="acontent" type="text/plain">
                    <?php echo isset($article) ? $article['content'] : '';?>
                </script>
            </div>
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
