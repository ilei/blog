define(['jquery'], function($){
    var BASE_URL = window.location.protocol + '//' + window.location.hostname
    , CUR_URL = window.location.href
    , IE = !!window.ActiveXObject
    , IE6 = IE && !window.XMLHttpRequest
    , IE8 = IE && !!document.documentMode && (document.documentMode == 8)
    , IE7 = IE && !IE6 && !IE8;
    function baseUrl(path) {
        path = path || '';
        if(path.length > 0) {
            return BASE_URL + '/' + path;
        }
        return BASE_URL;
    }
    function currentUrl() {
        return CUR_URL;
    }
    function redirect(path) {
        window.location.href=baseUrl(path);
    }
    function isMobile(str) {
        return /^1[3-8][0-9]{9}$/.test(str);
    }
    function isEmail(str) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(str);
    }
    function normalizeFloat(val) {
        var res = $.trim(val);
        if(res.length == 0) return '';
        res = parseFloat(
            ('' + res) 
            .replace('。', '.')
            .replace('．', '.')
            .replace('一', '1')
            .replace('二', '2')
            .replace('两', '2')
            .replace('三', '3')
            .replace('四', '4')
            .replace('五', '5')
            .replace('六', '6')
            .replace('七', '7')
            .replace('八', '8')
            .replace('九', '9')
            .replace('０', '0')
            .replace('１', '1')
            .replace('２', '2')
            .replace('３', '3')
            .replace('４', '4')
            .replace('５', '5')
            .replace('６', '6')
            .replace('７', '7')
            .replace('８', '8')
            .replace('９', '9')
            .replace(',', '.')
            .replace('，', '.')
            .replace('、', '.')
            .replace('\\', '.')
            .replace('/', '.')
            .replace('／', '.')
            .replace('块', '.')
            .replace('快', '.')
            .replace('元', '.')
            .replace('圆', '.')
            .replace('园', '.')
            .replace('角', '')
            .replace('毛', '')
            .replace('%', '')
            .match(/[0-9]+\.*[0-9]*/ig)
            );
        return isNaN(res) ? 0 : res;
    }
    return {
        baseUrl: baseUrl,
        currentUrl: currentUrl,
        redirect: redirect,
        isMobile: isMobile,
        isEmail: isEmail,
        normalizeFloat: normalizeFloat,
        IE : IE,
        IE6: IE6,
        IE7: IE7,
        IE8: IE8
    }
});
