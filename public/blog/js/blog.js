require.config({
  paths : {'jquery' : '../js/jquery', 
    'js':'../../blog/js/js',
'silder':'../../blog/js/silder',
'shcore':'../../blog/js/shCore',
  }
          , shim: {'js' : ['jquery'], 
            'silder':['jquery'],
'shcore':['jquery'],
          }
});
require(['jquery', 'js', 'silder', 'shcore'], function ($){
  var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
  if(dataModule) {require(dataModule.split(' '))}
  $(function(){
    SyntaxHighlighter.highlight();
  });
});
