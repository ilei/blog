// JavaScript Document


 //==================函数列表=========================
 //写入Cookie PostCookie("Softview=Yes");
 function PostCookie(cookieName)
 {
  var expdate = new Date();
   expdate.setTime(expdate.getTime() + 604800000);
   document.cookie=cookieName+";expires="+expdate.toGMTString()+";path = /;";
 }

//读取Cookies值
function getCookie(cookieName) 
{ 
 var cookieString =document.cookie; 
 var start = cookieString.indexOf(cookieName + '='); 
 // 加上等号的原因是避免在某些 Cookie 的值里有 
 // 与 cookieName 一样的字符串。 
 if (start == -1) // 找不到
 return null; 
 start += cookieName.length + 1; 
 var end = cookieString.indexOf(';', start); 
 if (end == -1) 
 return unescape(cookieString.substring(start));
 return unescape(cookieString.substring(start, end)); 
}

 String.prototype.Trim=function(){ return  this.replace(/(^\s+)|(\s+$)/g,"");}
 String.prototype.Ltrim = function(){ return  this.replace(/(^\s+)/g,   "");}
 String.prototype.Rtrim = function() { return this.replace(/(\s+$)/g, "");}

//================= AJAX 提交表单 ====================
var http_request = true;
	function send_request(url,Temp,ref , tb) 
	 {//初始化、指定处理函数、发送请求的函数
		http_request = false;
		
		//document.domain = "yxdown.com";
		//开始初始化XMLHttpRequest对象
		if(window.XMLHttpRequest) { //Mozilla 浏览器
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType) {//设置MiME类别
				http_request.overrideMimeType('text/xml');
			}
		}
		else if (window.ActiveXObject) { // IE浏览器
			try {
				http_request = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!http_request) { // 异常，创建对象实例失败
			window.alert("不能创建XMLHttpRequest对象实例.");
			return false;
		}
		http_request.onreadystatechange = ref; 
		
		// 确定发送请求的方式和URL以及是否同步执行下段代码
		http_request.open("Post", url, tb);
		http_request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		http_request.send(Temp);
	}
	
	// 处理返回信息的函数
    function processRequest() {
        if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
                alert(http_request.responseText);
            } else { //页面不正常
                // alert("您所请求的页面有异常。");
            }
        }
    }
//加入收藏夹
function addfav(sURL,sTitle)
{
	try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }

 }
 
//收藏本站
function address(url,title)
{
 window.external.AddFavorite(url,title);
}

function isNumberS(i,obj)
{
	if (obj.value=="")
	{
		alert(obj.name + ": 不能为空");
		obj.focus();
		return false;
	}
	
	if(isNaN(obj.value))
	{
		alert(obj.name + ": 必须为数字");
		obj.focus();
		return false;
	}
	
	if (i<obj.value)
	{
		alert(obj.name + ": 不能大于" + i);
		obj.focus();
		return false;
	}
}

//=================================前台专用====================================================
function ViewCmsHits(tobj,id)
{
	var obj= document.getElementById(tobj);
	var Url="Action=4&id="+ id;
	
	var ref=function()//处理返回数据
	 	{
		  if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var requestText=http_request.responseText;
					obj.innerHTML = requestText;
            } else { //页面不正常
                // alert("写数据出错了！！");
            }
        }
	 }
   send_request("../ajax.asp",Url,ref,true);
}


function ViewCommCount(tobj,CommentTpye,id) //查询评论数
{
	var obj= document.getElementById(tobj);
	var Url="Action=16&CommentTpye="+CommentTpye+"&id="+ id;
	
	var ref=function()//处理返回数据
	 	{
		  if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var requestText=http_request.responseText;
					obj.innerHTML = requestText;
            } else { //页面不正常
                // alert("写数据出错了！！");
            }
        }
	 }
   send_request("../ajax.asp",Url,ref,true);
}


//============处理文章中的图片====================
function ViewCmsImages(tobj,id)
{
	var obj= document.getElementById(tobj);
	var imgs=obj.getElementsByTagName("img");
	
	for(i=0;i<imgs.length;i++)
	{
		//imgs[i].setAttribute('onmousewheel',"return bbimg(this)");
		var sobj= imgs[i].parentNode;
		if (sobj.tagName!="a")
		{
			//imgs[i].outerHTML ="<a href='/viewimg_"+id+"_1.html?"+ imgs[i].src +"' target='_blank'>" + imgs[i].outerHTML + "</a>"
			
			imgs[i].onclick=function(){window.open("/viewimg_"+id+"_1.html?"+ this.src,"n","")}
            imgs[i].title="点击查看大图"
            imgs[i].style.cursor="pointer";
         }
		// imgs[i].onmousewheel = function(){return bbimg(this)};
		// imgs[i].alt="可以用鼠标滚动改变大小";
	}
}

//单击选项卡通用过程 obj,'Index_3_2_1','li','li_click'
function liClick(obj,t1,t2,t3)
{
	var TempObj=document.getElementById(t1);
	var TempObj_Li=TempObj.getElementsByTagName(t2);
	
	var TempObj_Ul;
	
	for(i=1;i<TempObj_Li.length;i++)
		{
			TempObj_Li[i].className=null;
			if(TempObj_Li[i]==obj)
			{
				document.getElementById(t1+"_"+i).style.display='';
				}
			else
			{
				document.getElementById(t1+"_"+i).style.display='none';
			}
		}
	obj.className=t3;
}
	
	
//提交表单软件下载评论
  var isSubmit=false;  //是否提交了评论
  function submitComment()
  {
     if (isSubmit)
	 {
		 //alert("您的评论已经提交，请不要重复提交谢谢!")
	    //	 return;
	 }
	 
	 var Form=document.forms["FormComment"];
	 if (Form==null) Form=document.forms["zt_ly"];

	 var Content =Form.Content;
	 if (Content==null) Content=Form.ly_content;
	 
	 var ContentText = Content.value.Trim();
	 
	 if(ContentText=="" )
	 {
		alert("评论的内容不能为空！");
		Content.focus();
		return false;
	 }
	 
	 if( ContentText.length<5 || ContentText.length>1000 )
	 {
		alert("评论的内容不能小于5 大于 1000 个字符！");
		Content.focus();
		return false;
	 }
	 
	 var temp = ContentText;
	 var re = /\{.+?\}/g;        // 创建正则表达式模式
	 temp = temp.replace(re,"");
	 if (temp.Trim()=="")
	 {
		alert("对不起不能发表纯表情! 感谢您的支持！"); 
		Content.focus();
		return false;
	 }
	 
	 var ly_id
	 	 ly_id = Form.ly_id;
		 if (ly_id==null) ly_id = Form.softid;
		 
	 var CommentTpye,CommentTpyeId
	 	 CommentTpye =Form.CommentTpye;
		 if (CommentTpye==null) 
		 {
			 CommentTpyeId =0;
		 }else
		 {
			CommentTpyeId = CommentTpye.value; 
		 }
	 var Url="content=" + escape(ContentText) + "&SoftID=" +  escape(ly_id.value) + "&Action=2&CommentTpye="+CommentTpyeId;
	 
	 var ref=function()//处理返回数据
	 	{
		  if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var requestText=http_request.responseText;
					 Content.value="";
					 //Content.disabled=true;
					 //Form.disabled=true;
					 //alert("您的评论已经写入成功,但需要等审核才能显示出来");
					ViewComment(requestText);
	 
            } else { //页面不正常
                 //alert("写数据出错了！！"); 
            }
        }
	}
     send_request("/ajax.asp",Url,ref,true);
	 isSubmit = true;
  }
  
  //将提交的评论显示到页面上
  function ViewComment(text)
  {
	  var d = new Date(); 
	  var sd=d.toLocaleString();
	  
	  var Temp ="<dt><span><i>顶楼 </i><b >您发表的评论</b> </span><em>发表于: <font color='red'> "+ sd +" </font> </em></dt>"
      Temp +="<dd> "+ text +" <p></p></dd>"
	  
	  $("#comment_1 dl").append(Temp);
  }
  
  //提交评论表单得到焦点的时候显示验证码
  function CommentOnblur()
  {
	 document.getElementById("viewGetCode").style.display="";
  }
  //按 CTRL+回车 提交表单
  function submitForm()
  {
	  if (typeof (window.event) != 'undefined')
	  {
	   if(window.event.ctrlKey && window.event.keyCode==13)
	    {
	  	//alert("点击了");
		 submitComment();
		 return true;
	    }
	 }
  }
  
//首页选项卡
function switchTab(obj,num,c,d){ 
    var parentNodeObj= obj.parentNode;
	 var s=0;
	 var i=0;
	 
	 for(i=0;i<parentNodeObj.childNodes.length;i++)
	 {
		 if (parentNodeObj.childNodes[i].nodeName=="#text")//针对FF处理
		   {
			 continue;  
		   }
		 parentNodeObj.childNodes[i].className=c+ "1";
		 var labObj= document.getElementById(d + s);
		 
		// alert(d + s)
		 if(labObj !=null)
		 {
		  labObj.style.display='none';
		 if(num==s)
		  {
			  labObj.style.display=''; 
	 
		  }
		 }
		 s +=1;
	 }
	obj.className=c + "2";
}

 

	
//======文章页专用=============

//快速分页需要 jQuery 库支持 //在页面中使用 shortcutKey("#cms_showpage_text")	
//参数分页容器id，默认为#cms_showpage_text

function shortcutKey(pagecss){
	
	if(typeof passcss == "undefined") {
		pagecss = "#cms_showpage_text";
	}


	var page = $(pagecss);
	
	if(page.length  == 0) return;

	var span = document.createElement("span");
	span.innerHTML = "提示：按\"←→\"键快速翻页"
	page[0].appendChild(span);
	var a = $(pagecss + " a");
	
	
	var b = parseInt($(pagecss + " b").text());
	

	$(document).keyup( function(e){
		
		var tag = e.target.tagName.toLowerCase();
		
		if(tag === "input" || tag === "textarea" ) return;
		
		if ( e.keyCode == 37){

			if (b > 1){

				window.location.href = a[b-2].href;

			}else{
					alert('这已经是第一页了');
			}
		}

		if ( e.keyCode == 39){
			if (b < a.length ){
				window.location.href = a[b-1].href;
			}else{
					alert('你已经浏览完所有内容');
			}

		  }
	});
 }



//------------
  function Cms_Title_Click(obj)
   {
	obj.style.background="  url(images/cms_c2_2.jpg) top center'";
   }
   
//统计点次下载次数
 function softCount(SoftID,SoftLinkID)
 { 
	 var Url = "Action=6&SoftLinkID=" + escape(SoftLinkID) + "&SoftID=" + escape(SoftID)
	  var ref=function()//处理返回数据
	  {
		  if (http_request.readyState == 4) { // 判断对象状态
		    if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
			
			var requestText=http_request.responseText;
			//alert(requestText)
			}else
			{
				//var requestText=http_request.responseText;
				//alert(requestText)
			}
		  }  
	  }
	 send_request("../ajax.asp",Url,ref,true);
	 //alert(Url);
 }

//改变图片大小
function resizepic(thispic)
{
if(thispic.width>700) thispic.width=700;
}

// 鼠标滚动 无级缩放图片大小 onmousewheel="return bbimg(this)"
function bbimg(o)
{
  var zoom=parseInt(o.style.zoom, 10)||100;
  zoom+=event.wheelDelta/12;
  if (zoom>0) o.style.zoom=zoom+'%';
  return false;
}


//第一次点击下载地址的时候提示设为首页
function address_click()
{
	if(getCookie("Address_Home") != "Yes") 
	{
	ThissetHomePage();
	 PostCookie("Address_Home=Yes");
	}
	return true;
}


 function setHomepage(URL) {　 // 设为首页
　　　　　if (document.all) {
　　　　　　　　　　　document.body.style.behavior = 'url(#default#homepage)';
　　　　　　　　　　　document.body.setHomePage(URL);　　　　　　　　　　　 }
　　　　　　　　　　　 else if (window.sidebar) {
　　　　　　　　　　　　　　　 if (window.netscape) {
　　　　　　　　　　　　　　　　　　　 try {
　　　　　　　　　　　　　　　　　　　　　　　 netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
　　　　　　　　　　　　　　　　　　　 }
　　　　　　　　　　　　　　　　　　　 catch (e) {
　　　　　　　　　　　　　　　　　　　　// alert("该操作被浏览器拒绝，假如想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true");
　　　　　　　　　　　　　　　　　　　 }
　　　　　　　　　　　　　　　 }
　　　　　　　　　　　　　　　 var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
　　　　　　　　　　　　　　　 prefs.setCharPref('browser.startup.homepage',URL);
　　　 }
    return true;
} 

//第一次点击下载地址的时候提示设为首页
function address_click2(URL)
{
	if(getCookie("Address_Home") != "Yes") 
	{
	  document.body.style.behavior="url(#default#homepage)";
	  document.body.setHomePage(URL); 
	  PostCookie("Address_Home=Yes");
	}
	return true;
}



 //比列调整当前图片大小
 function ReImgSize(obj,w,h){ 
  if(obj.width>w)
   {
	   obj.width=w;
	   obj.style.border="none" 
	 }
  }
 
/*
// 调用方法
img_maxwidth(); // 全部图片,最大600宽度
img_maxwidth(800) // 全部图片,最大800宽度

img_maxwidth('content') // #content 下的图片
img_maxwidth('content',600)
img_maxwidth( document.getElementsByTagName('img') ) // 指定的图片
*/
var debug = ''
var img_maxwidth  = (function (){
		
	// 忽略支持 max-width 的浏览器
	if('maxWidth' in document.createElement('img').style){
		return function(){};
	}
	// 特殊处理ie6
	var domloaded,
	// domready for ie6, 载入jQ的情况下使用jQ的domready
	doscroll = function(){
		try {
			document.documentElement.doScroll("left");
		} catch(e) {
			setTimeout( doscroll, 20 );
			return;
		}
		domloaded();
	},
	
	ready = typeof jQurey !== 'undefined' ? jQuery : function(callback){
		domloaded = callback, doscroll();			
	},
	
	later = function(context){
		
		ready(function(){
			if(typeof context == 'string') context = document.getElementById(context);
			each(context.getElementsByTagName('img'));								   
		});
	},
	
	fix_width = function(image,maxwidth){
		//image.removeAttribute('height');
		image.style.width = maxwidth + 'px';
	},
	
	later_fix_width = function(image,maxwidth){
		// attachEvent 的 this 指向?
		image.attachEvent('onload', function(){
			image.width > maxwidth && fix_width(image,maxwidth);
		});
	},
	
	each = function(images){
		 var image, maxwidth;
		 for(var i= images.length; image = images[--i];){
				maxwidth = parseInt(image.currentStyle['max-width']);
				
				if(!maxwidth) continue;
				
				image.complete || image.width > maxwidth ?
					fix_width(image,maxwidth) :	later_fix_width(image,maxwidth);
		 }
	 },
	 
	 port = function(){
		 
		var arg = arguments[0], context;
			
		if(!arg){
			later(document);
			return;
		}
		// id
		if(typeof arg == 'string'){
			context = document.getElementById(arg);
			context ? each(context.getElementsByTagName('img')) :  later(arg);
			return;
		}
		// elements
		if( 0 in arg && arg[0].nodeType == 1) each(arg);	
	}

	return port;
})();


   
//取得radio 选中的值
 function getRadioBoxValue(radioName){ 
            var obj = document.getElementsByName(radioName);             //这个是以标签的name来取控件 
                 for(i=0; i<obj.length;i++)    { 
                  if(obj[i].checked){ 
                          return obj[i].value; 
                  } 
              }          
             return "undefined";        
}



//Html转换成Ubb
function html_trans(str) {
	str = str.replace(/\r/g,"");
	str = str.replace(/on(load|click|dbclick|mouseover|mousedown|mouseup)="[^"]+"/ig,"");
	str = str.replace(/<script[^>]*?>([\w\W]*?)<\/script>/ig,"");
	str = str.replace(/<a[^>]+href="([^"]+)"[^>]*>(.*?)<\/a>/ig,"[url=$1]$2[/url]");
	str = str.replace(/<font[^>]+color=([^ >]+)[^>]*>(.*?)<\/font>/ig,"[color=$1]$2[/color]");
	str = str.replace(/<img[^>]+src="([^"]+)"[^>]*>/ig,"[img]$1[/img]");
	str = str.replace(/<([\/]?)b>/ig,"[$1b]");
	str = str.replace(/<([\/]?)strong>/ig,"[$1b]");
	str = str.replace(/<([\/]?)u>/ig,"[$1u]");
	str = str.replace(/<([\/]?)i>/ig,"[$1i]");
	str = str.replace(/&nbsp;/g," ");
	str = str.replace(/&amp;/g,"&");
	str = str.replace(/&quot;/g,"\"");
	str = str.replace(/&lt;/g,"<");
	str = str.replace(/&gt;/g,">");
	str = str.replace(/<br>/ig,"\n");
	str = str.replace(/<[^>]*?>/g,"");
	str = str.replace(/\[url=([^\]]+)\]\n(\[img\]\1\[\/img\])\n\[\/url\]/g,"$2");
	str = str.replace(/\n+/g,"\n");
	str = my_format(str);
	str = str.replace(/\n/g,"\n");
	return str;
}



function my_format(str){
   var cc,tempstr;
   cc = str;
   tempstr = "";
   var ss=cc.split("\n");
   for (var i=0; i< ss.length; i++ ){
        while (ss[i].substr(0,1)==" "||ss[i].substr(0,1)=="　"){ss[i]=ss[i].substr(1,ss[i].length);}
        if (ss[i].length>0) tempstr+="　　"+ss[i]+"\n";
   }
   return tempstr;
}

 
//=========== 前台最新更新 ===================

function MakeUbb(thisForm)
{
	var obj = document.getElementById(thisForm);
	
	if(isNaN(obj.TopNum.value))
	{
		obj.TopNum.value="";
		obj.TopNum.focus();
		alert("记录条数只能为数字！！");
		return false;
	}
	
	var sUbbType
	
	if (typeof(UbbType)=="undefined")
	{
	  sUbbType=0;
	} else
	{
		 sUbbType = UbbType;
	}
 
	
	var ref=function()//处理返回数据
	{
		  if (http_request.readyState == 4) 
		   { // 判断对象状态
            if (http_request.status == 200)
			{ // 信息已经成功返回，开始处理信息 
			  if (sUbbType==1)
			   {
				  // UbbText=http_request.responseText;
				   //makeCheckBtn();
				   makeCheckBtn(http_request.responseText);
			   }else
			   {
				document.getElementById("List").innerHTML=unescape(http_request.responseText);
			   }

            } else { //页面不正常
			    alert(  http_request.responseText);
                // alert("您所请求的页面有异常。");
            }
          }
	}
	
   document.getElementById("List").innerHTML = "正在查询中..."; 
   var SendTemp   = "Action=8&IsSize=" + escape(obj.IsSize.checked) +"&IsCateID=" + escape(obj.IsCateID.checked) +"&IsAtrImages=" + escape(obj.IsAtrImages.checked)+"&IsZhilian=" + escape(obj.IsZhilian.checked);
   		SendTemp += "&IsLanguage=" + escape(obj.IsLanguage.checked) +"&IsSoftSystem=" + escape(obj.IsSoftSystem.checked) +"&IsSoftViewImg=" + escape(obj.IsSoftViewImg.checked);
		SendTemp += "&IsContent=" + escape(obj.IsContent.checked)+"&IsHttp=" + escape(obj.IsHttp.checked) +"&IsXunLei=" + escape(obj.IsXunLei.checked);
		SendTemp += "&Bdate=" + escape(obj.Bdate.value)+"&Edate=" + escape(obj.Edate.value) +"&TopNum=" + escape(obj.TopNum.value);
		SendTemp += "&Tradio=" + escape(getRadioBoxValue("Tradio"))+"&order="+ escape(getRadioBoxValue("order"))+"&Keys_u="+ escape(obj.Keys_u.value);
		SendTemp +="&UbbType=" + sUbbType;
		
		
		if (document.getElementById("ContentNum")!=null)
		{
		  SendTemp += "&ContentNum=" + escape(obj.ContentNum.value);
		}
		
		if (document.getElementById("IsDownLink")!=null)
		{
		  SendTemp += "&IsDownLink=" + escape(obj.IsDownLink.checked);
		}
		
		
       send_request("ajax.asp",SendTemp,ref,true); 
      // alert(SendTemp);
}
//===========================================



//senfe("changecolor","#f8fbfc","#e5f1f4","#ecfbd4","#bce774"); 
////changecolor("表格名称","奇数行背景","偶数行背景","鼠标经过背景","点击后背景"); 

function senfe(o,a,b,c,d){ 
var t=document.getElementById(o).getElementsByTagName("tr");  
for(var i=0;i<t.length;i++){    t[i].style.backgroundColor=(t[i].sectionRowIndex%2==0)?a:b; 
t[i].onclick=function(){     if(this.x!="1"){      this.x="1";//本来打算直接用背景色判断，FF获取到的背景是RGB值，不好判断   
this.style.backgroundColor=d;
}else
{
	this.x="0";  
	this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b;  
	}   
	}  
t[i].onmouseover=function(){ if(this.x!="1")this.style.backgroundColor=c; }   
t[i].onmouseout=function(){ 
if(this.x!="1")this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b; } } }



//========================ICO显示图片============================================
var mailshowed=false; //是否显示列表图标
var showDiv="ListSpaces";
//===例表页显示软件大图======
function setShowSpace(obj,img)
{
  if (img=='') return;
  var sobj= document.getElementById(showDiv);
  if (sobj==null)
  {  
	var aNode =document.createElement("div");
	aNode.id=showDiv;
	aNode.innerHTML = "";
	aNode.onmouseout = function(){ closelisetSpace() };
	
	var Prean=document.getElementById("top");
	
	if (Prean==null)
	{
		obj.parentNode.insertBefore(aNode);  
	}
	else
	{
		 Prean.parentNode.insertBefore(aNode,Prean);  
	}
   }
		var x=obj.offsetLeft;
		var tempobj;
	        tempobj =obj;
		while(tempobj=tempobj.offsetParent){
          x+=tempobj.offsetLeft;
         }	
		 
		var y= obj.offsetTop;
		 tempobj =obj;
		 
		while(tempobj=tempobj.offsetParent){
           y+=tempobj.offsetTop;
         }
			
		var list=document.getElementById(showDiv);
	    if(list!= null)
		{
		    list.innerHTML="<img src="+img+">";
		    list.style.left= x + "px";
	        list.style.top=y + obj.clientHeight +"px";
			list.style.display='';
			//alert(list.tagName);
		}
	     //setTimeout("setShowSpace('showList')",100);	 
}
//关闭
function closelisetSpace()
{
	 var sobj= document.getElementById(showDiv);
	 if (sobj!=null)
	 {
		 sobj.style.display='none';
	 }
}

//=======================================================


//============游戏网站用显示图片 Begin ===================

var showYouxiPicDiv="divLable";
var timer
function showYouxiPic(obj,softid)
{
   if (softid==''||obj==null ) return;
	
   var Url="Action=9&id="+ softid;
   
   var img=""
    
	
	var ref=function()//处理返回数据
	 	{
		  if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var requestText=http_request.responseText;
					 img = requestText;
            } else { //页面不正常
                // alert("写数据出错了！！");
            }
        }
	 }
	 
    send_request("../ajax.asp",Url,ref,false);
    if (img==''|| img=="NO") return;
	var list= document.getElementById(showYouxiPicDiv);
 
	var divListImg = list.getElementsByTagName("div")[1];
		divListImg.innerHTML=img
	
	var x=obj.offsetLeft;
	var tempobj;
	    tempobj =obj;
	while(tempobj=tempobj.offsetParent){
          x+=tempobj.offsetLeft;
         }	
		 
	var y= obj.offsetTop;
		 tempobj =obj;
		 
	while(tempobj=tempobj.offsetParent){
           y+=tempobj.offsetTop;
         }
	list.style.top=y ;
	
	if((document.body.scrollWidth - x)<(document.body.scrollWidth/2))
	{
	 list.style.left = (x - 500)+"px";;
	}else
	{
	 list.style.left= x + obj.clientWidth +"px";
    }
	list.style.display='block';
}

function closeshowYouxiPic()
{
	var sobj= document.getElementById(showYouxiPicDiv);
	var posSel=sobj.style.display;
	if(posSel=="block"){
		timer = setTimeout("showYouxiPicDiv_hide()", 500);
	}	
}

function showYouxiPicDiv_mouseover(){
	try{window.clearTimeout(timer);}catch(e){}
}

function showYouxiPicDiv_hide(){
	 var sobj= document.getElementById(showYouxiPicDiv);
	 if (sobj!=null)
	 {
		 sobj.style.display='none';
	 }
}

//============游戏网站用显示图片 End =====================

//插入表情图标
function insFace(id,itrm)
{
	var obj=document.getElementById(itrm);
	
	//obj.innerHTML = obj.innerHTML + "{f:"+id+"}";	
	obj.value += "{f:"+id+"}";
}


//=================投票===============================================
var isVote=false;  //是否已经投过票了
//投票BEGIN
function sEval(softid,num,din,cai,Tpye)
{
	if(isVote)
	{
		//alert('您已经投过票了,请不要重复投票,感谢您的支持!!')
		//return
	}
	var Temp="Action=0&softid="+ escape(softid) + "&num=" +escape(num)+"&type="+ Tpye; //发送的数据
	
	var RequestFunction=function() {  //返回处理函数
		if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
					ReadMark(softid,din,cai,Tpye);
				 
				  alert('投票成功!!');
            } else { //页面不正常
			      
                // alert("您所请求的页面有异常。");
            }
        }
	 };
	send_request("../ajax.asp",Temp,RequestFunction,false);
	isVote = true;
	//alert(Temp);
}
//投票End

//读取投票数据 Begin
function ReadMark(softid,din,cai,Tpye)
{	
	var Temp="Action=1&softid="+ escape(softid)+"&type="+ Tpye; //发送的数据
	 
	var objTemp=document.getElementById(din).getElementsByTagName("div")[1].getElementsByTagName("div");
	
	var AbetImg=objTemp[0].getElementsByTagName("span")[0];
	var AbetNum=objTemp[1];
	
		 objTemp=document.getElementById(cai).getElementsByTagName("div")[1].getElementsByTagName("div");
	var ArgueImg=objTemp[0].getElementsByTagName("span")[0];;
	var ArgueNum=objTemp[1];
	
	var RequestFunction=function() {  //返回处理函数
		if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var TempText=http_request.responseText;
 
				var	 TempText_1=TempText.split("|")[0];
				var  TempText_2=TempText.split("|")[1];
					
				var TempText_3= parseInt(TempText_1) + parseInt(TempText_2);
				if (TempText_3 == 0)
				{
					var a =50;
					var b=50;
				}else
				{
				var a =parseInt(parseInt(TempText_1) /TempText_3*100)
				var b= (100 - parseInt(parseInt(TempText_1) /TempText_3*100))
				}
    
				    AbetNum.innerHTML  = "%" + a +"(" + TempText_1 +")";
					ArgueNum.innerText = "%" +b +"(" + TempText_2 +")";;

					AbetImg.style.width = a+"%";
					ArgueImg.style.width = b+"%" ;
                
            } else { //页面不正常
                // alert("您所请求的页面有异常");
            }
        }
	 };
	 
	 send_request("../ajax.asp",Temp,RequestFunction,false);
	//AbetNum.innerText="5645";	
}
//读取投票数据 End


//==========投票第二种方案 Begin=================
function ngsEval(id,goodid,badid,verid,type)
{
	var objgood = $(goodid);
	var objbad = $(badid);

   
	 objgood.css({cursor:"pointer"});
	
	// ngSendEval(id,goodid,badid,verid,0,type);
	 
	objgood.click(function (){ ngSendEval(id,goodid,badid,verid,1,type) ; isVote=true; });
	objbad.click(function (){ ngSendEval(id,goodid,badid,verid,2,type); isVote=true; });
}


//投票
function ngSendEval(id,goodid,badid,verid,num,type)
{
   if(isVote && num>0)
	{
		 alert('您已经投过票了,请不要重复投票,感谢您的支持!!')
		 return true;
	}
	
 var url="action=3&id="+id+"&num="+num+"&type="+type;
 
  $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
      ListEval(goodid,badid,verid,msg);
   }
}); 
}

function ListEval(goodid,badid,verid,msg){
	var objgoodimg = $(goodid + " img");
	var objgoodem = $(goodid + " em");

	var objgoodb = $(goodid + " b");
 
	
	var objbadimg = $(badid + " img");
	var objbadem = $(badid + " em");

	var objbadb = $(badid + " b");
	
	
	var objver = $(verid);
	
	var dataObj=eval("("+msg+")");//转换为json对象
	
	
	objgoodimg.eq(0).animate({width: "1%"},200);
	objgoodimg.eq(0).animate({width: +dataObj.Percentage[0]+ "%"},"slow");
	
	objbadimg.eq(0).animate({width: "1%"},200);
	objbadimg.eq(0).animate({width: +dataObj.Percentage[1]+ "%"},"slow");
	
	objgoodem.eq(0).html(dataObj.Percentage[0]+ "%" + "("+ dataObj.Num[0] +")");
	objbadem.eq(0).html(dataObj.Percentage[1]+ "%"+ "("+ dataObj.Num[1] +")");
	
	objgoodb.eq(0).html(dataObj.Num[0] );
	objbadb.eq(0).html(dataObj.Num[1] );
	
	objver.html(dataObj.Very[0])	
	 
	
}
//==========投票第二种方案 End=================


//====留言专用===============
function countLyNum(obj,ttextObj) //统计留言字符数
{
	//alert('sss');
	var textObj=document.getElementById(ttextObj);
	var num=obj.innerHTML.length;
	if(num>500)
	{
		alert("只允许输入500个字符，超过部份将自动删除");
		obj.innerHTML = obj.innerHTML.substr(1,500);
	}
	if (textObj!=null)
	{
		textObj.innerHTML=num;
	}
}

//================自动搜索专用=================
function autoSearch()
{
	var autooptions;
	
	autooptions = {
		  serviceUrl:'/ajax.asp',
		  minChars:1, 
    	  delimiter: /(,|;)\s*/, // regex or character
   		  maxHeight:400,
    	  // width:300,
   		  zIndex: 9999,
    	  deferRequestBy: 0, //miliseconds
  		  params: {action:'15' }, //aditional parameters
   		   //default is false, set to true to disable caching
    	  // callback function:
    	   onSelect: function(value, data){ 
		   
		   window.location=data;
		     },
   	   	  // local autosugest options:
   	      //lookup: ['January', 'February', 'March', 'April', 'May'] //local lookup values 
		  noCache: true
		  };
	
	if($('#keyword').length>0)
	{
		var a1 = $('#keyword').autocomplete(autooptions);   
	}
	
}

//============文章心情===========

function SetMoon(id,objid)
{
	var objb=$('#'+objid+ ' b');
	var objspan=$('#'+objid+ ' span');
	var objem=$('#'+objid+ ' em');
	var countid= objem.length;
	
	objem.css({cursor:"pointer"});
	
	//alert(countid)
	objem.click(function (){ SendMoon(id,countid,$(this).attr('name'),objid)})
	
	SendMoon(id,countid,0,objid)
		
}

function SendMoon(id,countid,sendid,objid)
{
  var url="action=17&id="+id+"&countid="+countid+"&sendid="+sendid+""
  $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
      ListMoon(msg,objid)  ;
   }
});
  

}

function ListMoon(msg,objid)
{  
	var objb=$('#'+objid+ ' b');
	var objspan=$("#"+objid + "  >ul>li> span >  img");
	var objem=$('#'+objid+ ' em');
	var countid= objb.length;
	
	//var aMsg=msg.split(",")
	var dataObj=eval("("+msg+")");//转换为json对象
	//alert(dataObj.data.length);//输出root的子对象数量
	//alert(msg);//输出root的子对象数量 
	//alert(countid)
	
	$('#'+objid+ ' label').html(dataObj.CountNumBer)
	 
	for(var i=0;i<countid;i++)
	{
		 objb.get(i).innerHTML= dataObj.Num[i];
		 objspan.eq(i).hide();
		// objspan.eq(i).attr('height',dataObj.data[i]);
		objspan.eq(i).css('height',dataObj.data[i] + '%')
		 
		 objspan.eq(i).slideDown("slow");
	}
	
}

//发送报错信息
function senderror(id,obj)
{
	var Content= document.getElementById(obj);
	var CommentTpyeId = 3
	
	if (Content.value.Trim().length<1) 
	{
		alert("请提供报错信息谢谢!!")
		return false;
	}
	
	var Url="content=" + escape(Content.value) + "&SoftID=" +  escape(id) + "&Action=2&CommentTpye="+CommentTpyeId;
	
	  var ref=function()//处理返回数据
	 	{
		  if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
				var requestText=http_request.responseText;
                 if(requestText=="OK") 
				 {
					alert("你的报错信息已经提交感谢您的支持。");
					Content.value="";
					
				 }else
				 {alert(requestText);}
            } else { //页面不正常
                 alert("写数据出错了！！"); 
            }
        }
	}
      send_request("/ajax.asp",Url,ref,true);
	 //alert(Url)
	return true;	
}

//评论页读取顶
function BindDing(objtext,id,CommentTpye)
{
	var obj=$(objtext)
	//var sobj = obj..$("a")
     return ; //退出
	  
	if (obj.length==0) return false;
	 for (var i=0 ;i<obj.length;i++)
	 {
	  var sobj = obj.eq(i).find("a")
	  var spanobj = obj.eq(i).find("span")
	  
	  sobj.click(function (){ 
						   SendDing($(this).parent().attr("id"));
						   
						   var  spanobj = $(this).parent().find("span")
						   spanobj.html(parseInt(spanobj.html())+1);
						    $(this).unbind();
							
						    $(this).attr("title","您已经顶过了");
						   })
	 }
	ReadDing(objtext,id,CommentTpye)
}

function SendDing(id)//发送顶
{
	//alert(id)
   var url="action=19&id="+id
   $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
     // alert(msg)  ;
   }
});
}

//读取评论顶的数据
function ReadDing(objtext,id,CommentTpye)
{
	var obj=$(objtext);
	
	return ; //退出
	
	var sendid="";
	for (var i=0 ;i<obj.length;i++)
	{
		sendid+=obj.eq(i).attr("id");
		if (i<(obj.length-1)) sendid+=",";
	}
	
if (sendid!="") //是否有评论
 {
	  var url="action=18&id="+id+"&CommentTpye="+CommentTpye+"&sendid="+escape(sendid)+""
	  $.ajax({
	   type: "POST",
	   url: "/ajax.asp",
	   data: url,
	   success: function(msg){
		  ListDing(objtext,msg)  ;
	   }
	});	
 }
}

function ListDing(objtext,msg) //显示顶的数据
{
	//alert(msg)
	var obj=$(objtext)
	var dataObj=eval("("+msg+")");//转换为json对象
	 for (var i=0 ;i<obj.length;i++)
	 { 
	   var spanobj = obj.eq(i).find("span")
	   var sid = obj.eq(i).attr("id");
	   for (var y=0;y < dataObj.ID.length;y++)
	   {
		   if (sid == dataObj.ID[y])
		   {
			 spanobj.html(dataObj.Ding[y]);
			 break;
		   }
	   }
	}	
}


//投票 需要 JQ支持  
//function SendVote(id,sobj,ref)
function SendVote(id,sobj,ref)
{
	var obj = $(sobj +" input");
	var temp='';
	for(var i=0; i<obj.length; i++)
	{
		if (obj.eq(i).attr("checked")==true)
		{
			if (temp !='') temp +=',';
			temp +=  i;
		}
		obj.eq(i).attr("checked",false);
	}
	
	if (temp=='') {
		alert('请选择一个项目!!')
		return;
	}
	
  var url="action=21&id="+id+"&v="+ escape(temp);
   $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
      ref(msg)
   }
});
}

//单个投票ＪＱ支持
function OneVote(id,ni,ref)
{
  var url="action=21&id="+id+"&v="+ escape(ni);
   $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
      ref(msg)
   }
});
}


//读取投票数据 ＪＱ支持
function ReadVote(id,ref)
{
  var url="action=21&id="+id+"&v=";
   $.ajax({
   type: "POST",
   url: "/ajax.asp",
   data: url,
   success: function(msg){
      ref(msg)
   }
});
}


//设置控制的显示的数值
//sobj　JQ选择器 msg 数据 , iatt 是否百分比 ,att CSS Name
//列子 Listvote('#vote b',msg,true,'') 
//	   Listvote('#vote em img',msg,false,'width') 
function Listvote(sobj,msg,iatt,att) //显示顶的数据
{
	//alert(msg)
	var obj=$(sobj)
	var dataObj=eval("("+msg+")");//转换为json对象
	var PNum=0
	 
		for (var i=0;i<obj.length; i++)
		{
			if (iatt)
			{
				obj.eq(i).html(dataObj.Num[i]);  
			}else
			{
				PNum =  (dataObj.Num[i] /dataObj.NumBer *100).toFixed(1);
				if (att=='')
				{
				 obj.eq(i).html(PNum + "%" ); 
				}else
				{
				  obj.eq(i).css(att, PNum + '%');
				 // alert(obj.eq(i).attr(att))  
				}
			}
		}	  
}