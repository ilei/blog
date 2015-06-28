// JavaScript Document

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

var Temp="";
//设置随机数字 
function GetRandom(Min,Max){   
        var Range = Max - Min;  
	 
		
        var Rand = Math.random();   
        var Num = (Min + Math.round(Rand * Range));
        return Num;
} 