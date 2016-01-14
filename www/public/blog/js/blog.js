require.config({
  paths : {'jquery' : '../js/jquery', 'shcore':'../../blog/js/shCore'}
          , shim: {'js' : ['jquery'], 'shcore':['jquery']}
});
require(['jquery', 'shcore'], function ($){
  var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
  if(dataModule) {require(dataModule.split(' '))}
  $(function(){
    SyntaxHighlighter.highlight();
    b();
    $('#gotop').click(function(){
      $(document).scrollTop(0);	
    })
  });

  function b(){
    h = $(window).height();
    t = $(document).scrollTop();
    if(t > h){
      $('#gotop').show();
    }else{
      $('#gotop').hide();
    }
  }
  $(window).scroll(function(e){
    b();		
  })
});
