<div class="g_foot">
    <p>  
        <a href="http://www.qqtn.com/app/about.html">关于腾牛</a> | 
        <a href="http://www.qqtn.com/app/contact.html">联系方式</a> | 
        <a href="http://www.qqtn.com/app/history.html">发展历程</a> | 
        <a href="http://www.qqtn.com/app/help.html" style="cursor:help;">下载帮助(？)</a> | 
        <a href="http://www.qqtn.com/app/adv.html">广告联系</a> | 
        <a href="http://www.qqtn.com/app/map.html">网站地图</a> | 
        <a href="http://www.qqtn.com/app/link.html">友情链接</a> |   
    </p>
    <p> Copyright  2012 smartlei.com <b>〖smartlei〗</b> 版权所有</p>   
    <p >声明: 所有与qq相关的信息均来自互联网  如有异议 请与本站联系 本站为非赢利性网站 不接受任何赞助和广告</p>
</div>
<script language="JavaScript" type="text/javascript" src="/static/qq/js/count.js"></script>  
<script>
// 幻灯
$.EasySlide = function(Opt) {
    Opt = $.extend({
        Nav : null,	
            Field : null,
            Cur : 'cur',
            Index : 0,
            AutoTime : 3000
    },Opt || {});

    var show = function(){
        Opt.Nav.removeClass().eq(Opt.Index).addClass(Opt.Cur);
        Opt.Field.removeClass(Opt.Cur).eq(Opt.Index).addClass(Opt.Cur);
    },
timer;

Opt.Nav.mouseover(function(){
    Opt.Index = Opt.Nav.index(this);
    show();
}).add( Opt.Field).hover(function(){
    clearInterval(timer);
},function(){
    timer =  setInterval(function(){
        Opt.Index = ++Opt.Index % Opt.Nav.length;
        show();
    },Opt.AutoTime)
}).eq(0).trigger('mouseleave');

}


$.EasySlide({  Nav : $('.slide_nav li'),	 Field : $('.slide_field li')});


</script>
<script type="text/javascript">

var stra = 1;
var numb = $(".m_douguanzhu ul").length;
$(".m_douguanzhu ul").hide();
$(".m_douguanzhu ul").eq(stra-1).show();
$(".m_douguanzhu i").click(function(){
    if(stra<numb){
        stra++;
    }
    else if(stra==numb){
        stra=1;
    }
    $(".m_douguanzhu ul").hide();
    $(".m_douguanzhu ul").eq(stra-1).show();
})
    </script>
<script type="text/javascript">
$(".n_list li:gt(9)").css("border-bottom","0");
var stra = 1;
var numb = $(".c_like ul").length;
$(".c_like ul").hide();
$(".c_like ul").eq(stra-1).show();
$(".tit dd").click(function(){
    if(stra<numb){
        stra++;
    }
    else if(stra==numb){
        stra=1;
    }
    $(".c_like ul").hide();
    $(".c_like ul").eq(stra-1).show();
});
</script>
<script>
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?24654c65d206446adddb862872dd0621";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
