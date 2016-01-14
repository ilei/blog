<div class="big_bx">
    <div class="list_bx">
        <p> <strong><span><?php echo $cate_name;?></span>列表</strong><!-- <a href="#">更多..</a>--> 
            <img src="/static/qq/images/tit_bg.jpg" class="t_bg" /> 
        </p>
        <ul class="list_con">
            <?php foreach($list as $key => $value):?>
            <?php if($value['sign_title']):?>
            <li> 
                <strong> 
                    <span>[<?php echo $cate_name;?>]</span>
                    <a title="<?php echo $value['sign_title'];?>" href="###" target="_blank"><?php echo mb_strlen($value['sign_title'], 'utf8') >= 32 ? mb_substr($value['sign_title'], 0, 31) . '...' : $value['sign_title'];?></a> 
                </strong> 
                <em><span class="qmdianji"><?php echo 10000+rand(100, 5000);?></span> <font color=red><?php echo date('Y-m-d', $value['updated_time']);?></font> </em> 
            </li>
            <?php endif;?>
            <?php endforeach;?>
        </ul>
        <div class="tspage">
            <style>
                .tspage { font-size:13px; background-color: #f2f2f2; clear:both;  height:25px; overflow:hidden;  line-height:25px; padding:0 5px; text-align:right;}
                .tspage i { font-style:normal;}
                .tspage a {color:#000; text-decoration:none; padding:0 3px;}
                .tspage a:hover { text-decoration:underline;}
                .tspage .tsp_count {float:left;}
                .tsp_count i { color:#f00;}
                .tspage b {color:#f00;}
            </style>
            <div class="tsp_nav">
				<?php echo $pager;?>
            </div>
        </div> 
    </div>
    <dt class="f_fr m_txright1">
        <div class="m_divbai m_hotbq f_mb10">
            <h5 class="m_txh5"><span class="f_fl">热门标签</span></h5>
            <p>
                <span class="wzaa">
                <!--<a title="失望" href="###">失望</a>-->
                </span>
            </p>
        </div>
    </dt>
</div>
<div style=" width:100%; height:10px; display:block; overflow:hidden;"></div>
