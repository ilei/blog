//返回顶部
document.writeln('<div id="kfbacktop" class="kfbacktop"><a id="backTop" href="javascript:;" style="display: block;" target="_self"><i></i></a></div>');
function backfuc(){jQuery(this).scrollTop() > 100 ? jQuery("#kfbacktop").css("display","block"):jQuery("#kfbacktop").css("display","none");}
jQuery(function(){jQuery("#backTop").click(function(){jQuery("html,body").animate({scrollTop:0},500)});backfuc();jQuery(window).bind("scroll", backfuc).bind('resize', backfuc);})


//cookics换肤
function getCookie(name)
{var dc = document.cookie;
var prefix = name + "=";
var begin = dc.indexOf("; " + prefix);
if (begin == -1) 
{begin = dc.indexOf(prefix);
if (begin != 0) return null;} 
else 
{begin += 2;}
var end = document.cookie.indexOf(";", begin);
if (end == -1) 
{end = dc.length;}return unescape(dc.substring(begin + prefix.length, end));}

	//设置cookies
function setCookie(name, value, domain, expires, path, secure) 
{document.cookie=name+"="+escape(value)+((expires) ? ";expires=" + expires.toGMTString() : "")+((path) ? "; path=" + path : "")+((domain) ? "; domain=" + domain : "")+((secure) ? "; secure" : "");}


function setDefaultStyle(tmpName){
    var cookie = getCookie("default_Skin");
	var styles = document.getElementById("styles").getElementsByTagName("i");
	var stylelink = document.getElementById("tmpstyle");
	
	if(tmpName){
	   //如果有传入样式，则
	   stylelink.setAttribute("href","/skin/new2013/css/" + tmpName + "/skin.css");
	   setCookie("default_Skin",tmpName);
	} else {
	   //如果是默认加载
	   cookie = (cookie+"" == "" || cookie+"" == "null" || cookie+"" == "undefined")? styles[0].getAttribute("rel") : cookie;
	   stylelink.setAttribute("href","/skin/new2013/css/" + cookie + "/skin.css");
	   setCookie("default_Skin",cookie);
	}
	
	//加载换肤事件。
	for(i=0;i<styles.length;i++){
	   styles[i].onclick = function (){
	       setDefaultStyle(this.getAttribute("rel"));
	   }
	}
}


//更改导列表3级导航当前位置
function activeMenu(navpatch,n){

	var nav = $('ul.f_nav  a'),
	curlinkArr = document.getElementById(navpatch).getElementsByTagName('a'),
	curlink,nav;


	
		//if(curlinkArr.length < n){nav[0].parentNode.className='m_hover f_hov';return false; }
		if(curlinkArr.length < n) { curlinkArr.parent().addClass('m_hover'); return false; }
			curlink = curlinkArr[n].href;
			if(!curlink) return;

			for(i=0;i<nav.length;i++){
			if(nav[i].href == curlink){
				nav[i].parentNode.className = "m_hover f_hov";
				nav[0].parentNode.className = "";
		}
			else{
			//nav[0].parentNode.className = "m_hover f_hov";
			//jQuery('.g_nav_n ul li:first').addClass("m_hover f_hov"); 		
		}
		
	}
}


//列表当前位置
jQuery(function(){

    var url = jQuery('#f-navid a:last').attr('href');
    var aL = jQuery('.m_softleft1 a');
    var obj;
    for(var i = 0; i < aL.length; i++) {
        obj = jQuery(aL[i]);
        if(obj.attr('href') == url) {
            obj.parent().addClass('m_hover');
            break;
        }
    }
	if(pageClass == 2) {
		// 列表排序选项卡的当前位置
		var orders = jQuery(".wzaa a"), i;
	
		for(i = 0; i < orders.length; i++) {
			if (window.location.href.indexOf(jQuery(orders[i]).attr('href')) != -1) {
				jQuery(orders[i]).addClass('m_hover').siblings().removeClass('m_hover');
				break;
			}
		}
		if(i == orders.length) {
			jQuery(orders[0]).addClass('m_hover');
		}
		
	}
});




jQuery(function(){
	
	//搜索框效果
jQuery('.m_xzk').click(function() {
		jQuery('.m_xzk_p').show();
	}).mouseout(function(){
		 jQuery('.m_xzk_p').hide();
	 
	 });
	 
	jQuery(".m_xzk_p").mouseover(function(){
		jQuery(this).show();  
		}).mouseout(function(){
		jQuery(this).hide();
	});
	
	jQuery(".m_xzk_p  a").click(function() {
		var hu=jQuery(this).text();
		var va=jQuery(this).attr("valu");
		jQuery(".m_sstxt").text(hu);
		 jQuery('.m_xzk_p').hide();
		 jQuery('#searchType').focus();
		 jQuery('#headSearchType').val(va);
		})
		
	// 选项卡-qqtn
	jQuery('.f_tabnav i').mouseover(function(){
		jQuery(this).siblings().removeClass('hover').end().addClass('hover');
		var index = jQuery(this).index();
		jQuery(this).parent().next().find('.f_tabbox').hide()
		.siblings().eq(index).show();
	});
	
	//鼠标经过改变样式离开不改变用于top-qqtn
	jQuery('.f_top li').mouseover(function(){
		jQuery(this).siblings().removeClass('m_azphbig').end().addClass('m_azphbig');
	});
	//鼠标点击改变样式离开不改变用于QQtn换肤
	jQuery('.m_chaneskin i').mousedown(function(){
		jQuery(this).siblings().removeClass('m_shover').end().addClass('m_shover');
	});
	//鼠标经增加样式离开去掉用于显示隐藏-qqtn
	jQuery(".f_hov").mouseover(function(){
		jQuery(this).addClass("f_hover").siblings().removeClass('f_hover');
	});

	jQuery('body').mouseover(function(e) {
		if(!(jQuery(e.target).is('.f_hov *'))) {
			jQuery('.f_hov').removeClass('f_hover');
		}
	});


	// 所有的  下面第一个 li 加 f-ix， 前三个 li 加 f-t3
	jQuery('.f-top3').each(function() {
		jQuery(this).find('li:first').addClass('m_azphbig').end()
		.find('li:lt(3)').addClass('f-t3');

	})
	//第3个li加css,从0开始
	jQuery('.m-line4').each(function() {
		jQuery(this).find('li:eq(2)').addClass('m-new-line');
	})
	
	//列表页向上控件
	jQuery(".m-listul li").hover(function(){
       var me=jQuery(this);
       me.data("set_num",setTimeout(function(){me.animate({"scrollTop":me.height()},{duration:300})},200));
   },function(){
       var me=jQuery(this);
      clearTimeout(me.data("set_num"));
      me.animate({"scrollTop":0},{duration:100});
   });
	//JQ向上滚动控件
	var _wrap=jQuery('ul.f-line');//定义滚动区域
	var _interval=4000;//定义滚动间隙时间
	var _moving;//需要清除的动画
	_wrap.hover(function(){
		clearInterval(_moving);//当鼠标在滚动区域中时,停止滚动
	},function(){
		_moving=setInterval(function(){
			var _field=_wrap.find('li:first');//此变量不可放置于函数起始处,li:first取值是变化的
			var _h=_field.height();//取得每次滚动高度
			_field.animate({marginTop:-_h+'px'},600,function(){//通过取负margin值,隐藏第一行
				_field.css('marginTop',0).appendTo(_wrap);//隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
			})
		},_interval)//滚动间隔时间取决于_interval
	}).trigger('mouseleave');//函数载入时,模拟执行mouseleave,即自动滚动
	
	//首页壁纸效果
    jQuery('.m_qqgxdiv li').hover( 
  		function () {
    			jQuery(this).find('a').eq(1).fadeIn();
 		 },
 		 function () {
  			  jQuery(this).find('a').eq(1).fadeOut();
  		}
	); 
	//给列表页左侧栏目加线
	jQuery('.m-sname li:even').addClass('m-snameline');
	//给分页的a加上站内跳转
	jQuery('.f-pagebox a').attr('target','_self');
	
	
	
	
});
//pageClass 1首页  2  3游戏下载
if(pageClass==null)
{
	var pageClass=0;
}
//如果是首页
if( pageClass==1)
{
		function closebt()
	{
		jQuery(".prev  a").attr("target","_self");
		jQuery(".prev  a").attr("target","_self");
		jQuery("body").attr("style","");
		jQuery(".adbt").hide();
		jQuery(".g-intj").removeClass("f-bttop");
	}
	
	//首页左右切换滚动插件
			$(function(){
				 var oPic=$('#slider_pic').find('ul');
				 var oImg=oPic.find('li');
				 var oLen=oImg.length;//获取数量
				 var oLi=oImg.width();
				var prev=$("#prev");
				var next=$("#next");
				
				oPic.width(oLen*111);//计算总长度
				var iNow=0;
				var iTimer=null;
				prev.click(function(){
					if(iNow>0){  
					  iNow--;
				
					  }
				   ClickScroll();
				})
				next.click(function(){
				   if(iNow<3){ 
					   iNow++
					 }
					 ClickScroll();
				 })
				
				 function ClickScroll(){
				
					 iNow==0? prev.addClass('no_click1'):prev.removeClass('no_click1');
					 iNow==3?next.addClass("no_click2"):next.removeClass("no_click2");
					 
					oPic.animate({left:-iNow*668})
				 }
				
			})
	
}

//如果是下载列表

if( pageClass== 2)
{
	jQuery(function(){
	var tags_a = $("#tags a");
         tags_a.each(function(){
             var x = 9;
             var y = 0;
             var rand = parseInt(Math.random() * (x - y + 1) + y);
             $(this).addClass("tags"+rand);
          });
		  
	//软件列表左侧每第三个li加css
		$(".m_softleft1 ul li").each(function() {
			 
		var index = $(this).index(); 
		if(!((index + 1) % 3)){ 
			$(this).addClass('m_liline');
		}
		});
		
	//软件列表左侧每第2个li加css
		$(".m_softright1 ul li").each(function() {
			 
		var index = $(this).index(); 
		if(!((index + 1) % 2)){ 
			$(this).addClass('m_liline');
		}
		});
	
	var dqsn = $(".tsp_count i:first").text()
		$(".f_h3list span em ").text(dqsn)
			if(!$('.m_softleft2 ul').children('li').length) {
			$('div.m_softleft2').hide();	}
			$(".tsp_nav  a").attr("target","_self");	  

	});
	
	
	
			
			
		
			
			
	
	

			
	
	
}


//如果是新闻详情页页

if( pageClass==4)
{
	jQuery(function(){
			if(!$('ul.m-xgnewsul').children('li').length) {
			$('div.m-xiangg').hide();
		}
	});
}

//如果是游戏下载页
if( pageClass==3)
{	 



		//伸缩文字介绍
		/*var divHide,divShow,divContent;
		var desHieght = 160;
		
		function hideMore(){
			
		divHide = document.getElementById('c_hide');
		divShow = document.getElementById('c_show');
		divContent = document.getElementById('c_des_content');
		
		
			if(divContent.offsetHeight > desHieght){
				divContent.style.height = desHieght + 'px';
				divShow.style.display = 'block';
			}
		
		
		}
*/		
		function desHeight(b){
			if(b == 'show'){
				divShow.style.display = 'none';
				divHide.style.display = 'block';
				divContent.style.height = 'auto';
			
			} else if( b == 'hide'){
			  divShow.style.display = 'block';	
			  divHide.style.display = 'none';
			  divContent.style.height = desHieght + 'px';
			  //window.location.hash = 'destop';
			}
		}

		//游戏截图效果
		jQuery(document).ready(function(){
		jQuery('.pic_next').click(function(){
			
			if(jQuery('.piclist').is(':animated')){
				jQuery('.piclist').stop(true,true);
			}/* 避免点击事件重复 */
			
			ml = parseInt(jQuery('.piclist').css('left'));
			r = liw - (700 - ml);  /* 700为外部区块.infopic的宽度，15为li之间的距离，即.piclist li的margin-right的值 */
			if(r<700){
				s = r - 15;
			}else{
				s = 700;
			}
			jQuery('.piclist').animate({left: ml - s + 'px'},'slow');			
		})
		
		jQuery('.pic_prev').click(function(){
			
			if(jQuery('.piclist').is(':animated')){
				jQuery('.piclist').stop(true,true);
			}/* 避免点击事件重复 */
			
			ml = parseInt(jQuery('.piclist').css('left'));
			if(ml>-700){
				s = ml;
			}else{
				s = -700;
			}
			jQuery('.piclist').animate({left: ml - s + 'px'},'slow');			
		})
		
	})
	//info pic
	jQuery(window).load(function(){
		liw = 0;
		jQuery('.piclist li').each(function(){
			liw += jQuery(this).width()+15;
			jQuery(this).css('width',jQuery(this).width()+'px');
		})
		jQuery('.piclist').width( liw + 'px');
	})
	
	
}
//下载页专用JS结束
//加入收藏
function AddFavorite(sURL, sTitle)
{    try
    {
        window.external.addFavorite(sURL, sTitle);
    }    catch (e)    {
        try
        {            window.sidebar.addPanel(sTitle, sURL, "");        }
        catch (e)        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");        }    }
}