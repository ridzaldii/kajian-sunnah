<?php 
	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "";
	$db 	= "kajian_sunnah";

	$conn = new mysqli($host, $user, $pass, $db);

	$ip = "172.20.100.14";
	$link = "http://".$ip."/kajian-sunnah/web";
	$linkproses = "http://".$ip."/kajian-sunnah/web/proses";
 ?>