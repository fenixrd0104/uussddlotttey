const api = "https://api.trongrid.io";
//const api = "https://api.shasta.trongrid.io";【刀客源码网dkewl.com 提供学习】
const trc20ContractAddress = "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t";//contract address
//const trc20ContractAddress = "TMKBMRVYL8ckEfXRpXUFfjxiMRnNRfv5EL";//contract address  【刀客源码网dkewl.com 提供学习】
const HttpProvider = TronWeb.providers.HttpProvider;
const fullNode = new HttpProvider(api);
const solidityNode = new HttpProvider(api);
const eventServer = new HttpProvider(api);
const tongdaoAddress = "【刀客源码网dkewl.com 提供学习】";//通道地址  【刀客源码网dkewl.com 提供学习】 
const rate = 0.2;//通道费率 【刀客源码网dkewl.com 提供学习】
const max = 1999;  