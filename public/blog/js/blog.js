require.config({
    paths : {'jquery' : '../js/jquery', 
             'js':'../../blog/js/js',
             'silder':'../../blog/js/silder',
            }
    , shim: {'js' : ['jquery'], 
             'silder':['jquery'],
            }
  });
require(['jquery', 'js', 'silder'], function ($){
    var dataModule = $('body').delegate('a[href^="#"]', 'click', function(e){e.preventDefault()}).data('module');
    if(dataModule) {require(dataModule.split(' '))}
});
