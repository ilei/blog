<dl class="f_cer f_cle">
    <?php $this->view('qq/right_1');?>
  <dd class="f_fl m_softright">
    <div class="m_softright1 f_div f_mb10">
      <h3 class="f_h3list">
        <span class="f_fl">个性签名最新发布</span>
      </h3>
      <!--<a class="more" href="#">查看更多>></a>-->
      <ul>
        <?php foreach($new as $key => $value):?>
        <li>
            <span class="time"><font color=red><?php echo date('m-d', $value['updated_time']);?></font></span>
            <a href="###"><?php echo $value['sign_title'];?></a>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
   <div class="m_softright2 f_div f_mb10">
       <h3 class="f_h3list">精选个性签名</h3>
      <!--<a class="more" href="#">查看更多>></a>-->
      <dl class="jxlist">
        <dt class="f_fl">
            <a href="<?php echo site_url('qq/shanggan');?>">
                <img src="/static/qq/images/201422493432.png" width="175" height="186"><span>伤感签名</span>
            </a>
        </dt>
         <dd class="f_fr">
            <ul>              
              <?php foreach($shanggan as $key => $value):?>
              <li>
                <a class="f_fl" href="###"><?php echo $value['sign_title'];?></a>
                <span class="f_fr"><?php echo date('Y-m-d', $value['updated_time']);?></span>
              </li>
              <?php endforeach;?>
            </ul>
         </dd>
       </dl>
      <dl class="jxlist">
        <dt class="f_fl">
            <a href="<?php echo site_url('qq/shanggan');?>">
                <img src="/static/qq/images/201422493448.png" width="175" height="186"><span>搞笑签名</span>
            </a>
        </dt>
         <dd class="f_fr">
            <ul>              
              <?php foreach($gaoxiao as $key => $value):?>
              <li>
                <a class="f_fl" href="###"><?php echo $value['sign_title'];?></a>
                <span class="f_fr"><?php echo date('Y-m-d', $value['updated_time']);?></span>
              </li>
              <?php endforeach;?>
            </ul>
         </dd>
       </dl>
      <dl class="jxlist">
        <dt class="f_fl">
            <a href="<?php echo site_url('qq/weimei');?>">
                <img src="/static/qq/images/201422493458.png" width="175" height="186"><span>唯美签名</span>
            </a>
        </dt>
         <dd class="f_fr">
            <ul>              
              <?php foreach($weimei as $key => $value):?>
              <li>
                <a class="f_fl" href="###"><?php echo $value['sign_title'];?></a>
                <span class="f_fr"><?php echo date('Y-m-d', $value['updated_time']);?></span>
              </li>
              <?php endforeach;?>
            </ul>
         </dd>
       </dl>
      <dl class="jxlist">
        <dt class="f_fl">
            <a href="<?php echo site_url('qq/qinglv');?>">
                <img src="/static/qq/images/20142249359.png" width="175" height="186"><span>情侣签名</span>
            </a>
        </dt>
         <dd class="f_fr">
            <ul>              
              <?php foreach($qinglv as $key => $value):?>
              <li>
                <a class="f_fl" href="###"><?php echo $value['sign_title'];?></a>
                <span class="f_fr"><?php echo date('Y-m-d', $value['updated_time']);?></span>
              </li>
              <?php endforeach;?>
            </ul>
         </dd>
       </dl>
    </div>
  </dd>
</dl>
