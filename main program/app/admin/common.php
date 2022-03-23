<?php
if (!function_exists('setConfig')) {
	/**
	 * [setConfig write configuration file method]
	 * @param  [type] $arr      [要写入的数据]
	 * @param  [type] $filename [文件路径]
	 * @return [type]           [description]
	 */
	function setConfig($arr, $filename) {
		return file_put_contents($filename, "<?php \r\n return " . var_export($arr, true) . ";");
	}
}

if (!function_exists('base58_encode')) {
	function base58_encode($string)
	{
		$alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789abcdefghijkmnopqrstuvwxyz';
		$base = strlen($alphabet);
		if (is_string($string) === false) {
			return false;
		}
		if (strlen($string) === 0) {
			return '';
		}
		$bytes = array_values(unpack('C*', $string));
		$decimal = $bytes[0];
		for ($i = 1, $l = count($bytes); $i < $l; $i++) {
			$decimal = bcmul($decimal, 256);
			$decimal = bcadd($decimal, $bytes[$i]);
		}
		$output = '';
		while ($decimal >= $base) {
			$div = bcdiv($decimal, $base, 0);
			$mod = bcmod($decimal, $base);
			$output .= $alphabet[$mod];
			$decimal = $div;
		}
		if ($decimal > 0) {
			$output .= $alphabet[$decimal];
		}
		$output = strrev($output);
		foreach ($bytes as $byte) {
			if ($byte === 0) {
				$output = $alphabet[0] . $output;
				continue;
			}
			break;
		}
		return (string) $output;
	}
}
if (!function_exists('base58_decode')) {
	function base58_decode($base58)
	{
		$alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789abcdefghijkmnopqrstuvwxyz';
		$base = strlen($alphabet);
		if (is_string($base58) === false) {
			return false;
		}
		if (strlen($base58) === 0) {
			return '';
		}
		$indexes = array_flip(str_split($alphabet));
		$chars = str_split($base58);
		foreach ($chars as $char) {
			if (isset($indexes[$char]) === false) {
				return false;
			}
		}
		$decimal = $indexes[$chars[0]];
		for ($i = 1, $l = count($chars); $i < $l; $i++) {
			$decimal = bcmul($decimal, $base);
			$decimal = bcadd($decimal, $indexes[$chars[$i]]);
		}
		$output = '';
		while ($decimal > 0) {
			$byte = bcmod($decimal, 256);
			$output = pack('C', $byte) . $output;
			$decimal = bcdiv($decimal, 256, 0);
		}
		foreach ($chars as $char) {
			if ($indexes[$char] === 0) {
				$output = "\x00" . $output;
				continue;
			}
			break;
		}
		return $output;
	}
}
?>