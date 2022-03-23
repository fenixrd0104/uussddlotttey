<?php

return [
	// Etherscan Api
	"etherscan" => [
		"apiurl" => "https://api-cn.etherscan.com/api",
		//"apikey" => "Z6DYYSZ3SMQUK17S48BAWB8UVM8KXR8736",
		//"contractaddress" => "0x57d90b64a1a57749b0f932f1a3395792e12e7055",
		"apikey" => "7TCVDMHGHVH42IFHXJXK677AQWUA1QDE9N",
		"contractaddress" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
		"abi" => '[{"inputs":[{"internalType":"string","name":"name","type":"string"},{"internalType":"string","name":"symbol","type":"string"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"}]',
		
		'addr' => [
			'usdt'=> '0xdac17f958d2ee523a2206206994597c13d831ec7',
			'sushi'=> '0x6b3595068778dd592e39a122f4f5a5cf09c90fe2',
			'usdc'=> '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48',
			'uni'=> '0x1f9840a85d5af5bf1d1762f925bdaddc4201f984',
			'aave'=> '0x7fc66500c84a76ad7e9c93437bfc5ac33e2ddae9',
			'yfi'=> '0x0bc529c00C6401aEF6D220BE8C6Ea1667F6Ad93e',
			'dai'=> '0x6b175474e89094c44da98b954eedeac495271d0f',
			'link'=> '0x514910771af9ca656af840dff83e8264ecf986ca',
			"LON"=> "0x0000000000095413afc295d19edeb1ad7b71c952",
			"CRV"=> "0xD533a949740bb3306d119CC777fa900bA034cd52",
			'FIL'=> "0xbf48ecb7c2d3d559e0a24b04f306889e05c73cd6",
		],
		'addr2' => [
			"WBTC"=> "0x2260fac5e5542a773aa44fbcfedf7c193bc2c599",
			"WETH"=> "0xc02aaa39b223fe8d0a0e5c4f27ead9083c756cc2",
			"CONV"=> "0xc834fa996fa3bec7aad3693af486ae53d8aa8b50",
			"inj"=> "0xe28b3B32B6c345A34Ff64674606124Dd5Aceca30",
			"MKR"=> "0x9f8f72aa9304c8b593d555f12ef6589cc3a579a2",
			"ALPHA"=> "0xa1faa113cbe53436df28ff0aee54275c13b40975",
			"BAND"=> "0xba11d00c5f74255f56a5e366f4f77f5a186d7f55",
			"snx"=> "0xc011a73ee8576fb46f5e1c5751ca3b9fe0af2a6f",
			"comp"=> "0xc00e94cb662c3520282e6f5717214004a7f26888",
			"sxp"=> "0x8ce9137d39326ad0cd6491fb5cc0cba0e089b6a9",
		],
		'addr3' => [
			"FTT"=> "0x50d1c9771902476076ecfc8b2a83ad6b9355a4c9",
			"ust"=> "0xa47c8bf37f92abed4a126bda807a7b7498661acd",
			"TRIBE"=> "0xc7283b66eb1eb5fb86327f08e1b5816b0720212b",
			"wise"=> "0x66a0f676479Cee1d7373f3DC2e2952778BfF5bd6",
			"RRAX"=> "0x853d955acef822db058eb8505911ed77f175b99e",
			"CORE"=> "0x62359Ed7505Efc61FF1D56fEF82158CcaffA23D7",
			"mir"=> "0x09a3ecafa817268f77be1283176b946c4ff2e608",
			"DPI"=> "0x1494ca1f11d487c2bbe4543e90080aeba4ba3c2b",
			"luna"=> "0xd2877702675e6ceb975b4a1dff9fb7baf4c91ea9",
			"HEZ"=> "0xEEF9f339514298C6A857EfCfC1A762aF84438dEE",
			"fxs"=> "0x3432b6a60d23ca0dfca7761b7ab56459d9c964d0",
			"fei"=> "0x956f47f50a910163d8bf957cf5846d573e7f87ca",
		]
	],
	// Tronscan Api
	"tronscan" => [
		"apiurl" => "https://api.trongrid.io",
		"contract" => "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
		"abi"	=> '[{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"sender","type":"address"},{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"account","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"owner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"}]',
		
		'addr' => [
			'WIN'=> 'TLa2f6VPqDgRE67v1736s7bJ8Ray5wYjU7',
			'USDT'=>'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
			'TONS'=> 'THgLniqRhDg5zePSrDTdU9QwY8FjD9nLYt',
			'USDJ'=> 'TMwFHYXLJaRUPeW6421aqXL4ZEzPRFGkGT',
			'JST'=> 'TCFLL5dx5ZJdKnWuesXxi1VPwjLVmWZZy9',
			'HT'=> 'TDyvndWuvX5xTBwHPYJi7J3Yq8pq8yh62h',
			'SUN'=> 'TKkeiboTkxXKJpbmVFbv4a8ov5rAfRDMf9',
			"EXNX"=> "TCcVeKtYUrHEQDPmozjJFMrf6XX7BgF84A",
			"VCOIN"=> "TNisVGhbxrJiEHyYUMPxRzgytUtGM7vssZ",
			"POL"=>"TWcDDx1Q6QEoBrJi9qehtZnD4vcXXuVLer",
			"CKRW"=>"TTVTdn8ipmacfKsCHw5Za48NRnaBRKeJ44"
		],
	],
		"tronscandoge" => [
		"apiurl" => "https://api.trongrid.io",
		"contract" => "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
		"abi"	=> '[{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"sender","type":"address"},{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"account","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"owner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"}]',
		
		'addr' => [
			'WIN'=> 'TLa2f6VPqDgRE67v1736s7bJ8Ray5wYjU7',
			'USDT'=>'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
			'TONS'=> 'THgLniqRhDg5zePSrDTdU9QwY8FjD9nLYt',
			'USDJ'=> 'TMwFHYXLJaRUPeW6421aqXL4ZEzPRFGkGT',
			'JST'=> 'TCFLL5dx5ZJdKnWuesXxi1VPwjLVmWZZy9',
			'HT'=> 'TDyvndWuvX5xTBwHPYJi7J3Yq8pq8yh62h',
			'SUN'=> 'TKkeiboTkxXKJpbmVFbv4a8ov5rAfRDMf9',
			"EXNX"=> "TCcVeKtYUrHEQDPmozjJFMrf6XX7BgF84A",
			"VCOIN"=> "TNisVGhbxrJiEHyYUMPxRzgytUtGM7vssZ",
			"POL"=>"TWcDDx1Q6QEoBrJi9qehtZnD4vcXXuVLer",
			"CKRW"=>"TTVTdn8ipmacfKsCHw5Za48NRnaBRKeJ44"
		],
	],
	"tronscanbnb" => [
		"apiurl" => "https://api.trongrid.io",
		"contract" => "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
		"abi"	=> '[{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"sender","type":"address"},{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"account","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"owner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"}]',
		
		'addr' => [
			'WIN'=> 'TLa2f6VPqDgRE67v1736s7bJ8Ray5wYjU7',
			'USDT'=>'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
			'TONS'=> 'THgLniqRhDg5zePSrDTdU9QwY8FjD9nLYt',
			'USDJ'=> 'TMwFHYXLJaRUPeW6421aqXL4ZEzPRFGkGT',
			'JST'=> 'TCFLL5dx5ZJdKnWuesXxi1VPwjLVmWZZy9',
			'HT'=> 'TDyvndWuvX5xTBwHPYJi7J3Yq8pq8yh62h',
			'SUN'=> 'TKkeiboTkxXKJpbmVFbv4a8ov5rAfRDMf9',
			"EXNX"=> "TCcVeKtYUrHEQDPmozjJFMrf6XX7BgF84A",
			"VCOIN"=> "TNisVGhbxrJiEHyYUMPxRzgytUtGM7vssZ",
			"POL"=>"TWcDDx1Q6QEoBrJi9qehtZnD4vcXXuVLer",
			"CKRW"=>"TTVTdn8ipmacfKsCHw5Za48NRnaBRKeJ44"
		],
	],
	"tronscantrx" => [
		"apiurl" => "https://api.trongrid.io",
		"contract" => "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
		"abi"	=> '[{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"sender","type":"address"},{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"account","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"recipient","type":"address"},{"name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"owner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"}]',
		
		'addr' => [
			'WIN'=> 'TLa2f6VPqDgRE67v1736s7bJ8Ray5wYjU7',
			'USDT'=>'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
			'TONS'=> 'THgLniqRhDg5zePSrDTdU9QwY8FjD9nLYt',
			'USDJ'=> 'TMwFHYXLJaRUPeW6421aqXL4ZEzPRFGkGT',
			'JST'=> 'TCFLL5dx5ZJdKnWuesXxi1VPwjLVmWZZy9',
			'HT'=> 'TDyvndWuvX5xTBwHPYJi7J3Yq8pq8yh62h',
			'SUN'=> 'TKkeiboTkxXKJpbmVFbv4a8ov5rAfRDMf9',
			"EXNX"=> "TCcVeKtYUrHEQDPmozjJFMrf6XX7BgF84A",
			"VCOIN"=> "TNisVGhbxrJiEHyYUMPxRzgytUtGM7vssZ",
			"POL"=>"TWcDDx1Q6QEoBrJi9qehtZnD4vcXXuVLer",
			"CKRW"=>"TTVTdn8ipmacfKsCHw5Za48NRnaBRKeJ44"
		],
	],
	// 混币
	"mixswap" => [
		"contract" => "0xdac17f958d2ee523a2206206994597c13d831ec7",
		"abi"	=> '[{"inputs":[{"internalType":"string","name":"name","type":"string"},{"internalType":"string","name":"symbol","type":"string"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"}]',
		'addr' => [
			'usdt'=> '0xdac17f958d2ee523a2206206994597c13d831ec7',
			'sushi'=> '0x6b3595068778dd592e39a122f4f5a5cf09c90fe2',
			'usdc'=> '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48',
			'uni'=> '0x1f9840a85d5af5bf1d1762f925bdaddc4201f984',
			'aave'=> '0x7fc66500c84a76ad7e9c93437bfc5ac33e2ddae9',
			'yfi'=> '0x0bc529c00C6401aEF6D220BE8C6Ea1667F6Ad93e',
			'dai'=> '0x6b175474e89094c44da98b954eedeac495271d0f',
			'link'=> '0x514910771af9ca656af840dff83e8264ecf986ca',
			"LON"=> "0x0000000000095413afc295d19edeb1ad7b71c952",
			"CRV"=> "0xD533a949740bb3306d119CC777fa900bA034cd52",
		],
		'addr2' => [
			"WBTC"=> "0x2260fac5e5542a773aa44fbcfedf7c193bc2c599",
			"WETH"=> "0xc02aaa39b223fe8d0a0e5c4f27ead9083c756cc2",
			"CONV"=> "0xc834fa996fa3bec7aad3693af486ae53d8aa8b50",
			"inj"=> "0xe28b3B32B6c345A34Ff64674606124Dd5Aceca30",
			"MKR"=> "0x9f8f72aa9304c8b593d555f12ef6589cc3a579a2",
			"ALPHA"=> "0xa1faa113cbe53436df28ff0aee54275c13b40975",
			"BAND"=> "0xba11d00c5f74255f56a5e366f4f77f5a186d7f55",
			"snx"=> "0xc011a73ee8576fb46f5e1c5751ca3b9fe0af2a6f",
			"comp"=> "0xc00e94cb662c3520282e6f5717214004a7f26888",
			"sxp"=> "0x8ce9137d39326ad0cd6491fb5cc0cba0e089b6a9",
		],
		'addr3' => [
			"FTT"=> "0x50d1c9771902476076ecfc8b2a83ad6b9355a4c9",
			"ust"=> "0xa47c8bf37f92abed4a126bda807a7b7498661acd",
			"TRIBE"=> "0xc7283b66eb1eb5fb86327f08e1b5816b0720212b",
			"wise"=> "0x66a0f676479Cee1d7373f3DC2e2952778BfF5bd6",
			"RRAX"=> "0x853d955acef822db058eb8505911ed77f175b99e",
			"CORE"=> "0x62359Ed7505Efc61FF1D56fEF82158CcaffA23D7",
			"mir"=> "0x09a3ecafa817268f77be1283176b946c4ff2e608",
			"DPI"=> "0x1494ca1f11d487c2bbe4543e90080aeba4ba3c2b",
			"luna"=> "0xd2877702675e6ceb975b4a1dff9fb7baf4c91ea9",
			"HEZ"=> "0xEEF9f339514298C6A857EfCfC1A762aF84438dEE",
			"fxs"=> "0x3432b6a60d23ca0dfca7761b7ab56459d9c964d0",
			"fei"=> "0x956f47f50a910163d8bf957cf5846d573e7f87ca",
		]
	]
];