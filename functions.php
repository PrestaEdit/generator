<?php

function l($string)
{
	global $_LANG;

	if(isset($_LANG[$string]))
		return $_LANG[$string];
	else
		return $string;
}