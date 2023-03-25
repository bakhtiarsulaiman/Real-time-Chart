<?php 
error_reporting(E_ALL);
set_time_limit(0);

if (ob_get_level() == 0) ob_start();

$context = new \ZMQContext();
/* Create a new socket */
$socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'socketConect');
/* Connect the socket */
$socket->connect("tcp://0.0.0.0:5555");
/* Send a request */

$directory = '/var/www/html/charts/files/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
$ky = 1;
foreach($scanned_directory as $row){
	//echo $row;
	$content = file_get_contents($directory.$row,true);

	$socket->send(json_encode(['identify'=>'charts','key'=>$ky,'data'=>$content,'x'=>5]));
	$ky++;
	
}




