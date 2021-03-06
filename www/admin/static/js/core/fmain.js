require.config({
    paths : {'jquery' : '../core/jquery-1.11.0.min', 
             'cookie':'../core/jquery.cookie',
             'modernizr':'../core/modernizr.custom',
            }
    , shim: {'placeholder' : ['jquery'], 
             'lazyload':{deps:['jquery'], exports:'jQuery.fn.lazyload'}, 
             'cookie' : {deps:['jquery'], exports:'jQuery.fn.cookie'},
            }
  });
require(['jquery', 'ilei', 'cookie', 'moder'], function ($, I){
    var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
    if(dataModule) {require(dataModule.split(' '))}
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
      $.AMUI.fullscreen.isFullscreen ? $fullText.text('关闭全屏') : $fullText.text('开启全屏');
    });

    
$(function(){
  $(".post-home h1 a").hover(
    function () {
      $(this).parent().parent().find(".external").addClass("hover");
    },
    function () {
      $(this).parent().parent().find(".external").removeClass("hover");
    }
  );
  
  if(($.browser.msie && $.browser.version=="9.0") || $.browser.webkit || $.browser.safari ||      $.browser.mozilla || $.browser.opera ){
    }else{
      if($.cookie("notip")!="yes"){
        $("body").append('<div class="tipbox"><div class="tipbox-skin"><a class="close" href="javascript:;">x 关闭</a><p>我们检测到你使用的是非高级浏览器，无法正常浏览，推荐下载<a href="http://www.google.cn/intl/zh-CN/chrome/browser/" target="_blank">Chrome浏览器</a></p></div></div>');
      $(".close").click(function(){
        $(".tipbox").hide();
        $.cookie("notip","yes",{expires:30});
      });
      var top = ($(window).height()-$(".tipbox").outerHeight())/2,
      left = ($(window).width()-$(".tipbox").outerWidth())/2;
      $(".tipbox").css({
        top: top+"px",
        left: left+"px"
      });
    }
  }
 });
});
