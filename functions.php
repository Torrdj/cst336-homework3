<?php
	function clamp($c, $n)
	{
		$x = $c - $n;
		if ($c > 64 && $c < 91)
			return ($x < 65) ? 91 - (65 - ($x)) : (($x > 90) ? 64 + (($x) - 90) : ($x));
		else
			return ($x < 97) ? 123 - (97 - ($x)) : (($x > 122) ? 96 + (($x) - 122) : ($x));
	}
	function rotn($n, $str)
	{
		$result = "";
		$s = str_split($str);
		foreach ($s as $c)
		{
			if (preg_match('/[a-zA-Z]/', $c))
				$result .= chr(clamp(ord($c), $n));
			else
				$result .= $c;
		}
		return $result;
	}
?>