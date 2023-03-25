<?php 

use \Ratchet\ConnectionInterface;
use \Ratchet\Wamp\WampServerInterface;

class WebSocketApp implements WampServerInterface{
	
	//protected $app;
	function __construct(){
		
		//$this->app = $app; 
		
	}
	
	/**
     * A lookup of all the topics clients have subscribed to
     */
    protected $subscribedTopics = array();
	
    function onSubscribe(ConnectionInterface $conn, $topic) {
		print_r($topic->getId());
		$this->subscribedTopics[$topic->getId()] = $topic;
    }
	
	/**
     * @param string JSON'ified string we'll receive from ZeroMQ
     */
    function onBlogEntry($entry) {
		
        $entryData = json_decode($entry, true);

        // If the lookup topic object isn't set there is no one to publish to
        if (!array_key_exists($entryData['identify'], $this->subscribedTopics)) {
            return;
        }

		$topic = $this->subscribedTopics[$entryData['identify']];


        // re-send the data to all the clients subscribed to that category
        $topic->broadcast($entryData);
		
    }
	
    function onUnSubscribe(ConnectionInterface $conn, $topic) {}
	
    function onOpen(ConnectionInterface $conn) {
		echo'conected  ';
    }
	
    function onClose(ConnectionInterface $conn) {
		echo'closed  ';
    }
	
    function onCall(ConnectionInterface $conn, $id, $topic, array $params) {
		
        // In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
		
    }
    function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible) {}
    function onError(ConnectionInterface $conn, \Exception $e) {}
}