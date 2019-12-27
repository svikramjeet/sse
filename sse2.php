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
  $sse->start();//start the event loop
	