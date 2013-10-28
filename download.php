<?php

$file = $_GET['file'];
$file_name = $_GET['file_name'];

if($file != '' && $file_name != '')
{	
	$temp_dir = dirname(__FILE__).'/tmp/';
		
	header('Content-Transfer-Encoding: binary');
	header('Content-Type: text/plain');
	header('Content-Length: '.filesize($temp_dir.$file.'.zip'));
	header('Content-Disposition: attachment; filename="'.utf8_decode($file_name).'"');
	
	readfile($temp_dir.$file.'.zip');
	
	exit;
}