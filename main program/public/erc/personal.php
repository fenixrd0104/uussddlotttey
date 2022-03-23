<?php

require('./Base.php');

$personal = $web3->personal;
$newAccount = '';

echo 'Personal Create Account and Unlock Account.<br/>' ;

// create account
$personal->newAccount('123456', function ($err, $account) use (&$newAccount) {
	if ($err !== null) {
	    echo 'Error: ' . $err->getMessage();
		return;
	}
	$newAccount = $account;
	echo 'New account: ' . $account . '<br/>';
});

$personal->unlockAccount($newAccount, '123456', function ($err, $unlocked) {
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	if ($unlocked) {
        echo 'New account is unlocked!' . '<br/>';
	} else {
	    echo 'New account isn\'t unlocked' . '<br/>';
	}
});


// get balance
echo '<br/>newAccount:'+$newAccount;
$web3->eth->getBalance($newAccount, function ($err, $balance) {
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	echo 'Balance: ' . $balance->toString() . '<br/>';
});

// remember to lock account after transaction
$personal->lockAccount($newAccount, function ($err, $locked) {
	if ($err !== null) {
		echo 'Error: ' . $err->getMessage();
		return;
	}
	if ($locked) {
        echo 'New account is locked!' . '<br/>';
	} else {
	    echo 'New account isn\'t locked' . '<br/>';
	}
});