require(['jquery', 'ilei'], function($, I){
	var btnSubmit       = $("#btn-submit"),
		username          = $("#username"),
		password          = $("#passwd"),
		loginurl				  = $("#url"),	
		name              = $("#name"),	
		result            = false;

	function showError(o, s){
		o.parent().parent().find('.error-wrap').html('').html(s);	
		o.focus();
	}
	function formValidation(e) {
		if(!$.trim(name.val())){
			showError(name, '网站名称不能为空');
			result = false;
			return false;
		}
		if(!$.trim(loginurl.val())){
			showError(loginurl, '网站登录地址不能为空');
			result = false;
			return false;
		}
		if(!$.trim(username.val())){
			showError(username, '网站用户不能为空');
			result = false;
			return false;
		}
		if (!password.val()) {
			showError(password, '网站用户密码不能为空');
			result = false;
			return false;
		}
		$('#website').submit();
	}

	btnSubmit.click(function() {
		$('#website').find('.error-wrap').html('');
		if(!result){
			result = false;
		}
		formValidation();
	});
});

