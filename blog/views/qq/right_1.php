<dt class="f_fr m_softleft f_mb10">
    <div class="c_like">
        <dl class="tit">
            <dt>猜你喜欢</dt>
            <dd></dd>
        </dl>
        <?php foreach($news as $key => $value):?>
        <?php if($key % 6 == 0):?>
        <ul style="display:none">
        <?php endif;?>
            <li>
                <img class="f_fl" src="/static/qq/images/tx-<?php echo $key + 1;?>.jpg" width="30" height="30">
                <a class="bg" href="###"><?php echo $value['sign_title']?></a>
            </li>
        <?php if($key+1 % 6 == 0):?>
        </ul>
        <?php endif;?>
        <?php endforeach;?>
    </div>
    <div class="m_softleft3 f_div f_mb10">
         <h3 class="f_h3list"><span class="f_fl">个性签名大全</span><span class="f_fr"></span></h3>
         <div class="m_fous" id="show_flash">
            <div id="slide">
                <ul class="slide_field f_cle">
                    <li class="s1">
                        <a href="<?php echo site_url('qq/chaozhuai');?>"><img src="/static/qq/images/201422483132.jpg"  /><b>超拽签名</b></a>
                    </li>
                    <li class="s2">
                        <a href="<?php echo site_url('qq/baqi');?>"><img src="/static/qq/images/20142248330.jpg"  /><b>霸气签名</b></a>
                    </li>
                    <li class="s3">
                        <a href="<?php echo site_url('qq/jingdian');?>"><img src="/static/qq/images/201422483339.jpg"  /><b>经典签名</b></a>
                    </li>
                    <li class="s4">
                        <a href="<?php echo site_url('qq/nvsheng');?>"><img src="/static/qq/images/20142248342.jpg"  /><b>女生签名</b></a>
                    </li>   
                </ul>
                <ul class="slide_nav">
                    <li class="cur">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>    
            </div>
         </div>
         <ul>
            <?php foreach($push as $key => $value):?>
            <li><a href="###"><?php echo $value['sign_title'];?></a></li>
            <?php endforeach;?>
         </ul>
    </div>
    <div class="m_softleft2 f_div f_mb10">
      <h3 class="f_h3list">个性签名排行</h3>
      <ul class="f_tabbox f-top3">   
        <?php foreach($ranks as $key => $value):?>
         <li>
            <span><?php echo $key + 1;?></span>
            <p><a href="###"><?php echo $value['sign_title'];?></a></p>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
</dt>
