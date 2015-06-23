/**
 * 公共js
 *
 * CT: 2014-10-08 18:10 by YLX
 * UT: 2014-10-10 09:52 by YLX
 */


// 重写js alert 方法
function ym_alert($msg)
{
    alert($msg);
}

// 错误信息渐隐, 需传入渐隐element id
function ym_fadeout(id)
{
    var alert  = $('#'+id), time=3;
    var interval = setInterval(function(){
        time--;
        if(time <= 0) {
            alert.fadeOut(1000);
            clearInterval(interval);
        };
    }, 1000);
}

$(document).ready(function(){

	// 设置等高 -- START
	//等高列的小插件
	// function setEqualHeight(columns) {
	// 	var tallestColumn = 0;
	// 	columns.each(function(){
	// 		currentHeight = $(this).height();
	// 		if(currentHeight > tallestColumn) {
	// 			tallestColumn = currentHeight;
	// 		}
	// 	});
	// 	columns.height(tallestColumn);
	// }
	//调用写好的插件，基中“.container > div”是你需要实现的等高列
	// setEqualHeight($(".main > div"));
	// 设置等高 -- END
	
	
    // 删除消息 -- START
	$('.ym_del').click(function(){
        if (confirm('确认要删除?')) {
            location.href=$(this).attr('url');
        }
        return false;
    });
    // 删除消息 -- END
	
	// 去消input自动填充
	$('input[autocomplete="off"]').each(function(){
        var input = this;
        var name = $(input).attr('name');
        var id = $(input).attr('id');

        $(input).removeAttr('name');
        $(input).removeAttr('id');      

        setTimeout(function(){ 
            $(input).attr('name', name);
            $(input).attr('id', id);            
        }, 1);
    });

	
});