<?php
error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

if (ob_get_level() == 0) ob_start();

$directory = '/var/www/html/files/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

foreach($scanned_directory as $row){
	//echo $row;
	$content = file_get_contents($directory.$row,true);

	echo $content;
	ob_flush();
	flush();
	sleep(0.001);
}


ob_flush();
flush();

ob_end_flush();
