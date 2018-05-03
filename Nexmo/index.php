<?php
	include ( "./Nexmo/src/NexmoMessage.php" );
	/**
	 * To send a text message.
	 *
	 */
    class SMS{
	// Step 1: Declare new NexmoMessage.
	function sendSMS(){
        $nexmo_sms = new NexmoMessage('dec8a214', '04231f6bc7589967');
	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '919022058065', 'MyApp', 'Hello!' );
	// Step 3: Display an overview of the message
	//echo $nexmo_sms->displayOverview($info);
	// Done!}}
    }
    }
?>