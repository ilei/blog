require.config({
    paths : {'jquery' : '../core/jquery-1.11.0.min', 
             'placeholder' : '../core/jquery.placeholder',
             'cookie':'../core/jquery.cookie',
             'uconfig':'../ueditor/config',
             'umin':'../ueditor/min',
            }
    , shim: {'placeholder' : ['jquery'], 
             'lazyload':{deps:['jquery'], exports:'jQuery.fn.lazyload'}, 
             'cookie' : {deps:['jquery'], exports:'jQuery.fn.cookie'},
             'umin':{deps:['jquery', 'uconfig']},
            }
  });
require(['jquery', 'ilei', 'cookie', 'amaze'], function ($, I){
    var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
    if(dataModule) {require(dataModule.split(' '))}
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
      $.AMUI.fullscreen.isFullscreen ? $fullText.text('关闭全屏') : $fullText.text('开启全屏');
    });
});
