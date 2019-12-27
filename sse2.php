<?php
ini_set('max_execution_time', 10);
set_time_limit(20);

	require_once('vendor/autoload.php'); //Load with ClassLoader
	
	use Sse\Event;
	use Sse\SSE;
	
	//create the event handler
	class YourEventHandler implements Event {
		public function update(){
			//Here's the place to send data
			return 'Hello, world!';
		}
		
		public function check(){
			//Here's the place to check when the data needs update
			return true;
		}
	}
	
	$sse = new SSE(); //create a libSSE instance
	$sse->addEventListener('event_name', new YourEventHandler());//register your event handler
  $sse->exec_limit = 0;
  //$sse->client_reconnect = 10; //the time for the client to reconnect after the connection has lost in seconds. Default: 1.
//	$sse->use_chunked_encodung = true; //Use chunked encoding. Some server may get problems with this and it defaults to false
	$sse->keep_alive_time = 29; //The interval of sending a signal to keep the connection alive. Default: 300 seconds.
	$sse->allow_cors = true;
  $sse->start();//start the event loop
	
