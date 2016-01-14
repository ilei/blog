

 
//==========Mobile redirect Begin ========
var browser = {
            versions: function () {
                var u = navigator.userAgent, app = navigator.appVersion;
                return {//移动终端浏览器版本信息
                    trident: u.indexOf('Trident') > -1, //IE内核
                    presto: u.indexOf('Presto') > -1, //opera内核
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                    mobile: !!u.match(/AppleWebKit.*Mobile/i) || !!u.match(/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/), //是否为移动终端
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                    iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                };domain
            } (),
            language: (navigator.browserLanguage || navigator.language).toLowerCase()
    }
	
	// JavaScript Document
 var Cookie={get:function(name){var value='',matchs;if(matchs=document.cookie.match("(?:^| )"+name+"(?:(?:=([^;]*))|;|$)"))value=matchs[1]?unescape(matchs[1]):"";return value},set:function(name,value,expire,domain){expire=expire||30*24*3600*1000;var date=new Date(),cookie="";date.setTime(date.getTime()+expire);cookie=name+"="+escape(value)+";expires="+date.toGMTString()+";path=/;";domain&&(cookie+="domain="+domain+";");document.cookie=cookie},del:function(name,domain){Cookie.set(name,'',-1,domain)}};
 
(function(){  

	var  href = location.href,
	      isFormMoblie = /[\?&]m(&|$)/.test(window.location.search),
		  doNotRedirect =  +Cookie.get('donotredirect'),
		  mUrl="http://m.qqtn.com/",
		  isMoblie=browser.versions.mobile;
		  
		  	var Init ={
		      redirect : function(){
				  var reg = /\/(down|sj|qqfz|gamefz)\/(\d+)\.html/ig;
				  var m = reg.exec(href);
				  if(m){
					 window.location.href = mUrl + "q/" +m[2];  
					 return;
				  }
				  reg = /\/article\/article_(\d+)_1\.html/ig;
				  m = reg.exec(href);
				  if(m){
					 window.location.href = mUrl + "c/" +m[1];  
					 return;
				  }
	 
				  
				  reg = /\/(qqkey|az|game)\/(\w+)(\/?)/ig;
				  m = reg.exec(href);
				  if(m){
					 window.location.href = mUrl + "k/" +m[2]; 
					 return;
				  }
				  reg = /\.com(\/?)$/ig; 
				  m = reg.exec(href);
				  if(m){
					 window.location.href = mUrl ;  
					 return;
				  }
				  
			  }
	       }
	
		  if(isFormMoblie){
			Cookie.set('donotredirect', 1, 7*24*3600*1000);
			return;
		} else if(isMoblie){
			if(!doNotRedirect)	Init.redirect(); 
		}
})()	
//==========Mobile redirect End ========

function getBrowser(){
    var oType = "";
    if(navigator.userAgent.indexOf("MSIE")!=-1){
        oType="IE";
    }else if(navigator.userAgent.indexOf("Firefox")!=-1){
        oType="FIREFOX";
    }
    return oType;
}

function getPageCharset(){
    var charSet = "";
    var oType = getBrowser();
    switch(oType){
        case "IE":
            charSet = document.charset;
            break;
        case "FIREFOX":
            charSet = document.characterSet;
            break;
        default:
            break;
    }
    return charSet;
}

 
if ( typeof _webInfo != "undefined")
{
 var src = 'http://count.612.com//index.php?m=r'
    , charset = '&charset=' + getPageCharset()
    , atime = '&atime=' + _webInfo.DateTime // 文章添加时间
    , ref = '&ref=' + encodeURIComponent(document.referrer)
    , url = '&url=' + encodeURIComponent(window.location.href)
    , username = '&username=' + encodeURIComponent(_webInfo.Username) // 用户名
    , type = '&type=' +  _webInfo.Type // 类型
	, rid ='&rid='+  _webInfo.Id //资源ID
    , content = '&content=' + encodeURIComponent(document.title);
   document.write('<iframe src="' + src + charset + atime + ref + url + username + type + rid + content + '" width="0" height="0" style="display:none;"></iframe>');
}

var  url =window.location.href;
