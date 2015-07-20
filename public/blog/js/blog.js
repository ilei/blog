require.config({
  paths : {
		'jquery' : '../js/jquery', 
    'js':'../../blog/js/js',
  	'shcore':'../../blog/js/shCore',
  }
	, shim: {
		'js' : ['jquery'], 
		'shcore':['jquery'],
  }
});
require(['jquery', 'js', 'shcore'], function ($){
  var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
  if(dataModule) {require(dataModule.split(' '))}
  $(function(){
    SyntaxHighlighter.highlight();
  });
});
