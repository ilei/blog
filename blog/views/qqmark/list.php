<div class="big_bx">
    <div class="list_bx">
        <p> <strong><span><?php echo $cate_name;?></span>列表</strong><!-- <a href="#">更多..</a>--> 
            <img src="/static/qq/images/tit_bg.jpg" class="t_bg" /> 
        </p>
        <ul class="list_con">
            <?php foreach($list as $key => $vlaue):?>
            <li> 
                <strong> 
                    <span>[<?php echo $cate_name;?>]</span>
                    <a href="###" target="_blank"><?php echo $value['sign_title'];?></a> 
                </strong> 
                <em><span class="qmdianji"><?php echo 10000+rand(100, 5000);?></span> <font color=red><?php echo date('Y-m-d', $value['updated_time']);?></font> </em> 
            </li>
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
            <div class="tsp_count">共:<i>3206</i>条 页次:<b>1</b>/107 每页:<i>30</i> </div>
            <div class="tsp_nav">
                <i>首页</i> <i>上一页</i> <b> 1 </b>  <a href=/qm/gexingqm_2.html>2</a>   <a href=/qm/gexingqm_3.html>3</a>   <a href=/qm/gexingqm_4.html>4</a>   <a href=/qm/gexingqm_5.html>5</a>  <a href="/qm/gexingqm_6.html" class="tsp_more"><i>更多</i></a> <a href="/qm/gexingqm_2.html" class="tsp_next"><i>下一页</i> </a> <a href="/qm/gexingqm_107.html" class="tsp_end"><i>尾页</i> </a> 
            </div>
        </div> 
    </div>
    <dt class="f_fr m_txright1">

        <div class="m_divbai m_hotbq f_mb10">
            <h5 class="m_txh5"><span class="f_fl">热门标签</span></h5>
            <p>
                <span class="wzaa">
                <a title="失望" href="###">失望</a>
                </span>
            </p>
        </div>
    </dt>
</div>
<div style=" width:100%; height:10px; display:block; overflow:hidden;"></div>
