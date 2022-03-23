// baidu analysis
; var _hmt = _hmt || [];
(function () {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?f4b3788b2247dd149fb7fdffe8aece79";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();

// google analysis
(function (i, s, o, g, r, a, m) {
  i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
    (i[r].q = i[r].q || []).push(arguments)
  }, i[r].l = 1 * new Date(); a = s.createElement(o),
    m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-144903049-2', 'auto');
ga('require', 'GTM-MNBPZXP');
ga('send', 'pageview');

// open in app
; (function () {
  const installTip = document.getElementById('install-tip')
  const installTipClose = document.getElementById('install-tip-close')
  const href = location.href

  if (installTip) {
    if (/from=open-app/i.test(href)) {
      installTip.style.display = 'flex'
    }

    installTipClose.onclick = () => {
      installTip.style.display = 'none'
    }
  }
}())