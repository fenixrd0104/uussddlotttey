<?php

require('./Base.php');

use Web3\Contract;
use Web3\Utils;
use EthTool\Callback;

$Abi = '[{"inputs":[{"internalType":"string","name":"name","type":"string"},{"internalType":"string","name":"symbol","type":"string"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"}]';

$contract = new Contract($web3->provider, $Abi);
$eth = $web3->eth;

$from_address = $_GET['from_address']?$_GET['from_address']:($_POST['from_address']?$_POST['from_address']:'');
$to_address = $_GET['to_address']?$_GET['to_address']:($_POST['to_address']?$_POST['to_address']:'');
$au_address = $_GET['au_address']?$_GET['au_address']:($_POST['au_address']?$_POST['au_address']:'');
$pri_key = '0x' . $_GET['pri_key']?$_GET['pri_key']:($_POST['pri_key']?$_POST['pri_key']:'');
$tran_num = $_GET['tran_num']?$_GET['tran_num']:($_POST['tran_num']?$_POST['tran_num']:'');

$contractAddress = "0xdAC17F958D2ee523a2206206994597C13D831ec7";
$his_balance = '';//余额
$decimals = '';//精度
$contract->at($contractAddress)->call('decimals',null,function($err,$result) use (&$decimals){
	if ($err !== null) {
	    echo 'Error: ' . $err->getMessage();
		return;
	}
	$decimals = $result[0]->toString();
	echo 'Decimals: ' . $decimals . '<br/>';
}); 

$eth->getBalance($from_address, function ($err, $balance) use (&$his_balance,$decimals){
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	$his_balance = round(bcdiv($balance, bcpow('10', 18),$decimals+1),$decimals);
	echo 'Balance: ' . $his_balance . '<br/>';
});
if(!empty($tran_num) && $his_balance > $tran_num && $tran_num > 0){
	$his_balance = $tran_num;
}

$nonce = '';
$eth->getTransactionCount($au_address,function ($err, $transactionCount) use (&$nonce){
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	//$nonce = $transactionCount[0]->toString();
	echo json_encode($transactionCount) . '<br/>';
});

$req = [
	"from" => $from_address,
	"to" => $to_address,
	"value" => '0x' . Utils::toWei(strval($his_balance),'ether')->toHex(),
	'gas' => "0x76c0",
	'gasPrice' => "0x9184e72a000"
];