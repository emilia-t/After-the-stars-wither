<!doctype html>
<script>
    var mobile_bs = {
        versions: function() {
            var u = navigator.userAgent;
            return {
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1,  //opera内核
                webKit: u.indexOf('AppleWebKit') > -1,  //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,  //火狐内核
                mobile: !! u.match(/AppleWebKit.*Mobile.*/) || !! u.match(/AppleWebKit/) && u.indexOf('QIHU') && u.indexOf('QIHU') > -1 && u.indexOf('Chrome') < 0,  //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),  //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,  //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,   //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1,     //是否iPad
                webApp: u.indexOf('Safari') == -1   //是否web应该程序，没有头部与底部
            }
        } ()
    };
    if (!mobile_bs.versions.mobile) {
        window.location.href = "bh3.php";
    }
</script>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>制作中，敬请期待</title>
</head>
<body>
<h1>制作中，敬请期待</h1>
</body>
</html>