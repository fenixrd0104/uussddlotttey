<?php

require('./Base.php');

$eth = $web3->eth;

echo 'Eth Get Account and Balance' . '<br/>';

$eth->accounts(function ($err, $accounts) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }
	$accounts = ['0xeDfC460618e9085CaE55b5e15F2771960fb16621','0xD5741e75aF95F0C67eCcc96f726ca86f19d5990e'];
    foreach ($accounts as $account) {
        echo 'Account: ' . $account . PHP_EOL;

        $eth->getBalance($account, function ($err, $balance) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            echo 'Balance: ' . $balance . '<br/>';
        });
    }
});