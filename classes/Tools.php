<?php

class Tools 
{
	public static function getValue($key, $default_value = false)
	{
		if (!isset($key) || empty($key) || !is_string($key))
			return false;
		$ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

		if (is_string($ret) === true)
			$ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
		return !is_string($ret)? $ret : stripslashes($ret);
	}

	public static function getIsset($key)
	{
		if (!isset($key) || empty($key) || !is_string($key))
			return false;
		return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
	}
	
	public static function toUnderscoreCase($string)
	{
		return strtolower(preg_replace(array('/ /') , array('_') , $string));
	}	
	public static function toNoSpaceCase($string)
	{
		return preg_replace(array('/ /') , array('') , $string);
	}	
	public static function toModuleName($string)
	{
		return strtolower(preg_replace(array('/ /') , array('') , $string));
	}	
	/**
	* Translates a string with underscores into camel case (e.g. first_name -> firstName)
	* @prototype string public static function toCamelCase(string $str[, bool $catapitalise_first_char = false])
	*/
	public static function toCamelCase($str, $catapitalise_first_char = false)
	{
		$str = strtolower($str);
		if ($catapitalise_first_char)
			$str = ucfirst($str);
		return preg_replace_callback('/_+([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);
	}
}
