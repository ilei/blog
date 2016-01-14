$(function () {
    $(".searchBt").toggle(
      function () {
          $(".searchInput").slideDown("fast");
          $(this).addClass("searchOn");
          $('body').one('click', function () {    //给BODY绑定一次性点击事件   
              if ($(".searchBt").hasClass("searchOn")) $(".searchBt").trigger("click");
          });
      },
      function () {
          $(".searchInput").slideUp("fast");
          $(this).removeClass("searchOn");
      }
    );
    $(".searchInput input").click(function () {     //点击显示部分不隐藏   
        return false;
    });
});
