<?php

require('../vendor/autoload.php');

use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

$web3 = new Web3(new HttpProvider(new HttpRequestManager('https://mainnet.infura.io/v3/fa871983c0314a408675e3f9d242a195', 10)));