<?php
	include 'vendor/autoload.php';
	include 'WebSocketApp.php';

	$loop   = \React\EventLoop\Factory::create();
	$pusher = new WebSocketApp(); // my own pusher implementation

	$context = new \React\ZMQ\Context($loop);
	$pull = $context->getSocket(ZMQ::SOCKET_PULL);
	$pull->bind('tcp://127.0.0.1:5555');
	$pull->on('message', [$pusher, 'onBlogEntry']);
	$pull->on('error', array($pusher, 'onError'));

	$webSock = new \React\Socket\Server($loop);
	$webSock->listen(8099, '0.0.0.0');
	$webServer = new \Ratchet\Server\IoServer(
		new \Ratchet\Http\HttpServer(
			new \Ratchet\WebSocket\WsServer(
				new \Ratchet\Wamp\WampServer(
					$pusher
				)
			)
		),
		$webSock
	);

	$loop->run();
		
		
	