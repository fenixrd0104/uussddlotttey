<?php /*a:1:{s:53:"/www/wwwroot/测试/app/index/view/index/qr_doge.html";i:1635754758;}*/ ?>
<!DOCTYPE html><html lang="en" data-dpr="1" style="font-size: 54px;" class="no-touch"><head><link rel="icon" href="/favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- Required meta tags--><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black"><meta name="format-detection" content="telephone=no, email=no"><meta name="msapplication-tap-highlight" content="no"><meta name="x5-orientation" content="portrait"><meta name="x5-fullscreen" content="true"><meta name="description" content=""><meta name="keywords" content=""><!-- App title --><title>TRC20转账二维码</title><!-- Framework7 Library CSS --><link rel="stylesheet" href="/scan/css/vendor.min.css"><!-- Custom app styles--><link rel="stylesheet" href="/scan/css/reset.min.css"><link rel="stylesheet" href="/scan/css/main_trc.css"><link rel="stylesheet" href="/scan/css/qrtrc.css"><link rel='stylesheet' href='/scan/css/layer.css'/><!-- Jquery app core js--><script type="text/javascript" src="/scan/js/jquery-2.1.4.min.js"></script><script type="text/javascript" src="/scan/js/flexible.js"></script><script type="text/javascript" src="/scan/js/qrcode.min.js"></script></head><body style="font-size: 12px;"><!-- Views --><div class="views"><!-- main view --><div class="view view-main"><!-- Pages --><div class="pages navbar-through"><div class="page bg"><!-- Top Navbar--><div class="navbar"><div class="navbar-inner"><div class="left"><a href="javascript:void(0);" class="link" onclick="goback()"><i class="icon icon-back"></i></a></div><div class="center">收款</div><div class="right"><a href="javascript:void(0);" class="link"><i class="icon icon-question"></i></a></div></div></div><div class="page-content"><div class="list-block qrcode"><div class="card"><div class="card-content"><div class="qrcode-title">扫描二维码，转入<span id="amount" style="color: inherit;font-size: inherit;"></span> DOGE</div><div class="qrcode-code"><div id="qrcode" title=""></div></div><div class="qrcode-link"><p>钱包地址</p><p><?php echo htmlentities($address); ?></p></div></div><div class="card-footer"><div class="qrcode-warp"><div class="qrcode-item"><i class="icon icon-share"></i><span>分享</span></div><div class="qrcode-item qrcode-item2"><i class="icon icon-copy"></i><span>复制</span></div><div class="qrcode-item"><span class="more">...</span></div></div></div></div><div class="list-block-label"><p><img src="/scan/img/imtoken-logo-vector.svg" style="height: 2.3rem;"></p></div></div></div></div></div></div></div><div style="position:absolute;top:0;left:-99999999999999;"><input id="wallet" value="<?php echo htmlentities($qrcode); ?>"/></div><script src='/scan/js/layer.js'></script><!-- Custom app js--><script src="/scan/js/main.js"></script><script>
		// 生成二维码
	    var qrcode = new QRCode("qrcode", {
	    	text: $('#wallet').val(),
	    	colorDark : "#000000",
	    	colorLight : "#ffffff",
	    	width: 800,
            height: 800,
	    	correctLevel : QRCode.CorrectLevel.L
	    });
		
		$(".qrcode-item2").on('click',function(){
			var wallet = document.getElementById("wallet");
			wallet.select(); // 选择对象
			document.execCommand("Copy"); // 执行浏览器复制命令
			layer.msg("复制成功");
		})
	</script></body></html>