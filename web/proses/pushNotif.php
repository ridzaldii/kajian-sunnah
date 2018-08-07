<?php
	include '../pusher-beams/src/PushNotifications.php';
	require '../pusher-beams/vendor/autoload.php';
	class pushNotif {
		public function push($message, $judul)
		{
			$pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
			  "instanceId" => "cabcb5d6-bc52-435f-bb40-e772c5d8d685",
			  "secretKey" => "C489883F02F611A76291B62A6ACC155",
			));

			$publishResponse = $pushNotifications->publish(
			  array("hello"),
			  array(
			    "fcm" => array(
			      "notification" => array(
			        "title" => "Kajian Makassar",
			        "body" => $message.$judul
			    ))
			));
		}
	}
?>